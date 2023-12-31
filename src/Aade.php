<?php

namespace Tec\Vat;

use stdClass;
use Tec\Vat\adapter\SoapAdapter;
use Tec\Vat\exceptions\AadeException;
use Tec\Vat\utils\StdConverter;
use Exception;

class Aade
{
    private $wsdl = 'https://www1.gsis.gr/wsaade/RgWsPublic2/RgWsPublic2?WSDL';
    private $methods = [
        'rgWsPublic2AfmMethod'
    ];
    private $headers = [
        'namespace' => 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
        'name'      => 'Security',
    ];

    private $username;
    private $password;
    private SoapAdapter $soapAdapter;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->soapAdapter = new SoapAdapter();
    }

    /**
     * @param $vatCalledFor
     * @param $vatCalledBy
     * @return mixed
     * @throws AadeException
     */
    public function validateVat($vatCalledFor, $vatCalledBy)
    {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getBody($vatCalledFor, $vatCalledBy))
                ->call($this->methods[0]);

            $reponseToArray = StdConverter::stdToArray($response);

            return $reponseToArray;

        } catch (Exception $e) {
            throw new AadeException($e->getMessage());
        }
    }

    /**
     * @return stdClass
     */
    private function getAuthHeaders()
    {
        $authHeaders = new stdClass();
        $authHeaders->UsernameToken = new stdClass();
        $authHeaders->UsernameToken->Username = $this->username;
        $authHeaders->UsernameToken->Password = $this->password;
        return $authHeaders;
    }

    /**
     * @param $vatCalledBy
     * @param $vatCalledFor
     * @return array[]
     */
    private function getBody($vatCalledBy, $vatCalledFor)
    {
        return [
            'INPUT_REC' => [
                'afm_called_by' => $vatCalledBy,
                'afm_called_for' => $vatCalledFor
            ]
        ];
    }
}
