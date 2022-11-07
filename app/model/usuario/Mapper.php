<?php

namespace App\Model\Usuario;

require_once('app/autoload.php');

use App\Config\Database as DB;
use App\Model\MapperView;

class Mapper extends MapperView
{
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;

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

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return strtolower($this->email);
    }

    public function setEmail(string $email)
    {
        $this->email = strtolower($email);
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function getAllData(): array
    {
        $data = [
            'id' => $this->id ?? null,
            'nome' => $this->getNome() ?? null,
            'cpf' => $this->getCpf() ?? null,
            'senha' => $this->getSenha() ?? null
        ];
        return $data;
    }

    public function getAllProducts($email, $senha)
    {
        $sql = "SELECT 
                    COUNT(p.id) AS 'quantidade_produtos', 
                    p.id as 'id_produto',
                    p.nome AS 'nome_produto', 
                    p.preco AS 'valor_unidade', 
                    (p.preco * COUNT(p.id)) AS 'valor_total', 
                    u.nome AS 'nome_usuario',
                    u.id as 'id_usuario'
                FROM produtos_usuarios pu 
                LEFT JOIN usuario u ON u.id = pu.id_usuario
                LEFT JOIN produto p ON p.id = pu.id_produto
                WHERE u.email = :email AND u.senha = :senha
                GROUP BY p.id";

        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindParam(":email", $email, \PDO::PARAM_STR);
        $p_sql->bindParam(":senha", $senha, \PDO::PARAM_STR);
        $p_sql->execute();
        $state = $p_sql->fetchAll(\PDO::FETCH_ASSOC);
        if ($state) {
            return $state;
        }
        return false;
    }

    public function insert()
    {
        parent::insert();
        try {
            $nome =  $this->getNome();
            $cpf = $this->getCpf();
            $email =  $this->getEmail();
            $senha = $this->getSenha();
            $agora =  (new \DateTime())->format('Y-m-d H:i:s');
            $sql = "INSERT INTO usuario (nome, cpf, email, senha, create_at, update_at) VALUES (:nome, :cpf, :email, :senha, :agora, :agora)";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindParam(":nome", $nome);
            $p_sql->bindParam(":cpf", $cpf);
            $p_sql->bindParam(":email", $email);
            $p_sql->bindParam(":senha", $senha );
            $p_sql->bindParam(":agora", $agora );
            $p_sql->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function update()
    {
        parent::update();
        try {
            $sql = "UPDATE usuario SET nome = :nome , cpf = :cpf, email = :email, senha = :senha, update_at = now() WHERE  id = :id";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindParam(":id", $this->getId(), \PDO::PARAM_STR);
            $p_sql->bindParam(":nome", $this->getNome(), \PDO::PARAM_STR);
            $p_sql->bindParam(":cpf", $this->getCpf(), \PDO::PARAM_STR);
            $p_sql->bindParam(":email", $this->getEmail(), \PDO::PARAM_STR);
            $p_sql->bindParam(":senha", $this->getSenha(), \PDO::PARAM_STR);
            $p_sql->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete()
    {
        parent::delete();

        try {
            $sqlproduto = "DELETE FROM produtos_usuarios WHERE  id_usuario = :id";
            $sql = "DELETE FROM usuario WHERE  id = :id";

            $p_sql_p = DB::getInstance()->prepare($sqlproduto);
            $p_sql_u = DB::getInstance()->prepare($sql);

            $p_sql_p->bindParam(":id", $this->getId(), \PDO::PARAM_STR);
            $p_sql_u->bindParam(":id", $this->getId(), \PDO::PARAM_STR);
            $p_sql_p->execute();
            $p_sql_u->execute();
            return 'Usuario removido com sucesso!';
        } catch (\Throwable $th) {
            return false;
        }
    }
}
