<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Cadastrar Vaga</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>


</head>
	
<body>
    <?= $data['vw_Login']  ?>
    <div class="center">
        <div class="containerCt">
            <div class="container">

                                 
                <div class="box_x2">
                    <h1 class="title_pages">Cadastro de nova vaga</h1>
                    <h2 class="sub_title" style="font-size: 17px;">Dados da empresa onde o candidato irá trabalhar </h2>
                    
					<div class="radio_lbl">
						<input type="radio" name="empresa"/>
						<label class="lbl_form">vaga na minha empresa</label>
					</div>
					
					<div class="radio_lbl">
                    	<input type="radio" name="empresa"/>
						<label class="lbl_form">vaga em outra empresa</label>
					</div>
					    

                    <label class="lbl_form b2" style="margin-top: 15px;">Nome da empresa confidencial</label>
                    <select class="select_form" value="" style="width: 130px">
						<option value="0">Não</option>
						<option value="1">Sim</option>
                    </select>
					
					<label class="lbl_form b2" style="margin-top: 15px;">Ramo de atuação da empresa</label>
                    <select class="select_form" value="" style="width: 395px;">
						<option value="0">Selecione</option>
						<option value="1">Outro</option>
                    </select>
					
					<label class="lbl_form b2" style="margin-top: 15px;">Nacionalidade da empresa</label>
                    <select class="select_form" value="" style="width: 130px;">
						<option value="0">Nacional</option>
						<option value="1">Multinacional</option>
                    </select>
					
                </div>
                
                <div class="box_x2 right_box" style="float: left!important; background: none!important">
					
					<label class="lbl_form b2" style="margin-top: 100px;">Porte da empresa</label>
                    <select class="select_form" value="" style="width: 432px;">
						<option value="0">Selecione</option>
						<option value="1">pequeno (de 1 a 99 funcionários)</option>
						<option value="1">médio (de 100 a 499 funcionários)</option>
						<option value="1">grande (mais de 500 funcionários)</option>
                    </select>
					
					<label class="lbl_form">Descrição sumária da empresa</label>
					<textarea class="txt_search" style="width: 420px!important; height: 157px;"></textarea>

                </div>
				
				<div class="spacer"></div>
				
				<div class="box_x2">									
					<h2 class="sub_title">Dados da vaga </h2>
										
					<label class="lbl_form">Atribuições e Responsabilidades</label>
					<textarea class="txt_search" style="width: 383px!important; height: 80px;"></textarea>
					
					<label class="lbl_form">Experiência e habilidades</label>
					<textarea class="txt_search" style="width: 383px!important; height: 80px;"></textarea>
					
					<label class="lbl_form">Escolaridade</label>
					<select class="select_form" value="" style="width: 395px;">
						<option value="0">Selecione</option>
                    </select>
					
					<label class="lbl_form">Qualificações: <span>(cursos, certificações e conhecimentos)</span></label>
					<textarea class="txt_search" style="width: 383px!important; height: 80px;"></textarea>
					
					<label class="lbl_form b2">Categoria da area de atuação do profissional</label>
					<select class="select_form" value="" style="width: 395px;">
						<option value="0">Selecione</option>
                    </select>
					
					<label class="lbl_form b2">Vaga de atuação do profissional</label>
					<select class="select_form" value="" style="width: 395px;">
						<option value="0">Selecione</option>
                    </select>
				</div>
				
				<div class="box_x2 right_box" style="float: left!important; background: none!important">
					<h2 class="sub_title">Observações da vaga</h2>
					
					<label class="lbl_form b2">Salário mensal</label>
					<div class="radio_lbl" style="margin-top: 5px;">
						<input type="checkbox"/>
						<label class="lbl_form">a combinar</label>
					</div>
					
					<input type="text" class="input_form" value="tratar valor" style="width: 200px"/>
					
					<label class="lbl_form b2">Regime de contratação</label>
					<select class="select_form" value="" style="width: 432px;">
						<option value="0">Selecione</option>
                    </select>
					
					<label class="lbl_form">Benefícios</label>
					<textarea class="txt_search" style="width: 420px!important; height: 80px; margin"></textarea>
					
					<label class="lbl_form">Regime de trabalho: <span>(dia, escala, etc)</span></label>
					<input type="text" class="input_form" style="width: 420px;">
					
					<label class="lbl_form">Horário: </label>
					<span class="hours">a partir das</span>
					<select class="select_form" value="" style="width: 100px;">
						<option value="0">Selecione</option>
                    </select>
					<span class="hours" style="margin-left: 10px">até as</span>
					<select class="select_form" value="" style="width: 100px;">
						<option value="0">Selecione</option>
                    </select>
					
					<label class="lbl_form b2">Meios para receber candidatos:</label>
					<div class="radio_lbl2">
						<input type="radio" name="forma_contato"/>
						<label class="lbl_form">Telefone</label>
					</div>
					
					<div class="radio_lbl2">
                    	<input type="radio" name="forma_contato"/>
						<label class="lbl_form">E-mail</label>
					</div>
					
					<div class="radio_lbl2">
                    	<input type="radio" name="forma_contato"/>
						<label class="lbl_form">Telefone e E-mail</label>
					</div>
					
					<input type="text" class="input_form" style="width: 420px;">
					<input type="text" class="input_form" style="width: 194px;">
					<input type="text" class="input_form" style="width: 194px; float: right; margin-right: -2px!important">
					
					<label class="lbl_form">Ativar Vagar?</label>
					<div class="radio_lbl2">
						<input type="radio" checked="true" name="ativar"/>
						<label class="lbl_form">Sim</label>
					</div>
					
					<div class="radio_lbl2">
                    	<input type="radio" name="ativar"/>
						<label class="lbl_form">Não</label>
					</div>
				</div>
				
                <div style="float: left; width: 577px; margin:40px 40px 0 0;">
					<input id="Enviar" type="submit" value="cadastrar vaga" style="float: right;"/>
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
