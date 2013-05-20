<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Fale Conosco</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>  
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x2" style="width: 963px;">
                    <h1 class="title_pages">Fale conosco</h1>
                    <h2 class="sub_title" style="margin-bottom: 20px;">Este é o seu canal de comunicação direta com a Talentu.</h2>
                    
                    <form style="width: 400px;" name="form" method="post" id="contatoForm" action="views/fale_conosco/envia.php">
                        <label class="lbl_form">digite seu nome</label>
                        <input type="text" class="input_form" name="nome" id="nome"/>
                        
                        <label class="lbl_form">endereço de e-mail</label>
                        <input type="text" class="input_form" name="email" id="email"/>
                        
                        <div class="half_inputs" style="width: 300px;">
                            <label class="lbl_form half">telefone</label>
                            <input type="text" class="input_form half" name="telefone" id="telefone"/>
                        </div>
                        
                        <label class="lbl_form">assunto da mensagem</label>
                        <input type="text" class="input_form" name="assunto" id="assunto"/>
                        
                        <label class="lbl_form">digite sua mensagem</label>
                        <textarea class="txt_search" style="width: 385px;" name="mensagem" id="mensagem"></textarea>

                        <input type="submit" value="enviar" style="float: right; margin-top: 10px;"/>
                    </form>
                    
                    <div class="img_contato"></div>
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
