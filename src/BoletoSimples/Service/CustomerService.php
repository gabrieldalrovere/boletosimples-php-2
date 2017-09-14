<?php

namespace BoletoSimples\Service;

final class CustomerService implements Service
{
    use ServiceCapabilities;

    /**
     * Resource PATH
     */
    const URI = 'customers';
}
