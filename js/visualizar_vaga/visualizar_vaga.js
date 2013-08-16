$(document).ready(function() {
	var opt;
	var quest1;
	var quest2;
	$('.quest').click(function(){
		opt = 'y';
	});
	
    $('#Enviar').click(function(){
		if($('input[type=radio]').hasClass('quest')){
			quest1 = 'n';
			if(opt != 'y'){
				alert('Por favor, escolha entre SIM ou NÃO');
			}else {
				quest1 = 's';
			}
		}else {
			quest1 = 's';
		}
		if($('textarea').hasClass('questTxt')){
			quest1 = 'n';
			if(!$('.questTxt').val()) {
				alert('Por favor, responda a questão');
			} else {
				quest1 = 's';
			}	
		}
		if(quest1 == 's'){
			cadastrar();
		}
    });
	
	//Enviar Dados CV 	
	function cadastrar(){
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
