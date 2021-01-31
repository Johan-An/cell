<?php

namespace App\Http\Services;

class CoordinateSystemService
{
	protected $x_count; //x的数字长度
	protected $y_count; //y的数字长度
	protected $origin_unit = 1; // 单位
	protected $x_unit = 1;//x坐标单位（倍数）
	protected $y_unit = 1;//y坐标单位（倍数）
	protected $rate   = 10;//原始单位1的像素间隔
	protected $w = $x_count * $rate;//坐标总宽
	protected $h=$y_count*$rate;//坐标总高
	protected $xo_count=25;//坐标原点(相对于0.0的数字长度)
	protected $yo_count=25;//坐标原点(相对于0.0的数字长度)
	protected $xo=$xo_count*$rate;//坐标原点(相对于0.0的像素)
	protected $yo=$yo_count*$rate;//坐标原点(相对于0.0的像素)

}

