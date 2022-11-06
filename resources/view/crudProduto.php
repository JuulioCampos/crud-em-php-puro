<?php
require_once 'app/controller/ProdutoController.php';

use App\Controller\ProdutoController;

$_produto = new ProdutoController();

$data = $_produto->index();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Açao</th>
        </tr>
    </thead>
    <tbody>
            <?php
            foreach ($data as $key => $row) { ?>
                <tr>
                <td><?= $row['id']?></td>
                <td><?= $row['nome']?></td>
                <td>R$ <?= $row['preco']?></td>
                <td>teste</td>
                </tr>
            <?php } ?>
    </tbody>
</table>
