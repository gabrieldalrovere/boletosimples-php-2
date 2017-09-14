<?php

namespace BoletoSimples\Service;

use BoletoSimples\Resource\Resource;

interface Service
{
    /**
     * @return string
     */
    public function getResourcePath();


    /**
     * @param Resource $data
     * @return mixed
     */
    public function create(Resource $data);


    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id);


    /**
     * @return mixed
     */
    public function getAll();


    /**
     * @param int   $id
     * @param Resource $data
     * @return mixed
     */
    public function update($id, Resource $data);


    /**
     * @param int   $id
     * @param Resource $data
     * @return mixed
     */
    public function replace($id, Resource $data);
}
