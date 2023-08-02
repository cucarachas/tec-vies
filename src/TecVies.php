<?php

namespace Cucarachas\TecVies;

use DragonBe\Vies\Vies;
use DragonBe\Vies\ViesException;
use DragonBe\Vies\ViesServiceException;

/**
 *
 */
class TecVies
{
    /**
     * @var Vies
     */
    private $vies;

    /**
     * @param Vies $vies
     */
    public function __construct()
    {
        $this->vies = new Vies();
    }

    /**
     * @param $countryCode
     * @param $vatNumber
     * @return \DragonBe\Vies\CheckVatResponse|string
     */
    public function validateVat($countryCode, $vatNumber)
    {
        try{
            return $this->vies->validateVat($countryCode, $vatNumber);
        }catch (ViesException|ViesServiceException $e){
            return $e->getMessage();
        }
    }

}
