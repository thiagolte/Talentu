<?php

class Depoimentos_Model {
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
    * ************* DEPOIMENTO *************
    * 
    */
    public function set_Depoimento($idCadastro, $Depoimento) {
   
        $this->db->connect(); 
        
        $idCadastro = $this->db->escape(utf8_decode($idCadastro));
        $Depoimento = $this->db->escape(utf8_decode($Depoimento));
        
        $Retorno = $this->MySQLIUD(
                "
                INSERT INTO tb0011_Depoimentos
                        (pessoaDEPOIMENTO,depoimentoDEPOIMENTO)
                SELECT
                        codigoCADASTROPESSOA,'$Depoimento'
                FROM    tb0001_Cadastro_Pessoa
                WHERE   SHA1(MD5(codigoCADASTROPESSOA)) = '$idCadastro'
                ;
                "
        );
                
        return $Retorno;
    }
    
    public function get_Depoimentos($qtd) {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                        nomecompletoCADASTROPESSOA AS Nome,
                        cidadeCADASTROPESSOA AS Cidade,
                        estadoCADASTROPESSOA AS Estado,
                        depoimentoDEPOIMENTO AS Depoimento,
                        sexoCADASTROPESSOA AS Sexo
                FROM
                        tb0011_Depoimentos
                INNER JOIN tb0001_Cadastro_Pessoa
                        ON codigoCADASTROPESSOA = pessoaDEPOIMENTO
                ORDER BY
                        codigoDEPOIMENTO DESC
                LIMIT   $qtd
                ;
                "
        );
        
        return $Retorno;
    }

}