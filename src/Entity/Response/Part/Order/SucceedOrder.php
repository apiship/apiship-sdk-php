<?php

namespace Apiship\Entity\Response\Part\Order;

class SucceedOrder
{
    /**
     * @var OrderInfo
     */
    public $orderInfo;
    /**
     * @var OrderStatus
     */
    public $status;

    /**
     * @return OrderInfo
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * @param OrderInfo $orderInfo
     *
     * @return $this
     */
    public function setOrderInfo(OrderInfo $orderInfo)
    {
        $this->orderInfo = $orderInfo;
        return $this;
    }

    /**
     * @return OrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param OrderStatus $status
     *
     * @return $this
     */
    public function setStatus(OrderStatus $status)
    {
        $this->status = $status;
        return $this;
    }
}