<?php

namespace Apiship\Adapter;

use Apiship\Exception\ExceptionInterface;
use Guzzle\Common\Event;
use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Response;

class GuzzleAdapter extends AbstractAdapter implements AdapterInterface
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
     * @param string             $login
     * @param string             $password
     * @param bool               $test      (optional)
     * @param ClientInterface    $client    (optional)
     * @param ExceptionInterface $exception (optional)
     */
    public function __construct($login, $password, $test = false, ClientInterface $client = null, ExceptionInterface $exception = null)
    {
        parent::__construct($login, $password, $test);

        $that            = $this;
        $this->client    = $client ?: new Client();
        $this->exception = $exception;

        $this->client
            // Set default Bearer header for all request
            ->setDefaultOption('headers/Authorization', $this->getAccessToken())
            // Subscribe completed request event
            ->setDefaultOption('events/request.complete', function (Event $event) use ($that) {
                $that->handleResponse($event);
                $event->stopPropagation();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        $this->response = $this->client->get($url)->send();

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url, array $headers = [])
    {
        $this->response = $this->client->delete($url, $headers)->send();

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, array $headers = [], $content = '')
    {
        $headers['content-type'] = 'application/json';
        $request                 = $this->client->put($url, $headers, $content);
        $this->response          = $request->send();

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $headers = [], $content = '')
    {
        $headers['content-type'] = 'application/json';
        $request                 = $this->client->post($url, $headers, $content);
        $this->response          = $request->send();

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if (null === $this->response) {
            return;
        }

        return [
            'reset'     => (int)(string)$this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int)(string)$this->response->getHeader('RateLimit-Remaining'),
            'limit'     => (int)(string)$this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @param Event $event
     *
     * @throws \RuntimeException|ExceptionInterface
     */
    protected function handleResponse(Event $event)
    {
        $this->response = $event['response'];

        if ($this->response->isSuccessful()) {
            return;
        }

        $body = $this->response->getBody(true);
        $code = $this->response->getStatusCode();

        if ($this->exception) {
            throw $this->exception->create($body, $code);
        }

        $content = json_decode($body);

        throw new \RuntimeException(sprintf('[%d] %s (%s)', $code, $content->message, $content->id), $code);
    }

    /**
     * @inheritdoc
     */
    protected function login()
    {
        $authRequestData = json_encode([
            'login'    => $this->login,
            'password' => $this->password,
        ]);

        $loginData = $this->post($this->getUrl() . 'login', [], $authRequestData);

        return json_decode($loginData);
    }
}
