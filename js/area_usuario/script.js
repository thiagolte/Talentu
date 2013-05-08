$(document).ready(function() {
    $('#Congelar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_cv",
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
            url: "index.php?cadastrar_cv",
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
    
});