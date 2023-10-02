<?php

namespace Tec\Vat;

use Exception;
use stdClass;
use Tec\Vat\adapter\SoapAdapter;
use Tec\Vat\builder\ItemBuilder;
use Tec\Vat\builder\TransactionBuilder;
use Tec\Vat\exceptions\A39AException;
use Tec\Vat\mapper\A39AMapper;
use Tec\Vat\model\Transaction;
use Tec\Vat\utils\StdConverter;

class A39A
{
    private $wsdl = 'https://www1.gsis.gr/wsaade/VtWs39aFPA/VtWs39aFPA?WSDL';
    private $methods = [
        'vt39afpaSu1GetVatflag',
        'vt39afpaSu2VerifyBuyer',
        'vt39afpaSu3TransReprMan',
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
     * @return bool
     * @throws A39AException
     */
    public function hasNormalVatSystem($vatCalledFor, $vatCalledBy): bool
    {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getBody(__FUNCTION__, $vatCalledFor, $vatCalledBy))
                ->call($this->methods[0]);

            return self::checkVatSystem(StdConverter::stdToArray($response));
        } catch (Exception $e) {
            throw new A39AException($e->getMessage());
        }
    }

    /**
     * @param $vatCalledFor
     * @param $vatCalledBy
     * @param $representativeIdentityType
     * @param $representativeIdentityNumber
     * @param $representativeMobile
     * @return array[]|null
     * @throws A39AException
     */
    public function verifyBuyer($vatCalledFor, $vatCalledBy,
                                $representativeIdentityType, $representativeIdentityNumber,
                                $representativeMobile)
    {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getBody(__FUNCTION__, $vatCalledFor,
                    $vatCalledBy, $representativeIdentityType,
                    $representativeIdentityNumber, $representativeMobile))
                ->call($this->methods[1]);

            return A39AMapper::convert(__FUNCTION__, StdConverter::stdToArray($response));
        } catch (Exception $e) {
            throw new A39AException($e->getMessage());
        }
    }

    public function createMandatoryTransaction($transaction, $items) {
        try {
            $response = $this->soapAdapter
                ->setClient($this->wsdl)
                ->setHeaders($this->headers['namespace'], $this->headers['name'], self::getAuthHeaders())
                ->setBody(self::getBody(__FUNCTION__,
                    $this->buildTransaction($transaction),
                    $this->buildMultipleItems($items)))
                ->call($this->methods[2]);

            return A39AMapper::convert(__FUNCTION__, StdConverter::stdToArray($response));
        } catch (Exception $e) {
            throw new A39AException($e->getMessage());
        }
    }

    public function createOptionalTransaction($array) {
        // TODO: Implement createOptionalTransaction() method.
    }

    /**
     * @param $method
     * @param ...$args
     * @return array|array[]
     * @throws A39AException
     */
    private function getBody($method, ...$args): array
    {
        switch ($method) {
            case 'hasNormalVatSystem':
                return [
                    'SU1_IN_REC' => [
                        'supl_afm'       => $args[1],
                        'buyer_afm'      => $args[0],
                        'as_on_datetime' => date('Y-m-d\TH:i:s\Z')
                    ]
                ];
            case 'verifyBuyer':
                return [
                    'SU2_IN_REC' => [
                        'supl_afm'           => $args[1],
                        'buyer_afm'          => $args[0],
                        'repr_identity_type' => $args[2],
                        'repr_identity_no'   => $args[3],
                        'repr_mobile'        => $args[4],
                        'as_on_datetime'     => date('Y-m-d\TH:i:s\Z')
                    ]
                ];
            case 'createMandatoryTransaction':
                return [
                    'SU3_IN_REC'        => $args[0],
                    'SU3_IN_LINE_ITEMS' => self::getLineItemsBody($args[1])
                ];

            default:
                throw new A39AException('Method not found');
        }
    }

    /**
     * @param $lineItems
     * @return array
     */
    private function getLineItemsBody($lineItems): array
    {
        $lineItemsBody = [];
        foreach ($lineItems as $lineItem) {
            $lineItemsBody[] = ['item' => $lineItem];
        }
        return $lineItemsBody;
    }

    /**
     * @return stdClass
     */
    private function getAuthHeaders(): stdClass
    {
        $authHeaders = new stdClass();
        $authHeaders->UsernameToken = new stdClass();
        $authHeaders->UsernameToken->Username = $this->username;
        $authHeaders->UsernameToken->Password = $this->password;
        return $authHeaders;
    }

    /**
     * @param $array
     * @return bool
     */
    private function checkVatSystem($array): bool
    {
        return $array['result']['vt_ws_39afpa_su1_result_rtType']['su1_out_rec']['buyer_normal_vat_system'] == 'Y';
    }

    /**
     * @param $_
     * @return array
     */
    private function buildTransaction($_): array
    {
        return (new TransactionBuilder())
            ->supplierAfm($_['supplierAfm'])
            ->buyerAfm($_['buyerAfm'])
            ->representativeIdentityType($_['representativeIdentityType'])
            ->representativeIdentityNumber($_['representativeIdentityNumber'])
            ->representativeIdentityMobile($_['representativeIdentityMobile'])
            ->otpId($_['otpId'])
            ->primaryTransactionId($_['primaryTransactionId'])
            ->primaryTransactionJustification($_['primaryTransactionJustification'])
            ->transactionDateTime($_['transactionDateTime'])
            ->transactionPreviousTotalQuantity($_['transactionPreviousTotalQuantity'])
            ->transactionPreviousTotalAmount($_['transactionPreviousTotalAmount'])
            ->transactionPreviousTotalVat($_['transactionPreviousTotalVat'])
            ->transactionTotalQuantity($_['transactionTotalQuantity'])
            ->transactionTotalAmount($_['transactionTotalAmount'])
            ->transactionTotalVat($_['transactionTotalVat'])
            ->transactionNotes($_['transactionNotes'])
            ->build()
            ->toArray();
    }

    /**
     * @param $_
     * @return array
     */
    private function buildMultipleItems($_): array
    {
        $items = [];
        foreach ($_ as $item) {
            $items[] = self::buildItem($item)->toArray();
        }
        return $items;
    }

    /**
     * @param $_
     * @return model\Item
     */
    private function buildItem($_): model\Item
    {
        return (new ItemBuilder())
            ->aa($_['aa'])
            ->code($_['code'])
            ->description($_['description'])
            ->quantity($_['quantity'])
            ->amount($_['amount'])
            ->vatAmount($_['vatAmount'])
            ->build();
    }

}
