<?php

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Lists\Provider;

class ListsProvidersResponse extends AbstractResponse
{
    /**
     * @var Provider[]|null Массив результатов автодополнения
     */
    protected $results;

    /**
     * @return Provider[]|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Provider[] $results
     *
     * @return ListsProvidersResponse
     */
    public function setResults($results)
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    /**
     * @param Provider $result
     *
     * @return ListsProvidersResponse
     */
    public function addResult(Provider $result)
    {
        $this->results[] = $result;
        return $this;
    }
}