<div id="tabs-1">

    <!-- CATEGORIAS --> 
    <input id="NovoCat" type="submit" value="Novo">

    <div id="dialogCat" title="Categoria">
        <p>
            <input id="CodigoCat" type="hidden"/>
            Nome: <input id="NomeCat" type="text" class="DialogInput" /> </br>
            <input id="AtivoCat" type="checkbox" /> Ativo</br></br>
            <input id="SalvarCat" type="submit" value="Salvar">
            <input id="EditarCat" type="submit" value="Editar">
        </p>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Categorias">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Nome</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
        <? 
            if($data['dtCategorias']){
                $count = 1;
                foreach ($data['dtCategorias'] as $dados) { ?>
                    <tr class="gradeA">
                        <td>
                            <div class="menu hide">
                                <!-- <div class="DeleteCategorias delete"></div> -->
                                <div class="EditCategorias edit"></div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" class="codigo" value="<?echo(utf8_encode($dados['codigo'])); ?>" />
                            <?echo($count); ?>
                        </td>
                        <td>
                            <input type="hidden" class="nome" value="<?echo(utf8_encode($dados['nome'])); ?>" />
                            <?echo(utf8_encode($dados['nome'])); ?>
                        </td>
                        <td>
                            <?if (utf8_encode($dados['ativo']) == 1){?>
                                <input type="hidden" class="ativo" value="true" />
                                <input type="checkbox" checked disabled="true">
                            <?}else{?>
                                <input type="hidden" class="ativo" value="false" />
                                <input type="checkbox" disabled="true" >    
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