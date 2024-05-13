<?php

namespace Apiship\Entity\Response\Part\OrderInfo;

use Apiship\Entity\AbstractResponsePart;
use Apiship\Exception\RequiredParameterException;

class Place extends AbstractResponsePart
{
    /**
     * @var string Номер места
     */
    protected $placeNumber;
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
     * @var string Штрихкод
     */
    protected $barcode;
    /**
     * @var Item[] Массив с вложениями
     */
    protected $items;

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
     * @return Place
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceNumber()
    {
        return $this->placeNumber;
    }

    /**
     * @param string $placeNumber
     *
     * @return Place
     */
    public function setPlaceNumber($placeNumber)
    {
        $this->placeNumber = $placeNumber;
        return $this;
    }

    /**
     * @return float
     * @throws RequiredParameterException
     */
    public function getWeight()
    {
        if (!$this->weight) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::weight" is required.
                '
            );
        }

        return $this->weight;
    }

    /**
     * @param float $weight
     *
     * @return Place
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
     * @return Place
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
     * @return Place
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

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
     * @return Place
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     *
     * @return Place
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param Item $item
     *
     * @return Place
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }
}
