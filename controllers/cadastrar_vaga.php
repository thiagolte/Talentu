<?php
class Cadastrar_vaga_Controller {

    public $template = 'cadastrar_vaga/cadastrar_vaga';

    public function main(array $getVars) {
        
        $Cadastrar_Vaga_Model = new Cadastrar_vaga_Model();

        //Nova Vaga
        if (isset($_GET['ICadastro']) && !empty($_GET['ICadastro'])){
            
            $retorno = $Cadastrar_Vaga_Model->set_CadastroVaga( $_GET['ICadastro'] );
            echo $retorno;

        }
        
        //Editar Vaga
        if (isset($_GET['ECadastro']) && !empty($_GET['ECadastro'])){
            
            $retorno = $Cadastrar_Vaga_Model->edit_CadastroVaga( $_GET['ECadastro'] );
            echo $retorno;

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