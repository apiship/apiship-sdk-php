<?php

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

class Point extends AbstractResponsePart
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string СД
     */
    protected $providerKey;
    /**
     * @var string Тип точки
     */
    protected $type;
    /**
     * @var string Тип операции
     */
    protected $availableOperation;
    /**
     * @var string Широта
     */
    protected $lat;
    /**
     * @var string Долгота
     */
    protected $lng;
    /**
     * @var string Код точки в системе службы доставки
     */
    protected $code;
    /**
     * @var string Индекс
     */
    protected $postIndex;
    /**
     * @var string Код страны
     */
    protected $countryCode;
    /**
     * @var string Регион
     */
    protected $region;
    /**
     * @var string Тип региона
     */
    protected $regionType;
    /**
     * @var string Район
     */
    protected $area;
    /**
     * @var string Город/село/поселок
     */
    protected $city;

    /**
     * @var string ФИАС для города/села/поселка
     */
    protected $cityGuid;
    /**
     * @var string Тип города
     */
    protected $cityType;
    /**
     * @var string Населенный пункт
     */
    protected $community;
    /**
     * @var string ФИАС-код населенного пункта
     */
    protected $communityGuid;
    /**
     * @var string Тип населенного пункта
     */
    protected $communityType;
    /**
     * @var string Улица/проспект
     */
    protected $street;
    /**
     * @var string Аббревиатура улицы
     */
    protected $streetType;
    /**
     * @var string Дом
     */
    protected $house;
    /**
     * @var string Корпус/строение
     */
    protected $block;
    /**
     * @var string Квартира/офис
     */
    protected $office;
    /**
     * @var string Домашняя страница
     */
    protected $url;
    /**
     * @var string Email
     */
    protected $email;
    /**
     * @var string Телефон
     */
    protected $phone;
    /**
     * @var string Режим работы
     */
    protected $timetable;
    /**
     * @var array Режим работы по дням (1 - пн; 7 - вс) Отсутствие дня означает выходной
     */
    protected $worktime;
    /**
     * @var int
     */
    protected $fittingRoom;

    /**
     * @var string Наименование ПВЗ
     */
    protected $name;

    /**
     * @var array Изображения
     */
    protected $photos;
    /**
     * @var Metro[]|null
     */
    protected $metro;
    /**
     * @var Extra[]|null
     */
    protected $extra;

    /**
     * @var int|null Прием оплаты при получении
     */
    protected $cod;

    /**
     * @var int|null Возможность оплаты наличными
     */
    protected $paymentCash;

    /**
     * @var int|null Возможность оплаты картой
     */
    protected $paymentCard;
    /**
     * @var int Возможна ли выдача многоместных отправлений (null - нет данных, 1 - выдача возможна, 0 - выдача невозможна)
     */
    protected $multiplaceDeliveryAllowed;

    /**
     * @var string Полый адрес
     */
    protected $address;

    /**
     * @var string Описание ПВЗ
     */
    protected $description;

    /**
     * @var array Лимиты ВГX ПВЗ
     */
    protected $limits;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
     * @param string $providerKey
     * @return $this
     */
    public function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvailableOperation()
    {
        return $this->availableOperation;
    }

    /**
     * @param string $availableOperation
     * @return $this
     */
    public function setAvailableOperation($availableOperation)
    {
        $this->availableOperation = $availableOperation;

        return $this;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param string $lng
     * @return $this
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostIndex()
    {
        return $this->postIndex;
    }

    /**
     * @param string $postIndex
     * @return $this
     */
    public function setPostIndex($postIndex)
    {
        $this->postIndex = $postIndex;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

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
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param string $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityGuid()
    {
        return $this->cityGuid;
    }

    /**
     * @param string $cityGuid
     * @return $this
     */
    public function setCityGuid($cityGuid)
    {
        $this->cityGuid = $cityGuid;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetType()
    {
        return $this->streetType;
    }

    /**
     * @param string $streetType
     * @return $this
     */
    public function setStreetType($streetType)
    {
        $this->streetType = $streetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @param string $house
     * @return $this
     */
    public function setHouse($house)
    {
        $this->house = $house;

        return $this;
    }

    /**
     * @return string
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param string $block
     * @return $this
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @param string $office
     * @return $this
     */
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimetable()
    {
        return $this->timetable;
    }

    /**
     * @param string $timetable
     * @return $this
     */
    public function setTimetable($timetable)
    {
        $this->timetable = $timetable;

        return $this;
    }

    /**
     * @return array
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param array $photos
     *
     * @return $this
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param int $cod
     * @return $this
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentCash()
    {
        return $this->paymentCash;
    }

    /**
     * @param int|null $paymentCash
     *
     * @return $this
     */
    public function setPaymentCash($paymentCash)
    {
        $this->paymentCash = $paymentCash;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentCard()
    {
        return $this->paymentCard;
    }

    /**
     * @param int|null $paymentCard
     *
     * @return $this
     */
    public function setPaymentCard($paymentCard)
    {
        $this->paymentCard = $paymentCard;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * @param array $limits
     * @return $this
     */
    public function setLimits($limits)
    {
        $this->limits = $limits;
        return $this;
    }

    public function getRegionType(): ?string
    {
        return $this->regionType;
    }

    public function setRegionType(?string $regionType): self
    {
        $this->regionType = $regionType;
        return $this;
    }

    public function getCityType(): ?string
    {
        return $this->cityType;
    }

    public function setCityType(?string $cityType): self
    {
        $this->cityType = $cityType;
        return $this;
    }

    public function getCommunity(): ?string
    {
        return $this->community;
    }
    public function setCommunity(?string $community): self
    {
        $this->community = $community;
        return $this;
    }

    public function getCommunityGuid(): ?string
    {
        return $this->communityGuid;
    }

    public function setCommunityGuid(?string $communityGuid): self
    {
        $this->communityGuid = $communityGuid;
        return $this;
    }

    public function getCommunityType(): ?string
    {
        return $this->communityType;
    }

    public function setCommunityType(?string $communityType): self
    {
        $this->communityType = $communityType;
        return $this;
    }

    public function getWorktime(): ?array
    {
        return $this->worktime;
    }

    public function setWorktime(?\stdClass $worktime): self
    {
        $this->worktime = (array)$worktime;
        return $this;
    }

    public function getFittingRoom(): ?int
    {
        return $this->fittingRoom;
    }

    public function setFittingRoom(?int $fittingRoom): self
    {
        $this->fittingRoom = $fittingRoom;
        return $this;
    }

    /**
     * @return Metro[]|null
     */
    public function getMetro(): ?array
    {
        return $this->metro;
    }

    public function setMetro(?array $metro): self
    {
        $this->metro = [];

        if (!empty($metro)) {
            foreach ($metro as $item) {
                $this->metro[] = new Metro((array)$item);
            }
        }

        return $this;
    }

    /**
     * @return Extra[]|null
     */
    public function getExtra(): ?array
    {
        return $this->extra;
    }

    public function setExtra(?array $extra): self
    {
        $this->extra = [];

        if (!empty($extra)) {
            foreach ($extra as $item) {
                $this->extra[] = new Extra($item);
            }
        }

        return $this;
    }

    public function getMultiplaceDeliveryAllowed(): ?int
    {
        return $this->multiplaceDeliveryAllowed;
    }

    public function setMultiplaceDeliveryAllowed(?int $multiplaceDeliveryAllowed): self
    {
        $this->multiplaceDeliveryAllowed = $multiplaceDeliveryAllowed;
        return $this;
    }
}
