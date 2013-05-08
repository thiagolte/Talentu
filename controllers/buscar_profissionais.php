<?php
class Buscar_profissionais_Controller {

    public $template = 'buscar_profissionais/buscar_profissionais';

    public function main(array $getVars) {
        $Buscar_Profissionais_Model = new Buscar_Profissionais_Model();

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $Joomla = $Buscar_Profissionais_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);

            $view->render();
        }

    }
}