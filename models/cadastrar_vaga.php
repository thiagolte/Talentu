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
   
        $this->db->connect(); 
        
        
        $idCadastro = $this->MySQLIUD($this->db->escape(utf8_decode(
                "
                INSERT INTO 
                    tb0013_Vagas_Empresa
                        (empresaVAGAEMPRESA, localVAGAEMPRESA, confidencialVAGAEMPRESA,
                        ramoVAGAEMPRESA, nacionalidadeVAGAEMPRESA, porteVAGAEMPRESA
                        descricaoVAGAEMPRESA, quantidadeVAGAEMPRESA, atribuicoesVAGAEMPRESA,
                        experienciaVAGAEMPRESA, escolaridadeVAGAEMPRESA, qualificacoesVAGAEMPRESA,
                        categoriaVAGAEMPRESA, vagaVAGAEMPRESA, salarioVAGAEMPRESA,
                        acombinarVAGAEMPRESA, regimecontratacaoVAGAEMPRESA, beneficiosVAGAEMPRESA,
                        regimetrabalhoVAGAEMPRESA, horariodeVAGAEMPRESA, horarioateVAGAEMPRESA,
                        meiosrecebimentoVAGAEMPRESA, emailrecebimentoVAGAEMPRESA, ativarVAGAEMPRESA,
                        questao1VAGAEMPRESA, tiporesposta1VAGAEMPRESA, filtroativo1VAGAEMPRESA,
                        questao2VAGAEMPRESA, tiporesposta2VAGAEMPRESA, filtroativo2VAGAEMPRESA,
                        questao3VAGAEMPRESA, tiporesposta3VAGAEMPRESA, filtroativo3VAGAEMPRESA,
                        questao4VAGAEMPRESA, tiporesposta4VAGAEMPRESA, filtroativo4VAGAEMPRESA,
                        questao5VAGAEMPRESA, tiporesposta5VAGAEMPRESA, filtroativo5VAGAEMPRESA)
                SELECT
                        $empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                        '$descricao', $quantidade, '$atribuicoes', '$experiencia', $escolaridade,
                        '$qualificacoes', $categoria, $vaga, '$salario', $acombinar, $regimecontratacao,
                        '$beneficios', $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                        '$emailrecebimento', $ativar,
                        '$questao1', $tiporesposta1, $filtroativo1,
                        '$questao2', $tiporesposta2, $filtroativo2,
                        '$questao3', $tiporesposta3, $filtroativo3,
                        '$questao4', $tiporesposta4, $filtroativo4,
                        '$questao5', $tiporesposta5, $filtroativo5
                ;
                "
        )));
    }
    
    //EDIT
    public function edit_CadastroVaga($empresa, $local, $confidencial, $ramo, $nacionalidade, $porte,
                                    $descricao, $quantidade, $atribuicoes, $experiencia, $escolaridade,
                                    $qualificacoes, $categoria, $vaga, $salario, $acombinar, $regimecontratacao,
                                    $beneficios, $regimetrabalho, $horariode, $horarioate, $meiosrecebimento,
                                    $emailrecebimento, $ativar, $questao1, $tiporesposta1, $filtroativo1,
                                    $questao2, $tiporesposta2, $filtroativo2,
                                    $questao3, $tiporesposta3, $filtroativo3,
                                    $questao4, $tiporesposta4, $filtroativo4,
                                    $questao5, $tiporesposta5, $filtroativo5) {
   
        $this->db->connect(); 

        $idCadastro = $this->MySQLIUD($this->db->escape(utf8_decode(
                "
                UPDATE 
                    tb0013_Vagas_Empresa
                SET
                   
                WHERE 
                    SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                ;
                "
            )));
        
        return $idCadastro;
    }
}