$(document).ready(function() {
    if($('#Tipo').attr('value') == 1){
        $.ajax({
            url: "index.php?cadastrar_cv",
            type: "GET",
            data: {EmailConf:1,
                    Email:$('#Email').attr('value'),
                    Nome:$('#Nome').attr('value')
                    },
            success: function(data)
            {

            }
        });
    }else{
        $.ajax({
            url: "index.php?cadastrar_empresa",
            type: "GET",
            data: {EmailConf:1,
                    Email:$('#Email').attr('value'),
                    Nome:$('#Nome').attr('value')
                    },
            success: function(data)
            {

            }
        });
    }
});