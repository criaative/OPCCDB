<?php

include_once '../conexao/conexao.php';


$id = $_POST['id'];
$sku = $_POST['sku'];
$produto = $_POST['produto'];
$model = $_POST['model'];

$mprima = $_POST['mprima'];
$precoSite = $_POST['precoSite'];
$precoLoja = $_POST['precoLoja'];


$sql = 'UPDATE oc_product SET sku = :sku name =" :produto model =" :model ", price = :precoSite where product_id= :id';



$exec = $con->pdo()->prepare($sql);

$all_dados[':id'] = $id;
$all_dados[':nome'] = $nome;
$all_dados[':valor'] = $valor;

$exec->execute($all_dados);

header("location: produto.php");