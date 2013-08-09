<div id="tabs-4">
    <!-- USUÁRIOS -->
    <div id="dialogUsuario" title="Categoria">
        <p>
            <input id="CodigoUsuario" type="hidden"/>
            Nome: <input id="NomeUsuario" type="text" class="DialogInput" /> </br>
            E-mail: <input id="EmailUsuario" type="text" class="DialogInput" /> </br>
            <input id="AtivoUsuario" type="checkbox" /> Ativo</br>
            <input id="ResetSenhaUsuario" type="checkbox" /> Reset Senha</br></br>
            <input id="SalvarUsuario" type="submit" value="Salvar">
            <input id="EditarUsuario" type="submit" value="Editar">
        </p>
    </div>
    
    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Usuario">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtUsuarios']){
                $count = 1;
                foreach ($data['dtUsuarios'] as $dados) { ?>
                    <tr class="gradeB">
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <div class="menu hide">
                                <div class="EditUsuario edit"></div>
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