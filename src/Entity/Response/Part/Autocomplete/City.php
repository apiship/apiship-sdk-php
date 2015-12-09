<?php

namespace Apiship\Entity\Response\Part\Autocomplete;

use Apiship\Entity\AbstractResponsePart;

class City extends AbstractResponsePart
{
    /**
     * @var string GUID региона в системе ФИАС
     */
    protected $regionGuid;

    /**
     * @var string Тип региона
     */
    protected $regionType;

    /**
     * @var string Название региона
     */
    protected $region;

    /**
     * @var string GUID района в системе ФИАС
     */
    protected $areaGuid;

    /**
     * @var string Тип района
     */
    protected $areaType;

    /**
     * @var string Название района
     */
    protected $area;

    /**
     * @var string GUID населенного пункта в системе ФИАС
     */
    protected $cityGuid;

    /**
     * @var string Тип населенного пункта
     */
    protected $cityType;

    /**
     * @var string Название населенного пункта
     */
    protected $city;

    /**
     * @return string
     */
    public function getRegionGuid()
    {
        return $this->regionGuid;
    }

    /**
     * @param string $regionGuid
     *
     * @return City
     */
    public function setRegionGuid($regionGuid)
    {
        $this->regionGuid = $regionGuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegionType()
    {
        return $this->regionType;
    }

    /**
     * @param string $regionType
     *
     * @return City
     */
    public function setRegionType($regionType)
    {
        $this->regionType = $regionType;
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
     * @return City
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getAreaGuid()
    {
        return $this->areaGuid;
    }

    /**
     * @param string $areaGuid
     *
     * @return City
     */
    public function setAreaGuid($areaGuid)
    {
        $this->areaGuid = $areaGuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getAreaType()
    {
        return $this->areaType;
    }

    /**
     * @param string $areaType
     *
     * @return City
     */
    public function setAreaType($areaType)
    {
        $this->areaType = $areaType;
        return $this;
    }

    /**
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param string $area
     *
     * @return City
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

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
     * @return City
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
     * @return City
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
     * @return City
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }
}