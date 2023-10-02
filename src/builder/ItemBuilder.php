<?php

namespace Tec\Vat\builder;

use Tec\Vat\model\Item;

class ItemBuilder
{
    private Item $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function aa($aa): ItemBuilder
    {
        $this->item->setAa($aa);
        return $this;
    }

    public function code($code): ItemBuilder
    {
        $this->item->setCode($code);
        return $this;
    }

    public function description($description): ItemBuilder
    {
        $this->item->setDescription($description);
        return $this;
    }

    public function quantity($quantity): ItemBuilder
    {
        $this->item->setQuantity($quantity);
        return $this;
    }

    public function amount($amount): ItemBuilder
    {
        $this->item->setAmount($amount);
        return $this;
    }

    public function vatAmount($vatAmount): ItemBuilder
    {
        $this->item->setVatAmount($vatAmount);
        return $this;
    }

    public function build(): Item
    {
        return $this->item;
    }

}
