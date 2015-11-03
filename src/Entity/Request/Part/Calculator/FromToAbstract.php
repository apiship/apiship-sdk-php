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
     * @return string
     * @throws RequiredParameterException
     */
    public function getCityGuid()
    {
        if (!$this->cityGuid && !$this->city) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::cityGuid" is required when "' . get_class($this) . '::city" is empty.
                ');
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
                ');
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
}