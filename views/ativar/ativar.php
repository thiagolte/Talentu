<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Ativação</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script type="text/javascript" src="js/ativar/script.js"></script>
</head>
    
<body>
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x1" style="width: 588px; margin-right: 40px;height: 368px;">
                    <h1 class="title_pages">ola <?= $_COOKIE['NomePessoa']?></h1>
                    <input type="hidden" id="Tipo" value="<?php echo $_GET['Tipo'] ?>">
                    <input type="hidden" id="Nome" value="<?php echo $_GET['Nome'] ?>">
                    <input type="hidden" id="Email" value="<?php echo $_GET['Email'] ?>">
					
					<p>
						Cadastro efetuado com sucesso!<br/><br/>
						Agora você pode efetuar o seu login.
						
						
					</p>
<!--
                    <p>Seu cadastro ainda não está ativo!<br/>
                    por favor clique no link de ativação enviado no seu e-mail
                    <br><br>
                    CASO NÃO TENHA RECEBIDO O EMAIL DE ATIVACAO, FAVOR CHECAR O SEU SPAM OU LIXEIRA
                    </p>
-->
                    
                    <div class="img_ativacao"></div>
                    
                </div>
                
                <div style="float: left; width: 950px; border: 2px solid #efefef; margin-left: 25px;">
                    <div class="fb-like-box" data-href="http://www.facebook.com/talentuvagas" data-width="950" data-height="220" data-show-faces="true" data-stream="false" data-border-color="#ffffff" data-header="true"></div>
                </div>
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
