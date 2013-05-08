$(document).ready(function() {
  
    //Alterar Senha
    $('#Enviar').click(function(){
        if($("#re_pass").valid()){
            $.ajax({
                url: "index.php?alterar_senha",
                type: "GET",
                data: {
                        Senha:$('#Senha').attr('value')
                       },
                success: function(data)
                {
                    if(data > 0){
                        if(confirm('Senha Alterada com Sucesso!')){
                            window.location = "?index";
                        }else{
                            window.location = "?index";
                        }
                    }else{
                        alert('ERRO: tente novamente mais tarde')
                    }
                }
            });
        }
        return false;
    }); 
    
    
});
