<?php

require('../../vendor/autoload.php');

use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('test', 'test', true);
    $apiship = new Apiship($adapter);

    $waybillsResult = $apiship->orders()->getWaybills([4503722, 4503723]);

    print_r($waybillsResult);
} catch (ResponseException $e) {
    echo $e->getErrorApishipCode() . PHP_EOL;
    echo $e->getErrorMessage() . PHP_EOL;
    echo $e->getErrorDescription() . PHP_EOL;
    echo $e->getErrorMoreInfo() . PHP_EOL;
    print_r($e->getErrors());
    exit;
} catch (Exception $e) {
    print_r($e->getMessage());
    exit;
}