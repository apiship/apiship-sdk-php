<?php

namespace Apiship\Entity\Response\Part\Order;

use Apiship\Entity\AbstractResponsePart;

class OrderStatus extends AbstractResponsePart
{
    /**
     * @var string Идентификатор статуса заказа
     */
    protected $key;
    /**
     * @var string Название статуса
     */
    protected $name;
    /**
     * @var string Описание статуса
     */
    protected $description;
    /**
     * @var string Дата и время установки данного статуса
     */
    protected $created;
    /**
     * @var string Код статуса в системе службы доставки
     */
    protected $providerCode;
    /**
     * @var string Название статуса в системе службы доставки
     */
    protected $providerName;
    /**
     * @var string Описание статуса в системе службы доставки
     */
    protected $providerDescription;
    /**
     * @var string Дата создания статуса в системе службы доставки
     */
    protected $createdProvider;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderCode()
    {
        return $this->providerCode;
    }

    /**
     * @param $providerCode
     *
     * @return $this
     */
    public function setProviderCode($providerCode)
    {
        $this->providerCode = $providerCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param $providerName
     *
     * @return $this
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderDescription()
    {
        return $this->providerDescription;
    }

    /**
     * @param $providerDescription
     *
     * @return $this
     */
    public function setProviderDescription($providerDescription)
    {
        $this->providerDescription = $providerDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedProvider()
    {
        return $this->createdProvider;
    }

    /**
     * @param $createdProvider
     *
     * @return $this
     */
    public function setCreatedProvider($createdProvider)
    {
        $this->createdProvider = $createdProvider;
        return $this;
    }
}