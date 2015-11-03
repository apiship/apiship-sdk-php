<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Calculator\CalculatorItem;

class CalculatorResponse extends AbstractResponse
{
    /**
     * @var CalculatorItem[]|null объект доставки до двери
     */
    protected $deliveryToDoor;
    /**
     * @var CalculatorItem[]|null объект доставки до точки
     */
    protected $deliveryToPoint;

    /**
     * @return CalculatorItem[]|null
     */
    public function getDeliveryToDoor()
    {
        return $this->deliveryToDoor;
    }

    /**
     * @param CalculatorItem[] $deliveryToDoor
     *
     * @return CalculatorResponse
     */
    public function setDeliveryToDoor(array $deliveryToDoor)
    {
        foreach ($deliveryToDoor as $item) {
            $this->addDeliveryToDoor($item);
        }

        return $this;
    }

    /**
     * @param CalculatorItem $deliveryToDoor
     *
     * @return CalculatorResponse
     */
    public function addDeliveryToDoor(CalculatorItem $deliveryToDoor)
    {
        $this->deliveryToDoor[] = $deliveryToDoor;

        return $this;
    }

    /**
     * @return CalculatorItem[]|null
     */
    public function getDeliveryToPoint()
    {
        return $this->deliveryToPoint;
    }

    /**
     * @param CalculatorItem[]|null $deliveryToPoint
     *
     * @return CalculatorResponse
     */
    public function setDeliveryToPoint($deliveryToPoint)
    {
        foreach ($deliveryToPoint as $item) {
            $this->addDeliveryToPoint($item);
        }
        return $this;
    }

    /**
     * @param CalculatorItem $deliveryToPoint
     *
     * @return CalculatorResponse
     */
    public function addDeliveryToPoint(CalculatorItem $deliveryToPoint)
    {
        $this->deliveryToPoint[] = $deliveryToPoint;

        return $this;
    }
}