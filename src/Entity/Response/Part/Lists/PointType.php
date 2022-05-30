<?php
/**
 * @author Serge Rodovnichenko <serge@syrnik.com>
 * @copyright Serge Rodovnichenko, 2020
 */

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

/**
 * Class PointType
 * @package Apiship\Entity\Response\Part\Lists
 */
class PointType extends AbstractResponsePart
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $description = '';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
