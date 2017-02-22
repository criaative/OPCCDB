<?php

include_once '../conexao/conexao.php';

$con = new conexao();



$id = $_GET['id'];

$sql = 'DELETE FROM loja.oc_product WHERE oc_product.product_id = :id';


$all_dados[':id'] = $id;

$exec = $con->pdo()->prepare($sql);

$exec->execute($all_dados);

header("location: ../index.php");

$sql2 = 'DELETE FROM loja.oc_product_description WHERE oc_product.product_id = :id';

$all_dados2[':id'] = $id;

$exec2 = $con->pdo()->prepare($sql2);

$exec2->execute($all_dados);

header("location: ../index.php");
