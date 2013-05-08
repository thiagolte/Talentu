<?php
class Depoimentos_Controller {

    public $template = 'depoimentos/depoimentos';

    public function main(array $getVars) {
        
        $Funcoesbasicas = new Funcoesbasicas_Controller();
        $Depoimentos_Model = new Depoimentos_Model();

        
        /*
        * 
        * ************* DEPOIMENTO *************
        * 
        */
        //(insert)
        if (isset($getVars['IdepoimentoDepo']) && !empty($getVars['IdepoimentoDepo']) &&
                !empty($_COOKIE['idCadastro'])){
            
            $Retorno = $Depoimentos_Model->set_Depoimento($_COOKIE['idCadastro'],$getVars['IdepoimentoDepo']);
             
            echo $Retorno;
        }
        
        //GET Depoimentos
        if (isset($getVars['getDepoimentos']) && !empty($getVars['getDepoimentos'])){

            $Retorno = $Depoimentos_Model->get_Depoimentos($getVars['getDepoimentos']);

            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '
                    <div class="testi_item">';
                        if(utf8_encode($dados['Sexo']) == 1){
                            $texto .= '<div class="img_item male"></div>'; 
                        }
                        else{
                            $texto .= '<div class="img_item female"></div>';
                        }
                        
                        
                        $texto .= '<div class="data_item">
                            <h3>' . utf8_encode($dados['Nome']) . '<span> - ' . utf8_encode($dados['Cidade']) . ' -' . utf8_encode($dados['Estado']) . '</span></h3>
                            <p>
                                ' . $Funcoesbasicas->CorteTexto(utf8_encode($dados['Depoimento']), 431) . '
                            </p>
                        </div>
                    </div>';
                }
                echo($texto);
            }
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