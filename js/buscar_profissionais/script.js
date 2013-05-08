$(document).ready(function() {
 
    //Estados
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getEstados:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Estado").append(new Option(dados.Nome, dados.Nome));
            });
       }
    });
   
    //Cidades
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getCidades:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Cidade").append(new Option(dados.Nome, dados.Nome));
            });
       }
    });
   
    //Pretenções
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getPretencao:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Pretencao").append(new Option(dados.Nome, dados.Codigo));
            });
       }
    });
    
    //Areas
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getCategorias:1},
       success: function(data)
       {
            data.forEach(function(dados){
                $("#Areas").append(new Option(dados.Nome, dados.Codigo));
            });
       }
    });
    
    //Vagas
    $('#Areas').change(function(){
        $.ajax({
           dataType: "json",
           url: "index.php?cadastrar_cv",
           data: {getVagas:$("#Areas").attr('value')},
           success: function(data)
           {
                $("#Vaga option").remove();
                $("#Vaga").append(new Option('Selecione', 0));
                data.forEach(function(dados){
                    $("#Vaga").append(new Option(dados.Nome, dados.Codigo));
                });
                $("#Vaga option[value='0']").prop('selected',true);
           }
        });
    });
    
    //PNE
    $.ajax({
       dataType: "json",
       url: "index.php?cadastrar_cv",
       data: {getPNE:1},
       success: function(data)
       {
           data.forEach(function(dados){
               $("#PNE").append(new Option(dados.Nome, dados.Codigo));
           });
       }
    });
    
    
    //Pesquisa    
    $('#Enviar').click(function() {
        //if($("#form_home").valid()){
            window.location = "?resultados_usuario&Psexo=" + $('#Sexo').attr('value') + 
                "&Pestado=" + $('#Estado').attr('value') + 
                "&PareaInteresse=" + $('#Areas').attr('value') +
                "&Pvaga=" + $('#Vaga').attr('value') +
                "&PfaixaEstaria=" + $('#Idade').attr('value') + 
                "&Pcidade=" + $('#Cidade').attr('value') + 
                "&Ppretencao=" + $('#Pretencao').attr('value') +
                "&Ppalavra=" + $('#Palavra').attr('value') +
                "&Ppne=" + $('#PNE').attr('value');
        //}
        return false;
    });
    
});

