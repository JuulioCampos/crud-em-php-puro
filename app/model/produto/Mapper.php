<?php

namespace App\Model\Produto;

require_once('app/autoload.php');

use App\Model\MapperView;
use App\Config\Database as DB;

class Mapper extends MapperView
{
    private $id;
    private $nome;
    private $preco;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getAllData(): array
    {
        $data = [
            'id' => $this->id ?? null,
            'nome' => $this->nome ?? null,
            'preco' => $this->preco ?? null
        ];
        return $data;
    }

    public function insert()
    {
        parent::insert();
        try {
            print_r($this->nome);
            print_r($this->preco);
            $sql = "INSERT INTO produto (nome, preco) VALUES (:nome, :preco)";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindParam(":nome", $this->nome, \PDO::PARAM_STR);
            $p_sql->bindParam(":preco", $this->preco, \PDO::PARAM_STR);
            $p_sql->execute();
            return 'Dados salvos com sucesso!';
        } catch (\Throwable $th) {
            return 'Houve um erro inesperado!';
        }
    }
    public function update()
    {
        parent::update();
        try {
            $sql = "UPDATE produto SET nome = :nome, preco = :preco WHERE  id = :id";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindParam(":id", $this->getId(), \PDO::PARAM_STR);
            $p_sql->bindParam(":nome", $this->getNome(), \PDO::PARAM_STR);
            $p_sql->bindParam(":preco", $this->getPreco(), \PDO::PARAM_STR);
            $p_sql->execute();
            return 'Dados atualizados com sucesso!';
        } catch (\Throwable $th) {
            return 'Houve um erro inesperado!';
        }
    }

    public function delete()
    {
        parent::delete();
        
        try {
            $sql = "DELETE FROM produto WHERE  id = :id";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindParam(":id", $this->getId(), \PDO::PARAM_STR);
            $p_sql->execute();
            return 'Produto removido com sucesso!';
        } catch (\Throwable $th) {
            return 'Houve um erro inesperado!';
        }
    }

}
