<div id="tabs-2">
    
    <!-- VAGAS -->
    <input id="NovoVag" type="submit" value="Novo">

    <div id="dialogVag" title="Vaga">
        <p>
            <input id="CodigoVag" type="hidden"/>
            Nome: <input id="NomeVag" type="text" class="DialogInput" /> </br>
            <input id="AtivoVag" type="checkbox" /> Ativo</br></br>
            <input id="SalvarVag" type="submit" value="Salvar">
            <input id="EditarVag" type="submit" value="Editar">
      </p>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display DataTable" id="Vagas">
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
            if($data['dtVagas']){
                $count = 1;
                foreach ($data['dtVagas'] as $dados) { ?>
                    <tr class="gradeB">
                        <td>
                            <div class="menu hide">
                                <!-- <div class="DeleteVagas delete"></div> -->
                                <div class="EditVagas edit"></div>
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