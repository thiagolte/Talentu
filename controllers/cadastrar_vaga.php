<?php
class Cadastrar_vaga_Controller {

    public $template = 'cadastrar_vaga/cadastrar_vaga';

    public function main(array $getVars) {
        

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->render();
        }

    }
}