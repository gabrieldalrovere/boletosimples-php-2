<?php

namespace BoletoSimples\Dto;

interface Dto
{
    /**
     * @param array $data
     * @return mixed
     */
    public static function fromArray(array $data);


    /**
     * @return array
     */
    public function toArray();


    /**
     * @param array|null $options
     * @return string
     */
    public function toJson(array $options = null);
}
