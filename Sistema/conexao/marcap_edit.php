<?php

include_once 'conexao.php';

$con = new conexao();

$mcp = $_POST['mcsite'];
$id = $_GET['idpsite'];



$sql = 'UPDATE marcap SET mcp = :mcp where id = :id';

$exec = $con->pdo()->prepare($sql);

$all_dados[':mcp'] = $mcp;
$all_dados[':id'] = $id;

$exec->execute($all_dados);

header("location: marcap_action.php?mcsite=$mcp");