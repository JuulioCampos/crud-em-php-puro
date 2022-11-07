<?php

require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!$_GET['url']) {
    header("Location: home");
    die;
}

$route = (explode('/', $_GET['url']))[0];

switch ($route) {
    case 'home':
        require_once 'resources/view/index.php';
        die;

        break;
    case 'endpoint':
        if (empty((explode('/', $_GET['url']))[1]) && empty((explode('/', $_GET['url']))[2])) {
            return header("Location: home?failed=endpoint_params");
            die;
        }
        $email = (explode('/', $_GET['url']))[1];
        $senha = (explode('/', $_GET['url']))[2];
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->getProducts($email, $senha);
        echo json_encode($data);
        die;
        break;
    case 'list-usuario':
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->index();
        echo json_encode($data);
        die;
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
        die;
        break;
    case 'delete-usuario':
        $data = json_decode(file_get_contents('php://input'), true);
        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->delete($data['id']);
        die;
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
}
 // require_once 'app/model/produto/Mapper.php';
// require_once 'app/model/usuario/Mapper.php';

// use Produto\Mapper as PMapper;
// use Usuario\Mapper as UMapper;

// $usuario = new UMapper();
// $usuario->setId(1);
// $usuario->setEmail('julio@admin.com.br');
// $usuario->setSenha('senha');
// $usuario->update();

// $produto = new PMapper();
// $produto->setNome('teste up');
// $produto->setPreco(2700);
// $produto->insert();

// echo '<br />';
// echo '<br />';
// echo '<br />';
// echo '<br />';
// var_dump($produto::findById(2, 'produto'));
// echo '<br />';
// var_dump( $produto::findByName('telefone', 'produto'));
// echo '<br />';
// echo '<br />';
// print_r( $produto::findById('1', 'usuario'));
// echo '<br />';
// die; -->