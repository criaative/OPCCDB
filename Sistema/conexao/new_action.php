<?php

include_once './conexao.php';
$con = new conexao();


$model = "5" ;
$sku = "55" ; 
$upc = "0" ;
$ean = "0" ; 
$jan = "0" ; 
$isbn = "0" ; 
$mpn = "0" ; 
$location = "0" ;
$quantity = "0" ;
$stock_status_id = "0" ;
$image = "0" ;
$manufacturer_id = "0" ;
$shipping = "0" ;
$price = "0" ;
$points = "0" ;
$tax_class_id = "0" ; 
$date_available = "0" ;
$weight = "0" ;
$weight_class_id = "0" ; 
$length = "0" ; 
$width = $_POST['peso'] ; 
$height = "0" ; 
$length_class_id = "0" ;
$subtract = "0" ; 
$minimum = "0" ; 
$sort_order = "0" ;
$status = "0" ;
$viewed = "0" ;
$date_added = "0" ; 
$date_modified = "0" ; 
$materia = "0" ;
$precoLoja = "0" ;



$sql = "insert into oc_product (model, sku, quantity, stock_status_id, image, manufacturer_id, shipping, price, weight,weight_class_id, length, width, height, length_class_id, subtract, minimum, sort_order, status, viewed, date_added, date_modified, materia, precoLoja) VALUES (:model, :sku, :quantity, :stock_status_id, :image, :manufacturer_id, :shipping, :price, :weight, :weight_class_id, :length, :width, :height, :length_class_id, :subtract, :minimum, :sort_order, :status, :viewed, :date_added, :date_modified, :materia, :precoLoja)";





$all_dados[':model'] = $model;
$all_dados[':sku'] = $sku;
$all_dados[':upc'] = $upc;
$all_dados[':ean'] = $ean; 
$all_dados[':jan'] = $jan; 
$all_dados[':mpn'] = $mpn;
$all_dados[':location'] = $location;
$all_dados[':quantity'] = $quantity;
$all_dados[':stock_status_id'] = $stock_status_id;
$all_dados[':image'] = $image;
$all_dados[':manufacturer_id'] = $manufacturer_id;
$all_dados[':shipping'] = $shipping;
$all_dados[':price'] = $price;
$all_dados[':points'] = $points;
$all_dados[':tax_class_id'] = $tax_class_id; 
$all_dados[':date_available'] = $date_available;
$all_dados[':weight'] = $weigh;
$all_dados[':weight_class_id'] = '.50'; 
$all_dados[':length'] = $length;
$all_dados[':width'] = $width; 
$all_dados[':height'] = $height; 
$all_dados[':length_class_id'] = $length_class_id;
$all_dados[':subtract'] = $subtract; 
$all_dados[':minimum'] = $minimum; 
$all_dados[':sort_order'] = $sort_order;
$all_dados[':status'] = $status;
$all_dados[':viewed'] = $viewed;
$all_dados[':date_added'] = $date_added; 
$all_dados[':date_modified'] = $date_modified; 
$all_dados[':materia'] = $materia;
$all_dados[':precoLoja'] = $precoLoja;


$exec = $con->pdo()->prepare($sql);
$exec->execute($all_dados);


echo'<pre><hr>';
print_r($exec);
echo'<hr></pre>';

exit;

header("location: ../index.php");



