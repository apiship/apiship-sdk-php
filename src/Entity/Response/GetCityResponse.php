<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Autocomplete\City;

class GetCityResponse extends AbstractResponse
{
    /**
     * @var City[]|null Массив результатов автодополнения
     */
    protected $results;

    /**
     * @return City[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param City[] $results
     *
     * @return GetCityResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param City $result
     *
     * @return GetCityResponse
     */
    public function addResult(City $result)
    {
        $this->results[] = $result;
        return $this;
    }
}