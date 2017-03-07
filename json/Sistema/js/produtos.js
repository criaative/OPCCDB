$(document).ready(function () {

    carregaRegistros();

});

function carregaRegistros()
{
    $.getJSON('model/lista_produto.php', function (retorno) {

        $('#lista-produtos tbody').empty();
        retorno.forEach(function (obj, idx) {

         
            var tr = '<tr obj-id="' + obj.id + '">'
                    + '<td id="status">' + obj.status + '</td>'
                    + '<td><a href="etiqueta.php?id=' + obj.id + '"><img src="http://localhost/CasaDosBanners/image/' + obj.image + '" width="90%"></a></td>'
                    + '<td>' + obj.sku + '</td>'
                    + '<td><a href="show_produto.php?id=' + obj.id + '">' + obj.produto + '</a></td>'
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


    }
    );



}


