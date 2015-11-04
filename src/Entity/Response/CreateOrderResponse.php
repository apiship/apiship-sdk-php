<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class CreateOrderResponse extends AbstractResponse
{
    /**
     * @var int ID созданного заказа
     */
    protected $orderId;
    /**
     * @var string Дата/время создания
     */
    protected $created;

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     *
     * @return CreateOrderResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     *
     * @return CreateOrderResponse
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
}