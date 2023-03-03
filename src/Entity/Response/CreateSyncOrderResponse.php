<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;

class CreateSyncOrderResponse extends AbstractResponse
{
    /**
     * @var int ID созданного заказа
     */
    protected $orderId;
    /**
     * @var string ID созданного заказа в СД
     */
    protected $providerNumber;
    /**
     * @var string Дополнительный номер заказа в системе службы доставки
     */
    protected $additionalProviderNumber;
    /**
     * @var string Дата/время создания
     */
    protected $created;

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
     * @return CreateSyncOrderResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderNumber()
    {
        return $this->providerNumber;
    }

    /**
     * @param string $providerNumber
     *
     * @return CreateSyncOrderResponse
     */
    public function setProviderNumber($providerNumber)
    {
        $this->providerNumber = $providerNumber;
        return $this;
    }

    public function getAdditionalProviderNumber(): ?string
    {
        return $this->additionalProviderNumber;
    }

    public function setAdditionalProviderNumber(?string $additionalProviderNumber): self
    {
        $this->additionalProviderNumber = $additionalProviderNumber;
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
     * @param string $created
     *
     * @return CreateSyncOrderResponse
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
}
