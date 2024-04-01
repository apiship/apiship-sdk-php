<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CourierCallRequest;
use Apiship\Entity\Response\CancelCourierCallResponse;
use Apiship\Entity\Response\CourierCallResponse;
use Apiship\Entity\Response\CreateOrderResponse;
use Exception;

class CourierCall extends AbstractApi
{
    /**
     * Метод пытается удалить вызов курьера из системы провайдера.
     *
     * @param int $courierCallId
     *
     * @return CancelCourierCallResponse
     */
    public function cancel($courierCallId)
    {
        $resultJson = $this->adapter->post('courierCall/' . $courierCallId . '/cancel', []);
        $result = json_decode($resultJson);

        $response = new CancelCourierCallResponse();
        $response->setOriginJson($resultJson);

        foreach ($result as $key => $value) {
            try {
                $response->$key = $value;
            } catch (Exception $e) {
                continue;
            }
        }

        return $response;
    }

    /**
     * Создание заявки на вызов курьера
     *
     * @param CourierCallRequest $request
     *
     * @return CourierCallResponse
     */
    public function create(CourierCallRequest $request)
    {
        $resultJson = $this->adapter->post('courierCall', [], $request->asJson());
        $result = json_decode($resultJson);

        $response = new CourierCallResponse();
        $response->setOriginJson($resultJson);

        foreach ($result as $key => $value) {
            try {
                $response->$key = $value;
            } catch (Exception $e) {
                continue;
            }
        }

        return $response;
    }
}
