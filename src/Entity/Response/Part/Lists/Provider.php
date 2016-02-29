<?php

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

class Provider extends AbstractResponsePart
{
    /**
     * @var string ID службы доставки
     */
    protected $key;
    /**
     * @var string Наименование службы доставки
     */
    protected $name;
    /**
     * @var string Описание службы доставки
     */
    protected $description;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return Provider
     */
    public function setKey($key)
    {
        $this->key = $key;
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
     *
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;
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
     *
     * @return Provider
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}