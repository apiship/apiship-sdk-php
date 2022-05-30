<?php

namespace Apiship\Adapter;

use Apiship\Exception\ExceptionInterface;
use Apiship\Exception\ResponseException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use StdClass;

class GuzzleTokenAdapter extends AbstractAdapter implements AdapterInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var ExceptionInterface
     */
    protected $exception;

    /**
     * @param string $accessToken
     * @param bool $test (optional)
     * @param ClientInterface|null $client (optional)
     * @param ExceptionInterface|null $exception (optional)
     * @param null $platform (optional)
     */
    public function __construct(
        $accessToken,
        $test = false,
        ClientInterface $client = null,
        ExceptionInterface $exception = null,
        $platform = null
    ) {
        $this->setToken($accessToken);

        $this->test = (bool)$test;

        $that = $this;
        $this->exception = isset($exception) ? $exception : new ResponseException();

        $options = [];

        if (isset($_SERVER['X-Tracing-Id'])) {
            $options['query'] = ['X-Tracing-Id' => $_SERVER['X-Tracing-Id']];
        }

        if ($platform) {
            $options['headers'] = ['platform' => $platform];
        }

        $handler = HandlerStack::create();
        $handler->push(
            Middleware::mapRequest(function (RequestInterface $request) use ($that) {
                return $request->withHeader('Authorization', $that->getAccessToken());
            })
        );

        $handler->push(
            Middleware::mapResponse(function (ResponseInterface $response) use ($that) {
                if ($this->accessToken && $this->tokenRequested) {
                    $this->tokenRequested = false;
                }

                $that->handleResponse($response);
                return $response;
            })
        );

        $options['handler'] = $handler;

        $this->client = $client ?: new Client($options);
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws RuntimeException|ExceptionInterface
     */
    protected function handleResponse(ResponseInterface $response)
    {
        $this->response = $response;
        $code = $this->response->getStatusCode();

        if (($code >= 200 && $code < 300) || $code == 304) {
            return;
        }

        $body = $this->response->getBody();

        if ($this->exception) {
            throw $this->exception->create($body, $code);
        }

        /** @var StdClass $content */
        $content = json_decode($body);

        throw new RuntimeException(
            sprintf('[%d]: %s (%s. %s)', $content->code, $content->message, $content->description, $content->moreInfo),
            $code
        );
    }

    /**
     * {@inheritdoc}
     * @throws RequestException
     */
    public function get($url, array $headers = [], array $query = [])
    {
        $options['headers'] = $headers;
        $options['query'] = $query;

        $this->response = $this->client->request("GET", $this->getUrl() . $url, $options);

        return (string)$this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url, array $headers = [])
    {
        $options['headers'] = $headers;

        $this->response = $this->client->request("DELETE", $this->getUrl() . $url, $options);

        return (string)$this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, array $headers = [], $content = '')
    {
        $options['headers'] = array_merge($headers, ['content-type' => 'application/json']);
        $options['body'] = $content;
        $this->response = $this->client->request("PUT", $this->getUrl() . $url, $options);

        return (string)$this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $headers = [], $content = '')
    {
        $options['headers'] = array_merge($headers, ['content-type' => 'application/json']);
        $options['body'] = $content;
        $this->response = $this->client->request("POST", $this->getUrl() . $url, $options);

        return (string)$this->response->getBody();
    }

    /**
     * @inheritdoc
     */
    public function getLatestResponseHeaders()
    {
        if (null === $this->response) {
            return null;
        }

        return [
            'x-tracing-id' => $this->response->getHeaderLine('x-tracing-id'),
        ];
    }

    /**
     * Performs login request and returns auth result data
     *
     * @return mixed
     */
    protected function login()
    {
        return $this->accessToken;
    }
}
