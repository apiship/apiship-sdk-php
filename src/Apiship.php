<?php

namespace Apiship;

use Apiship\Adapter\AdapterInterface;
use Apiship\Api\Autocomplete;
use Apiship\Api\Calculator;
use Apiship\Api\Lists;
use Apiship\Api\Orders;

class Apiship
{
    /**
     * @var AdapterInterface
     */
    public $adapter;

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

    /**
     * @return Calculator
     */
    public function calculator()
    {
        return new Calculator($this->adapter);
    }

    /**
     * @return Autocomplete
     */
    public function autocomplete()
    {
        return new Autocomplete($this->adapter);
    }

    /**
     * @return Lists
     */
    public function lists()
    {
        return new Lists($this->adapter);
    }
}
