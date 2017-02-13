<?php

include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'select * from loja.produtos group by product_id';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);


$sql = 'select * from loja.marcap';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$mcp = $exec->fetchAll(PDO::FETCH_ASSOC);

$mcpsite = $mcp[0]['mcp'];
$idsite = $mcp[0]['id'];