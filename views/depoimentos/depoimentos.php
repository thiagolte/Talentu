<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Depoimentos</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/depoimentos/script.js"></script>
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
                <div class="box_x1" style="width: 588px; margin-right: 40px;">
                    <h1 class="title_pages">Depoimentos</h1>
                    <p>Conheça o depoimento de quem conseguiu emprego com a ajuda da <strong style="color: #f0702e;">Talentu!</strong></p>
                    
                    <div id="Depoimentos">    
                    </div>
                    
                    <? if(!empty($_COOKIE['idCadastro'])){?>
                    <div class="comment">
                        <a class="testi_create">Criar depoimento</a>
                        <textarea id="textDepoimento" class="txt_comment"></textarea>
                        <input id="Criar" type="submit" value="criar" class="btn_comment"/>
                    </div>
                    <?}?>
                                       
                </div>
                
                <div class="fb_box">
                    <div class="fb-like-box" data-href="http://www.facebook.com/TalentuVagas" data-width="292" data-show-faces="true" data-stream="true" data-border-color="#ffffff" data-header="true"></div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
