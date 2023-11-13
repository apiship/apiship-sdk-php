<?php

namespace Apiship\Enum;

final class PaymentMethods
{
    /**
     * Оплата наличными
     * @var int
     */
    public const CASH_PAYMENT = 1;
 
    /**
     * Оплата кредитной картой
     * @var int
     */
    public const CREDIT_CARD_PAYMENT = 2;

    /**
     * Оплата наличными и кредитной карточкой
     * @var int
     */
    public const CASH_AND_CREDIT_CARD_PAYMENT = 3;
}