<?php

include_once '../conexao/conexao.php';
$con = new conexao();

$id = $_POST['id'];
$sku = $_POST['cod'];
$name = $_POST['produto'];
$description = $_POST['descricao'];
$model = $_POST['modelo'];
//$image = $_POST['image'];
$quantity = $_POST['estoque'];
$price = $_POST['precoSite'];
$weight = $_POST['peso'];
$length = $_POST['comprimento'];
$width = $_POST['peso'];
$height = $_POST['altura'];
$materia = $_POST['precoCusto'];
$status = $_POST['status'];
$preco_loja = $_POST['precoLoja'];
$categoria = $_POST['categoria'];

echo'<pre><hr>';
print_r($_POST);
echo'<hr></pre>';

//exit;
$sql = "update oc_product
        LEFT JOIN
    oc_product_description ON oc_product_description.product_id = oc_product.product_id 
    set 
                     
                    oc_product.sku = :sku,
                    oc_product_description.name = :name, 
                    oc_product_description.description = :description,
                    oc_product.model = :model,
                    oc_product.quantity = :quantity,
                    oc_product.price = :price,
                    oc_product.weight = :weight,
                    oc_product.length = :length,
                    oc_product.width = :width,
                    oc_product.height = :height,
                    oc_product.materia = :materia,
                    oc_product.status = :status,
                    oc_product.preco_loja = :preco_loja
                    where 
                    oc_product.product_id = :id
";



$all_dados[':id'] = $id;
$all_dados[':sku'] = $sku;
$all_dados[':name'] = $name;
$all_dados[':description'] = $description;
$all_dados[':model'] = $model;
//$all_dados[':image'] = $image;
$all_dados[':quantity'] = $quantity;
$all_dados[':price'] = $price;
$all_dados[':weight'] = $weight;
$all_dados[':length'] = $length;
$all_dados[':width'] = $width;
$all_dados[':height'] = $height;
$all_dados[':materia'] = $materia;
$all_dados[':status'] = $status;
$all_dados[':preco_loja'] = $preco_loja;



$exec = $con->pdo()->prepare($sql);

$exec->execute($all_dados);

$sql2 = "update loja.oc_product_to_category set category_id = :categoria 
    where product_id = :id ";


$all_dados2[':categoria'] = $categoria;
$all_dados2[':id'] = $id;

$exec2 = $con->pdo()->prepare($sql2);
$exec2->execute($all_dados2);

header("location: ../index.php");
