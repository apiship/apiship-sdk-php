<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Order\SucceedOrder;
use Apiship\Entity\Response\Part\Order\FailedOrder;

class StatusesResponse extends AbstractResponse
{
    /**
     * @var SucceedOrder[]
     */
    protected $succeedOrders;
    /**
     * @var FailedOrder[]
     */
    protected $failedOrders;

    /**
     * @return SucceedOrder[]
     */
    public function getSucceedOrders()
    {
        return $this->succeedOrders;
    }

    /**
     * @param SucceedOrder[] $succeedOrders
     *
     * @return StatusesResponse
     */
    public function setSucceedOrders(array $succeedOrders)
    {
        foreach ($succeedOrders as $succeedOrder) {
            $this->addSucceedOrder($succeedOrder);
        }

        return $this;
    }

    /**
     * @param SucceedOrder $succeedOrder
     *
     * @return StatusesResponse
     */
    public function addSucceedOrder(SucceedOrder $succeedOrder)
    {
        $this->succeedOrders[] = $succeedOrder;

        return $this;
    }

    /**
     * @return FailedOrder[]
     */
    public function getFailedOrders()
    {
        return $this->failedOrders;
    }

    /**
     * @param FailedOrder[] $failedOrders
     *
     * @return StatusesResponse
     */
    public function setFailedOrders(array $failedOrders)
    {
        foreach ($failedOrders as $failedOrder) {
            $this->addFailedOrders($failedOrder);
        }

        return $this;
    }

    /**
     * @param FailedOrder $failedOrder
     *
     * @return StatusesResponse
     */
    public function addFailedOrders(FailedOrder $failedOrder)
    {
        $this->failedOrders[] = $failedOrder;

        return $this;
    }
}