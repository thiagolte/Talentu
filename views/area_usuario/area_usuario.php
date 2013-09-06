<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Area do usuario</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
    <script src="jquery183.js"></script>
    <script type="text/javascript" src="js/area_usuario/scroll.js"></script>
    <script type="text/javascript" src="js/area_usuario/script.js"></script>
  
    <script type="text/javascript">
      $(document).ready(function() {
        $('#deslogar').on('click', function() {
            $('#Sair').trigger('click');
        });
      });
    </script>  
</head>
      
<body>
    <?= $data['vw_Login']  ?>
       
    <div class="center">
        <div class="containerCt">
            <div class="container">
                
                <div class="internal_menu">
                    <ul>
                        <li><a href="?cadastrar_cv&Editar=1">Editar perfil/cv</a></li>
                        <?php if($_COOKIE['Status'] == 1){ ?>
						<li><a href="?buscar_vaga">Buscar Vaga</a></li>
                        <li><a href="?alterar_senha&resetpswd=<?= $_COOKIE['resetpswd']?>">Alterar Senha</a></li>
                        <li><a id="Congelar">Congelar Cadastro</a></li>
                        <li><a class="hide" id="Descongelar">Descongelar Cadastro</a></li>
                        <?php }else{ ?>
                        <li><a class="hide" id="Congelar">Congelar Cadastro</a></li>
                        <li><a id="Descongelar">Descongelar Cadastro</a></li>
                        <?php } ?>
                        <li class="close_item" id="deslogar"><a>Sair</a></li>
                    </ul>
                    
                    <div class="shadow"></div>
                </div>
                
                <div class="box_x2" style="width: 460px; margin-bottom: 30px;">
                    <h1 class="title_pages"><?= $_COOKIE['NomePessoa']?></h1>
                    
                    <?php
    
                        $nasc = $_COOKIE['DataNascimento'];
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
                    <label class="lbl_pre">Sexo: <span><?= $_COOKIE['Sexo']?></span></label>
                    <label class="lbl_pre">Grau de escolaridade: <span><?= $_COOKIE['GrauEscolaridade']?></span></label>
                    <label class="lbl_pre">Pretensão salarial: <span><?= $_COOKIE['Pretencao']?></span></label>
                    <label class="lbl_pre">Cidade/Estado: <span><?= $_COOKIE['Cidade']?> - <?= $_COOKIE['Estado']?></span></label>
                  
                </div>
                
                <div class="internal_img_base">
                    <span class="img_cad"></span>
                </div>
                
                <span class="spacer" style="margin-top: 0!important;"></span>
                
                <div align="center" style="margin: 20px;">
                        <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-3505603995038341";
                        /* Anúncio 1 */
                        google_ad_slot = "5911298712";
                        google_ad_width = 728;
                        google_ad_height = 90;
                        //-->
                        </script>
                        <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
