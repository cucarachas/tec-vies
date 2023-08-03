<?php

namespace Tec\Vat;

use Tec\Vat\service\SoapService;
use Tec\Vat\utils\StdConverter;
use Exception;

class Aade
{
    private SoapService $soapService;

    public function __construct($username, $password)
    {
        $this->soapService = new SoapService($username, $password);
    }

    public function validateVat($vatCalledFor, $vatCalledBy = '') {
        try {
            $response = $this->soapService->validateVat([
                'INPUT_REC' => [
                    'afm_called_by' => $vatCalledBy,
                    'afm_called_for' => $vatCalledFor
                ]
            ]);

            return StdConverter::stdToArray($response);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
