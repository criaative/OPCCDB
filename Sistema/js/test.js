function alterarNome( product_id, sku, name, model, valormateria, price)
{
    $('#alterarId').val(product_id)
    $('#alterarSku').val(sku)
    $('#alterarProduto').val(name)
    $('#alterarModel').val(model)
    $('#alterarMateria').val(valormateria)
    $('#alterarPrecoSite').val(price)
    
    
     
}

function somaProduto(){
    
    var mprima = document.getElementById(alterarMateria) 
    var mcsite = document.getElementById(mcsite)
    var soma = document.getElementById(alterarPrecoSite)
    var soma = parseInt(mprima) * parseInt(mcsite)
    
    
}