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
        <script src="js/serializeObject.js" type="text/javascript"></script>
        <script src="js/cadastrar_vaga/script.js" type="text/javascript"></script>
    </head>

    <body>
        <?= $data['vw_Login']  ?>
        <div class="center">
            <div class="containerCt">
                <div class="container">
                    <form id="frmVagas">
                        <div class="box_x2">
                            <h1 class="title_pages">Cadastro de nova vaga</h1>
                            <h2 class="sub_title" style="font-size: 17px;">Dados da empresa onde o candidato irá trabalhar </h2>

                            <input name="empresa" type="hidden" value="1"/>
                            
                            <div class="radio_lbl">
                                    <input type="radio" name="local" value="1"/>
                                    <label class="lbl_form">vaga na minha empresa</label>
                            </div>

                            <div class="radio_lbl">
                                <input type="radio" name="local" value="2"/>
                                <label class="lbl_form">vaga em outra empresa</label>
                            </div>


                            <label class="lbl_form b2" style="margin-top: 15px;">Nome da empresa confidencial</label>
                            <select name="confidencial" class="select_form" value="" style="width: 130px">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                            <label class="lbl_form b2" style="margin-top: 15px;">Ramo de atuação da empresa</label>
                            <select name="ramoAtuacao" class="select_form" value="" style="width: 395px;">
                                <option value="0">Selecione</option>
                                <option value="1">Outro</option>
                            </select>

                            <label class="lbl_form b2" style="margin-top: 15px;">Nacionalidade da empresa</label>
                            <select name="nacionalidade" class="select_form" value="" style="width: 130px;">
                                <option value="0">Nacional</option>
                                <option value="1">Multinacional</option>
                            </select>

                        </div>

                        <div class="box_x2 right_box" style="float: left!important; background: none!important">

                            <label class="lbl_form b2" style="margin-top: 100px;">Porte da empresa</label>
                            <select name="porte" class="select_form" value="" style="width: 432px;">
                                <option value="0">Selecione</option>
                                <option value="1">pequeno (de 1 a 99 funcionários)</option>
                                <option value="2">médio (de 100 a 499 funcionários)</option>
                                <option value="3">grande (mais de 500 funcionários)</option>
                            </select>

                            <label class="lbl_form">Descrição sumária da empresa</label>
                            <textarea name="descricao" class="txt_search" style="width: 420px!important; height: 157px;"></textarea>

                        </div>

                        <div class="spacer"></div>

                        <div class="box_x2">									
                            <h2 class="sub_title">Dados da vaga </h2>

                            <label class="lbl_form">Quantidade de Vagas</label>
                            <input name="quantidade" type="text" class="input_form" style="width: 383px;">

                            <label class="lbl_form">Atribuições e Responsabilidades</label>
                            <textarea name="atribuicoes" name="" class="txt_search" style="width: 383px!important; height: 60px;"></textarea>

                            <label class="lbl_form">Experiência e habilidades</label>
                            <textarea name="experiencia" class="txt_search" style="width: 383px!important; height: 60px;"></textarea>

                            <label class="lbl_form">Escolaridade</label>
                            <select name="escolaridade" class="select_form" value="" style="width: 395px;">
                                <option value="0">Selecione</option>
                                <? 
                                if($data['Grau']){
                                    foreach ($data['Grau'] as $dados) { ?>

                                        <option value="<? echo $dados['Codigo'] ?>"><? echo utf8_encode($dados['Nome']) ?></option>
                                <?
                                    }
                                }
                                ?>
                            </select>

                            <label class="lbl_form">Qualificações: <span>(cursos, certificações e conhecimentos)</span></label>
                            <textarea name="qualificacoes" class="txt_search" style="width: 383px!important; height: 60px;"></textarea>

                            <label class="lbl_form b2">Categoria da area de atuação do profissional</label>
                            <select name="categoria" class="select_form" value="" style="width: 395px;">
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

                            <label class="lbl_form b2">Vaga de atuação do profissional</label>
                            <select name="vaga" class="select_form" value="" style="width: 395px;">
                                <option value="0">Selecione</option>
                            </select>
                        </div>

                        <div class="box_x2 right_box" style="float: left!important; background: none!important">
                            <h2 class="sub_title">Observações da vaga</h2>

                            <label class="lbl_form b2">Salário mensal</label>
                            <div class="radio_lbl" style="margin-top: 5px;">
                                <input name="salarioCombinar" type="checkbox"/>
                                <label class="lbl_form">a combinar</label>
                            </div>

                            <input name="salario" type="text" class="input_form" value="tratar valor" style="width: 200px"/>

                            <label class="lbl_form b2">Regime de contratação</label>
                            <select name="regimeContratacao" class="select_form" value="" style="width: 432px;">
                                <option value="0">Selecione</option>
                            </select>

                            <label class="lbl_form">Benefícios</label>
                            <textarea name="beneficios" class="txt_search" style="width: 420px!important; height: 80px; margin"></textarea>

                            <label class="lbl_form">Regime de trabalho: <span>(dia, escala, etc)</span></label>
                            <input name="regimeTrabalho" type="text" class="input_form" style="width: 420px;">

                            <label class="lbl_form">Horário: </label>
                            <span class="hours">a partir das</span>
                            <select name="horarioDe" class="select_form" value="" style="width: 100px;">
                                <option value="0">Selecione</option>
                            </select>
                            <span class="hours" style="margin-left: 10px">até as</span>
                            <select name="horarioAte" class="select_form" value="" style="width: 100px;">
                                <option value="0">Selecione</option>
                            </select>

                            <label class="lbl_form b2">Meios para receber candidatos:</label>

                            <div class="radio_lbl2">
                                <input name="meiosRecebimento" type="radio" id="other_unSelected" name="forma_contato" value="0"/>
                                <label class="lbl_form">E-mail de cadastro</label>
                            </div>

                            <div class="radio_lbl2">
                                <input name="meiosRecebimento" type="radio" id="other_selected" name="forma_contato" value="1"/>
                                <label class="lbl_form">Outro e-mail</label>
                            </div>

                            <input name="emailRecebimento" type="text" class="input_form other_mail" style="width: 420px; display: none; margin-bottom: 3px!important">

                            <label class="lbl_form b2" style="margin-top: 15px;">Ativar Vagar?</label>
                            <div class="radio_lbl2">
                                <input name="ativar" type="radio" checked="true" value="1"/>
                                <label class="lbl_form">Sim</label>
                            </div>

                            <div class="radio_lbl2">
                                <input name="ativar" type="radio" value="0"/>
                                <label class="lbl_form">Não</label>
                            </div>
                        </div>

                        <div class="spacer"></div>

                        <div class="box_x2" style="width: 915px;">									
                            <h2 class="sub_title">Questão Personalizada</h2>

                            <label class="lbl_form" style="margin-bottom: 5px;">
                                    É permitido solicitar ao candidato que comente sua formação acadêmica, experiência na função e quais suas atividades, mas para atender as solicitações legais, NÃO É PERMITIDO perdir que ele informe ou comprove o tempo de experiência ou formação.
                            </label>
                            <label class="lbl_form2" style="width: 100%; margin: 0 0 10px 0;">É possível inserir até 5 questões.</label>

                            <div class="question_item" id="00">
                                <label class="lbl_form b2">
                                        1ª Questão:
                                </label>

                                <textarea name="questao1" class="txt_search" style="width: 99%; height: 30px;"></textarea>

                                <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="tipoResposta1" value="1"/>
                                    <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="tipoResposta1" value="2" />
                                    <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                </div>

                                <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="filtroAtivo1" value="1"/>
                                    <label class="lbl_form">Sim</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="filtroAtivo1" value="0"/>
                                    <label class="lbl_form">Não</label>
                                </div>
                            </div>

                            <div class="question_item" id="01" style="display: none;">
                                <label class="lbl_form b2">
                                        2ª Questão:
                                </label>

                                <textarea name="questao2" class="txt_search" style="width: 99%; height: 30px;"></textarea>

                                <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="tipoResposta2" value="1"/>
                                    <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="tipoResposta2" value="2"/>
                                    <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                </div>

                                <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="filtroAtivo2" value="1"/>
                                    <label class="lbl_form">Sim</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="filtroAtivo2" value="0"/>
                                    <label class="lbl_form">Não</label>
                                </div>
                            </div>

                            <div class="question_item" id="02" style="display: none;">
                                <label class="lbl_form b2">
                                        3ª Questão:
                                </label>

                                <textarea name="1uestao3" class="txt_search" style="width: 99%; height: 30px;"></textarea>

                                <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="tipoResposta3" value="1"/>
                                    <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="tipoResposta3" value="2"/>
                                    <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                </div>

                                <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="filtroAtivo3" value="1"/>
                                    <label class="lbl_form">Sim</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="filtroAtivo3" value="0"/>
                                    <label class="lbl_form">Não</label>
                                </div>
                            </div>

                            <div class="question_item" id="03" style="display: none;">
                                <label class="lbl_form b2">
                                        4ª Questão:
                                </label>

                                <textarea name="questao4" class="txt_search" style="width: 99%; height: 30px;"></textarea>

                                <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="tipoResposta4" value="1"/>
                                    <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="tipoResposta4" value="2"/>
                                    <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                </div>

                                <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="filtroAtivo4" value="1"/>
                                    <label class="lbl_form">Sim</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="filtroAtivo4" value="0"/>
                                    <label class="lbl_form">Não</label>
                                </div>
                            </div>

                            <div class="question_item" id="04" style="display: none;">
                                <label class="lbl_form b2">
                                        5ª Questão:
                                </label>

                                <textarea name="questao5" class="txt_search" style="width: 99%; height: 30px;"></textarea>

                                <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="tipoResposta5" value="1"/>
                                    <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="tipoResposta5" value="2"/>
                                    <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                </div>

                                <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                <div class="radio_lbl2">
                                    <input type="radio" checked="true" name="filtroAtivo5" value="1"/>
                                    <label class="lbl_form">Sim</label>
                                </div>

                                <div class="radio_lbl2">
                                    <input type="radio" name="filtroAtivo5" value="0"/>
                                    <label class="lbl_form">Não</label>
                                </div>
                            </div>

                            <a class="btn_default" id="add_question"  data-number="1" style="float: left; margin-bottom: 15px;">+ Adicionar outra questão</a>
                        </div>

                        <div class="spacer"></div>

                        <div class="box_x2" style="width: 915px;">
                            <h2 class="sub_title">Filtro de CV</h2>
                            <label class="lbl_form" style="margin-bottom: 15px;">
                                    Esses filtros visam apenas agilizar o seu processo seletivo e somente devem ser utilizados se forem realmente imprescindíveis para a função a ser desempenhada.
                            </label>

                            <label class="lbl_form b2" style="margin-top: 15px;">Sexo</label>
                            <div class="radio_lbl2">
                                <input type="radio" name="filtroSexo" value="1"/>
                                <label class="lbl_form">Masculino</label>
                            </div>

                            <div class="radio_lbl2">
                                <input type="radio" name="filtroSexo" value="2"/>
                                <label class="lbl_form">Feminino</label>
                            </div>

                            <span style="width: 100%; float: left;"></span>

                            <div class="filters_multi">
                                <label class="lbl_form b2" style="margin-top: 15px;">Faixa Etária</label>

                                <select name="filtroFaixaEtaria" multiple class="select_multi">
                                    <option value="1">asdasd</option>
                                    <option value="2">asdasd</option>
                                </select>
                            </div>

                            <div class="filters_multi" style="margin-left: 32px;">
                                <label class="lbl_form b2" style="margin-top: 15px;">Pretensão salarial</label>

                                <select name="filtroPretensaoSalarial" multiple class="select_multi">
                                    <? 
                                    if($data['Pretencao']){
                                        foreach ($data['Pretencao'] as $dados) { ?>
                                    
                                            <option value="<? echo $dados['Codigo'] ?>"><? echo utf8_encode($dados['Nome']) ?></option>
                                    <?
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="filters_multi" style="float: right;">
                                <label class="lbl_form b2" style="margin-top: 15px;">PNE</label>

                                <select name="filtroPNE" multiple="multiple" class="select_multi">                                   
                                  <option value="1">Física</option>
                                  <option value="2">Auditiva</option>
                                  <option value="3">Visual</option>
                                  <option value="4">Mental</option>
                                  <option value="5">Múltiplas</option>
                                </select>
                            </div>

                            <div class="filters_multi">
                                <label class="lbl_form b2" style="margin-top: 15px;">Estado</label>

                                <select name="filtroEstado" multiple="multiple" class="select_multi cities">
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

                            <div class="filters_multi" style="margin-left: 32px;">
                                <label class="lbl_form b2" style="margin-top: 15px;">Cidade</label>

                                <select name="filtroCidade" multiple="multiple" class="select_multi cities">
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
                        </div>

                        <div style="float: left; width: 577px; margin:40px 40px 0 0;">
                            <input id="Enviar" type="button" value="cadastrar vaga" style="float: right;"/>
                        </div>

                        <div id="Retorno"></div>
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
