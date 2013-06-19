<?php

class Buscar_Vaga_Model {
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
    
    public function get_Joomla(){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                	introtext
               	FROM  
               		uo47p_content
               	WHERE
               		id = 3
                "
        );
        
        return $Retorno;
    }
}