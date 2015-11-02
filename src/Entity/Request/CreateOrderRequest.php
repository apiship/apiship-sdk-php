<?php

namespace Apiship\Entity\Request;

use Apiship\Entity\AbstractRequest;
use Apiship\Entity\Request\Part\Orders\Order;
use Apiship\Entity\Request\Part\Orders\Cost;
use Apiship\Entity\Request\Part\Orders\Sender;
use Apiship\Entity\Request\Part\Orders\Recipient;
use Apiship\Entity\Request\Part\Orders\Item;
use Apiship\Entity\Request\Part\Orders\Place;
use Apiship\Entity\Request\Part\Orders\ExtraParam;
use Apiship\Exception\RequiredParameterException;

class CreateOrderRequest extends AbstractRequest
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
     * @var Sender Инфрмация об отправителе
     */
    protected $sender;
    /**
     * @var Recipient Информация о получателе
     */
    protected $recipient;
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
                ');
        }

        return $this->order;
    }

    /**
     * @param Order $order
     *
     * @return CreateOrderRequest
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
                ');
        }

        return $this->cost;
    }

    /**
     * @param Cost $cost
     *
     * @return CreateOrderRequest
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
                ');
        }

        return $this->sender;
    }

    /**
     * @param Sender $sender
     *
     * @return CreateOrderRequest
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
                ');
        }

        return $this->recipient;
    }

    /**
     * @param Recipient $recipient
     *
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
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
     * @return CreateOrderRequest
     */
    public function addExtraParam(ExtraParam $extraParam)
    {
        $this->extraParams[] = $extraParam;

        return $this;
    }
}