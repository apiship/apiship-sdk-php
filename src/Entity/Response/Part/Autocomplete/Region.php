<?php

namespace Apiship\Entity\Response\Part\Autocomplete;

use Apiship\Entity\AbstractResponsePart;

class Region extends AbstractResponsePart
{
    /**
     * @var string ФИАС региона
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
     * @return string
     */
    public function getRegionGuid()
    {
        return $this->regionGuid;
    }

    /**
     * @param string $regionGuid
     *
     * @return Region
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
     * @return Region
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
     * @return Region
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }
}