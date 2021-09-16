<?php

require_once '../includes/boot.php';

use PHP\Composer\Helpers\FlashScopeMessageHelper;
use PHP\Composer\Services\DebtService;

$flashScopeMessageHelper = new FlashScopeMessageHelper();

try {
    if (isset($_GET['id'])) {
        $debtService = new DebtService();
        $debt = $debtService->findById($_GET['id']);
        if ($debt) {
            $debtService->deleteById($_GET['id']);
            $flashScopeMessageHelper->setSuccess("Débito #" . $debt->getId() . " deletado com sucesso");
        } else {
            $flashScopeMessageHelper->setError("Não foi encontrado débito para deletar");
        }
    }
} catch (Exception $e) {
    $flashScopeMessageHelper->setError("Erro ao deletar débito " . $e->getMessage());
}

header('Location: list.php');
