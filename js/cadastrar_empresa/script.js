$(document).ready(function() {
 
    $(function ($) {
        $("#Cnpj").mask("99.999.999/9999-99");
        $("#Cep").mask("99999-999");
        $("#Telefone").mask("(99) 9999-9999");
    }); 
  
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Selecione uma opção.");

    $("#dadosPessoais").validate({
        rules:{
                NumFunc: { 
                  valueNotEquals: "0",
                },
                AreaAtuacao: { 
                  valueNotEquals: "0",
                },
                Descricao: { 
                  required: true
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
                        required: true,
                        minlength: 8
                },
                Cnpj : { 
                        required: true, 
                        cnpj: 'both'
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
                },
                acceptTerms: {
                    required: true
                }

        },
        messages:{
                Email:{
                        required: "digite seu e-mail",
                        minlength: "informe um e-mail válido!"
                },
                acceptTerms: {
                    required: "você deve ler e aceitar os termos de uso para prosseguir"
                }
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
            $("#AreaAtuacao option[value='" + $("#slcdAreaAtuacao").attr('value') + "']").prop('selected',true);
            $('#AreaAtuacao').trigger('change');
            $("#NumFunc option[value='" + $("#slcdNumFunc").attr('value') + "']").prop('selected',true);
            $('#NumFunc').trigger('change');
            
       }
    });
   
    //Enviar Dados Empresa
    $('#Enviar').click(function(){
        if($("#dadosPessoais").valid()){
            $.ajax({
                url: "index.php?cadastrar_empresa",
                type: "GET",
                data: {IcadastroEmail:$('#Email').attr('value'),
                        IcadastroNome:$('#Nome').attr('value'),
                        IcadastroSenha:$('#Senha').attr('value'),
                        IcadastroTelefone:$('#Telefone').attr('value'),
                        IcadastroCnpj:$('#Cnpj').attr('value'),
                        IcadastroCep:$('#Cep').attr('value'),
                        IcadastroEndereco:$('#Endereco').attr('value'),
                        IcadastroBairro:$('#Bairro').attr('value'),
                        IcadastroNumero:$('#Numero').attr('value'),
                        IcadastroComplemento:$('#Complemento').attr('value'),
                        IcadastroCidade:$('#Cidade').attr('value'),
                        IcadastroEstado:$('#Estado').attr('value'),
                        IcadastroNumFunc:$('#NumFunc').attr('value'),
                        IcadastroAreaAtuacao:$('#AreaAtuacao').attr('value'),
                        IcadastroSite:$('#Site').attr('value'),
                        IcadastroDescricao:$('#Descricao').val(),
                        Edicao:$("#Edicao").attr("value")},
                success: function(data)
                {
                    if(data > 0){                        
                        if($("#Edicao").attr("value") != 1){
                            if(confirm('Cadastro efetuado com sucesso! Confirme em seu e-mail')){
                                window.location = "?ativar&Tipo=2&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
                            }else{
                                window.location = "?ativar&Tipo=2&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
                            }
                        }else{
                            if(confirm('Cadastro alterado com sucesso!')){
                                window.location = "?area_empresa";
                            }else{
                                window.location = "?area_empresa";
                            } 
                        }
                    }else{
                        alert('ERRO: Empresa já existente!');
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
                $("#Endereco").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
                $("#Cidade").val(unescape(resultadoCEP["cidade"]));
                $("#Bairro").val(unescape(resultadoCEP["bairro"]));
                $("#Estado").val(unescape(resultadoCEP["uf"]));
            }else{
                alert("Endereço não encontrado");
            }
        });				
    }			
}

