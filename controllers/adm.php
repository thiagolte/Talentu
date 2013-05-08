<?php
class Adm_Controller {

    public $template = 'adm/adm';

    public function main(array $getVars) {
      
        $Adm_Model = new Adm_Model();
        
        //Enviar e-mail confirmação
        if (isset($getVars['Login']) && !empty($getVars['Login']) &&
                isset($getVars['Senha']) && !empty($getVars['Senha'])){
            
            if($getVars['Login'] == 'admin' && $getVars['Senha'] == 'teste'){
                setcookie("logAdm", sha1(md5($getVars['Login'])), time() + (86400 * 7));
                echo 1;
            }
            
        }
        
        //Categorias
        if (isset($getVars['SetCat']) && !empty($getVars['SetCat']) &&
                isset($getVars['NomeCat']) && !empty($getVars['NomeCat']) &&
                isset($getVars['AtivoCat']) && !empty($getVars['AtivoCat'])){
            
            $Nome = $getVars['NomeCat'];
            $Ativo = $getVars['AtivoCat'];
            $Retorno = $Adm_Model->set_Categoria($Nome, $Ativo);
            echo 1; 
        }
        
        if (isset($getVars['UpdateCat']) && !empty($getVars['UpdateCat']) &&
                isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat']) &&
                isset($getVars['NomeCat']) && !empty($getVars['NomeCat']) &&
                isset($getVars['AtivoCat']) && !empty($getVars['AtivoCat'])){
            
            $Codigo = $getVars['CodigoCat'];
            $Nome = $getVars['NomeCat'];
            $Ativo = $getVars['AtivoCat'];

            $Retorno = $Adm_Model->update_Categoria($Codigo, $Nome, $Ativo);
            echo 1; 
        }

        if (isset($getVars['DeleteCat']) && !empty($getVars['DeleteCat']) &&
                isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat'])){
            
            $Codigo = $getVars['CodigoCat'];
            $Retorno = $Adm_Model->delete_Categoria($Codigo);
            echo 1; 
        }
        
        
        
        //Vagas
        if (isset($getVars['SetVag']) && !empty($getVars['SetVag']) &&
                isset($getVars['NomeVag']) && !empty($getVars['NomeVag']) &&
                isset($getVars['AtivoVag']) && !empty($getVars['AtivoVag'])){
            
            $Nome = $getVars['NomeVag'];
            $Ativo = $getVars['AtivoVag'];
            $Retorno = $Adm_Model->set_Vaga($Nome, $Ativo);
            echo 1; 
        }

        if (isset($getVars['UpdateVag']) && !empty($getVars['UpdateVag']) &&
                isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag']) &&
                isset($getVars['NomeVag']) && !empty($getVars['NomeVag']) &&
                isset($getVars['AtivoVag']) && !empty($getVars['AtivoVag'])){
            
            $Codigo = $getVars['CodigoVag'];
            $Nome = $getVars['NomeVag'];
            $Ativo = $getVars['AtivoVag'];

            $Retorno = $Adm_Model->update_Vaga($Codigo, $Nome, $Ativo);
            echo 1; 
        }
        
        if (isset($getVars['DeleteVag']) && !empty($getVars['DeleteVag']) &&
                isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag'])){
            
            $Codigo = $getVars['CodigoVag'];
            $Retorno = $Adm_Model->delete_Vaga($Codigo);
            echo 1; 
        }
        
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);
            
            $this->CarregaCategorias($view);
            $this->CarregaVagas($view);
            
            $view->render();
        }
    }
    
    //Categorias
    function CarregaCategorias($view){
        $Adm_Model = new Adm_Model();
        
        $Retorno = $Adm_Model->get_Categorias();

        $view->assign('dtCategorias', $Retorno);
    }

    //Vagas
    function CarregaVagas($view){
        $Adm_Model = new Adm_Model();
        
        $Retorno = $Adm_Model->get_Vagas();

        $view->assign('dtVagas', $Retorno);
    }
}