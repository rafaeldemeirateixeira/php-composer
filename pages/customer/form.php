<?php

require_once('../includes/header.php');

use PHP\Composer\Services\CustomerService;

$id = null;
$customer = null;

if (isset($_GET['id'])) {
$id = $_GET["id"];
$customerService = new CustomerService();
$customer = $customerService->findById($id);
}

?>

<h2 class="border-bottom mb-5 pb-2">Devedores</h2>
<form action="save.php" method="post" class="row g-3 needs-validation" novalidate>
        <div class= "col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="title">Nome</label>
                <input class="form-control" type="text" id="name" name="name" value="<?= $customer ? $customer->getName() : '' ?>">
            </div>
        </div>
        <div class= "col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="title">CPF/CNPJ</label>
                <input class="form-control" type="text" id="nif_number" name="nif_number" maxlength="14" value="<?= $customer ? $customer->getNifNumber() : '' ?>">
            </div>
        </div>
        <div class= "col-sm-12 col-md-6 col-lg-6">
            <label for="title">Data de Nascimento</label>
            <input class="form-control" type="date" id="birth_date" name="birth_date" maxlength="8" value="<?= $customer ? $customer->getBirthDate() : '' ?>">
        </div>

        <div class= "col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="title">Endereço</label>
                <textarea id="address" name="address" class="form-control" rows="3"><?= $customer ? $customer->getAddress() : '' ?></textarea>
            </div>
        </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
    <input type="hidden" name="id" id="id" value="<?= $customer ? $customer->getId() : '' ?>">
</form>

<?php
require_once('../includes/footer.php');
