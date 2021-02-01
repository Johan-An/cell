<?php
/**
 * @Description []
 * @authors     XiaoAn
 * @date        2021-01-28 18:39:42
 * @platform    Windows
 * @Created By Sublime Text3
 */
namespace App\Models;

use App\Models\CellBaseModel;

/**
 * 神经细胞模型
 */
class NerveCellModel extends CellBaseModel
{
   	const ANGLE = 72;// 夹角
    protected $width;     // 宽
    protected $length;    // 长
    protected $perimeter; // 周长
}