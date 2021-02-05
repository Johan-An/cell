<?php
/**
 * @Description 图片的前期优化
 * @authors     XiaoAn
 * @date        2021-01-27 20:28:14
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class ImagickService extends AnotherClass
{
	protected $image;
    protected $name;
    protected $seg_images;
    /**
     * [setImage 设置图片]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-04T11:24:40+0800
     * @param       string                   $path      [路径]
     * @param       string                   $name      [名称]
     * @param       [type]                   $extension [扩展]
     */
    public function setImage($path = '', $name = '', $extension)
    {
        $this->image      = new \Imagick($path);
        $this->name      = $name;
        $this->extension = $extension;
        return $this;
    }
    /**
     * [optimizeImage 图像优化]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-01-27T20:31:12+0800
     * @return      [type]                   [description]
     */
    public function optimizeImage()
    {
    	// 移除不平均的光照强度干扰
		$this->image->despeckleImage();
		// 改善图片质量
		$this->image->enhanceImage();
		// 加强边界
		$this->image->edgeImage();
		// 返回图片对象
		return $this;
    }
    /**
     * [segmentImage 切割图片并存储]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-01-29T10:29:00+0800
     * @param       [type]                   $colorSpace       [description]
     * @param       [type]                   $clusterThreshold [description]
     * @param       [type]                   $smoothThreshold  [description]
     * @return      [type]                                     [description]
     */
    public function segmentImage($colorSpace, $clusterThreshold, $smoothThreshold)
    {
        $images_blob  = $this->image->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
        $images_count = count($images_blob);
        $time = time();
        for($i = 0; $i < $images_count; $i++){
            // 切割后的图片的名称
            $seg_images_name = $this->name . '_' . $time . '_' . $i . $this->extension;
            // 保存切割后的图片
            $this->seg_images[] = $seg_images_name;
            Storage::put($seg_images_name, $contents);
        }
        return $this->seg_images;
    }
    /**
     * [setGravity 获取图片的几何重心]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-04T11:30:53+0800
     * @param       [type]                   $path [description]
     */
    public function setGravity($path)
    {
        $coordinate = $this->image->setGravity($path);
        return $coordinate;
    }
    /**
     * [save 保存图像]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-01-27T20:35:32+0800
     * @param       [type]                   $image_blob [description]
     * @return      [type]                               [description]
     */
    public function save($path = '')
    {
    	$this->image->writeImage($path);
    	return $path;
    }

}