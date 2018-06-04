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
    function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
     * @return string
     */
    function getFile()
    {
        return $this->file;
    }

    /**
     * @return array
     */
    function getOrderIds()
    {
        return $this->orderIds;
    }

    /**
     * @param $providerKey
     * @return $this
     */
    function setProviderKey($providerKey)
    {
        $this->providerKey = $providerKey;
        return $this;
    }

    /**
     * @param $file
     * @return $this
     */
    function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
    
    /**
     * @param $orderIds
     * @return $this
     */
    function setOrderIds($orderIds)
    {
        $this->orderIds = $orderIds;
        return $this;
    }

}