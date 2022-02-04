<?php
/**
 * @author Serge Rodovnichenko <serge@syrnik.com>
 * @copyright Serge Rodovnichenko, 2020
 */

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

/**
 * Class Service
 * @package Apiship\Entity\Response\Part\Lists
 */
class Service extends AbstractResponsePart
{
    /** @var string */
    protected $providerKey = '';
    /** @var string */
    protected $name = '';
    /** @var string */
    protected $extraParamName = '';
    /** @var string */
    protected $valueType = '';
    /** @var string */
    protected $valueDescription = '';
    /** @var string */
    protected $description = '';

    /**
     * @return string
     */
    public function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
     * @param string $providerKey
     * @return Service
     */
    public function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtraParamName()
    {
        return $this->extraParamName;
    }

    /**
     * @param string $extraParamName
     * @return Service
     */
    public function setExtraParamName($extraParamName)
    {
        $this->extraParamName = $extraParamName;
        return $this;
    }

    /**
     * @return string
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     * @return Service
     */
    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
        return $this;
    }

    /**
     * @return string
     */
    public function getValueDescription()
    {
        return $this->valueDescription;
    }

    /**
     * @param string $valueDescription
     * @return Service
     */
    public function setValueDescription($valueDescription)
    {
        $this->valueDescription = $valueDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Service
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
