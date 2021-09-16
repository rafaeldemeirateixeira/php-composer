<?php

namespace PHP\Composer\Services;

use PHP\Composer\Interfaces\CrudServiceInterface;
use PHP\Composer\Repositories\DebtRepository;

class DebtService implements CrudServiceInterface
{
    private $debtRepository;

    public function __construct()
    {
        $this->debtRepository = new DebtRepository();
    }

    public function findAll()
    {
        return $this->debtRepository->findAll();
    }

    public function findById($id)
    {
        return $this->debtRepository->findById($id);
    }

    public function updateById($debt)
    {
        return $this->debtRepository->updateById($debt);
    }

    public function insert($debt)
    {
        return $this->debtRepository->insert($debt);
    }

    public function deleteById($id)
    {
        return $this->debtRepository->deleteById($id);
    }
}
