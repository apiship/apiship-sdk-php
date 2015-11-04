<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Order\OrderInfo;
use Apiship\Entity\Response\Part\Order\OrderStatus;

class StatusResponse extends AbstractResponse
{
    /**
     * @var OrderInfo
     */
    protected $orderInfo;
    /**
     * @var OrderStatus
     */
    protected $status;

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
     * @return StatusResponse
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
     * @return StatusResponse
     */
    public function setStatus(OrderStatus $status)
    {
        $this->status = $status;
        return $this;
    }
}