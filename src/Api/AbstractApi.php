<?php

namespace Apiship\Api;

use Apiship\Adapter\AdapterInterface;

abstract class AbstractApi
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
}
