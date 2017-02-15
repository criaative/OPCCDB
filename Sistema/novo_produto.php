<?php
include_once './conexao/conexao.php';

$con = new conexao();

$sql = 'select * from oc_category_description';

$exec = $con->pdo()->prepare($sql);
$exec->execute();

$dados = $exec->fetchAll(PDO::FETCH_ASSOC);


include 'header/header.php';
?>


<div class="container">
    <div class="form-group">
        <h2>Novo Produto</h2>


    </div>


    <!-- Form Name -->


    <form method="Post" action="action/novo_produto_action.php">


        <div class="row">
            <div class="col-md-4">

                <img src="image/image.jpg" width="350px" alt="..." class="img-rounded">
                <br>
                <br>
                <img src="image/image.jpg" width="100px" alt="..." class="img-rounded">
                <img src="image/image.jpg" width="100px" alt="..." class="img-rounded">
                <img src="image/image.jpg" width="100px" alt="..." class="img-rounded">

            </div>

            <div class="col-md-8">

                <div class="row">

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
                                <?php foreach ($dados as $v) { ?>
                                    <option value="<?= $v['category_id'] ?>"><?= $v['name'] ?></option>
                                <?php
                                } ?>
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
                    <fieldset>
                        <br>
                        <div class="col-xs-10">
                            <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <br>
                        <div class="col-xs-3">

                            <input type="radio" value="1" >
                            <label>Habilitado</label>
                        </div>
                        <div class="col-xs-6">
                            <input type="radio" value="0" checked="">
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
