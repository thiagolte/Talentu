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