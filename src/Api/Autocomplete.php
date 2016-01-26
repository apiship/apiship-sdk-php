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
     * @param int    $limit
     *
     * @return GetRegionResponse
     */
    public function getRegion($query, $limit = 20)
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        $resultJson = $this->adapter->get('autocomplete/region/' . urlencode(trim($query)), [], ['limit' => $limit]);
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
     * @param int    $limit
     *
     * @return GetAreaResponse
     */
    public function getArea($query, $limit = 20)
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        $resultJson = $this->adapter->get('autocomplete/area/' . urlencode(trim($query)), [], ['limit' => $limit]);
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
     * @param int    $limit
     *
     * @return GetCityResponse
     */
    public function getCity($query, $limit = 20)
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        $resultJson = $this->adapter->get('autocomplete/city/' . urlencode(trim($query)), [], ['limit' => $limit]);
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
     * @param int    $limit
     *
     * @return GetStreetResponse
     */
    public function getStreet($query, $guid, $limit = 20)
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        $resultJson = $this->adapter->get('autocomplete/street/' . urlencode(trim($query)), [],
            ['guid' => $guid, 'limit' => $limit]);
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
