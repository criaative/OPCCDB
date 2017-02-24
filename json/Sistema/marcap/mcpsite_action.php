<?php

include_once '../conexao/conexao.php';

$con = new conexao();

$site = $_GET['site'];

$sql = 'UPDATE oc_product SET price = materia / :site';

$exec = $con->pdo()->prepare($sql);
$all_dados[':site'] = $site;
$exec->execute($all_dados);

header("location: ../index.php");