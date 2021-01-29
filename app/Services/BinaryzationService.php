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
	 * @param       float                    $threshold [二值化阈值]
	 * @return      [type]                              [description]
	 */
    public function binaryzation($path='', $threshold = 0.5)
    {
    	// 图片灰度化
    	exec("convert {$path} -grayscale Rec709Luma Grayscale gray.jpg");
    	// 二值化
    	exec("convert gray.jpg -threshold {$threshold}  {$path}");
    }
}