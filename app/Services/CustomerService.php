<?php

namespace PHP\Composer\Services;

use PHP\Composer\Interfaces\CrudServiceInterface;
use PHP\Composer\Repositories\CustomerRepository;

class CustomerService implements CrudServiceInterface
{
    private $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    public function findAll()
    {
        return $this->customerRepository->findAll();
    }

    public function findById($id)
    {
        return $this->customerRepository->findById($id);
    }

    public function updateById($customer)
    {
        return $this->customerRepository->updateById($customer);
    }

    public function insert($customer)
    {
        return $this->customerRepository->insert($customer);
    }

    public function deleteById($id)
    {
        return $this->customerRepository->deleteById($id);
    }
}
