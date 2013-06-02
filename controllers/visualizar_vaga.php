<?php
class Visualizar_vaga_Controller {

    public $template = 'visualizar_vaga/visualizar_vaga';

    public function main(array $getVars) {
        
        if( isset($_GET['idVaga']) && !empty($_GET['idVaga']) ){
            $Cadastrar_Vaga_Model = new Cadastrar_vaga_Model();
            
            $Vaga = $Cadastrar_Vaga_Model->get_Vaga($_GET['idVaga']);
            
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Vaga', $Vaga);
            
            $view->render();
        }

        //Main
        if (count($getVars) == 0) {
            //telmplates
//            $view = new View_Model($this->template);
//
//            $vw_Login = new View_Model('login/login');
//            $view->assign('vw_Login', $vw_Login->render(FALSE));
//            
//            $view->render();
        }

    }
}