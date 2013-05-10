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
                        </ul>

                        <div id="tabs-1">
                            
                            <!-- CATEGORIAS --> 
                            <input id="NovoCat" type="submit" value="Novo">
                                
                            <div id="dialogCat" title="Categoria">
                                <p>
                                    <input id="CodigoCat" type="hidden"/>
                                    Nome: <input id="NomeCat" type="text" class="DialogInput" /> </br>
                                    <input id="AtivoCat" type="checkbox" /> Ativo</br></br>
                                    <input id="SalvarCat" type="submit" value="Salvar">
                                    <input id="EditarCat" type="submit" value="Editar">
                                </p>
                            </div>
                                
                            <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Categorias">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Ativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <? 
                                    if($data['dtCategorias']){
                                        $count = 1;
                                        foreach ($data['dtCategorias'] as $dados) { ?>
                                            <tr class="gradeA">
                                                <td>
                                                    <div class="menu hide">
                                                        <!-- <div class="DeleteCategorias delete"></div> -->
                                                        <div class="EditCategorias edit"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                                                    <?echo($count); ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="nome" value="<?echo(utf8_encode($dados['nome'])); ?>" />
                                                    <?echo(utf8_encode($dados['nome'])); ?>
                                                </td>
                                                <td>
                                                    <?if (utf8_encode($dados['ativo']) == 1){?>
                                                        <input type="hidden" class="ativo" value="true" />
                                                        <input type="checkbox" checked disabled="true">
                                                    <?}else{?>
                                                        <input type="hidden" class="ativo" value="false" />
                                                        <input type="checkbox" disabled="true" >    
                                                    <?}?>
                                                </td>
                                            </tr>
                                        <? 
                                            $count ++;
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="tabs-2">
                            <!-- VAGAS -->
                            <input id="NovoVag" type="submit" value="Novo">
                                
                            <div id="dialogVag" title="Vaga">
                                <p>
                                    <input id="CodigoVag" type="hidden"/>
                                    Nome: <input id="NomeVag" type="text" class="DialogInput" /> </br>
                                    <input id="AtivoVag" type="checkbox" /> Ativo</br></br>
                                    <input id="SalvarVag" type="submit" value="Salvar">
                                    <input id="EditarVag" type="submit" value="Editar">
                              </p>
                            </div>
                            
                            <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Vagas">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Ativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <? 
                                    if($data['dtVagas']){
                                        $count = 1;
                                        foreach ($data['dtVagas'] as $dados) { ?>
                                            <tr class="gradeB">
                                                <td>
                                                    <div class="menu hide">
                                                        <!-- <div class="DeleteVagas delete"></div> -->
                                                        <div class="EditVagas edit"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                                                    <?echo($count); ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="nome" value="<?echo(utf8_encode($dados['nome'])); ?>" />
                                                    <?echo(utf8_encode($dados['nome'])); ?>
                                                </td>
                                                <td>
                                                    <?if (utf8_encode($dados['ativo']) == 1){?>
                                                        <input type="hidden" class="ativo" value="true" />
                                                        <input type="checkbox" checked disabled="true">
                                                    <?}else{?>
                                                        <input type="hidden" class="ativo" value="false" />
                                                        <input type="checkbox" disabled="true">    
                                                    <?}?>
                                                </td>
                                            </tr>
                                        <?
                                            $count ++;
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="tabs-3">
                            <div class="content">ccc</div>
                        </div>
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
