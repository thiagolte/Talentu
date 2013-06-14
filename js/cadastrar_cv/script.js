$(document).ready(function() {
	
	$("#Enviar").click(function(){
		if($("#Email").val() == '') {
			alert("Por favor, digite seu e-mail!");
		} else if($("#Nome").val() == '') {
			alert("Por favor, digite seu nome!");
		} else if($("#Senha").val() == '') {
			alert("Por favor, digite sua senha!");
		} else if($("#DataNasci").val() == '') {
			alert("Por favor, digite sua data de nascimento!");
		} else if($("#Celular").val() == '') {
			alert("Por favor, digite sua nro de celular!");
		} else if($("#Telefone").val() == '') {
			alert("Por favor, digite seu telefone!");
		} else if($("#Cep").val() == '') {
			alert("Por favor, digite seu CEP!");
		} else if($("#Cpf").val() == '') {
			alert("Por favor, digite seu CPF!");
		} else if($("#Endereco").val() == '') {
			alert("Por favor, digite seu endereco!");
		} else if($("#Numero").val() == '') {
			alert("Por favor, digite o nro do seu endereco!");
		} else if($("#Bairro").val() == '') {
			alert("Por favor, digite o nro do seu bairro!");
		} else if($("#Pretencao").val() == 0) {
			alert("Por favor, selecione sua pretensão salarial!");
		} else if($("#Grau").val() == 0) {
			alert("Por favor, selecione seu grau de escolaridade!");
		} else if($("#EstadoCivil").val() == 0) {
			alert("Por favor, selecione seu estado civil!");
		} else if($("#Sexo").val() == 0) {
			alert("Por favor, selecione seu sexo!");
		} else if($("#Categoria1").val() == 0) {
			alert("Por favor, selecione sua categoria de emprego!");
		}
	});

	$(function ($) {
        $("#DataNasci").mask("99/99/9999");
        $("#Cpf").mask("999.999.999-99");
        $("#Cep").mask("99999-999");
        $("#Telefone").mask("(99) 9999-9999");
        $('#Celular')  
          .mask("(99) 9999-9999?9")  
          .live('focusout', function (event) {  
              var target, phone, element;  
              target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
              phone = target.value.replace(/\D/g, '');  
              element = $(target);  
              element.unmask();  
              if(phone.length > 10) {  
                  element.mask("(99) 99999-999?9");  
              } else {  
                  element.mask("(99) 9999-9999?9");  
              }  
          }); 
    });		
  
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Selecione uma opção.");

    $("#dadosPessoais").validate({
        rules:{
                Pretensao: { 
                  valueNotEquals: "0",
                },
                Grau: { 
                  valueNotEquals: "0",
                },
                EstadoCivil: { 
                  valueNotEquals: "0",
                },
                Sexo: { 
                  valueNotEquals: "0",
                },
                Categoria1: {
                  valueNotEquals: "0",
                },
                Email:{
                        required: true,
                        email: true
                },
                Nome:{
                        required: true
                },
                Senha: {
                        required: true,
                        minlength: 5
                },
                reSenha: {
                        required: true,
                        equalTo: "#Senha"	
                },
                DataNasci:{
                        required: true
                },
                Celular: {
                        required: true
                },
                Cpf : { 
                        required: true, 
                        cpf: 'both'
                },
                Telefone:{
                        required: true,
                        minlength: 8
                },
                Cep:{
                        required: true
                },
                Endereco: {
                        required: true
                },
                Numero: {
                        required: true
                },
                Bairro: {
                        required: true
                },
                Cidade: {
                        required: true
                },
                Estado: {
                        required: true
                }

        },
        messages:{
                Email:{
                        required: "digite seu e-mail",
                        minlength: "informe um e-mail válido!"
                },
                Nome:{
                        required: "digite seu nome"
                },
                Senha: {
                        required: "digite uma senha",
                        minlength: "deve ter no mínimo 5 caracteres"
                },
                reSenha: {
                        required: "repita sua senha!",
                        equalTo: "repita sua senha corretamente!"	
                },
                DataNasci:{
                        required: "digite sua data de nascimento"
                },
                Celular: {
                        required: "digite o número do seu celular"
                }
        }
    });

    
 
    //Pretenção Salarial
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getPretencao:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Pretencao").append(new Option(dados.Nome, dados.Codigo));
            });
            $("#Pretencao option[value='" + $("#slcdPretencao").attr('value') + "']").prop('selected',true);
       }
    });
  
    //Grau
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getGrau:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Grau").append(new Option(dados.Nome, dados.Codigo));
            });
            $("#Grau option[value='" + $("#slcdGrau").attr('value') + "']").prop('selected',true);
       }
    });
    
    //Estados Civis
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getEstadosCivis:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#EstadoCivil").append(new Option(dados.Nome, dados.Codigo));
            });
            $("#EstadoCivil option[value='" + $("#slcdEstadoCivil").attr('value') + "']").prop('selected',true);
       }
    });
    
    //Sexos
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getSexos:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Sexo").append(new Option(dados.Nome, dados.Codigo));
            });
            $("#Sexo option[value='" + $("#slcdSexo").attr('value') + "']").prop('selected',true);
       }
    });
    
    //Categorias
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getCategorias:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $(".Categorias").append(new Option(dados.Nome, dados.Codigo));
            });
            $("#Categoria1 option[value='" + $("#slcdCategoria1").attr('value') + "']").prop('selected',true);
            $('#Categoria1').trigger('change');
            $("#Categoria2 option[value='" + $("#slcdCategoria2").attr('value') + "']").prop('selected',true);
            $('#Categoria2').trigger('change');
            $("#Categoria3 option[value='" + $("#slcdCategoria3").attr('value') + "']").prop('selected',true);
            $('#Categoria3').trigger('change');
       }
    });
    
    //Vaga1
    $('#Categoria1').change(function(){
        $.ajax({
           dataType: "json",
           url: "index.php?cadastrar_cv",
           data: {getVagas:$('#Categoria1').attr('value')},
           success: function(data)
           {
                $("#Vaga1 option").remove();
                $("#Vaga1").append(new Option('Selecione', 0));
                data.forEach(function(dados){
                    $("#Vaga1").append(new Option(dados.Nome, dados.Codigo));
                });
                $("#Vaga1 option[value='" + $("#slcdVaga1").attr('value') + "']").prop('selected',true);
           }
        });
    });
    
    $("#TempoExperiencia1 option[value='" + $("#slcdTempo1").attr('value') + "']").prop('selected',true);
    
    //Vaga2
    $('#Categoria2').change(function(){
        $.ajax({
           dataType: "json",
           url: "index.php?cadastrar_cv",
           data: {getVagas:$('#Categoria2').attr('value')},
           success: function(data)
           {
                $("#Vaga2 option").remove();
                $("#Vaga2").append(new Option('Selecione', 0));
                data.forEach(function(dados){
                    $("#Vaga2").append(new Option(dados.Nome, dados.Codigo));
                });
                $("#Vaga2 option[value='" + $("#slcdVaga2").attr('value') + "']").prop('selected',true);
           }
        });
    });
    
    $("#TempoExperiencia2 option[value='" + $("#slcdTempo2").attr('value') + "']").prop('selected',true);
    
    //Vaga3
    $('#Categoria3').change(function(){
        $.ajax({
           dataType: "json",
           url: "index.php?cadastrar_cv",
           data: {getVagas:$('#Categoria3').attr('value')},
           success: function(data)
           {
                $("#Vaga3 option").remove();
                $("#Vaga3").append(new Option('Selecione', 0));
                data.forEach(function(dados){
                    $("#Vaga3").append(new Option(dados.Nome, dados.Codigo));
                });
                $("#Vaga3 option[value='" + $("#slcdVaga3").attr('value') + "']").prop('selected',true);
           }
        });
    });
    
    $("#TempoExperiencia3 option[value='" + $("#slcdTempo3").attr('value') + "']").prop('selected',true);

    if($("#slcdPNE").attr('value') > 0){
       $("#ePne option[value='1']").prop('selected',true); 
       $('.PNE').toggle();
       $("#PNE option[value='" + $("#slcdPNE").attr('value') + "']").prop('selected',true);
    }

    $('#Enviar_Email').click(function(){
        $.ajax({
            url: "index.php?cadastrar_cv",
            type: "GET",
            data: {IEmail:$('#emailEnvio').val(),
                    IMsgEmail:$('.text_htm').val(),
                    IEnvEmail:'1'
                    },
            success: function(data)
            {
                if(data > 0){
                    alert('Mensagem enviada com sucesso!')
                }else{
                    alert('ERRO: Envie novamente mais tarde!');
                }
            }
        });
    });
     
    //Enviar Dados CV
    $('#Enviar').click(function(){
        if($("#dadosPessoais").valid()){
            $.ajax({
                url: "index.php?cadastrar_cv",
                type: "GET",
                data: {IcadastroEmail:$('#Email').attr('value'),
                        IcadastroNome:$('#Nome').attr('value'),
                        IcadastroSenha:$('#Senha').attr('value'),
                        IcadastroDatanasci:$('#DataNasci').attr('value'),
                        IcadastroTelefone:$('#Telefone').attr('value'),
                        IcadastroCelular:$('#Celular').attr('value'),
                        IcadastroCpf:$('#Cpf').attr('value'),
                        IcadastroCep:$('#Cep').attr('value'),
                        IcadastroEndereco:$('#Endereco').attr('value'),
                        IcadastroBairro:$('#Bairro').attr('value'),
                        IcadastroNumero:$('#Numero').attr('value'),
                        IcadastroComplemento:$('#Complemento').attr('value'),
                        IcadastroCidade:$('#Cidade').attr('value'),
                        IcadastroEstado:$('#Estado').attr('value'),
                        IcadastroPretencao:$('#Pretencao').attr('value'),
                        IcadastroGrau:$('#Grau').attr('value'),
                        IcadastroEstadoCivil:$('#EstadoCivil').attr('value'),
                        IcadastroSexo:$('#Sexo').attr('value'),
                        IcadastroCat1:$("#Categoria1").attr("value"),
                        IcadastroVag1:$("#Vaga1").attr("value"),
                        IcadastroTempEx1:$("#TempoExperiencia1").attr("value"),
                        IcadastroCat2:$("#Categoria2").attr("value"),
                        IcadastroVag2:$("#Vaga2").attr("value"),
                        IcadastroTempEx2:$("#TempoExperiencia2").attr("value"),
                        IcadastroCat3:$("#Categoria3").attr("value"),
                        IcadastroVag3:$("#Vaga3").attr("value"),
                        IcadastroTempEx3:$("#TempoExperiencia3").attr("value"),
                        IcadastroPNE:$("#PNE").attr("value"),
                        IcadastroPNEDetalhes:$("#PNEdetalhes").attr("value"),
                        Edicao:$("#Edicao").attr("value"),
                        IcadastroCV:$('#CV').val()},
                success: function(data)
                {
                    if(data > 0){
                        if($("#Edicao").attr("value") != 1){
                            if(confirm('Cadastro efetuado com sucesso! Confirme em seu e-mail')){
                                window.location = "?ativar&Tipo=1&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
                            }else{
                                window.location = "?ativar&Tipo=1&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
                            }
                        }else{
                            if(confirm('Cadastro alterado com sucesso!')){
                                window.location = "?area_usuario";
                            }else{
                                window.location = "?area_usuario";
                            } 
                        }

                    }else{
                        alert('ERRO: Cadastro já existente!');
                    }
                }
            });
        }
        return false;
    });  
	
	
});


function getEndereco() {
    if($.trim($("#Cep").val()) != ""){
        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#Cep").val(), function(){
            if(resultadoCEP["resultado"]){
                $("#Endereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                $("#Cidade").val(unescape(resultadoCEP["cidade"]));
                $("#Bairro").val(unescape(resultadoCEP["bairro"]));
                $("#Estado").val(unescape(resultadoCEP["uf"]));
            }else{
                alert("Endereço não encontrado");
            }
        });				
    }			
}



