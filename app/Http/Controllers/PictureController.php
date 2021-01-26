<?php
/**
 * @Description []
 * @authors     XiaoAn
 * @date        2021-01-26 17:57:53
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PictureController extends BaseController
{
    public function create()
    {
    	ini_set('display_errors',1); 
		header('Content-type: image/jpeg'); 
		$image = new Imagick('cell.jpg'); 
		$color = new ImagickPixel(); 
		$color->setColor("rgb(220,220,220)"); 
		$image->oilPaintImage(1); 
		echo $image; 
    }
}