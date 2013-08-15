$(document).ready(function() {
    //Enviar Dados CV
	var opt;
	$('.quest').click(function(){
		opt = 'y';
	});
    $('#Enviar').click(function(){
		if(!$('.questTxt').val()) {
			alert('Por favor, responda a questão');
		}else if(opt != 'y'){
			alert('Por favor, escolha entre SIM ou NÃO');
		}else {		
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
		}
    });
    
    $('#Cadastro').click(function(){
        window.location = "?cadastrar_cv";
    });
});