<?php

namespace Apiship\Entity\Request;

use Apiship\Entity\AbstractRequest;
use Apiship\Entity\Request\Part\Calculator\From;
use Apiship\Entity\Request\Part\Calculator\To;
use Apiship\Exception\RequiredParameterException;

class CalculatorRequest extends AbstractRequest
{
    /**
     * @var From Информация о пункте отправления
     */
    protected $from;
    /**
     * @var To Информация о пункте получения
     */
    protected $to;
    /**
     * @var integer Вес всего заказа (в граммах)
     */
    protected $weight;
    /**
     * @var integer Ширина заказа (в сантиметрах)
     */
    protected $width;
    /**
     * @var integer Высота заказа (в сантиметрах)
     */
    protected $height;
    /**
     * @var integer Длина заказа (в сантиметрах)
     */
    protected $length;
    /**
     * @var string Дата приёма груза (не обязательно, по умолчания берется текущая дата)
     */
    public $pickupDate;
    /**
     * @var array Типы приема груза 
     */
    public $pickupTypes;
    /**
     * @var array Типы доставки груза
     */
    public $deliveryTypes;
    /**
     * @var boolean|null Самопривоз на терминал (если не указана выводятся для каждого)
     */
    public $selfPickup;
    /**
     * @var bool Самовывоз с терминала (если не указана выводятся для каждого)
     */
    public $selfDelivery;
    /**
     * @var float Оценочная стоимость (в рублях). по умолчанию = 0
     */
    public $assessedCost;
    /**
     * @var float Сумма наложенного платежа
     */
    public $codCost;
    /**
     * @var boolean Суммировать к итоговой стоимости все сборы СД (по-умолчанию FALSE)
     */
    public $includeFees;
    /**
     * @var array Массив ключей СД, для которых вызывать метод калькуляции
     */
    public $providerKeys;
    /**
     * @var integer Время ожидания ответа от провайдера, результаты по провайдерам,
     * которые не успели в указанное время, выдаваться не будут. Если не указывать, будет ожидаться ответ от всех.
     */
    public $timeout;

    /**
     * Массив с доп.параметрами. Синтаксис '{providerKey}.{paramName} => {value}'
     * Пример. "dpd.providerConnectId": 1234 - использовать для DPD определенное подключение.
     * @var array
     */
    public $extraParams;

    /**
     * @var bool Пропустить выполнения правил редактора тарифов
     */
    public $skipTariffRules;
    
    /**
     * @return From
     * @throws RequiredParameterException
     */
    public function getFrom()
    {
        if (!$this->from) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::from" is required.
                ');
        }

        return $this->from;
    }

    /**
     * @param From $from
     *
     * @return CalculatorRequest
     */
    public function setFrom(From $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return To
     * @throws RequiredParameterException
     */
    public function getTo()
    {
        if (!$this->to) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::to" is required.
                ');
        }

        return $this->to;
    }

    /**
     * @param To $to
     *
     * @return CalculatorRequest
     */
    public function setTo(To $to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getWeight()
    {
        if (!$this->weight) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::weight" is required.
                ');
        }

        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return CalculatorRequest
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getWidth()
    {
        if (!$this->width) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::width" is required.
                ');
        }

        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return CalculatorRequest
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getHeight()
    {
        if (!$this->height) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::height" is required.
                ');
        }

        return $this->height;
    }
    
    /**
     * @param int $height
     *
     * @return CalculatorRequest
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getLength()
    {
        if (!$this->length) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::length" is required.
                ');
        }

        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return CalculatorRequest
     */
    public function setLength($length)
    {
        $this->length = $length;
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
     * @return CalculatorRequest
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }
    
    /**
     * @return array
     */
    function getPickupTypes()
    {
        return $this->pickupTypes;
    }

    /**
     * @return array
     */
    function getDeliveryTypes()
    {
        return $this->deliveryTypes;
    }
    
    /**
     * @param array $pickupTypes
     * 
     * @return CalculatorRequest
     */
    function setPickupTypes($pickupTypes)
    {
        $this->pickupTypes = $pickupTypes;
        return $this;
    }
    
    /**
     * @param array $deliveryTypes
     * 
     * @return CalculatorRequest
     */
    function setDeliveryTypes($deliveryTypes)
    {
        $this->deliveryTypes = $deliveryTypes;
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function getSelfPickup()
    {
        return $this->selfPickup;
    }

    /**
     * @param bool|null $selfPickup
     *
     * @return CalculatorRequest
     */
    public function setSelfPickup($selfPickup)
    {
        $this->selfPickup = $selfPickup;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSelfDelivery()
    {
        return $this->selfDelivery;
    }

    /**
     * @param boolean $selfDelivery
     *
     * @return CalculatorRequest
     */
    public function setSelfDelivery($selfDelivery)
    {
        $this->selfDelivery = $selfDelivery;
        return $this;
    }

    /**
     * @return float
     */
    public function getAssessedCost()
    {
        return $this->assessedCost;
    }

    /**
     * @param float $assessedCost
     *
     * @return CalculatorRequest
     */
    public function setAssessedCost($assessedCost)
    {
        $this->assessedCost = $assessedCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getCodCost()
    {
        return $this->codCost;
    }

    /**
     * @param float $codCost
     *
     * @return CalculatorRequest
     */
    public function setCodCost($codCost)
    {
        $this->codCost = $codCost;
        return $this;
    }
    
    /**
     * @return boolean
     */
    function getIncludeFees()
    {
        return $this->includeFees;
    }
    
    /**
     * @param boolean $includeFees
     *
     * @return CalculatorRequest
     */
    function setIncludeFees($includeFees)
    {
        $this->includeFees = $includeFees;
        return $this;
    }
    /**
     * @return array
     */
    public function getProviderKeys()
    {
        return $this->providerKeys;
    }

    /**
     * @param array $providerKeys
     *
     * @return CalculatorRequest
     */
    public function setProviderKeys($providerKeys)
    {
        $this->providerKeys = $providerKeys;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     *
     * @return CalculatorRequest
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return array
     */
    public function getExtraParams()
    {
        return $this->extraParams;
    }

    /**
     * @param array $extraParams
     *
     * @return self
     */
    public function setExtraParams($extraParams)
    {
        $this->extraParams = $extraParams;
        return $this;
    }
    
    /**
     * @param array $extraParams
     *
     * @return self
     */
    public function addExtraParam($extraParamName, $extraParamValue)
    {
        $this->extraParams[$extraParamName] = $extraParamValue;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSkipTariffRules()
    {
        return $this->skipTariffRules;
    }

    /**
     * @param bool $skipTariffRules
     *
     * @return self
     */
    public function setSkipTariffRules($skipTariffRules)
    {
        $this->skipTariffRules = $skipTariffRules;
        return $this;
    }

}
