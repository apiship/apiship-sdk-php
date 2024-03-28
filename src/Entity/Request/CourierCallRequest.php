<?php

namespace Apiship\Entity\Request;

use Apiship\Entity\AbstractRequest;
use Apiship\Entity\Request\Part\Orders\ExtraParam;
use Apiship\Exception\RequiredParameterException;

class CourierCallRequest extends AbstractRequest
{
    /**
     * @var string Код службы доставки
     */
    public $providerKey;

    /**
     * @var int ID подключения вашей компании к СД
     */
    public $providerConnectId;

    /**
     * @var string Дата отгрузки
     */
    public $date;

    /**
     * @var string Начальное время отгрузки
     */
    public $timeStart;

    /**
     * @var string Конечное время отгрузки
    */
    public $timeEnd;

    /**
     * @var int Вес всего заказа (в граммах)
     */
    public $weight;

    /**
     * @var int Ширина заказа (в сантиметрах)
     */
    public $width;

    /**
     * @var int Высота заказа (в сантиметрах)
     */
    public $height;

    /**
     * @var int Длина заказа (в сантиметрах)
     */
    public $length;

    /**
     * @var int[] Номера заказов которые планируются передать с этим курьером
     */
    public $orderIds;

    /**
     * @var string Почтовый индекс
    */
    public $postIndex;

    /**
     * @var string Код страны в соответствии с ISO 3166-1 alpha-2
    */
    public $countryCode;

    /**
     * @var string Область или республика или край
    */
    public $region;

    /**
     * @var string Район
     */
    public $area;

    /**
     * @var string Город или населенный пункт
     */
    public $city;

    /**
     * @var string ID города в базе ФИАС
    */
    public $cityGuid;

    /**
     * @var string Улица
     */
    public $street;

    /**
     * @var string Дом
     */
    public $house;

    /**
     * @var string Строение/Корпус
    */
    public $block;

    /**
     * @var string Офис/Квартира
    */
    public $office;

    /**
     * @var float Широта
     */
    public $lat;

    /**
     * @var float Долгота
     */
    public $lng;

    /**
     * @var string
     */
    public $addressString;

    /**
     * @var string Название компании
     * */
    public $companyName;

    /**
     * @var string ФИО контактного лица
     */
    public $contactName;

    /**
     * @var string Контактный телефон
     */
    public $phone;

    /**
     * @var string Контактный email адрес
     */
    public $email;

    /**
     * @var string Комментарий
     */
    public $comment;

    /**
     * @var ExtraParam[]
     */
    public $extraParams;

    public function getProviderKey()
    {
        return $this->providerKey;
    }

    public function setProviderKey($providerKey): CourierCallRequest
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    public function getProviderConnectId()
    {
        return $this->providerConnectId;
    }

    public function setProviderConnectId($providerConnectId): CourierCallRequest
    {
        $this->providerConnectId = $providerConnectId;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): CourierCallRequest
    {
        $this->date = $date;
        return $this;
    }

    public function getTimeStart()
    {
        return $this->timeStart;
    }

    public function setTimeStart($timeStart): CourierCallRequest
    {
        $this->timeStart = $timeStart;
        return $this;
    }

    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    public function setTimeEnd($timeEnd): CourierCallRequest
    {
        $this->timeEnd = $timeEnd;
        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): CourierCallRequest
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width): CourierCallRequest
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height): CourierCallRequest
    {
        $this->height = $height;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length): CourierCallRequest
    {
        $this->length = $length;
        return $this;
    }

    public function getOrderIds()
    {
        return $this->orderIds;
    }

    public function setOrderIds($orderIds): CourierCallRequest
    {
        $this->orderIds = $orderIds;
        return $this;
    }

    public function addOrderId($orderId): CourierCallRequest
    {
        $this->orderIds[] = $orderId;
        return $this;
    }



    public function getPostIndex()
    {
        return $this->postIndex;
    }

    public function setPostIndex($postIndex): CourierCallRequest
    {
        $this->postIndex = $postIndex;
        return $this;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode): CourierCallRequest
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region): CourierCallRequest
    {
        $this->region = $region;
        return $this;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area): CourierCallRequest
    {
        $this->area = $area;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city): CourierCallRequest
    {
        $this->city = $city;
        return $this;
    }

    public function getCityGuid()
    {
        return $this->cityGuid;
    }

    public function setCityGuid($cityGuid): CourierCallRequest
    {
        $this->cityGuid = $cityGuid;
        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): CourierCallRequest
    {
        $this->street = $street;
        return $this;
    }

    public function getHouse()
    {
        return $this->house;
    }

    public function setHouse($house): CourierCallRequest
    {
        $this->house = $house;
        return $this;
    }

    public function getBlock()
    {
        return $this->block;
    }

    public function setBlock($block): CourierCallRequest
    {
        $this->block = $block;
        return $this;
    }

    public function getOffice()
    {
        return $this->office;
    }

    public function setOffice($office): CourierCallRequest
    {
        $this->office = $office;
        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat): CourierCallRequest
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng): CourierCallRequest
    {
        $this->lng = $lng;
        return $this;
    }

    public function getAddressString()
    {
        return $this->addressString;
    }

    public function setAddressString($addressString): CourierCallRequest
    {
        $this->addressString = $addressString;
        return $this;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName): CourierCallRequest
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function setContactName($contactName): CourierCallRequest
    {
        $this->contactName = $contactName;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): CourierCallRequest
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): CourierCallRequest
    {
        $this->email = $email;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): CourierCallRequest
    {
        $this->comment = $comment;
        return $this;
    }

    public function getExtraParams()
    {
        return $this->extraParams;
    }

    public function setExtraParams($extraParams): CourierCallRequest
    {
        $this->extraParams = $extraParams;
        return $this;
    }
}
