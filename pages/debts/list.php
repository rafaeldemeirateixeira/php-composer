<?php

require_once('../includes/header.php');

use PHP\Composer\Services\DebtService;

$debtService = new DebtService();
$debts = $debtService->findAll();

?>
    <h2 class="border-bottom mb-5 pb-2">Débitos</h2>
<?php
if ($debts != null) {
?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($debts as $debt) {
                ?>
                <tr>
                    <th><?= $debt->getId() ?></th>
                    <td><?= $debt->getCustomer()->getName() ?></td>
                    <td><?= $debt->getCustomer()->getNifNumber() ?></td>
                    <td>R$ <?= $debt->getAmount() ?></td>
                    <td><?= $debt->getDueDate() ?></td>
                    <td><a href="form.php?id=<?= $debt->getId() ?>">editar</a></td>
                    <td><a href="delete.php?id=<?= $debt->getId() ?>">deletar</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
} else {
?>
    <div class="alert alert-warning">Não foram econtrados livros cadastrados</div>
<?php
}
?>

<?php
require_once('../includes/footer.php');
