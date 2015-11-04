<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Order\OrderInfo;
use Apiship\Entity\Response\Part\Order\OrderStatus;
use Apiship\Entity\Response\Part\Meta;

class StatusHistoryResponse extends AbstractResponse
{
    /**
     * @var OrderInfo
     */
    protected $orderInfo;
    /**
     * @var OrderStatus[]
     */
    protected $rows;
    /**
     * @var Meta
     */
    protected $meta;

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
     * @return StatusHistoryResponse
     */
    public function setOrderInfo(OrderInfo $orderInfo)
    {
        $this->orderInfo = $orderInfo;
        return $this;
    }

    /**
     * @return OrderStatus[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param OrderStatus[] $rows
     *
     * @return StatusHistoryResponse
     */
    public function setRows(array $rows)
    {
        foreach ($rows as $row) {
            $this->$this->addRow($row);
        }

        return $this;
    }

    /**
     * @param OrderStatus $row
     *
     * @return StatusHistoryResponse
     */
    public function addRow(OrderStatus $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     *
     * @return StatusHistoryResponse
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
        return $this;
    }
}