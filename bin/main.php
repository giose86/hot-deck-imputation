<?php

use App\HotDeckImputation;

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';


$data = (new \App\Datasource())->getData();

$result =
    HotDeckImputation::init($data)
    ->execute()
    ->getResult();

print_r($result);