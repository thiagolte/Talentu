<?php

$to = 'contato@talentu.com.br';
//$to = 'vieira@umanni.com.br';
//$to = 'jeanpreis@gmail.com';

$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);
$telefono = utf8_decode($_POST['telefono']);
$assunto = utf8_decode($_POST['assunto']);
$mensagem = utf8_decode($_POST['mensagem']);

$subject  = "Formulario de contato (Talentu)";

$msg  = empty($nome) ? "" : "<strong>nome:</strong> $nome <br />";
$msg .= empty($email) ? "" :  "<strong>e-mail:</strong> $email <br />";
$msg .= empty($telefone) ? "" : "<strong>telefone:</strong> $telefone <br/>";
$msg .= empty($assunto) ? "" : "<strong>assunto:</strong> $assunto <br/>";
$msg .= empty($mensagem) ? "" : "<strong>mensagem:</strong> $mensagem";

if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='vieira@talentu.com.br';
} else {
        $emailsender = "admin@" . $_SERVER[HTTP_HOST];

}

if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; 
else $quebra_linha = "\n";
 
$mensagemHTML = $msg;
 
$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
$headers .= "From: vieira@talentu.com.br";

if(!mail($to, $subject, $mensagemHTML, $headers ,"-r".$emailsender)){
    $headers .= "Return-Path: " . $emailsender . $quebra_linha;
    mail($to, $subject, $mensagemHTML, $headers );
}
 
print "
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<head>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
			<title>Confirmação</title>
			<script type=\"text/javascript\">
				alert (\"Enviado com sucesso! Obrigado por entrar em contato, responderemos assim que possível.\");window.location = '../../';;
			</script>
		</head>
		<body>
		</body>
	</html>
"

?>