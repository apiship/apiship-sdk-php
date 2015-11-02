<?php

namespace Apiship\Entity\Request\Part\Orders;

use Apiship\Entity\AbstractPart;
use Apiship\Exception\RequiredParameterException;

class ExtraParam extends AbstractPart
{
    /**
     * @var string Код параметра
     */
    protected $key;
    /**
     * @var mixed Значение параметра
     */
    protected $value;

    /**
     * @return string
     * @throws RequiredParameterException
     */
    public function getKey()
    {
        if (!$this->key) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::key" is required.
                ');
        }

        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return ExtraParam
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     * @throws RequiredParameterException
     */
    public function getValue()
    {
        if (!$this->value) {
            throw new RequiredParameterException(
                'Property "' . get_class($this) . '::value" is required.
                ');
        }

        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return ExtraParam
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}