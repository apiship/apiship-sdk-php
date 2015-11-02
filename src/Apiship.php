<?php

namespace Apiship;

use Apiship\Adapter\AdapterInterface;
use Apiship\Api\Orders;

class Apiship
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return Orders
     */
    public function orders()
    {
        return new Orders($this->adapter);
    }
}
