<?php

class Index_Controller {

    public $template = 'index/index';

    public function main(array $getVars) {
        
        $Funcoesbasicas = new Funcoesbasicas_Controller();
        $Index_Model = new Index_Model();
        
        //GET Depoimentos
        if (isset($getVars['getDepoimentos']) && !empty($getVars['getDepoimentos'])){
            $Depoimentos_Model = new Depoimentos_Model();
            $Retorno = $Depoimentos_Model->get_Depoimentos($getVars['getDepoimentos']);

            if($Retorno){
                foreach ($Retorno as $dados) {
                  $nome_completo = $dados['Nome'];  
                  $words = explode(" ", $nome_completo);
                  $nome = $words[0];
                  $sobreNome = $words[count($words)-1];

                  $texto .= '<a class="item" href="?depoimentos"><h3>' . $nome.' '.$sobreNome . '<span> - ' . utf8_encode($dados['Cidade']) . ' -' . utf8_encode($dados['Estado']) . '</span></h3><p>' . $Funcoesbasicas->CorteTexto(utf8_encode($dados['Depoimento']),130) . '</p></a>'; 
                                                                            
                }
                echo($texto);
            }
        }
        
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