<?php
class Area_usuario_Controller {

    public $template = 'area_usuario/area_usuario';

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