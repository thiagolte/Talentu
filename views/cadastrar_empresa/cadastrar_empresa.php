<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Cadastrar Empresa</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
    <script src="js/maskedinput.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>
    <script src="js/validateCPF_CNPJ.js" type="text/javascript"></script>
    <script src="js/cadastrar_empresa/script.js"></script>

</head>

<body>
    <?= $data['vw_Login']  ?>
    <div class="center">
        <div class="containerCt">
            <div class="container">
            
            <form id="dadosPessoais" accept-charset="?" action="index.php?cadastrar_cv" method="post">
                <input id="Edicao" type="hidden" value="<?= $data['Edicao']  ?>" />
                <input id="slcdNumFunc" type="hidden" value="<?= $data['NumFunc']  ?>" />
                <input id="slcdAreaAtuacao" type="hidden" value="<?= $data['AreaAtuacao']  ?>" />
                
                <div class="box_x2">
                    <h1 class="title_pages"><?= $data['Metodo']  ?></h1>
                    <h2 class="sub_title">Dados da Empresa </h2>
                    
                    
                        <label class="lbl_form">e-mail</label>
                        <input id="Email" type="text" name="Email" class="input_form" value="<?= $data['Email']  ?>"/>
                        
                        <label class="lbl_form">nome do contato</label>
                        <input id="Nome" type="text" name="Nome" class="input_form" value="<?= $data['Nome']  ?>"/>
                        
                        <?php if($data['Edicao'] != 1){ ?>
                        <div class="half_inputs">
                            <label class="lbl_form half">crie sua senha</label>
                            <input id="Senha" id="Senha" name="Senha" type="password" class="input_form half" value="<?= $data['Senha']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">confirme sua senha</label>
                            <input name="reSenha" type="password" class="input_form half"/>
                        </div>
                        <?php } ?>
                        <div class="half_inputs">
                            <label class="lbl_form half">CNPJ</label>
                            <input id="Cnpj" name="Cnpj" type="text" class="input_form half" value="<?= $data['CNPJ']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">telefone</label>
                            <input id="Telefone" type="text" name="Telefone" class="input_form half" value="<?= $data['Telefone']  ?>"/>
                        </div>
                                               
                        <div class="half_inputs">
                            <label class="lbl_form half">cep</label>
                            <input id="Cep" name="Cep" type="text" class="input_form half" onBlur="getEndereco()" value="<?= $data['CEP']  ?>"/>
                        </div>
                        
                        <label class="lbl_form">endereço</label>
                        <input id="Endereco" name="Endereco" type="text" class="input_form" value="<?= $data['Endereco']  ?>"/>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">número</label>
                            <input id="Numero" name="Numero" type="text" class="input_form half" value="<?= $data['Numero']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">bairro</label>
                            <input id="Bairro" name="Bairro" type="text" class="input_form half" value="<?= $data['Bairro']  ?>"/>
                        </div>
                        
                        <label class="lbl_form">cidade</label>
                        <input id="Cidade" name="Cidade" type="text" class="input_form" value="<?= $data['Cidade']  ?>" disabled/>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">complemento</label>
                            <input id="Complemento" name="Complemento" type="text" class="input_form half" value="<?= $data['Complemento']  ?>"/>
                        </div>
                        
                        <div class="half_inputs">
                            <label class="lbl_form half">estado</label>
                            <input id="Estado" name="Estado" type="text" class="input_form half" value="<?= $data['Estado']  ?>" disabled />
                        </div>
                </div>
                
                <div class="buss_box">
                    <h1 class="title_pages">&nbsp;</h1>
                    <h2 class="sub_title">
                        Atuação
                    </h2>

                        <label class="lbl_form">número de funcionários</label>
                        <select id="NumFunc" name="NumFunc" class="select_form show selectsValidate2">
                            <option value="0">Selecione</option>
                            <option value="-Nenhum-">-Nenhum-</option>
                            <option value="1-25">1-25</option>
                            <option value="26-50">26-50</option>
                            <option value="51-100">51-100</option>
                            <option value="101-500">101-500</option>
                            <option value="501-1000">501-1000</option>
                            <option value="1000+">1000+</option>
                        </select>
                    
                        <label class="lbl_form">area de atuação</label>
                        <select id="AreaAtuacao" name="AreaAtuacao" class="select_form Categorias selectsValidate2">
                            <option value="0">Selecione</option>
                            <!-- são as mesmas areas do cv, só que sem subcategoria -->
                        </select>
                        
                        <label class="lbl_form">website da empresa</label>
                        <input id="Site" type="text" class="input_form" style="width: 418px!important;" value="<?= $data['Site']  ?>"/>

                        <label class="lbl_form">descrição da empresa</label>
                        <textarea id="Descricao" name="Descricao" class="txt_desc"><?= $data['Descricao']  ?></textarea>
                        
                        <a class="terms b2" href="Contrato_Busca_de_CV_gratuito.pdf" target="_blank">Termos de uso</a>
                        
                        <div class="acc">
                            <input type="checkbox" name="acceptTerms"/>
                            <label class="lbl_term" style="width: 200px;">Li e aceito os termos de uso</label>
                        </div>
                    
                </div>
                <div style="float: left; width: 577px; margin:60px 40px 0 0;">
                    <?if($data['Edicao'] > 0){?>
                        <input id="Enviar" type="submit" value="finalizar edição" style="float: right;"/>
                    <?}else{?>
                        <input id="Enviar" type="submit" value="finalizar cadastro" style="float: right;"/>
                    <?}?>
                </div>
              
              </form>  
                
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
