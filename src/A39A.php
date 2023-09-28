<?php

namespace Tec\Vat;

use Exception;
use stdClass;
use Tec\Vat\adapter\SoapAdapter;
use Tec\Vat\exceptions\AadeException;
use Tec\Vat\mapper\A39AMapper;
use Tec\Vat\utils\StdConverter;

class A39A
{
    private $wsdl = 'https://www1.gsis.gr/wsaade/VtWs39aFPA/VtWs39aFPA?WSDL';
    private $methods = [
        'vt39afpaSu1GetVatflag',
        'vt39afpaSu2VerifyBuyer'
    ];
    private $headers = [
        'namespace' => 'http://www.w3.org/2003/05/soap-envelope',
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
    public function hasNormalVatSystem($vatCalledFor, $vatCalledBy)
    {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getNormalVatSystemBody($vatCalledFor, $vatCalledBy))
                ->call($this->methods[0]);

            return self::checkVatSystem(StdConverter::stdToArray($response));
        } catch (Exception $e) {
            throw new AadeException($e->getMessage());
        }
    }

    public function verifyBuyer($vatCalledFor, $vatCalledBy,
                                $representativeIdentityType, $representativeIdentityNumber,
                                $representativeMobile)
    {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getVerifyBuyerBody($vatCalledFor, $vatCalledBy, $representativeIdentityType, $representativeIdentityNumber, $representativeMobile))
                ->call($this->methods[1]);

            return A39AMapper::convert('verifyBuyer', StdConverter::stdToArray($response));
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
     * @param $vatCalledFor
     * @param $vatCalledBy
     * @return array
     */
    private function getNormalVatSystemBody($buyerVat, $supplierVat)
    {
        return [
            'SU1_IN_REC' => [
                'supl_afm'       => $supplierVat,
                'buyer_afm'      => $buyerVat,
                'as_on_datetime' => date('Y-m-d\TH:i:s\Z')
            ]
        ];
    }

    /**
     * @param $vatCalledFor
     * @param $vatCalledBy
     * @param $representativeIdentityType
     * @param $representativeIdentityNumber
     * @param $representativeMobile
     * @return array[]
     */
    private function getVerifyBuyerBody($vatCalledFor, $vatCalledBy,
                                        $representativeIdentityType, $representativeIdentityNumber,
                                        $representativeMobile)
    {
        return [
            'SU2_IN_REC' => [
                'supl_afm'           => $vatCalledBy,
                'buyer_afm'          => $vatCalledFor,
                'repr_identity_type' => $representativeIdentityType,
                'repr_identity_no'   => $representativeIdentityNumber,
                'repr_mobile'        => $representativeMobile,
                'as_on_datetime'     => date('Y-m-d\TH:i:s\Z')
            ]
        ];
    }

    /**
     * @param $array
     * @return bool
     */
    private function checkVatSystem($array)
    {
        return $array['result']['vt_ws_39afpa_su1_result_rtType']['su1_out_rec']['buyer_normal_vat_system'] == 'Y';
    }

}
