$(document).ready(function() {
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
});