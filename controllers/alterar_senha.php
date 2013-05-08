<?php
class Alterar_senha_Controller {

    public $template = 'alterar_senha/alterar_senha';

    public function main(array $getVars) {
        
        $Cadastrar_cv_Model = new Cadastrar_cv_Model();
        $Cadastrar_Empresa_Model = new Cadastrar_Empresa_Model();
        
        //Enviar e-mail requisição senha
        if (isset($getVars['resetpswd']) && !empty($getVars['resetpswd'])){

            setcookie("resetpswd", $getVars['resetpswd'], time() + (86400 * 7)); // 1 dia
            
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->render();
            
        }
        
        if (isset($getVars['Senha']) && !empty($getVars['Senha']) &&
                !empty($_COOKIE['resetpswd'])){
            
            $senha = sha1(sha1(md5($getVars['Senha'])));

            $codigo = 0;
            $tipo = 0;

            $Retorno = $Cadastrar_cv_Model->get_ExistsEmail($_COOKIE['resetpswd']);

            if($Retorno){
                foreach ($Retorno as $dados) {
                    $codigo = utf8_encode($dados['qtd']);
                    $tipo = 1;
                }
            }
            
            if($codigo == 0){
                $Retorno = $Cadastrar_Empresa_Model->get_ExistsEmail($_COOKIE['resetpswd']);

                if($Retorno){
                    foreach ($Retorno as $dados) {
                        $codigo = utf8_encode($dados['qtd']);
                        $tipo = 2;
                    }
                }
            }

            if($tipo == 1 && $codigo > 0){
                $Retorno = $Cadastrar_cv_Model->set_Senha($_COOKIE['resetpswd'],$senha); 
                echo 1;
            }elseif($tipo == 2 && $codigo > 0){
                $Retorno = $Cadastrar_Empresa_Model->set_Senha($_COOKIE['resetpswd'],$senha); 
                echo 1;
            }else{
                echo 0;
            }
            
        }

    }
}