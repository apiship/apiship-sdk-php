<?php

namespace Apiship\Entity\Response\Part\Autocomplete;

use Apiship\Entity\AbstractResponsePart;

class Area extends AbstractResponsePart
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
     * @return string
     */
    public function getRegionGuid()
    {
        return $this->regionGuid;
    }

    /**
     * @param string $regionGuid
     *
     * @return Area
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
     * @return Area
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
     * @return Area
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
     * @return Area
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
     * @return Area
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
     * @return Area
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }
}