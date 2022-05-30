<?php

namespace Apiship\Entity\Response\Part\Calculator;

use Apiship\Entity\AbstractResponsePart;

class Tariff extends AbstractResponsePart
{
    /**
     * @var int ID тарифа
     */
    protected $tariffId;
    /**
     * @var string Наименование тарифа
     */
    protected $tariffName;
    /**
     * @var string Откуда производится доставка
     * (door - от двери клиента, point - от терминала службы доставки, pointOrDoor - любым из предыдущих способом
     */
    protected $from;
    /**
     * @var float Стоимость доставки
     */
    protected $deliveryCost;
    /**
     * @var int Минимальное количество дней на доставку
     */
    protected $daysMin;
    /**
     * @var int Максимальное количество дней на доставку
     */
    protected $daysMax;

    /**
     * @var array Список ID ПВЗ
     */
    protected $pointIds = [];

    /**
     * @var string|null Измененное описание тарифа
     */
    protected $tariffDescription = null;

    /**
     * @var array Типы забора
     */
    protected $pickupTypes = [];

    /**
     * @var array Типы доставки
     */
    protected $deliveryTypes = [];

    /**
     * @return string|null
     */
    public function getTariffDescription()
    {
        return $this->tariffDescription;
    }

    /**
     * @param string|null $tariffDescription
     * @return Tariff
     */
    public function setTariffDescription($tariffDescription)
    {
        $this->tariffDescription = $tariffDescription;
        return $this;
    }

    /**
     * @return int
     */
    public function getTariffId()
    {
        return $this->tariffId;
    }

    /**
     * @param int $tariffId
     *
     * @return Tariff
     */
    public function setTariffId($tariffId)
    {
        $this->tariffId = $tariffId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTariffName()
    {
        return $this->tariffName;
    }

    /**
     * @param string $tariffName
     *
     * @return Tariff
     */
    public function setTariffName($tariffName)
    {
        $this->tariffName = $tariffName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return Tariff
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }


    /**
     * @return array
     */
    public function getPointIds()
    {
        return $this->pointIds;
    }

    /**
     * @param array $pointIds
     *
     * @return Tariff
     */
    public function setPointIds(array $pointIds)
    {
        $this->pointIds = $pointIds;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * @param float $deliveryCost
     *
     * @return Tariff
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
        return $this;
    }

    /**
     * @return int
     */
    public function getDaysMin()
    {
        return $this->daysMin;
    }

    /**
     * @param int $daysMin
     *
     * @return Tariff
     */
    public function setDaysMin($daysMin)
    {
        $this->daysMin = $daysMin;
        return $this;
    }

    /**
     * @return int
     */
    public function getDaysMax()
    {
        return $this->daysMax;
    }

    /**
     * @param int $daysMax
     *
     * @return Tariff
     */
    public function setDaysMax($daysMax)
    {
        $this->daysMax = $daysMax;
        return $this;
    }

    /**
     * @return array
     */
    public function getPickupTypes()
    {
        return $this->pickupTypes;
    }

    /**
     * @param array $pickupTypes
     *
     * @return Tariff
     */
    public function setPickupTypes(array $pickupTypes)
    {
        $this->pickupTypes = $pickupTypes;
        return $this;
    }

    /**
     * @return array
     */
    public function getDeliveryTypes()
    {
        return $this->deliveryTypes;
    }

    /**
     * @param array $deliveryTypes
     *
     * @return Tariff
     */
    public function setDeliveryTypes(array $deliveryTypes)
    {
        $this->deliveryTypes = $deliveryTypes;
        return $this;
    }
}