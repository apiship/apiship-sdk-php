<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CreateOrderRequest;
use Apiship\Entity\Response\CancelOrderResponse;
use Apiship\Entity\Response\CreateOrderResponse;
use Apiship\Entity\Response\Part\Meta;
use Apiship\Entity\Response\Part\Order\FailedOrder;
use Apiship\Entity\Response\Part\Order\OrderInfo;
use Apiship\Entity\Response\Part\Order\OrderStatus;
use Apiship\Entity\Response\Part\Order\StatusHistory;
use Apiship\Entity\Response\Part\Order\SucceedOrder;
use Apiship\Entity\Response\StatusesByDateResponse;
use Apiship\Entity\Response\StatusHistoryByDateResponse;
use Apiship\Entity\Response\StatusHistoryResponse;
use Apiship\Entity\Response\StatusResponse;
use Apiship\Entity\Response\StatusesResponse;

class Orders extends AbstractApi
{
    /**
     * Метод пытается удалить или отменить заказа из системы провайдера.
     *
     * @param int $orderId
     *
     * @return CancelOrderResponse
     */
    public function cancel($orderId)
    {
        $resultJson = $this->adapter->get('orders/'.$orderId.'/cancel', []);
        $result     = json_decode($resultJson);

        $response = new CancelOrderResponse();
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
     * Изменение заказа в системе
     *
     * @param int $orderId
     *
     * @param CreateOrderRequest $request
     *
     * @return CreateOrderResponse
     */
    public function update($orderId, CreateOrderRequest $request)
    {
        $resultJson = $this->adapter->put('orders/'.$orderId, [], $request->asJson());
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
     * @return StatusResponse
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
     * @return StatusResponse
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
     * @return StatusesResponse
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

    /**
     * Получение измененных статусов по всем заказам клиента (company) после указанной в методе даты
     *
     * @param string $date Дата (в формате '2015-07-30T13:14:37+03:00'), после которой запрашиваются статусы
     *
     * @return StatusesByDateResponse
     */
    public function getStatusesByDate($date)
    {
        $resultJson = $this->adapter->get('orders/statuses/date/' . urlencode(trim($date)));
        $result     = json_decode($resultJson);

        $response = new StatusesByDateResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result)) {
            foreach ($result as $order) {
                $orderResult = new SucceedOrder();

                if (!empty($order->orderInfo)) {
                    $orderInfo = new OrderInfo();
                    foreach ($order->orderInfo as $key => $value) {
                        try {
                            $orderInfo->$key = $value;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    $orderResult->setOrderInfo($orderInfo);
                }


                if (!empty($order->status)) {
                    $orderStatus = new OrderStatus();
                    foreach ($order->status as $key => $value) {
                        try {
                            $orderStatus->$key = $value;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    $orderResult->setStatus($orderStatus);
                }

                $response->addOrder($orderResult);
            }
        }

        return $response;
    }

    /**
     * Получение истории изменения всех статусов с определенной даты
     *
     * @param string $date   Дата заказов (в формате '2015-07-30T13:14:37+03:00'), с которой необходимо получить историю статусов
     * @param int    $limit  Лимит выборки
     * @param int    $offset Смещение выборки
     *
     * @return StatusHistoryByDateResponse
     */
    public function getStatusHistoryByDate($date, $limit = null, $offset = null)
    {
        $queryParams = [];
        if (isset($limit)) {
            $queryParams['limit'] = $limit;
        }
        if (isset($offset)) {
            $queryParams['offset'] = $offset;
        }

        $resultJson = $this->adapter->get('orders/statuses/history/date/' . urlencode(trim($date)), [], $queryParams);
        $result     = json_decode($resultJson);

        $response = new StatusHistoryByDateResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->rows)) {
            foreach ($result->rows as $statusHistory) {
                $statusHistoryResult = new StatusHistory();

                if (!empty($statusHistory->orderInfo)) {
                    $orderInfo = new OrderInfo();
                    foreach ($statusHistory->orderInfo as $key => $value) {
                        try {
                            $orderInfo->$key = $value;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    $statusHistoryResult->setOrderInfo($orderInfo);
                }


                if (!empty($statusHistory->statuses)) {
                    foreach ($statusHistory->statuses as $status) {
                        $orderStatus = new OrderStatus();
                        foreach ($status as $key => $value) {
                            try {
                                $orderStatus->$key = $value;
                            } catch (\Exception $e) {
                                continue;
                            }
                        }
                        $statusHistoryResult->addStatus($orderStatus);
                    }
                }

                $response->addRow($statusHistoryResult);
            }
        }

        if (!empty($result->meta)) {
            $meta = new Meta();

            foreach ($result->meta as $key => $value) {
                try {
                    $meta->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }

            $response->setMeta($meta);
        }

        return $response;
    }

    /**
     * Получение истории изменения всех статусов с определенной даты
     *
     * @param int    $orderId ID заказа
     * @param int    $limit   Лимит выборки
     * @param int    $offset  Смещение выборки
     * @param string $filter  Возможна фильтрация по полям created
     *
     * @return StatusHistoryResponse
     */
    public function getStatusHistory($orderId, $limit = null, $offset = null, $filter = null)
    {
        $queryParams = [];
        if (isset($limit)) {
            $queryParams['limit'] = $limit;
        }
        if (isset($offset)) {
            $queryParams['offset'] = $offset;
        }
        if (isset($filter)) {
            $queryParams['filter'] = $filter;
        }

        $resultJson = $this->adapter->get('orders/' . trim($orderId) . '/statusHistory', [], $queryParams);
        $result     = json_decode($resultJson);

        $response = new StatusHistoryResponse();
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

        if (!empty($result->rows)) {
            foreach ($result->rows as $status) {
                $statusResult = new OrderStatus();

                foreach ($status as $key => $value) {
                    try {
                        $statusResult->$key = $value;
                    } catch (\Exception $e) {
                        continue;
                    }
                }

                $response->addRow($statusResult);
            }
        }

        if (!empty($result->meta)) {
            $meta = new Meta();

            foreach ($result->meta as $key => $value) {
                try {
                    $meta->$key = $value;
                } catch (\Exception $e) {
                    continue;
                }
            }

            $response->setMeta($meta);
        }

        return $response;
    }
}
