
<?php
    function curPageURL() {
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        if ($_SERVER["SERVER_PORT"] != "80") {
         $pageURL .= $_SERVER["REQUEST_URI"];
        } else {
        $pageURL .= $_SERVER["REQUEST_URI"];
     }
     return $pageURL;
 }
?>

<script src="js/login/script.js"></script>	
<link rel="stylesheet" href="js/jquery-ui/css/custom-theme/jquery-ui-1.10.1.custom.min.css" />
<script src="js/jquery-ui/js/jquery-ui-1.10.1.custom.min.js"></script>
<script>
    $(function() {
        $(document).tooltip();
    });
</script>

<header>
    <div class="tSides tLeft"></div>
    <div class="tCenter">
        <div class="tContainer">
            <a class="root" href="?index"></a>
            <ul>
                <li>
                    <a class="tEmpresa" href="?empresa">Empresa</a>
                </li>
				<li><label>•</label></li>
				<li>
                    <a href="../blog" target="_blank">Blog</a>
                </li>
                <li><label>•</label></li>
                <!--<li>
                    <a>Buscar vagas</a>
                </li>
                <li><label>•</label></li>
                <li>
                    <a>avaliação de perfil</a>
                </li>
                <li><label>•</label></li>
                -->
                <? if(!empty($_COOKIE['idCadastro'])){?>
                <li>
                    <a href="?area_usuario">area do usuário</a>
                </li>
                <li><label>•</label></li>
                <?}?>
                <? if(!empty($_COOKIE['idCadastroEmp'])){?>
                <li>
                    <a href="?area_empresa">area da empresa</a>
                </li>
                <li><label>•</label></li>
                <?}?>
                <li>
                    <a href="?depoimentos">depoimentos</a>
                </li>
                <li><label>•</label></li>
                <? if(empty($_COOKIE['NomePessoa'])){?>
                <div class="hide_">
                    <li>
                        <a href="?cadastrar_cv">cadastrar cv</a>
                    </li>
                    <li><label>•</label></li>
                </div>
                <?}?>
                <li>
                    <a style="padding-right: 0;" href="?parceiros">parceiros</a>
                </li>
                <li><label>•</label></li>
                <li>
                    <a style="padding-right: 0;" href="?fale_conosco">fale conosco</a>
                </li>
            </ul>
            <div class="topBottom">
                <a class="help" href="?ajuda">AJUDA</a>

                <? if(!empty($_COOKIE['idCadastro']) || !empty($_COOKIE['idCadastroEmp'])){?>
                <label class="login">OLA!</label>
                
                <div class="logado_box" >
                    <label><?= $_COOKIE['NomePessoa']?></label>
                    <a id="Sair" class="logout" style="margin-right: -36px; margin-top: -8px;">sair</a>
                </div>
                <?}else {?>
                <label class="login">LOGIN</label>
                
                <form class="boxLogin">
                    <input id="lLogin" type="text" value="e-mail" onfocus="if(this.value=='e-mail'){this.value=''}" onblur="if(this.value==''){this.value='e-mail'}"/>
                    <input id="lSenha" type="text" value="senha" onfocus="if(this.value=='senha'){this.value='', this.type='password'}" onblur="if(this.value==''){this.value='senha', this.type='text'}"/>
                    <input id="Entrar" type="button" class="btnOk"/>
                    <a class="recoveryPass" id="age" title="Para alterar sua senha, informe seu e-mail no campo login e clique no botão 'AQUI'">Esqueceu sua senha? Clique <span id="ResetSenha">AQUI!</span></a>
                </form>
                <?}?>
            </div>
        </div>
    </div>
    <div class="tSides tRight"></div>
</header> 