<?php

use PHP\Composer\Helpers\FlashScopeMessageHelper;
use PHP\Composer\Services\CustomerService;

require_once '../includes/boot.php';

$flashScopeMessageHelper = new FlashScopeMessageHelper();
try {
    if (isset($_GET['id'])) {
        $customerService = new CustomerService();
        $customer = $customerService->findById($_GET['id']);
        if ($customer) {
            $customerService->deleteById($_GET['id']);
            $flashScopeMessageHelper->setSuccess("Devedor " . $customer->getName() . " deletado com sucesso");
        } else {
            $flashScopeMessageHelper->setError("Não foi encontrado devedor para deletar");
        }
    }
} catch (Exception $e) {
    $flashScopeMessageHelper->setError("Erro ao deletar devedor " . $e->getMessage());
}

header('Location: list.php');
