<?php

namespace BoletoSimples\Resource;

final class Customer extends Resource
{
    /**
     * @var string
     */
    private $name;


    /**
     * @var string
     */
    private $document;


    /**
     * @var string
     */
    private $zipCode;


    /**
     * @var string
     */
    private $address;


    /**
     * @var string
     */
    private $city;


    /**
     * @var string
     */
    private $state;


    /**
     * @var string
     */
    private $neighborhood;  // bairro ??


    /**
     * Customer constructor.
     * @param string $name
     * @param string $document
     * @param string $zipCode
     * @param string $address
     * @param string $city
     * @param string $state
     * @param string $neighborhood
     */
    public function __construct(
        $name,
        $document,
        $zipCode,
        $address,
        $city,
        $state,
        $neighborhood
    ) {
        $this->name = $name;
        $this->document = $document;
        $this->zipCode = $zipCode;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->neighborhood = $neighborhood;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }


    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }


    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }


    /**
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }


    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @param string $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }


    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }


    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }


    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


    /**
     * @param string $neighborhood
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }
}
