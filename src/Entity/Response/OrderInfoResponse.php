<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\OrderInfo\Order;
use Apiship\Entity\Response\Part\OrderInfo\Cost;
use Apiship\Entity\Response\Part\OrderInfo\Sender;
use Apiship\Entity\Response\Part\OrderInfo\Recipient;
use Apiship\Entity\Response\Part\OrderInfo\ReturnAddress;
use Apiship\Entity\Response\Part\OrderInfo\Item;
use Apiship\Entity\Response\Part\OrderInfo\Place;
use Apiship\Entity\Response\Part\OrderInfo\ExtraParam;
use Apiship\Exception\RequiredParameterException;

class OrderInfoResponse extends AbstractResponse
{
    /**
     * @var Order Информация о заказе
     */
    protected $order;
    /**
     * @var Cost Информация о цене
     */
    protected $cost;
    /**
     * @var Sender Информация об отправителе
     */
    protected $sender;
    /**
     * @var Recipient Информация о получателе
     */
    protected $recipient;
    /**
     * @var ReturnAddress
     */
    protected $returnAddress;
    /**
     * @var Item[] Массив с вложениями
     */
    protected $items;
    /**
     * @var Place[] Массив с местами для перевозки
     */
    protected $places;
    /**
     * @var ExtraParam[] Массив доп параметрами
     */
    protected $extraParams;

    /**
     * @return Order
     * @throws RequiredParameterException
     */
    public function getOrder()
    {
        if (!$this->order) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::order" is required.
                '
            );
        }

        return $this->order;
    }

    /**
     * @param Order $order
     *
     * @return OrderInfoResponse
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return Cost
     * @throws RequiredParameterException
     */
    public function getCost()
    {
        if (!$this->cost) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::cost" is required.
                '
            );
        }

        return $this->cost;
    }

    /**
     * @param Cost $cost
     *
     * @return OrderInfoResponse
     */
    public function setCost(Cost $cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return Sender
     * @throws RequiredParameterException
     */
    public function getSender()
    {
        if (!$this->sender) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::sender" is required.
                '
            );
        }

        return $this->sender;
    }

    /**
     * @param Sender $sender
     *
     * @return OrderInfoResponse
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return Recipient
     * @throws RequiredParameterException
     */
    public function getRecipient()
    {
        if (!$this->recipient) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::recipient" is required.
                '
            );
        }

        return $this->recipient;
    }

    /**
     * @param Recipient $recipient
     *
     * @return OrderInfoResponse
     */
    public function setRecipient(Recipient $recipient)
    {
        $this->recipient = $recipient;
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
     * @return OrderInfoResponse
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
     * @return OrderInfoResponse
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return Place[]
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * @param Place[] $places
     *
     * @return OrderInfoResponse
     */
    public function setPlaces(array $places)
    {
        foreach ($places as $place) {
            $this->addPlace($place);
        }

        return $this;
    }

    /**
     * @param Place $place
     *
     * @return OrderInfoResponse
     */
    public function addPlace(Place $place)
    {
        $this->places[] = $place;

        return $this;
    }

    /**
     * @return ExtraParam[]
     */
    public function getExtraParams()
    {
        return $this->extraParams;
    }

    /**
     * @param ExtraParam[] $extraParams
     *
     * @return OrderInfoResponse
     */
    public function setExtraParams(array $extraParams)
    {
        foreach ($extraParams as $extraParam) {
            $this->addExtraParam($extraParam);
        }

        return $this;
    }

    /**
     * @param ExtraParam $extraParam
     *
     * @return OrderInfoResponse
     */
    public function addExtraParam(ExtraParam $extraParam)
    {
        $this->extraParams[] = $extraParam;

        return $this;
    }

    public function getReturnAddress(): ?ReturnAddress
    {
        return $this->returnAddress;
    }

    public function setReturnAddress(?ReturnAddress $returnAddress): self
    {
        $this->returnAddress = $returnAddress;
        return $this;
    }

}
