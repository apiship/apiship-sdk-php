<?php

namespace Apiship\Api;

use Apiship\Entity\Response\GetRegionResponse;
use Apiship\Entity\Response\ListsPointsResponse;
use Apiship\Entity\Response\ListsProvidersResponse;
use Apiship\Entity\Response\Part\Lists\Point;
use Apiship\Entity\Response\Part\Lists\Provider;

class Lists extends AbstractApi
{
    /**
     * Получение списка доступных СД
     *
     * @param int    $limit
     *
     * @param int    $offset
     * @param string $filter Возможна фильтрация по полям key, name
     * @return GetRegionResponse
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
                    } catch (\Exception $e) {
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
     * @return GetRegionResponse
     */
    public function getPoints($limit = 20, $offset = 0, $filter = '')
    {
        if (!is_int($limit) || $limit < 0) {
            $limit = 20;
        }

        if (!is_int($offset) || $offset < 0) {
            $offset = 0;
        }

        $resultJson = $this->adapter->get('lists/points/', [],
            ['limit'  => $limit,
             'offset' => $offset,
             'filter' => $filter
            ]);
        $result     = json_decode($resultJson);

        $response = new ListsPointsResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ((array)$result->rows as $point) {
                $pointResult = new Point();

                foreach ($point as $key => $value) {
                    try {
                        $pointResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addResult($pointResult);
            }
        }

        return $response;
    }
}
