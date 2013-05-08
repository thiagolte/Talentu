$(document).ready(function() {
	function submit_values() {
		var nome = $("#nome").val();
		var cpf = $("#cpf").val();
		var senha = $("#senha").val();

		if($("#nome").val().length == 0 || $("#cpf").val().length == 0 || $("#senha").val().length == 0){
		  alert("Favor preencher todos os campos!");
		}else {
			$("#enviar_dados").attr('href', 'http://talentu.com.br/?cadastrar_cv&nome='+nome+'&cpf='+cpf+'&senha='+senha);
			$("#nome").val("");
			$("#cpf").val("");
			$("#senha").val("");
		}
	}
	
	$("#enviar_dados").click(submit_values);
});