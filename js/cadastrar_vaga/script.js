$(document).ready(function() {
	
	$("#Enviar").click(function(){
//		if($("#Email").val() == '') {
//			alert("Por favor, digite seu e-mail!");
//		} else if($("#Nome").val() == '') {
//			alert("Por favor, digite seu nome!");
//		}
	});

//	$(function ($) {
//        $("#qtdVagas").mask("9");
//    });		
  
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
			}
        }
    });
         
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

