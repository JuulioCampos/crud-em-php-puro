<?php

require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$route = (explode('/', $_GET['url']))[0];
switch ($route) {
    case 'home':
        require_once 'resources/view/index.php';
        break;
    case 'endpoint':
        $email = (explode('/', $_GET['url']))[1];
        $senha = (explode('/', $_GET['url']))[2];

        $_controlllerUsuario = new UsuarioController();
        $data = $_controlllerUsuario->getProducts( $email, $senha);
        echo json_encode($data);
        break;
    case 'listUsuario':
        require_once 'resources/view/index.php';
        break;
    case 'listProduto':
        require_once 'resources/view/index.php';
        break;
    case 'atualizaProduto':
        require_once 'resources/view/index.php';
        break;
    case 'atualizaUsuario':
        require_once 'resources/view/index.php';
        break;
    case 'delete':
        require_once 'resources/view/index.php';
        break;
    case 'createUser':
        require_once 'resources/view/index.php';
        break;
    case 'createProduto':
        require_once 'resources/view/index.php';
        break;
    default:
        break;
}

function showProductsByUser()
{
    echo 'passou';
}
?>
<!-- // require_once 'app/model/produto/Mapper.php';
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