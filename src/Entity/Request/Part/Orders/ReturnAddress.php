<?php

namespace Apiship\Entity\Request\Part\Orders;

use Apiship\Entity\AbstractRequestPart;
use Apiship\Exception\RequiredParameterException;

class ReturnAddress extends AbstractRequestPart
{
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
     * @var string Улица/проспект
     */
    protected $street;
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
     * @var float Широта
     */
    protected $lat;
    /**
     * @var float Долгота
     */
    protected $lng;
    /**
     * @var string ИНН компании (если юр.лицо)
     */
    protected $companyInn;
    /**
     * @var string Название компании
     */
    protected $companyName;
    /**
     * @var string Контактное лицо (ФИО)
     */
    protected $contactName;
    /**
     * @var string Телефон контактного лица
     */
    protected $phone;
    /**
     * @var string Email контактного лица
     */
    protected $email;
    /**
     * @var string Комментарий
     */
    protected $comment;

    /**
     * @var string Адрес строкой
     */
    protected $addressString;

    /**
     * @return string
     */
    public function getCompanyInn()
    {
        return $this->companyInn;
    }

    /**
     * @param string $companyInn
     *
     * @return ReturnAddress
     */
    public function setCompanyInn($companyInn)
    {
        $this->companyInn = $companyInn;
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
     *
     * @return ReturnAddress
     */
    public function setPostIndex($postIndex)
    {
        $this->postIndex = $postIndex;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getCountryCode()
    {
        if (!$this->countryCode) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::countryCode" is required.
                '
            );
        }

        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return ReturnAddress
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getRegion()
    {
        if (!$this->region && !$this->cityGuid) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::region" is required when "' . get_class($this) . '::cityGuid" is empty.
                '
            );
        }

        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return ReturnAddress
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
     *
     * @return ReturnAddress
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getCity()
    {
        if (!$this->city && !$this->cityGuid) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::city" is required when "' . get_class($this) . '::cityGuid" is empty.
                '
            );
        }

        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return ReturnAddress
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
     *
     * @return ReturnAddress
     */
    public function setCityGuid($cityGuid)
    {
        $this->cityGuid = $cityGuid;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getStreet()
    {
        if (!$this->street) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::street" is required.
                '
            );
        }

        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return ReturnAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getHouse()
    {
        if (!$this->house) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::house" is required.
                '
            );
        }

        return $this->house;
    }

    /**
     * @param string $house
     *
     * @return ReturnAddress
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
     *
     * @return ReturnAddress
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
     *
     * @return ReturnAddress
     */
    public function setOffice($office)
    {
        $this->office = $office;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     *
     * @return ReturnAddress
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getContactName()
    {
        if (!$this->contactName) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::contactName" is required.
                '
            );
        }

        return $this->contactName;
    }

    /**
     * @param string $contactName
     *
     * @return ReturnAddress
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getPhone()
    {
        if (!$this->phone) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::phone" is required.
                '
            );
        }

        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return ReturnAddress
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return ReturnAddress
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return ReturnAddress
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressString()
    {
        return $this->addressString;
    }

    /**
     * @param string $addressString
     *
     * @return ReturnAddress
     */
    public function setAddressString($addressString)
    {
        $this->addressString = $addressString;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;
        return $this;
    }
}
