<?php

namespace Apiship\Entity\Response\Part;

use Apiship\Entity\AbstractResponsePart;

class Meta extends AbstractResponsePart
{
    /**
     * @var int Количество записей в выборке
     */
    protected $total;
    /**
     * @var int Смещение выборки
     */
    protected $offset;
    /**
     * @var int Лимит выборки
     */
    protected $limit;

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     *
     * @return Meta
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return Meta
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return Meta
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
}