<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Autocomplete\Area;

class GetAreaResponse extends AbstractResponse
{
    /**
     * @var Area[]|null Массив результатов автодополнения
     */
    protected $results;

    /**
     * @return Area[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Area[] $results
     *
     * @return GetAreaResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Area $result
     *
     * @return GetAreaResponse
     */
    public function addResult(Area $result)
    {
        $this->results[] = $result;
        return $this;
    }
}