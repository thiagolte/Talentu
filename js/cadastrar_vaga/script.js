$(function() {

    $('.numbers').keypress(function(event) {
        var tecla = (window.event) ? event.keyCode : event.which;
        if ((tecla > 47 && tecla < 58)) return true;
        else {
            if (tecla != 8) return false;
            else return true;
        }
    });

});

$(document).ready(function() {
	
	$('#other_selected').click(function(){
		$(".other_mail").show();
	});
	
	$('#other_unSelected').click(function(){
		$(".other_mail").hide();
	});
	
	$('#outra').click(function(){
		$(".outra_empresa").show();
	});
	
	$('#mesma').click(function(){
		$(".outra_empresa").hide();
	});
	
	$('#salarioCombinar').click(function(){
		var self = $(this);
		if (self.attr('data-status') == 'show') {
			$("#salario").hide();
			$("#salario").attr('data-status', 'hide');
			self.attr('data-status', 'hide');
		}else {
			$("#salario").show();
			$("#salario").attr('data-status', 'show');
			self.attr('data-status', 'show');
		}
	});
	
	$("#Salvar").click(function(){
		if($("#CidadeEmpresa").val() == '') {
			alert("Por favor, digite a cidade da empresa!");
		}else if($("#EstadoEmpresa").val() == 0){			
			alert("Por favor, selecione o estado da empresa!");
		}else if($("#ramoAtuacao").val() == 0){			
			alert("Por favor, selecione o ramo de atuação da empresa!");
		}else if($("#porte").val() == 0){			
			alert("Por favor, selecione o porte da empresa!");
		}else if($("#quantidade").val() == '') {
			alert("Por favor, digite a quantidade de vagas!");
		}else if($("#atribuicoes").val() == '') {
			alert("Por favor, digite as atribuições da vaga!");
		}else if($("#experiencia").val() == '') {
			alert("Por favor, digite a experiência exigida na vaga!");
		}else if($("#escolaridade").val() == 0){			
			alert("Por favor, selecione a escolaridade para a vaga!");
		}else if($("#categoria").val() == 0){			
			alert("Por favor, selecione a categoria da vaga!");
		}else if($("#vaga").val() == 0){			
			alert("Por favor, selecione a vaga de atuação!");
		}else if($("#regimeContratacao").val() == 0){			
			alert("Por favor, selecione o regime de contratação da vaga!");
		}else if($("#beneficios").val() == '') {
			alert("Por favor, digite os benefícios da vaga!");
		}else if($("#regimeTrabalho").val() == '') {
			alert("Por favor, digite o regime de trabalho!");
		}else if($("#horario").val() == '') {
			alert("Por favor, digite o horário de trabalho!");
		}
			
			
			
			
			
	});	
	
	$("#salario").maskMoney({showSymbol:true, symbol:"R$ ", decimal:",", thousands:"."});
  
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Selecione uma opção.");

    $("#frmVagas").validate({
        rules:{
			porte: { 
				valueNotEquals: "0"
			},
			ramoAtuacao: { 
				valueNotEquals: "0"
			},
			regimeContratacao: {
				valueNotEquals: "0"
			},
			escolaridade: {
				valueNotEquals: "0"
			},
			categoria: {
				valueNotEquals: "0"
			},
			vaga: {
				valueNotEquals: "0"
			},
			EstadoEmpresa: {
				valueNotEquals: "0"
			},
			CidadeEmpresa: {
				required: true
			},
			EstadoEmpresa: {
				valueNotEquals: "0"
			},
			quantidade: {
				required: true
			},
			atribuicoes: {
				required: true
			},
			experiencia:{
				required: true
			},
			beneficios: {
				required: true
			},
			regimeTrabalho: {
				required: true			
			},
			horario: {
				required: true			
			}
        },
        messages:{
			porte: {
				valueNotEquals: "selecione o porta da empresa"
			},
			ramoAtuacao: {
				valueNotEquals: "selecione o ramo de atuação da empresa"
			},
			regimeContratacao: {
				valueNotEquals: "selecione o regime de contratação"
			},
			escolaridade: {
				valueNotEquals: "selecione a escolaridade"
			},
			categoria: {
				valueNotEquals: "selecione a categoria"
			},
			vaga: {
				valueNotEquals: "selecione a vaga"
			},
			CidadeEmpresa: {
				required: "informe a cidade",
			},
			EstadoEmpresa: {
				valueNotEquals: "Selecione o Estado"
			},
			quantidade: {
				required: "informe a quantidade de vagas"
			},
			atribuicoes: {
				required: "informe as atribuições"
			},
			experiencia:{
				required: "informe a experiência"
			},
			beneficios: {
				required: "informe os benefícios"
			},
			regimeTrabalho: {
				required: "informe o regime de trabalho"
			},
			horario: {
				required: "informe o horário de trabalho"
			}
						
        }
		
    });
	
	
	
//	if ($("#salarioCombinar").attr('data-status') == 'show') {
//		$("#frmVagas").validate({
//			rules:{
//				salario: {
//					required: true			
//				}
//			},
//			messages:{ 
//				salario: {
//					required: "informe o salário"
//				}	
//			}
//		});
//	}
         
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
          
    //Enviar Dados CV
    $('#Salvar').click(function(){
        if($("#frmVagas").valid()){
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
        }
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
    
    $("#EstadoEmpresa option[value='" + $("#slcEstadoEmpresa").attr('value') + "']").prop('selected',true);
    $("#confidencial option[value='" + $("#slcEmpresaConfidencial").attr('value') + "']").prop('selected',true);
    $("#ramoAtuacao option[value='" + $("#slcRamoAtuacao").attr('value') + "']").prop('selected',true);   
    $("#nacionalidade option[value='" + $("#slcNacionalidade").attr('value') + "']").prop('selected',true); 
    $("#porte option[value='" + $("#slcPorteEmpresa").attr('value') + "']").prop('selected',true);
    $("#escolaridade option[value='" + $("#slcEscolaridade").attr('value') + "']").prop('selected',true);
    $("#categoria option[value='" + $("#slcCategoria").attr('value') + "']").prop('selected',true);
    $('#categoria').trigger('change');
    $("#regimeContratacao option[value='" + $("#slcRegimeContratacao").attr('value') + "']").prop('selected',true);
    $("#horarioDe option[value='" + $("#slcHorarioDe").attr('value') + "']").prop('selected',true);
    $("#horarioAte option[value='" + $("#slcHorarioAte").attr('value') + "']").prop('selected',true);
    
    
    var dados = $("#slcFiltroFaixaEtaria").attr('value').split(',');
    dados.forEach(function (e) {
        $("#filtroFaixaEtaria option[value='" + e + "']").prop('selected',true);
    });
    
    var dados = $("#slcFiltroPretencaoSalarial").attr('value').split(',');
    dados.forEach(function (e) {
        $("#filtroPretensaoSalarial option[value='" + e + "']").prop('selected',true);
    });
    
    var dados = $("#slcFiltroPNE").attr('value').split(',');
    dados.forEach(function (e) {
        $("#filtroPNE option[value='" + e + "']").prop('selected',true);
    });
    
    var dados = $("#slcFiltroEstado").attr('value').split(',');
    dados.forEach(function (e) {
        $("#filtroEstado option[value='" + e + "']").prop('selected',true);
    });
    
    var dados = $("#slcFiltroCidade").attr('value').split(',');
    dados.forEach(function (e) {
        $("#filtroCidade option[value='" + e + "']").prop('selected',true);
    });
});

