<?php

include_once '../conexao/conexao.php';

$con = new conexao();


$num = $_POST['num'];
$mcp = $_POST['mcsite'];


$id = $num;

if ($id == 1) {
    $sql = 'UPDATE marcap SET mcp = :mcp where id = 1';
} else {


    $sql = 'UPDATE marcap SET mcp = :mcp where id = 2';
}



$exec = $con->pdo()->prepare($sql);

$all_dados[':mcp'] = $mcp;

$exec->execute($all_dados);

header("location: ../index.php");
