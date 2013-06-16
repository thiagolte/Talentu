<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - Fale Conosco</title>
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
                <div class="box_x2" style="width: 963px;">
                    <? if($data['Vaga']){ 
                        foreach($data['Vaga'] as $dado){ ?>
                            <h1 class="title_pages"><? echo utf8_decode( $dado['Vaga'] ); ?></h1>

                            <div class="vacancy_full">
                                <label class="lbl_pre">Salário: <span><? echo utf8_decode( $dado['Salario'] ); ?></span></label>
                                <label class="lbl_pre">Area de Atuação: <span><? echo utf8_decode( $dado['AreaAtuacao'] ); ?></span></label>
                                <label class="lbl_pre">Empresa: <span><? echo utf8_decode( $dado['Empresa'] ); ?></span></label>
                                <label class="lbl_pre">Local: <span><? echo utf8_decode( $dado['Local'] ); ?></span></label>
                                <label class="lbl_pre">Porte da Empresa: <span><? echo ( $dado['Porte'] ); ?></span></label>
                                <label class="lbl_pre">Nacionalidade da empresa: <span><? echo utf8_decode( $dado['Nacionalidade'] ); ?></span></label>
                                <label class="lbl_pre">Ramo de atuação da empresa: <span><? echo utf8_encode( $dado['Ramo'] ); ?></span></label>
                                <label class="lbl_pre">Vaga: <span><? echo utf8_decode( $dado['Vaga'] ); ?></span></label>
                                <label class="lbl_pre">Quantidade de vagas: <span><? echo utf8_decode( $dado['Qtd'] ); ?></span></label>
                                <label class="lbl_pre">Regime de contratação: <span><? echo ( $dado['RegimeContratacao'] ); ?></span></label>
                                <label class="lbl_pre">Atribuições e Responsabilidades: <span><? echo utf8_decode( $dado['Atribuicoes'] ); ?></span>
                                </label>
                                <label class="lbl_pre">Experiência e habilidades: <span><? echo utf8_decode( $dado['Experiencia'] ); ?></span></label>
                                <label class="lbl_pre">Escolaridade: <span><? echo utf8_encode( $dado['Escolaridade'] ); ?></span></label>
                                <label class="lbl_pre">Qualificações: <span><? echo utf8_decode( $dado['Qualificacoes'] ); ?></span></label>
                                <label class="lbl_pre">Benefícios: <span><? echo utf8_decode( $dado['Beneficios'] ); ?></span>
                                </label>
                                <label class="lbl_pre">Regime de trabalho/horário: <span><? echo utf8_decode( $dado['Regime'] ); ?></span></label>
                                

                                <? for($i == 0; $i <=5; $i++){ ?>
                                    <? if(!empty( $dado['Questao' . $i] )){ ?>
                                        <div>
                                        <label class="lbl_pre"><? echo utf8_decode( $dado['Questao' . $i] ); ?></label>
                                        <? if( utf8_decode( $dado['TipoResposta' . $i] ) == 1 ){ ?>
                                            <textarea class="txt_search" style="margin: 0 0 20px 0;"></textarea>
                                        <? }else{ ?>
                                            <span>SIM</span>
                                            <input type="radio" name="question<? echo $i ?>">
                                            <span>NÃO</span>
                                            <input type="radio" name="question1">
                                        <? } ?>
                                        </div>
                                    <? } ?>
                                <?}?>
                            </div>

                            <div class="btn_container">
                                <a class="btn_default" style="float: left;">Candidatar-se a esta vaga</a>
                            </div>
                    
                   <?
                        }
                    }
                   ?>
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
