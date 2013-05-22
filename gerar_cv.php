<?php

$nome	= utf8_decode($_POST['nome']);
$email	 = utf8_decode($_POST['email']);
$idade	 = utf8_decode($_POST['nascimento']);
$sexo	 = utf8_decode($_POST['sexo']);
$telefone	 = utf8_decode($_POST['telefone']);
$celular	 = utf8_decode($_POST['celular']);
$endereco	 = utf8_decode($_POST['endereco']);
$nro	 = utf8_decode($_POST['nro']);
$bairro	 = utf8_decode($_POST['bairro']);
$cep	 = utf8_decode($_POST['cep']);
$cidade	 = utf8_decode($_POST['cidade']);
$estado	 = utf8_decode($_POST['estado']);
$pretensao	 = utf8_decode($_POST['pretensao']);
$grau	 = utf8_decode($_POST['grau']);
$esCivil	 = utf8_decode($_POST['esCivil']);
$PNE	 = utf8_decode($_POST['PNE']);
$PneD	 = utf8_decode($_POST['PneD']);
$area1	 = utf8_decode($_POST['area1']);
$cat1	 = utf8_decode($_POST['cat1']);
$vaga1	 = utf8_decode($_POST['vaga1']);
$tempo1	 = utf8_decode($_POST['tempo1']);
$area2	 = utf8_decode($_POST['area2']);
$cat2	 = utf8_decode($_POST['cat2']);
$vaga2	 = utf8_decode($_POST['vaga2']);
$tempo2	 = utf8_decode($_POST['tempo2']);
$area3	 = utf8_decode($_POST['area3']);
$cat3	 = utf8_decode($_POST['cat3']);
$vaga3	 = utf8_decode($_POST['vaga3']);
$tempo3	 = utf8_decode($_POST['tempo3']);
$cv	 = utf8_decode($_POST['cv']);
$cv1 = str_replace("?", "<br/>", $cv);
$cvT = str_replace(", ", "<br/>", $cv1);

require_once("dompdf/dompdf_config.inc.php");

$html = 
    "<html>
		<head>
		
			<style>
				* {font-family: Arial; color: #333;}
				h1 {font-size: 30px;}
			</style>
		</head>
		
		<body>
			
			<img src=\"images/logo_mail.jpg\" style=\"height: 60px;\"/>
		
			<h1>$nome</h1>
			
			<p style='font-size: 14px; font-style: italic; font-family: Arial; color: #333;'>
				$idade, Sexo $sexo, $esCivil <br/>
				$endereco, $nro - $bairro<br/>
				$cidade - $estado - $cep<br/>
				Telefone: $telefone / Celular: $celular / E-mail: $email<br/>
				
			</p>
			<p>
				
				<strong>Pretens&atilde;o Salarial:</strong> $pretensao<br/>
				<strong>Grau de Escolaridade:</strong> $grau<br/><br/>
				
				<strong>Area de interesse 1:</strong> $cat1<br/>
				<strong>Vaga de interesse 1:</strong> $vaga1<br/>
				<strong>Tempo de experi&ecirc;ncia 1:</strong> $tempo1<br/><br/>
				
				<strong>Area de interesse 2:</strong> $cat2<br/>
				<strong>Vaga de interesse 2:</strong> $vaga2<br/>
				<strong>Tempo de experi&ecirc;ncia 2:</strong> $tempo2<br/><br/>
				
				<strong>Area de interesse 3:</strong> $cat3<br/>
				<strong>Vaga de interesse 3:</strong> $vaga3<br/>
				<strong>Tempo de experi&ecirc;ncia 3:</strong> $tempo3<br/><br/>				
				
			</p>
			<p>
				$cvT
			
			</p>
		</body>
	</html>
	
	";

//print $html;

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($nome."_curriculum.pdf");

?>