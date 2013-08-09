<div id="tabs-4">
    <!-- USUÁRIOS -->
    <div id="dialogUsuario" title="Categoria">
        <p>
            <input id="CodigoUsuario" type="hidden"/>
            Nome: <input id="NomeUsuario" type="text" class="DialogInput" /> </br>
            <input id="AtivoUsuario" type="checkbox" /> Ativo</br></br>
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
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtCategoriasVagas']){
                $count = 1;
                foreach ($data['dtCategoriasVagas'] as $dados) { ?>
                    <tr class="gradeB">
                        <td>
                            <div class="menu hide">
                                <div class="EditUsuario edit"></div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigoCat'])); ?>" />
                            <?echo(utf8_encode($dados['nomeCat'])); ?>
                        </td>
                        <td>
                            <input type="hidden" class="nome" value="<?echo(utf8_encode($dados['nomeCat'])); ?>" />
                            <?echo(utf8_encode($dados['nomeCat'])); ?>
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