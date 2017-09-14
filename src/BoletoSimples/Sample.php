<?php

namespace BoletoSimples;

use BoletoSimples\Resource\Customer;
use BoletoSimples\Service\CustomerService;

/**
 * Class Sample
 *
 * Observações sobre as alterações
 *
 * - Não é melhor atributos camel case ?
 * - As entidades não possuem comportamento. Parecem mais DTO's do que entidades.
 * - ServiceInterface mudar para HttpService (quem usa não precisa saber que é Interface)
 * - gettype($id) !== 'integer' mudar para is_int
 * - HttpClient e HttpRequester fazem a mesma coisa
 * - Não deveria expor o Guzzle com um método getClient, porque não usa-lo diretamente então ?
 * - não pressupor que método make será executado na ordem correto
 * - Não usar constantes globais como BOLETO_SIMPLES_ENVIRONMENT, criar objeto de config
 * - Removeer ApiTrait. parent::__construct é executado automaticamente pelo PHP não é necessário essa definição
 * - AbstractService poderia ser uma trait padrão (HttpRequestCapabilities ou HttpRequestTrait)
 *
 * @package BoletoSimples
 */
class Sample
{
    public static function sample()
    {
        $credentials = Credentials::fromArray([
            'environment' => '',
            'id' => '',
            'token' => '',
            'baseUri' => ''
        ]);

        $service = CustomerService::instance($credentials);
        $service->getAll();


        $customer = Customer::fromArray([
            'name'         => 'José',
            'document'     => '123.456.789-10',
            'zipCode'      => '04207001',
            'address'      => 'Rua Japão',
            'city'         => 'Maringá',
            'state'        => 'PR',
            'neighborhood' => 'Vila Azul'
        ]);

        // CRUD - C
        $id = $service->create($customer);

        // CRUD - R
        $customer->setName('João');
        $service->replace($id, 'name', $customer);

        // CRUD - U
        $customer->setCity('São Paulo');
        $customer->setDocument('123.456.789-11');
        $service->update($id, $customer);

        // CRUD - D
        $service->delete($id);
    }
}
