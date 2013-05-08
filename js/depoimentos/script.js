$(document).ready(function() {    
    
    CarregaDepoimentos();
    
    function CarregaDepoimentos(){
        //Get Depoimentos
        $.ajax({
           url: "index.php?depoimentos",
           data: {getDepoimentos:10},
           success: function(data)
           {
               $("#Depoimentos").append(data);
           }
        });
    }
    
    //Set Depoimentos
    $('#Criar').click(function(){
        $.ajax({
            url: "index.php?depoimentos",
            type: "GET",
            data: {IdepoimentoDepo:$('#textDepoimento').val()},
            success: function(data)
            {
                if(data > 0){
                    $(".testi_item").remove();
                    CarregaDepoimentos();
                }
            }
        });
    })    

});