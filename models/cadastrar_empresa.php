<?php

class Cadastrar_Empresa_Model {
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
    * ************* CADASTRO *************
    * 
    */
    //CREATE
    public function set_Cadastro($email, $nome, $senha, $telefone, $cnpj,
            $cep, $endereco, $bairro, $numero, $complemento, $cidade, $estado, $numfunc,
            $areaatuacao, $site, $Descricao) {
   
        $this->db->connect(); 
        
        $email = $this->db->escape(utf8_decode($email));
        $nome = $this->db->escape(utf8_decode($nome));
        $senha = $this->db->escape(utf8_decode($senha));
        
        $telefone = $this->db->escape(utf8_decode($telefone));
        $cnpj = $this->db->escape(utf8_decode($cnpj));
        $cep = $this->db->escape(utf8_decode($cep));
        $endereco = $this->db->escape(utf8_decode($endereco));
        $bairro = $this->db->escape(utf8_decode($bairro));
        $numero = $this->db->escape(utf8_decode($numero));
        $complemento = $this->db->escape(utf8_decode($complemento));
        $cidade = $this->db->escape(utf8_decode($cidade));
        $estado = $this->db->escape(utf8_decode($estado));
        $numfunc = $this->db->escape(utf8_decode($numfunc));
        $areaatuacao = $this->db->escape(utf8_decode($areaatuacao));
        $site = $this->db->escape(utf8_decode($site));
        $Descricao = $this->db->escape(utf8_decode($Descricao));
        
        $idCadastro = $this->MySQLIUD(
                "
                INSERT INTO 
                    tb0012_Cadastro_Empresas
                        (emailCADASTROEMPRESA, nomecompletoCADASTROEMPRESA, senhaCADASTROEMPRESA,
                        telefoneCADASTROEMPRESA, cnpjCADASTROEMPRESA,
                        cepCADASTROEMPRESA, enderecoCADASTROEMPRESA, bairroCADASTROEMPRESA,
                        numeroCADASTROEMPRESA, complementoCADASTROEMPRESA, cidadeCADASTROEMPRESA,
                        estadoCADASTROEMPRESA, numerofuncionariosCADASTROEMPRESA, areaatuacaoCADASTROEMPRESA,
                        siteCADASTROEMPRESA, descricaoCADASTROEMPRESA,ativoCADASTROEMPRESA, ipCADASTROEMPRESA)
                SELECT
                    '$email','$nome','$senha',
                    '$telefone','$cnpj',
                    '$cep','$endereco','$bairro',
                    '$numero','$complemento','$cidade',
                    '$estado','$numfunc','$areaatuacao',
                    '$site','$Descricao',1, '" . $_SERVER["REMOTE_ADDR"] . "'
                ;
                "
        );
        
        return $idCadastro;
    }
    
    //EDIT
    public function edit_Cadastro($email, $nome, $telefone, $cnpj,
            $cep, $endereco, $bairro, $numero, $complemento, $cidade, $estado, $numfunc,
            $areaatuacao, $site, $Descricao) {
   
        $this->db->connect(); 
        
        $email = $this->db->escape(utf8_decode($email));
        $nome = $this->db->escape(utf8_decode($nome));
        $telefone = $this->db->escape(utf8_decode($telefone));
        $cnpj = $this->db->escape(utf8_decode($cnpj));
        $cep = $this->db->escape(utf8_decode($cep));
        $endereco = $this->db->escape(utf8_decode($endereco));
        $bairro = $this->db->escape(utf8_decode($bairro));
        $numero = $this->db->escape(utf8_decode($numero));
        $complemento = $this->db->escape(utf8_decode($complemento));
        $cidade = $this->db->escape(utf8_decode($cidade));
        $estado = $this->db->escape(utf8_decode($estado));
        $numfunc = $this->db->escape(utf8_decode($numfunc));
        $areaatuacao = $this->db->escape(utf8_decode($areaatuacao));
        $site = $this->db->escape(utf8_decode($site));
        $Descricao = $this->db->escape(utf8_decode($Descricao));
        
        $idCadastro = $this->MySQLIUD(
                "
                UPDATE 
                    tb0012_Cadastro_Empresas
                SET
                    emailCADASTROEMPRESA = '$email',
                    nomecompletoCADASTROEMPRESA = '$nome',
                    telefoneCADASTROEMPRESA = '$telefone',
                    cnpjCADASTROEMPRESA = '$cnpj',
                    cepCADASTROEMPRESA = '$cep',
                    enderecoCADASTROEMPRESA = '$endereco',
                    bairroCADASTROEMPRESA = '$bairro',
                    numeroCADASTROEMPRESA = '$numero',
                    complementoCADASTROEMPRESA = '$complemento',
                    cidadeCADASTROEMPRESA = '$cidade',
                    estadoCADASTROEMPRESA = '$estado',
                    numerofuncionariosCADASTROEMPRESA = '$numfunc',
                    areaatuacaoCADASTROEMPRESA = '$areaatuacao',
                    siteCADASTROEMPRESA = '$site',
                    descricaoCADASTROEMPRESA = '$Descricao',
                    ipCADASTROEMPRESA = '" . $_SERVER["REMOTE_ADDR"] . "'
                WHERE 
                    SHA1(MD5(codigoCADASTROEMPRESA)) = '" . $_COOKIE['idCadastroEmp'] . "'
                ;
                "
        );

        return 1;
    }
    
    public function get_Cadastro($idCadastroEmpCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCADASTROEMPRESA AS Codigo,
                    emailCADASTROEMPRESA  AS Email,
                    nomecompletoCADASTROEMPRESA  AS Nome,
                    telefoneCADASTROEMPRESA AS Telefone,
                    cnpjCADASTROEMPRESA AS CNPJ,
                    cepCADASTROEMPRESA AS CEP,
                    enderecoCADASTROEMPRESA AS Endereco,
                    bairroCADASTROEMPRESA AS Bairro,
                    numeroCADASTROEMPRESA AS Numero,
                    complementoCADASTROEMPRESA AS Complemento,
                    cidadeCADASTROEMPRESA AS Cidade,
                    estadoCADASTROEMPRESA AS Estado,
                    numerofuncionariosCADASTROEMPRESA AS NumFunc,
                    areaatuacaoCADASTROEMPRESA AS AreaAtuacao,
                    siteCADASTROEMPRESA AS Site,
                    descricaoCADASTROEMPRESA AS Descricao
                FROM
                    tb0012_Cadastro_Empresas
                WHERE
                    SHA1(MD5(codigoCADASTROEMPRESA)) = '" . $idCadastroEmpCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_idEmpresa(){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCADASTROEMPRESA AS Codigo
                FROM
                    tb0012_Cadastro_Empresas
                WHERE
                    SHA1(MD5(codigoCADASTROEMPRESA)) = '" . $_COOKIE['idCadastroEmp'] . "'  
                ;
                "
        );
        
                        
        if($Retorno){
            foreach ($Retorno as $dados) {
                $idEmpresa = $dados['Codigo'];
            }
        }
        
        return $idEmpresa;
    }

    public function get_EmailById($idCadastroEmpCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    emailCADASTROEMPRESA  AS Email
                FROM
                    tb0012_Cadastro_Empresas
                WHERE
                    SHA1(MD5(codigoCADASTROEMPRESA)) = '" . $idCadastroEmpCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_ExistsEmail($EmailCrip) {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    COUNT(emailCADASTROEMPRESA) as qtd
                FROM
                    tb0012_Cadastro_Empresas
                WHERE
                    MD5(SHA1(MD5(emailCADASTROEMPRESA)))  = '$EmailCrip'
                ;
                "
        );

        return $Retorno;
    }
    
    public function set_Senha($EmailCrip, $Senha) {
        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0012_Cadastro_Empresas
                SET
                    senhaCADASTROEMPRESA = '$Senha'
                WHERE
                    MD5(SHA1(MD5(emailCADASTROEMPRESA)))  = '$EmailCrip'
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function set_Congelamento($valor) {
        if($valor != 1){
            $valor = 0;
        }
        
        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0012_Cadastro_Empresas
                SET
                    ativoCADASTROEMPRESA = $valor
                WHERE 
                    SHA1(MD5(codigoCADASTROEMPRESA)) = '" . $_COOKIE['idCadastroEmp'] . "'
                ;
                "
        );
        setcookie("Status", utf8_encode($valor), time() + (86400 * 7)); // 1 dia
        
        return $Retorno;
    }
    
    public function set_Confirmação($valor) {

        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0012_Cadastro_Empresas
                SET
                    confirmadoCADASTROEMPRESA = 1
                WHERE 
                    SHA1(MD5(CONCAT(emailCADASTROEMPRESA,nomecompletoCADASTROEMPRESA))) = '$valor'
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function Login($Login, $Senha) {
        
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCADASTROEMPRESA AS Codigo,
                    nomecompletoCADASTROEMPRESA  AS Nome,
                    numerofuncionariosCADASTROEMPRESA AS NumFunc,
                    nomeCATEGORIA AS AreaAtuacao,
                    siteCADASTROEMPRESA AS Site,
                    cidadeCADASTROEMPRESA AS Cidade,
                    estadoCADASTROEMPRESA AS Estado,
                    ativoCADASTROEMPRESA AS Status,
                    confirmadoCADASTROEMPRESA AS Confirmacao,
                    emailCADASTROEMPRESA AS Email
                FROM
                    tb0012_Cadastro_Empresas
                LEFT	JOIN
                    tb0007_Categorias ON codigoCATEGORIA = areaatuacaoCADASTROEMPRESA
                WHERE
                    emailCADASTROEMPRESA = '$Login'
                AND
                    senhaCADASTROEMPRESA = '" . sha1(sha1(md5($Senha))) . "'
                ;
                "
        );
        
        return $Retorno;
    }
    
}