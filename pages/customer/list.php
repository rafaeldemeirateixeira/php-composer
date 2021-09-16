<?php

require_once('../includes/header.php');

use PHP\Composer\Services\CustomerService;

$customerService = new CustomerService();
$customers = $customerService->findAll();

?>
    <h2 class="border-bottom mb-5 pb-2">Devedores</h2>
<?php
if ($customers != null) {
?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($customers as $customer) {
                ?>
                <tr>
                    <th ><?= $customer->getId() ?></th>
                    <td><?= $customer->getName() ?></td>
                    <td><?= $customer->getNifNumber() ?></td>
                    <td><?= $customer->getBirthDate() ?></td>
                    <td><a href="form.php?id=<?= $customer->getId() ?>">editar</a></td>
                    <td><a href="delete.php?id=<?= $customer->getId() ?>">deletar</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
<?php
} else {
?>
    <div class="alert alert-warning">Não foram econtrados devedores cadastrados</div>
<?php
}

require_once('../includes/footer.php');
