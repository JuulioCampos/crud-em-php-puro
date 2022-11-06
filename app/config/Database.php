<?php
namespace App\Config;

class Database
{

    const DB_DATA = 'mysql:host=127.0.0.1;dbname=teste_camp';
    const DB_USER = 'root';
    const DB_PASS = '';
    public static $instance;

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO(
                    self::DB_DATA,
                    self::DB_USER,
                    self::DB_PASS,
                    [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ]
                );
                self::$instance->setAttribute(
                    \PDO::ATTR_ERRMODE,
                    \PDO::ERRMODE_EXCEPTION
                );
                self::$instance->setAttribute(
                    \PDO::ATTR_ORACLE_NULLS,
                    \PDO::NULL_EMPTY_STRING
                );
            } catch (\Throwable $th) {
                    print "Error!: " . $th->getMessage() . "<br/>";
                    die();
            }
        }

        return self::$instance;
    }
}
