$(document).ready(function() {
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
});