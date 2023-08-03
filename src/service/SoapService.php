<?php

namespace Tec\Vat\service;

use SoapClient;
use SoapHeader;
use stdClass;

class SoapService
{
    const HEADER_NAMESPACE = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
    const HEADER_SECURITY_KEY  = 'Security';

    private string $soapUrl = 'https://www1.gsis.gr/wsaade/RgWsPublic2/RgWsPublic2?WSDL';
    private array $soapOptions = [
        'trace' => 1,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'exceptions' => true,
        'soap_version' => SOAP_1_2,
        'encoding' => 'UTF-8',
        'connection_timeout' => 180,
    ];

    private string $username;
    private string $password;
    private SoapClient $client;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        self::setClient();
    }

    public function validateVat($input) {
        self::setHeaders();
        return $this->client->rgWsPublic2AfmMethod($input);
    }

    private function setClient() {
        $this->client = new SoapClient($this->soapUrl, $this->soapOptions);
    }

    private function setHeaders() {
        $authHeaders = self::setAuthHeaders();

        $this->client->__setSoapHeaders(
            new SoapHeader(self::HEADER_NAMESPACE,self::HEADER_SECURITY_KEY, $authHeaders, true)
        );
    }

    private function setAuthHeaders(): stdClass
    {
        $authHeaders = new stdClass();
        $authHeaders->UsernameToken = new stdClass();
        $authHeaders->UsernameToken->Username = $this->username;
        $authHeaders->UsernameToken->Password = $this->password;
        return $authHeaders;
    }
}
