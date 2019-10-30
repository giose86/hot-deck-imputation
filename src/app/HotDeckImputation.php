<?php

/**
 * User: giosex
 * Date: 2019-10-11
 * Time: 17:29
 */

namespace App;


class HotDeckImputation
{

    /** @var array $data */
    private $data;

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function init(array $data): HotDeckImputation
    {
        return new HotDeckImputation($data);
    }

    public function execute()
    {
        $dataSize = count($this->data);
        for ($i = 0; $i < $dataSize; $i++) {

            $minDistance = count($this->data[0]);
            $copyFromTo = [];

            for ($k = 0; $k < $dataSize; $k++) {

                if ($i === $k) continue;

                $distance = $this->calculateDistance($this->data[$i], $this->data[$k]);
                if ($distance > 0 &&  $distance < 6 && $distance <= $minDistance) {
                    $copyFromTo[$distance][] = [$k, $i];
                    $minDistance = $distance;
                }
            }
            if (empty($copyFromTo)) continue;

            $this->copyFrom($this->data, $copyFromTo[$minDistance]);
        }
        return $this;
    }

    public function getResult(): array
    {
        return $this->data;
    }

    private function calculateDistance(array $obj1, array $obj2)
    {
        $distance = 0;
        foreach ($obj1 as $key => $val) {
            $distance += $obj1[$key] !== $obj2[$key] ? 1 : 0;
        }
        return $distance;
    }

    private function copyFrom(&$data, array $fromToIndexes)
    {
        foreach ($fromToIndexes as $fromToIx) {

            $objTo = array_filter($data[$fromToIx[1]], function($v) {
                return $v === null;
            });
            $keysTo = array_keys($objTo);

            foreach ($keysTo as $key) {
                $data[$fromToIx[1]][$key] = $data[$fromToIx[0]][$key];
            }
        }
    }
}
