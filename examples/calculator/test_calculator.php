<?php

require('../../vendor/autoload.php');

use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Entity\Request\CalculatorRequest;
use Apiship\Entity\Request\Part\Calculator\From;
use Apiship\Entity\Request\Part\Calculator\Place;
use Apiship\Entity\Request\Part\Calculator\To;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('test', 'test', true);
    $apiship = new Apiship($adapter);

    $from = (new From())
        ->setCityGuid('0c5b2444-70a0-4932-980c-b4dc0d3f02b5')
        ->setCity('Москва')
        ->setRegion('Москва')
        ->setCountryCode('RU');

    $to = (new To())
        ->setCityGuid('c2deb16a-0330-4f05-821f-1d09c93331e6')
        ->setCity('Санкт-Петербург')
        ->setRegion('Санкт-Петербург')
        ->setCountryCode('RU');

    $calculatorRequest = (new CalculatorRequest())
        ->setFrom($from)
        ->setTo($to)
        ->setAssessedCost(100.6)
        ->setCodCost(0)
        ->setDeliveryTypes([1])
        ->setPickupTypes([1])
        ->setIncludeFees(true)
        ->setProviderKeys(['cdek'])
        ->addPlace(
            (new Place())
                ->setWeight(1500)
                ->setWidth(25)
                ->setHeight(20)
                ->setLength(30)
        );

    $calculatorResult = $apiship->calculator()->calculate($calculatorRequest);

    print_r($calculatorResult);
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