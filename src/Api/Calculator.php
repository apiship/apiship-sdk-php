<?php

namespace Apiship\Api;

use Apiship\Entity\Request\CalculatorRequest;
use Apiship\Entity\Response\CalculatorResponse;
use Apiship\Entity\Response\Part\Calculator\CalculatorItem;
use Apiship\Entity\Response\Part\Calculator\Tariff;

class Calculator extends AbstractApi
{
    /**
     * Рассчитывает стоимость доставки
     *
     * @param CalculatorRequest $request
     * @param array $headers
     *
     * @return CalculatorResponse
     */
    public function calculate(CalculatorRequest $request, $headers = [])
    {
        $resultJson = $this->adapter->post('calculator', $headers, $request->asJson());
        $result = json_decode($resultJson);

        $response = new CalculatorResponse();
        $response->setOriginJson($resultJson);

        if (!empty($result->deliveryToDoor)) {
            foreach ($result->deliveryToDoor as $item) {
                $calculatorItem = new CalculatorItem();
                $calculatorItem->setProviderKey(isset($item->providerKey) ? $item->providerKey : null);
                if (isset($item->tariffs)) {
                    foreach ($item->tariffs as $itemTariff) {
                        $calculatorItemTariff = new Tariff();
                        $calculatorItemTariff
                            ->setTariffProviderId($itemTariff->tariffProviderId ?? null)
                            ->setTariffId(isset($itemTariff->tariffId) ? $itemTariff->tariffId : null)
                            ->setTariffName(isset($itemTariff->tariffName) ? $itemTariff->tariffName : null)
                            ->setFrom(isset($itemTariff->from) ? $itemTariff->from : null)
                            ->setDeliveryCost(isset($itemTariff->deliveryCost) ? $itemTariff->deliveryCost : null)
                            ->setDeliveryCostOriginal($itemTariff->deliveryCostOriginal ?? null)
                            ->setFeesIncluded($itemTariff->feesIncluded ?? null)
                            ->setInsuranceFee($itemTariff->insuranceFee ?? null)
                            ->setCashServiceFee($itemTariff->cashServiceFee ?? null)
                            ->setDaysMin(isset($itemTariff->daysMin) ? $itemTariff->daysMin : null)
                            ->setDaysMax(isset($itemTariff->daysMax) ? $itemTariff->daysMax : null)
                            ->setCalendarDaysMin(isset($itemTariff->calendarDaysMin) ? $itemTariff->calendarDaysMin : null)
                            ->setCalendarDaysMax(isset($itemTariff->calendarDaysMax) ? $itemTariff->calendarDaysMax : null)
                            ->setWorkDaysMin(isset($itemTariff->workDaysMin) ? $itemTariff->workDaysMin : null)
                            ->setWorkDaysMax(isset($itemTariff->workDaysMax) ? $itemTariff->workDaysMax : null)
                            ->setPickupTypes(isset($itemTariff->pickupTypes) ? $itemTariff->pickupTypes : [])
                            ->setDeliveryTypes(isset($itemTariff->deliveryTypes) ? $itemTariff->deliveryTypes : []);

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
                        $calculatorItemTariff
                            ->setTariffProviderId($itemTariff->tariffProviderId ?? null)
                            ->setTariffId(isset($itemTariff->tariffId) ? $itemTariff->tariffId : null)
                            ->setTariffName(isset($itemTariff->tariffName) ? $itemTariff->tariffName : null)
                            ->setFrom(isset($itemTariff->from) ? $itemTariff->from : null)
                            ->setDeliveryCost(isset($itemTariff->deliveryCost) ? $itemTariff->deliveryCost : null)
                            ->setDeliveryCostOriginal($itemTariff->deliveryCostOriginal ?? null)
                            ->setFeesIncluded($itemTariff->feesIncluded ?? null)
                            ->setInsuranceFee($itemTariff->insuranceFee ?? null)
                            ->setCashServiceFee($itemTariff->cashServiceFee ?? null)
                            ->setDaysMin(isset($itemTariff->daysMin) ? $itemTariff->daysMin : null)
                            ->setDaysMax(isset($itemTariff->daysMax) ? $itemTariff->daysMax : null)
                            ->setCalendarDaysMin(isset($itemTariff->calendarDaysMin) ? $itemTariff->calendarDaysMin : null)
                            ->setCalendarDaysMax(isset($itemTariff->calendarDaysMax) ? $itemTariff->calendarDaysMax : null)
                            ->setWorkDaysMin(isset($itemTariff->workDaysMin) ? $itemTariff->workDaysMin : null)
                            ->setWorkDaysMax(isset($itemTariff->workDaysMax) ? $itemTariff->workDaysMax : null)
                            ->setPointIds(isset($itemTariff->pointIds) ? $itemTariff->pointIds : [])
                            ->setPickupTypes(isset($itemTariff->pickupTypes) ? $itemTariff->pickupTypes : [])
                            ->setDeliveryTypes(isset($itemTariff->deliveryTypes) ? $itemTariff->deliveryTypes : []);

                        $calculatorItem->addTariff($calculatorItemTariff);
                    }
                }
                $response->addDeliveryToPoint($calculatorItem);
            }
        }

        return $response;
    }
}
