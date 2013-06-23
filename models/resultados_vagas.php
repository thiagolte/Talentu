<?php

class Resultados_vagas_Model {
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
    //SELECT
    public function get_Vagas($categoria, $vaga, $estado, $cidade, $faixa, $pne){

       $query = "
                SELECT 
                    SHA1(MD5(codigoVAGAEMPRESA)) as idVaga,
                    CONCAT(cidadeempresaVAGAEMPRESA, ' - ', estadoempresaVAGAEMPRESA) AS 'Local',
                    salarioVAGAEMPRESA as Salario,
                    acombinarVAGAEMPRESA as Combinar,
                    atribuicoesVAGAEMPRESA as Atribuicoes,
                    COALESCE(nomeVAGA,'[sem nome]') as Vaga,
                    SHA1(MD5(codigoFILTROVAGA)) AS idFiltro
                FROM
                    tb0013_Vagas_Empresa
                LEFT JOIN
                    tb0008_Vagas ON codigoVAGA = vagaVAGAEMPRESA
                LEFT JOIN
                    tb0014_Filtros_Vaga ON vagaempresaFILTROVAGA = codigoVAGAEMPRESA
                WHERE codigoVAGAEMPRESA > 0";

                if(!empty($categoria) && isset($categoria)){
                    $query .= " AND categoriaVAGAEMPRESA LIKE '%$categoria%'";
                }
                if(!empty($vaga) && isset($vaga)){
                    $query .= " AND vagaVAGAEMPRESA LIKE '%$vaga%'";
                }
                if(!empty($estado) && isset($estado)){
                    $query .= " AND estadoempresaVAGAEMPRESA LIKE '%$estado%'";
                }
                if(!empty($cidade) && isset($cidade)){
                    $query .= " AND cidadeempresaVAGAEMPRESA LIKE '%$cidade%'";
                }
                if(!empty($faixa) && isset($faixa)){
                    $query .= " AND	salarioVAGAEMPRESA LIKE '%$faixa%'";
                }
//                if(!empty($pne) && isset($pne)){
//                    $query .= " AND	pneFILTROVAGA LIKE '%$pne%'";
//                }
                
        
       $Retorno = $this->MySQLSelect($query);
        
        return $Retorno;
    }
}