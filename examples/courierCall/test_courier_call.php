<?php

require('../../vendor/autoload.php');

use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('test', 'test', true);
    $apiship = new Apiship($adapter);

    $courierCallRequest = (new \Apiship\Entity\Request\CourierCallRequest())
        ->setProviderKey('cdek')
        ->setDate('2024-03-28')
        ->setTimeStart('10:00')
        ->setTimeEnd('18:00')
        ->setHeight(20)
        ->setLength(20)
        ->setWidth(20)
        ->setWeight(750)
        ->setPostIndex('162604')
        ->setCountryCode('RU')
        ->setCityGuid('49333ad7-781c-4248-96a6-c006177294ec')
        ->setStreet('Мелиоративная улица')
        ->setHouse('1')
        ->setBlock('1')
        ->setOffice('5')
        ->setCompanyName('ООО "Иваново"')
        ->setContactName('Иванов Иван Иванович')
        ->setPhone('79250001101')
        ->setEmail('info@domain.com')
        ->setComment('Comment');

    $courierCallResult = $apiship->courierCall()->create($courierCallRequest);

    print_r($courierCallResult);
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
