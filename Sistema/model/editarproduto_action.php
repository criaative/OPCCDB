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

$cor = $_POST['Cor:'];
$acabamento = $_POST['Acabamento:'];
$tamanho = $_POST['Tamanho:'];
$impressao = $_POST['Impressão:'];
$tamanhoSangra = $_POST['Tamanho_com_Sangra:'];
$acabamentoIncluso = $_POST['Acabamento_Incluso:'];
$prazoEntrega = $_POST['Prazo_de_entrega:'];



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

$sql2 = "INSERT INTO loja.oc_product_to_category (product_id, category_id) VALUES (':id', ':categoria')";


$all_dados2[':categoria'] = $categoria;
$all_dados2[':id'] = $id;

$exec2 = $con->pdo()->prepare($sql2);
$exec2->execute($all_dados2);

$sql3 = "update loja.oc_product_to_category set category_id = :categoria 
    where product_id = :id ";


$all_dados3[':categoria'] = $categoria;
$all_dados3[':id'] = $id;

$exec3 = $con->pdo()->prepare($sql3);
$exec3->execute($all_dados3);

$sqlAttribute = "
    UPDATE loja.oc_product_attribute SET text = :cor where product_id = :id_pro AND attribute_id = 4;
    UPDATE loja.oc_product_attribute SET text = :acabamento where product_id = :id_pro AND attribute_id = 5;
    UPDATE loja.oc_product_attribute SET text = :tamanho where product_id = :id_pro AND attribute_id = 6;
    UPDATE loja.oc_product_attribute SET text = :impressao where product_id = :id_pro AND attribute_id = 7;
    UPDATE loja.oc_product_attribute SET text = :quantidade where product_id = :id_pro AND attribute_id = 8;
    UPDATE loja.oc_product_attribute SET text = :tamanhoSangra where product_id = :id_pro AND attribute_id = 9;
    UPDATE loja.oc_product_attribute SET text = :acabamentoIncluso where product_id = :id_pro AND attribute_id = 10;
    UPDATE loja.oc_product_attribute SET text = :prazoEntrega where product_id = :id_pro AND attribute_id = 11;
    UPDATE loja.oc_product_attribute SET text = :codigo where product_id = :id_pro AND attribute_id = 12;
    UPDATE loja.oc_product_attribute SET text = :peso where product_id = :id_pro AND attribute_id = 13;
    ";


$attibute[':id_pro'] = $id;
$attibute[':cor'] = $cor;
$attibute[':acabamento'] = $acabamento;
$attibute[':tamanho'] = $tamanho;
$attibute[':impressao'] = $impressao;
$attibute[':quantidade'] = $quantity;
$attibute[':tamanhoSangra'] = $tamanhoSangra;
$attibute[':acabamentoIncluso'] = $acabamentoIncluso;
$attibute[':prazoEntrega'] = $prazoEntrega;
$attibute[':codigo'] = $sku;
$attibute[':peso'] = $weight;

$att = $con->pdo()->prepare($sqlAttribute);
$att->execute($attibute);

header("location: ../index.php");
