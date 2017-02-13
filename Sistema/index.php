<?php
include_once './conexao/lista_produto.php';
?>
<!DOCTYPE html>

<?php
include 'header/header.php';

echo $header;
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Produtos</h1>

          <!-- <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div> -->

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Marcap</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th id="mcsite"><?= $mcpsite ?></th>
                <th></th>
                <th><a href="new_produto.php" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                </th>
            </tr>
            <tr>
                <th style=" width:5%">cod</th>
                <th style="width:20%">Produto</th>
                <th style="width:20%">modelo</th>
                <th style="width:20%">Categoria</th>
                <th style="width:5%">custo</th>
                <th style="width:5%">site</th>
                <th style="width:5%">loja</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($dados AS $v) { ?>

                <tr>
                    <td><?= $v ['sku'] ?></td>
                    <td><?= $v ['name'] ?></td>
                    <td><?= $v ['model'] ?></td>
                    <td><?= $v ['categoria'] ?></td>
                    <td><?= $v ['materia'] ?></td>
                    <td><?= $v ['price'] ?></td>
                    <td><?= $v ['price'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#modalAtualizar"
                           class="btn btn-primary" onclick="alterarNome(
                                           '<?= $v ['product_id'] ?>',
                                           '<?= $v ['sku'] ?>',
                                           '<?= $v ['name'] ?>',
                                           '<?= $v ['model'] ?>',
                                           '<?= $v ['valormateria'] ?>',
                                           '<?= $v ['price'] ?>'
                                           )">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

        <!-- <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> -->
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

            <form action="conexao/marcap_edit.php?idpsite=<?= $idsite ?>" method="POST">
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
