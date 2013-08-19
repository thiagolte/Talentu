<div id="tabs-6">
    <!-- Vagas Empresas -->
    <div id="dialogVagaEmpresa" title="Vaga Empresa">
        <p>
            <input id="CodigoVagaEmpresa" type="hidden"/>
            Nome: <input id="NomeVagaEmpresa" type="text" class="DialogInput" /> </br>
            E-mail: <input id="EmailVagaEmpresa" type="text" class="DialogInput" /> </br>
            Razão: <input id="RazaoVagaEmpresa" type="text" class="DialogInput" /> </br>
            Fantasia: <input id="FantasiaVagaEmpresa" type="text" class="DialogInput" /> </br>
            CNPJ: <input id="CNPJVagaEmpresa" type="text" class="DialogInput" /> </br>
            Telefone: <input id="TelefoneVagaEmpresa" type="text" class="DialogInput" /> </br>
            <input id="AtivoVagaEmpresa" type="checkbox" /> Ativo</br>
            <input id="ResetSenhaVagaEmpresa" type="checkbox" /> Reset Senha</br></br>
            <input id="SalvarVagaEmpresa" type="submit" value="Salvar">
            <input id="EditarVagaEmpresa" type="submit" value="Editar">
        </p>
    </div>
    
    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="VagaEmpresa">
        <thead>
            <tr>
                <th></th>
                <th>Local</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Razao</th>
                <th>Ramo</th>
                <th>Nacionalidade</th>
                <th>Porte</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Atribuições</th>
                <th>Experiência</th>
                <th>Escolaridade</th>
                <th>Qualificações</th>
                <th>Categoria</th>
                <th>Vaga</th>
                <th>Combinar</th>
                <th>Regime</th>
                <th>Benefícios</th>
                <th>Regime Trabalho</th>
                <th>Horário</th>
                <th>Questão 1</th>
                <th>Questão 2</th>
                <th>Questão 3</th>
                <th>Questão 4</th>
                <th>Questão 5</th>
                <th>Ativo</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtVagaEmpresas']){
                $count = 1;
                foreach ($data['dtVagaEmpresas'] as $dados) { ?>
                    <tr class="gradeA">
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <div class="menu hide">
                                <div class="EditVagaEmpresa edit"></div>
                            </div>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['local'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['cidade'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['estado'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['razao'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['ramo'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['nacionalidade'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['porte'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['descricao'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['quantidade'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['atribuicoes'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['experiencia'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['escolaridade'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['qualificacoes'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['categoria'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['vaga'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['combinar'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['regime'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['beneficios'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['regimetrabalho'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['horario'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['questao1'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['questao2'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['questao3'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['questao4'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['questao5'])); ?>
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