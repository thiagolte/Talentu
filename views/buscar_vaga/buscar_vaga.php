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
                    //    foreach ($data['Joomla'] as $dados) {
                      //      echo utf8_encode($dados['introtext']);
                        //}
                    ?>
					
                    
                    <h1 class="title_pages">Busca de Vagas</h1>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed ipsum et augue varius dignissim nec eu ante. Aliquam eget tellus velit, sed viverra erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa neque, ultricies in sagittis id, consequat quis augue.
					</p>
					<p>Sed non lacinia urna. Mauris arcu tellus, malesuada vel eleifend nec, scelerisque vitae sapien. Mauris hendrerit metus est, eu consectetur erat. Phasellus massa mi, auctor ut aliquam non, sagittis id diam. Vestibulum tellus arcu, vehicula ac pharetra ut, porttitor et diam.	
					</p>
					
					<span style="width: 100%; float: left; height: 30px;"></span>
                    
					<h2 style="position:relative; color: #999; font-size: 22px">Critérios de Busca<span class="img_vagas"></span></h2>
					
					
					<div class="filters_multi">
						<label class="lbl_form b2" style="margin-top: 15px;">Área de Interesse</label>
						
						<select multiple class="select_multi">
						  <option>asdasd</option>
						  <option>asdasd</option>
						</select>
					</div>
					
					<div class="filters_multi" style="margin-left: 32px;">
						<label class="lbl_form b2" style="margin-top: 15px;">Vaga</label>
						
						<select multiple class="select_multi">
						  <option>asdasd</option>
						  <option>asdasd</option>
						</select>
					</div>
					
					<span style="width: 100%; float: left; height: 30px;"></span>

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
					
					<span style="width: 100%; float: left;"></span>

					<div class="filters_multi">
						<label class="lbl_form" style="margin-top: 15px;">Faixa Salarial</label>
						
						<select multiple class="select_multi">
						  <option>asdasd</option>
						  <option>asdasd</option>
						</select>
					</div>
					
					<div class="filters_multi" style="margin-left: 32px;">
						<label class="lbl_form" style="margin-top: 15px;">PNE</label>
						
						<select multiple class="select_multi">
						  <option>asdasd</option>
						  <option>asdasd</option>
						</select>
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
