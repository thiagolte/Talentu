<?php
class Area_Empresa_Controller {

    public $template = 'area_empresa/area_empresa';

    public function main(array $getVars) {
        

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $this->CarregaVagas($view);
            
            $view->render();
        }

    }
    
    public function CarregaVagas($view){
        $Cadastrar_Vaga_Model = new Cadastrar_vaga_Model();
        
        $Retorno = $Cadastrar_Vaga_Model->get_VagasEmpresa();
        
        $view->assign('Vagas', $Retorno);
    }
}