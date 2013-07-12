<?php
class Buscar_vaga_Controller {

    public $template = 'buscar_vaga/buscar_vaga';

    public function main(array $getVars) {

        $Buscar_Vaga_Model = new Buscar_Vaga_Model();

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $Joomla = $Buscar_Vaga_Model->get_Joomla();

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Joomla', $Joomla);

            $this->CarregaItens($view);
            
            $view->render();
        }

    }
    
    function CarregaItens($view){
        $Cadastrar_cv_Model = new Cadastrar_cv_Model();
                
        $Pretencao = $Cadastrar_cv_Model->get_Pretencoes();
        $Estado = $Cadastrar_cv_Model->get_Estados();
        $Cidade = $Cadastrar_cv_Model->get_Cidades();
        $Categoria = $Cadastrar_cv_Model->get_CategoriasAtivas();
        
        $view->assign('Pretencao', $Pretencao);
        $view->assign('Estado', $Estado);
        $view->assign('Cidade', $Cidade);
        $view->assign('Categoria', $Categoria);
    }
}