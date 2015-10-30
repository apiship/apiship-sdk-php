<?php

namespace Apiship\Adapter;

use Apiship\Exception\ExceptionInterface;

interface AdapterInterface
{
    /**
     * @param string $url
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function get($url);

    /**
     * @param string $url
     * @param array  $headers (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     */
    public function delete($url, array $headers = array());

    /**
     * @param string $url
     * @param array  $headers (optional)
     * @param string $content (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function put($url, array $headers = array(), $content = '');

    /**
     * @param string $url
     * @param array  $headers (optional)
     * @param string $content (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function post($url, array $headers = array(), $content = '');

    /**
     * @return null|array
     */
    public function getLatestResponseHeaders();
}
