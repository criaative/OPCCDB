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
$status = $_POST['status'];
$materia = $_POST['precoCusto'];
$preco_loja = $_POST['precoLoja'];
$produto = $_POST['produto'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$language_id = $_POST['language_id'];

$cor = $_POST['Cor:'];
$acabamento = $_POST['Acabamento:'];
$tamanho = $_POST['Tamanho:'];
$impressao = $_POST['Impressão:'];
$tamanhoSangra = $_POST['Tamanho_com_Sangra:'];
$acabamentoIncluso = $_POST['Acabamento_Incluso:'];
$prazoEntrega = $_POST['Prazo_de_entrega:'];

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


$sqlAttribute = "
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 4, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 5, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 6, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 7, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 8, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 9, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 10, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 11, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 12, 2, :peso);
    INSERT INTO loja.oc_product_attribute(product_id, attribute_id, language_id, text) VALUES (:id_pro, 13, 2, :peso);
    ";


$attibute[':id_pro'] = $id_pro;
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

$att = $con->prepare($sqlAttribute);
$att->execute($attibute);

header("location: ../index.php");
