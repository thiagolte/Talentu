<?php
class Cadastrar_vaga_Controller {

    public $template = 'cadastrar_vaga/cadastrar_vaga';

    public function main(array $getVars) {
        
        $Cadastrar_Vaga_Model = new Cadastrar_vaga_Model();
        
        //Nova Vaga
        if ( isset($_GET['ICadastro']) && !empty($_GET['ICadastro']) ){
            
            $retorno = $Cadastrar_Vaga_Model->set_CadastroVaga( $_GET['ICadastro'] );
            echo $retorno;

        }
        
        //Editar Vaga
        if (isset($_GET['ECadastro']) && !empty($_GET['ECadastro'])){
            
            $retorno = $Cadastrar_Vaga_Model->edit_CadastroVaga( $_GET['ECadastro'] );
            echo $retorno;

        }
        
        //Candidatar
        if ( isset($_GET['ICadidatar']) && !empty($_GET['ICadidatar']) ){
            
            $retorno = $Cadastrar_Vaga_Model->set_CandidatarVaga( $_GET['ICadidatar'] );
            echo $retorno;

        }
        
        //Ativar
        if ( isset($_GET['Ativar']) && !empty($_GET['Ativar']) ){
            
            $retorno = $Cadastrar_Vaga_Model->set_AtivarVaga( $_GET['Ativar'] );
            echo $retorno;
            
        }
        
        //Desativar
        if ( isset($_GET['Desativar']) && !empty($_GET['Desativar']) ){
            
            $retorno = $Cadastrar_Vaga_Model->set_DesativarVaga( $_GET['Desativar'] );
            echo $retorno;
            
        }
        
        //Editar
        if (isset($_GET['Editar']) && !empty($_GET['Editar']) &&
                isset($_GET['idVaga']) && !empty($_GET['idVaga'])){
            
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $dadosVaga = $Cadastrar_Vaga_Model->get_VagaEdit($_GET['idVaga']);
            $view->assign('dadosVaga',$dadosVaga);
            
            $dadosFiltro = $Cadastrar_Vaga_Model->get_FiltroEdit($_GET['idFiltro']);
            $view->assign('dadosFiltro',$dadosFiltro);
            
            $view->assign('Editar', 1);
            
            $this->CarregaItens($view);
            
            $view->render();
        }

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));

            $this->CarregaItens($view);
            
            $view->render();
        }

    }
    
    function CarregaItens($view){
        $Cadastrar_cv_Model = new Cadastrar_cv_Model();
                
        $Pretencao = $Cadastrar_cv_Model->get_Pretencoes();
        $Estado = $Cadastrar_cv_Model->get_Estados();
        $Cidade = $Cadastrar_cv_Model->get_Cidades();
        $Grau = $Cadastrar_cv_Model->get_Graus();
        $Categoria = $Cadastrar_cv_Model->get_CategoriasAtivas();
        
        $view->assign('Pretencao', $Pretencao);
        $view->assign('Estado', $Estado);
        $view->assign('Cidade', $Cidade);
        $view->assign('Grau', $Grau);
        $view->assign('Categoria', $Categoria);
    }
}