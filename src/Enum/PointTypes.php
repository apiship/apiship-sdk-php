<?php

namespace Apiship\Enum;

final class PointTypes
{
    /**
     * Пункт выдачи заказа
     * @var int
     */
    public const ORDER_ISSUE_POINT = 1;
 
    /**
     * Постамат
     * @var int
     */
    public const POSTAMAT = 2;

    /**
     * Отделение Почты России"
     * @var int
     */
    public const RUSSIAN_POST_OFFICE = 3;

    /**
     * Терминал
     * @var int
     */
    public const TERMINAL = 4;

}