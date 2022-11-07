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
    public function create($data)
    {
        try {
            $_mapper = new Mapper();
            $_mapper->setNome($data['nome']);
            $_mapper->setCpf($data['cpf']);
            $_mapper->setEmail($data['email']);
            $_mapper->setSenha($data['senha']);
            $_mapper->insert();
            return 'dados inseridos';
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function update($data)
    {
        try {
            $_mapper = new Mapper();
            $_mapper->setId($data['id']);
            $_mapper->setNome($data['nome']);
            $_mapper->setCpf($data['cpf']);
            $_mapper->setEmail($data['email']);
            $_mapper->setSenha($data['senha']);
            $_mapper->update();
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }
    public function getProducts($email, $senha)
    {
        $_mapper = new Mapper();
        return $_mapper->getAllProducts($email, $senha);
    }
    public function delete(int $id)
    {
        try {
            $_mapper = new Mapper();
            $_mapper->setId($id);
            $_mapper->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
