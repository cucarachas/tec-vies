<?php

namespace Tec\Vat\builder;

use Tec\Vat\model\TransactionOptional;

class TransactionOptionalBuilder
{
    private $transaction;

    public function __construct()
    {
        $this->transaction = new TransactionOptional();
    }

    public function supplierAfm($supplierAfm): TransactionOptionalBuilder
    {
        $this->transaction->setSupplierAfm($supplierAfm);
        return $this;
    }

    public function buyerAfm($buyerAfm): TransactionOptionalBuilder
    {
        $this->transaction->setBuyerAfm($buyerAfm);
        return $this;
    }

    public function representativeIdentityType($representativeIdentityType): TransactionOptionalBuilder
    {
        $this->transaction->setRepresentativeIdentityType($representativeIdentityType);
        return $this;
    }

    public function representativeIdentityNumber($representativeIdentityNumber): TransactionOptionalBuilder
    {
        $this->transaction->setRepresentativeIdentityNumber($representativeIdentityNumber);
        return $this;
    }

    public function representativeIdentityMobile($representativeIdentityMobile): TransactionOptionalBuilder
    {
        $this->transaction->setRepresentativeIdentityMobile($representativeIdentityMobile);
        return $this;
    }

    public function otpId($otpId): TransactionOptionalBuilder
    {
        $this->transaction->setOtpId($otpId);
        return $this;
    }

    public function primaryTransactionId($primaryTransactionId): TransactionOptionalBuilder
    {
        $this->transaction->setPrimaryTransactionId($primaryTransactionId);
        return $this;
    }

    public function primaryTransactionJustification($primaryTransactionJustification): TransactionOptionalBuilder
    {
        $this->transaction->setPrimaryTransactionJustification($primaryTransactionJustification);
        return $this;
    }

    public function transactionDateTime($transactionDateTime): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionDateTime($transactionDateTime);
        return $this;
    }

    public function transactionPreviousTotalQuantity($transactionPreviousTotalQuantity): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionPreviousTotalQuantity($transactionPreviousTotalQuantity);
        return $this;
    }

    public function transactionPreviousTotalAmount($transactionPreviousTotalAmount): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionPreviousTotalAmount($transactionPreviousTotalAmount);
        return $this;
    }

    public function transactionPreviousTotalVat($transactionPreviousTotalVat): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionPreviousTotalVat($transactionPreviousTotalVat);
        return $this;
    }

    public function transactionTotalQuantity($transactionTotalQuantity): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionTotalQuantity($transactionTotalQuantity);
        return $this;
    }

    public function transactionTotalAmount($transactionTotalAmount): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionTotalAmount($transactionTotalAmount);
        return $this;
    }

    public function transactionTotalVat($transactionTotalVat): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionTotalVat($transactionTotalVat);
        return $this;
    }

    public function transactionNotes($transactionNotes): TransactionOptionalBuilder
    {
        $this->transaction->setTransactionNotes($transactionNotes);
        return $this;
    }

    public function buyerRejection($buyerRejection): TransactionOptionalBuilder
    {
        $this->transaction->setBuyerRejection($buyerRejection);
        return $this;
    }

    public function representativeBypassMatching($representativeBypassMatching): TransactionOptionalBuilder
    {
        $this->transaction->setRepresentativeBypassMatching($representativeBypassMatching);
        return $this;
    }

    public function build(): TransactionOptional
    {
        return $this->transaction;
    }
}
