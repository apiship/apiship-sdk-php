<?php
/**
 * @author Serge Rodovnichenko <serge@syrnik.com>
 * @copyright Serge Rodovnichenko, 2020
 */

namespace Apiship\Entity\Response;

use Apiship\Entity\AbstractResponse;
use Apiship\Entity\Response\Part\Lists\PointType;

/**
 * Class ListsPointTypesResponse
 * @package Apiship\Entity\Response
 */
class ListsPointTypesResponse extends AbstractResponse
{
    /** @var PointType[] */
    protected $results = [];

    /**
     * @return PointType[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param PointType[] $results
     * @return $this
     */
    public function setResults($results)
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @param PointType $pointType
     * @return $this
     */
    public function addResult(PointType $pointType)
    {
        $this->results[] = $pointType;

        return $this;
    }
}