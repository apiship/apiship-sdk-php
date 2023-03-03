<?php

namespace Apiship\Entity\Response\Part\Order;

use Apiship\Entity\AbstractResponsePart;

class OrderInfo extends AbstractResponsePart
{
    /**
     * @var int ID заказа
     */
    protected $orderId;
    /**
     * @var string Код провайдера (СД)
     */
    protected $providerKey;
    /**
     * @var string Ключ провайдера (СД)
     */
    protected $providerNumber;
    /**
     * @var string Доп. ключ провайдера (СД)
     */
    protected $additionalProviderNumber;
    /**
     * @var string Номер заказа клиента
     */
    protected $clientNumber;
    /**
     * @var string Номер возврата заказа в системе службы доставки
     */
    protected $returnProviderNumber;
    /**
     * @var string  Номер заказа для печати ШК
     */
    protected $barcode;
    /**
     * @var string
     */
    protected $trackingUrl;

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $orderId
     *
     * @return $this
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
     * @param $providerNumber
     *
     * @return $this
     */
    public function setProviderNumber($providerNumber)
    {
        $this->providerNumber = $providerNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalProviderNumber()
    {
        return $this->additionalProviderNumber;
    }

    /**
     * @param $providerNumber
     *
     * @return $this
     */
    public function setAdditionalProviderNumber($additionalProviderNumber)
    {
        $this->additionalProviderNumber = $additionalProviderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientNumber()
    {
        return $this->clientNumber;
    }

    /**
     * @param $clientNumber
     *
     * @return $this
     */
    public function setClientNumber($clientNumber)
    {
        $this->clientNumber = $clientNumber;
        return $this;
    }

    public function getReturnProviderNumber(): ?string
    {
        return $this->returnProviderNumber;
    }

    public function setReturnProviderNumber(?string $returnProviderNumber)
    {
        $this->returnProviderNumber = $returnProviderNumber;
        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    public function getProviderKey(): ?string
    {
        return $this->providerKey;
    }

    public function setProviderKey(string $providerKey): self
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    public function setTrackingUrl(string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }
}
