<?php

namespace Tec\Vat\adapter;

use SoapClient;
use SoapHeader;

class SoapAdapter
{
    private $client;
    private $body;

    public function setClient($wsdl)
    {
        $this->client = new SoapClient(
            $wsdl,
            [
                'trace' => 1,
                'soap_version' => SOAP_1_2
            ]);

        return $this;
    }

    public function setHeaders($namespace, $name, $args)
    {
        $this->client->__setSoapHeaders(
            new SoapHeader(
                $namespace,
                $name,
                $args,
                true
            )
        );

        return $this;
    }

    public function setBody($args)
    {
        $this->body = $args;

        return $this;
    }

    public function call($method)
    {
        return $this->client->$method($this->body);
    }

}
