<?php

namespace App\Model;

use App\Config\Database as DB;

class MapperView extends DB
{

    static function findById(int $id, string $table)
    {
        $table = strtolower($table);
        if ($table === "produto") {
            $sql = "SELECT * FROM produto WHERE id = :id";
        } elseif ($table === "usuario") {
            $sql = "SELECT * FROM usuario WHERE id = :id";
        } else {
            return 'table ' . $table . ' not found';
        }
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindParam(":id", $id, \PDO::PARAM_INT);
        $p_sql->execute();
        $state = $p_sql;

        if ($state) {
            return $state->fetchAll(\PDO::FETCH_ASSOC);
            die();
        }
        return 'not found';
    }

    static function findByName(string $name, string $table)
    {
        $table = strtolower($table);

        if ($table === "produto") {
            $sql = "SELECT * FROM produto WHERE nome = :nome";
        } elseif ($table === "usuario") {
            $sql = "SELECT * FROM usuario WHERE nome = :nome";
        } else {
            return 'table ' . $table . ' not found';
        }
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindParam(":nome", $name, \PDO::PARAM_STR);
        $p_sql->execute();
        $state = $p_sql;
        if ($state) {
            return $state->fetchAll(\PDO::FETCH_ASSOC);
        }
        return 'not found';
    }

    static function findAll(string $table)
    {
        $table = strtolower($table);

        if ($table === "produto") {
            $sql = "SELECT * FROM produto";
        } elseif ($table === "usuario") {
            $sql = "SELECT * FROM usuario";
        } elseif ($table === "produtos_usuarios") {
            $sql = "SELECT * FROM produtos_usuarios";
        } else {
            return 'table ' . $table . ' not found';
        }
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->execute();
        $state = $p_sql;
        if ($state) {
            return $state->fetchAll(\PDO::FETCH_ASSOC);
        }
        return 'not found';
    }

    public function insert()
    {
        # code...
    }
    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
