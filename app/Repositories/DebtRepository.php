<?php

namespace PHP\Composer\Repositories;

use PDO;
use PHP\Composer\Database\ConnectionFactory;
use PHP\Composer\Interfaces\CrudRepositoryInterface;
use PHP\Composer\Mappers\CustomerRowMapper;
use PHP\Composer\Mappers\DebtRowMapper;

class DebtRepository implements CrudRepositoryInterface
{
    private $connection;

    private $debtRowMapper;

    const FIND_ALL = "
        SELECT
            D.id AS debt_id, description, amount, DATE_FORMAT(due_date, '%d/%m/%Y') AS due_date, C.id AS customer_id, C.name, C.nif_number
        FROM debts D
        INNER JOIN customers C ON D.customer_id = C.id
    ";

    const FIND_BY_ID = "
        SELECT
            D.id AS debt_id, description, amount, due_date, C.id AS customer_id, C.name, C.nif_number, C.address
        FROM debts D
        INNER JOIN customers C ON D.customer_id = C.id
        WHERE D.id = ?
    ";

    const DELETE_BY_ID = "DELETE FROM debts WHERE id = ?";

    const UPDATE_BY_ID = " UPDATE debts SET description = ?, amount = ?, due_date = ?, customer_id = ? WHERE ID = ? ";

    const INSERT = " INSERT INTO debts (description, amount, due_date, customer_id) VALUES(?,?,?,?) ";

    public function __construct()
    {
        $connectionFactory = new ConnectionFactory();
        $this->connection = $connectionFactory->get();

        $customerRowMapper = new CustomerRowMapper();
        $this->debtRowMapper = new DebtRowMapper($customerRowMapper);
    }

    public function findAll()
    {
        $resultSet = $this->connection->query(self::FIND_ALL);
        while ($row = $resultSet->fetch(PDO::FETCH_OBJ)) {
            $debts[] = $this->debtRowMapper->map($row);
        }
        return $debts;
    }

    public function findById(int $id)
    {
        $resultSet = $this->connection->prepare(self::FIND_BY_ID);
        $resultSet->bindParam(1, $id);
        if ($resultSet->execute()) {
            while ($row = $resultSet->fetch(PDO::FETCH_OBJ)) {
                $debt = $this->debtRowMapper->map($row);
            }
        }
        return $debt;
    }

    public function deleteById(int $id)
    {
        $statment = $this->connection->prepare(self::DELETE_BY_ID);
        $statment->bindParam(1, $id);
        $statment->execute();
    }

    public function updateById(object $debt)
    {
        $statment = $this->connection->prepare(self::UPDATE_BY_ID);
        $statment->bindParam(1, $debt->getDescription());
        $statment->bindParam(2, $debt->getAmount());
        $statment->bindParam(3, $debt->getDueDate());
        $statment->bindParam(4, $debt->getCustomer()->getId());
        $statment->bindParam(5, $debt->getId());
        $statment->execute();
    }

    public function insert(object $debt)
    {
        $statment = $this->connection->prepare(self::INSERT);
        $statment->bindParam(1, $debt->getDescription());
        $statment->bindParam(2, $debt->getAmount());
        $statment->bindParam(3, $debt->getDueDate());
        $statment->bindParam(4, $debt->getCustomer()->getId());
        $statment->execute();
    }
}
