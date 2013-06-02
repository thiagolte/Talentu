<?php

class Cadastrar_vaga_Model {
    private $db;
    public $Cadastrar_Empresa_Model;
    

    public function __construct() {
        $this->db = new MysqlImproved_Driver();
        
        $this->Cadastrar_Empresa_Model = new Cadastrar_Empresa_Model();
    }

    Private function MySQLSelect($Query) {
        $this->db->connect(); 

        $this->db->prepare($Query);

        $this->db->query();

        $Retorno = $this->db->fetch('array');
        
        $this->db->disconnect(); 
        return $Retorno;
    }
    
    /* IUD = INSERT, UPDATE, DELETE */
    private function MySQLIUD($Query) {
        $this->db->connect(); 

        $this->db->prepare($Query);

        $this->db->query();

        $Retorno = $this->db->insert();
        
        $this->db->disconnect(); 
        return $Retorno; 
    }    
    
    
    /*
    * 
    * ************* Vagas *************
    * 
    */
    //SELECT
    public function get_VagasEmpresa(){
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                        codigoVAGAEMPRESA as Codigo,
                        salarioVAGAEMPRESA as Salario,
                        acombinarVAGAEMPRESA as Combinar,
                        atribuicoesVAGAEMPRESA as Atribuicoes,
                        COALESCE(nomeVAGA,'Não especificado') as Vaga
                FROM
                        tb0013_Vagas_Empresa
                LEFT JOIN
                        tb0008_Vagas ON codigoVAGA = vagaVAGAEMPRESA
                WHERE
                    empresaVAGAEMPRESA = " . $idEmpresa . " 
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Vaga($idVaga){
       
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                        codigoVAGAEMPRESA as Codigo,
                        salarioVAGAEMPRESA as Salario,
                        acombinarVAGAEMPRESA as Combinar,
                        atribuicoesVAGAEMPRESA as Atribuicoes,
                        COALESCE(nomeVAGA,'Não especificado') as Vaga
                FROM
                        tb0013_Vagas_Empresa
                LEFT JOIN
                        tb0008_Vagas ON codigoVAGA = vagaVAGAEMPRESA
                WHERE
                    SHA1(MD5(codigoVAGAEMPRESA)) = '" . $idVaga . "' 
                ;
                "
        );
        
        return $Retorno;
    }
    
    //CREATE
    public function set_CadastroVaga($arrVaga) {
                
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        if(isset($idEmpresa) && !empty($idEmpresa))
        {
            
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            

            
            $values = array($idEmpresa, $arrVaga['local'], $arrVaga['confidencial'],
                            $arrVaga['ramoAtuacao'], $arrVaga['nacionalidade'], $arrVaga['porte'],
                            $arrVaga['descricao'], $arrVaga['quantidade'], $arrVaga['atribuicoes'],
                            $arrVaga['experiencia'], $arrVaga['escolaridade'],$arrVaga['qualificacoes'],
                            $arrVaga['categoria'], $arrVaga['vaga'], $arrVaga['salario'],
                            $arrVaga['salarioCombinar'], $arrVaga['regimeContratacao'],$arrVaga['beneficios'],
                            $arrVaga['regimeTrabalho'], $arrVaga['horarioDe'], $arrVaga['horarioAte'], 
                            $arrVaga['meiosRecebimento'],$arrVaga['emailRecebimento'], $arrVaga['ativar'],
                            $arrVaga['questao1'], $arrVaga['tipoResposta1'], $arrVaga['filtroAtivo1'],
                            $arrVaga['questao2'], $arrVaga['tipoResposta2'], $arrVaga['filtroAtivo2'],
                            $arrVaga['questao3'], $arrVaga['tipoResposta3'], $arrVaga['filtroAtivo3'],
                            $arrVaga['questao4'], $arrVaga['tipoResposta4'], $arrVaga['filtroAtivo4'],
                            $arrVaga['questao5'], $arrVaga['tipoResposta5'], $arrVaga['filtroAtivo5']);


            $idCadastro = $this->db->Create('tb0013_Vagas_Empresa',$values);

            if($idCadastro > 0){
                $values = array($idCadastro, $arrVaga['filtroSexo'], $arrVaga['filtroFaixaEtaria'],
                                $arrVaga['filtroPretensaoSalarial'], $arrVaga['filtroPNE'],
                                $arrVaga['filtroEstado'], $arrVaga['filtroCidade']);
                
                $idFiltro = $this->db->Create('tb0014_Filtros_Vaga',$values);
            }
            
            return $idCadastro;
        }
    }
    
    //EDIT
    public function edit_CadastroVaga($arrVaga) {
        
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        if(isset($arrVaga['idVaga']) && !empty($arrVaga['idVaga']) &&
           isset($idEmpresa) && !empty($idEmpresa))
        {  
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            
            $values = array($arrVaga['idVaga'], $idEmpresa, $arrVaga['local'], $arrVaga['confidencial'],
                            $arrVaga['ramoAtuacao'], $arrVaga['nacionalidade'], $arrVaga['porte'],
                            $arrVaga['descricao'], $arrVaga['quantidade'], $arrVaga['atribuicoes'],
                            $arrVaga['experiencia'], $arrVaga['escolaridade'],$arrVaga['qualificacoes'],
                            $arrVaga['categoria'], $arrVaga['vaga'], $arrVaga['salario'],
                            $arrVaga['salarioCombinar'], $arrVaga['regimeContratacao'],$arrVaga['beneficios'],
                            $arrVaga['regimeTrabalho'], $arrVaga['horarioDe'], $arrVaga['horarioAte'], 
                            $arrVaga['meiosRecebimento'],$arrVaga['emailRecebimento'], $arrVaga['ativar'],
                            $arrVaga['questao1'], $arrVaga['tipoResposta1'], $arrVaga['filtroAtivo1'],
                            $arrVaga['questao2'], $arrVaga['tipoResposta2'], $arrVaga['filtroAtivo2'],
                            $arrVaga['questao3'], $arrVaga['tipoResposta3'], $arrVaga['filtroAtivo3'],
                            $arrVaga['questao4'], $arrVaga['tipoResposta4'], $arrVaga['filtroAtivo4'],
                            $arrVaga['questao5'], $arrVaga['tipoResposta5'], $arrVaga['filtroAtivo5']);
        
            $retorno = $this->db->Update('tb0013_Vagas_Empresa',$values);

            if($arrVaga['idFiltro'] > 0  && $arrVaga['idVaga'] > 0){
                $values = array($arrVaga['idFiltro'], $arrVaga['idVaga'], $arrVaga['filtroSexo'], $arrVaga['filtroFaixaEtaria'],
                                $arrVaga['filtroPretensaoSalarial'], $arrVaga['filtroPNE'],
                                $arrVaga['filtroEstado'], $arrVaga['filtroCidade']);

                $retorno = $this->db->Update('tb0014_Filtros_Vaga',$values);
            }
            
            return $retorno;
        }
    }
}