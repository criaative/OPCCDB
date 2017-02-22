<?php
include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'SELECT  *,pro.id FROM
    produtos pro
        LEFT JOIN
    categorias cat ON pro.id = cat.id group by pro.id
    limit 0,10';

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

$dados2 = $exec2->fetchAll(PDO::FETCH_ASSOC);


//quantidade de produtos por pagina


$sql3 = 'SELECT product_id FROM oc_product';

$exec3 = $con->pdo()->prepare($sql3);
$exec3->execute();

$dados3 = $exec3->fetchAll(PDO::FETCH_ASSOC);



