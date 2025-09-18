<?php

namespace Apiship\Entity\Request\Part\Orders;

use Apiship\Entity\AbstractRequestPart;
use Apiship\Exception\RequiredParameterException;

class Order extends AbstractRequestPart
{
    /**
     * @var string Номер заказа в системе клиента
     */
    protected $clientNumber;
    /**
     * @var string Номер заказа в системе службы доставки. Если СД выдает диапазон номеров заказа
     */
    protected $providerNumber;
    /**
     * @var string Штрих-код
     */
    protected $barcode;
    /**
     * @var string Описание заказа
     */
    protected $description;
    /**
     * @var float Высота заказа в сантиметрах
     */
    protected $height;
    /**
     * @var float Длина заказа в сантиметрах
     */
    protected $length;
    /**
     * @var float Ширина заказа в сантиметрах
     */
    protected $width;
    /**
     * @var float Вес всего заказа в граммах
     */
    protected $weight;
    /**
     * @var string Ключ службы доставки
     */
    protected $providerKey;
    /**
     * @var int ID подключения вашей компании к СД
     */
    protected $providerConnectId;
    /**
     * @var int Тип приема товара
     */
    protected $pickupType;
    /**
     * @var int Тип выдачи товара
     */
    protected $deliveryType;
    /**
     * @deprecated
     * @var int Метод оплаты
     */
    protected $paymentMethod;
    /**
     * @var int Тариф
     */
    protected $tariffId;
    /**
     * @var string Дата отправки
     */
    protected $pickupDate;
    /**
     * @var string Дата доставки
     */
    protected $deliveryDate;
    /**
     * @var int Точка приема товара
     */
    protected $pointInId;
    /**
     * @var int Точка выдачи товара
     */
    protected $pointOutId;
    /**
     * @var string Начальное время доставки
     */
    protected $deliveryTimeStart;
    /**
     * @var string Конечное время доставки
     */
    protected $deliveryTimeEnd;
    /**
     * @var string Начальное время забора груза
     */
    protected $pickupTimeStart;
    /**
     * @var string Конечное время забора груза
     */
    protected $pickupTimeEnd;

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getClientNumber()
    {
        if (!$this->clientNumber) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::clientNumber" is required.
                '
            );
        }

        return $this->clientNumber;
    }

    /**
     * @param string $clientNumber
     *
     * @return Order
     */
    public function setClientNumber($clientNumber)
    {
        $this->clientNumber = $clientNumber;
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
     * @return Order
     */
    public function setProviderNumber($providerNumber)
    {
        $this->providerNumber = $providerNumber;
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
     * @param string $description
     *
     * @return Order
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     *
     * @return Order
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     *
     * @return Order
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     *
     * @return Order
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float
     * @throws RequiredParameterException
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     *
     * @return Order
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getProviderKey()
    {
        if (!$this->providerKey) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::providerKey" is required.
                '
            );
        }

        return $this->providerKey;
    }

    /**
     * @param string $providerKey
     *
     * @return Order
     */
    public function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getPickupType()
    {
        if (!$this->pickupType) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::pickupType" is required.
                '
            );
        }

        return $this->pickupType;
    }

    /**
     * @param int $pickupType
     *
     * @return Order
     */
    public function setPickupType($pickupType)
    {
        $this->pickupType = $pickupType;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getDeliveryType()
    {
        if (!$this->deliveryType) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::deliveryType" is required.
                '
            );
        }

        return $this->deliveryType;
    }

    /**
     * @param int $deliveryType
     *
     * @return Order
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
        return $this;
    }

    /**
     * @deprecated
     * @return int
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @deprecated
     * @param int $paymentMethod
     *
     * @return Order
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getTariffId()
    {
        if (!$this->tariffId) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::tariffId" is required.
                '
            );
        }

        return $this->tariffId;
    }

    /**
     * @param int $tariffId
     *
     * @return Order
     */
    public function setTariffId($tariffId)
    {
        $this->tariffId = $tariffId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param string $pickupDate
     *
     * @return Order
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param string $deliveryDate
     *
     * @return Order
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointInId()
    {
        return $this->pointInId;
    }

    /**
     * @param int $pointInId
     *
     * @return Order
     */
    public function setPointInId($pointInId)
    {
        $this->pointInId = $pointInId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointOutId()
    {
        return $this->pointOutId;
    }

    /**
     * @param int $pointOutId
     *
     * @return Order
     */
    public function setPointOutId($pointOutId)
    {
        $this->pointOutId = $pointOutId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryTimeStart()
    {
        return $this->deliveryTimeStart;
    }

    /**
     * @param string $deliveryTimeStart
     *
     * @return Order
     */
    public function setDeliveryTimeStart($deliveryTimeStart)
    {
        $this->deliveryTimeStart = $deliveryTimeStart;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryTimeEnd()
    {
        return $this->deliveryTimeEnd;
    }

    /**
     * @param string $deliveryTimeEnd
     *
     * @return Order
     */
    public function setDeliveryTimeEnd($deliveryTimeEnd)
    {
        $this->deliveryTimeEnd = $deliveryTimeEnd;
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderConnectId()
    {
        return $this->providerConnectId;
    }

    /**
     * @param int $providerConnectId
     */
    public function setProviderConnectId($providerConnectId)
    {
        $this->providerConnectId = $providerConnectId;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     * @return Order
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupTimeStart()
    {
        return $this->pickupTimeStart;
    }

    /**
     * @param string $pickupTimeStart
     * @return Order
     */
    public function setPickupTimeStart($pickupTimeStart)
    {
        $this->pickupTimeStart = $pickupTimeStart;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupTimeEnd()
    {
        return $this->pickupTimeEnd;
    }

    /**
     * @param string $pickupTimeEnd
     * @return Order
     */
    public function setPickupTimeEnd($pickupTimeEnd)
    {
        $this->pickupTimeEnd = $pickupTimeEnd;
        return $this;
    }
}
