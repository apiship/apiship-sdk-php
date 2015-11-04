<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Autocomplete\Street;

class GetStreetResponse extends AbstractResponse
{
    /**
     * @var Street[]|null Массив результатов автодополнения
     */
    protected $results;

    /**
     * @return Street[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Street[] $results
     *
     * @return GetStreetResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Street $result
     *
     * @return GetStreetResponse
     */
    public function addResult(Street $result)
    {
        $this->results[] = $result;
        return $this;
    }
}