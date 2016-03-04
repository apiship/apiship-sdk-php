<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Lists\Point;

class ListsPointsResponse extends AbstractResponse
{
    /**
     * @var Point[] Массив результатов
     */
    protected $results = [];

    /**
     * @return Point[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Point[] $results
     *
     * @return ListsPointsResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Point $result
     *
     * @return ListsPointsResponse
     */
    public function addResult(Point $result)
    {
        $this->results[] = $result;

        return $this;
    }
}