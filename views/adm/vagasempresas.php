<div id="tabs-6">
    <!-- USUÁRIOS -->
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
                <th>Nome</th>
                <th>Email</th>
                <th>Razao</th>
                <th>Fantasia</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtVagaEmpresas']){
                $count = 1;
                foreach ($data['dtVagaEmpresas'] as $dados) { ?>
                    <tr class="gradeB">
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <div class="menu hide">
                                <div class="EditVagaEmpresa edit"></div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" class="nome" value="<?echo(utf8_encode($dados['nome'])); ?>" />
                            <?echo(utf8_encode($dados['nome'])); ?>
                        </td>
                        <td>
                            <input type="hidden" class="email" value="<?echo(utf8_encode($dados['email'])); ?>" />
                            <?echo(utf8_encode($dados['email'])); ?>
                        </td>

                        <td>
                            <input type="hidden" class="razao" value="<?echo(utf8_encode($dados['razao'])); ?>" />
                            <?echo(utf8_encode($dados['razao'])); ?>
                        </td>
                        <td>
                            <input type="hidden" class="fantasia" value="<?echo(utf8_encode($dados['fantasia'])); ?>" />
                            <?echo(utf8_encode($dados['fantasia'])); ?>
                        </td>
                        <td>
                            <input type="hidden" class="cnpj" value="<?echo(utf8_encode($dados['cnpj'])); ?>" />
                            <?echo(utf8_encode($dados['cnpj'])); ?>
                        </td>
                        
                        <td>
                            <input type="hidden" class="telefone" value="<?echo(utf8_encode($dados['telefone'])); ?>" />
                            <?echo(utf8_encode($dados['telefone'])); ?>
                        </td>
                        <td>
                            <?echo(utf8_encode($dados['data'])); ?>
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