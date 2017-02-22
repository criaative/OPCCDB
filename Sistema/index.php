<?php
include_once './model/lista_produto.php';

include 'header/header.php';
?>

<div class="container">
    <h1 class="page-header">Produtos</h1>


    <div class="table-responsive">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Produtos</h4></div>
            <table class="table table-striped">
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
                    </tr>
                    <tr>
                        <th>Status</th>
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
                    <?php foreach ($dados AS $v) { ?>

                        <tr>
                            <td><?php
                                if ($v['status'] == 0) {
                                    echo'<div>Offline</div>';
                                } else {
                                    echo '<div style="color: blue;">Online</div>';
                                };
                                ?></td>
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
