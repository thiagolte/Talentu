<?php

class Login_Controller {

    public $template = 'login/login';

    public function main(array $getVars) {

        $Email = new Email_Controller();
        
        //GET Depoimentos
        if (isset($getVars['Logout']) && !empty($getVars['Logout'])){
            setcookie("idCadastro", "", time() + (86400 * 7)); // 1 dia
            setcookie("idCadastroEmp", "", time() + (86400 * 7)); // 1 dia
            setcookie("NomePessoa", "", time() + (86400 * 7)); // 1 dia
            setcookie("Sexo", "", time() + (86400 * 7)); // 1 dia 
            setcookie("DataNascimento", "", time() + (86400 * 7)); // 1 dia
            setcookie("GrauEscolaridade", "", time() + (86400 * 7)); // 1 dia
            setcookie("Pretencao", "", time() + (86400 * 7)); // 1 dia
            setcookie("NumFunc", "", time() + (86400 * 7)); // 1 dia
            setcookie("AreaAtuacao", "", time() + (86400 * 7)); // 1 dia
            setcookie("Site", "", time() + (86400 * 7)); // 1 dia
            setcookie("Cidade", "", time() + (86400 * 7)); // 1 dia
            setcookie("Estado", "", time() + (86400 * 7)); // 1 dia
            setcookie("Status", "", time() + (86400 * 7)); // 1 dia
            setcookie("Confirmacao", "", time() + (86400 * 7)); // 1 dia
            echo 1;
        }
        
        //Enviar e-mail requisição senha
        if (isset($getVars['ResetSenha']) && !empty($getVars['ResetSenha']) &&
                isset($getVars['Email']) && !empty($getVars['Email'])){
            $Envio = $Email->Enviar_Reset_Senha($getVars['Email']);
            
            echo 1;
        }
       
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $view->render();
        }
            
    }
}