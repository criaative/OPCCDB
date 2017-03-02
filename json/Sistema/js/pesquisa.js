$(document).ready(function () {

    pesquisaRegistros();

});

function pesquisaRegistros()
{

    $(document).ready(function ()
    {

        $('#bt-carregar').click(function ()
        {

           
            $.getJSON('model/pesquisa_produto.php', dados, function (retorno)
            {
                console.log(retorno);
                if (Array.isArray(retorno) == true)
                {

                    retorno.forEach(function (el, idx)
                    {

                        $('#lista-produtos tbody')
                                .append('<li>' + el.produto + ' - ' + el.sku + '</li>');

                    });
                } else {
                    $('#lista-usuarios')
                            .append('<li>' + retorno.nome + ' - ' + retorno.email + '</li>');
                }

            });

        });

    });
}
