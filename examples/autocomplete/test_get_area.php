<?php

require('../../vendor/autoload.php');

use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('test', 'test', true);
    $apiship = new Apiship($adapter);

    $autocompleteResult = $apiship->autocomplete()->getArea('Моск');

    print_r($autocompleteResult);
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