<?php
class Empresa_Controller {

    public $template = 'empresa/empresa';

    public function main(array $getVars) {
        $Empresa_Model = new Empresa_Model();

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $Joomla = $Empresa_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);
            
            $view->render();
        }

    }
}