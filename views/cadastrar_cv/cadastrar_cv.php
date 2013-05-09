<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Cadastrar CV</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>
    <script src="js/validateCPF_CNPJ.js" type="text/javascript"></script>
    <script src="js/cadastrar_cv/script.js"></script>
	
	<link type="text/css" rel="stylesheet" href="js/jQuery-TE_v.1.3.5/jquery-te-1.3.5.css">
    <script src="js/jQuery-TE_v.1.3.5/jquery-te-1.3.5.min.js"></script>
	
    <style>
        .hide_ {display: none!important;}
    </style>
	
	<script type="text/javascript">
		$(document).ready(function() {
			function Epne() {
				var VPne = $("#ePne").val();
				if (VPne == 1){
					$('.PNE').toggle();
				}else {
					$('.PNE').toggle();
				}
			}
			
			$("#ePne").change(Epne);
		});
	</script>

</head>
	
<body>
    <?= $data['vw_Login']  ?>
    <div class="center">
        <div class="containerCt">
            <div class="container">

              <? if($data['Perfil'] < 1){?>
            
            <form id="dadosPessoais" accept-charset="?" action="index.php?cadastrar_cv" method="post">
                <input id="Edicao" type="hidden" value="<?= $data['Edicao']  ?>" />
                <input id="Perfil" type="hidden" value="<?= $data['Perfil']  ?>" />
                <input id="slcdPretencao" type="hidden" value="<?= $data['Pretencao']  ?>" />
                <input id="slcdGrau" type="hidden" value="<?= $data['Grau']  ?>" />
                <input id="slcdEstadoCivil" type="hidden" value="<?= $data['EstadoCivil']  ?>" />
                <input id="slcdSexo" type="hidden" value="<?= $data['Sexo']  ?>" />
                
                <input id="slcdCategoria1" type="hidden" value="<?= $data['Categoria1']  ?>" />
                <input id="slcdVaga1" type="hidden" value="<?= $data['Vaga1']  ?>" />
                <input id="slcdTempo1" type="hidden" value="<?= $data['Tempo1']  ?>" />

                <input id="slcdCategoria2" type="hidden" value="<?= $data['Categoria2']  ?>" />
                <input id="slcdVaga2" type="hidden" value="<?= $data['Vaga2']  ?>" />
                <input id="slcdTempo2" type="hidden" value="<?= $data['Tempo2']  ?>" />

                <input id="slcdCategoria3" type="hidden" value="<?= $data['Categoria3']  ?>" />
                <input id="slcdVaga3" type="hidden" value="<?= $data['Vaga3']  ?>" />
                <input id="slcdTempo3" type="hidden" value="<?= $data['Tempo3']  ?>" />
                
                <input id="slcdPNE" type="hidden" value="<?= $data['PNE']  ?>" />

                    
                <div class="box_x2">
                    <h1 class="title_pages"><?= $data['Metodo']  ?></h1>
                    <h2 class="sub_title">Dados pessoais </h2>
                    
                    
                        <label class="lbl_form">e-mail</label>
                        <input id="Email" type="text" class="input_form" name="Email" value="<?= $data['Email']  ?>"/>
                        
                        <label class="lbl_form">nome completo</label>
                        <input id="Nome" name="Nome" type="text" class="input_form" value="<?= $data['Nome']  ?>"/>
                        
                        <? if($data['Perfil'] < 1 && $data['Edicao'] != 1){?>
                        <div class="half_inputs">
                            <label class="lbl_form half">crie sua senha</label>
                            <input id="Senha" name="Senha" type="password" class="input_form half" value="<?= $data['Senha']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">confirme sua senha</label>
                            <input name="reSenha" type="password" class="input_form half"/>
                        </div>
                        <?}?>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">data de nascimento</label>
                            <input id="DataNasci" name="DataNasci" type="text" class="input_form half" value="<?= $data['DataNasci']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">celular</label>
                            <input id="Celular" name="Celular" type="text" class="input_form half" value="<?= $data['Celular']  ?>"/>
                        </div>
                        
                        <? if($data['Perfil'] < 1 && $data['Edicao'] != 1){?>
                        <div class="half_inputs">
                            <label class="lbl_form half">cpf</label>
                            <input id="Cpf" name="Cpf" type="text" class="input_form half" value="<?= $data['CPF']  ?>"/>
                        </div>
                        <?}?>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">telefone</label>
                            <input id="Telefone" name="Telefone" type="text" class="input_form half" value="<?= $data['Telefone']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">cep</label>
                            <input id="Cep" name="Cep" type="text" class="input_form half" onBlur="getEndereco()" value="<?= $data['CEP']  ?>"/>
                        </div>
                        
                        <label class="lbl_form">endereço</label>
                        <input id="Endereco" name="Endereco" type="text" class="input_form" value="<?= $data['Endereco']  ?>"/>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">número</label>
                            <input id="Numero" name="Numero" type="text" class="input_form half" value="<?= $data['Numero']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">bairro</label>
                            <input id="Bairro" name="Bairro" type="text" class="input_form half" value="<?= $data['Bairro']  ?>"/>
                        </div>
                        
                        <label class="lbl_form">cidade</label>
                        <input id="Cidade" name="Cidade" type="text" class="input_form" value="<?= $data['Cidade']  ?>" disabled />
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">complemento</label>
                            <input id="Complemento" name="Complemento" type="text" class="input_form half" value="<?= $data['Complemento']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">estado</label>
                            <input id="Estado" name="Estado" type="text" class="input_form half" value="<?= $data['Estado']  ?>" disabled />
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">pretensão salarial</label>
                            <select id="Pretencao" name="Pretensao" class="select_form selectsValidate" value="<?= $data['Pretencao']  ?>">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">grau de escolaridade</label>
                            <select id="Grau" name="Grau" class="select_form selectsValidate" value="<?= $data['Grau']  ?>">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">estado civil</label>
                            <select id="EstadoCivil" name="EstadoCivil" class="select_form selectsValidate" value="<?= $data['EstadoCivil']  ?>">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">sexo</label>
                            <select id="Sexo" name="Sexo" class="select_form selectsValidate" value="<?= $data['Sexo']  ?>">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
					

                    <label class="lbl_form">é portador de necessidades especiais (PNE)?</label>
                    <select id="ePne" name="" class="select_form" value="" style="width: 185px">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                    </select>

                    <div class="PNE">
                            <label class="lbl_form ">qual?</label>
                            <select id="PNE" name="" class="select_form" value="" style="width: 395px">
                                    <option value="0">Selecione</option>
                                    <option value="1">Física</option>
                                    <option value="2">Auditiva</option>
                                    <option value="3">Visual</option>
                                    <option value="4">Mental</option>
                                    <option value="5">Múltiplas</option>
                            </select>

                            <label class="lbl_form">Detalhar</label>
                            <input id="PNEdetalhes" name="" type="text" class="input_form" value="<?= $data['PNEDetalhes']  ?>"/>
                    </div>

                </div>
                
                <div class="box_x2 right_box" style="float: left!important;">
                    <h1 class="title_pages">vagas de interesse</h1>
                    <h2 class="sub_title">
                        Deve escolher até 3 opções com item
                        e sub item <span>(ex: Administrativo – Recepcionista)</span>
                    </h2>

                        <label class="lbl_form b2">Categoria de emprego 1</label>
                        <select id="Categoria1" name="Categoria1" class="select_form Categorias selectsValidate2" value="<?= $data['Categoria1']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                    
                        <label class="lbl_form b2">Vaga 1</label>
                        <select id="Vaga1" class="select_form show" value="<?= $data['Vaga1']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                        
                        <label class="b2">Tempo de experiência no cargo da <span style="font-size: 18px; color: #00a2ff;">vaga 1</span></label>
                        <!--<input id="TempoExperiencia1" type="text" class="input_form half"/>-->
                        <select id="TempoExperiencia1" class="select_form">
                            <option value="0">Selecione</option>
                            <option value="menos de 6 meses">menos de 6 meses</option>
                            <option value="de 6 meses a 1 ano">de 6 meses a 1 ano</option>
                            <option value="de 1 a 2 anos">de 1 a 2 anos</option>
                            <option value="de 2 a 3 anos">de 2 a 3 anos</option>
                            <option value="de 3 a 5 anos">de 3 a 5 anos</option>
                            <option value="mais de 5 anos">mais de 5 anos</option>
                        </select>
                    
                    <span class="spacer"></span>
                    
                        <label class="lbl_form b2">Categoria de emprego 2</label>
                        <select id="Categoria2" name="Categoria2" class="select_form Categorias selectsValidate2" value="<?= $data['Categoria2']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                    
                        <label class="lbl_form b2">Vaga 2</label>
                        <select id="Vaga2" class="select_form show" value="<?= $data['Vaga2']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                        
                        <label class="b2">Tempo de experiência no cargo da <span style="font-size: 18px; color: #00a2ff;">vaga 2</span></label>
                        <!--<input id="TempoExperiencia2" type="text" class="input_form half"/>-->
                        <select id="TempoExperiencia2" class="select_form">
                            <option value="0">Selecione</option>
                            <option value="menos de 6 meses">menos de 6 meses</option>
                            <option value="de 6 meses a 1 ano">de 6 meses a 1 ano</option>
                            <option value="de 1 a 2 anos">de 1 a 2 anos</option>
                            <option value="de 2 a 3 anos">de 2 a 3 anos</option>
                            <option value="de 3 a 5 anos">de 3 a 5 anos</option>
                            <option value="mais de 5 anos">mais de 5 anos</option>
                        </select>
                    
                    <span class="spacer"></span>
                    
                        <label class="lbl_form b2">Categoria de emprego 3</label>
                        <select id="Categoria3" name="Categoria3" class="select_form Categorias selectsValidate2" value="<?= $data['Categoria3']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                    
                        <label class="lbl_form b2">Vaga 3</label>
                        <select id="Vaga3" class="select_form show" value="<?= $data['Vaga3']  ?>">
                            <option value="0">Selecione</option>
                        </select>
                        
                        <label class="b2">Tempo de experiência no cargo da <span style="font-size: 18px; color: #00a2ff;">vaga 3</span></label>
                        <!--<input id="TempoExperiencia3" type="text" class="input_form half"/>-->
                        <select id="TempoExperiencia3" class="select_form">
                            <option value="0">Selecione</option>
                            <option value="menos de 6 meses">menos de 6 meses</option>
                            <option value="de 6 meses a 1 ano">de 6 meses a 1 ano</option>
                            <option value="de 1 a 2 anos">de 1 a 2 anos</option>
                            <option value="de 2 a 3 anos">de 2 a 3 anos</option>
                            <option value="de 3 a 5 anos">de 3 a 5 anos</option>
                            <option value="mais de 5 anos">mais de 5 anos</option>
                        </select>

                        <label class="lbl_form">copiar e colar curriculum</label>
                        <textarea id="CV" class="txt_search" style="width: 383px!important; height: 140px;"><?= $data['CV']  ?></textarea>

                </div>
                <div style="float: left; width: 577px; margin:60px 40px 0 0;">
                    <?if($data['Edicao'] > 0){?>
                        <input id="Enviar" type="submit" value="finalizar edição" style="float: right;"/>
                    <?}elseif($data['Perfil'] > 0){?>
                        
                    <?}else{?>
                        <input id="Enviar" type="submit" value="finalizar cadastro" style="float: right;"/>
                    <?}?>
                </div>
              
              </form>  
                            
              
              <?}else{?>
              
            <div class="box_x2" style="width: 920px; margin-bottom: 30px; min-height: 990px;">
              <h1 class="title_pages"><?= $data['Nome']  ?></h1>
				
				<div style="width: 200px; float:right; margin-top: -70px;">
					<form name="form" method="post" action="../gerar_cv.php">
					<input type="hidden" name="nome" value="<?= $data['Nome'] ?>"/>
					<input type="hidden" name="email" value="<?= $data['Email'] ?>"/>
					<input type="hidden" name="nascimento" value="
						<?php
						$nasc = $data['DataNasci'];
						$nasc.'<br/><br/>';
						$array=explode("/",$nasc); 
						$dia = $array[0];
						$mes = $array[1];
						$ano = $array[2];
						
						$nascimento =  $ano.'-'.$mes.'-'.$dia;
						$hoje = date("Y-n-j");
						
						$date1=date($nascimento);
						$date_diff=strtotime($hoje)-strtotime($date1);
						
						echo floor(($date_diff)/(60*60*24*365)) .' anos';
					?>
					"/>
					<input type="hidden" name="sexo" value="
						<?php
							$dSexo = $data['Sexo'];
							if ($dSexo == 1){
							  echo 'Masculino';
							}else {
							  echo 'Feminino';
							}
						?>
					"/>
					<input type="hidden" name="telefone" value="<?= $data['Telefone'] ?>"/>
					<input type="hidden" name="celular" value="<?= $data['Celular'] ?>"/>
					<input type="hidden" name="endereco" value="<?= $data['Endereco'] ?>"/>
					<input type="hidden" name="nro" value="<?= $data['Numero'] ?>"/>
					<input type="hidden" name="bairro" value="<?= $data['Bairro'] ?>"/>
					<input type="hidden" name="cep" value="<?= $data['CEP'] ?>"/>
					<input type="hidden" name="cidade" value="<?= $data['Cidade'] ?>"/>
					<input type="hidden" name="estado" value="<?= $data['Estado'] ?>"/>
					<input type="hidden" name="pretensao" value="
						<?php
							$dPretencao = $data['Pretencao'];
							if ($dPretencao == 1){
							  echo 'Até 1.000,00';
							}else if ($dPretencao == 2){
							  echo 'de 1.000,00 à 1.500,00';
							}else if ($dPretencao == 3){
							  echo 'de 1.500,00 à 2.000,00';
							}else if ($dPretencao == 4){
							  echo 'de 2.000,00 à 4.000,00';
							}else {
							  echo 'Acima de 4.000,00';
							}
						?>
					"/>
					<input type="hidden" name="grau" value="
						<?php
							$dGrau = $data['Grau'];
							if ($dGrau == 1){
							  echo 'Fundamental Incompleto';
							}else if ($dGrau == 2){
							  echo 'Fundamental Completo';
							}else if ($dGrau == 3){
							  echo 'Médio Incompleto';
							}else if ($dGrau == 4){
							  echo 'Médio Completo';
							}else if ($dGrau == 5){
							  echo 'Superior Incompleto';
							}else {
							  echo 'Superior Completo';
							}
                  		?>
					"/>
					<input type="hidden" name="esCivil" value="
						<?php
							$dEstatoCivil = $data['EstadoCivil'];
							if ($dEstatoCivil == 1){
							  echo 'Solteiro';
							}else if ($dEstatoCivil == 2){
							  echo 'Casado';
							}else if ($dEstatoCivil == 3){
							  echo 'Separado';
							}else {
							  echo 'Viúvo';
							}
						  ?>
					"/>
					<?php if($data['PNE'] > 0){ ?>
					<input type="hidden" name="PNE" value="<?= $data['PNE'] ?>"/>
					<input type="hidden" name="PneD" value="<?= $data['PNEDetalhes'] ?>"/>
					<? }?>
					<input type="hidden" name="cat1" value="<?= $data['CategoriaNome1'] ?>"/>
					<input type="hidden" name="vaga1" value="<?= $data['VagaNome1'] ?>"/>
					<input type="hidden" name="tempo1" value="<?= $data['Tempo1'] ?>"/>
					<input type="hidden" name="cat2" value="<?= $data['CategoriaNome2'] ?>"/>
					<input type="hidden" name="vaga2" value="<?= $data['VagaNome2'] ?>"/>
					<input type="hidden" name="tempo2" value="<?= $data['Tempo2'] ?>"/>
					<input type="hidden" name="cat3" value="<?= $data['CategoriaNome3'] ?>"/>
					<input type="hidden" name="vaga3" value="<?= $data['VagaNome3'] ?>"/>
					<input type="hidden" name="tempo3" value="<?= $data['Tempo3'] ?>"/>
					<input type="hidden" name="cv" value="<?= $data['CV'] ?>"/>
					
					<input type="submit" class="btn_default" value="Gerar PDF para impressão">
				</form>
				</div>
				
				
              <input type="hidden" id="emailEnvio" value="<?= $data['Email']  ?>">
              <label class="lbl_pre">E-mail: <span><?= $data['Email']  ?></span></label>
              <?php
                
                $nasc = $data['DataNasci'];
                $nasc.'<br/><br/>';
                $array=explode("/",$nasc); 
                $dia = $array[0];
                $mes = $array[1];
                $ano = $array[2];
                
                $nascimento =  $ano.'-'.$mes.'-'.$dia;
                $hoje = date("Y-n-j");
                
                $date1=date($nascimento);
                $date_diff=strtotime($hoje)-strtotime($date1);
                
                echo '<label class="lbl_pre">Idade: <span>';
                echo floor(($date_diff)/(60*60*24*365)) .' anos';
                echo '</span></label>';
                      
                ?>
                <label class="lbl_pre">Sexo: <span>
                  <?php
                    $dSexo = $data['Sexo'];
                    if ($dSexo == 1){
                      echo 'Masculino';
                    }else {
                      echo 'Feminino';
                    }
                  ?></span>
                </label>
                <label class="lbl_pre">Telefone: <span>
                    <?= $data['Telefone']  ?>
                  </span></label>
                <label class="lbl_pre">Celular: <span>
					<?= $data['Celular']  ?>
                </span></label>
				<label class="lbl_pre">Endereço: <span><?= $data['Endereco'] ?>, <?= $data['Numero'] ?></span></label>
				<label class="lbl_pre">Bairro: <span><?= $data['Bairro'] ?></span></label>
				<label class="lbl_pre">CEP: <span><?= $data['CEP'] ?></span></label>
                <label class="lbl_pre">Cidade/Estado: <span><?= $data['Cidade']  ?> - <?= $data['Estado']  ?></span></label>
                <label class="lbl_pre">Pretensão salarial: <span>
                  <?php
                    $dPretencao = $data['Pretencao'];
                    if ($dPretencao == 1){
                      echo 'Até 1.000,00';
                    }else if ($dPretencao == 2){
                      echo 'de 1.000,00 à 1.500,00';
                    }else if ($dPretencao == 3){
                      echo 'de 1.500,00 à 2.000,00';
                    }else if ($dPretencao == 4){
                      echo 'de 2.000,00 à 4.000,00';
                    }else {
                      echo 'Acima de 4.000,00';
                    }
                  ?></span>
                </label>
              
                <label class="lbl_pre">Grau de escolaridade: <span>
                  <?php
                    $dGrau = $data['Grau'];
                    if ($dGrau == 1){
                      echo 'Fundamental Incompleto';
                    }else if ($dGrau == 2){
                      echo 'Fundamental Completo';
                    }else if ($dGrau == 3){
                      echo 'Médio Incompleto';
                    }else if ($dGrau == 4){
                      echo 'Médio Completo';
                    }else if ($dGrau == 5){
                      echo 'Superior Incompleto';
                    }else {
                      echo 'Superior Completo';
                    }
                  ?></span>
                </label>
              
                <label class="lbl_pre">Estado civil: <span>
                  <?php
                    $dEstatoCivil = $data['EstadoCivil'];
                    if ($dEstatoCivil == 1){
                      echo 'Solteiro';
                    }else if ($dEstatoCivil == 2){
                      echo 'Casado';
                    }else if ($dEstatoCivil == 3){
                      echo 'Separado';
                    }else {
                      echo 'Viúvo';
                    }
                  ?></span>
                </label>
                
                <?php if($data['PNE'] > 0){ ?>
                <label class="lbl_pre">PNE: <span>
                  <?php
                    $dPNE = $data['PNE'];
                    if ($dPNE == 1){
                      echo 'física'; 
                    }else if ($dPNE == 2){
                      echo 'auditiva';
                    }else if ($dPNE == 3){
                      echo 'visual';
                    }else if ($dPNE == 4){
                      echo 'mental';
                    }else if ($dPNE == 5){
                      echo 'múltiplas';
                    }else{
                      echo 'Não';  
                    }   
                    
                    if(!empty($data['PNEDetalhes'])){
                        echo ' (' . $data['PNEDetalhes'] . ')';
                    } 
                  ?></span>
                </label>
                <?php } ?>
              
              <div class="line"></div>
              
              <?php
                $display = $data['Categoria1'];
                if ($display == 0){
                    echo '<style>';
                    echo '._area1 {display:none};';
                    echo '</style>';
                }
              ?>
              
                <label class="lbl_pre _area1">Area de interesse 1: 
                    <span><?php echo $data['CategoriaNome1']; ?></span>
                </label>
                
                <label class="lbl_pre _area1">Cargo: 
                    <span><?php echo $data['VagaNome1']; ?></span>
                </label>
                <label class="lbl_pre _area1">Tempo de experiência: <span>
                  <?= $data['Tempo1']  ?></span>
                </label>
                
                <?php
                  $display = $data['Categoria2'];
                  if ($display == 0){
                      echo '<style>';
                      echo '._area2 {display:none};';
                      echo '</style>';
                  }
                ?>
              
                <label class="lbl_pre _area2">Area de interesse 2:
                    <span><?php echo $data['CategoriaNome2']; ?></span>
                </label>
                <label class="lbl_pre _area2">Cargo:
                    <span><?php echo $data['VagaNome2']; ?></span>
                </label>
                <label class="lbl_pre _area2">Tempo de experiência: <span>
                  <?= $data['Tempo2']  ?></span>
                </label>
              
              
              <?php
                  $display = $data['Categoria3'];
                  if ($display == 0){
                      echo '<style>';
                      echo '._area3 {display:none};';
                      echo '</style>';
                  }
                ?>
              
              
                <label class="lbl_pre _area3">Area de interesse 3:
                    <span><?php echo $data['CategoriaNome3']; ?></span>
                </label>
                <label class="lbl_pre _area3">Cargo:
                    <span><?php echo $data['VagaNome3']; ?></span>
                </label>
                <label class="lbl_pre _area3">Tempo de experiência: <span>
                  <?= $data['Tempo3']  ?></span>
                </label>

              
                <div class="img_viewCV">
                  <label class="lbl_pre">Curriculum: </label>
                  <textarea disabled="disabled" id="CV" class="txt_search" style="width: 445px!important; height: 198px;"><?= $data['CV']  ?></textarea>
                </div>
                
				

				<!--text area que aceita html-->
                <div class="txt_html" style="width: 100%; position: absolute; bottom: 0;">
					<label class="lbl_pre"><span>Envie uma mensagem para o candidato</span></label>	
					<textarea name="textarea" class="text_htm"></textarea>
					<script>$('.text_htm').jqte();</script>
					
					<input type="submit" id="Enviar_Email" value="Enviar"/>
				</div>
              
                 <?}?>

              </div>
              <? if(!$data['Perfil'] < 1){?>
              <div style="float: left; width: 577px; margin:20px 40px 0 0;">
                <a class="btn_default" href="javascript:history.go(-1)">retornar aos resultados</a>
              </div>
              <?}?>
            </div>
        </div>
    </div>
    
    <footer>
        <label>
			Talentu 2013 © Todos os direitos reservados <span>Desenvolvido por Jean Reis</span><br/>
			Rua do Tesouro, 23 - 6º andar <span><a href="mailto:contato@talentu.com.br" target="_blank">contato@talentu.com.br</a></span> (11) 2386-2001.
		</label>
    </footer>    
</body>
</html>
