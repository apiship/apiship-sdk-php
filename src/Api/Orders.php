<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CreateOrderRequest;
use Apiship\Entity\Response\CreateOrderResponse;
use Apiship\Entity\Response\Part\Order\FailedOrder;
use Apiship\Entity\Response\Part\Order\OrderInfo;
use Apiship\Entity\Response\Part\Order\OrderStatus;
use Apiship\Entity\Response\Part\Order\SucceedOrder;
use Apiship\Entity\Response\StatusResponse;
use Apiship\Entity\Response\StatusesResponse;

class Orders extends AbstractApi
{
    /**
     * Создание заказа в системе
     *
     * @param CreateOrderRequest $request
     *
     * @return CreateOrderResponse
     */
    public function create(CreateOrderRequest $request)
    {
        $resultJson = $this->adapter->post('orders', [], $request->asJson());
        $result     = json_decode($resultJson);

        $response = new CreateOrderResponse();
        $response->setOriginJson($resultJson);

        foreach ($result as $key => $value) {
            try {
                $response->$key = $value;
            } catch (\Exception $e) {
                continue;
            }
        }

        return $response;
    }

    /**
     * Получение статуса заказа
     *
     * @param int $orderId ID заказа
     *
     * @return CreateOrderResponse
     */
    public function getStatusByOrderId($orderId)
    {
        $resultJson = $this->adapter->get('orders/' . trim($orderId) . '/status');
        $result     = json_decode($resultJson);

        $response = new StatusResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->orderInfo)) {
            $orderInfo = new OrderInfo();
            foreach ($result->orderInfo as $key => $value) {
                try {
                    $orderInfo->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }
            $response->setOrderInfo($orderInfo);
        }

        if (!empty($result->status)) {
            $orderStatus = new OrderStatus();
            foreach ($result->status as $key => $value) {
                try {
                    $orderStatus->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }
            $response->setStatus($orderStatus);
        }

        return $response;
    }

    /**
     * Получение статуса заказа по номеру заказа в системе клиента
     *
     * @param string $clientNumber Номер заказа клиента
     *
     * @return CreateOrderResponse
     */
    public function getStatusByClientNumber($clientNumber)
    {
        $resultJson = $this->adapter->get('orders/status', [], ['clientNumber' => trim($clientNumber)]);
        $result     = json_decode($resultJson);

        $response = new StatusResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->orderInfo)) {
            $orderInfo = new OrderInfo();
            foreach ($result->orderInfo as $key => $value) {
                try {
                    $orderInfo->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }
            $response->setOrderInfo($orderInfo);
        }

        if (!empty($result->status)) {
            $orderStatus = new OrderStatus();
            foreach ($result->status as $key => $value) {
                try {
                    $orderStatus->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }
            $response->setStatus($orderStatus);
        }

        return $response;
    }

    /**
     * Получение статусов по нескольким заказам
     *
     * @param array $orderIds Массив ID заказов
     *
     * @return CreateOrderResponse
     */
    public function getStatuses(array $orderIds)
    {
        $resultJson = $this->adapter->post('orders/statuses', [], json_encode(['orderIds' => $orderIds]));
        $result     = json_decode($resultJson);

        $response = new StatusesResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->succeedOrders)) {
            foreach ($result->succeedOrders as $succeedOrder) {
                $succeedOrderResult = new SucceedOrder();

                if (!empty($succeedOrder->orderInfo)) {
                    $orderInfo = new OrderInfo();
                    foreach ($succeedOrder->orderInfo as $key => $value) {
                        try {
                            $orderInfo->$key = $value;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    $succeedOrderResult->setOrderInfo($orderInfo);
                }


                if (!empty($succeedOrder->status)) {
                    $orderStatus = new OrderStatus();
                    foreach ($succeedOrder->status as $key => $value) {
                        try {
                            $orderStatus->$key = $value;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    $succeedOrderResult->setStatus($orderStatus);
                }

                $response->addSucceedOrder($succeedOrderResult);
            }
        }

        if (!empty($result->failedOrders)) {
            foreach ($result->failedOrders as $failedOrder) {
                $failedOrderResult = new FailedOrder();

                foreach ($failedOrder as $key => $value) {
                    try {
                        $failedOrderResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addFailedOrders($failedOrderResult);
            }
        }

        return $response;
    }
}
