<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Order\SucceedOrder;

class StatusesByDateResponse extends AbstractResponse
{
    /**
     * @var SucceedOrder[]
     */
    protected $orders;

    /**
     * @return SucceedOrder[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param SucceedOrder[] $orders
     *
     * @return StatusesByDateResponse
     */
    public function setOrders(array $orders)
    {
        foreach ($orders as $order) {
            $this->addOrder($order);
        }

        return $this;
    }

    /**
     * @param SucceedOrder $order
     *
     * @return StatusesByDateResponse
     */
    public function addOrder(SucceedOrder $order)
    {
        $this->orders[] = $order;

        return $this;
    }
}