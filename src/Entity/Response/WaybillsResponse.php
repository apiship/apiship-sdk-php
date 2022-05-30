<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Order\FailedOrder;
use Apiship\Entity\Response\Part\Order\WaybillItem;

class WaybillsResponse extends AbstractResponse
{
    /**
     * @var WaybillItem[]
     */
    protected $waybillItems;
    /**
     * @var FailedOrder[]
     */
    protected $failedOrders;

    /**
     * @return WaybillItem[]
     */
    public function getWaybillItems()
    {
        return $this->waybillItems;
    }

    /**
     * @param WaybillItem[] $waybillItems
     *
     * @return WaybillsResponse
     */
    public function setSucceedOrders(array $waybillItems)
    {
        foreach ($waybillItems as $waybillItem) {
            $this->addWaybillItem($waybillItem);
        }

        return $this;
    }

    /**
     * @param WaybillItem $waybillItem
     *
     * @return WaybillsResponse
     */
    public function addWaybillItem(WaybillItem $waybillItem)
    {
        $this->waybillItems[] = $waybillItem;

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
     * @return WaybillsResponse
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
     * @return WaybillsResponse
     */
    public function addFailedOrders(FailedOrder $failedOrder)
    {
        $this->failedOrders[] = $failedOrder;

        return $this;
    }
}