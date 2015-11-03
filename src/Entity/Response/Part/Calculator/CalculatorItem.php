<?php

namespace Apiship\Entity\Response\Part\Calculator;

class CalculatorItem
{
    /**
     * @var string Ключ провайдера
     */
    protected $providerKey;
    /**
     * @var Tariff[] Массив тарифов
     */
    protected $tariffs;

    /**
     * @return string
     */
    public function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
     * @param string $providerKey
     *
     * @return CalculatorItem
     */
    public function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    /**
     * @return Tariff[]
     */
    public function getTariffs()
    {
        return $this->tariffs;
    }

    /**
     * @param Tariff[] $tariffs
     *
     * @return CalculatorItem
     */
    public function setTariffs($tariffs)
    {
        foreach ($tariffs as $tariff) {
            $this->addTariff($tariff);
        }

        return $this;
    }

    /**
     * @param Tariff $tariff
     *
     * @return CalculatorItem
     */
    public function addTariff(Tariff $tariff)
    {
        $this->tariffs[] = $tariff;
        return $this;
    }
}