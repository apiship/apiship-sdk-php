<?php

namespace Apiship\Enum;

final class PickupTypes
{
    /**
     * Забор груза от двери клиента
     * @var int
     */
    public const FROM_DOOR = 1;

    /**
     * Клиент сам доставляет груз на пункт приема СД
     * @var int
     */
    public const SELF_DELIVERY = 2;
}