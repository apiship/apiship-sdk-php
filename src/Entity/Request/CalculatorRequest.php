<?php

namespace Apiship\Entity\Request;

use Apiship\Entity\AbstractRequest;
use Apiship\Entity\Request\Part\Calculator\From;
use Apiship\Entity\Request\Part\Calculator\Place;
use Apiship\Entity\Request\Part\Calculator\To;
use Apiship\Exception\RequiredParameterException;

class CalculatorRequest extends AbstractRequest
{
    /**
     * @var From Информация о пункте отправления
     */
    public $from;
    /**
     * @var To Информация о пункте получения
     */
    public $to;
    /**
     * @var Place[]
     */
    public $places = [];
    /**
     * @var float Вес всего заказа (в граммах)
     */
    public $weight;
    /**
     * @var int Ширина заказа (в сантиметрах)
     */
    public $width;
    /**
     * @var int Высота заказа (в сантиметрах)
     */
    public $height;
    /**
     * @var int Длина заказа (в сантиметрах)
     */
    public $length;
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
     * @var bool|null Самопривоз на терминал (если не указана выводятся для каждого)
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
     * @var bool Суммировать к итоговой стоимости все сборы СД (по-умолчанию FALSE)
     */
    public $includeFees;
    /**
     * @var array Массив ключей СД, для которых вызывать метод калькуляции
     */
    public $providerKeys;
    /**
     * @var int Время ожидания ответа от провайдера, результаты по провайдерам,
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
     * @var string Промокод, нужен для выполнения правила в редакторе тарифов
     */
    public $promoCode;
    /**
     * @var string Пользовательское поле. В это поле можно передать, например, название сайта и по нему строить правила в редакторе сайтов.
     */
    public $customCode;

    /**
     * @deprecated
     * @var int Тариф по которому требуется вести расчет
     */
    public $tariffId;

    public $tariffIds;

    /**
     * @var int Идентификатор ПВЗ от которого вести расчет
     */
    public $pointInId;

    /**
     * @var int Идентификатор ПВЗ до которого вести расчет
    */
    public $pointOutId;

    /**
     * @return From
     * @throws RequiredParameterException
     */
    public function getFrom()
    {
        if (!$this->from) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::from" is required.'
            );
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
                'Property "' . get_class($this) . '::to" is required.'
            );
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
     * @deprecated
     * @return float
     * @throws RequiredParameterException
     */
    public function getWeight()
    {
        if (!$this->weight && empty($this->places)) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::weight" is required.
                '
            );
        }

        return $this->weight;
    }

    /**
     * @deprecated
     * @param float $weight
     *
     * @return CalculatorRequest
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @deprecated
     * @return int
     * @throws RequiredParameterException
     */
    public function getWidth()
    {
        if (!$this->width && empty($this->places)) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::width" is required.
                '
            );
        }

        return $this->width;
    }

    /**
     * @deprecated
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
     * @deprecated
     * @return int
     * @throws RequiredParameterException
     */
    public function getHeight()
    {
        if (!$this->height && empty($this->places)) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::height" is required.
                '
            );
        }

        return $this->height;
    }

    /**
     * @deprecated
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
     * @deprecated
     * @return int
     * @throws RequiredParameterException
     */
    public function getLength()
    {
        if (!$this->length && empty($this->places)) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::length" is required.
                '
            );
        }

        return $this->length;
    }

    /**
     * @deprecated
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
    public function getPickupTypes()
    {
        return $this->pickupTypes;
    }

    /**
     * @param array $pickupTypes
     *
     * @return CalculatorRequest
     */
    public function setPickupTypes($pickupTypes)
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
     * @return CalculatorRequest
     */
    public function setDeliveryTypes($deliveryTypes)
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
     * @return bool
     */
    public function isSelfDelivery()
    {
        return $this->selfDelivery;
    }

    /**
     * @param bool $selfDelivery
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
     * @return bool
     */
    public function getIncludeFees()
    {
        return $this->includeFees;
    }

    /**
     * @param bool $includeFees
     *
     * @return CalculatorRequest
     */
    public function setIncludeFees($includeFees)
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
     * @param string $extraParamName
     * @param string|numeric|bool $extraParamValue
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

    /**
     * @return Place[]
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * @param Place[] $places
     * @return $this
     */
    public function setPlaces($places)
    {
        $this->places = $places;
        return $this;
    }

    /**
     * @param Place $place
     * @return $this
     */
    public function addPlace($place)
    {
        $this->places[] = $place;
        return $this;
    }

    /**
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }

    /**
     * @param string $promoCode
     * @return CalculatorRequest
     */
    public function setPromoCode($promoCode)
    {
        $this->promoCode = $promoCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomCode()
    {
        return $this->customCode;
    }

    /**
     * @param string $customCode
     * @return CalculatorRequest
     */
    public function setCustomCode($customCode)
    {
        $this->customCode = $customCode;
        return $this;
    }

    /**
     * @deprecated
     */
    public function getTariffId(): int
    {
        return $this->tariffId;
    }

    /**
     * @deprecated
     */
    public function setTariffId(int $tariffId): CalculatorRequest
    {
        $this->tariffId = $tariffId;
        return $this;
    }

    public function getTariffIds(): array
    {
        return $this->tariffIds;
    }

    public function setTariffIds($tariffIds): self
    {
        $this->tariffIds = $tariffIds;
        return $this;
    }

    public function getPointInId(): int
    {
        return $this->pointInId;
    }

    public function setPointInId(int $pointInId): CalculatorRequest
    {
        $this->pointInId = $pointInId;
        return $this;
    }

    public function getPointOutId(): int
    {
        return $this->pointOutId;
    }

    public function setPointOutId(int $pointOutId): CalculatorRequest
    {
        $this->pointOutId = $pointOutId;
        return $this;
    }
}
