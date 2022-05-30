<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Meta;
use Apiship\Entity\Response\Part\Order\StatusHistory;

class StatusHistoryByDateResponse extends AbstractResponse
{
    /**
     * @var StatusHistory[]
     */
    protected $rows;
    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @return StatusHistory[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param StatusHistory[] $rows
     *
     * @return StatusHistoryByDateResponse
     */
    public function setRows(array $rows)
    {
        foreach ($rows as $row) {
            $this->addRow($row);
        }

        return $this;
    }

    /**
     * @param StatusHistory $row
     *
     * @return StatusHistoryByDateResponse
     */
    public function addRow(StatusHistory $row)
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
     * @return StatusHistoryByDateResponse
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
        return $this;
    }
}