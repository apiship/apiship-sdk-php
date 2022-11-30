<?php

namespace Apiship\Enum;

final class DeliveryTypes
{
    /**
     * Доставка груза до двери клиента
     * @var int
     */
    public const TO_CUSTOMER_ADDRESS = 1;
 
    /**
     * Доставка груза до пункта выдачи
     * @var int
     */
    public const TO_DELIVERY_TERMINAL = 2;
}