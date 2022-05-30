<?php

require('../../vendor/autoload.php');

use Apiship\Adapter\GuzzleAdapter;
use Apiship\Apiship;
use Apiship\Entity\Request\CreateOrderRequest;
use Apiship\Entity\Request\Part\Orders\Cost;
use Apiship\Entity\Request\Part\Orders\Item;
use Apiship\Entity\Request\Part\Orders\Order;
use Apiship\Entity\Request\Part\Orders\Recipient;
use Apiship\Entity\Request\Part\Orders\Sender;
use Apiship\Exception\ResponseException;

try {
    $adapter = new GuzzleAdapter('test', 'test', true);
    $apiship = new Apiship($adapter);

    $order = (new Order())
        ->setProviderKey('box2box')
        ->setClientNumber('testNumber1')
        ->setDescription('Очень важный заказ')
        ->setHeight(40)
        ->setLength(40)
        ->setWidth(40)
        ->setWeight(1500)
        ->setPickupType(2)
        ->setDeliveryType(1)
        ->setTariffId(9)
        ->setPointOutId(249)
        ->setPickupDate("2015-11-25")
        ->setDeliveryDate("2015-11-30")
        ->setDeliveryTimeStart("15:10")
        ->setDeliveryTimeEnd("18:10")
        ->setPaymentMethod(1);

    $sender = (new Sender())
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

    $recipient = (new Recipient())
        ->setPostIndex('162604')
        ->setCountryCode('RU')
        ->setCityGuid('ecf48498-25d0-43db-8b68-25112143f95d')
        ->setStreet('Мелиоративная улица')
        ->setHouse('1')
        ->setBlock('1')
        ->setOffice('5')
        ->setCompanyName('ООО "Иваново"')
        ->setContactName('Иванов Иван Иванович')
        ->setPhone('79250001101')
        ->setEmail('info@domain.com')
        ->setComment('Comment');

    $cost = (new Cost())
        ->setAssessedCost(40)
        ->setDeliveryCost(255.05)
        ->setCodCost(0);

    $items[] = (new Item())
        ->setArticul('001189')
        ->setDescription('Товар 1')
        ->setQuantity(2)
        ->setAssessedCost(20)
        ->setCost(0)
        ->setBarcode('3360011110027')
        ->setHeight(20)
        ->setLength(20)
        ->setWidth(20)
        ->setWeight(750);

    $orderRequest = (new CreateOrderRequest())
        ->setOrder($order)
        ->setCost($cost)
        ->setRecipient($recipient)
        ->setSender($sender)
        ->setItems($items);

    $createOrderResult = $apiship->orders()->create($orderRequest);

    print_r($createOrderResult);
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