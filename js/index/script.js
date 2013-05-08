$(document).ready(function() {
	jQuery(function ($) {
        $("#cpf").mask("999.999.999-99");
    });
	
	$("#form_home").validate({
		rules:{
			nome:{
				required: true, minlength: 5
			},
			cpf : { 
				required: true, 
				cpf: 'both'
			},
			senha:{
				required: true, minlength: 5
			}
		},
		messages:{
			nome:{
				required: "digite seu nome",
				minlength: "seu nome deve ter no mínimo 5 caracteres"
			},
            senha:{
				required: "digite sua senha",
				minlength: "deve ter no mínimo 5 caracteres"
			}
		}
	});
	
	
	  
    //Cadastro    
    $('#Enviar').click(function() {
        if($("#form_home").valid()){
            window.location = "?cadastrar_cv&nome=" + $('#nome').attr('value') + "&cpf=" + $('#cpf').attr('value') + "&senha=" + $('#senha').attr('value');
        }
        return false;
    });
    
    //Depoimentos
    $.ajax({
       url: "index.php?index",
       data: {getDepoimentos:4},
       success: function(data)
       {
           $("#Depoimentos").append(data);
       }
    });

    //Login
    $('#Entrar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_cv",
            type: "GET",
            data: {Login:$('#Login').attr('value'),
                    Senha:$('#Senha').attr('value')},
            success: function(data)
            {
                if(data > 0){
                    window.location = "?depoimentos";
                }
            }
        });
    });
    
    $('.close_glass').on("click", function(){
        $(".glass_panel").hide();
    });
    
    $(".glass_panel").on("click", function(){
        $(".close_glass").trigger('click');
    });
                
    document.onkeyup = function (e) {
        if (e.which == 27) {
            $(".close_glass").trigger('click');
        }
    }
                         

});