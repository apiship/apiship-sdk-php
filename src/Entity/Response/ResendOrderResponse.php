<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class ResendOrderResponse extends AbstractResponse
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
     * @return ResendOrderResponse
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
     * @return ResendOrderResponse
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
}