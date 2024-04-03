<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class CancelCourierCallResponse extends AbstractResponse
{
    /**
     * @var int ID вызова курьера
     */
    protected $id;
    /**
     * @var string Дата/время отмены
     */
    protected $canceled;

    /**
     * @return string
     */
    public function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * @param string $canceled
     * @return $this
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): CancelCourierCallResponse
    {
        $this->id = $id;
        return $this;
    }
}
