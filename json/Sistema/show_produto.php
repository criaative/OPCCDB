<?php
include_once './conexao/conexao.php';

$con = new conexao();

$id = $_GET['id'];

$sql = 'SELECT * FROM produtos WHERE id = :id';

$exec = $con->pdo()->prepare($sql);
$all_dados[':id'] = $id;
$exec->execute($all_dados);

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);

$sql2 = 'SELECT pro.product_id, 
    proi.product_image_id,
    pro.image, 
    proi.image
FROM
    oc_product pro
        INNER JOIN oc_product_image proi ON proi.product_id = pro.product_id
    WHERE pro.product_id = :id';

$exec2 = $con->pdo()->prepare($sql2);
$all_dados2[':id'] = $id;
$exec2->execute($all_dados2);

$dados2 = $exec2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = 'SELECT 
    attg.attribute_group_id,
    attgd.name,
    attgd.language_id,
    attd.name,
    proa.text
FROM
    oc_attribute_group attg
        LEFT JOIN
    oc_attribute_group_description attgd ON attgd.attribute_group_id = attg.attribute_group_id
        LEFT JOIN
    oc_attribute att ON att.attribute_group_id = attgd.attribute_group_id
        LEFT JOIN
    oc_attribute_description attd ON attd.attribute_id = att.attribute_id
        LEFT JOIN
    oc_product_attribute proa ON proa.attribute_id = att.attribute_id
        LEFT JOIN
    oc_product_description prod ON prod.product_id = proa.product_id
    where prod.product_id = :id
    ';

$exec3 = $con->pdo()->prepare($sql3);
$all_dados3[':id'] = $id;
$exec3->execute($all_dados3);

$dados3 = $exec3->fetchAll(PDO::FETCH_ASSOC);

include 'header/header.php';
?>


<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-xs-4 item-photo">
            <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                <div class='carousel-outer'>
                    <!-- me art lab slider -->
                    <div class='carousel-inner '  style="height: 500px">

                        <div class='item active'>
                            <img src='http://localhost/CasaDosBanners/image/<?= $dados['0']['image'] ?>' alt='' style="width: 100%"/>
                        </div>

                        <?php foreach ($dados2 AS $v) { ?>
                            <div class='item'>
                                <img src='http://localhost/CasaDosBanners/image/<?= $v['image'] ?>' alt=''/>
                            </div>
                        <?php } ?>


                        <script>
                            $("#zoom_05").elevateZoom({zoomType: "inner", cursor: "crosshair"});
                        </script>
                    </div>

                    <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                        <span class='glyphicon glyphicon-chevron-left'></span>
                    </a>
                    <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                        <span class='glyphicon glyphicon-chevron-right'></span>
                    </a>
                </div>
                <ol class='carousel-indicators mCustomScrollbar meartlab'>

                    <li data-target='#carousel-custom' data-slide-to='0' class='active'><img src='http://localhost/CasaDosBanners/image/<?= $dados['0']['image'] ?>' alt='' /></li>

                    <?php foreach ($dados2 AS $k => $v) { ?>
                        <li data-target='#carousel-custom' data-slide-to='<?= $k + 1 ?>'><img src='http://localhost/CasaDosBanners/image/<?= $v['image'] ?>' alt='' /></li>
                    <?php } ?>
                </ol>
            </div>

            <script type="text/javascript">

                $(document).ready(function () {
                    $(".mCustomScrollbar").mCustomScrollbar({axis: "x"});
                });
            </script>
        </div>


        <div class="col-xs-7" style="background-color: #f7f7f7; border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h3><?= $dados['0']['produto'] ?></h3>   <a class="btn btn-primary" href="etiqueta.php?id=<?= $dados['0']['id'] ?>">Etiqueta</a> 
            <h4 style="color:#337ab7">Medidas <a href="#"><?= $dados['0']['model'] ?></a> · <small style="color:#337ab7">Qtd: <?= $dados['0']['estoque'] ?> </small></h4>

            <!-- Precios -->
            <div class="title-price col-xs-3">
                <h6 class="title-price"><small>PREÇO LOJA</small></h6>
                <h3 style="margin-top:0px;">R$: <?= $dados['0']['preco_loja'] ?></h3>
            </div>

            <div class="title-price col-xs-3">
                <h6 class="title-price"><small>PREÇO SITE</small></h6>
                <h3 style="margin-top:0px;">R$: <?= $dados['0']['preco_site'] ?></h3>
            </div>

            <!-- Detalles especificos del producto -->
            <div class="title-price col-xs-8">
                <p><?= $dados['0']['descricao'] ?></p>
            </div>

            <div class="title-price col-xs-8">
                <table class="table tab-content">
                    <thead>
                    <th>Descrição</th>
                    <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($dados3 AS $v) { ?>
                        <tr>
                            <td><?= $v['name'] ?></td>
                            <td><?= $v['text'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>                              

    </div>
</div>

