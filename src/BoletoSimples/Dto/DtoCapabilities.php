<?php

namespace BoletoSimples\Dto;

trait DtoCapabilities
{
    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->newInstanceArgs($data);
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $result = array();
        $class  = new \ReflectionClass($this);

        foreach ($class->getMethods() as $method) {
            if (substr($method->name, 0, 3) != 'get') {
                continue;
            }

            $propName = strtolower(substr($method->name, 3, 1)) . substr($method->name, 4);
            $result[$propName] = $method->invoke($this);
        }

        return $result;
    }


    /**
     * @param array|null $options
     * @return string
     */
    public function toJson(array $options = null)
    {
        return json_encode($this->toArray(), $options);
    }
}
