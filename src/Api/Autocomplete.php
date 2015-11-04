<?php

namespace Apiship\Api;

use Apiship\Entity\Response\GetRegionResponse;
use Apiship\Entity\Response\GetAreaResponse;
use Apiship\Entity\Response\GetCityResponse;
use Apiship\Entity\Response\GetStreetResponse;
use Apiship\Entity\Response\Part\Autocomplete\Region;
use Apiship\Entity\Response\Part\Autocomplete\Area;
use Apiship\Entity\Response\Part\Autocomplete\City;
use Apiship\Entity\Response\Part\Autocomplete\Street;

class Autocomplete extends AbstractApi
{
    /**
     * Автодополнение по наименованию региона
     *
     * @param string $query Наименование региона
     *
     * @return GetRegionResponse
     */
    public function getRegion($query)
    {
        $resultJson = $this->adapter->get('autocomplete/region/' . urlencode(trim($query)));
        $result     = json_decode($resultJson);

        $response = new GetRegionResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result as $region) {
                $regionResult = new Region();

                foreach ($region as $key => $value) {
                    try {
                        $regionResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addResult($regionResult);
            }
        }

        return $response;
    }

    /**
     * Автодополнение района
     *
     * @param string $query Наименование района
     *
     * @return GetAreaResponse
     */
    public function getArea($query)
    {
        $resultJson = $this->adapter->get('autocomplete/area/' . urlencode(trim($query)));
        $result     = json_decode($resultJson);

        $response = new GetAreaResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result as $region) {
                $regionResult = new Area();

                foreach ($region as $key => $value) {
                    try {
                        $regionResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addResult($regionResult);
            }
        }

        return $response;
    }

    /**
     * Автодополнение по городу
     *
     * @param string $query Наименование населённого пункта
     *
     * @return GetCityResponse
     */
    public function getCity($query)
    {
        $resultJson = $this->adapter->get('autocomplete/city/' . urlencode(trim($query)));
        $result     = json_decode($resultJson);

        $response = new GetCityResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result as $region) {
                $regionResult = new City();

                foreach ($region as $key => $value) {
                    try {
                        $regionResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addResult($regionResult);
            }
        }

        return $response;
    }

    /**
     * Автодополнение по названию улицы в населенном пункте.
     * Возвращает список подходящих улиц.
     *
     * @param string $query Наименование населённого пункта
     * @param string $guid  GUID города в системе ФИАС
     *
     * @return GetStreetResponse
     */
    public function getStreet($query, $guid)
    {
        $resultJson = $this->adapter->get('autocomplete/street/' . urlencode(trim($query)), [], ['guid' => $guid]);
        $result     = json_decode($resultJson);

        $response = new GetStreetResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result as $region) {
                $regionResult = new Street();

                foreach ($region as $key => $value) {
                    try {
                        $regionResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addResult($regionResult);
            }
        }

        return $response;
    }
}
