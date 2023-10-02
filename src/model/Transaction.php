<?php

namespace Tec\Vat\model;

class Transaction
{
    private $supplierAfm;
    private $buyerAfm;
    private $representativeIdentityType;
    private $representativeIdentityNumber;
    private $representativeIdentityMobile;
    private $otpId;
    private $primaryTransactionId;
    private $primaryTransactionJustification;
    private $transactionDateTime;
    private $transactionPreviousTotalQuantity;
    private $transactionPreviousTotalAmount;
    private $transactionPreviousTotalVat;
    private $transactionTotalQuantity;
    private $transactionTotalAmount;
    private $transactionTotalVat;
    private $transactionNotes;

    /**
     * @param mixed $supplierAfm
     */
    public function setSupplierAfm($supplierAfm): void
    {
        $this->supplierAfm = $supplierAfm;
    }

    /**
     * @param mixed $buyerAfm
     */
    public function setBuyerAfm($buyerAfm): void
    {
        $this->buyerAfm = $buyerAfm;
    }

    /**
     * @param mixed $representativeIdentityType
     */
    public function setRepresentativeIdentityType($representativeIdentityType): void
    {
        $this->representativeIdentityType = $representativeIdentityType;
    }

    /**
     * @param mixed $representativeIdentityNumber
     */
    public function setRepresentativeIdentityNumber($representativeIdentityNumber): void
    {
        $this->representativeIdentityNumber = $representativeIdentityNumber;
    }

    /**
     * @param mixed $representativeIdentityMobile
     */
    public function setRepresentativeIdentityMobile($representativeIdentityMobile): void
    {
        $this->representativeIdentityMobile = $representativeIdentityMobile;
    }

    /**
     * @param mixed $otpId
     */
    public function setOtpId($otpId): void
    {
        $this->otpId = $otpId;
    }

    /**
     * @param mixed $primaryTransactionId
     */
    public function setPrimaryTransactionId($primaryTransactionId): void
    {
        $this->primaryTransactionId = $primaryTransactionId;
    }

    /**
     * @param mixed $primaryTransactionJustification
     */
    public function setPrimaryTransactionJustification($primaryTransactionJustification): void
    {
        $this->primaryTransactionJustification = $primaryTransactionJustification;
    }

    /**
     * @param mixed $transactionDateTime
     */
    public function setTransactionDateTime($transactionDateTime): void
    {
        $this->transactionDateTime = $transactionDateTime;
    }

    /**
     * @param mixed $transactionPreviousTotalQuantity
     */
    public function setTransactionPreviousTotalQuantity($transactionPreviousTotalQuantity): void
    {
        $this->transactionPreviousTotalQuantity = $transactionPreviousTotalQuantity;
    }

    /**
     * @param mixed $transactionPreviousTotalAmount
     */
    public function setTransactionPreviousTotalAmount($transactionPreviousTotalAmount): void
    {
        $this->transactionPreviousTotalAmount = $transactionPreviousTotalAmount;
    }

    /**
     * @param mixed $transactionPreviousTotalVat
     */
    public function setTransactionPreviousTotalVat($transactionPreviousTotalVat): void
    {
        $this->transactionPreviousTotalVat = $transactionPreviousTotalVat;
    }

    /**
     * @param mixed $transactionTotalQuantity
     */
    public function setTransactionTotalQuantity($transactionTotalQuantity): void
    {
        $this->transactionTotalQuantity = $transactionTotalQuantity;
    }

    /**
     * @param mixed $transactionTotalAmount
     */
    public function setTransactionTotalAmount($transactionTotalAmount): void
    {
        $this->transactionTotalAmount = $transactionTotalAmount;
    }

    /**
     * @param mixed $transactionTotalVat
     */
    public function setTransactionTotalVat($transactionTotalVat): void
    {
        $this->transactionTotalVat = $transactionTotalVat;
    }

    /**
     * @param mixed $transactionNotes
     */
    public function setTransactionNotes($transactionNotes): void
    {
        $this->transactionNotes = $transactionNotes;
    }

    public function toArray() {
        return [
            'supplier_afm' => $this->supplierAfm,
            'buyer_afm' => $this->buyerAfm,
            'representative_identity_type' => $this->representativeIdentityType,
            'representative_identity_number' => $this->representativeIdentityNumber,
            'representative_identity_mobile' => $this->representativeIdentityMobile,
            'otp_id' => $this->otpId,
            'primary_transaction_id' => $this->primaryTransactionId,
            'primary_transaction_justification' => $this->primaryTransactionJustification,
            'transaction_date_time' => $this->transactionDateTime,
            'transaction_previous_total_quantity' => $this->transactionPreviousTotalQuantity,
            'transaction_previous_total_amount' => $this->transactionPreviousTotalAmount,
            'transaction_previous_total_vat' => $this->transactionPreviousTotalVat,
            'transaction_total_quantity' => $this->transactionTotalQuantity,
            'transaction_total_amount' => $this->transactionTotalAmount,
            'transaction_total_vat' => $this->transactionTotalVat,
            'transaction_notes' => $this->transactionNotes
        ];
    }

}
