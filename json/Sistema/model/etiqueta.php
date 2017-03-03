<?php

include_once 'conexao/conexao.php';

$con = new conexao();


$sql = 'SELECT * FROM produtos pro LEFT JOIN
    categorias cat ON pro.id = cat.id where pro.id = 6 GROUP BY pro.id
';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);