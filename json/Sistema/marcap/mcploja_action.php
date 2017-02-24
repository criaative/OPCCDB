<?php

include_once '../conexao/conexao.php';

$con = new conexao();

$loja = $_GET['loja'];

$sql = 'UPDATE oc_product SET preco_loja = materia / :loja';

$exec = $con->pdo()->prepare($sql);
$all_dados[':loja'] = $loja;
$exec->execute($all_dados);



echo'<pre><hr>';
print_r($_GET);
echo'<hr></pre>';
//exit;
header("location: ../index.php");