<?php

include_once 'conexao/conexao.php';

include('mpdf60/mpdf.php');

$con = new conexao();


$id = $_GET['id'];


$sql = 'SELECT *, proi.image AS `image1`, pro.image AS `image2`
FROM produtos pro
        LEFT JOIN categorias cat ON pro.id = cat.id
        LEFT JOIN oc_product_image proi ON proi.product_id = pro.id
WHERE pro.id = '.$id;

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);

$atributo = 'SELECT proa.product_id, att.attribute_id, attd.name, proa.text
FROM oc_attribute att LEFT JOIN oc_attribute_description attd 
ON attd.attribute_id = att.attribute_id
LEFT JOIN oc_product_attribute proa
ON proa.attribute_id = att.attribute_id WHERE proa.product_id = '.$id;

$atr = $con->pdo()->prepare($atributo);
$atr->execute();

$atributos = $atr->fetchAll(PDO::FETCH_ASSOC);

/* echo'<pre><hr>';
  print_r($atributos);
  echo'<hr></pre>';
  exit; */

$dados['0']['id'];
$dados['0']['sku'];


$dados['0']['model'];

$dados['0']['estoque'];
$dados['0']['preco_site'];

$dados['0']['comprimento'];
$dados['0']['largura'];
$dados['0']['altura'];

$dados['0']['cat_id'];
$dados['0']['categoria'];

$modelo = $dados['0']['produto'];
$desc = $dados['0']['model'];
$descricao = $dados['0']['descricao'];

$sku = $dados['0']['sku'];

$imgproduto = $dados['0']['image2'];
$imgproduto2 = $dados['0']['image1'];
$imgproduto3 = $dados['1']['image1'];
$imgproduto4 = $dados['2']['image1'];

$tamanho = $dados['0']['model'];
$peso = $dados['0']['peso'];

$atribute = $dados['0']['text'];





$html = "
	 <div id='apresentacao'>

            <div id='titulo'><div class='prod'><strong>$modelo<br>$desc</strong></div><br>
                
            </div>   
            <div id='logo'><img src='image/logoAp.png' width='240px'/></div>

            <div class='clearfix'></div>

            <div id='descricao'><p>$descricao</p>
            </div>   


            <div id='composicao'>Composição <br>";

foreach ($atributos As $k => $v) {
    $atribut = $v['name'];
    $atributcont = $v['text'];
  $html .= "$atribut ";
  $html .= "$atributcont<br>";
};

$html .= "</div>

            <div class='clearfix'></div>

            <div id='imgp'>
                <img src='http://localhost/CasaDosBanners/image/$imgproduto' width='270px'/>
            </div>

            

            <div class='imgpd'>
            
                <img src='http://localhost/CasaDosBanners/image/$imgproduto2' />
                
            </div>
            
            <div class='imgpd'>
            
                <img src='http://localhost/CasaDosBanners/image/$imgproduto3' />
                
            </div>
            
            <div class='imgpd'>
            
                <img src='http://localhost/CasaDosBanners/image/$imgproduto4' />
                
            </div>
            

            <div class='clearfix'></div>

            <div id='dimesao'>

                Código Produto:<br>
                DIMENSÕES:<br>
                PESO:<br>

            </div>

            <div id='dimesao'>
                $sku<br>
                $tamanho <br>
                $peso <br>      
            </div>

                 



            <div id='endereco'>
                Casa dos Banners<br>

                www.casadosbanners.com.br<br>
                Rua João Batista Dallarmi, 693 <br>
                Santo Inácio - Curitiba - PR<br>
            </div>


        </div>";

$mpdf = new mPDF();
$mpdf = new mPDF('utf-8', 'A4-L', 0, 0, 0, 0, 0, 0, 0, 0);
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/apresentacao.css");
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();

