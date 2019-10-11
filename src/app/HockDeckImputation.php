<?php

/**
 * User: giosex
 * Date: 2019-10-11
 * Time: 17:29
 */

namespace App;


class HockDeckImputation
{

    /** @var array $data */
    private $data;

    /** @var array $data */
    private $dataResult;

    private function __construct(array $data)
    {
        $this->data = $data;
        $this->dataResult = [];
    }

    public static function init(array $data): HockDeckImputation
    {
        return new HockDeckImputation($data);
    }

    public function execute()
    {
        for ($i = 0; $i < count($this->data); $i++) {

            $minDistance = count($this->data);
            $copyFromK = 0;
            $copyToI = 0;

            for ($k = $i + 1; $k < count($this->data); $k++) {

                $distance = $this->calculateDistance($this->data[$i], $this->data[$k]);

                if ($distance > 0 &&  $distance < 6 && $distance < $minDistance) {
                    $minDistance = $distance;
                    $copyFromK = $k;
                    $copyToI = $i;
                }
            }
            $this->copyFrom($copyFromK, $copyToI);
        }
        $this->dataResult = $this->data;
        return $this;
    }

    public function getResult(): array
    {
        return $this->dataResult;
    }

    private function calculateDistance(array $obj1, array $obj2)
    {
        $distance = 0;
        foreach ($obj1 as $key => $val) {
            $distance += $obj1[$key] !== $obj2[$key] ? 1 : 0;
        }
        return $distance;
    }

    private function copyFrom(int $fromObj, int $toObj)
    {
        foreach ($this->data[$fromObj] as $key => $val) {

            $tmp = $this->data[$fromObj][$key];
            $this->data[$toObj][$key] = $val != null ? $val : $tmp;
        }
    }
}
