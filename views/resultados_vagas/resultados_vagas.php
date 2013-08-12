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
                                
                <div class="box_x2" style="width: 963px;">
                    <h2 class="sub_title">Resultados da busca</h2>
                    
                    <?
                        if($data['Vagas']){
                            foreach ($data['Vagas'] as $dado) { ?>
                                <div class="vacancy_item">
                                    <h1><? echo utf8_encode( $dado['Vaga'] ); ?></h1>
                                    <div class="vacancy_item_txt">
                                        <p>
                                            <strong>Salário: </strong><? echo utf8_encode( $dado['Salario'] ); ?><br/>
                                            <strong>Local: </strong> <? echo utf8_encode( $dado['Local'] ); ?><br/><br/>
                                            <strong>Sobre a Vaga: </strong><? echo utf8_encode( $dado['Atribuicoes'] ); ?>
                                        </p>
                                    </div>

                                    <div class="vacancy_ct_buttons">
                                        <a class="btn_default btn_vacancy">Compartilhar</a>
                                        <a href="?visualizar_vaga&idVaga=<? echo $dado['idVaga']; ?>" class="btn_default btn_vacancy">Visualizar</a>
                                        <!--<a class="btn_default btn_vacancy">Candidatar-se</a>-->
                                    </div>
                                </div>
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
