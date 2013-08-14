$(document).ready(function() {
    //Enviar Dados CV
    $('#Enviar').click(function(){
        $.ajax({
            url: "index.php?cadastrar_vaga",
            type: "GET",
            data: { ICadidatar: $('#frmVaga').serializeObject() },
            success: function(data)
            {
                if(data > 0){
                        alert('Candidatado com sucesso!');
                }else{
                        alert('ERRO: Contate o administrador');
                }
            }
        });
    });
    
    $('#Cadastro').click(function(){
        window.location = "?cadastrar_cv";
    });
});