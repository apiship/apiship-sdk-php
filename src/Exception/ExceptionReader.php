<?php

namespace Apiship\Exception;

class ExceptionReader
{
    /**
     * @var string код ошибки Apiship
     */
    protected $apishipCode;

    /**
     * @var string Error message
     */
    protected $message;

    /**
     * @var string Error description
     */
    protected $description;

    /**
     * @var string Error more info
     */
    protected $moreInfo;

    /**
     * @var array Ошибки
     */
    protected $errors;

    /**
     * @var int Exception error code
     */
    protected $code;

    /**
     * Ошибки в формате Apiship
     *
     * @param string $content
     * @param int    $code (optional)
     */
    public function __construct($content, $code = 0)
    {
        $content           = json_decode($content, true);
        $this->apishipCode  = !empty($content['code']) ? $content['code'] : null;
        $this->message     = !empty($content['message']) ? $content['message'] : 'Request not processed.';
        $this->description = !empty($content['description']) ? $content['description'] : null;
        $this->moreInfo    = !empty($content['moreInfo']) ? $content['moreInfo'] : null;
        $this->errors      = !empty($content['errors']) ? $content['errors'] : null;

        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getApishipCode()
    {
        return $this->apishipCode;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getMoreInfo()
    {
        return $this->moreInfo;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
