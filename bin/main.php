<?php

use App\HockDeckImputation;

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';


$data = (new \App\Datasource())->getData();

$result =
    HockDeckImputation::init($data)
    ->execute()
    ->getResult();

print_r($result);