<?php

namespace BoletoSimples;

use BoletoSimples\Dto\Dto;
use BoletoSimples\Dto\DtoCapabilities;

final class Credentials implements Dto
{
    use DtoCapabilities;

    /**
     * @var string
     */
    private $environment;


    /**
     * @var string
     */
    private $id;


    /**
     * @var string
     */
    private $token;


    /**
     * @var string
     */
    private $baseUri;


    /**
     * Credentials constructor.
     * @param string $environment
     * @param string $id
     * @param string $token
     * @param string $baseUri
     */
    public function __construct($environment, $id, $token, $baseUri)
    {
        $this->environment = $environment;
        $this->id = $id;
        $this->token = $token;
        $this->baseUri = $baseUri;
    }


    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }
}
