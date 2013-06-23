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
                $("#vaga").append(new Option('Selecione', 0));
                data.forEach(function(dados){
                    $("#vaga").append(new Option(dados.Nome, dados.Codigo));
                });
                $("#vaga option[value='" + $("#slcVaga").attr('value') + "']").prop('selected',true);
           }
        });
    });
    
    
    //Pesquisa    
    $('#Enviar').click(function() {
        window.location = "?resultados_vagas&IBusca=1&" + $('#frmBusca').serialize();
    });
    
});

