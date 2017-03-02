<?php
include_once '../conexao/conexao.php';

$con = new conexao();

$pesquisa1 = $_POST['pesquisa'] ;
$valor = $_POST['valor'];

$pesquisaProduto = "SELECT * FROM
    produtos pro LEFT JOIN categorias cat ON pro.id = cat.id
WHERE $pesquisa1 like '%$valor%'";


$pesquisa = $con->pdo()->prepare($pesquisaProduto);
$pesquisa->execute();
$pesquisarProdutos = $pesquisa->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($pesquisarProdutos);