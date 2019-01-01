<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 6/23/2017
 * Time: 01:09
 */

namespace App\Repositories;




//use PHPExcel_Style_Color;

class ExcelRepository
{


    public static function getPageSetting(&$sheet)
    {
        $font = 'W_nazanin';
        $alignment = 'center';
        $rtl = true;

        $color = '#000000';
        $sheet->setStyle(array(
            'font' => array(
                'bold' =>false,
                'size' =>10,
                'text-align' =>$alignment,
                'color' => array('rgb' => $color),
                'name' => $font
            )
        ));
        $sheet->setAllBorders('medium');

        $sheet->setRightToLeft($rtl);
    }


}