<?php

include_once 'model/marcap.php';

include 'header/header.php';
?>

<div class="container">
    <h1 class="page-header">Produtos</h1>
    <div class="jumbotron">
        <form class="form-group" action="" method="POST" >
            <fieldset>
                <div class="col-xs-3">
                    <input type="text" name="produto" value="" placeholder="produto" class="form-control">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="Modelo" value="" placeholder="Modelo" class="form-control">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="categoria" value="" placeholder="categoria" class="form-control">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="status" value="" placeholder="status" class="form-control">
                </div>
                <div class="col-xs-1">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPesquisa">
                        Pesquisar
                    </button>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="table-responsive">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Produtos</h4></div>

            <table id="lista-produtos" class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="3"><a href="novo_produto.php">Novo Produto</a></th>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id="mcsite"><a href="marcap/mcpsite_action.php?site=<?= $mcpsite ?>"><?= $mcpsite ?></a></th>
                        <th id="mcsite"><a href="marcap/mcploja_action.php?loja=<?= $mcploja ?>"><?= $mcploja ?></a></th>
                        <th><a href="#" data-toggle="modal" data-target="#modalMarcap">Marcap</a></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th style=" width:5%">Status</th>
                        <th style=" width:5%">imag</th>
                        <th>cod</th>
                        <th>Produto</th>
                        <th>modelo</th>
                        <th>Categoria</th>
                        <th>custo</th>
                        <th>site</th>
                        <th>loja</th>
                        <th style=" width:2%">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>

                </tfoot>
            </table>

            <div class="panel-footer">Panel footer</div>
        </div>
    </div>
</div>
</div>

<!-- modal Marcap -->

<div class="modal fade" id="modalMarcap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alterar preço</h4>
            </div>
            <form action="marcap/marcap_edit.php?idpsite=<?= $idsite ?>&idploja=<?= $idloja ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputName2">marcap</label>
                        <input type="text" name="mcsite" class="form-control" id="exampleInputName2" placeholder="Marcap Site">
                    </div>
                    <div class="form-group">
                        <input type="radio" name="num" value="1" id="exampleInputEmail2" >
                        <label for="exampleInputEmail2">Marcap Site</label>

                        <input type="radio" name="num" value="2" id="exampleInputEmail3" >
                        <label for="exampleInputEmail3">Marcap Loja</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- editar produto -->
<div class="modal fade bs-example-modal-lg" id="ModalEditarproduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">



                <form method="Post" action="model/editarproduto_action.php">


                    <div class="row">
                        <div class="col-md-4">

                            <img src="http://localhost/CasaDosBanners/image/<?= $dados['0']['image'] ?>" width="300px" alt="..." class="img-rounded">
                            <br>
                            <br>
                            
                                <img src="http://localhost/CasaDosBanners/image/<?= $v['image'] ?>" width="100px" alt="..." class="img-rounded">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <fieldset>
                                    <div class="col-xs-2">
                                        <input type="hidden" id="id" name="id" value="" class="form-control">
                                        <input type="text"  name="cod" value="" class="form-control">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="produto" value="" class="form-control" placeholder="produto">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="modelo" value="" class="form-control" placeholder="modelo">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="estoque" value="" class="form-control" placeholder="estoque">
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <div class="col-xs-2">
                                        <select name="categoria" class="form-control">
                                            <option value="0">-------</option>
                                            
                                            <option value="" placeholder="categoria"></option>
                                            
                                        </select> 
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="precoCusto" value="" class="form-control" placeholder="preco Custo">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="precoSite" value="" class="form-control" placeholder="preco Site">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="precoLoja" value="" class="form-control" placeholder="preco Loja">
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <div class="col-xs-2">
                                        <input type="text" name="peso" value="" class="form-control" placeholder="peso">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="altura" value="" class="form-control" placeholder="altura">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="largura" value="" class="form-control" placeholder="largura">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="comprimento" value="" class="form-control" placeholder="comprimento">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <br>
                                    <div class="col-xs-10">
                                        <textarea type="text" name="descricao" class="form-control"></textarea>
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
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <div class="col-xs-2">
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" name="" class="form-control" value="">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">fecha</button>
            </div>
        </div>
    </div>
</div>


<!-- ModalPesquisa -->
<div class="modal fade bs-example-modal-lg" id="ModalPesquisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

                <table>
                    <thead>
                        <tr>

                            <th style=" width:40px">imag</th>
                            <th>cod</th>
                            <th>Produto</th>
                            <th>modelo</th>
                            <th>Categoria</th>
                            <th>custo</th>
                            <th>site</th>
                            <th>loja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesquisarProdutos AS $v) { ?>

                            <tr>
                                <td><img src="http://localhost/CasaDosBanners/image/<?= $v ['image'] ?>" width="90%"></td>
                                <td><?= $v['sku'] ?></td>
                                <td><a href="show_produto.php?id=<?= $v['id'] ?>"><strong><?= $v['produto'] ?></strong></a></td>
                                <td><?= $v['model'] ?></td>
                                <td><?= $v['categoria'] ?></td>
                                <td><?= $v['materia'] ?></td>
                                <td><?= $v['preco_site'] ?></td>
                                <td><?= $v['preco_loja'] ?></td>
                                <td><a href="editarproduto.php?id=<?= $v['id'] ?>" class="btn btn">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                                                                        <!-- <a href="model/delete_action.php?id=<?= $v['id'] ?>" class="btn btn">
                                                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">fecha</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
