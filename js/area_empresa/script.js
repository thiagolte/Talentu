$(document).ready(function() {
    $('#Congelar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_empresa",
            type: "GET",
            data: {Congelamento:0},
            success: function(data)
            {
                if(data > 0){
                    $('#Congelar').addClass('hide');
                    alert('Cadastro congelado com sucesso!')
                    $('#Descongelar').removeClass('hide');
                }
            }
        });
    });
    
    $('#Descongelar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_empresa",
            type: "GET",
            data: {Congelamento:1},
            success: function(data)
            {
                if(data > 0){
                    $('#Descongelar').addClass('hide');
                    alert('Cadastro descongelado com sucesso!')
                    $('#Congelar').removeClass('hide');
                }
            }
        });
    });
    
    $('.Desativar').click(function(){
        objDesativar = $(this);
        $.ajax({
            url: "index.php?cadastrar_vaga",
            type: "GET",
            data: {Desativar:$(this).attr('value')},
            success: function(data)
            {
                $('#div'+$(objDesativar).attr('value')).find('.Ativar').removeClass('hide');
                $(objDesativar).addClass('hide');
                alert('Desativado com sucesso!');
            }
        });
    });
    
    $('.Ativar').click(function(){
        objAtivar = $(this);
        $.ajax({
            url: "index.php?cadastrar_vaga",
            type: "GET",
            data: {Ativar:$(this).attr('value')},
            success: function(data)
            {
                $('#div'+$(objAtivar).attr('value')).find('.Desativar').removeClass('hide');
                $(objAtivar).addClass('hide');
                alert('Ativado com sucesso!');
            }
        });
    });
    
});