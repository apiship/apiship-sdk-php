<?php

namespace Apiship\Exception;

interface ExceptionInterface
{
    /**
     * Create an exception.
     *
     * @param string     $message
     * @param int        $code     (optional)
     * @param \Exception $previous (optional)
     *
     * @return ExceptionInterface
     */
    public static function create($message, $code = 0, \Exception $previous = null);
}
