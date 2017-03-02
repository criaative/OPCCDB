$(document).ready(function () {

    carregaRegistros();

});

function carregaRegistros()
{
    $.getJSON('model/lista_produto.php', function (retorno) {

        $('#lista-produtos tbody').empty();

        retorno.forEach(function (obj, idx) {

            var tr = '<tr obj-id="' + obj.id + '">'
                    + '<td>' + obj.status + '</td>'
                    + '<td><img src="http://localhost/CasaDosBanners/image/' + obj.image + '" width="90%"></td>'
                    + '<td>' + obj.sku + '</td>'
                    + '<td>' + obj.produto + '</td>'
                    + '<td>' + obj.model + '</td>'
                    + '<td>' + obj.categoria + '</td>'
                    + '<td>' + obj.materia + '</td>'
                    + '<td>' + obj.preco_site + '</td>'
                    + '<td>' + obj.preco_loja + '</td>'

                    + '<td><a href="editarproduto.php?id=' + obj.id + '" data-toggle="modal">'
                    + '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>'
                    + '</a></td>'
                    + '</tr>';
            $('#lista-produtos tbody').append(tr);

        });

    });

}
