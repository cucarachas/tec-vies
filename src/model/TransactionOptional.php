<?php

namespace Tec\Vat\model;

use Tec\Vat\model\Transaction;

class TransactionOptional extends Transaction
{
    private $buyerRejection;
    private $representativeBypassMatching;

    /**
     * @param mixed $buyerRejection
     */
    public function setBuyerRejection($buyerRejection): void
    {
        $this->buyerRejection = $buyerRejection;
    }

    /**
     * @param mixed $representativeBypassMatching
     */
    public function setRepresentativeBypassMatching($representativeBypassMatching): void
    {
        $this->representativeBypassMatching = $representativeBypassMatching;
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        $array['buyer_rejection'] = $this->buyerRejection;
        $array['repr_bypass_matching'] = $this->representativeBypassMatching;
        return $array;
    }

}
