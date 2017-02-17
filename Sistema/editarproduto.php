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

include 'header/header.php';
?>


<div class="container">
    <div class="form-group">
        <h2>Editar Produto</h2>

    </div>

    <form method="Post" action="action/editarproduto_action.php">


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
                            <input type="text" name="cod" value="<?= $dados['0']['sku'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" name="produto" value="<?= $dados['0']['produto'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" name="modelo" value="<?= $dados['0']['model'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="estoque" value="<?= $dados['0']['estoque'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <div class="col-xs-2">
                            <select name="categoria" class="form-control">
                                <option value="0">-------</option>
                                <?php foreach ($dados2 as $v) { ?>
                                    <option value="<?= $v['category_id'] ?>"><?= $v['name'] ?></option>
                                <?php }
                                ?>
                            </select> 
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="precoCusto" value="<?= $dados['0']['materia'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" name="precoSite" value="<?= $dados['0']['preco_site'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" name="precoLoja" value="<?= $dados['0']['preco_loja'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <div class="col-xs-2">
                            <input type="text" name="peso" value="<?= $dados['0']['peso'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="altura" value="<?= $dados['0']['altura'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="largura" value="<?= $dados['0']['largura'] ?>" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="comprimento" value="<?= $dados['0']['comprimento'] ?>" class="form-control">
                        </div>
                    </fieldset>
                    <fieldset>
                        <br>
                        <div class="col-xs-10">
                            <textarea type="text" name="descricao" class="form-control"><?= $dados['0']['descricao'] ?></textarea>
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

                        <br><div>
                            <button type="submit" class="btn btn-default">Salvar</button>
                        </div>

                    </fieldset>



                </div>



            </div>
        </div>

    </form>


</div>
