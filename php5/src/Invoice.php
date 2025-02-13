<?php

namespace App;

use App\Invoice\BusinessEntity;
use App\Invoice\Item;

class Invoice
{
    /** @var string */
    protected $number;

    /** @var BusinessEntity */
    protected $supplier;

    /** @var BusinessEntity */
    protected $customer;

    /** @var Item[]|array */
    protected $items;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Invoice
     */
    public function setNumber(string $number): Invoice
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return BusinessEntity
     */
    public function getSupplier(): BusinessEntity
    {
        return $this->supplier;
    }

    /**
     * @param BusinessEntity $supplier
     * @return Invoice
     */
    public function setSupplier(BusinessEntity $supplier): Invoice
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return BusinessEntity
     */
    public function getCustomer(): BusinessEntity
    {
        return $this->customer;
    }

    /**
     * @param BusinessEntity $customer
     * @return Invoice
     */
    public function setCustomer(BusinessEntity $customer): Invoice
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return array|Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item $item
     * @return Invoice
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    public function getTotalPrice()
    {
        $sum = 0;
		foreach ($this->items as $item)
			$sum += $item->getTotalPrice();
		
		return $sum;
    }
}
