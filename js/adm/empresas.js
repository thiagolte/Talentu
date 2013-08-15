$(document).ready(function() {
    //USUÁRIOS
    $( "#dialogEmpresa" ).dialog({
        autoOpen: false  
    });
    
    $('#NovoEmpresa').click(function(){
        $('#EditarEmpresa').hide();
        $('#SalvarEmpresa').show();
        $( "#dialogEmpresa" ).dialog( "open" );
    });

    $('#EditarEmpresa').click(function(){
        var ativoEmpresa = 0;
        var restSenha = 0;
        
        if($('#AtivoEmpresa').prop('checked') == true){
            ativoEmpresa = 1;
        }
        
        if($('#ResetSenhaEmpresa').prop('checked') == true){
            restSenha = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    UpdateEmpresa: 1,
                    CodigoEmpresa: $('#CodigoEmpresa').attr('value'),
                    NomeEmpresa:$('#NomeEmpresa').attr('value'),
                    EmailEmpresa:$('#EmailEmpresa').attr('value'),
                    RazaoEmpresa:$('#RazaoEmpresa').attr('value'),
                    FantasiaEmpresa:$('#FantasiaEmpresa').attr('value'),
                    CNPJEmpresa:$('#CNPJEmpresa').attr('value'),
                    TelefoneEmpresa:$('#TelefoneEmpresa').attr('value'),
                    ResetSenhaEmpresa:restSenha,
                    AtivoEmpresa:ativoEmpresa
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogEmpresa" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogEmpresa" ).dialog( "close" );
                }
            }
        });
    });

    $('.EditEmpresa').live('click',function() {
        var anSelected = fnGetSelected(oEmpresa);
        if ( anSelected.length !== 0 ) {
            $('#SalvarEmpresa').hide();
            $('#CodigoEmpresa').attr('value',anSelected.find('.codigo').val());
            $('#NomeEmpresa').attr('value',anSelected.find('.nome').val());
            $('#EmailEmpresa').attr('value',anSelected.find('.email').val());
            $('#RazaoEmpresa').attr('value',anSelected.find('.razao').val());
            $('#FantasiaEmpresa').attr('value',anSelected.find('.fantasia').val());
            $('#CNPJEmpresa').attr('value',anSelected.find('.cnpj').val());
            $('#TelefoneEmpresa').attr('value',anSelected.find('.telefone').val());

            if(anSelected.find('.ativo').val() == 'true'){
                $('#AtivoEmpresa').prop('checked', true);
            }else{
                $('#AtivoEmpresa').prop('checked', false);
            }

            $('#EditarEmpresa').show();
            $( "#dialogEmpresa" ).dialog( "open" );
        }
    });
        
    var oEmpresa = $('#Empresa').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[60, 80, 100, -1], [60, 80, 100, "All"]],
        "iDisplayLength": 60
    });
});