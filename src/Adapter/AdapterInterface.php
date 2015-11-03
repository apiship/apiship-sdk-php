<?php

namespace Apiship\Adapter;

use Apiship\Exception\ExceptionInterface;

interface AdapterInterface
{
    /**
     * @param string $url
     * @param array  $headers (optional)
     * @param array  $query   (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function get($url, array $headers = [], array $query = []);

    /**
     * @param string $url
     * @param array  $headers (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     */
    public function delete($url, array $headers = []);

    /**
     * @param string $url
     * @param array  $headers (optional)
     * @param string $content (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function put($url, array $headers = [], $content = '');

    /**
     * @param string $url
     * @param array  $headers (optional)
     * @param string $content (optional)
     *
     * @throws \RuntimeException|ExceptionInterface
     *
     * @return string
     */
    public function post($url, array $headers = [], $content = '');

    /**
     * @return null|array
     */
    public function getLatestResponseHeaders();
}
