<div id="tabs-3">
    <!-- CATEGORIAS+VAGAS -->
    <input id="NovoCatVag" type="submit" value="Novo">

    <div id="dialogCatVag" title="Categoria X Vaga">
        <p>
            <input id="CodigoCatVag" type="hidden"/>
            Categoria:</br>
            <select id="CodigoCat_catvag">
                <?foreach ($data['dtCategorias'] as $dados) { ?>
                <option value="<?echo(utf8_encode($dados['codigo'])); ?>"><?echo(utf8_encode($dados['nome'])); ?></option>
                <?}?>
            </select>
            </br></br>
            Vaga: </br>
            <select id="CodigoVag_catvag">
                <?foreach ($data['dtVagas'] as $dados) { ?>
                <option value="<?echo(utf8_encode($dados['codigo'])); ?>"><?echo(utf8_encode($dados['nome'])); ?></option>
                <?}?>
            </select>
            </br>
            <input id="AtivoCatVag" type="checkbox" /> Ativo</br></br>
            <input id="SalvarCatVag" type="submit" value="Salvar">
            <input id="EditarCatVag" type="submit" value="Editar">
      </p>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="CatVag">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Categoria</th>
                <th>Vaga</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtCategoriasVagas']){
                $count = 1;
                foreach ($data['dtCategoriasVagas'] as $dados) { ?>
                    <tr class="gradeA">
                        <td>
                            <div class="menu hide">
                                <div class="EditCatVag edit"></div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <?echo($count); ?>
                        </td>
                        <td>
                            <input type="hidden" class="codigoCat" value="<?echo(utf8_encode($dados['codigoCat'])); ?>" />
                            <?echo(utf8_encode($dados['nomeCat'])); ?>
                        </td>
                        <td>
                            <input type="hidden" class="codigoVag" value="<?echo(utf8_encode($dados['codigoVag'])); ?>" />
                            <?echo(utf8_encode($dados['nomeVag'])); ?>
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