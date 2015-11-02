<?php

namespace Apiship\Entity;

abstract class AbstractResponse
{
    use MagicMethodsBehavior;

    /**
     * Оригинальный json, пришедший в ответ
     * @var string
     */
    protected $originJson;

    /**
     * @return string
     */
    public function getOriginJson()
    {
        return $this->originJson;
    }

    /**
     * @param $originJson
     * @return $this
     */
    public function setOriginJson($originJson)
    {
        $this->originJson = $originJson;

        return $this;
    }
}