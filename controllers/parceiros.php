<?php
class Parceiros_Controller {

    public $template = 'parceiros/parceiros';

    public function main(array $getVars) {
        
        $Parceiros_Model = new Parceiros_Model();

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);
            $Joomla = $Parceiros_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);
            
            $view->render();
        }

    }
}