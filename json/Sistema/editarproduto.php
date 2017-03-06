<?php
include_once './conexao/conexao.php';

$con = new conexao();

$id = $_GET['id'];

$sql = 'SELECT * FROM produtos pro LEFT JOIN categorias cat ON pro.id = cat.id 
WHERE pro.id = :id group by pro.id;';

$exec = $con->pdo()->prepare($sql);
$all_dados[':id'] = $id;
$exec->execute($all_dados);

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);


$sql2 = 'SELECT  * FROM oc_category_description';

$exec2 = $con->pdo()->prepare($sql2);
$exec2->execute();

$dados2 = $exec2->fetchAll(PDO::FETCH_ASSOC);


$sql3 = 'select * from loja.oc_product_image where product_id = :id ';

$exec3 = $con->pdo()->prepare($sql3);

$all_dados3[':id'] = $id;
$exec3->execute($all_dados3);

$imagens = $exec3->fetchAll(PDO::FETCH_ASSOC);

$attId = 'SELECT 
    att.attribute_id,
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
    where product_id = :id
     ';


$att_id = $con->pdo()->prepare($attId);
$all_att[':id'] = $id;
$att_id->execute($all_att);
$atributos = $att_id->fetchAll(PDO::FETCH_ASSOC);

include 'header/header.php';
?>


<div class="container">
    <div class="form-group">
        <h2>Editar Produto</h2>

    </div>

    <form method="Post" action="model/editarproduto_action.php">


        <div class="row">
            <div class="col-md-4">

                <img src="http://localhost/CasaDosBanners/image/<?= $dados['0']['image'] ?>" width="300px" alt="..." class="img-rounded">
                <br>
                <br>
                <?php foreach ($imagens as $v): ?>
                    <img src="http://localhost/CasaDosBanners/image/<?= $v['image'] ?>" width="100px" alt="..." class="img-rounded">
                <?php endforeach; ?>
            </div>

            <div class="col-md-8">

                <div class="row">

                    <fieldset>
                        <div class="col-xs-2">
                            <input type="hidden" name="id" value="<?= $id ?>" class="form-control">
                            <label>Codigo</label>
                            <input type="text" name="cod" value="<?= $dados['0']['sku'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label>Produto</label>
                            <input type="text" name="produto" value="<?= $dados['0']['produto'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label>Modelo</label>
                            <input type="text" name="modelo" value="<?= $dados['0']['model'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label>estoque</label>
                            <input type="text" name="estoque" value="<?= $dados['0']['estoque'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <div class="col-xs-2">
                            <label>Categoria</label>
                            <select name="categoria" class="form-control">
                                <option value="0">-------</option>
                                <?php foreach ($dados2 as $v) { ?>
                                    <option value="<?= $v['category_id'] ?>"><?= $v['name'] ?></option>
                                <?php }
                                ?>
                            </select> 
                        </div>
                        <div class="col-xs-2">
                            <label>Custo</label>
                            <input type="text" name="precoCusto" value="<?= $dados['0']['materia'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label>Preço Site</label>
                            <input type="text" name="precoSite" value="<?= $dados['0']['preco_site'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label>Preço Loja</label>
                            <input type="text" name="precoLoja" value="<?= $dados['0']['preco_loja'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <div class="col-xs-2">
                            <label>Peso</label>
                            <input type="text" name="peso" value="<?= $dados['0']['peso'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label>altura</label>
                            <input type="text" name="altura" value="<?= $dados['0']['altura'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label>Largura</label>
                            <input type="text" name="largura" value="<?= $dados['0']['largura'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label>Comprimento</label>
                            <input type="text" name="comprimento" value="<?= $dados['0']['comprimento'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <fieldset>
                        <br>
                        <div class="col-xs-10">
                            <label>Descrição</label>
                            <textarea style="height:100px;" type="text" name="descricao" class="form-control"><?= $dados['0']['descricao'] ?></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <br>
                        <div class="col-xs-3">

                            <input type="radio" name="status" value="1" >
                            <label>Habilitado</label>
                        </div>
                        <div class="col-xs-6">
                            <input type="radio" name="status" value="0" checked>
                            <label>Desabilitado</label>
                        </div>
                    </fieldset>
                        <br>
                        <fieldset>
                            <div class="col-xs-3">
                                <input type="text" name="<?= $atributos['0']['name'] ?>" placeholder="<?= $atributos['0']['name'] ?>" class="form-control" value="<?= $atributos['0']['text'] ?>">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="<?= $atributos['1']['name'] ?>" placeholder="<?= $atributos['1']['name'] ?>" class="form-control" value="<?= $atributos['1']['text'] ?>">
                            </div>
                            <div class="col-xs-3">
                                <input type="text" name="<?= $atributos['2']['name'] ?>" placeholder="<?= $atributos['2']['name'] ?>" class="form-control" value="<?= $atributos['2']['text'] ?>">
                            </div>
                            
                        </fieldset>
                        <br>
                        <fieldset>
                            <div class="col-xs-2">
                                <input type="text" name="<?= $atributos['3']['name'] ?>" placeholder="<?= $atributos['3']['name'] ?>" class="form-control" value="<?= $atributos['3']['text'] ?>">
                            </div>
                            <div class="col-xs-3">
                                <input type="text" name="<?= $atributos['5']['name'] ?>" placeholder="<?= $atributos['5']['name'] ?>" class="form-control" value="<?= $atributos['5']['text'] ?>">
                            </div>
                            <div class="col-xs-3">
                                <input type="text" name="<?= $atributos['6']['name'] ?>" placeholder="<?= $atributos['6']['name'] ?>"  class="form-control" value="<?= $atributos['6']['text'] ?>">
                            </div>
                            <div class="col-xs-2">
                                <input type="text" name="<?= $atributos['7']['name'] ?>" placeholder="<?= $atributos['7']['name'] ?>" class="form-control" value="<?= $atributos['7']['text'] ?>">
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <div class="col-sm-offset-8 col-sm-12">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </fieldset>

                    </fieldset>



                </div>



            </div>
        </div>

    </form>


</div>
