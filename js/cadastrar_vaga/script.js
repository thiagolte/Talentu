$(document).ready(function() {
 
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
        $.ajax({
            url: "index.php?cadastrar_vaga",
            type: "GET",
            data: {ICadastro:$('#frmVagas').serializeObject()},
            success: function(data)
            {
                if(data > 0){
                    if($("#Edicao").attr("value") != 1){
                        alert('Vaga cadastrada com sucesso!');
                    }else{
                        alert('Vaga alterada com sucesso!');
                    }

                }else{
                    alert('ERRO: Contate o administrador');
                }
            }
        });
//        if($("#dadosPessoais").valid()){
//            $.ajax({
//                url: "index.php?cadastrar_cv",
//                type: "GET",
//                data: {Edicao:$("#Edicao").attr("value"),
//                        IcadastroCV:$('#CV').val()},
//                success: function(data)
//                {
//                    if(data > 0){
//                        if($("#Edicao").attr("value") != 1){
//                            if(confirm('Cadastro efetuado com sucesso! Confirme em seu e-mail')){
//                                window.location = "?ativar&Tipo=1&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
//                            }else{
//                                window.location = "?ativar&Tipo=1&Nome=" + $('#Nome').attr('value') + '&Email=' + $('#Email').attr('value');
//                            }
//                        }else{
//                            if(confirm('Cadastro alterado com sucesso!')){
//                                window.location = "?area_usuario";
//                            }else{
//                                window.location = "?area_usuario";
//                            } 
//                        }
//
//                    }else{
//                        alert('ERRO: Cadastro já existente!');
//                    }
//                }
//            });
//        }
//        return false;
    });  
});

