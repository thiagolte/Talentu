<?php

class Adm_Model {
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
    
    //CATEGORIA
    public function get_Categorias() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT 
                codigoCATEGORIA AS codigo,
                nomeCATEGORIA AS nome,
                ativoCATEGORIA AS ativo 
            FROM
                tb0007_Categorias
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function set_Categoria($Nome, $Ativo){
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            INSERT INTO 
                tb0007_Categorias
                    (nomeCATEGORIA,ativoCATEGORIA)
            SELECT
                '$Nome',$Ativo
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_Categoria($Codigo,$Nome,$Ativo){
        
        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            UPDATE
                tb0007_Categorias
            SET
                nomeCATEGORIA = '$Nome'
                ativoCATEGORIA = $Ativo
            WHERE
                codigoCATEGORIA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function delete_Categoria($Codigo){
        
        $Codigo = $this->db->escape(utf8_decode($Codigo));
        
        $Retorno = $this->MySQLIUD(
            "
            DELETE FROM
                tb0007_Categorias
            WHERE
                codigoCATEGORIA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }
    
    //VAGA
    public function get_Vagas() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT	
                codigoVAGA AS codigo, 
                nomeVAGA AS nome,
                ativoVAGA AS ativo
            FROM
                tb0008_Vagas
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function set_Vaga($Nome,$Ativo){
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            INSERT INTO 
                tb0008_Vagas
                    (nomeVAGA,ativoVAGA)
            SELECT
                '$Nome',$Ativo
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_Vaga($Codigo,$Nome,$Ativo){
        
        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            UPDATE
                tb0008_Vagas
            SET
                nomeVAGA = '$Nome'
                ativoVAGA = $Ativo
            WHERE
                codigoVAGA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function delete_Vaga($Codigo){
        
        $Codigo = $this->db->escape(utf8_decode($Codigo));
        
        $Retorno = $this->MySQLIUD(
            "
            DELETE FROM
                tb0008_Vagas
            WHERE
                codigoVAGA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }

}