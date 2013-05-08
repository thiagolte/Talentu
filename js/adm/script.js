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
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogCat" ).dialog( "close" );
                }
            }
        });
    });
    
    $('.DeleteCategorias').live('click',function() {
        var anSelected = fnGetSelected(oCategorias);
        if ( anSelected.length !== 0 ) {
            if(confirm('Deseja deletar o intem selecionado?')){
                $.ajax({
                    url: "index.php?adm",
                    type: "GET",
                    data: {
                            DeleteCat: 1,
                            CodigoCat:anSelected.find('.codigo').val()
                           },
                    success: function(data)
                    {
                        if(data > 0){
                            oCategorias.fnDeleteRow( anSelected[0] );
                        }else{
                            alert('ERRO: tente novamente mais tarde');
                            oCategorias.fnDeleteRow( anSelected[0] );
                        }
                    }
                });
            } 
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
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogVag" ).dialog( "close" );
                }
            }
        });
    });
    
    $('.DeleteVagas').click( function() {
        var anSelected = fnGetSelected(oVagas);
        if ( anSelected.length !== 0 ) {
            oVagas.fnDeleteRow( anSelected[0] );
            if(confirm('Deseja deletar o intem selecionado?')){
                $.ajax({
                    url: "index.php?adm",
                    type: "GET",
                    data: {
                            DeleteVag: 1,
                            CodigoVag:anSelected.find('.codigo').val()
                           },
                    success: function(data)
                    {
                        if(data > 0){
                            oVagas.fnDeleteRow( anSelected[0] );
                        }else{
                            alert('ERRO: tente novamente mais tarde');
                            oVagas.fnDeleteRow( anSelected[0] );
                        }
                    }
                });
            } 
        }
    });
    
    var oVagas = $('#Vagas').dataTable({
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