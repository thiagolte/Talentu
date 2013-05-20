<?php
class Buscar_vaga_Controller {

    public $template = 'buscar_vaga/buscar_vaga';

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