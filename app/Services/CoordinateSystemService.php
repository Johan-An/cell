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
	protected $left_boundary_point = [];  // 左边界点坐标
	protected $right_boundary_point = []; // 右边界点坐标
	protected $top_boundary_point = [];  // 上边界点坐标
	protected $bottom_boundary_point = []; // 下边界点坐标
	protected $left_point_rgb = []; // 左侧点rgb
	protected $right_point_rgb = []; // 右侧点rgb
	protected $top_point_rgb = []; // 上侧点rgb
	protected $bottom_point_rgb = []; // 下侧点rgb
	protected $left_point;// 左侧点坐标
	protected $right_point;// 右侧点坐标
	protected $gradient;// 斜率
	protected $vertexs;// 顶点

	public function init($xo, $yo, $img_width, $img_height)
	{
		$this->xo = $xo;
		$this->yo = $yo;
		$this->xo_count = $xo / $this->rate;
		$this->yo_count = $yo / $this->rate;
		$this->width    = $img_width / $this->rate * 2;
		$this->height   = $img_height / $this->rate * 2;
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
	    imageline($img,$this->xo,0,$this->xo,$height,$background);
		imageline($img,0,$this->yo,$width,$this->yo,$background);
	 	for($i=0;$i<=$w;$i+=$x_pixel){//宽
				
				imageline($img,$this->xo + $i,$this->yo,$this->xo+$i,$this->yo-3,$background);
				imagestring ($img , 1 , $this->xo+$i -3, $yo+7 , (string)$i/$x_pixel, $background );
				if($i!=0){
					imageline($img,$xo-$i,$this->yo,$xo-$i,$this->yo-3,$background);
					imagestring ($img , 1 , $xo-$i -3, $this->yo+7 , (string)-$i/$x_pixel, $background );			
				} 
		} 
	 	for($i=0;$i<=$h;$i+=$y_pixel){//高
			imageline($img,$this->xo,$this->yo+$i,$this->xo+3,$this->yo+$i,$background);
			imagestring ($img , 1 , $this->xo-15 , $this->yo+$i-7 , (string)$i/$y_pixel, $background );
			if($i!=0){
				imageline($img,$this->xo,$this->yo-$i,$this->xo+3,$this->yo-$i,$background);
				imagestring ($img , 1 , $this->xo-15 , $this->yo-$i-7 , (string)-$i/$y_pixel, $background );				
			}
		}
		$this->draw($img,$color);
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
	 * @param       [type]                   $img   [图像]
	 * @param       [type]                   $color [颜色]
	 * @param       [type]                   $rate  [比率]
	 * @param       [type]                   $w     [宽]
	 * @param       [type]                   $xo    [坐标原点(相对于0.0的像素)]
	 * @param       [type]                   $yo    [description]
	 * @return      [type]                          [description]
	 */
	public function draw($img,$color)
	{
		
		for($i=0;$i<=$this->width;$i+=1){
			
	   		$result = 0;
			$x += $i;
			$a = $x/$this->rate;
			$m = $a;
			$b=$result;
			$y=$b*$this->rate;
			$xi = $x-1;
			$ai=$xi/$this->rate;
			$m=$ai;
			$bi=$result;
			$yi=$bi*$this->rate;
			
			imageline($img,$this->xo+$x,$this->yo-$y,$this->xo+$xi,$this->yo-$yi,$color);  
	  		$result=0;
			$x= -$i;
			
			$a=$x/$this->rate;
			//print_r($x);
			$m=$a;
			$b=$result;
			$y=$b*$this->rate;
			$xi = $x+1;
			$ai=$xi/$this->rate;
			$m=$ai;
			$bi=$result;
			$yi=$bi*$this->rate;
			imageline($img,$this->xo+$x,$this->yo-$y,$this->xo+$xi,$this->yo-$yi,$color);
		}
	}
	/**
	 * [getXBoundatyPoint 扫描x轴的边界点]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-05T16:31:02+0800
	 * @param       string                   $path [description]
	 * @return      [type]                         [description]
	 */
	public function scanXBoundatyPoint($path = '')
	{
		$image  = imagecreatefrompng($path);
		$width  = imagesx($image);
		$height = imagesy($image);
		$map = [];
		$i = 0;
		for ($x = 0; $x < $width; $x++) {
			$this->left_point_rgb = [];
		    $map[$x] = [];
		    for ($y = 0; $y < $height; $y++) {
		        $color = imagecolorat($image, $x, $y);
		        $r = ($color >> 16) & 0xFF;
		        $g = ($color >> 8) & 0xFF;
		        $b = $color & 0xFF;
		        // 左侧点像素为白色，该点像素为黑色，则认为该点为左边界点
		        if (!empty($this->left_point_rgb)) {
		        	if ($i >= 1) {
		        		continue;
		        	}
		        	if ($this->left_point_rgb['r'] == 255 
		        		&& $this->left_point_rgb['g'] == 255 
		        		&& $this->left_point_rgb['b'] == 255) {
		        		if ($r == 0 && $g == 0 && $b == 0) {
		        			$this->left_boundary_point = [
		        				$x / $this->rate, 
		        				$y / $this->rate
		        			];
		        			$i++;
		        		}
		        	}
		        }
		        // 左侧点像素为黑色，该点像素为白色，则认为该点为右边界点
		        if (!empty($this->left_point_rgb)) {
		        	if ($this->left_point_rgb['r'] == 0 
		        		&& $this->left_point_rgb['g'] == 0 
		        		&& $this->left_point_rgb['b'] == 0) {
		        		if ($r == 255 && $g == 255 && $b == 255) {
		        			$this->right_boundary_point = [
		        				$x / $this->rate, 
		        				$y / $this->rate
		        			];
		        		}
		        	}
		        }
		        $this->left_point_rgb = [
		            "r" => $r,
		            "g" => $g,
		            "b" => $b
		        ];
		    }
		}
		return [
			'left'  => $this->left_boundary_point,
			'right' => $this->right_boundary_point
		];
	}
	/**
	 * [getYBoundatyPoint 扫描y轴的边界点]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-05T16:31:02+0800
	 * @param       string                   $path [description]
	 * @return      [type]                         [description]
	 */
	public function scanYBoundatyPoint($path = '')
	{
		$image  = imagecreatefrompng($path);
		$width  = imagesx($image);
		$height = imagesy($image);
		$map = [];
		$i = 0;
		for ($y = 0; $y < $height; $y++) {
		    $map[$y] = [];
		    $this->top_point_rgb = [];
		    for ($x = 0; $x < $width; $x++) {
		        $color = imagecolorat($image, $x, $y);
		        $r = ($color >> 16) & 0xFF;
		        $g = ($color >> 8) & 0xFF;
		        $b = $color & 0xFF;
		        // 上侧点像素为黑色，该点像素为白色，则认为该点为上边界点
		        if (!empty($this->top_point_rgb)) {
		        	if (!$i >= 1) {
		        		continue;
		        	}
		        	if ($this->top_point_rgb['r'] == 255 
		        		&& $this->top_point_rgb['g'] == 255 
		        		&& $this->top_point_rgb['b'] == 255) {
		        		if ($r == 0 && $g == 0 && $b == 0) {
		        			$this->top_boundary_point = [
		        				$x / $this->rate, 
		        				$y / $this->rate
		        			];
		        			$i++;
		        		}
		        	}
		        }
		        // 上侧点像素为白色，该点像素为黑色，则认为该点为下边界点
		        if (!empty($this->top_point_rgb)) {
		        	if ($this->top_point_rgb['r'] == 0 
		        		&& $this->top_point_rgb['g'] == 0 
		        		&& $this->top_point_rgb['b'] == 0) {
		        		if ($r == 255 && $g == 255 && $b == 255) {
		        			$this->bottom_boundary_point = [
		        				$x / $this->rate, 
		        				$y / $this->rate
		        			];
		        		}
		        	}
		        }
		        $this->top_point_rgb = [
		            "r" => $r,
		            "g" => $g,
		            "b" => $b
		        ];
		    }
		}
		return [
			'top'    => $this->top_boundary_point,
			'bottom' => $this->bottom_boundary_point
		];
	}
	/**
	 * [scanYPointByX 根据x坐标点获取对应的边界点上的y值]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-07T11:38:48+0800
	 * @param       string                   $path   [图片路径]
	 * @param       string                   $x [x坐标值]
	 * @return      [type]                           [description]
	 */
	public function scanYPointByX($path = '', $x = '')
	{
		$image  = imagecreatefrompng($path);
		$height = imagesy($image);
		$map = [];
		for ($y = 0; $y < $height; $y++) {
	        $color = imagecolorat($image, $x, $y);
	        $r = ($color >> 16) & 0xFF;
	        $g = ($color >> 8) & 0xFF;
	        $b = $color & 0xFF;
	        // 上侧点像素为黑色，该点像素为白色，则认为该点为上边界点
	        if (!empty($this->top_point_rgb)) {
	        	if ($this->top_point_rgb['r'] == 255 
	        		&& $this->top_point_rgb['g'] == 255 
	        		&& $this->top_point_rgb['b'] == 255) {
	        		if ($r == 0 && $g == 0 && $b == 0) {
	        			$this->top_boundary_point = [
	        				$x / $this->rate, 
	        				$y / $this->rate
	        			];
	        		}
	        	}
	        }
	        // 上侧点像素为白色，该点像素为黑色，则认为该点为下边界点
	        if (!empty($this->top_point_rgb)) {
	        	if ($this->top_point_rgb['r'] == 0 
	        		&& $this->top_point_rgb['g'] == 0 
	        		&& $this->top_point_rgb['b'] == 0) {
	        		if ($r == 255 && $g == 255 && $b == 255) {
	        			$this->bottom_boundary_point = [
	        				$x / $this->rate, 
	        				$y / $this->rate
	        			];
	        		}
	        	}
	        }
	        $this->top_point_rgb = [
	            "r" => $r,
	            "g" => $g,
	            "b" => $b
	        ];
	    }
		return [
			'top'    => $this->top_boundary_point,
			'bottom' => $this->bottom_boundary_point
		];
	}
	/**
	 * [scanVertexPoints 扫描顶点坐标]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-07T17:57:31+0800
	 * @param       string                   $path  [图片路径]
	 * @return      [array]                         [顶点坐标集合]
	 */
	public function scanVertexPoints($path = '')
	{
		$image  = imagecreatefrompng($path);
		$width  = imagesx($image);
		$height = imagesy($image);
		$map = [];
		for ($x = 0; $x < $width; $x++) {
			$this->left_point_rgb = [];
		    $map[$x] = [];
		    for ($y = 0; $y < $height; $y++) {
		        $color = imagecolorat($image, $x, $y);
		        $r = ($color >> 16) & 0xFF;
		        $g = ($color >> 8) & 0xFF;
		        $b = $color & 0xFF;
		        // 左侧点像素为白色，该点像素为黑色，则认为该点为y轴左侧边上的点
		        if (!empty($this->left_point_rgb)) {
		        	if ($this->left_point_rgb['r'] == 255 
		        		&& $this->left_point_rgb['g'] == 255 
		        		&& $this->left_point_rgb['b'] == 255) {
		        		if ($r == 0 && $g == 0 && $b == 0) {
		        			$x = $x / $this->rate;
		        			$y = $y / $this->rate;
		        			if (!empty($this->left_point)) {
		        				$gradient = ($this->left_point[0] - $x) / ($this->left_point[1] - $y);
		        				// 斜率不同即为顶点
		        				if (!empty($this->gradient) && ($gradient != $this->gradient)) {
		        					$this->vertexs[] = [
		        						'x' => $this->left_point[0],
		        						'y' => $this->left_point[1]
		        					];
		        				}
		        				$this->gradient = $gradient;
		        			}
		        			$this->left_point = [$x, $y];
		        		}
		        	}
		        }
		        $this->left_point_rgb = [
		            "r" => $r,
		            "g" => $g,
		            "b" => $b
		        ];
		    }
		}
		return $this->vertexs;
	}
	/**
	 * [calculateAngle 计算角度]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-02-08T15:54:31+0800
	 * @param       [type]                   $x1 [坐标1的横坐标]
	 * @param       [type]                   $y1 [坐标1的纵坐标]
	 * @param       [type]                   $x2 [坐标2的横坐标]
	 * @param       [type]                   $y2 [坐标2的纵坐标]
	 * @return      [type]                       [description]
	 */
	public function calculateAngle($x1, $y1, $x2, $y2)
	{
		$abs_x1 = abs($x1);
		$abs_y1 = abs($y1);
		$asin1 = ($abs_y1) / sqrt(pow($abs_x1, 2) + pow($abs_y1, 2));
		$abs_x2 = abs($x2);
		$abs_y2 = abs($y2);
		$asin2 = ($abs_y2) / sqrt(pow($abs_x2, 2) + pow($abs_y2, 2));
		$angle1 = rad2deg(asin($asin1));
		$angle2 = rad2deg(asin($asin2));
		return 180 - $angle1 - $angle2;
	}
	public function getHec ()
  	{
	    $size = getimagesize($this->imgPath);
	    $res = imagecreatefrompng($this->imgPath);
	    for ($i = 0; $i < $size[1]; ++ $i) {
	      for ($j = 0; $j < $size[0]; ++ $j) {
	        $rgb = imagecolorat($res, $j, $i);
	        $rgbarray = imagecolorsforindex($res, $rgb);
	        if ($rgbarray['red'] < 125 || $rgbarray['green'] < 125 ||
	             $rgbarray['blue'] < 125) {
	          $data[$i][$j] = 1;
	        } else {
	          $data[$i][$j] = 0;
	        }
	      }
	    }
	    $this->imgSize = $size;
	    $this->hecData = $data;
  	}
 	public function magHorData ()
    {
	    $data = $this->hecData;
	    $size = $this->imgSize;
	    $z = 0;
	    for ($i = 0; $i < $size[1]; ++ $i) {
	      if (in_array('1', $data[$i])) {
	        $z ++;
	        for ($j = 0; $j < $size[0]; ++ $j) {
	          if ($data[$i][$j] == '1') {
	            $newdata[$z][$j] = 1;
	          } else {
	            $newdata[$z][$j] = 0;
	          }
	        }
	      }
	    }
	    return $this->horData = $newdata;
	  }
}

