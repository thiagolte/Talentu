<?php

class Fb_Controller {

    public $template = 'fb/fb';

    public function main(array $getVars) {
        
        $Funcoesbasicas = new Funcoesbasicas_Controller();
        $Index_Model = new Index_Model();
        
        if (isset($getVars['act']) && !empty($getVars['act'])){
            //telmplates
            $view = new View_Model($this->template);
            $Joomla = $Index_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);

            $view->render();
        }
        
        
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);
            $Joomla = $Index_Model->get_Joomla();
            
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);

            $view->render();
        }
            
    }
}