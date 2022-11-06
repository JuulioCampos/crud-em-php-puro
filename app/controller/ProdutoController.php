<?php

namespace App\Controller;

require_once 'app/model/produto/Mapper.php';
use App\Model\Usuario\Mapper;

class ProdutoController
{
    public function index()
    {
        $_mapper = new Mapper();

        return $_mapper->findAll('produto');
    }
    public function create()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function show()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
}
