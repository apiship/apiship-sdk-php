<?php

namespace Apiship\Entity\Request\Part\Orders;

use Apiship\Entity\AbstractRequestPart;
use Apiship\Exception\RequiredParameterException;

class Item extends AbstractRequestPart
{
    /**
     * @var string Штрихкод
     */
    protected $barcode;
    /**
     * @var string Артикул
     */
    protected $articul;
    /**
     * @var string Описание
     */
    protected $description;
    /**
     * @var float Вес (грамм)
     */
    protected $weight;
    /**
     * @var float Длина (грамм)
     */
    protected $length;
    /**
     * @var float Ширина (см)
     */
    protected $width;
    /**
     * @var float Высота (см)
     */
    protected $height;
    /**
     * @var float Оценочная стоимость единицы товара
     */
    protected $assessedCost;
    /**
     * @var float Стоимость единицы товара
     */
    protected $cost;
    /**
     * @var float Стоимость единицы товара включая НДС
     */
    protected $costVat;
    /**
     * @var int Количество товара
     */
    protected $quantity;

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     *
     * @return Item
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getArticul()
    {
        return $this->articul;
    }

    /**
     * @param string $articul
     *
     * @return Item
     */
    public function setArticul($articul)
    {
        $this->articul = $articul;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getDescription()
    {
        if (!$this->description) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::description" is required.
                ');
        }

        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     *
     * @return Item
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     *
     * @return Item
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     *
     * @return Item
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     *
     * @return Item
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
     * @return Item
     */
    public function setAssessedCost($assessedCost)
    {
        $this->assessedCost = $assessedCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     *
     * @return Item
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return float
     */
    public function getCostVat()
    {
        return $this->costVat;
    }

    /**
     * @param float $costVat
     *
     * @return Item
     */
    public function setCostVat($costVat)
    {
        $this->costVat = $costVat;
        return $this;
    }

    /**
     * @return int
     * @throws RequiredParameterException
     */
    public function getQuantity()
    {
        if (!$this->quantity) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::quantity" is required.
                ');
        }

        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return Item
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}