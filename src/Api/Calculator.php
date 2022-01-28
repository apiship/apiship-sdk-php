<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CalculatorRequest;
use Apiship\Entity\Response\CalculatorResponse;
use Apiship\Entity\Response\Part\Calculator\CalculatorItem;
use Apiship\Entity\Response\Part\Calculator\Tariff;

class Calculator extends AbstractApi
{
    /**
     * Расчитывает стоимость доставки
     *
     * @param CalculatorRequest $request
     * @param array             $headers
     *
     * @return CalculatorResponse
     */
    public function calculate(CalculatorRequest $request, $headers = [])
    {
        $resultJson = $this->adapter->post('calculator', $headers, $request->asJson());
        $result     = json_decode($resultJson);

        $response = new CalculatorResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->deliveryToDoor)) {
            foreach ($result->deliveryToDoor as $item) {
                $calculatorItem = new CalculatorItem();
                $calculatorItem->setProviderKey(isset($item->providerKey) ? $item->providerKey : null);
                if (isset($item->tariffs)) {
                    foreach ($item->tariffs as $itemTariff) {
                        $calculatorItemTariff = new Tariff();
                        $calculatorItemTariff->setTariffId(isset($itemTariff->tariffId) ? $itemTariff->tariffId : null)
                                             ->setTariffName(isset($itemTariff->tariffName) ? $itemTariff->tariffName : null)
                                             ->setFrom(isset($itemTariff->from) ? $itemTariff->from : null)
                                             ->setDeliveryCost(isset($itemTariff->deliveryCost) ? $itemTariff->deliveryCost : null)
                                             ->setDaysMin(isset($itemTariff->daysMin) ? $itemTariff->daysMin : null)
                                             ->setDaysMax(isset($itemTariff->daysMax) ? $itemTariff->daysMax : null);

                        $calculatorItem->addTariff($calculatorItemTariff);
                    }
                }
                $response->addDeliveryToDoor($calculatorItem);
            }
        }

        if (!empty($result->deliveryToPoint)) {
            foreach ($result->deliveryToPoint as $item) {
                $calculatorItem = new CalculatorItem();
                $calculatorItem->setProviderKey(isset($item->providerKey) ? $item->providerKey : null);
                if (isset($item->tariffs)) {
                    foreach ($item->tariffs as $itemTariff) {
                        $calculatorItemTariff = new Tariff();
                        $calculatorItemTariff->setTariffId(isset($itemTariff->tariffId) ? $itemTariff->tariffId : null)
                                             ->setTariffName(isset($itemTariff->tariffName) ? $itemTariff->tariffName : null)
                                             ->setFrom(isset($itemTariff->from) ? $itemTariff->from : null)
                                             ->setDeliveryCost(isset($itemTariff->deliveryCost) ? $itemTariff->deliveryCost : null)
                                             ->setDaysMin(isset($itemTariff->daysMin) ? $itemTariff->daysMin : null)
                                             ->setDaysMax(isset($itemTariff->daysMax) ? $itemTariff->daysMax : null)
                                             ->setPointIds(isset($itemTariff->pointIds) ? $itemTariff->pointIds : []);

                        $calculatorItem->addTariff($calculatorItemTariff);
                    }
                }
                $response->addDeliveryToPoint($calculatorItem);
            }
        }

        return $response;
    }
}
