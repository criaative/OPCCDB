<?php
include_once 'model/marcap.php';

include 'header/header.php';
?>

<div class="container">
    <h1 class="page-header">Produtos</h1>
    <div class="jumbotron">
        <form class="form-group" action="model/pesquisa_produto.php" method="POST" >
            <fieldset>
                <div class="col-xs-3">
                    <input type="checkbox" name="pesquisa" value="produto" placeholder="produto">
                    <label for="">produto</label>
                </div>
                <div class="col-xs-3">
                    <input type="checkbox" name="pesquisa" value="produto" placeholder="produto">
                    <label for="">produto</label>
                </div>
                <div class="col-xs-3">
                    <input type="checkbox" name="pesquisa" value="produto" placeholder="produto">
                    <label for="">produto</label>
                </div>
                <div class="col-xs-3">
                    <input type="checkbox" name="pesquisa" value="produto" placeholder="produto">
                    <label for="">produto</label>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="col-xs-3">
                    <input type="text" name="valor" value="" placeholder="produto" class="form-control">
                </div>
                <div class="col-xs-1">
                    <!-- Button trigger modal -->
                    <button type="button" id="bt-carregar" class="btn btn-primary">
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

</body>
</html>
