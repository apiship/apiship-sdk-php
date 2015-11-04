<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Autocomplete\Region;

class GetRegionResponse extends AbstractResponse
{
    /**
     * @var Region[]|null Массив результатов автодополнения
     */
    protected $results;

    /**
     * @return Region[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Region[] $results
     *
     * @return GetRegionResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Region $result
     *
     * @return GetRegionResponse
     */
    public function addResult(Region $result)
    {
        $this->results[] = $result;
        return $this;
    }
}