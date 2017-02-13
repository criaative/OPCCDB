<?php

include_once 'conexao.php';

$con = new conexao();

$mcp = $_GET['mcsite'];




$sql = 'UPDATE oc_product
left join materia_prima 
on materia_prima.product_id = oc_product.product_id
SET 
    
    price = (materia_prima.valor / :mcp)';





$exec = $con->pdo()->prepare($sql);

$all_dados[':mcp'] = $mcp;


$exec->execute($all_dados);


echo'<pre><hr>';
print_r($exec);
echo'<hr></pre>';



header("location: ../index.php");
