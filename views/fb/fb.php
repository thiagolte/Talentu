<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Home</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/styleFB.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js" type="text/javascript"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/validateCPF_CNPJ.js" type="text/javascript"></script>
    <script src="js/index/script.js"></script>
    <script src="js/enviar_fb.js"></script>
</head> 
<body> 
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
                    
                    <form class="box_cad_home" id="form_home">
                        <label>Nome completo</label>
                        <input id="nome" name="nome" type="text" name="nome"/>
                        <label>CPF</label>
                        <input id="cpf" name="cpf" type="text" name="cpf"/>
                        <label>Crie uma senha de acesso</label>
                        <input id="senha" name="senha" type="password" name="senha"/>
                        
                        <a class="btn_default" id="enviar_dados" target="_blank">Cadastrar</a>
                    </form>
					
					<span class="img_home02"></span>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>  
    
</body>
</html>
