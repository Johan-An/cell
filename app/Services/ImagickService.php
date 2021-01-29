<?php
/**
 * @Description 图片的前期优化
 * @authors     XiaoAn
 * @date        2021-01-27 20:28:14
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Services;

class ImagickService extends AnotherClass
{
	protected $image;
    
    public function setImage($path = '')
    {
        $this->image = new \Imagick($path);
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
     * [segmentImage 切割图片]
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
        $this->image->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
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