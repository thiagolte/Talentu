<?php
class Resultados_usuario_Controller {

    public $template = 'resultados_usuario/resultados_usuario';

    public function main(array $getVars) {        

        $Cadastrar_cv_Model = new Cadastrar_cv_Model();
        
        if (isset($getVars['Psexo']) || isset($getVars['Pestado']) ||
                isset($getVars['PareaInteresse']) || isset($getVars['PfaixaEstaria']) ||
                isset($getVars['Pcidade']) || isset($getVars['Ppretencao'])){
            
            $Retorno = $Cadastrar_cv_Model->Buscar_Profissionais($getVars['Psexo'], $getVars['Pestado'], 
                    $getVars['PareaInteresse'], $getVars['Pvaga'], $getVars['PfaixaEstaria'],
                    $getVars['Pcidade'], $getVars['Ppretencao'], $getVars['Ppalavra'] ,$getVars['Ppne']);
            
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('Dados', $Retorno);
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->render();
        }
        
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