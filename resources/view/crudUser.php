<?php
require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

$_usuario = new UsuarioController();

$data = $_usuario->index();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Atualizado em</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>

            <?php
            foreach ($data as $key => $row) { ?>
                <tr>
                <td><?= $row['id']?></td>
                <td><?= $row['nome']?></td>
                <td><?= $row['cpf']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['senha']?></td>
                <td><?= $row['update_at']?></td>
                <td>
                    <Button><a href="<?=$_SERVER['SCRIPT_NAME']?>?delete=failed"><i class="fa-solid fa-pen-to-square"></i></a></Button>
                    <Button><i class="fa-solid fa-trash"></i></Button>
                </td>
                </tr>
            <?php } ?>
    </tbody>
</table>