<?php

namespace Apiship\Enum;

final class OperationTypes
{
    /**
     * Прием товаров
     * @var int
     */
    public const GOODS_RECEPTION = 1;

    /**
     * Выдача товаров
     * @var int
     */
    public const GOODS_ISSUANCE = 2;

    /**
     * Прием и выдача товаров
     * @var int
     */
    public const GOODS_RECEPTION_AND_ISSUANCE = 3;
}