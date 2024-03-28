<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class CourierCallResponse extends AbstractResponse
{
    /**
     * @var int ID вызова курьера
     */
    protected $id;

    /**
     * @var string Дата/время создания
     */
    protected $created;

    /**
     * @var string Номер заявки в системе СД
     */
    protected $providerNumber;

    /**
     * @var string Дополнительный номер заявки в системе СД
     */
    protected $additionalProviderNumber;

    /**
     * @var string Описание ошибки в случае невозможности вызова курьера
    */
    protected $error;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): CourierCallResponse
    {
        $this->id = $id;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created): CourierCallResponse
    {
        $this->created = $created;
        return $this;
    }

    public function getProviderNumber()
    {
        return $this->providerNumber;
    }

    public function setProviderNumber($providerNumber): CourierCallResponse
    {
        $this->providerNumber = $providerNumber;
        return $this;
    }

    public function getAdditionalProviderNumber()
    {
        return $this->additionalProviderNumber;
    }

    public function setAdditionalProviderNumber($additionalProviderNumber): CourierCallResponse
    {
        $this->additionalProviderNumber = $additionalProviderNumber;
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError($error): CourierCallResponse
    {
        $this->error = $error;
        return $this;
    }
}
