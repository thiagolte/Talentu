<?php
class Ajuda_Controller {

    public $template = 'ajuda/ajuda';

    public function main(array $getVars) {

        $Ajuda_Model = new Ajuda_Model();

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $Joomla = $Ajuda_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);

            $view->render();
        }

    }
}