<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Talentu - Administração</title>
        <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
        <link href="css/admin.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="jquery183.js"></script>
        <script src="js/adm/script.js"></script>
        
        <script src="js/adm/categorias.js"></script>
        <script src="js/adm/vagas.js"></script>
        <script src="js/adm/categoriasxvagas.js"></script>
        <script src="js/adm/usuarios.js"></script>
        <script src="js/adm/empresas.js"></script>

        <link rel="stylesheet" href="js/jquery-ui/css/custom-theme/jquery-ui-1.10.1.custom.min.css" />
        <script src="js/jquery-ui/js/jquery-ui-1.10.1.custom.min.js"></script>		
        <link rel="stylesheet" href="css/table_jui.css"/>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.jeditable.mini.js"></script>
        
    </head>

    <body>
    <?php if(!empty($_COOKIE['logAdm'])){ ?>
    
        <div class="ct">
            <div class="containerCt">
                <div class="container">		
                    <div class="topo"></div>		
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Categorias</a></li>
                            <li><a href="#tabs-2">Vagas</a></li>
                            <li><a href="#tabs-3">Categorias X Vagas</a></li>
                            <li><a href="#tabs-4">Usuários</a></li>
                            <li><a href="#tabs-5">Empresas</a></li>
                            <li><a href="#tabs-6">Vagas Empresas</a></li>
                        </ul>

                        <?php include_once 'categorias.php'; ?>

                        <?php include_once 'vagas.php'; ?>
                        
                        <?php include_once 'categoriasxvagas.php'; ?>
                        
                        <?php include_once 'usuarios.php'; ?>
                        
                        <?php include_once 'empresas.php'; ?>
                        
                        <?php include_once 'vagasempresas.php'; ?>

                    </div>
                </div>
            </div>
        </div>

    <?php }else{ ?>
    
        <div class="center">
            <div class="containerCt">
                <div class="container">
                    <div class="Login">
                        <div class="logo_adm"></div>
						
                        <label>login:</label>
                        <input id="Login" name="Login" type="text">
						
                        <label>Senha:</label>
                        <input id="Senha" name="Senha" type="password">
						
                        <input id="Entrar" type="submit" value="Entrar" class="entrar_adm">
                    </div>
                </div>
            </div>
        </div>
    
    <?php } ?>

	<footer></footer>
    </body>
</html>
