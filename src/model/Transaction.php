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
            'supl_afm' => $this->supplierAfm,
            'buyer_afm' => $this->buyerAfm,
            'repr_identity_type' => $this->representativeIdentityType,
            'repr_identity_no' => $this->representativeIdentityNumber,
            'repr_mobile' => $this->representativeIdentityMobile,
            'otp_id' => $this->otpId,
            'primary_trans_id' => $this->primaryTransactionId,
            'primary_trans_justification' => $this->primaryTransactionJustification,
            'trans_datetime' => $this->transactionDateTime,
            'trans_previous_total_qty' => $this->transactionPreviousTotalQuantity,
            'trans_previous_total_amount' => $this->transactionPreviousTotalAmount,
            'trans_previous_total_vat' => $this->transactionPreviousTotalVat,
            'trans_total_qty' => $this->transactionTotalQuantity,
            'trans_total_amount' => $this->transactionTotalAmount,
            'trans_total_vat' => $this->transactionTotalVat,
            'trans_notes' => $this->transactionNotes
        ];
    }

}
