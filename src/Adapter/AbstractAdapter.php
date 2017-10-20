<?php

namespace Apiship\Adapter;

abstract class AbstractAdapter
{
    /**
     * Url Api
     */
    const API_URL = 'https://api.apiship.ru/v1/';

    /**
     * Test Url Api
     */
    const TEST_API_URL = 'http://api.dev.apiship.ru/v1/';

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var bool
     */
    protected $tokenRequested;

    /**
     * Whether to use test api url
     *
     * @var bool
     */
    protected $test;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if (!$this->accessToken && !$this->tokenRequested) {
            $this->tokenRequested = true;
            
            if (!$this->accessToken = $this->getToken()) {
                /** @var \StdClass $loginData */
                $loginData = $this->login();
                $this->accessToken = $loginData->accessToken;
                $this->saveToken();
            }
        }

        return $this->accessToken;
    }

    /**
     * @return bool|string
     */
    protected function getToken()
    {
        if (!file_exists($this->getTmpFileName())) {
            return false;
        }

        $time = time() - filemtime($this->getTmpFileName());

        if ($time > 60 * 5) {
            return false;
        }

        return file_get_contents($this->getTmpFileName());
    }

    /**
     * @return string
     */
    protected function getTmpFileName()
    {
        return sys_get_temp_dir() . DIRECTORY_SEPARATOR . md5($this->login . 'accessToken');
    }

    /**
     * Performs login request and returns auth result data
     *
     * @return mixed
     */
    abstract protected function login();

    /**
     *
     */
    protected function saveToken()
    {
        if (is_writable($this->getTmpFileName())) {
            $handle = fopen($this->getTmpFileName(), 'wb+');
            fwrite($handle, $this->accessToken);
            fclose($handle);
        }
    }

    /**
     * Returns api url depends on test param
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->isTest() ? self::TEST_API_URL : self::API_URL;
    }

    /**
     * @return boolean
     */
    public function isTest()
    {
        return $this->test;
    }

    /**
     * Set auth token
     * @param string $token
     */
    protected function setToken($token)
    {
        $this->accessToken = $token;
    }

}
