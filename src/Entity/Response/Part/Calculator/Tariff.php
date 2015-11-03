<?php

namespace Apiship\Entity\Response\Part\Calculator;

class Tariff
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
}