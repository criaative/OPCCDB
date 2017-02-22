<?php
include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'select * from oc_category_description';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$categorias = $exec->fetchAll(PDO::FETCH_ASSOC);


$sql2 = 'SELECT 
    att.attribute_id, attd.name
FROM
    oc_attribute att
    left join oc_attribute_description attd on attd.attribute_id = att.attribute_id ';

$exec2 = $con->pdo()->prepare($sql2);
$exec2->execute();

$atributos = $exec2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = 'SELECT 
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

$exec3 = $con->pdo()->prepare($sql3);
$exec3->execute();

$dados3 = $exec3->fetchAll(PDO::FETCH_ASSOC);


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
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['0']['name'] ?>" class="form-control" placeholder="<?= $dados3['0']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['1']['name'] ?>" class="form-control" placeholder="<?= $dados3['1']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['2']['name'] ?>" class="form-control" placeholder="<?= $dados3['2']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['3']['name'] ?>" class="form-control" placeholder="<?= $dados3['3']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['4']['name'] ?>" class="form-control" placeholder="<?= $dados3['4']['name'] ?>">
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['5']['name'] ?>" class="form-control" placeholder="<?= $dados3['5']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['6']['name'] ?>" class="form-control" placeholder="<?= $dados3['6']['name'] ?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['7']['name'] ?>" class="form-control" placeholder="<?= $dados3['7']['name'] ?>">
                </div>
            
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['8']['name'] ?>" class="form-control" placeholder="<?= $dados3['8']['name'] ?>">
                </div>
            
                <div class="col-xs-2">
                    <input type="text" name="<?= $dados3['9']['name'] ?>" class="form-control" placeholder="<?= $dados3['9']['name'] ?>">
                </div>
            </fieldset>

            <br>
            <fieldset>
                <div class="col-sm-offset-8 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

