<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Parceiros</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
   
  <? if(!empty($_COOKIE['idCadastro'])){?>
  <style>
    .hide_ {display: none;}
  </style>
  <?}?>
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
              
              <div class="box_x1" style="width: 963px; margin-top: 0!important">
                        <?php
                            foreach ($data['Joomla'] as $dados) {
                                echo utf8_encode($dados['introtext']);
                            }
                        ?>
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
