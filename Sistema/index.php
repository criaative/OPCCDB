<?php
include_once './select/lista_produto.php';

include 'header/header.php';
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Produtos</h1>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="3"><a href="novo_produto.php">Novo Produto</a></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Marcap</th>
                    <th id="mcsite"><a href="marcap/mcpsite_action.php?site=<?= $mcpsite ?>"><?= $mcpsite ?></a></th>
                    <th id="mcsite"><a href="marcap/mcploja_action.php?loja=<?= $mcploja ?>"><?= $mcploja ?></a></th>
                    <th></th>
                </tr>
                <tr>
                    <th style=" width:5%">Status</th>
                    <th style=" width:2%">id</th>
                    <th style=" width:3%">cod</th>
                    <th style="width:20%">Produto</th>
                    <th style="width:15%">modelo</th>
                    <th style="width:15%">Categoria</th>
                    <th style="width:5%">custo</th>
                    <th style="width:5%">site</th>
                    <th style="width:5%">loja</th>
                    <th style="width:15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados AS $v) { ?>

                    <tr>
                        <td><?php
                            if ($v['status'] == 0) {
                                echo'<div style="color: red;">Offline</div>';
                            } else {
                                echo '<div style="color: blue;">Online</div>';
                            };
                            ?></td>
                        <td><?= $v ['id'] ?></td>
                        <td><?= $v ['sku'] ?></td>
                        <td><?= $v ['produto'] ?></td>
                        <td><?= $v ['model'] ?></td>
                        <td><?= $v ['categoria'] ?></td>
                        <td><?= $v ['materia'] ?></td>
                        <td><?= $v ['preco_site'] ?></td>
                        <td><?= $v ['preco_loja'] ?></td>
                        <td><a href="editarproduto.php?id=<?= $v ['id'] ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                <a href="action/delete_action.php?id=<?= $v ['id'] ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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

                        <input type="radio" name="num" value="2" id="exampleInputEmail2" >
                        <label for="exampleInputEmail2">Marcap Loja</label>
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
