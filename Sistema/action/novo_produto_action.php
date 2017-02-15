<?php

//include_once '../conexao/conexao.php';
$con = new PDO('mysql:host=localhost;dbname=loja', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);

$model = $_POST['modelo'];
$sku = $_POST['cod'];
$quantity = $_POST['estoque'];
$price = $_POST['precoSite'];
$weight = $_POST['peso'];
$weight_class_id = 'NULL';
$length = $_POST['comprimento'];
$width = $_POST['largura'];
$height = $_POST['altura'];
$length_class_id = 'NULL';
$status = 'NULL';
$materia = $_POST['precoCusto'];
$preco_loja = $_POST['precoLoja'];
$produto = $_POST['produto'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$language_id = $_POST['language_id'];

$sql = "INSERT INTO loja.oc_product(
        product_id,
        model,
        sku,
        quantity,
        price,
        weight,
        weight_class_id,
        length,
        width,
        height,
        length_class_id,
        status,
        materia,
        preco_loja
    ) VALUES (
        NULL,
        :model,
        :sku,
        :quantity,
        :price,
        :weight,
        :weight_class_id,
        :length,
        :width,
        :height,
        :length_class_id,
        :status,
        :materia,
        :preco_loja
    )";

$all_dados[':model'] = $model;
$all_dados[':sku'] = $sku;
$all_dados[':quantity'] = $quantity;
$all_dados[':price'] = $price;
$all_dados[':weight'] = $weight;
$all_dados[':weight_class_id'] = $weight_class_id;
$all_dados[':length'] = $length;
$all_dados[':width'] = $width;
$all_dados[':height'] = $height;
$all_dados[':length_class_id'] = $length_class_id;
$all_dados[':status'] = $status;
$all_dados[':materia'] = $materia;
$all_dados[':preco_loja'] = $preco_loja;


$exec = $con->prepare($sql);
$exec->execute($all_dados);

$id_pro = $con->lastInsertId();


$sql1 = "INSERT INTO loja.oc_product_description(
        product_id,
        name,
        language_id,
        description
        ) VALUES (:id_pro, :produto, :language_id, :descricao)";


$all_dados1[':id_pro'] = $id_pro;
$all_dados1[':produto'] = $produto;
$all_dados1[':descricao'] = $descricao;
$all_dados1[':language_id'] = $language_id;

$exec1 = $con->prepare($sql1);
$exec1->execute($all_dados1);


$sql2 = "INSERT INTO loja.oc_product_to_category(
        product_id, category_id) VALUES (:id_pro, :categoria)";


$all_dados2[':categoria'] = $categoria;
$all_dados2[':id_pro'] = $id_pro;

$exec2 = $con->prepare($sql2);
$exec2->execute($all_dados2);



header("location: ../index.php");
