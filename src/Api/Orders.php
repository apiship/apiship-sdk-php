<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CreateOrderRequest;
use Apiship\Entity\Response\CreateOrderResponse;

class Orders extends AbstractApi
{
    /**
     * @param CreateOrderRequest $order
     *
     * @return CreateOrderResponse
     */
    public function create(CreateOrderRequest $order)
    {
        $result = $this->adapter->post('orders', [], $order->asJson());
        $result = json_decode($result);

        $response = new CreateOrderResponse();

        foreach ($result as $key => $value) {
            $response->$key = $value;
        }

        return $response;
    }
}
