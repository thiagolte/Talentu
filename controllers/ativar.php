<?php
class Ativar_Controller {

    public $template = 'ativar/ativar';

    public function main(array $getVars) {
        
        //telmplates
        $view = new View_Model($this->template);

        $vw_Login = new View_Model('login/login');
        $view->assign('vw_Login', $vw_Login->render(FALSE));

        $view->render();

    }
}