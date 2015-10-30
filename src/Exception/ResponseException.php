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
        return new self($message, $code, $previous);
    }

    /**
     * @param bool $includeCodeId (optional)
     *
     * @return string
     */
    public function getErrorMessage($includeCodeId = false)
    {
        return $this->exception->getMessage($includeCodeId);
    }

    /**
     * @return string
     */
    public function getErrorId()
    {
        return strtoupper($this->exception->getId());
    }
}
