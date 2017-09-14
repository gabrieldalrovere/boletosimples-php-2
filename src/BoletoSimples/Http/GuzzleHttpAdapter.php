<?php

namespace BoletoSimples\Http;

use GuzzleHttp\Client;


final class GuzzleHttpAdapter implements HttpAdapter
{
    /**
     * @var Client
     */
    private $httpClient;


    /**
     * GuzzleHttpAdapter constructor.
     * @param Client $httpClient
     */
    private function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    /**
     * @param array $config
     * @return GuzzleHttpAdapter
     */
    public static function instanceByConfig(array $config)
    {
        return new self(new Client($config));
    }


    /**
     * @param string $uri
     * @return mixed
     */
    public function get($uri)
    {
        return $this->httpClient->get($uri);
    }


    /**
     * @param string $uri
     * @param array  $data
     * @return mixed
     */
    public function post($uri, array $data)
    {
        return $this->httpClient->post($uri, ['json' => $data]);
    }


    /**
     * @param string $uri
     * @param array  $data
     * @return mixed
     */
    public function put($uri, array $data)
    {
        return $this->httpClient->put($uri, ['json' => $data]);
    }


    /**
     * @param string $uri
     * @param array  $data
     * @return mixed
     */
    public function patch($uri, array $data)
    {
        return $this->httpClient->patch($uri, ['json' => $data]);
    }


    /**
     * @param string $uri
     * @return mixed
     */
    public function delete($uri)
    {
        return $this->httpClient->delete($uri);
    }
}
