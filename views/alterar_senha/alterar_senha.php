<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Alterar Senha</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>  
    <script src="js/alterar_senha/script.js" type="text/javascript"></script>    
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x2" style="width: 963px;">
                    <h1 class="title_pages">Alterar senha</h1>
                    <h2 class="sub_title" style="margin-bottom: 20px;">aqui você pode alterar sua senha de acesso.</h2>
                    
                    <form style="width: 400px;" id="re_pass">
                        <label class="lbl_form">digite sua nova senha</label>
                        <input id="Senha" type="password" class="input_form half" name="Password"/>
                        
                        <label class="lbl_form">repita sua nova senha</label>
                        <input type="password" class="input_form  half" name="Re_password" id="Re_password">
                        
                        <div style="width: 100%; float: left;">
                            <input id="Enviar" type="submit" class="btn_default" value="alterar"/>
                        </div>
                    </form>
                    
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
