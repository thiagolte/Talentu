$(document).ready(function() {
 
         //Vaga
    $('#categoria').change(function(){
        $.ajax({
           dataType: "json",
           url: "index.php?cadastrar_cv",
           data: {getVagas:$('#categoria').attr('value')},
           success: function(data)
           {
                $("#vaga option").remove();
                data.forEach(function(dados){
                    $("#vaga").append(new Option(dados.Nome, dados.Codigo));
                });
                // $("#vaga option[value='" + $("#slcVaga").attr('value') + "']").prop('selected',true);
           }
        });
    });
    
    
    //Pesquisa    
    $('#Enviar').click(function() {
        $.ajax({
                url: "index.php?cadastrar_vaga",
                type: "GET",
                data: { ICadastro: $('#frmVagas').serializeObject() },
                success: function(data)
                {
                        if(data > 0){
                                alert('Vaga cadastrada com sucesso!');
                        }else{
                                alert('ERRO: Contate o administrador');
                        }
                }
        });
    });
    
});

