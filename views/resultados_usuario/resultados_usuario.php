<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Resultados de busca</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x1">
                    <h1 class="title_pages">Resultado de Pesquisa por profissionais</h1>
                    
                    <table class="table_results">
                        <tr class="tb_title_line">
                            <td>Nome</td>
                            <td>Dados Pessoais</td>
                            <td style="width: 50px; text-align: center;">Perfil</td>
                        </tr>
                        <?foreach ($data['Dados'] as $dados) { ?>
                            <tr>
                                <td><a class="prof_name"><?= utf8_encode($dados['Nome'])?></a></td>
                                <td><?= utf8_encode($dados['Descricao'])?></td>
                                <td style="text-align: center;"><a href="?cadastrar_cv&idUsuario=<?= utf8_encode($dados['Codigo'])?>">acessar</a></td>
                            </tr>
                        <?}?>
                    </table>

                </div>
              <div style="float: left; width: 577px; margin:60px 40px 0 0;">
                <a class="btn_default" href="javascript:history.go(-1)">realizar nova busca</a>
              </div>
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
