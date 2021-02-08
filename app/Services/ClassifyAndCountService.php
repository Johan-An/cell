<?php
/**
 * @Description 对细胞进行分类合统计
 * @authors     XiaoAn
 * @date        2021-02-08 16:22:02
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Http\Services;

use App\Models\EpidermalCellModel;
use App\Models\MuscleCellModel;
use App\Models\NerveCellModel;

class ClassifyAndCountService
{
    public function __construct()
    {
    	$this->classification = [
			"EpidermalCell" => [
				"angle" => EpidermalCellModel::ANGLE,
				"count" => 0,
			],
			"MuscleCell" => [
				"angle" => MuscleCellModel::ANGLE,
				"count" => 0,
			],
			"NerveCell" => [
				"angle" => NerveCellModel::ANGLE,
				"count" => 0,
			]
    		
    	];
    }
    /**
     * [classify 分类并计算]
     * @Description []
     * @Author      [XiaoAn]
     * @DateTime    2021-02-08T17:07:31+0800
     * @param       [type]                   $angle [description]
     * @return      [type]                          [description]
     */
    public function classify($angle)
    {
    	foreach ($this->classification as &$classification) {
    		if ($angle == $classification['angle']) {
    			$classification['count'] ++;
    		}
    	}
    	return $this->classification;
    }
}