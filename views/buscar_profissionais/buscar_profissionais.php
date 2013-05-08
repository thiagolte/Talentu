<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Buscar Profissionais</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/buscar_profissionais/script.js"></script>
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <div class="box_x1">
                    
                    <?php
                        foreach ($data['Joomla'] as $dados) {
                            echo utf8_encode($dados['introtext']);
                        }
                    ?>
                    
                    <h2>Critérios de Busca</h2>

                    <div style="width: 610px; float:left;">
                        <div class="search_item">
                            <label class="lbl_form">sexo</label>
                            <select id="Sexo" class="select_form">
                                <option value="0">Selecione</option>
                                <option value="1">masculino</option>
                                <option value="2">feminino</option>
                            </select>
                        </div>

                        <div class="search_item item_right">
                            <label class="lbl_form">faixa etária</label>
                            <select id="Idade" class="select_form">
                                <option value="0 AND 120">Selecione</option>
                                <option value="16 AND 21">16 - 21</option>
                                <option value="21 AND 26">21 - 26</option>
                                <option value="26 AND 30">26 - 30</option>
                                <option value="30 AND 35">30 - 35</option>
                                <option value="35 AND 45">35 - 45</option>
                                <option value="45 AND 120">Mais de 45</option>
                            </select>
                        </div>

                        <div class="search_item">
                            <label class="lbl_form">estado</label>
                            <select id="Estado" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>

                        <div class="search_item item_right">
                            <label class="lbl_form">cidade</label>
                            <select id="Cidade" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>

                        <div class="search_item">
                            <label class="lbl_form">área de interesse</label>
                            <select id="Areas" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>

                        <div class="search_item item_right">
                            <label class="lbl_form">Vaga</label>
                            <select id="Vaga" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        
                        <div class="search_item">
                            <label class="lbl_form">pretensão salarial</label>
                            <select id="Pretencao" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                    
                        <div class="search_item item_right">
                            <label class="lbl_form">PNE</label>
                            <select id="PNE" class="select_form">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        
                    </div>
                
                    <div class="tags_search">
                        <label class="lbl_form">palavras chave<br/> <span style="margin-top: 9px; float: left;">(exemplo: pro-ativo, comprometido)</span></label>
                        <textarea id="Palavra" class="txt_search"></textarea>
                    </div>
                    
                    <div style="float: left; width: 100%;">
                        <input id="Enviar" type="submit" value="buscar" style="float: right;"/>
                    </div>

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
