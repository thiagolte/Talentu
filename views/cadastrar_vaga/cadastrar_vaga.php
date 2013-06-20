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
        <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
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

                            <? if($data['Editar'] == 1){ ?>
                                <input name="idVaga" type="hidden" value="<? echo $_GET['idVaga'] ?>"/>
                                <input name="idFiltro" type="hidden" value="<? echo $_GET['idFiltro'] ?>"/>
                                
                                <input id="slcEstadoEmpresa" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['EstadoEmpresa'] ) ?>"/>
                                <input id="slcEmpresaConfidencial" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Confidencial'] ) ?>"/>
                                <input id="slcRamoAtuacao" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Ramo'] ) ?>"/>
                                <input id="slcNacionalidade" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Nacionalidade'] ) ?>"/>
                                <input id="slcPorteEmpresa" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Porte'] ) ?>"/>
                                <input id="slcEscolaridade" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Escolaridade'] ) ?>"/>
                                <input id="slcCategoria" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Categoria'] ) ?>"/>
                                <input id="slcVaga" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Vaga'] ) ?>"/>
                                <input id="slcRegimeContratacao" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['RegimeContratacao'] ) ?>"/>
                                <input id="slcHorario" type="hidden" value="<? echo utf8_decode( $data['dadosVaga'][0]['Horaio'] ) ?>"/>
                                
                                <input id="slcFiltroFaixaEtaria" type="hidden" value="<? echo utf8_decode( $data['dadosFiltro'][0]['Faixa'] ) ?>"/>
                                <input id="slcFiltroPretencaoSalarial" type="hidden" value="<? echo utf8_decode( $data['dadosFiltro'][0]['Pretencao'] ) ?>"/>
                                <input id="slcFiltroPNE" type="hidden" value="<? echo utf8_decode( $data['dadosFiltro'][0]['PNE'] ) ?>"/>
                                <input id="slcFiltroEstado" type="hidden" value="<? echo utf8_decode( $data['dadosFiltro'][0]['Estado'] ) ?>"/>
                                <input id="slcFiltroCidade" type="hidden" value="<? echo utf8_decode( $data['dadosFiltro'][0]['Cidade'] ) ?>"/>
                            <? } ?>
                            
                            <? if($data['Editar'] == 1){
                                $LocalMinha = '';
                                $LocalOutra = '';
                                if($data['dadosVaga'][0]['Local'] == 1){
                                    $LocalMinha = 'checked';
                                }else{
                                    $LocalOutra = 'checked';
                                }
                            } ?>
                                
                            <div class="radio_lbl">
                                <input type="radio" checked name="local" id="mesma" value="1" <? echo $LocalMinha ?> />
                                <label class="lbl_form">vaga na minha empresa</label>
                            </div>

                            <div class="radio_lbl">
                                <input type="radio" name="local" id="outra" value="2" <? echo $LocalOutra ?>/>
                                <label class="lbl_form">vaga em outra empresa</label>
                            </div>
							
                            <div class="outra_empresa" style="display: none;">
                                    <label class="lbl_form b2">Nome da Empresa</label>
                                    <input name="NomeEmpresa" id="NomeEmpresa" type="text" class="input_form" style="width: 383px;" value="<? echo utf8_decode( $data['dadosVaga'][0]['NomeEmpresa'] ) ?>">
                            </div>

                            <label class="lbl_form b2">Local<span>(cidade e estado)</span></label>
                            <input name="CidadeEmpresa" id="CidadeEmpresa" type="text" class="input_form" style="width: 288px;" value="<? echo utf8_decode( $data['dadosVaga'][0]['CidadeEmpresa'] ) ?>">
                                <select name="EstadoEmpresa" id="EstadoEmpresa" class="select_form" style="width: 80px; margin-left: 15px;">
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

                            <label class="lbl_form b2">Nome da empresa confidencial</label>
                            <select id="confidencial" name="confidencial" class="select_form" value="" style="width: 130px">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                            <label class="lbl_form b2">Ramo de atuação da empresa</label>
                            <select id="ramoAtuacao" name="ramoAtuacao" class="select_form" value="" style="width: 395px;">
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

                        <div class="box_x2 right_box" style="float: left!important; background: none!important">
							
							<label class="lbl_form b2" style="margin-top: 96px;">Nacionalidade da empresa</label>
                            <select id="nacionalidade" name="nacionalidade" class="select_form" value="" style="width: 130px;">
                                <option value="0">Nacional</option>
                                <option value="1">Multinacional</option>
                            </select>

                            <label class="lbl_form b2">Porte da empresa</label>
                            <select id="porte" name="porte" class="select_form" value="" style="width: 432px;">
                                <option value="0">Selecione</option>
                                <option value="1">pequeno (de 1 a 99 funcionários)</option>
                                <option value="2">médio (de 100 a 499 funcionários)</option>
                                <option value="3">grande (mais de 500 funcionários)</option>
                            </select>

                            <label class="lbl_form">Descrição sumária da empresa</label>
                            <textarea name="descricao" class="txt_search" style="width: 420px!important; height: 148px;"><? echo utf8_decode( $data['dadosVaga'][0]['Descricao'] ) ?></textarea>

                        </div>
						
                        <div class="spacer"> </div>

                        <div class="box_x2">									
                            <h2 class="sub_title">Dados da vaga </h2>

                            <label class="lbl_form">Quantidade de Vagas<span>(apenas números)</span></label>
                            <input name="quantidade" id="quantidade" type="text" class="input_form numbers" style="width: 383px;" value="<? echo utf8_decode( $data['dadosVaga'][0]['Qtd'] ) ?>">

                            <label class="lbl_form">Atribuições e Responsabilidades</label>
                            <textarea name="atribuicoes" id="atribuicoes" class="txt_search" style="width: 383px!important; height: 60px;"><? echo utf8_decode( $data['dadosVaga'][0]['Atribuicoes'] ) ?></textarea>

                            <label class="lbl_form">Experiência e habilidades</label>
                            <textarea name="experiencia" id="experiencia" class="txt_search" style="width: 383px!important; height: 60px;"><? echo utf8_decode( $data['dadosVaga'][0]['Experiencia'] ) ?></textarea>

                            <label class="lbl_form">Escolaridade</label>
                            <select id="escolaridade" name="escolaridade" class="select_form" value="" style="width: 395px;">
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
                            <textarea name="qualificacoes" class="txt_search" style="width: 383px!important; height: 60px;"><? echo utf8_decode( $data['dadosVaga'][0]['Qualificacoes'] ) ?></textarea>

                            <label class="lbl_form b2">Categoria da area de atuação do profissional</label>
                            <select id="categoria" name="categoria" class="select_form" value="" style="width: 395px;">
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
                            <select id="vaga" name="vaga" class="select_form" value="" style="width: 395px;">
                                <option value="0">Selecione</option>
                            </select>
                        </div>

                        <div class="box_x2 right_box" style="float: left!important; background: none!important">
                            <h2 class="sub_title">Observações da vaga</h2>

                            <label class="lbl_form b2">Salário mensal</label>
                            
                            <? if($data['Editar'] == 1){
                                $ACombinar = '';
                                if($data['dadosVaga'][0]['ACombinar'] == 1){
                                    $ACombinar = 'checked';
                                }
                            } ?>
                            
                            <div class="radio_lbl" style="margin-top: 5px;">
                                <input name="salarioCombinar" id="salarioCombinar" data-status="show" type="checkbox" <? echo $ACombinar ?> />
                                <label class="lbl_form">a combinar</label>
                            </div>

                            <input name="salario" id="salario" data-status="show" type="text" class="input_form" style="width: 200px" value="<? echo utf8_decode( $data['dadosVaga'][0]['Salario'] ) ?>"/>

                            <label class="lbl_form b2">Regime de contratação</label>
                            <select id="regimeContratacao" name="regimeContratacao" class="select_form" value="" style="width: 432px;">
                                <option value="0">Selecione</option>
                                <option value="1">CLT</option>
                                <option value="2">PJ</option>
                                <option value="3">Estágio</option>
                                <option value="4">Temporário</option>
                                <option value="5">Outros</option>
                            </select>

                            <label class="lbl_form">Benefícios</label>
                            <textarea name="beneficios" id="beneficios" class="txt_search" style="width: 420px!important; height: 80px; margin"><? echo utf8_decode( $data['dadosVaga'][0]['Beneficios'] ) ?></textarea>

                            <label class="lbl_form">Regime de trabalho: <span>(dia, escala, etc)</span></label>
                            <input name="regimeTrabalho" id="regimeTrabalho" type="text" class="input_form" style="width: 420px;" value="<? echo utf8_decode( $data['dadosVaga'][0]['RegimeTrabalho'] ) ?>">

                            <label class="lbl_form">Horário: </label>
                            <input name="horario" id="horario" type="text" class="input_form" style="width: 420px;" value="<? echo utf8_decode( $data['dadosVaga'][0]['Horario'] ) ?>">

                            <label class="lbl_form b2">Meios para receber candidatos:</label>

                            <? if($data['Editar'] == 1){
                                $EmailCadastro = '';
                                $OutroEmail = '';
                                if($data['dadosVaga'][0]['MeiosRecebimento'] == 0){
                                    $EmailCadastro = 'checked';
                                }else{
                                    $OutroEmail = 'checked';
                                }
                            } ?>
                            
                            <div class="radio_lbl2">
                                <input name="meiosRecebimento" checked type="radio" id="other_unSelected" name="forma_contato" value="0" <? echo $EmailCadastro ?> />
                                <label class="lbl_form">E-mail de cadastro</label>
                            </div>

                            <div class="radio_lbl2">
                                <input name="meiosRecebimento" type="radio" id="other_selected" name="forma_contato" value="1" <? echo $OutroEmail ?> />
                                <label class="lbl_form">Outro e-mail</label>
                            </div>

                            <input name="emailRecebimento" type="text" class="input_form other_mail" style="width: 420px; display: none; margin-bottom: 3px!important" value="<? echo utf8_decode( $data['dadosVaga'][0]['EmailRecebimento'] ) ?>">

                            <label class="lbl_form b2" style="margin-top: 15px;">Ativar Vagar?</label>
                            <? if($data['Editar'] == 1){
                                $Ativar = '';
                                $Inativar = '';
                                if($data['dadosVaga'][0]['Ativar'] == 1){
                                    $Ativar = 'checked';
                                }else{
                                    $Inativar = 'checked';
                                }
                            } ?>
                            <div class="radio_lbl2">
                                <input name="ativar" checked type="radio" value="1" <? echo $Ativar ?> />
                                <label class="lbl_form">Sim</label>
                            </div>

                            <div class="radio_lbl2">
                                <input name="ativar" type="radio" value="0" <? echo $Inativar ?> />
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

                            <? for($i = 1; $i < 6; $i++){ ?>
                                <? if($data['Editar'] == 1){
                                    $TipoRespostaAberta = '';
                                    $TipoRespostaSimNao = '';
                                    $FiltroAtivoSim = '';
                                    $FiltroAtivoNao = '';
                                    $stilo = '';

                                    if(empty( $data['dadosVaga'][0]['Questao' . $i] )){
                                        $stilo = 'style="display: none;"';
                                    }else{
                                        $DataNumber = $i;
                                    }

                                    if($data['dadosVaga'][0]['TipoQuestao' . $i] == 1){
                                        $TipoRespostaAberta = 'checked';
                                    }elseif($data['dadosVaga'][0]['TipoQuestao' . $i] == 2){
                                        $TipoRespostaSimNao = 'checked';
                                    }

                                    if($data['dadosVaga'][0]['FiltroAtivo' . $i] == 1){
                                        $FiltroAtivoSim = 'checked';
                                    }elseif($data['dadosVaga'][0]['FiltroAtivo' . $i] == 0){
                                        $FiltroAtivoNao = 'checked';
                                    }
                                }else{
                                    $stilo = '';
                                    $DataNumber = 1;
                                    if( $i > 1 ){
                                        $stilo = 'style="display: none;"';
                                    }
                                } 
                                ?>
                            
                            <div class="question_item" id="<? echo $i ?>" <? echo $stilo ?>>
                                    <label class="lbl_form b2">
                                            <? echo $i ?>ª Questão:
                                    </label>

                                    <textarea name="questao<? echo $i ?>" class="txt_search" style="width: 99%; height: 30px;"><? echo utf8_decode( $data['dadosVaga'][0]['Questao' . $i] ) ?></textarea>

                                    <label class="lbl_form b2" style="margin-top: 15px;">Tipo de resposta</label>
                                    <div class="radio_lbl2">
                                        <input type="radio" name="tipoResposta<? echo $i ?>" value="1" <? echo $TipoRespostaAberta ?> />
                                        <label class="lbl_form">Resposta do tipo aberta</label><label class="lbl_form2">exemplo: comente sua experiência na area...</label>
                                    </div>

                                    <div class="radio_lbl2">
                                        <input type="radio" name="tipoResposta<? echo $i ?>" value="2" <? echo $TipoRespostaSimNao ?> />
                                        <label class="lbl_form">Resposta do tipo SIM ou NÃO</label><label class="lbl_form2">exemplo: possui carro próprio?</label>
                                    </div>

                                    <label class="lbl_form b2" style="margin-top: 15px;">Ativar Filtro?</label>
                                    <label class="lbl_form2" style="width: 100%; margin: 0;">Utilize esta opção apenas para requisitos imprescindiveis da vaga. Exemplo: possui disponinilidade para viajens?</label>
                                    <div class="radio_lbl2">
                                        <input type="radio" name="filtroAtivo<? echo $i ?>" value="1" <? echo $FiltroAtivoSim ?> />
                                        <label class="lbl_form">Sim</label>
                                    </div>

                                    <div class="radio_lbl2">
                                        <input type="radio" name="filtroAtivo<? echo $i ?>" value="0" <? echo $FiltroAtivoNao ?> />
                                        <label class="lbl_form">Não</label>
                                    </div>
                                </div>
                            <? } ?>

                            <a class="btn_default" id="add_question"  data-number="<? echo $DataNumber ?>" style="float: left; margin-bottom: 15px;">+ Adicionar outra questão</a>
                        </div>

                        <div class="spacer"></div>

                        <div class="box_x2" style="width: 915px;">
                            <h2 class="sub_title">Filtro de CV</h2>
                            <label class="lbl_form" style="margin-bottom: 15px;">
                                    Esses filtros visam apenas agilizar o seu processo seletivo e somente devem ser utilizados se forem realmente imprescindíveis para a função a ser desempenhada.
                            </label>

                            <label class="lbl_form b2" style="margin-top: 15px;">Sexo</label>
                            <? if($data['Editar'] == 1){
                                $FiltroMasculino = '';
                                $FiltroFeminino = '';
                                if($data['dadosFiltro'][0]['Sexo'] == 1){
                                    $FiltroMasculino = 'checked';
                                }else{
                                    $FiltroFeminino = 'checked';
                                }
                            } ?>
                            <div class="radio_lbl2">
                                <input type="radio" name="filtroSexo" value="1" <? echo $FiltroMasculino ?> />
                                <label class="lbl_form">Masculino</label>
                            </div>

                            <div class="radio_lbl2">
                                <input type="radio" name="filtroSexo" value="2" <? echo $FiltroFeminino ?> />
                                <label class="lbl_form">Feminino</label>
                            </div>

                            <span style="width: 100%; float: left;"></span>

                            <div class="filters_multi">
                                <label class="lbl_form b2" style="margin-top: 15px;">Faixa Etária</label>

                                <select id="filtroFaixaEtaria" name="filtroFaixaEtaria[]" multiple class="select_multi">
                                    <option value="16 AND 21">16 - 21</option>
                                    <option value="21 AND 26">21 - 26</option>
                                    <option value="26 AND 30">26 - 30</option>
                                    <option value="30 AND 35">30 - 35</option>
                                    <option value="35 AND 45">35 - 45</option>
                                    <option value="45 AND 120">Mais de 45</option>
                                </select>
                            </div>

                            <div class="filters_multi" style="margin-left: 32px;">
                                <label class="lbl_form b2" style="margin-top: 15px;">Pretensão salarial</label>

                                <select id="filtroPretensaoSalarial" name="filtroPretensaoSalarial[]" multiple class="select_multi">
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

                                <select id="filtroPNE" name="filtroPNE[]" multiple="multiple" class="select_multi">                                   
                                  <option value="1">Física</option>
                                  <option value="2">Auditiva</option>
                                  <option value="3">Visual</option>
                                  <option value="4">Mental</option>
                                  <option value="5">Múltiplas</option>
                                </select>
                            </div>

                            <div class="filters_multi">
                                <label class="lbl_form b2" style="margin-top: 15px;">Estado</label>

                                <select id="filtroEstado" name="filtroEstado[]" multiple="multiple" class="select_multi cities">
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

                                <select id="filtroCidade" name="filtroCidade[]" multiple="multiple" class="select_multi cities">
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
                            <? if($data['Editar'] == 1){ ?>
                                <input id="Editar" type="button" value="editar vaga" style="float: right;"/>
                            <? } else { ?>
                                <input id="Salvar" type="button" value="cadastrar vaga" style="float: right;"/>
                            <? } ?>
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
