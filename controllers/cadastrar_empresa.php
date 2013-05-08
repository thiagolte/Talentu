<?php
class Cadastrar_Empresa_Controller {

    public $template = 'cadastrar_empresa/cadastrar_empresa';

    public function main(array $getVars) {
        
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
                isset($getVars['IcadastroTelefone']) && !empty($getVars['IcadastroTelefone']) &&
                isset($getVars['IcadastroCnpj']) && !empty($getVars['IcadastroCnpj']) &&
                isset($getVars['IcadastroCep']) && !empty($getVars['IcadastroCep']) &&
                isset($getVars['IcadastroEndereco']) && !empty($getVars['IcadastroEndereco']) &&
                isset($getVars['IcadastroBairro']) && !empty($getVars['IcadastroBairro']) &&
                isset($getVars['IcadastroNumero']) && !empty($getVars['IcadastroNumero']) &&
                isset($getVars['IcadastroCidade']) && !empty($getVars['IcadastroCidade']) &&
                isset($getVars['IcadastroEstado']) && !empty($getVars['IcadastroEstado']) &&
                isset($getVars['IcadastroNumFunc']) && !empty($getVars['IcadastroNumFunc']) &&
                isset($getVars['IcadastroAreaAtuacao']) && !empty($getVars['IcadastroAreaAtuacao']) &&
                isset($getVars['IcadastroSite']) && !empty($getVars['IcadastroSite']) &&
                isset($getVars['IcadastroDescricao']) && !empty($getVars['IcadastroDescricao'])){
            
            if (!empty($_COOKIE['idCadastroEmp']) && isset($getVars['Edicao']) && !empty($getVars['Edicao'])){
                //edit
                $Retorno = $Cadastrar_Empresa_Model->edit_Cadastro($getVars['IcadastroEmail'],$getVars['IcadastroNome'],
                        $getVars['IcadastroTelefone'],
                        $getVars['IcadastroCnpj'],$getVars['IcadastroCep'],
                        $getVars['IcadastroEndereco'],$getVars['IcadastroBairro'],$getVars['IcadastroNumero'],
                        $getVars['IcadastroComplemento'],$getVars['IcadastroCidade'],$getVars['IcadastroEstado'],
                        $getVars['IcadastroNumFunc'],$getVars['IcadastroAreaAtuacao'],$getVars['IcadastroSite'],
                        $getVars['IcadastroDescricao']);
            }
            elseif(isset($getVars['IcadastroSenha']) && !empty($getVars['IcadastroSenha'])){
                //create
                $Retorno = $Cadastrar_Empresa_Model->set_Cadastro($getVars['IcadastroEmail'],$getVars['IcadastroNome'],
                        sha1(sha1(md5($getVars['IcadastroSenha']))),$getVars['IcadastroTelefone'],
                        $getVars['IcadastroCnpj'],$getVars['IcadastroCep'],
                        $getVars['IcadastroEndereco'],$getVars['IcadastroBairro'],$getVars['IcadastroNumero'],
                        $getVars['IcadastroComplemento'],$getVars['IcadastroCidade'],$getVars['IcadastroEstado'],
                        $getVars['IcadastroNumFunc'],$getVars['IcadastroAreaAtuacao'],$getVars['IcadastroSite'],
                        $getVars['IcadastroDescricao']);
                setcookie("NomePessoa", utf8_encode($getVars['IcadastroNome']), time() + (86400 * 7)); // 1 dia
            }

            echo $Retorno;
        }

        //Enviar e-mail confirmação
        if (isset($getVars['EmailConf']) && !empty($getVars['EmailConf']) &&
                isset($getVars['Email']) && !empty($getVars['Email']) &&
                isset($getVars['Nome']) && !empty($getVars['Nome'])){
            $Envio = $Email->Enviar_Conf_Cadastro_Empresa($getVars['Email'], $getVars['Nome']);
            
            return 1;
        }

        //Editar
        if (isset($getVars['Editar']) && !empty($getVars['Editar']) && !empty($_COOKIE['idCadastroEmp'])){
            //telmplates
            $view = new View_Model($this->template);
                    
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(false));
            $view->assign('Metodo', 'Editar Empresa');
            $view->assign('Edicao', '1');
            $this->CarregaEmpresa($view);
            
            $view->render();
        }
        
        
        /*
        * 
        * ************* RECEBENDO DADOS *************
        * 
        */
        if (isset($getVars['nome']) && !empty($getVars['nome']) &&
                isset($getVars['CNPJ']) && !empty($getVars['CNPJ']) &&
                isset($getVars['senha']) && !empty($getVars['senha'])){
            
            //telmplates
            $view = new View_Model($this->template);
            
            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->assign('Metodo', 'Cadastrar Empresa');
            $view->assign('Nome', $getVars['nome']);
            $view->assign('CPF', $getVars['cpf']);
            $view->assign('Senha', $getVars['senha']);
            
            $view->render();
        }
        
        if (isset($getVars['Congelamento'])){
            
            //telmplates
            $Retorno = $Cadastrar_Empresa_Model->set_Congelamento($getVars['Congelamento']);
            
            echo(1);
        }
        
        /*
        * 
        * ************* LOGIN *************
        * 
        */
        if (isset($getVars['Login']) && !empty($getVars['Login']) &&
                isset($getVars['Senha']) && !empty($getVars['Senha'])){
            
            $Retorno = $Cadastrar_Empresa_Model->Login($getVars['Login'],$getVars['Senha']);
                        
            if($Retorno){
                foreach ($Retorno as $dados) {
                    setcookie("idCadastroEmp", sha1(md5($dados['Codigo'])), time() + (86400 * 7)); // 1 dia
                    setcookie("NomePessoa", utf8_encode($dados['Nome']), time() + (86400 * 7)); // 1 dia
                    setcookie("NomePessoa", utf8_encode($dados['Nome']), time() + (86400 * 7)); // 1 dia
                    setcookie("NumFunc", utf8_encode($dados['NumFunc']), time() + (86400 * 7)); // 1 dia
                    setcookie("AreaAtuacao", utf8_encode($dados['AreaAtuacao']), time() + (86400 * 7)); // 1 dia
                    setcookie("Site", utf8_encode($dados['Site']), time() + (86400 * 7)); // 1 dia
                    setcookie("Cidade", utf8_encode($dados['Cidade']), time() + (86400 * 7)); // 1 dia
                    setcookie("Estado", utf8_encode($dados['Estado']), time() + (86400 * 7)); // 1 dia
                    setcookie("Status", utf8_encode($dados['Status']), time() + (86400 * 7)); // 1 dia
                    setcookie("resetpswd", md5(sha1(md5(utf8_encode(utf8_encode($dados['Email']))))), time() + (86400 * 7)); // 1 dia
                }
                echo 1;
            }
        }
        
        //Confirmação de e-mail
        if (isset($getVars['confirm']) && !empty($getVars['confirm'])){
            
            $Retorno = $Cadastrar_Empresa_Model->set_Confirmação($getVars['confirm']);
                 
            setcookie("Confirmacao", 1, time() + (86400 * 7)); // 1 dia
            header( 'Location: ?index&act=1' );
        }
                
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            $view->assign('Metodo', 'Cadastrar Empresa');

            $view->render();
        }

    }
    
    function CarregaEmpresa($view){
                    
        if (!empty($_COOKIE['idCadastroEmp'])){
            $view->assign('Nome', 'Nome');
            //Recupera dados
            $Cadastrar_Empresa_Model = new Cadastrar_Empresa_Model();
            
            //Cadastro
            $Retorno = $Cadastrar_Empresa_Model->get_Cadastro($_COOKIE['idCadastroEmp']);
                        
            if($Retorno){
                foreach ($Retorno as $dados) {
                    $view->assign('Email', utf8_encode($dados['Email']));
                    $view->assign('Nome', utf8_encode($dados['Nome']));
                    $view->assign('DataNasci', utf8_encode($dados['DataNasci']));
                    $view->assign('Telefone', utf8_encode($dados['Telefone']));
                    $view->assign('Celular', utf8_encode($dados['Celular']));
                    $view->assign('CNPJ', utf8_encode($dados['CNPJ']));
                    $view->assign('CEP', utf8_encode($dados['CEP']));
                    $view->assign('Endereco', utf8_encode($dados['Endereco']));
                    $view->assign('Bairro', utf8_encode($dados['Bairro']));
                    $view->assign('Numero', utf8_encode($dados['Numero']));
                    $view->assign('Complemento', utf8_encode($dados['Complemento']));
                    $view->assign('Cidade', utf8_encode($dados['Cidade']));
                    $view->assign('Estado', utf8_encode($dados['Estado']));
                    $view->assign('NumFunc', utf8_encode($dados['NumFunc']));
                    $view->assign('AreaAtuacao', utf8_encode($dados['AreaAtuacao']));
                    $view->assign('Site', utf8_encode($dados['Site']));
                    $view->assign('Descricao', utf8_encode($dados['Descricao']));
                }
            }
        }
    }
}