<?php

namespace Apiship\Entity\Response\Part\Lists;

use Apiship\Entity\AbstractResponsePart;

class Extra extends AbstractResponsePart
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
     * @var string Название дополнительного параметра
     */
    protected $key;
    /**
     * @var string Значение дополнительного параметра
     */
    protected $value;

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }
}
