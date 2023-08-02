<?php

namespace Cucarachas\TecVies;

use Cucarachas\TecVies\service\SoapService;
use Cucarachas\TecVies\utils\StdConverter;
use Exception;

class TecAade
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
