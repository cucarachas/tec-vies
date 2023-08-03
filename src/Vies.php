<?php

namespace Tec\Vat;

use DragonBe\Vies\CheckVatResponse;
use DragonBe\Vies\Vies as DragonBeVies;
use DragonBe\Vies\ViesException;
use DragonBe\Vies\ViesServiceException;

/**
 *
 */
class Vies
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
        $this->vies = new DragonBeVies();
    }

    /**
     * @param $countryCode
     * @param $vatNumber
     * @return CheckVatResponse|string
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
