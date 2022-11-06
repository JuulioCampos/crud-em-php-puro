<?php

namespace App\Controller;

require_once 'app/model/usuario/Mapper.php';
use App\Model\Usuario\Mapper;

class UsuarioController
{
    public function index()
    {
        $_mapper = new Mapper();

        return $_mapper->findAll('usuario');
    }
    public function create()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function getProducts($email, $senha)
    {
        $_mapper = new Mapper();
        return $_mapper->getAllProducts($email, $senha);
    }
    public function delete()
    {
        return (
            `<script> 
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'A função deletar foi desativada!',
            })
            </script>`);
    }
}
