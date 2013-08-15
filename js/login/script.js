	$(document).keyup(function(e) {
		if (e.keyCode == 13) {
			if($('#lLogin').val() == 'e-mail'){
				$('#lLogin').focus();
			}else if($('#lLogin').val() != ''){
				$('#lSenha').focus();
			}
			if($('#lSenha').val() != 'senha' && $('#lSenha').val() != ''){			
				$('#Entrar').trigger('click');	
			}
		}
	});

$(document).ready(function() {
    //Login
    $('#Entrar').click(function(){
        Login($('#lLogin').attr('value'),$('#lSenha').attr('value'));
    }) 

    //Logout
    $('#Sair').click(function(){
        Logout();
    })
    
     //Logout
    $('#ResetSenha').click(function(){
        $.ajax({
            url: "index.php?login",
            type: "GET",
            data: {ResetSenha:1,
                    Email:$('#lLogin').attr('value')},
            success: function(data)
            {
                if(data > 0){
                    alert('E-mail de restauração de senha enviado para seu e-mail.');
                }else{
                    alert('ERRO: Tente novamente mais tarde');
                }
            },
            error: function()
            {
                alert('ERRO: Tente novamente mais tarde');
            }
        });
    }) 

});

function Login($Login, $Senha){
    $.ajax({
        url: "index.php?cadastrar_cv",
        type: "GET",
        data: {Login:$Login,
                Senha:$Senha},
        success: function(data)
        {
            if(data > 0){
                window.location = "?area_usuario";
            }else{
                LoginEmpresa($Login, $Senha);
            }
        },
        error: function()
        {
            alert('ERRO, conecte novamente mais tarde');
        }
    });
 
}

function LoginEmpresa($Login, $Senha){
    $.ajax({
        url: "index.php?cadastrar_empresa",
        type: "GET",
        data: {Login:$Login,
                Senha:$Senha},
        success: function(data)
        {
            if(data > 0){
                window.location = "?area_empresa";
            }else{
                alert('ERRO: Usuário e/ou senha inválido(s)');
            }
        },
        error: function()
        {
            alert('ERRO, conecte novamente mais tarde');
        }
    });
}

function Logout(){
    $.ajax({
        url: "index.php?login",
        type: "GET",
        data: {Logout:1},
        success: function(data)
        {
            if(data > 0){
                window.location = "?index";
            }
        }
    }); 
}