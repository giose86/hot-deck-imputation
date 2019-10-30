<?php

/**
 *
 * User: giosex
 * Date: 2019-10-13
 * Time: 21:51
 */

namespace App;

use PHPUnit\Framework\TestCase;

class HotDeckImputationTest extends TestCase
{

    public function testWith2Row()
    {
        $expected = [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'2','painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>'2','painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
        ];

        $result =
            HotDeckImputation::init($this->get2RowData())
                ->execute()
                ->getResult();

        $this->assertEquals($expected, $result);
    }

    public function testWith3Row()
    {
        $expected = [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'10','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>null,'painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>null,'painType'=>'1','defectType'=>null,'diagnosis'=>'present'],
        ];

        $result =
            HotDeckImputation::init($this->get3RowData())
                ->execute()
                ->getResult();

        $this->assertEquals($expected, $result);
    }

    public function testWith6Row()
    {
        $expected = [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
            ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
            ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
            ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
            ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
        ];

        $result =
            HotDeckImputation::init($this->get6RowData())
                ->execute()
                ->getResult();

        $this->assertEquals($expected, $result);
    }

    private function get2RowData()
    {

        return [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>'2','painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
        ];
    }

    private function get3RowData()
    {
        return [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'10','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>null,'painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'Ohio','height'=>'180','cholesterol'=>null,'painType'=>'1','defectType'=>null,'diagnosis'=>'present'],
        ];
    }

    private function get6RowData()
    {
        return [
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>null],
            ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=> null,'painType' =>'2','defectType' =>null,'diagnosis'=>'present'],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>null,'defectType'=>'normal','diagnosis'=>null],
            ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=> null,'defectType'=>null,'diagnosis'=>null],
            ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>null,'painType'=>'2','defectType'=>null,'diagnosis'=>'absent'],
            ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
            ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
        ];
    }
}
