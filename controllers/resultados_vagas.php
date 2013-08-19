<?php
class Resultados_vagas_Controller {

    public $template = 'resultados_vagas/resultados_vagas';

    public function main(array $getVars) {
     
        $Resultados_Vagas_Model = new Resultados_Vagas_Model();
        
        //Nova Vaga
        if ( isset($_GET['IBusca']) && !empty($_GET['IBusca']) ){
            
            $vagas = $Resultados_Vagas_Model->get_Vagas( $_GET['categoria'], $_GET['vaga'],
                                                         $_GET['estado'], $_GET['cidade'],
                                                         $_GET['pretencao'], $_GET['pne']);
            
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Vagas', $vagas);
            
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