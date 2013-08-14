<div id="tabs-5">
    <!-- USUÁRIOS -->
    <div id="dialogEmpresa" title="Empresa">
        <p>
            <input id="CodigoEmpresa" type="hidden"/>
            Nome: <input id="NomeEmpresa" type="text" class="DialogInput" /> </br>
            E-mail: <input id="EmailEmpresa" type="text" class="DialogInput" /> </br>
            E-mail: <input id="TelefoneEmpresa" type="text" class="DialogInput" /> </br>
            <input id="AtivoEmpresa" type="checkbox" /> Ativo</br>
            <input id="ResetSenhaEmpresa" type="checkbox" /> Reset Senha</br></br>
            <input id="SalvarEmpresa" type="submit" value="Salvar">
            <input id="EditarEmpresa" type="submit" value="Editar">
        </p>
    </div>
    
    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Empresa">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtEmpresas']){
                $count = 1;
                foreach ($data['dtEmpresas'] as $dados) { ?>
                    <tr class="gradeB">
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <div class="menu hide">
                                <div class="EditEmpresa edit"></div>
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