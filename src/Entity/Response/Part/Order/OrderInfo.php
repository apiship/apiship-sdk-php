<?php

namespace Apiship\Entity\Response\Part\Order;

class OrderInfo
{
    /**
     * @var int ID заказа
     */
    public $orderId;
    /**
     * @var string Ключ провайдера (СД)
     */
    public $providerNumber;
    /**
     * @var string Номер заказа клиента
     */
    public $clientNumber;

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $orderId
     *
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderNumber()
    {
        return $this->providerNumber;
    }

    /**
     * @param $providerNumber
     *
     * @return $this
     */
    public function setProviderNumber($providerNumber)
    {
        $this->providerNumber = $providerNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientNumber()
    {
        return $this->clientNumber;
    }

    /**
     * @param $clientNumber
     *
     * @return $this
     */
    public function setClientNumber($clientNumber)
    {
        $this->clientNumber = $clientNumber;
        return $this;
    }
}