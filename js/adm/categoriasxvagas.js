$(document).ready(function() {
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
});