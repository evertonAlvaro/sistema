$(function() {
    /*mascaras*/
    $(".mask_telefone").mask("(99)99999-999?9");
    $("#cep").mask("99999-999");
    /*Data*/
    $('#data_de_nascimento').datepicker({
        format: 'dd/mm/yyyy'
    }).mask("99/99/9999");

    /*post e tratamento de retorno*/
    $("#form_clientes").submit(function(event) {
        $("#envia").attr('disabled', 'disabled').text("Aguarde...");
        $.post('grava_clientes.php', $(this).serialize(), function(data, textStatus, xhr) {
            if (data == 0) {
                alert('Cadastro efetuado com sucesso');
                $("#form_clientes")[0].reset();
                location.reload();
            } else {
                alert(data);
            }
            $("#envia").removeAttr('disabled').text("Enviar");
        });
        return false;
    });
});

//função para preencher os dados de endereço
$("#btn_cep").click(function(event) {
    $(this).attr('disabled', 'disabled').text('Buscando...');
    //tratando cep
    var cep = $('#cep').val().replace("-","");
    //verificando largura e se só possui números
    if(cep.length == 8 && !isNaN(cep)){
        $.ajax({url: "http://cep.republicavirtual.com.br/web_cep.php?cep="+cep+"&formato=json", success: function(result){
            //tratando endereço
            var bairro = result.bairro.length > 0 ? result.bairro+", " : "" ;
            var cidade = result.cidade.length > 0 ? result.cidade : "" ; 
            var uf = result.uf.length > 0 ? " - "+result.uf : "" ;
            //endereço completo
            $("#endereco").val(bairro+cidade+uf);
            //console.log(result);
            $("#btn_cep").removeAttr('disabled').text('Buscar CEP');
        }});
    }   
    return false;
});