<?php

namespace PHP\Composer\Models;

class Debt
{
    private $id;

    private $description;

    private $amount;

    private $dueDate;

    private $customer;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}
