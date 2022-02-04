<?php

namespace Apiship\Api;

use Apiship\Entity\Response\ListsPointsResponse;
use Apiship\Entity\Response\ListsProvidersResponse;
use Apiship\Entity\Response\ListsServicesResponse;
use Apiship\Entity\Response\Part\Lists\Point;
use Apiship\Entity\Response\Part\Lists\PointType;
use Apiship\Entity\Response\Part\Lists\Provider;
use Apiship\Entity\Response\Part\Lists\Service;
use Apiship\Entity\Response\Part\ListsPointTypesResponse;
use Exception;

class Lists extends AbstractApi
{
    /**
     * Получение списка доступных СД
     *
     * @param int    $limit
     *
     * @param int    $offset
     * @param string $filter Возможна фильтрация по полям key, name
     * @return ListsProvidersResponse
     */
    public function getProviders($limit = 20, $offset = 0, $filter = '')
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        if (!is_int($offset) || $offset < 0) {
            $offset = 0;
        }

        $resultJson = $this->adapter->get('lists/providers/', [],
            ['limit'  => $limit,
             'offset' => $offset,
             'filter' => $filter
            ]);
        $result     = json_decode($resultJson);

        $response = new ListsProvidersResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result->rows as $provider) {
                $providerResult = new Provider();

                foreach ($provider as $key => $value) {
                    try {
                        $providerResult->$key = $value;
                    } catch (Exception $e) {
                        continue;
                    }
                }

                $response->addResult($providerResult);
            }
        }

        return $response;
    }

    /**
     * Получение списка ПВЗ
     *
     * @param int    $limit
     *
     * @param int    $offset
     * @param string $filter Возможна фильтрация по полям key, name
     * @param boolean $stateCheckOff Если stateCheckOff=1 отдаются также ПВЗ у которых указан не точный адрес расположения
     * @return ListsPointsResponse
     */
    public function getPoints($limit = 20, $offset = 0, $filter = '', $stateCheckOff = false)
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        if (!is_int($offset) || $offset < 0) {
            $offset = 0;
        }

        $resultJson = $this->adapter->get('lists/points/', [],
            [
                'limit'         => $limit,
                'offset'        => $offset,
                'filter'        => $filter,
                'stateCheckOff' => $stateCheckOff,
            ]);

        $result = json_decode($resultJson);

        $response = new ListsPointsResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result->rows as $point) {
                $pointResult = new Point();

                foreach ($point as $key => $value) {
                    try {
                        $pointResult->$key = $value;
                    } catch (Exception $e) {
                        continue;
                    }
                }

                $response->addResult($pointResult);
            }
        }

        return $response;
    }

    /**
     * Получение списка типов точек приема/выдачи товаров
     *
     * @return ListsPointTypesResponse
     */
    public function getPointTypes()
    {
        $resultJson = $this->adapter->get('lists/pointTypes');
        $result = json_decode($resultJson, true);
        $response = (new ListsPointTypesResponse)->setOriginJson($resultJson);

        if(!empty($result)) {
            foreach ($result as $data) {
                $pointType = new PointType();
                foreach ($data as $key => $datum) {
                    try {
                        $pointType->$key = $datum;
                    } catch (Exception $e) {
                        continue;
                    }
                }

                $response->addResult($pointType);
            }
        }

        return $response;
    }


    /**
     * Получение списка дополнительных услуг службы доставки
     * @param string|null $providerKey Если не указано, то возвращается список доп.услуг по всем службам доставки
     * @return ListsServicesResponse
     */
    public function getServices($providerKey = null)
    {
        $resultJson = $this->adapter->get('lists/services', [], ['providerKey' => $providerKey]);
        $result = json_decode($resultJson, true);

        $response = (new ListsServicesResponse())->setOriginJson($resultJson);
        if (!empty($result)) {
            foreach ($result as $row) {
                $service = new Service();
                foreach ($row as $key => $value) {
                    try {
                        $service->$key = $value;
                    } catch (Exception $e) {
                        continue;
                    }
                }

                $response->addResult($service);
            }
        }

        return $response;
    }
}
