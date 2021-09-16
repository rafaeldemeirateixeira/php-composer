<?php

require_once '../includes/boot.php';

use PHP\Composer\Helpers\FlashScopeMessageHelper;
use PHP\Composer\Helpers\ValidateDataHelper;
use PHP\Composer\Models\Debt;
use PHP\Composer\Services\CustomerService;
use PHP\Composer\Services\DebtService;

$flashScopeMessageHelper = new FlashScopeMessageHelper();
try {
    if (isset($_POST['amount'])) {

        $validation = new ValidateDataHelper();
        $debt = new Debt();
        $debtService = new DebtService();
        $customerService = new CustomerService();

        $validation->checkNumeric($_POST['customer_id'], 'devedor')
            ->checkString($_POST['description'], 'descrição')
            ->checkNumeric($_POST['amount'], 'valor')
            ->checkString($_POST['due_date'], 'vencimento');

        $debt->setDescription($_POST['description']);
        $debt->setAmount(number_format($_POST['amount'], 2, '.', ''));
        $debt->setDueDate($_POST['due_date']);
        $debt->setCustomer($customerService->findById($_POST['customer_id']));

        if ($_POST['id']) {
            $debt->setId($_POST['id']);
            $debtService->updateById($debt);
            $flashScopeMessageHelper->setSuccess("Débito #{$debt->getId()} atualizado com sucesso");
        } else {
            $debtService->insert($debt);
            $flashScopeMessageHelper->setSuccess("Débito cadastrado com sucesso");
        }
    }
} catch (Exception $e) {
    $flashScopeMessageHelper->setError("Erro ao criar/modificar débito: " . $e->getMessage());
}

header('Location: list.php');
