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
        $this->db->connect(); 

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
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            UPDATE
                tb0007_Categorias
            SET
                nomeCATEGORIA = '$Nome'
                ,ativoCATEGORIA = $Ativo
            WHERE
                codigoCATEGORIA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }
    
    // public function delete_Categoria($Codigo){
        
    //     $Codigo = $this->db->escape(utf8_decode($Codigo));
        
    //     $Retorno = $this->MySQLIUD(
    //         "
    //         DELETE FROM
    //             tb0007_Categorias
    //         WHERE
    //             codigoCATEGORIA = $Codigo
    //         ;
    //         "
    //     );
        
    //     return $Retorno;
    // }
    
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
        $this->db->connect(); 

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
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            UPDATE
                tb0008_Vagas
            SET
                nomeVAGA = '$Nome',
                ativoVAGA = $Ativo
            WHERE
                codigoVAGA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }
    
    // public function delete_Vaga($Codigo){
        
    //     $Codigo = $this->db->escape(utf8_decode($Codigo));
        
    //     $Retorno = $this->MySQLIUD(
    //         "
    //         DELETE FROM
    //             tb0008_Vagas
    //         WHERE
    //             codigoVAGA = $Codigo
    //         ;
    //         "
    //     );
        
    //     return $Retorno;
    // }

    //CATEGORIA + VAGA
    public function get_Categorias_Vagas() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT  
                codigoVAGACATEGORIA AS codigo,
                codigoCATEGORIA AS codigoCat, 
                nomeCATEGORIA AS nomeCat,
                codigoVAGA AS codigoVag, 
                nomeVAGA AS nomeVag,
                ativoVAGACATEGORIA AS ativo
            FROM
                tb0009_Categoria_Vagas
            INNER JOIN 
                tb0007_Categorias ON codigoCATEGORIA = categoriaVAGACATEGORIA
            INNER JOIN 
                tb0008_Vagas ON codigoVAGA = vagaVAGACATEGORIA
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function set_CategoriaVaga($idCat,$idVag,$Ativo){
        $this->db->connect(); 

        $idCat = $this->db->escape(utf8_decode($idCat));
        $idVag = $this->db->escape(utf8_decode($idVag));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            INSERT INTO 
                tb0009_Categoria_Vagas
                    (categoriaVAGACATEGORIA,vagaVAGACATEGORIA, ativoVAGACATEGORIA)
            SELECT
                $idCat,$idVag,$Ativo
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_CategoriaVaga($Codigo,$idCat,$idVag,$Ativo){
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $idCat = $this->db->escape(utf8_decode($idCat));
        $idVag = $this->db->escape(utf8_decode($idVag));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $Retorno = $this->MySQLIUD(
            "
            UPDATE
                tb0009_Categoria_Vagas
            SET
                categoriaVAGACATEGORIA = $idCat,
                vagaVAGACATEGORIA = $idVag,
                ativoVAGACATEGORIA = $Ativo
            WHERE
                codigoVAGACATEGORIA = $Codigo
            ;
            "
        );
        
        return $Retorno;
    }

    //USUÁRIOS
    public function get_Usuarios() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT 
                codigoCADASTROPESSOA AS codigo,
                nomecompletoCADASTROPESSOA AS nome,
                emailCADASTROPESSOA AS email,
                DATE_FORMAT(datacadastroCADASTROPESSOA, '%d/%m/%Y %H:%i:%s' ) AS data,
                ativoCADASTROPESSOA AS ativo 
            FROM
                tb0001_Cadastro_Pessoa
            ORDER BY
                codigoCADASTROPESSOA DESC
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_Usuario($Codigo,$Nome,$Email,$ResetSenha,$Ativo){
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Email = $this->db->escape(utf8_decode($Email));
        $ResetSenha = $this->db->escape(utf8_decode($ResetSenha));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $query = "
            UPDATE
                tb0001_Cadastro_Pessoa
            SET
                nomecompletoCADASTROPESSOA = '$Nome'
                ,emailCADASTROPESSOA = '$Email'
                ,ativoCADASTROPESSOA = $Ativo";
                if ($ResetSenha == 1){
                    $query .= ",senhaCADASTROPESSOA='". sha1(sha1(md5('teste'))) ."'";
                }
                
            $query .= " WHERE
                codigoCADASTROPESSOA = $Codigo
            ;
            ";
        
        $Retorno = $this->MySQLIUD($query);
        
        return $Retorno;
    }
    
    // public function delete_Usuario($Codigo){
        
    //     $Codigo = $this->db->escape(utf8_decode($Codigo));
        
    //     $Retorno = $this->MySQLIUD(
    //         "
    //         DELETE FROM
    //             tb0007_Categorias
    //         WHERE
    //             codigoCATEGORIA = $Codigo
    //         ;
    //         "
    //     );
        
    //     return $Retorno;
    // }
    
    //EMPRESAS
    public function get_Empresas() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT 
                codigoCADASTROEMPRESA AS codigo,
                nomecompletoCADASTROEMPRESA AS nome,
                emailCADASTROEMPRESA AS email,
                telefoneCADASTROEMPRESA AS telefone,
                razaoCADASTROEMPRESA AS razao,
                fantasiaCADASTROEMPRESA AS fantasia,
                cnpjCADASTROEMPRESA AS cnpj,
                DATE_FORMAT(datacadastroCADASTROEMPRESA, '%d/%m/%Y %H:%i:%s' ) AS data,
                ativoCADASTROEMPRESA AS ativo 
            FROM
                tb0012_Cadastro_Empresas
            ORDER BY
                codigoCADASTROEMPRESA DESC
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_Empresa($Codigo,$Nome,$Email,$Razao,$Fantasia,$CNPJ,$Telefone,$ResetSenha,$Ativo){
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Email = $this->db->escape(utf8_decode($Email));
        $Razao = $this->db->escape(utf8_decode($Razao));
        $Fantasia = $this->db->escape(utf8_decode($Fantasia));
        $CNPJ = $this->db->escape(utf8_decode($CNPJ));
        $Telefone = $this->db->escape(utf8_decode($Telefone));
        $ResetSenha = $this->db->escape(utf8_decode($ResetSenha));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $query = "
            UPDATE
                tb0012_Cadastro_Empresas
            SET
                nomecompletoCADASTROEMPRESA = '$Nome'
                ,emailCADASTROEMPRESA = '$Email'
                ,telefoneCADASTROEMPRESA = '$Telefone'
                ,razaoCADASTROEMPRESA = '$Razao'
                ,fantasiaCADASTROEMPRESA = '$Fantasia'
                ,cnpjCADASTROEMPRESA = '$CNPJ'
                ,ativoCADASTROEMPRESA = $Ativo";
                if ($ResetSenha == 1){
                    $query .= ",senhaCADASTROEMPRESA='". sha1(sha1(md5('teste'))) ."'";
                }
                
            $query .= " WHERE
                codigoCADASTROEMPRESA = $Codigo
            ;
            ";
        
        $Retorno = $this->MySQLIUD($query);
        
        return $Retorno;
    }
    
    //VAGAS EMPRESAS
    public function get_VagasEmpresas() {        
        $Retorno = $this->MySQLSelect(
            "
            SELECT
            codigoVAGAEMPRESA AS codigo,
            CASE localVAGAEMPRESA
                    WHEN 1 THEN 'Vaga em minha empresa'
                    ELSE nomeempresaVAGAEMPRESA
            END AS local,
            cidadeempresaVAGAEMPRESA AS cidade,
            estadoempresaVAGAEMPRESA AS estado,
            razaoCADASTROEMPRESA AS razao,
            R.nomeCATEGORIA AS ramo,
            CASE nacionalidadeVAGAEMPRESA
                    WHEN 0 THEN 'Nacional'
                    WHEN 1 THEN 'Internaciona'
            END AS nacionalidade,
            CASE porteVAGAEMPRESA 
                    WHEN 1 THEN 'pequeno (de 1 a 99 funcionários)'
                    WHEN 2 THEN 'médio (de 100 a 499 funcionários)'
                    WHEN 3 THEN 'grande (mais de 500 funcionários)'
            END AS porte,
            descricaoVAGAEMPRESA AS descricao,
            quantidadeVAGAEMPRESA AS quantidade,
            atribuicoesVAGAEMPRESA AS atribuicoes,
            experienciaVAGAEMPRESA AS experiencia,
            nomeGRAUESCOLARIDADE AS escolaridade,
            qualificacoesVAGAEMPRESA AS qualificacoes,
            C.nomeCATEGORIA AS categoria,
            V.nomeVAGA AS vaga,
            CASE acombinarVAGAEMPRESA
                    WHEN 0 THEN salarioVAGAEMPRESA
                WHEN 1 THEN 'A Combinar'
            END AS combinar,
            CASE regimecontratacaoVAGAEMPRESA
                    WHEN 1 THEN 'CLT'
                    WHEN 2 THEN 'PJ'
                    WHEN 3 THEN 'Estágio'
                    WHEN 4 THEN 'Temporário'
                    WHEN 5 THEN 'Outros'
            END AS regime,
            beneficiosVAGAEMPRESA AS beneficios,
            regimetrabalhoVAGAEMPRESA AS regimetrabalho,
            horarioVAGAEMPRESA AS horario,
            questao1VAGAEMPRESA AS questao1,
            questao2VAGAEMPRESA AS questao2,
            questao3VAGAEMPRESA AS questao3,
            questao4VAGAEMPRESA AS questao4,
            questao5VAGAEMPRESA AS questao5,
            ativoVAGAEMPRESA AS ativo,
            DATE_FORMAT(datacadastroVAGAEMPRESA, '%d/%m/%Y %H:%i:%s' ) AS data
            FROM	tb0013_Vagas_Empresa
            INNER	JOIN tb0012_Cadastro_Empresas ON codigoCADASTROEMPRESA = empresaVAGAEMPRESA
            INNER	JOIN tb0007_Categorias R ON R.codigoCATEGORIA = ramoVAGAEMPRESA
            INNER	JOIN tb0003_Graus_Escolaridade ON codigoGRAUESCOLARIDADE = escolaridadeVAGAEMPRESA
            INNER	JOIN tb0007_Categorias C ON C.codigoCATEGORIA = categoriaVAGAEMPRESA
            INNER	JOIN tb0008_Vagas V ON V.codigoVAGA = vagaVAGAEMPRESA
            ;
            "
        );
        
        return $Retorno;
    }
    
    public function update_VagasEmpresa($Codigo,$Nome,$Email,$Razao,$Fantasia,$CNPJ,$Telefone,$ResetSenha,$Ativo){
        $this->db->connect(); 

        $Codigo = $this->db->escape(utf8_decode($Codigo));
        $Nome = $this->db->escape(utf8_decode($Nome));
        $Email = $this->db->escape(utf8_decode($Email));
        $Razao = $this->db->escape(utf8_decode($Razao));
        $Fantasia = $this->db->escape(utf8_decode($Fantasia));
        $CNPJ = $this->db->escape(utf8_decode($CNPJ));
        $Telefone = $this->db->escape(utf8_decode($Telefone));
        $ResetSenha = $this->db->escape(utf8_decode($ResetSenha));
        $Ativo = $this->db->escape(utf8_decode($Ativo));
        
        $query = "
            UPDATE
                tb0013_Vagas_Empresa
            SET
                nomecompletoCADASTROEMPRESA = '$Nome'
                ,emailCADASTROEMPRESA = '$Email'
                ,telefoneCADASTROEMPRESA = '$Telefone'
                ,razaoCADASTROEMPRESA = '$Razao'
                ,fantasiaCADASTROEMPRESA = '$Fantasia'
                ,cnpjCADASTROEMPRESA = '$CNPJ'
                ,ativoCADASTROEMPRESA = $Ativo";
                if ($ResetSenha == 1){
                    $query .= ",senhaCADASTROEMPRESA='". sha1(sha1(md5('teste'))) ."'";
                }
                
            $query .= " WHERE
                codigoCADASTROEMPRESA = $Codigo
            ;
            ";

        $Retorno = $this->MySQLIUD($query);
        
        return $Retorno;
    }
 
}