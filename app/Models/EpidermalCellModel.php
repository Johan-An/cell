<?php
/**
 * @Description []
 * @authors     XiaoAn
 * @date        2021-01-29 10:53:37
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Models;

use App\Models\CellBaseModel;

/**
 * 表皮细胞模型
 */
class EpidermalCellModel extends CellBaseModel
{
	const ANGLE = 360;// 夹角
    protected $width;     // 宽
    protected $length;    // 长
    protected $perimeter; // 周长

}