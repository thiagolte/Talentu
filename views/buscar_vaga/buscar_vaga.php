<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Buscar Vaga</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/serializeObject.js" type="text/javascript"></script>
    <script src="js/buscar_vaga/script.js"></script>
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x1">
                    <div align="center">
                        <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-3505603995038341";
                        /* Anúncio 3 */
                        google_ad_slot = "2818231514";
                        google_ad_width = 320;
                        google_ad_height = 50;
                        //-->
                        </script>
                        <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script>
                    </div>

                    <form name="frmBusca" id="frmBusca">
						<?php
							foreach ($data['Joomla'] as $dados) {
								echo utf8_encode($dados['introtext']);
							}
						?>
							
                            
                            <span style="width: 100%; float: left; height: 30px;"></span>

                            <h2 style="position:relative; color: #999; font-size: 22px">Critérios de Busca<span class="img_vagas"></span></h2>


                            <div class="filters_multi">
                                    <label class="lbl_form b2" style="margin-top: 15px;">Área de Interesse</label>

                                    <select id="categoria" name="categoria" class="select_multi">
                                        <option value="0">Selecione</option>
                                        <? 
                                        if($data['Categoria']){
                                            foreach ($data['Categoria'] as $dados) { ?>

                                                <option value="<? echo $dados['Codigo'] ?>"><? echo utf8_encode($dados['Nome']) ?></option>
                                        <?
                                            }
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="filters_multi" style="margin-left: 32px;">
                                    <label class="lbl_form b2" style="margin-top: 15px;">Vaga</label>

                                    <select id="vaga" name="vaga" class="select_multi">
                                        <option value="0">Selecione</option>
                                    </select>
                            </div>

                            <span style="width: 100%; float: left; height: 30px;"></span>

                            <div class="search_item">
                                    <label class="lbl_form">estado</label>
                                    <select id="estado" name="estado" class="select_form">
                                        <option value="0">Selecione</option>
                                        <? 
                                        if($data['Estado']){
                                            foreach ($data['Estado'] as $dados) { ?>

                                                <option value="<? echo utf8_encode($dados['Nome']); ?>"><? echo utf8_encode($dados['Nome']); ?></option>
                                        <?
                                            }
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="search_item item_right">
                                    <label class="lbl_form">cidade</label>
                                    <select id="cidade" name="cidade" class="select_form">
                                        <option value="0">Selecione</option>
                                        <? 
                                        if($data['Cidade']){
                                            foreach ($data['Cidade'] as $dados) { ?>

                                                <option value="<? echo utf8_encode($dados['Nome']); ?>"><? echo utf8_encode($dados['Nome']) ?></option>
                                        <?
                                            }
                                        }
                                        ?>
                                    </select>
                            </div>

                            <span style="width: 100%; float: left;"></span>

                            <div class="filters_multi" style="margin-left: 0px;">
                                    <label class="lbl_form" style="margin-top: 15px;">PNE</label>

                                    <select id="pne" name="pne" class="select_multi">
                                        <option value="0">Selecione</option>
                                        <option value="1">Física</option>
                                        <option value="2">Auditiva</option>
                                        <option value="3">Visual</option>
                                        <option value="4">Mental</option>
                                        <option value="5">Múltiplas</option>
                                    </select>
                            </div>


                        <div style="float: left; width: 100%; margin-left: -79px;margin-top: 10px;">
                            <input id="Enviar" type="button" value="buscar"/>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
