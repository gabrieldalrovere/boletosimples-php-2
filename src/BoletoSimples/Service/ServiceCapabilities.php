<?php

namespace BoletoSimples\Service;

use BoletoSimples\Credentials;
use BoletoSimples\Http\GuzzleHttpAdapter;
use BoletoSimples\Http\HttpAdapter;
use BoletoSimples\Resource\Resource;

trait ServiceCapabilities
{
    /**
     * @var HttpAdapter
     */
    private $httpAdapter;


    /**
     * @param Credentials $credentials
     * @return static
     */
    public static function instance(Credentials $credentials)
    {
        $config = [
            'base_uri' => $credentials->getBaseUri(),
            'http_errors' => false,
            'auth'     => [
                $credentials->getToken(), 'x'
            ],
            'headers'  => [
                'User-Agent' => $credentials->getId()
            ]
        ];

        $httpAdapter = GuzzleHttpAdapter::instanceByConfig($config);

        return new static($httpAdapter);
    }


    /**
     * ResourceCapabilities constructor.
     * @param HttpAdapter $httpAdapter
     */
    public function __construct(HttpAdapter $httpAdapter)
    {
        $this->httpAdapter = $httpAdapter;
    }


    /**
     * @return string
     */
    public function getResourcePath()
    {
        return self::URI;
    }


    /**
     * @param Resource $resource
     * @return int
     */
    public function create(Resource $resource)
    {
        $response = $this->httpAdapter->post($this->getResourcePath(), $resource->toArray());
        return isset($response['id']) ? $response['id'] : null;
    }


    /**
     * @param int $id
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getById($id)
    {
        $this->validateId($id);

        return $this->httpAdapter->get($this->getResourcePath() . '/' .  $id);
    }


    /**
     * @param int   $id
     * @param Resource $resource
     * @return bool
     */
    public function replace($id, Resource $resource)
    {
        $this->validateId($id);

        $uri = $this->getResourcePath() . '/' . $id;
        $this->httpAdapter->put($uri, $resource->toArray());
        return true;
    }


    /**
     * @param int      $id
     * @param string   $attribute
     * @param Resource $resource
     * @return bool
     */
    public function update($id, $attribute, Resource $resource)
    {
        $this->validateId($id);

        $uri = $this->getResourcePath() . '/' . $id;
        $getter = 'get' . ucfirst($attribute);
        $this->httpAdapter->patch($uri, [
            $attribute => $resource->$getter()
        ]);
        return true;
    }


    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->validateId($id);

        $uri = $this->getResourcePath() . '/' . $id;
        $this->httpAdapter->delete($uri);
        return true;
    }


    /**
     * @return array
     */
    public function getAll()
    {
        return $this->httpAdapter->get($this->getResourcePath());
    }


    /**
     * @param mixed $id
     * @throws \InvalidArgumentException
     */
    private function validateId($id)
    {
        if (!is_int($id)) {
            throw new \InvalidArgumentException('Invalid type for ID');
        }
    }
}
