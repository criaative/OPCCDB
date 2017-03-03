<?php

include_once '../conexao/conexao.php';

$con = new conexao();


$sql = 'SELECT 
    *, pro.id
FROM
    produtos pro
        LEFT JOIN
    categorias cat ON pro.id = cat.id
GROUP BY pro.id';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($dados);