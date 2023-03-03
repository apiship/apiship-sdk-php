<?php

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

class Metro extends AbstractResponsePart
{
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            try {
                $this->$key = $value;
            } catch (\Exception $e) {
                continue;
            }
        }
    }

    /**
     * @var string Название метро
     */
    protected $name;
    /**
     * @var float
     */
    protected $distance;
    /**
     * @var string
     */
    protected $line;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(?float $distance): self
    {
        $this->distance = $distance;
        return $this;
    }

    public function getLine(): ?string
    {
        return $this->line;
    }

    public function setLine(?string $line): self
    {
        $this->line = $line;
        return $this;
    }
}
