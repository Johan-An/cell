<?php

namespace App\Http\Services;

/**
 * 建立坐标系
 */
class CoordinateSystemService
{
	protected $x_count; //x的数字长度
	protected $y_count; //y的数字长度
	protected $origin_unit = 1; // 单位
	protected $x_unit = 1;//x坐标单位（倍数）
	protected $y_unit = 1;//y坐标单位（倍数）
	protected $rate   = 10;//原始单位1的像素间隔(比例尺)
	protected $width;//坐标总宽
	protected $height;//坐标总高
	protected $xo_count;//坐标原点(相对于0.0的数字长度)
	protected $yo_count;//坐标原点(相对于0.0的数字长度)
	protected $xo;//坐标原点(相对于0.0的水平像素)
	protected $yo;//坐标原点(相对于0.0的垂直像素)

	public function __construct($xo, $yo)
	{
		$this->xo = $xo;
		$this->yo = $yo;
		$this->xo_count = $xo / $this->rate;
		$this->yo_count = $yo / $this->rate;
	}
	/**
	 * [__set 更改属性]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-01T20:06:07+0800
	 * @param       [type]                   $proverty [description]
	 * @param       [type]                   $value    [description]
	 */
	public function __set($proverty, $value)
	{
		$this->$proverty = $value;
	}
	/**
	 * [create 创建坐标系]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-01T20:08:59+0800
	 * @return      [type]                   [description]
	 */
	public function create()
	{
		$img = imagecreatetruecolor($width,$height);
	    //创建一个颜色
	    $background = imagecolorallocate($img, 255, 255, 255);
		$color = imagecolorallocate($img, 255, 0, 255);
	    //画直线
	    imageline($img,$xo,0,$xo,$height,$background);
		imageline($img,0,$yo,$width,$yo,$background);
	 	for($i=0;$i<=$w;$i+=$x_pixel){//宽
				
				imageline($img,$xo+$i,$yo,$xo+$i,$yo-3,$background);
				imagestring ($img , 1 , $xo+$i -3, $yo+7 , (string)$i/$x_pixel, $background );
				if($i!=0){
					imageline($img,$xo-$i,$yo,$xo-$i,$yo-3,$background);
					imagestring ($img , 1 , $xo-$i -3, $yo+7 , (string)-$i/$x_pixel, $background );			
				} 
		} 
	 	for($i=0;$i<=$h;$i+=$y_pixel){//高
			imageline($img,$xo,$yo+$i,$xo+3,$yo+$i,$background);
			imagestring ($img , 1 , $xo-15 , $yo+$i-7 , (string)$i/$y_pixel, $background );
			if($i!=0){
				imageline($img,$xo,$yo-$i,$xo+3,$yo-$i,$background);
				imagestring ($img , 1 , $xo-15 , $yo-$i-7 , (string)-$i/$y_pixel, $background );				
			}
		}
		draw($fun,$img,$color,$rate,$w,$xo,$yo);
	    //输出图像到网页(或者另存为)
	    header("content-type: image/png");
	    imagepng($img);
	    //销毁该图片(释放内存)
	    imagedestroy($img);
	}
	/**
	 * [draw 画图]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-01T20:12:21+0800
	 * @param       [type]                   $fun   [面积]
	 * @param       [type]                   $img   [图像]
	 * @param       [type]                   $color [颜色]
	 * @param       [type]                   $rate  [比率]
	 * @param       [type]                   $w     [宽]
	 * @param       [type]                   $xo    [坐标原点(相对于0.0的像素)]
	 * @param       [type]                   $yo    [description]
	 * @return      [type]                          [description]
	 */
	public function draw($fun,$img,$color,$rate,$w,$xo,$yo)
	{
		
		for($i=0;$i<=$w;$i+=1){
			
	   		$result=0;
			$x= +$i;
			$a=$x/$rate;
			$m=$a;
			//print_r($m);
			eval($fun);
			$b=$result;
			$y=$b*$rate;
			$xi = $x-1;
			$ai=$xi/$rate;
			$m=$ai;
			eval($fun);
			$bi=$result;
			$yi=$bi*$rate;
			
			imageline($img,$xo+$x,$yo-$y,$xo+$xi,$yo-$yi,$color);  
	  		$result=0;
			$x= -$i;
			
			$a=$x/$rate;
			//print_r($x);
			$m=$a;
			eval($fun);
			$b=$result;
			$y=$b*$rate;
			$xi = $x+1;
			$ai=$xi/$rate;
			$m=$ai;
			eval($fun);
			$bi=$result;
			$yi=$bi*$rate;
			imageline($img,$xo+$x,$yo-$y,$xo+$xi,$yo-$yi,$color);
		}
	}
}

