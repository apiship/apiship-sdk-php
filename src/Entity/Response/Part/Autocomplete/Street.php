<?php

namespace Apiship\Entity\Response\Part\Autocomplete;

use Apiship\Entity\AbstractResponsePart;

class Street extends AbstractResponsePart
{
    /**
     * @var string GUID населенного пункта в системе ФИАС
     */
    public $cityGuid;

    /**
     * @var string Тип населенного пункта
     */
    public $cityType;

    /**
     * @var string Название населенного пункта
     */
    public $city;

    /**
     * @var string GUID улицы в системе ФИАС
     */
    public $streetGuid;

    /**
     * @var string Тип улицы (ул., переулок итп)
     */
    public $streetType;

    /**
     * @var string Улица
     */
    public $street;

    /**
     * @return string
     */
    public function getCityGuid()
    {
        return $this->cityGuid;
    }

    /**
     * @param string $cityGuid
     *
     * @return Street
     */
    public function setCityGuid($cityGuid)
    {
        $this->cityGuid = $cityGuid;
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
     * @return Street
     */
    public function setCityType($cityType)
    {
        $this->cityType = $cityType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Street
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @return Street
     */
    public function setStreetGuid($streetGuid)
    {
        $this->streetGuid = $streetGuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetType()
    {
        return $this->streetType;
    }

    /**
     * @param string $streetType
     *
     * @return Street
     */
    public function setStreetType($streetType)
    {
        $this->streetType = $streetType;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return Street
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }
}