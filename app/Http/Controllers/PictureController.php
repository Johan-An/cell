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
	protected $coordinate_services;
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
		$this->coordinate_services = new CoordinateSystemService();
		foreach ($seg_images as $seg_image) {
			$coor = $this->setGravity($seg_image);
			$width = imagesx($seg_image);
			$height = imagesy($seg_image);
			// 建立坐标系
			$this->coordinate_services->init($coor['x'], $coor['y'], $width, $height);
			// 扫描边界点
			$x_boundary_point = $this->coordinate_services->scanXBoundatyPoint($seg_image);
			$y_boundary_point = $this->coordinate_services->scanYBoundatyPoint($seg_image);
			// 任意取出两点
			$this->bisectionVertex($seg_image, $left_boundary, $right_boudary);

		}
    }
    /**
     * [bisectionVertex 通过二分法获取顶点]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-07T12:10:43+0800
     * @param       [type]                   $seg_image        [图片路径]
     * @param       [type]                   $x_boundary_point [水平边界点]
     * @param       [type]                   $right_boudary    [右边界点]
     * @return      [type]                                     [description]
     */
    public function bisectionVertex($seg_image, $x_boundary_point_left, $x_boundary_point_right)
    {
    	$rand = $this->diffRand($x_boundary_point_left, $x_boundary_point_right);
		$x_left  = $rand['left'];
		$x_right = $rand['right'];
		$left_point  = $this->coordinate_services->scanYPointByX($seg_image, $x_left);
		$right_point = $this->coordinate_services->scanYPointByX($seg_image, $x_right);
		// 取出中间值
		$x_middle = ($x_left + $x_right) / 2;
		$middle_point = $this->coordinate_services->scanYPointByX($seg_image, $x_middle);
		$left_gradient  = $this->calculateGradient($left_point['top'][0], $left_point['top'][1], $middle_point['top'][0], $middle_point['top'][1]);
		$right_gradient = $this->calculateGradient($middle_point['top'][0], $middle_point['top'][1],$right_point['top'][0], $right_point['top'][1]);
    }
    /**
     * [diffRand 获取不同任意值]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-07T11:13:06+0800
     * @param       [type]                   $min [较小值]
     * @param       [type]                   $max [较大值]
     * @return      [type]                        [description]
     */
    public function diffRand($min, $max)
    {
    	$x1 = rand($min, $max);
		$x2 = rand($min, $max);
		if ($x1 > $x2) {
			$left  = $x2;
			$right = $x1;
		} elseif($x1 < $x2) {
			$left  = $x1;
			$right = $x2;
		} else {
			return $this->diffRand($min, $max);
		}
		return [$left, $right];
    }
    /**
     * [calculateGradient 计算斜率]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-07T11:55:29+0800
     * @param       [type]                   $x1 [坐标1的x值]
     * @param       [type]                   $y1 [坐标1的y值]
     * @param       [type]                   $x2 [坐标2的x值]
     * @param       [type]                   $y2 [坐标2的y值]
     * @return      [type]                       [description]
     */
    public function calculateGradient($x1, $y1, $x2, $y2)
    {
    	if ($x1 == $x2) {
    		return none;
    	}
    	$gradient = ($y2 - $y1) / ($x2 - $x1);
    	return $gradient;
    }
}