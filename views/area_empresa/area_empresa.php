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
    <script type="text/javascript" src="js/area_empresa/script.js"></script>
  
    <script type="text/javascript">
      $(document).ready(function() {
        $('#deslogar').on('click', function() {
            $('#Sair').trigger('click');
        });
      });
    </script>  
</head>
  
<style>
    .hide_ {
        display: none;
    }    
</style>    
  
<body>
    <?= $data['vw_Login']  ?>
       
    <div class="center">
        <div class="containerCt">
            <div class="container">
                
                <div class="internal_menu">
                    <ul>
                        <li><a href="?cadastrar_empresa&Editar=1">editar dados cadastrais</a></li>
                        <!--<li><a>Adicionar Nova vaga</a></li>-->
                        <li><a href="?buscar_profissionais">buscar profissionais</a></li>
                        <li><a href="Contrato_Busca_de_CV_gratuito.pdf" target="_blank">contrato de serviço</a></li>
                        <?php if($_COOKIE['Status'] == 1){ ?>
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
                    
                    <label class="lbl_pre">Número de funcionários: <span><?= $_COOKIE['NumFunc']?></span></label>
                    <label class="lbl_pre">Área de atuação: <span><?= $_COOKIE['AreaAtuacao']?></span></label>
                    <label class="lbl_pre">Website da empresa: <a href="<?= $_COOKIE['Site']?>" target="_blank"><span><?= $_COOKIE['Site']?></span></a></label>
                    <label class="lbl_pre">Cidade/Estado: <span><?= $_COOKIE['Cidade']?> - <?= $_COOKIE['Estado']?></span></label>
                    
                </div>
                
                <div class="internal_img_base">
                    <span class="img_cad"></span>
                </div>
                
                <span class="spacer" style="margin-top: 0!important;"></span>
                
                <div class="box_x2" style="width: 963px; display: none;">
                    <div style="float: left; width: 100%;">
                    <h2 class="sub_title" style="width: 500px;">Meus anúncios de vagas ativas</h2>
                    
                    <a class="btn_big">adicionar nova vaga</a>
                    </div>
                    
                    <div class="vacancy_item">
                        <h1>Motorista Particular</h1>
                        
                        <div class="vacancy_item_txt">
                            <p>
                                <strong>Salário: </strong>R$ 1.372,00<br/>
                                <strong>Local: </strong> São Paulo - SP<br/><br/>
                                <strong>Sobre a Vaga: </strong>Dar suporte aos alunos, professores, sócios e outros 
                                usuários durante suas pesquisas, na utilização da 
                                biblioteca. Garantir a organização da biblioteca...
                                
                            </p>
                            
                            <div class="vacancy_ct_buttons">
                            <a class="btn_default btn_vacancy">Visualizar</a>
                            <a class="btn_default btn_vacancy">Editar</a>
                            <a class="btn_default btn_vacancy">Excluir</a>
                            </div>
                        
                        </div>
                    </div>
                    
                    <div class="vacancy_item">
                        <h1>Motorista de Transporte Público</h1>
                        
                        <div class="vacancy_item_txt">
                            <p>
                                <strong>Salário: </strong>R$ 1.372,00<br/>
                                <strong>Local: </strong> São Paulo - SP<br/><br/>
                                <strong>Sobre a Vaga: </strong>Dar suporte aos alunos, professores, sócios e outros 
                                usuários durante suas pesquisas, na utilização da 
                                biblioteca. Garantir a organização da biblioteca...
                                
                            </p>
                            
                            <div class="vacancy_ct_buttons">
                            <a class="btn_default btn_vacancy">Visualizar</a>
                            <a class="btn_default btn_vacancy">Editar</a>
                            <a class="btn_default btn_vacancy">Excluir</a>
                            </div>
                        
                        </div>
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