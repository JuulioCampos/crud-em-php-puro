<?php

require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

if (!$_GET['url']) {
    header("Location: home");
    die;
}

$route = (explode('/', $_GET['url']))[0];

switch ($route) {
    case 'home':
        require_once 'resources/view/index.php';
        break;
    case 'endpoint':
        if (empty((explode('/', $_GET['url']))[1]) && empty((explode('/', $_GET['url']))[2])) {
            return header("Location: home?failed=endpoint_params");
        }
        $email = (explode('/', $_GET['url']))[1];
        $senha = (explode('/', $_GET['url']))[2];
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->getProducts($email, $senha);
        echo json_encode($data);
        break;
    case 'list-usuario':
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->index();
        echo json_encode($data);
        break;
    case 'update-usuario':

        $data = json_decode(file_get_contents('php://input'), true);
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->update($data);
        if($data) {
            echo 'sucesso';
            die;
        }
        echo 'falha';
        break;
    case 'delete-usuario':
        $data = json_decode(file_get_contents('php://input'), true);
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->delete($data['id']);
        break;
    case 'create-usuario':
        $data = json_decode(file_get_contents('php://input'), true);
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->create($data);
        var_dump($data);
        die;
        break;
    default:
        break;

    die;
}