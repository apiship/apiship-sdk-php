<?php
require('../../vendor/autoload.php');
use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('admin', 'admin', true);
    $apiship = new Apiship($adapter);

    $from = (new \Apiship\Entity\Request\Part\Calculator\From())
        ->setCityGuid('0c5b2444-70a0-4932-980c-b4dc0d3f02b5')
        ->setCity('Москва')
        ->setRegion('Москва')
        ->setCountryCode('RU');

    $to = (new \Apiship\Entity\Request\Part\Calculator\To())
        ->setCityGuid('c2deb16a-0330-4f05-821f-1d09c93331e6')
        ->setCity('Санкт-Петербург')
        ->setRegion('Санкт-Петербург')
        ->setCountryCode('RU');

    $calculatorRequest = (new \Apiship\Entity\Request\CalculatorRequest())
        ->setFrom($from)
        ->setTo($to)
        ->setWeight(1500)
        ->setWidth(25)
        ->setHeight(20)
        ->setLength(30)
        ->setAssessedCost(100.6)
        ->setCodCost(0)
        ->setPickupDate('2015-11-30')
        ->setSelfPickup(true)
        ->setSelfDelivery(true)
        ->setProviderKeys(['dpd', 'box2box', 'iml']);

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