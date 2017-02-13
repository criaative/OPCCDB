<?php


class conexao
{

    private $host;
    private $usuario;
    private $pw;
    private $dbname;
    private $opcao;

    public function __construct() {
        $this->host = 'localhost';
        $this->usuario = 'root';
        $this->pw = '';
        $this->dbname = 'loja';
        $this->opcao = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"];
    }

    public function pdo() {
        return new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->usuario, $this->pw, $this->opcao);
    }

}