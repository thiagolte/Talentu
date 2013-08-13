$(document).ready(function() {
    //USUÁRIOS
    $( "#dialogUsuario" ).dialog({
        autoOpen: false  
    });
    
    $('#NovoUsuario').click(function(){
        $('#EditarUsuario').hide();
        $('#SalvarUsuario').show();
        $( "#dialogUsuario" ).dialog( "open" );
    });

    $('#EditarUsuario').click(function(){
        var ativoUsuario = 0;
        var restSenha = 0;
        
        if($('#AtivoUsuario').prop('checked') == true){
            ativoUsuario = 1;
        }
        
        if($('#ResetSenhaUsuario').prop('checked') == true){
            restSenha = 1;
        }

        $.ajax({
            url: "index.php?adm",
            type: "GET",
            data: {
                    UpdateUsuario: 1,
                    CodigoUsuario: $('#CodigoUsuario').attr('value'),
                    NomeUsuario:$('#NomeUsuario').attr('value'),
                    EmailUsuario:$('#EmailUsuario').attr('value'),
                    ResetSenhaUsuario:restSenha,
                    AtivoUsuario:ativoUsuario
                   },
            success: function(data)
            {
                if(data > 0){
                    $( "#dialogUsuario" ).dialog( "close" );
                    document.location.reload(true);
                }else{
                    alert('ERRO: tente novamente mais tarde');
                    $( "#dialogUsuario" ).dialog( "close" );
                }
            }
        });
    });

    $('.EditUsuario').live('click',function() {
        var anSelected = fnGetSelected(oUsuario);
        if ( anSelected.length !== 0 ) {
            $('#SalvarUsuario').hide();
            $('#CodigoUsuario').attr('value',anSelected.find('.codigo').val());
            $('#NomeUsuario').attr('value',anSelected.find('.nome').val());
            $('#EmailUsuario').attr('value',anSelected.find('.email').val());

            if(anSelected.find('.ativo').val() == 'true'){
                $('#AtivoUsuario').prop('checked', true);
            }else{
                $('#AtivoUsuario').prop('checked', false);
            }

            $('#EditarUsuario').show();
            $( "#dialogUsuario" ).dialog( "open" );
        }
    });
        
    var oUsuario = $('#Usuario').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[60, 80, 100, -1], [60, 80, 100, "All"]],
        "iDisplayLength": 60
    });
});