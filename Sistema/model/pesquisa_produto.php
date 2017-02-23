<?php
include_once './conexao/conexao.php';

$con = new conexao();

$pesquisaProduto = "SELECT 
    *
FROM
    produtos pro
        LEFT JOIN
    categorias cat ON pro.id = cat.id
WHERE
    produto LIKE '%kit cavalete%' ";

$pesquisa = $con->pdo()->prepare($pesquisaProduto);
$pesquisa->execute();

$pesquisarProdutos = $pesquisa->fetchAll(PDO::FETCH_ASSOC);


