<?php

namespace Apiship\Entity\Response\Part\Order;

class FailedOrder
{
    /**
     * @var int
     */
    public $orderId;
    /**
     * @var string
     */
    public $message;

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
     * @return FailedOrder
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return FailedOrder
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}