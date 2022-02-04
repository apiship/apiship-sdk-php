<?php

namespace Apiship\Entity\Request\Part\Calculator;

use Apiship\Entity\AbstractRequestPart;
use Apiship\Exception\RequiredParameterException;

class Place extends AbstractRequestPart
{
    /**
     * @var float Вес всего заказа (в граммах)
     */
    public $weight;
    /**
     * @var integer Ширина заказа (в сантиметрах)
     */
    public $width;
    /**
     * @var integer Высота заказа (в сантиметрах)
     */
    public $height;
    /**
     * @var integer Длина заказа (в сантиметрах)
     */
    public $length;

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return Place
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Place
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Place
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return Place
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }
}