<?php

class Cadastrar_vaga_Model {
    private $db;

    public function __construct() {
        $this->db = new MysqlImproved_Driver();
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
    //CREATE
    public function set_CadastroVaga($arrVaga) {
        
        if(isset($arrVaga['empresa']) && !empty($arrVaga['empresa']))
        {
            
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            
            $values = array($arrVaga['empresa'], $arrVaga['local'], $arrVaga['confidencial'],
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

            return $idCadastro;
        }
    }
    
    //EDIT
    public function edit_CadastroVaga($arrVaga) {
        if(isset($arrVaga['idVaga']) && !empty($arrVaga['idVaga']) &&
           isset($arrVaga['empresa']) && !empty($arrVaga['empresa']))
        {  
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            
            $values = array($arrVaga['idVaga'],$arrVaga['empresa'], $arrVaga['local'], $arrVaga['confidencial'],
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
        
            $idCadastro = $this->db->Update('tb0013_Vagas_Empresa',$values);

            return $idCadastro;
        }
    }
}