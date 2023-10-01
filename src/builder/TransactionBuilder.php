<?php

namespace Tec\Vat\builder;

use Tec\Vat\model\Transaction;

class TransactionBuilder
{
    private $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
    }

    public function supplierAfm($supplierAfm): TransactionBuilder
    {
        $this->transaction->setSupplierAfm($supplierAfm);
        return $this;
    }

    public function buyerAfm($buyerAfm): TransactionBuilder
    {
        $this->transaction->setBuyerAfm($buyerAfm);
        return $this;
    }

    public function representativeIdentityType($representativeIdentityType): TransactionBuilder
    {
        $this->transaction->setRepresentativeIdentityType($representativeIdentityType);
        return $this;
    }

    public function representativeIdentityNumber($representativeIdentityNumber): TransactionBuilder
    {
        $this->transaction->setRepresentativeIdentityNumber($representativeIdentityNumber);
        return $this;
    }

    public function representativeIdentityMobile($representativeIdentityMobile): TransactionBuilder
    {
        $this->transaction->setRepresentativeIdentityMobile($representativeIdentityMobile);
        return $this;
    }

    public function otpId($otpId): TransactionBuilder
    {
        $this->transaction->setOtpId($otpId);
        return $this;
    }

    public function primaryTransactionId($primaryTransactionId): TransactionBuilder
    {
        $this->transaction->setPrimaryTransactionId($primaryTransactionId);
        return $this;
    }

    public function primaryTransactionJustification($primaryTransactionJustification): TransactionBuilder
    {
        $this->transaction->setPrimaryTransactionJustification($primaryTransactionJustification);
        return $this;
    }

    public function transactionDateTime($transactionDateTime): TransactionBuilder
    {
        $this->transaction->setTransactionDateTime($transactionDateTime);
        return $this;
    }

    public function transactionPreviousTotalQuantity($transactionPreviousTotalQuantity): TransactionBuilder
    {
        $this->transaction->setTransactionPreviousTotalQuantity($transactionPreviousTotalQuantity);
        return $this;
    }

    public function transactionPreviousTotalAmount($transactionPreviousTotalAmount): TransactionBuilder
    {
        $this->transaction->setTransactionPreviousTotalAmount($transactionPreviousTotalAmount);
        return $this;
    }

    public function transactionPreviousTotalVat($transactionPreviousTotalVat): TransactionBuilder
    {
        $this->transaction->setTransactionPreviousTotalVat($transactionPreviousTotalVat);
        return $this;
    }

    public function transactionTotalQuantity($transactionTotalQuantity): TransactionBuilder
    {
        $this->transaction->setTransactionTotalQuantity($transactionTotalQuantity);
        return $this;
    }

    public function transactionTotalAmount($transactionTotalAmount): TransactionBuilder
    {
        $this->transaction->setTransactionTotalAmount($transactionTotalAmount);
        return $this;
    }

    public function transactionTotalVat($transactionTotalVat): TransactionBuilder
    {
        $this->transaction->setTransactionTotalVat($transactionTotalVat);
        return $this;
    }

    public function transactionNotes($transactionNotes): TransactionBuilder
    {
        $this->transaction->setTransactionNotes($transactionNotes);
        return $this;
    }

    public function build(): Transaction
    {
        return $this->transaction;
    }

}
