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
                $("#vaga option[value='" + $("#slcdVaga").attr('value') + "']").prop('selected',true);
           }
        });
    });
          
    //Enviar Dados CV
    $('#Salvar').click(function(){
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
    
    $('#Editar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_vaga",
            type: "GET",
            data: { ECadastro: $('#frmVagas').serializeObject() },
            success: function(data)
            {
                if(data > 0){
                    alert('Vaga alterada com sucesso!');
                }else{
                    alert('ERRO: Contate o administrador');
                }
            }
        });
    });  
});

