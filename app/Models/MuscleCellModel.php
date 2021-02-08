<?php
/**
 * @Description []
 * @authors     XiaoAn
 * @date        2021-01-29 10:57:49
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Models;

use App\Models\CellBaseModel;

/**
 * 肌肉细胞模型
 */
class MuscleCellModel extends CellBaseModel
{
    const ANGLE = 180;// 夹角
    protected $width;     // 宽
    protected $length;    // 长
    protected $perimeter; // 周长
}