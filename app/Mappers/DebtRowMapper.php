<?php

namespace PHP\Composer\Mappers;

use PHP\Composer\Models\Debt;
use PHP\Composer\Interfaces\RowMapperInterface;

class DebtRowMapper implements RowMapperInterface
{
    private $customerRowMapper;

    public function __construct($customerRowMapper)
    {
        $this->customerRowMapper = $customerRowMapper;
    }

    public function map($row)
    {
        $debt = new Debt();
        $debt->setId($row->debt_id);
        $debt->setDescription($row->description);
        $debt->setAmount($row->amount);
        $debt->setDueDate($row->due_date);
        $debt->setCustomer($this->customerRowMapper->map($row));
        return $debt;
    }
}
