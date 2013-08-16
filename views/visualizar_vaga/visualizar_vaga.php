<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<? if($data['Vaga']){ 
		foreach($data['Vaga'] as $dado){
			echo '<title>Talentu - Vaga - '.utf8_encode( $dado['Vaga'] ).'</title>';
			echo '<meta property="og:description" content="'.utf8_encode( $dado['Atribuicoes'] ).'"/>';
		}
	} ?>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>  
    <script src="js/serializeObject.js" type="text/javascript"></script>
    <script src="js/visualizar_vaga/visualizar_vaga.js" type="text/javascript"></script>
	<link rel="image_src" href="../../images/simbolo.jpg"/>
	<meta property="og:image" content="http://talentu.com.br/images/simbolo.jpg" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="article" />
	<script>document.write('<meta property="og:title" content="'+document.title+'" />')</script>	 
	<script>document.write('<meta property="og:url" content="'+location.href+'" />')</script>
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x2" style="width: 963px;">
                    <? if($data['Vaga']){ 
                        

                        foreach($data['Vaga'] as $dado){ 
                        	$ativoVaga = $dado['ativo'];
	                        if($dado['ativo'] == 0){ ?>
	                            <div class="Alerta">
	                                <span>Infelizmente esta vaga não está mais ativa, cadastre-se e não perca mais oportunidades.</span>
	                            </div>
	                        <?}?>
                        
                            <h1 class="title_pages" id="title_vaga"><? echo utf8_encode( $dado['Vaga'] ); ?></h1>
                            
                            <div class="vacancy_full">
                                <label class="lbl_pre">Salário: <span><? echo utf8_encode( $dado['Salario'] ); ?></span></label>
                                <label class="lbl_pre">Area de Atuação: <span><? echo utf8_encode( $dado['AreaAtuacao'] ); ?></span></label>
                                <label class="lbl_pre">Empresa: <span><? echo utf8_encode( $dado['Empresa'] ); ?></span></label>
                                <label class="lbl_pre">Local: <span><? echo utf8_encode( $dado['Local'] ); ?></span></label>
                                <label class="lbl_pre">Porte da Empresa: <span><? echo ( $dado['Porte'] ); ?></span></label>
                                <label class="lbl_pre">Nacionalidade da empresa: <span><? echo utf8_encode( $dado['Nacionalidade'] ); ?></span></label>
                                <label class="lbl_pre">Ramo de atuação da empresa: <span><? echo utf8_encode( $dado['Ramo'] ); ?></span></label>
                                <label class="lbl_pre">Vaga: <span><? echo utf8_encode( $dado['Vaga'] ); ?></span></label>
                                <label class="lbl_pre">Quantidade de vagas: <span><? echo utf8_encode( $dado['Qtd'] ); ?></span></label>
                                <label class="lbl_pre">Regime de contratação: <span><? echo ( $dado['RegimeContratacao'] ); ?></span></label>
                                <label class="lbl_pre">Atribuições e Responsabilidades: <span><? echo utf8_encode( $dado['Atribuicoes'] ); ?></span>
                                </label>
                                <label class="lbl_pre">Experiência e habilidades: <span><? echo utf8_encode( $dado['Experiencia'] ); ?></span></label>
                                <label class="lbl_pre">Escolaridade: <span><? echo utf8_encode( $dado['Escolaridade'] ); ?></span></label>
                                <label class="lbl_pre">Qualificações: <span><? echo utf8_encode( $dado['Qualificacoes'] ); ?></span></label>
                                <label class="lbl_pre">Benefícios: <span><? echo utf8_encode( $dado['Beneficios'] ); ?></span>
                                </label>
                                <label class="lbl_pre">Regime de trabalho/horário: <span><? echo utf8_encode( $dado['Regime'] ); ?></span></label>

                                <?if(isset($_COOKIE['idCadastro']) && !empty($_COOKIE['idCadastro']) && $data['ativo'] == 1){?>
                                    <form name="frmVaga" id="frmVaga">
                                        <input type="hidden" name="idVaga" id="idVaga" value="<? echo $_GET['idVaga']; ?>">
                                    <? for($i == 0; $i <=5; $i++){ ?>
                                        <? if(!empty( $dado['Questao' . $i] )){ ?>
                                            <div>
                                            <label class="lbl_pre"><? echo utf8_encode( $dado['Questao' . $i] ); ?></label>
                                            <? if( utf8_encode( $dado['TipoResposta' . $i] ) == 1 ){ ?>
                                                <textarea name="Questao<? echo $i ?>" class="txt_search questTxt" style="margin: 0 0 20px 0;"></textarea>
                                            <? }else{ ?>
                                                <span>SIM</span>
                                                <input type="radio" value="1" class="quest" name="Questao<? echo $i ?>">
                                                <span>NÃO</span>
                                                <input type="radio" value="0" class="quest" name="Questao<? echo $i ?>">
                                            <? } ?>
                                            </div>
                                        <? } ?>
                                    <?}?>
                                    </form>
                                <?}?>
                            </div>

                            <?if ($ativoVaga == 1){?>
                                <?if(isset($_COOKIE['idCadastro']) && !empty($_COOKIE['idCadastro'])){?>
                                    <div class="btn_container">
                                        <a id="Enviar" class="btn_default" style="float: left;">Candidatar-se a esta vaga</a>
                                    </div>
                                <?}else{?>
                                    <div class="Alerta">
                                        <span>Cadastre-se ou faça o login para se candidatar a vaga</span>
                                    </div>

                                    <div class="btn_container">
                                        <a id="Cadastro" href="?cadastrar_cv" class="btn_default" style="float: left;">Cadastre-se AQUI antes de se candidatar</a>
                                    </div>
                                <?}?>
                            <?}?>
                    
                   <?
                        }
                    }
                   ?>
                </div>
            </div>
        </div>
    </div>
	
	<?php include 'views/footer.php'; ?>
   
    
</body>
</html>
