<?php

namespace PHP\Composer\Mappers;

use PHP\Composer\Models\Customer;
use PHP\Composer\Interfaces\RowMapperInterface;

class CustomerRowMapper implements RowMapperInterface
{
    public function map($row)
    {
        $customer = new Customer();
        $customer->setId($row->customer_id);
        $customer->setName($row->name);
        $customer->setNifNumber($row->nif_number);
        $customer->setBirthdate($row->birth_date);
        $customer->setAddress($row->address);
        return $customer;
    }
}
