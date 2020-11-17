<?php
abstract class Conexao
{

    private static string $db = "mysql";
    private static string $host = "localhost";
    private static string $user = "root";
    private static string $pass = "";
    private static string $dbname = "bd_tcc";
    private static object $connect;

    public function connect() {
        try {
            self::$connect = new PDO(self::$db . ':host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);
            return self::$connect;
        } catch (Exception $ex) {
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador adm@empresa.com');
        }
    }

}
