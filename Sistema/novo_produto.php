<?php
include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'select * from oc_category_description';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$categorias = $exec->fetchAll(PDO::FETCH_ASSOC);


$attId = 'SELECT 
    att.attribute_id,
    attg.attribute_group_id,
    attgd.name,
    attgd.language_id,
    attd.name    
FROM
    oc_attribute_group attg
        LEFT JOIN
    oc_attribute_group_description attgd ON attgd.attribute_group_id = attg.attribute_group_id
        LEFT JOIN
    oc_attribute att ON att.attribute_group_id = attgd.attribute_group_id
        LEFT JOIN
    oc_attribute_description attd ON attd.attribute_id = att.attribute_id
        
     ';

$att_id = $con->pdo()->prepare($attId);
$att_id->execute();
$atributos = $att_id->fetchAll(PDO::FETCH_ASSOC);

include 'header/header.php';
?>


<div class="container  center-block">
    <div class="row">
        <div class="form-group">
            <h2>Novo Produto</h2>
        </div>

        <!-- Form Name -->

        <form method="Post" action="model/novo_produto_action.php">

            <fieldset>
                <div class="col-xs-2">
                    <input type="hidden" name="language_id" value="2">
                    <input type="text" name="cod" class="form-control" placeholder="0000">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="produto" class="form-control" placeholder="Produto">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="estoque" class="form-control" placeholder="estoque">
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-2">
                    <select name="categoria" class="form-control">
                        <option value="0">-------</option>
                        <?php foreach ($categorias as $v) { ?>
                            <option value="<?= $v['category_id'] ?>"><?= $v['name'] ?></option>
                        <?php }
                        ?>
                    </select>


                </div>

                <div class="col-xs-2">
                    <input type="text" name="precoCusto" class="form-control" placeholder="Preço custo">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="precoSite" class="form-control" placeholder="Preço site">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="precoLoja" class="form-control" placeholder="Preço loja">
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-2">
                    <input type="text" name="peso" class="form-control" placeholder="Peso">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="altura" class="form-control" placeholder="Altura">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="largura" class="form-control" placeholder="Largura">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="comprimento" class="form-control" placeholder="Comprimento">
                </div>
            </fieldset>
            <br>
            <fieldset>

                <div class="col-xs-10">
                    <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"></textarea>
                </div>
            </fieldset>
            <br>
            <fieldset>

                <div class="col-xs-3">

                    <input type="radio" name="status" value="1" >
                    <label>Habilitado</label>
                </div>
                <div class="col-xs-6">
                    <input type="radio" name="status" value="0" checked="">
                    <label>Desabilitado</label>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-1">
                    <input type="text" name="<?= $atributos['0']['name'] ?>" class="form-control" placeholder="<?= $atributos['0']['name'] ?>">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="<?= $atributos['1']['name'] ?>" class="form-control" placeholder="<?= $atributos['1']['name'] ?>">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="<?= $atributos['2']['name'] ?>" class="form-control" placeholder="<?= $atributos['2']['name'] ?>">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="<?= $atributos['3']['name'] ?>" class="form-control" placeholder="<?= $atributos['3']['name'] ?>">
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-3">
                    <input type="text" name="<?= $atributos['5']['name'] ?>" class="form-control" placeholder="<?= $atributos['5']['name'] ?>">
                </div>
                <div class="col-xs-4">
                    <input type="text" name="<?= $atributos['6']['name'] ?>" class="form-control" placeholder="<?= $atributos['6']['name'] ?>">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="<?= $atributos['7']['name'] ?>" class="form-control" placeholder="<?= $atributos['7']['name'] ?>">
                </div>
            </fieldset>

            <br>
            <fieldset>
                <div class="col-sm-offset-9 col-sm-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

