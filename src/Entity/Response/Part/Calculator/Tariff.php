<?php

namespace Apiship\Entity\Response\Part\Calculator;

use Apiship\Entity\AbstractResponsePart;

class Tariff extends AbstractResponsePart
{
    /**
     * @var string ID тарифа в службе доставки
     */
    protected $tariffProviderId;
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
     * @var float Стоимость доставки до применения правил
     */
    protected $deliveryCostOriginal;
    /**
     * @var bool
     */
    protected $feesIncluded;
    /**
     * @var float
     */
    protected $insuranceFee;
    /**
     * @var float
     */
    protected $cashServiceFee;
    /**
     * @var int Минимальное количество дней на доставку
     */
    protected $daysMin;
    /**
     * @var int Максимальное количество дней на доставку
     */
    protected $daysMax;

    /**
     * @var int Минимальное количество дней на доставку в календарных днях
     */
    protected $calendarDaysMin;
    /**
     * @var int Максимальное количество дней на доставку в календарных днях
     */
    protected $calendarDaysMax;

    /**
     * @var int Минимальное количество дней на доставку в рабочих днях
     */
    protected $workDaysMin;
    /**
     * @var int Минимальное количество дней на доставку в рабочих днях
     */
    protected $workDaysMax;

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
     * @return float
     */
    public function getDeliveryCostOriginal()
    {
        return $this->deliveryCostOriginal;
    }

    /**
     * @param float $deliveryCostOriginal
     *
     * @return $this
     */
    public function setDeliveryCostOriginal($deliveryCostOriginal)
    {
        $this->deliveryCostOriginal = $deliveryCostOriginal;

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

    public function getCalendarDaysMin(): ?int
    {
        return $this->calendarDaysMin;
    }

    public function setCalendarDaysMin(?int $calendarDaysMin): self
    {
        $this->calendarDaysMin = $calendarDaysMin;
        return $this;
    }

    public function getCalendarDaysMax(): ?int
    {
        return $this->calendarDaysMax;
    }

    public function setCalendarDaysMax(?int $calendarDaysMax): self
    {
        $this->calendarDaysMax = $calendarDaysMax;
        return $this;
    }

    public function getWorkDaysMin(): ?int
    {
        return $this->workDaysMin;
    }

    public function setWorkDaysMin(?int $workDaysMin): self
    {
        $this->workDaysMin = $workDaysMin;
        return $this;
    }

    public function getWorkDaysMax(): ?int
    {
        return $this->workDaysMax;
    }

    public function setWorkDaysMax(?int $workDaysMax): self
    {
        $this->workDaysMax = $workDaysMax;
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

    public function getTariffProviderId(): ?string
    {
        return $this->tariffProviderId;
    }

    public function setTariffProviderId(?string $tariffProviderId): self
    {
        $this->tariffProviderId = $tariffProviderId;
        return $this;
    }

    public function getFeesIncluded(): ?bool
    {
        return $this->feesIncluded;
    }

    public function setFeesIncluded(?bool $feesIncluded): self
    {
        $this->feesIncluded = $feesIncluded;
        return $this;
    }

    public function getInsuranceFee(): ?float
    {
        return $this->insuranceFee;
    }

    public function setInsuranceFee(?float $insuranceFee): self
    {
        $this->insuranceFee = $insuranceFee;
        return $this;
    }

    public function getCashServiceFee(): ?float
    {
        return $this->cashServiceFee;
    }

    public function setCashServiceFee(?float $cashServiceFee): self
    {
        $this->cashServiceFee = $cashServiceFee;
        return $this;
    }
}
