<?php

namespace Apiship\Entity\Response\Part\Order;

use Apiship\Entity\AbstractResponsePart;

class StatusHistory extends AbstractResponsePart
{
    /**
     * @var OrderInfo
     */
    protected $orderInfo;
    /**
     * @var OrderStatus[]
     */
    protected $statuses;

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
     * @return OrderStatus[]
     */
    public function getStatus()
    {
        return $this->statuses;
    }

    /**
     * @param OrderStatus[] $statuses
     *
     * @return $this
     */
    public function setStatus(array $statuses)
    {
        foreach ($statuses as $status) {
            $this->addStatus($status);
        }

        return $this;
    }

    /**
     * @param OrderStatus $status
     *
     * @return $this
     */
    public function addStatus(OrderStatus $status)
    {
        $this->statuses[] = $status;
        return $this;
    }
}