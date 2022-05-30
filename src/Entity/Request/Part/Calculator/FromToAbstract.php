<?php

namespace Apiship\Entity\Request\Part\Calculator;

use Apiship\Entity\AbstractRequestPart;
use Apiship\Exception\RequiredParameterException;

abstract class FromToAbstract extends AbstractRequestPart
{
    /**
     * @var string ID города в базе ФИАС (обязательно если не заполнен city)
     */
    public $cityGuid;
    /**
     * @var string Название региона
     */
    public $region;
    /**
     * @var string Название города (обязательно если не заполнен cityGuid)
     */
    public $city;
    /**
     * @var string Код страны в соответствии с ISO 3166-1 alpha-2
     */
    public $countryCode;

    /**
     * @var string Тип города (город, село и т.д.)
     */
    public $cityType;

    /**
     * @var string Почтовый индекс
     */
    public $index;
    /**
     * @var string Адрес одной строкой
     */
    public $addressString;
    /**
     * @var float Широта
     */
    public $lat;
    /**
     * @var float Долгота
     */
    public $lng;
    /**
     * @var string ФИАС улицы
     */
    public $streetGuid;

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getCityGuid()
    {
        if (!$this->cityGuid && !$this->city) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::cityGuid" is required when "' . get_class($this) . '::city" is empty.
                '
            );
        }

        return $this->cityGuid;
    }

    /**
     * @param string $cityGuid
     *
     * @return FromToAbstract
     */
    public function setCityGuid($cityGuid)
    {
        $this->cityGuid = $cityGuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return FromToAbstract
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getCity()
    {
        if (!$this->cityGuid && !$this->city) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::city" is required when "' . get_class($this) . '::cityGuid" is empty.
                '
            );
        }

        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return FromToAbstract
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return FromToAbstract
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCityType()
    {
        return $this->cityType;
    }

    /**
     * @param string $cityType
     *
     * @return FromToAbstract
     */
    public function setCityType($cityType)
    {
        $this->cityType = $cityType;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param string $index
     *
     * @return FromToAbstract
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressString()
    {
        return $this->addressString;
    }

    /**
     * @param string $addressString
     *
     * @return FromToAbstract
     */
    public function setAddressString($addressString)
    {
        $this->addressString = $addressString;
        return $this;
    }

    /**
     * @return int
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param int $lat
     *
     * @return FromToAbstract
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return int
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param int $lng
     *
     * @return FromToAbstract
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetGuid()
    {
        return $this->streetGuid;
    }

    /**
     * @param string $streetGuid
     *
     * @return FromToAbstract
     */
    public function setStreetGuid($streetGuid)
    {
        $this->streetGuid = $streetGuid;
        return $this;
    }

}