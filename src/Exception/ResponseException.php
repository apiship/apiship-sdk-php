<?php

namespace Apiship\Exception;

class ResponseException extends \RuntimeException implements ExceptionInterface
{
    /**
     * @var ExceptionReader
     */
    protected $exception;

    /**
     * {@inheritdoc}
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        $this->exception = new ExceptionReader($message, $code);

        parent::__construct($this->exception->getMessage(), $code, $previous);
    }

    /**
     * {@inheritdoc}
     */
    public static function create($message, $code = 0, \Exception $previous = null)
    {
        return new self($message, $code, null);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->exception->getMessage();
    }

    /**
     * @return string
     */
    public function getErrorApishipCode()
    {
        return $this->exception->getApishipCode();
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->exception->getDescription();
    }

    /**
     * @return string
     */
    public function getErrorMoreInfo()
    {
        return $this->exception->getMoreInfo();
    }

    /**
     * @return string
     */
    public function getErrors()
    {
        return $this->exception->getErrors();
    }
}
