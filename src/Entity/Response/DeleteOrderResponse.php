<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class DeleteOrderResponse extends AbstractResponse
{
    /**
     * @var int ID заказа
     */
    protected $orderId;
    /**
     * @var string Дата/время удаления
     */
    protected $deleted;

    /**
     * @return string
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param string $deleted
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
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
     * @return DeleteOrderResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }
}