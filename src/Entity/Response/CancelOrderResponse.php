<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class CancelOrderResponse extends AbstractResponse
{
    /**
     * @var int ID заказа
     */
    protected $orderId;
    /**
     * @var string Дата/время отмены
     */
    protected $canceled;

    /**
     * @return string
     */
    public function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * @param string $canceled
     * @return $this
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;
        return $this;
    }

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
     * @return CancelOrderResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }
}