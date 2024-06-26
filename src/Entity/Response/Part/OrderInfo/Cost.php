<?php

namespace Apiship\Entity\Response\Part\OrderInfo;

use Apiship\Entity\AbstractResponsePart;
use Apiship\Exception\RequiredParameterException;

class Cost extends AbstractResponsePart
{
    /**
     * @var float Оценочная стоимость
     */
    protected $assessedCost;
    /**
     * @var float Стоимость доставки
     */
    protected $deliveryCost;
    /**
     * @var float Стоимость доставки включая НДС
     */
    protected $deliveryCostVat;
    /**
     * @var float Стоимость наложенного платежа
     */
    protected $codCost;
    /**
     * @var bool Флаг для указания стороны которая платит за услуги доставки (false-отправитель, true-получатель)
     */
    protected $isDeliveryPayedByRecipient;

    /**
     * @return float
     * @throws RequiredParameterException
     */
    public function getAssessedCost()
    {
        if (!$this->assessedCost) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::assessedCost" is required.
                '
            );
        }

        return $this->assessedCost;
    }

    /**
     * @param float $assessedCost
     *
     * @return Cost
     */
    public function setAssessedCost($assessedCost)
    {
        $this->assessedCost = $assessedCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * @param float $deliveryCost
     *
     * @return Cost
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeliveryCostVat()
    {
        return $this->deliveryCostVat;
    }

    /**
     * @param float $deliveryCostVat
     *
     * @return Cost
     */
    public function setDeliveryCostVat($deliveryCostVat)
    {
        $this->deliveryCostVat = $deliveryCostVat;
        return $this;
    }

    /**
     * @return float
     * @throws RequiredParameterException
     */
    public function getCodCost()
    {
        if (!$this->codCost) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::codCost" is required.
                '
            );
        }

        return $this->codCost;
    }

    /**
     * @param float $codCost
     *
     * @return Cost
     */
    public function setCodCost($codCost)
    {
        $this->codCost = $codCost;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsDeliveryPayedByRecipient()
    {
        return $this->isDeliveryPayedByRecipient;
    }

    /**
     * @param bool $isDeliveryPayedByRecipient
     *
     * @return Cost
     */
    public function setIsDeliveryPayedByRecipient($isDeliveryPayedByRecipient)
    {
        $this->isDeliveryPayedByRecipient = $isDeliveryPayedByRecipient;
        return $this;
    }
}
