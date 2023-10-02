<?php

namespace Tec\Vat\model;

class Item
{
    private $aa;
    private $code;
    private $description;
    private $quantity;
    private $amount;
    private $vatAmount;

    /**
     * @param mixed $aa
     */
    public function setAa($aa): void
    {
        $this->aa = $aa;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $vatAmount
     */
    public function setVatAmount($vatAmount): void
    {
        $this->vatAmount = $vatAmount;
    }

    public function toArray(): array
    {
        return [
            'item_aa' => $this->aa,
            'item_code' => $this->code,
            'item_descr' => $this->description,
            'item_qty' => $this->quantity,
            'item_amount' => $this->amount,
            'item_vat' => $this->vatAmount,
        ];
    }
}
