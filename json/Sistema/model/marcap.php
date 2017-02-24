<?php

include_once 'conexao/conexao.php';

$con = new conexao();

$mar = 'select * from loja.marcap';

$marc = $con->pdo()->prepare($mar);
$marc->execute();

$mcp = $marc->fetchAll(PDO::FETCH_ASSOC);

$mcpsite = $mcp[0]['mcp'];
$mcploja = $mcp[1]['mcp'];

$idsite = $mcp[0]['id'];
$idloja = $mcp[1]['id'];

