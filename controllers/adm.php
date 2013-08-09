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
        if (isset($getVars['getCat']) && !empty($getVars['getCat'])){
            $Retorno = $Adm_Model->get_Categorias();
            echo 1; 
        }

        if (isset($getVars['SetCat']) && !empty($getVars['SetCat']) &&
                isset($getVars['NomeCat']) && !empty($getVars['NomeCat']) &&
                isset($getVars['AtivoCat'])){
            
            $Nome = $getVars['NomeCat'];
            $Ativo = $getVars['AtivoCat'];
            $Retorno = $Adm_Model->set_Categoria($Nome, $Ativo);
            echo 1; 
        }
        
        if (isset($getVars['UpdateCat']) && !empty($getVars['UpdateCat']) &&
                isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat']) &&
                isset($getVars['NomeCat']) && !empty($getVars['NomeCat']) &&
                isset($getVars['AtivoCat'])){
            
            $Codigo = $getVars['CodigoCat'];
            $Nome = $getVars['NomeCat'];
            $Ativo = $getVars['AtivoCat'];

            $Retorno = $Adm_Model->update_Categoria($Codigo, $Nome, $Ativo);
            echo 1; 
        }

        // if (isset($getVars['DeleteCat']) && !empty($getVars['DeleteCat']) &&
        //         isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat'])){
            
        //     $Codigo = $getVars['CodigoCat'];
        //     $Retorno = $Adm_Model->delete_Categoria($Codigo);
        //     echo 1; 
        // }
        
        
        
        //Vagas
        if (isset($getVars['getVag']) && !empty($getVars['getVag'])){
            $Retorno = $Adm_Model->get_Vagas();
            echo 1; 
        }

        if (isset($getVars['SetVag']) && !empty($getVars['SetVag']) &&
                isset($getVars['NomeVag']) && !empty($getVars['NomeVag']) &&
                isset($getVars['AtivoVag'])){
            
            $Nome = $getVars['NomeVag'];
            $Ativo = $getVars['AtivoVag'];
            $Retorno = $Adm_Model->set_Vaga($Nome, $Ativo);
            echo 1; 
        }

        if (isset($getVars['UpdateVag']) && !empty($getVars['UpdateVag']) &&
                isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag']) &&
                isset($getVars['NomeVag']) && !empty($getVars['NomeVag']) &&
                isset($getVars['AtivoVag'])){
            
            $Codigo = $getVars['CodigoVag'];
            $Nome = $getVars['NomeVag'];
            $Ativo = $getVars['AtivoVag'];

            $Retorno = $Adm_Model->update_Vaga($Codigo, $Nome, $Ativo);
            echo 1; 
        }
        
        // if (isset($getVars['DeleteVag']) && !empty($getVars['DeleteVag']) &&
        //         isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag'])){
            
        //     $Codigo = $getVars['CodigoVag'];
        //     $Retorno = $Adm_Model->delete_Vaga($Codigo);
        //     echo 1; 
        // }
        


        //Categorias+Vagas
        if (isset($getVars['getCatVag']) && !empty($getVars['getCatVag'])){
            $Retorno = $Adm_Model->get_Vagas();
            echo 1; 
        }

        if (isset($getVars['SetCatVag']) && !empty($getVars['SetCatVag']) &&
                isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat']) &&
                isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag']) &&
                isset($getVars['AtivoCatVag'])){
            
            $CodigoCat = $getVars['CodigoCat'];
            $CodigoVag = $getVars['CodigoVag'];
            $Ativo = $getVars['AtivoCatVag'];
            $Retorno = $Adm_Model->set_CategoriaVaga($CodigoCat, $CodigoVag, $Ativo);
            echo 1; 
        }

        if (isset($getVars['UpdateCatVag']) && !empty($getVars['UpdateCatVag']) &&
                isset($getVars['CodigoCatVag']) && !empty($getVars['CodigoCatVag']) &&
                isset($getVars['CodigoCat']) && !empty($getVars['CodigoCat']) &&
                isset($getVars['CodigoVag']) && !empty($getVars['CodigoVag']) &&
                isset($getVars['AtivoCatVag'])){
            
            $Codigo = $getVars['CodigoCatVag'];
            $CodigoCat = $getVars['CodigoCat'];
            $CodigoVag = $getVars['CodigoVag'];
            $Ativo = $getVars['AtivoCatVag'];

            $Retorno = $Adm_Model->update_CategoriaVaga($Codigo, $CodigoCat, $CodigoVag, $Ativo);
            echo 1; 
        }

        //Usuários
        if (isset($getVars['getUsuario']) && !empty($getVars['getUsuario'])){
            $Retorno = $Adm_Model->get_Usuarios();
            echo 1; 
        }
        
        if (isset($getVars['UpdateUsuario']) && !empty($getVars['UpdateUsuario']) &&
                isset($getVars['CodigoUsuario']) && !empty($getVars['CodigoUsuario']) &&
                isset($getVars['NomeUsuario']) && !empty($getVars['NomeUsuario']) &&
                isset($getVars['EmailUsuario']) && !empty($getVars['EmailUsuario']) &&
                isset($getVars['ResetSenhaUsuario']) &&
                isset($getVars['AtivoUsuario'])){
            
            $Codigo = $getVars['CodigoUsuario'];
            $Nome = $getVars['NomeUsuario'];
            $Email = $getVars['EmailUsuario'];
            $ResetSenha = $getVars['ResetSenhaUsuario'];
            $Ativo = $getVars['AtivoUsuario'];

            $Retorno = $Adm_Model->update_Usuario($Codigo, $Nome, $Email, $ResetSenha, $Ativo);
            echo 1; 
        }

        // if (isset($getVars['DeleteUsuario']) && !empty($getVars['DeleteUsuario']) &&
        //         isset($getVars['CodigoUsuario']) && !empty($getVars['CodigoUsuario'])){
            
        //     $Codigo = $getVars['CodigoUsuario'];
        //     $Retorno = $Adm_Model->delete_Usuario($Codigo);
        //     echo 1; 
        // }

        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);
            
            $this->CarregaCategorias($view);
            $this->CarregaVagas($view);
            $this->CarregaCategoriasVagas($view);
            $this->CarregaUsuario($view);
            
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

    //Categorias+Vagas
    function CarregaCategoriasVagas($view){
        $Adm_Model = new Adm_Model();
        
        $Retorno = $Adm_Model->get_Categorias_Vagas();

        $view->assign('dtCategoriasVagas', $Retorno);
    }

    //Usuários
    function CarregaUsuario($view){
        $Adm_Model = new Adm_Model();
        
        $Retorno = $Adm_Model->get_Usuarios();

        $view->assign('dtUsuarios', $Retorno);
    }
    
}