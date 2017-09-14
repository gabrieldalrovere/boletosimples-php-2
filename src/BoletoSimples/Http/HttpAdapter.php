<?php

namespace BoletoSimples\Http;

interface HttpAdapter
{
    /**
     * @param string $uri
     * @return mixed
     */
    public function get($uri);


    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function post($uri, array $data);


    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function put($uri, array $data);


    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function patch($uri, array $data);


    /**
     * @param string $uri
     * @return mixed
     */
    public function delete($uri);
}
