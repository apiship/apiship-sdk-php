<?php

namespace Apiship\Entity\Response\Part\Order;

use Apiship\Entity\AbstractResponsePart;

class WaybillItem extends AbstractResponsePart
{
    /**
     * @var string Имя провайдера
     */
    protected $providerKey;

    /**
     * @var string Ссылка на файл
     */
    protected $file;

    /**
     * @var array ID заказов в данном файле
     */
    protected $orderIds;

    /**
     * @return string
     */
    public function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
     * @param $providerKey
     * @return $this
     */
    public function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrderIds()
    {
        return $this->orderIds;
    }

    /**
     * @param $orderIds
     * @return $this
     */
    public function setOrderIds($orderIds)
    {
        $this->orderIds = $orderIds;
        return $this;
    }

}