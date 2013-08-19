<?php error_reporting(0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - o seu emprego é aqui!</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js" type="text/javascript"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/validateCPF_CNPJ.js" type="text/javascript"></script>
    <script src="js/index/script.js"></script>
	
	<link rel="image_src" href="../../images/simbolo.jpg"/>
	<meta property="og:image" content="http://talentu.com.br/images/simbolo.jpg" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Talentu - o seu emprego é aqui!" />
	<meta property="og:url" content="http://talentu.com.br/" />
	<meta property="og:description" content="Buscando vagas de ingresso no mercado de trabalho? Curta essa página e receba as melhores vagas de hotelaria, assistente, vendedor, varejo, telemarketing, atendimento, garçom, entre outras!!"/>
	<meta name="description" content="Buscando vagas de ingresso no mercado de trabalho? Curta essa página e receba as melhores vagas de hotelaria, assistente, vendedor, varejo, telemarketing, atendimento, garçom, entre outras!!">
    
    <style>
        .hide_ {display: none!important;}
    </style>
    
</head>
  
  
<body>
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=241787612634808";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
	</script>
    
<?php
    $act = $_GET['act'];
    if($act == 0){
        echo '<style> .glass_panel {display:none;}</style>';
    }
?>

    <div class="glass_panel">
        <div class="success_active">
            <h1 class="title_cad">Cadastro ativado com sucesso!</h1>
            <label class="lbl_box">faça já seu login</label>
            <span class="close_glass"></span>
        </div>
    </div>
    
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_home01">
                    <div class="intro_text">
                        <?php
                            foreach ($data['Joomla'] as $dados) {
                                echo utf8_encode($dados['introtext']);
                            }
                        ?>
                        <span class="img_home01"></span>
                    </div>
                    
                    <h1 class="title_cad">Cadastre-se já e receba as melhores vagas de acordo com seu perfil</h1>
                    
                    <form class="box_cad_home" id="form_home" accept-charset="?" action="index.php?cadastrarcv" method="post">
                        <label>Nome completo</label>
                        <input id="nome" name="nome" type="text" name="nome"/>
                        <label>CPF</label>
                        <input id="cpf" name="cpf" type="text" name="cpf"/>
                        <label>Crie uma senha de acesso</label>
                        <input id="senha" name="senha" type="password" name="senha"/>
                        
                        <input id="Enviar" type="button" value="Cadastrar"/>
                        
                        <span class="img_home02"></span>
                    </form>
                </div>
                
                <div class="box_home02">
                    <span class="social_imgs">
                        <a class="btn_twt" href="https://twitter.com/Talentu3" target="_blank"></a>
                        <a class="btn_fb" href="https://www.facebook.com/talentuvagas" target="_blank"></a>
                    </span>
					
					
                    <div class="fb_container">
						<div class="fb-like-box" data-href="https://www.facebook.com/TalentuVagas" data-width="302" data-height="532" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>
					</div>
						
<!--
                    <div id="Depoimentos" class="box_testimonials">
                        <a href="?depoimentos"><h1>Depoimentos</h1></a>
                    </div>
-->
                </div>
                
                <div style="float: left; width: 950px; border: 2px solid #efefef; margin-left: 25px;">

                </div>
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
