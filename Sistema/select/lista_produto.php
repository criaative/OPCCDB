<?php
include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'SELECT 
    *
FROM
    produtos pro
        LEFT JOIN
    categorias cat ON pro.id = cat.id group by pro.id ';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);


$sql = 'select * from loja.marcap';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$mcp = $exec->fetchAll(PDO::FETCH_ASSOC);

$mcpsite = $mcp[0]['mcp'];
$mcploja = $mcp[1]['mcp'];

$idsite = $mcp[0]['id'];
$idloja = $mcp[1]['id'];


$sql2 = 'select * from loja.categorias ';

$exec2 = $con->pdo()->prepare($sql2);
$exec2->execute();

$dados2 = $exec->fetchAll(PDO::FETCH_ASSOC);