<?php
/**
 * @Description 图片二值化
 * @authors     XiaoAn
 * @date        2021-01-27 20:42:06
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Services;

class BinaryzationService
{
	/**
	 * [binaryzation 图片二值化]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-01-27T20:50:23+0800
	 * @param       string                   $path      [图片路径]
	 * @return      [type]                              [description]
	 */
    public function binaryzation($path='')
    {
    	if(!$ex = getimagesize($path)){
	        return false;
	    }
	 
	    // 打开图片
	    switch($ex[2]){
	    case IMAGETYPE_JPEG:
	    case IMAGETYPE_JPEG2000:
	        if(!$im = imageCreateFromJpeg($file)){
	            return false;
	        }
	        break;
	    case IMAGETYPE_PNG:
	        $im = imageCreateFromPng($file);
	        break;
	    case IMAGETYPE_GIF:
	        $im = imageCreateFromGif($file);
	        break;
	    case IMAGETYPE_BMP:
	        $im = imageCreateFromBmp($file);
	        break;
	    default :
	        return false;
	    }
	 
	    $gray = array_fill(0, $ex[1],
	            array_fill(0, $ex[0], 0)
	    );
	 
	    // 转为灰阶图像
	    foreach($gray as $y => &$row){
	        foreach($row as $x => &$Y){
	            $rgb = imagecolorat($im, $x, $y);
	            // 根据颜色求亮度
	            $B = $rgb & 255;
	            $G = ($rgb >> 8) & 255;
	            $R = ($rgb >> 16) & 255;
	            $Y = ($R * 19595 + $G * 38469 + $B * 7472) >> 16;
	        }
	    }
	    unset($row, $Y);
	 
	    // 自动求域值
	    $back = 127;
	    do{
	        $crux = $back;
	        $s = $b = $l = $I = 0;
	        foreach($gray as $row){
	            foreach($row as $Y){
	                if($Y < $crux){
	                    $s += $Y;
	                    $l++;
	                }else{
	                    $b += $Y;
	                    $I++;
	                }
	            }
	        }
	        $s = $l ? floor($s / $l) : 0;
	        $b = $I ? floor($b / $I) : 0;
	        $back = ($s + $b) >> 1;
	    }while($crux != $back);
	 
	    // 二值化
	    $bin = $gray;
	    foreach($bin as &$row){
	        foreach($row as &$Y){
	            $Y = $Y < $crux ? 0 : 1;
	        }
	    }
	    $im = [
	    	$gray,
        	$bin
	    ];
	    $img = imagecreate(count($im[0][0]), count($im[0]) * 2);
		$rgb = array(
		    imagecolorallocate($img, 0, 0, 0),
		    imagecolorallocate($img, 255, 255, 255),
		);
		 
		$x = $y = 0;
		$colors = array(
		    0 => $rgb[0],
		    255 => $rgb[1]
		);
		foreach($im[0] as $row){
		    do{
		        if(isset($colors[$row[$x]])){
		            $c = $colors[$row[$x]];
		        }else{
		            $c = $colors[$row[$x]] = imagecolorallocate($img, $row[$x], $row[$x], $row[$x]);
		        }
		//      imagesetpixel($img, $x, $y, $rgb[$row[$x] < 128 ? 0 : 1]);
		        imagesetpixel($img, $x, $y, $c);
		    }while(isset($row[++$x]));
		    $x = 0;
		    $y++;
		}
		 
		foreach($im[1] as $row){
		    do{
		        imagesetpixel($img, $x, $y, $rgb[$row[$x]]);
		    }while(isset($row[++$x]));
		    $x = 0;
		    $y++;
		}
		header("Content-Type: image/gif");
		imagejpg($img);
    }
}