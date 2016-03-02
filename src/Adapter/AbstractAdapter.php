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
    private $accessToken;
    /**
     * Whether to use test api url
     *
     * @var bool
     */
    protected $test;

    /**
     * @param string $login
     * @param string $password
     * @param bool   $test
     */
    public function __construct($login, $password, $test = true)
    {
        if (is_string($login) && !empty($login) && is_string($password) && !empty($password)) {
            $this->login    = trim($login);
            $this->password = trim($password);
        } else {
            throw new \InvalidArgumentException(
                'Property "' . get_class($this) . '::login" and "' . get_class($this) . '::password" might be a non empty string.'
            );
        }
        $this->test = (bool)$test;
    }

    /**
     * @return boolean
     */
    public function isTest()
    {
        return $this->test;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if (!$this->accessToken) {
            if (!$this->accessToken = $this->getToken()) {
                /** @var \StdClass $loginData */
                $loginData         = $this->login();
                $this->accessToken = $loginData->accessToken;
                $this->saveToken();
            }
        }

        return $this->accessToken;
    }

    /**
     * Performs login request and returns auth result data
     *
     * @return mixed
     */
    abstract protected function login();

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
     *
     */
    protected function saveToken()
    {
        if (is_writable($this->getTmpFileName())) {
            $handle = fopen($this->getTmpFileName(), 'w+');
            fwrite($handle, $this->accessToken);
            fclose($handle);
        }
    }

    protected function getToken()
    {
        if (!file_exists($this->getTmpFileName())) {
            return false;
        }

        $time = time() - filemtime($this->getTmpFileName());

        if ($time > 60 * 5) {
            return false;
        }

        $token = file_get_contents($this->getTmpFileName());

        return $token;
    }

    protected function getTmpFileName()
    {
        return sys_get_temp_dir() . DIRECTORY_SEPARATOR . md5($this->login . 'accessToken');
    }

}
