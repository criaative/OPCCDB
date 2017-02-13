<?php



/* echo'<pre><hr>';
print_r($_POST);
echo'<hr></pre>';



exit;*/
 



$modelo = $_POST['model'];
$desc = $_POST[product_description][2][description][meta_description];
$descricao = $_POST['product_description']['2']['description'];

$composicao = $_POST['product_attribute']['4']['product_attribute_description']['2']['text'];
$composicao2 = $_POST['product_attribute']['6']['product_attribute_description']['2']['text'];

$areaImp = $_POST['product_attribute']['5']['product_attribute_description']['2']['text'];

$sku = $_POST['sku'];

$imgproduto = $_POST['image'];
$imgproduto2 = $_POST['product_image']['0']['image'];
$imgproduto3 = $_POST['product_image']['1']['image'];
$imgproduto4 = $_POST['product_image']['2']['image'];

$tamanho = $_POST['product_attribute']['2']['product_attribute_description']['2']['text'];
$peso = $_POST['product_attribute']['8']['product_attribute_description']['2']['text'];



















include("mpdf60/mpdf.php");

$html = "
    
    <div id='apresentacao'>

            <div id='titulo'><div class='prod'><strong>$modelo</strong></div><br>
                <div class='tlo'>$desc</div>
            </div>	 
            <div id='logo'><img src='image/logoAp.png' width='240px'/></div>

            <div class='clearfix'></div>

            <div id='descricao'><p>$descricao</p>
            </div>	 


            <div id='composicao'>Composição <br>
                Área de Impressão<br>
                8 Barras de Metal 20x20 mm, <br>
                $composicao,<br>
                6 peças de encaixe,<br>
                $composicao2 <br>

                Área de Impressão<br>
                $modelo - $sku: $tamanho <br>
                Sangra : $areaImp
                
            </div>

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
$css = file_get_contents("stylesheet/apresentacao.css");
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();


