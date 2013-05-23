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
    public function set_CadastroVaga($empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                                    $descricao, $quantidade, $atribuicoes, $experiencia, $escolaridade,
                                    $qualificacoes, $categoria, $vaga, $salario, $acombinar, $regimecontratacao,
                                    $beneficios, $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                                    $emailrecebimento, $ativar, $questao1, $tiporesposta1, $filtroativo1,
                                    $questao2, $tiporesposta2, $filtroativo2,
                                    $questao3, $tiporesposta3, $filtroativo3,
                                    $questao4, $tiporesposta4, $filtroativo4,
                                    $questao5, $tiporesposta5, $filtroativo5) {
        
        $values = array($empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                        $descricao, $quantidade, $atribuicoes, $experiencia, $escolaridade,
                        $qualificacoes, $categoria, $vaga, $salario, $acombinar, $regimecontratacao,
                        $beneficios, $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                        $emailrecebimento, $ativar, $questao1, $tiporesposta1, $filtroativo1,
                        $questao2, $tiporesposta2, $filtroativo2,
                        $questao3, $tiporesposta3, $filtroativo3,
                        $questao4, $tiporesposta4, $filtroativo4,
                        $questao5, $tiporesposta5, $filtroativo5);
        
        $idCadastro = $this->db->Create('tb0013_Vagas_Empresa',$values);
        
        return $idCadastro;
    }
    
    //EDIT
    public function edit_CadastroVaga($idVaga, $empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                                    $descricao, $quantidade, $atribuicoes, $experiencia, $escolaridade,
                                    $qualificacoes, $categoria, $vaga, $salario, $acombinar, $regimecontratacao,
                                    $beneficios, $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                                    $emailrecebimento, $ativar, $questao1, $tiporesposta1, $filtroativo1,
                                    $questao2, $tiporesposta2, $filtroativo2,
                                    $questao3, $tiporesposta3, $filtroativo3,
                                    $questao4, $tiporesposta4, $filtroativo4,
                                    $questao5, $tiporesposta5, $filtroativo5) {
   
        $values = array($idVaga, $empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                        $descricao, $quantidade, $atribuicoes, $experiencia, $escolaridade,
                        $qualificacoes, $categoria, $vaga, $salario, $acombinar, $regimecontratacao,
                        $beneficios, $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                        $emailrecebimento, $ativar, $questao1, $tiporesposta1, $filtroativo1,
                        $questao2, $tiporesposta2, $filtroativo2,
                        $questao3, $tiporesposta3, $filtroativo3,
                        $questao4, $tiporesposta4, $filtroativo4,
                        $questao5, $tiporesposta5, $filtroativo5);
        
        $idCadastro = $this->db->Update('tb0013_Vagas_Empresa',$values);
        
        return $idCadastro;
    }
    
}