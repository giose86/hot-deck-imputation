<?php

/**
 * User: giosex
 * Date: 2019-10-11
 * Time: 17:30
 */

namespace App;


class Datasource
{

    public function getData()
    {
        $dataSet = [
            ['weight' => '91', 'age' => '29', 'sex' => 'M', 'state' => 'New Jersey', 'height' => '180', 'cholesterol' => null, 'painType' => null, 'defectType' => null, 'diagnosis' => null],

            ['weight' => '83', 'age' => '38', 'sex' => 'M', 'state' => 'Ohio', 'height' => '174', 'cholesterol' => null, 'painType' => '2', 'defectType' => null, 'diagnosis' => 'present'],

            ['weight' => '91', 'age' => '29', 'sex' => 'M', 'state' => 'New Jersey', 'height' => '180', 'cholesterol' => '331', 'painType' => null, 'defectType' => 'normal', 'diagnosis' => null],

            ['weight' => '58', 'age' => '25', 'sex' => 'F', 'state' => 'Washington', 'height' => '160', 'cholesterol' => null, 'painType' => null, 'defectType' => null, 'diagnosis' => null],

            ['weight' => '91', 'age' => '29', 'sex' => 'M', 'state' => 'New Jersey', 'height' => '180', 'cholesterol' => null, 'painType' => '2', 'defectType' => null, 'diagnosis' => 'absent'],

            ['weight' => '83', 'age' => '38', 'sex' => 'M', 'state' => 'Ohio', 'height' => '174', 'cholesterol' => '340', 'painType' => '2', 'defectType' => 'normal', 'diagnosis' => 'present'],

            ['weight' => '58', 'age' => '25', 'sex' => 'F', 'state' => 'Washington', 'height' => '160', 'cholesterol' => null, 'painType' => null, 'defectType' => null, 'diagnosis' => 'absent'],
        ];

        return $dataSet;
    }
}
