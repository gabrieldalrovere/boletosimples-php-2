<?php

namespace BoletoSimples\Resource;

use BoletoSimples\Dto\Dto;
use BoletoSimples\Dto\DtoCapabilities;

abstract class Resource implements Dto
{
    use DtoCapabilities;
}
