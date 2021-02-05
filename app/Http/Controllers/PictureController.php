<?php
/**
 * @Description []
 * @authors     XiaoAn
 * @date        2021-01-26 17:57:53
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Controllers;

use App\Http\Services\ImagickService;
use App\Http\Services\BinaryzationService;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PictureController extends BaseController
{
	public $extension;
	/**
	 * [create 获取上传的图片并保存]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-01-28T10:18:17+0800
	 * @param       Request                  $request [description]
	 * @return      [type]                            [description]
	 */
	public function create(Request $request)
	{
		try {
			if (!$request->hasFile('photo')) {
		    	throw new \Exception('请上传指定文件');
			}
			$this->extension = $request->photo->extension();
			if (!in_array($this->extension, ['.jpg', '.jpeg', '.png', '.svg'])) {
				throw new \Exception('图片格式不合法');
			}
			// 获取图片名称
			$name = $request->file('photo')->getClientOriginalName();
			// 存储图片
			$path = $request->photo->store('images/');
			$result = $this->analyse($path, $name, $extension);
		} catch (Exception $e) {
			throw new Exception($e->getMassage());
		}
		
	}
	/**
	 * [analyse 分析图片]
	 * @Description []
	 * @Author      [XiaoAn]
	 * @DateTime    2021-01-28T10:20:12+0800
	 * @return      [type]                   [description]
	 */
    public function analyse($path = '', $name = '')
    {
    	// 图像存放路径
		header('Content-type: image/jpeg');
		// 优化图像
		$imagick_service = new ImagickService();
		$optimize_path = "cell_optimize_" . time() . $this->extension;
		$imagick_service->setImage($path, $name, $this->extension)->optimizeImage()->save($optimize_path);
		// 图像二值化
		$binaryzation_service = new BinaryzationService();
		$binaryzation_service->binaryzation($path, 0.6);
		// 切割图片
		$seg_images = $imagick_service->setImage($optimize_path, $name, $this->extension)->segmentImage(\Imagick::COLORSPACE_RGB, 6, 6);
		// 分析每一个图片单元
		$coordinate_services = new CoordinateSystemService();
		foreach ($seg_images as $seg_image) {
			$coor = $this->setGravity($seg_image);
			$width = imagesx($seg_image);
			$height = imagesy($seg_image);
			// 建立坐标系
			$coordinate_services->init($coor['x'], $coor['y'], $width, $height);
		}
    }
}