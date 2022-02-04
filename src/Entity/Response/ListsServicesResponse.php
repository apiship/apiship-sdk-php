<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Lists\Service;

class ListsServicesResponse extends AbstractResponse
{
    /**
     * @var Service[] Массив результатов
     */
    protected $results = [];

    /**
     * @return Service[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Service[] $results
     *
     * @return ListsServicesResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Service $result
     *
     * @return ListsServicesResponse
     */
    public function addResult($result)
    {
        $this->results[] = $result;
        return $this;
    }
}