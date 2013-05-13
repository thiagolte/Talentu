$(document).ready(function() {
  
    $( "#tabs" ).tabs();
          
    //Alterar Senha
    $('#Entrar').click(function(){
        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    Login:$('#Login').attr('value'),
                    Senha:$('#Senha').attr('value')
                   },
            success: function(data)
            {
                if(data > 0){
                    window.location = "?adm";
                }else{
                    alert('ERRO: tente novamente mais tarde')
                }
            }
        });
    });

    //CATEGORIAS
    $( "#dialogCat" ).dialog({
        autoOpen: false  
    });
    
    $('#NovoCat').click(function(){
        $('#EditarCat').hide();
        $('#SalvarCat').show();
        $( "#dialogCat" ).dialog( "open" );
    });
    
    $('#SalvarCat').click(function(){
        var ativoCat = 0;
        
        if($('#AtivoCat').prop('checked') == true){
            ativoCat = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    SetCat: 1,
                    NomeCat:$('#NomeCat').attr('value'),
                    AtivoCat:ativoCat
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogCat" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogCat" ).dialog( "close" );
                }
            }
        });
    });
    
    $('#EditarCat').click(function(){
        var ativoCat = 0;
        
        if($('#AtivoCat').prop('checked') == true){
            ativoCat = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    UpdateCat: 1,
                    CodigoCat: $('#CodigoCat').attr('value'),
                    NomeCat:$('#NomeCat').attr('value'),
                    AtivoCat:ativoCat
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogCat" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogCat" ).dialog( "close" );
                }
            }
        });
    });

    $('.EditCategorias').live('click',function() {
        var anSelected = fnGetSelected(oCategorias);
        if ( anSelected.length !== 0 ) {
            $('#SalvarCat').hide();
            $('#CodigoCat').attr('value',anSelected.find('.codigo').val());
            $('#NomeCat').attr('value',anSelected.find('.nome').val());

            if(anSelected.find('.ativo').val() == 'true'){
                $('#AtivoCat').prop('checked', true);
            }else{
                $('#AtivoCat').prop('checked', false);
            }

            $('#EditarCat').show();
            $( "#dialogCat" ).dialog( "open" );
        }
    });
        
    var oCategorias = $('#Categorias').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[60, 80, 100, -1], [60, 80, 100, "All"]],
        "iDisplayLength": 60
    });
    
    
    
    //VAGAS
    $( "#dialogVag" ).dialog({
        autoOpen: false  
    });
    
    $('#NovoVag').click(function(){
        $('#EditarVag').hide();
        $('#SalvarVag').show();
        $( "#dialogVag" ).dialog( "open" );
    });
    
    $('#SalvarVag').click(function(){
        var ativoVag = 0;
        
        if($('#AtivoVag').prop('checked') == true){
            ativoVag = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    SetVag: 1,
                    NomeVag:$('#NomeVag').attr('value'),
                    AtivoVag:ativoVag
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogVag" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogVag" ).dialog( "close" );
                }
            }
        });
    });

    $('#EditarVag').click(function(){
        var ativoVag = 0;
        
        if($('#AtivoVag').prop('checked') == true){
            ativoVag = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    UpdateVag: 1,
                    CodigoVag: $('#CodigoVag').attr('value'),
                    NomeVag:$('#NomeVag').attr('value'),
                    AtivoVag:ativoVag
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogVag" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogVag" ).dialog( "close" );
                }
            }
        });
    });

    $('.EditVagas').live('click',function() {
        var anSelected = fnGetSelected(oVagas);
        if ( anSelected.length !== 0 ) {
            $('#SalvarVag').hide();
            $('#CodigoVag').attr('value',anSelected.find('.codigo').val());
            $('#NomeVag').attr('value',anSelected.find('.nome').val());

            if(anSelected.find('.ativo').val() == 'true'){
                $('#AtivoVag').prop('checked', true);
            }else{
                $('#AtivoVag').prop('checked', false);
            }

            $('#EditarVag').show();
            $( "#dialogVag" ).dialog( "open" );
        }
    });
    
    var oVagas = $('#Vagas').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[60, 80, 100, -1], [60, 80, 100, "All"]],
        "iDisplayLength": 60
    });

    

   //CATEGORIAS+VAGAS
    $( "#dialogCatVag" ).dialog({
        autoOpen: false  
    });
    
    $('#NovoCatVag').click(function(){
        $('#EditarCatVag').hide();
        $('#SalvarCatVag').show();
        $( "#dialogCatVag" ).dialog( "open" );
    });
    
    $('#SalvarCatVag').click(function(){
        var ativoCatVag = 0;
        
        if($('#AtivoCatVag').prop('checked') == true){
            ativoCatVag = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    SetCatVag: 1,
                    CodigoCat:$('#CodigoCat_catvag').val(),
                    CodigoVag:$('#CodigoVag_catvag').val(),
                    AtivoCatVag:ativoCatVag
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogCatVag" ).dialog( "close" );
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogCatVag" ).dialog( "close" );
                }
            }
        });
    });

    $('#EditarCatVag').click(function(){
        var ativoCatVag = 0;
        
        if($('#AtivoCatVag').prop('checked') == true){
            ativoCatVag = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    UpdateCatVag: 1,
                    CodigoCatVag: $('#CodigoCatVag').attr('value'),
                    CodigoCat:$('#CodigoCat_catvag').val(),
                    CodigoVag:$('#CodigoVag_catvag').val(),
                    AtivoCatVag:ativoCatVag
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogCatVag" ).dialog( "close" );
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogCatVag" ).dialog( "close" );
                }
            }
        });
    });

    $('.EditCatVag').live('click',function() {
        var anSelected = fnGetSelected(oCatVag);
        if ( anSelected.length !== 0 ) {
            $('#SalvarCatVag').hide();
            $('#CodigoCatVag').attr('value',anSelected.find('.codigo').val());
            $("#CodigoCat_catvag option[value='" + anSelected.find('.codigoCat').val() + "']").prop('selected',true);
            $("#CodigoVag_catvag option[value='" + anSelected.find('.codigoVag').val() + "']").prop('selected',true);

            if(anSelected.find('.ativo').val() == 'true'){
                $('#AtivoCatVag').prop('checked', true);
            }else{
                $('#AtivoCatVag').prop('checked', false);
            }

            $('#EditarCatVag').show();
            $( "#dialogCatVag" ).dialog( "open" );
        }
    });
    
    var oCatVag = $('#CatVag').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[60, 80, 100, -1], [60, 80, 100, "All"]],
        "iDisplayLength": 60
    });









    /* Add a click handler to the rows - this could be used as a callback */
    $(".DataTable tbody tr").live('click',function( e ) {
        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
            $(this).find('td .menu').removeClass('show').addClass('hide');
        }
        else {
            $('.DataTable tr.row_selected').find('td .menu').removeClass('show').addClass('hide');
            $('.DataTable tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
            $(this).find('td .menu').removeClass('hide').addClass('show');
        }
    });
 
});

/* Get the rows which are currently selected */
function fnGetSelected( oTableLocal )
{
    return oTableLocal.$('tr.row_selected');
}