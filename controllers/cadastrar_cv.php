<?php
class Cadastrar_cv_Controller {

    public $template = 'cadastrar_cv/cadastrar_cv';

    public function main(array $getVars) {

        $Cadastrar_cv_Model = new Cadastrar_cv_Model();
        $Cadastrar_Empresa_Model = new Cadastrar_Empresa_Model();
        $Email = new Email_Controller();
        
        /*
        * 
        * ************* CADASTRO *************
        * 
        */
        //(insert)
        if (isset($getVars['IcadastroEmail']) && !empty($getVars['IcadastroEmail']) &&
                isset($getVars['IcadastroNome']) && !empty($getVars['IcadastroNome']) &&
                isset($getVars['IcadastroDatanasci']) && !empty($getVars['IcadastroDatanasci']) &&
                isset($getVars['IcadastroTelefone']) && !empty($getVars['IcadastroTelefone']) &&
                isset($getVars['IcadastroCelular']) && !empty($getVars['IcadastroCelular']) &&
                isset($getVars['IcadastroCep']) && !empty($getVars['IcadastroCep']) &&
                isset($getVars['IcadastroEndereco']) && !empty($getVars['IcadastroEndereco']) &&
                isset($getVars['IcadastroBairro']) && !empty($getVars['IcadastroBairro']) &&
                isset($getVars['IcadastroNumero']) && !empty($getVars['IcadastroNumero']) &&
                isset($getVars['IcadastroCidade']) && !empty($getVars['IcadastroCidade']) &&
                isset($getVars['IcadastroEstado']) && !empty($getVars['IcadastroEstado']) &&
                isset($getVars['IcadastroPretencao']) && !empty($getVars['IcadastroPretencao']) &&
                isset($getVars['IcadastroGrau']) && !empty($getVars['IcadastroGrau']) &&
                isset($getVars['IcadastroEstadoCivil']) && !empty($getVars['IcadastroEstadoCivil']) &&
                isset($getVars['IcadastroSexo']) && !empty($getVars['IcadastroSexo'])){

            if (!empty($_COOKIE['idCadastro']) && isset($getVars['Edicao']) && !empty($getVars['Edicao'])){
                //edit

                $Retorno = $Cadastrar_cv_Model->edit_Cadastro($getVars['IcadastroEmail'],$getVars['IcadastroNome'],
                        $getVars['IcadastroDatanasci'],$getVars['IcadastroTelefone'],
                        $getVars['IcadastroCelular'],$getVars['IcadastroCpf'],$getVars['IcadastroCep'],
                        $getVars['IcadastroEndereco'],$getVars['IcadastroBairro'],$getVars['IcadastroNumero'],
                        $getVars['IcadastroComplemento'],$getVars['IcadastroCidade'],$getVars['IcadastroEstado'],
                        $getVars['IcadastroPretencao'],$getVars['IcadastroGrau'],$getVars['IcadastroEstadoCivil'],
                        $getVars['IcadastroSexo'], $getVars['IcadastroCV'],
                        $getVars['IcadastroCat1'],$getVars['IcadastroVag1'],$getVars['IcadastroTempEx1'],
                        $getVars['IcadastroCat2'],$getVars['IcadastroVag2'],$getVars['IcadastroTempEx2'],
                        $getVars['IcadastroCat3'],$getVars['IcadastroVag3'],$getVars['IcadastroTempEx3'],
                        $getVars['IcadastroPNE'],$getVars['IcadastroPNEDetalhes']);
            }
            elseif(isset($getVars['IcadastroSenha']) && !empty($getVars['IcadastroSenha']) &&
                    isset($getVars['IcadastroCpf']) && !empty($getVars['IcadastroCpf'])){
                //create
                $Retorno = $Cadastrar_cv_Model->set_Cadastro($getVars['IcadastroEmail'],$getVars['IcadastroNome'],
                        sha1(sha1(md5($getVars['IcadastroSenha']))),$getVars['IcadastroDatanasci'],$getVars['IcadastroTelefone'],
                        $getVars['IcadastroCelular'],$getVars['IcadastroCpf'],$getVars['IcadastroCep'],
                        $getVars['IcadastroEndereco'],$getVars['IcadastroBairro'],$getVars['IcadastroNumero'],
                        $getVars['IcadastroComplemento'],$getVars['IcadastroCidade'],$getVars['IcadastroEstado'],
                        $getVars['IcadastroPretencao'],$getVars['IcadastroGrau'],$getVars['IcadastroEstadoCivil'],
                        $getVars['IcadastroSexo'], $getVars['IcadastroCV'],
                        $getVars['IcadastroCat1'],$getVars['IcadastroVag1'],$getVars['IcadastroTempEx1'],
                        $getVars['IcadastroCat2'],$getVars['IcadastroVag2'],$getVars['IcadastroTempEx2'],
                        $getVars['IcadastroCat3'],$getVars['IcadastroVag3'],$getVars['IcadastroTempEx3'],
                        $getVars['IcadastroPNE'],$getVars['IcadastroPNEDetalhes']);
                setcookie("NomePessoa", utf8_encode($getVars['IcadastroNome']), time() + (86400 * 7)); // 1 dia
            }

            echo $Retorno;
        }

        //Enviar e-mail confirmação
        if (isset($getVars['EmailConf']) && !empty($getVars['EmailConf']) &&
                isset($getVars['Email']) && !empty($getVars['Email']) &&
                isset($getVars['Nome']) && !empty($getVars['Nome'])){
            $Envio = $Email->Enviar_Conf_Cadastro_Usuario($getVars['Email'], $getVars['Nome']);
            
            return 1;
        }
        
        //Enviar e-mail para candidato
        if (isset($getVars['IEmail']) && !empty($getVars['IEmail']) &&
                isset($getVars['IMsgEmail']) && !empty($getVars['IMsgEmail']) &&
                isset($getVars['IEnvEmail']) && !empty($getVars['IEnvEmail']) &&
                !empty($_COOKIE['idCadastroEmp'])){
            
//            $email = $Cadastrar_Empresa_Model->get_EmailById($_COOKIE['idCadastroEmp']);
//            if(!empty($email)){
//                $Envio = $Email->Enviar_Email_Candidato($getVars['IEmail'], $getVars['IMsgEmail']);
//                echo 1;
//            }else{
//                echo 0;
//            }
            $Envio = $Email->Enviar_Email_Candidato($getVars['IEmail'], $getVars['IMsgEmail']);
            echo 1;
        }
                
        //Editar
        if (isset($getVars['Editar']) && !empty($getVars['Editar']) && !empty($_COOKIE['idCadastro'])){
            //telmplates
            $view = new View_Model($this->template);
                    
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(false));
            $view->assign('Metodo', 'Editar CV');
            $view->assign('Edicao', '1');
            $this->CarregaUsuario($view,$_COOKIE['idCadastro']);
            
            $view->render();
        }
        
        //Perfil Usuario
        if (isset($getVars['idUsuario']) && !empty($getVars['idUsuario'])){
            //telmplates
            $view = new View_Model($this->template);
                    
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(false));
            $view->assign('Metodo', 'Visualização de Perfil');
            $view->assign('Perfil', '1');
            $this->CarregaUsuario($view,$getVars['idUsuario']);
            
            $view->render();
        }
        
        //GET Pretenção
        if (isset($getVars['getPretencao']) && !empty($getVars['getPretencao'])){
            $Retorno = $Cadastrar_cv_Model->get_Pretencoes();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Graus
        if (isset($getVars['getGrau']) && !empty($getVars['getGrau'])){
            $Retorno = $Cadastrar_cv_Model->get_Graus();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Estados
        if (isset($getVars['getEstados']) && !empty($getVars['getEstados'])){
            $Retorno = $Cadastrar_cv_Model->get_Estados();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Cidades
        if (isset($getVars['getCidades']) && !empty($getVars['getCidades'])){
            $Retorno = $Cadastrar_cv_Model->get_Cidades();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Estados Civis
        if (isset($getVars['getEstadosCivis']) && !empty($getVars['getEstadosCivis'])){
            $Retorno = $Cadastrar_cv_Model->get_Estados_Civis();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Sexos
        if (isset($getVars['getSexos']) && !empty($getVars['getSexos'])){
            $Retorno = $Cadastrar_cv_Model->get_Sexos();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Categorias
        if (isset($getVars['getCategorias']) && !empty($getVars['getCategorias'])){
            $Retorno = $Cadastrar_cv_Model->get_CategoriasAtivas();
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        //GET Vagas
        if (isset($getVars['getVagas']) && !empty($getVars['getVagas'])){
            $Retorno = $Cadastrar_cv_Model->get_Vagas($getVars['getVagas']);
            
            $texto = "[";
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $texto .= '{"Codigo": ' . utf8_encode($dados['Codigo']) . ', "Nome": "' . utf8_encode($dados['Nome']) . '"},';
                }
                $texto = substr($texto, 0, strlen($texto) - 1); 
                $texto .= "]";
                echo($texto);
            }
        }
        
        if (isset($getVars['getPNE']) && !empty($getVars['getPNE'])){

            $texto = "[";
            $texto .= '{"Codigo": 1, "Nome": "Física"},';
            $texto .= '{"Codigo": 2, "Nome": "Auditiva"},';
            $texto .= '{"Codigo": 3, "Nome": "Visual"},';
            $texto .= '{"Codigo": 4, "Nome": "Mental"},';
            $texto .= '{"Codigo": 5, "Nome": "Múltiplas"}';
            $texto .= "]";
            echo($texto);
        }
                
        /*
        * 
        * ************* RECEBENDO DADOS *************
        * 
        */
        if (isset($getVars['nome']) && !empty($getVars['nome']) &&
                isset($getVars['cpf']) && !empty($getVars['cpf']) &&
                isset($getVars['senha']) && !empty($getVars['senha'])){
            
            //telmplates
            $view = new View_Model($this->template);
            
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->assign('Metodo', 'Cadastrar CV');
            $view->assign('Nome', $getVars['nome']);
            $view->assign('CPF', $getVars['cpf']);
            $view->assign('Senha', $getVars['senha']);
            
            $view->render();
        }
        
        if (isset($getVars['Congelamento'])){
            
            //telmplates
            $Retorno = $Cadastrar_cv_Model->set_Congelamento($getVars['Congelamento']);
            
            echo(1);
        }
        
        
        /*
        * 
        * ************* LOGIN *************
        * 
        */
        if (isset($getVars['Login']) && !empty($getVars['Login']) &&
                isset($getVars['Senha']) && !empty($getVars['Senha'])){
            
            $Retorno = $Cadastrar_cv_Model->Login($getVars['Login'],$getVars['Senha']);
                        
            if($Retorno){
                foreach ($Retorno as $dados) {
                    setcookie("idCadastro", sha1(md5($dados['Codigo'])), time() + (86400 * 7)); // 1 dia
                    setcookie("NomePessoa", utf8_encode($dados['Nome']), time() + (86400 * 7)); // 1 dia
                    setcookie("Sexo", utf8_encode($dados['Sexo']), time() + (86400 * 7)); // 1 dia 
                    setcookie("DataNascimento", utf8_encode($dados['DataNascimento']), time() + (86400 * 7)); // 1 dia
                    setcookie("GrauEscolaridade", utf8_encode($dados['GrauEscolaridade']), time() + (86400 * 7)); // 1 dia
                    setcookie("Pretencao", utf8_encode($dados['Pretencao']), time() + (86400 * 7)); // 1 dia
                    setcookie("Cidade", utf8_encode($dados['Cidade']), time() + (86400 * 7)); // 1 dia
                    setcookie("Estado", utf8_encode($dados['Estado']), time() + (86400 * 7)); // 1 dia
                    setcookie("Status", utf8_encode($dados['Status']), time() + (86400 * 7)); // 1 dia
                    setcookie("Confirmacao", utf8_encode($dados['Confirmacao']), time() + (86400 * 7)); // 1 dia
                    setcookie("resetpswd", md5(sha1(md5(utf8_encode(utf8_encode($dados['Email']))))), time() + (86400 * 7)); // 1 dia
                    setcookie("PNE", md5(sha1(md5(utf8_encode(utf8_encode($dados['PNE']))))), time() + (86400 * 7)); // 1 dia
                    setcookie("PNEDetalhes", md5(sha1(md5(utf8_encode(utf8_encode($dados['PNE']))))), time() + (86400 * 7)); // 1 dia
                }
                echo 1;
            }
        }
        
        //Confirmação de e-mail
        if (isset($getVars['confirm']) && !empty($getVars['confirm'])){
            
            $Retorno = $Cadastrar_cv_Model->set_Confirmação($getVars['confirm']);
                 
            setcookie("Confirmacao", 1, time() + (86400 * 7)); // 1 dia
            header( 'Location: ?index&act=1' );
        }
        
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(false));
            $view->assign('Metodo', 'Cadastrar CV');

            $view->render();
        }

    }
    
    function CarregaUsuario($view,$idCadastro){
                    
        if (!empty($idCadastro)){
            $view->assign('Nome', 'Nome');
            //Recupera dados
            $Cadastrar_cv_Model = new Cadastrar_cv_Model();
            
            //Cadastro
            $Retorno = $Cadastrar_cv_Model->get_Cadastro($idCadastro);
                        
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $view->assign('Email', utf8_encode($dados['Email']));
                    $view->assign('Nome', utf8_encode($dados['Nome']));
                    $view->assign('DataNasci', utf8_encode($dados['DataNasci']));
                    $view->assign('Telefone', utf8_encode($dados['Telefone']));
                    $view->assign('Celular', utf8_encode($dados['Celular']));
                    $view->assign('CPF', utf8_encode($dados['CPF']));
                    $view->assign('CEP', utf8_encode($dados['CEP']));
                    $view->assign('Endereco', utf8_encode($dados['Endereco']));
                    $view->assign('Bairro', utf8_encode($dados['Bairro']));
                    $view->assign('Numero', utf8_encode($dados['Numero']));
                    $view->assign('Complemento', utf8_encode($dados['Complemento']));
                    $view->assign('Cidade', utf8_encode($dados['Cidade']));
                    $view->assign('Estado', utf8_encode($dados['Estado']));
                    $view->assign('Pretencao', utf8_encode($dados['Pretencao']));
                    $view->assign('Grau', utf8_encode($dados['Grau']));
                    $view->assign('EstadoCivil', utf8_encode($dados['EstadoCivil']));
                    $view->assign('Sexo', utf8_encode($dados['Sexo']));
                    $view->assign('PNE', utf8_encode($dados['PNE']));
                    $view->assign('PNEDetalhes', utf8_encode($dados['PNEDetalhes']));
                }
            }
            
            //Vagas Interesse
            $Retorno = $Cadastrar_cv_Model->get_VagasInteresse($idCadastro);
                       
            if($Retorno){
                $count = 1;
                foreach ($Retorno as $dados) {
                    $view->assign('Categoria' . $count, $dados['Categoria']);
                    $view->assign('Vaga' . $count, $dados['Vaga']);
                    $view->assign('Tempo' . $count, $dados['Tempo']);
                    $count++;
                }
            }
            
            //Vagas Interesse por nome
            $Retorno = $Cadastrar_cv_Model->get_VagasInteresseNome($idCadastro);
            
            if($Retorno){
                $count = 1;
                foreach ($Retorno as $dados) {
                    $view->assign('CategoriaNome' . $count, utf8_encode($dados['Categoria']));
                    $view->assign('VagaNome' . $count, utf8_encode($dados['Vaga']));
                    $view->assign('TempoNome' . $count, utf8_encode($dados['Tempo']));
                    $count++;
                }
            }
            
            //CV
            $Retorno = $Cadastrar_cv_Model->get_CV($idCadastro);
                       
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $view->assign('CV', utf8_encode($dados['CV']));
                }
            }
        }
    }
}