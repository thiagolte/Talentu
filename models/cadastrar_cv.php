<?php

class Cadastrar_cv_Model {
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
    public function set_Cadastro($email, $nome, $senha, $datanascimento, $telefone, $celular, $cpf,
            $cep, $endereco, $bairro, $numero, $complemento, $cidade, $estado, $pretencaosalarial, $grauescolaridade, $estadocivil,
            $sexo, $CV, $Cat1, $Vag1, $TempoEx1, $Cat2, $Vag2, $TempoEx2, $Cat3, $Vag3, $TempoEx3, $PNE, $PNEDetalhes) {
   
        $this->db->connect(); 
        
        $email = $this->db->escape(utf8_decode($email));
        $nome = $this->db->escape(utf8_decode($nome));
        $senha = $this->db->escape(utf8_decode($senha));
        $datanascimento = $this->db->escape(utf8_decode($datanascimento));
        $telefone = $this->db->escape(utf8_decode($telefone));
        $celular = $this->db->escape(utf8_decode($celular));
        $cpf = $this->db->escape(utf8_decode($cpf));
        $cep = $this->db->escape(utf8_decode($cep));
        $endereco = $this->db->escape(utf8_decode($endereco));
        $bairro = $this->db->escape(utf8_decode($bairro));
        $numero = $this->db->escape(utf8_decode($numero));
        $complemento = $this->db->escape(utf8_decode($complemento));
        $cidade = $this->db->escape(utf8_decode($cidade));
        $estado = $this->db->escape(utf8_decode($estado));
        $pretencaosalarial = $this->db->escape(utf8_decode($pretencaosalarial));
        $grauescolaridade = $this->db->escape(utf8_decode($grauescolaridade));
        $estadocivil = $this->db->escape(utf8_decode($estadocivil));
        $sexo = $this->db->escape(utf8_decode($sexo));
        $CV = $this->db->escape(utf8_decode($CV));
        $Cat1 = $this->db->escape(utf8_decode($Cat1));
        $Vag1 = $this->db->escape(utf8_decode($Vag1));
        $TempoEx1 = $this->db->escape(utf8_decode($TempoEx1));
        $Cat2 = $this->db->escape(utf8_decode($Cat2));
        $Vag2 = $this->db->escape(utf8_decode($Vag2));
        $TempoEx2 = $this->db->escape(utf8_decode($TempoEx2));
        $Cat3 = $this->db->escape(utf8_decode($Cat3));
        $Vag3 = $this->db->escape(utf8_decode($Vag3));
        $TempoEx3 = $this->db->escape(utf8_decode($TempoEx3));
        $PNE = $this->db->escape(utf8_decode($PNE));
        $PNEDetalhes = $this->db->escape(utf8_decode($PNEDetalhes));
        
        $idCadastro = $this->MySQLIUD(
                "
                INSERT INTO 
                    tb0001_Cadastro_Pessoa
                        (emailCADASTROPESSOA,nomecompletoCADASTROPESSOA,senhaCADASTROPESSOA,
                        datanascimentoCADASTROPESSOA,telefoneCADASTROPESSOA,celularCADASTROPESSOA,
                        cpfCADASTROPESSOA,cepCADASTROPESSOA,enderecoCADASTROPESSOA,bairroCADASTROPESSOA,
                        numeroCADASTROPESSOA, complementoCADASTROPESSOA, cidadeCADASTROPESSOA,
                        estadoCADASTROPESSOA,pretencaosalarialCADASTROPESSOA,grauescolaridadeCADASTROPESSOA,
                        estadocivilCADASTROPESSOA,sexoCADASTROPESSOA,ativoCADASTROPESSOA,ipCADASTROPESSOA,
                        pneCADASTROPESSOA, pnedetalhesCADASTROPESSOA)
                SELECT
                    '$email','$nome','$senha','$datanascimento','$telefone','$celular','$cpf','$cep',
                    '$endereco','$bairro','$numero','$complemento','$cidade','$estado','$pretencaosalarial',$grauescolaridade,
                    $estadocivil,$sexo,1, '" . $_SERVER["REMOTE_ADDR"] . "',$PNE,'$PNEDetalhes'
                ;
                "
        );
        
        if(!empty($idCadastro)){            
            //Vagas de interesse
            if(!empty($idCadastro) && !empty($Cat1) && !empty($Vag1)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO 
                            tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                            $idCadastro,$Cat1,$Vag1,'$TempoEx1'
                        ;
                        "
                );
            }
            if(!empty($idCadastro) && !empty($Cat2) && !empty($Vag2)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO 
                            tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                            $idCadastro,$Cat2,$Vag2,'$TempoEx2'
                        ;
                        "
                );
            }
            if(!empty($idCadastro) && !empty($Cat3) && !empty($Vag3)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO 
                            tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                            $idCadastro,$Cat3,$Vag3,'$TempoEx3'
                        ;
                        "
                );
            }

            //CV
            if(!empty($idCadastro) && !empty($CV)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO 
                            tb0010_CV
                                (pessoaCV,cvCV)
                        SELECT
                            $idCadastro,'$CV'
                        ;
                        "
                );
            }
        }
        return $idCadastro;
    }
    
    //EDIT
    public function edit_Cadastro($email, $nome, $datanascimento, $telefone, $celular, $cpf,
            $cep, $endereco, $bairro, $numero, $complemento, $cidade, $estado, $pretencaosalarial, $grauescolaridade, $estadocivil,
            $sexo, $CV, $Cat1, $Vag1, $TempoEx1, $Cat2, $Vag2, $TempoEx2, $Cat3, $Vag3, $TempoEx3, $PNE, $PNEDetalhes) {
   
        $this->db->connect(); 
        
        $email = $this->db->escape(utf8_decode($email));
        $nome = $this->db->escape(utf8_decode($nome));
        $datanascimento = $this->db->escape(utf8_decode($datanascimento));
        $telefone = $this->db->escape(utf8_decode($telefone));
        $celular = $this->db->escape(utf8_decode($celular));
        $cpf = $this->db->escape(utf8_decode($cpf));
        $cep = $this->db->escape(utf8_decode($cep));
        $endereco = $this->db->escape(utf8_decode($endereco));
        $bairro = $this->db->escape(utf8_decode($bairro));
        $numero = $this->db->escape(utf8_decode($numero));
        $complemento = $this->db->escape(utf8_decode($complemento));
        $cidade = $this->db->escape(utf8_decode($cidade));
        $estado = $this->db->escape(utf8_decode($estado));
        $pretencaosalarial = $this->db->escape(utf8_decode($pretencaosalarial));
        $grauescolaridade = $this->db->escape(utf8_decode($grauescolaridade));
        $estadocivil = $this->db->escape(utf8_decode($estadocivil));
        $sexo = $this->db->escape(utf8_decode($sexo));
        $CV = $this->db->escape(utf8_decode($CV));
        $Cat1 = $this->db->escape(utf8_decode($Cat1));
        $Vag1 = $this->db->escape(utf8_decode($Vag1));
        $TempoEx1 = $this->db->escape(utf8_decode($TempoEx1));
        $Cat2 = $this->db->escape(utf8_decode($Cat2));
        $Vag2 = $this->db->escape(utf8_decode($Vag2));
        $TempoEx2 = $this->db->escape(utf8_decode($TempoEx2));
        $Cat3 = $this->db->escape(utf8_decode($Cat3));
        $Vag3 = $this->db->escape(utf8_decode($Vag3));
        $TempoEx3 = $this->db->escape(utf8_decode($TempoEx3));
        $PNE = $this->db->escape(utf8_decode($PNE));
        $PNEDetalhes = $this->db->escape(utf8_decode($PNEDetalhes));
        
        $idCadastro = $this->MySQLIUD(
                "
                UPDATE 
                    tb0001_Cadastro_Pessoa
                SET
                    emailCADASTROPESSOA = '$email',
                    nomecompletoCADASTROPESSOA = '$nome',
                    datanascimentoCADASTROPESSOA = '$datanascimento',
                    telefoneCADASTROPESSOA = '$telefone',
                    celularCADASTROPESSOA = '$celular',
                    cpfCADASTROPESSOA = '$cpf',
                    cepCADASTROPESSOA = '$cep',
                    enderecoCADASTROPESSOA = '$endereco',
                    bairroCADASTROPESSOA = '$bairro',
                    numeroCADASTROPESSOA = '$numero',
                    complementoCADASTROPESSOA = '$complemento',
                    cidadeCADASTROPESSOA = '$cidade',
                    estadoCADASTROPESSOA = '$estado',
                    pretencaosalarialCADASTROPESSOA = '$pretencaosalarial',
                    grauescolaridadeCADASTROPESSOA = $grauescolaridade,
                    estadocivilCADASTROPESSOA = $estadocivil,
                    sexoCADASTROPESSOA = $sexo,
                    ipCADASTROPESSOA = '" . $_SERVER["REMOTE_ADDR"] . "',
                    pneCADASTROPESSOA = $PNE,
                    pnedetalhesCADASTROPESSOA = '$PNEDetalhes'
                WHERE 
                    SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                ;
                "
        );
        
        if(!empty($_COOKIE['idCadastro'])){ 
            //Vagas de interesse
            
            $Retorno = $this->MySQLIUD(
                "
                DELETE FROM tb0006_Vagas_Interesse
                WHERE
                    SHA1(MD5(pessoaVAGAINTERESSE)) = '" . $_COOKIE['idCadastro'] . "'
                ;
                "
            );
            
            if(!empty($_COOKIE['idCadastro']) && !empty($Cat1) && !empty($Vag1)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                                codigoCADASTROPESSOA,$Cat1,$Vag1,'$TempoEx1'
                        FROM 
                            tb0001_Cadastro_Pessoa
                        WHERE 
                            SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                        ;
                        "
                );
            }
            if(!empty($_COOKIE['idCadastro']) && !empty($Cat2) && !empty($Vag2)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                                codigoCADASTROPESSOA,$Cat2,$Vag2,'$TempoEx2'
                        FROM 
                            tb0001_Cadastro_Pessoa
                        WHERE 
                            SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                        ;
                        "
                );
            }
            if(!empty($_COOKIE['idCadastro']) && !empty($Cat3) && !empty($Vag3)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO tb0006_Vagas_Interesse
                                (pessoaVAGAINTERESSE,categoriaVAGAINTERESSE,vagaVAGAINTERESSE,tempoexperienciaVAGAINTERESSE)
                        SELECT
                                codigoCADASTROPESSOA,$Cat3,$Vag3,'$TempoEx3'
                        FROM 
                            tb0001_Cadastro_Pessoa
                        WHERE 
                            SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                        ;
                        "
                );
            }

            //CV
            $Retorno = $this->MySQLIUD(
                "
                DELETE FROM tb0010_CV
                WHERE
                    SHA1(MD5(pessoaCV)) = '" . $_COOKIE['idCadastro'] . "'
                ;
                "
            );
            
            if(!empty($_COOKIE['idCadastro']) && !empty($CV)){
                $Retorno = $this->MySQLIUD(
                        "
                        INSERT INTO tb0010_CV
                                (pessoaCV,cvCV)
                        SELECT
                                codigoCADASTROPESSOA,'$CV'
                        FROM 
                            tb0001_Cadastro_Pessoa
                        WHERE 
                            SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                        ;
                        "
                );
            }
            
            return 1;
        }
        return $idCadastro;
    }
    
    public function get_Cadastro($idCadastroCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCADASTROPESSOA AS Codigo,
                    emailCADASTROPESSOA  AS Email,
                    nomecompletoCADASTROPESSOA  AS Nome,
                    datanascimentoCADASTROPESSOA AS DataNasci,
                    telefoneCADASTROPESSOA AS Telefone,
                    celularCADASTROPESSOA AS Celular,
                    cpfCADASTROPESSOA AS CPF,
                    cepCADASTROPESSOA AS CEP,
                    enderecoCADASTROPESSOA AS Endereco,
                    bairroCADASTROPESSOA AS Bairro,
                    numeroCADASTROPESSOA AS Numero,
                    complementoCADASTROPESSOA AS Complemento,
                    cidadeCADASTROPESSOA AS Cidade,
                    estadoCADASTROPESSOA AS Estado,
                    pretencaosalarialCADASTROPESSOA AS Pretencao,
                    grauescolaridadeCADASTROPESSOA AS Grau,
                    estadocivilCADASTROPESSOA AS EstadoCivil,
                    sexoCADASTROPESSOA AS Sexo,
                    pneCADASTROPESSOA AS PNE,
                    pnedetalhesCADASTROPESSOA AS PNEDetalhes
                FROM
                    tb0001_Cadastro_Pessoa
                WHERE
                    SHA1(MD5(codigoCADASTROPESSOA)) = '" . $idCadastroCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_VagasInteresse($idCadastroCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoVAGAINTERESSE AS Codigo,
                    categoriaVAGAINTERESSE AS Categoria,
                    vagaVAGAINTERESSE AS Vaga,
                    tempoexperienciaVAGAINTERESSE AS Tempo
                FROM
                    tb0006_Vagas_Interesse
                WHERE
                    SHA1(MD5(pessoaVAGAINTERESSE)) = '" . $idCadastroCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_VagasInteresseNome($idCadastroCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                        nomeCATEGORIA AS Categoria,
                        nomeVAGA AS Vaga,
                        tempoexperienciaVAGAINTERESSE AS Tempo
                FROM
                        tb0006_Vagas_Interesse
                INNER JOIN 
                    tb0007_Categorias ON codigoCATEGORIA = categoriaVAGAINTERESSE
                INNER JOIN
                    tb0008_Vagas ON codigoVAGA = vagaVAGAINTERESSE
                WHERE
                    SHA1(MD5(pessoaVAGAINTERESSE)) = '" . $idCadastroCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_CV($idCadastroCrip){
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCV AS Codigo,
                    cvCV AS CV
                FROM
                    tb0010_CV
                WHERE
                    SHA1(MD5(pessoaCV)) = '" . $idCadastroCrip . "'   
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Pretencoes() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoPRETENCAOSALARIAL AS Codigo,
                    nomePRETENCAOSALARIAL  AS Nome
                FROM
                    tb0002_Pretencoes_Salarial
                ORDER BY
                    codigoPRETENCAOSALARIAL ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Graus() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoGRAUESCOLARIDADE AS Codigo,
                    nomeGRAUESCOLARIDADE  AS Nome
                FROM
                    tb0003_Graus_Escolaridade
                ORDER BY
                    codigoGRAUESCOLARIDADE ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Estados() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    estadoCADASTROPESSOA  AS Nome
                FROM
                    tb0001_Cadastro_Pessoa
                GROUP BY
                    estadoCADASTROPESSOA
                ORDER BY
                    estadoCADASTROPESSOA ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Cidades() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    cidadeCADASTROPESSOA  AS Nome
                FROM
                    tb0001_Cadastro_Pessoa
                GROUP BY
                    cidadeCADASTROPESSOA
                ORDER BY
                    cidadeCADASTROPESSOA ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Sexos() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoSEXO AS Codigo,
                    nomeSEXO  AS Nome
                FROM
                    tb0005_Sexos
                ORDER BY
                    codigoSEXO ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Estados_Civis() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoESTADOCIVIL AS Codigo,
                    nomeESTADOCIVIL  AS Nome
                FROM
                    tb0004_Estados_Civis
                ORDER BY
                    codigoESTADOCIVIL ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Categorias() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCATEGORIA AS Codigo,
                    nomeCATEGORIA  AS Nome
                FROM
                    tb0007_Categorias
                ORDER BY
                    nomeCATEGORIA ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_CategoriasAtivas() {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoCATEGORIA AS Codigo,
                    nomeCATEGORIA  AS Nome
                FROM
                    tb0007_Categorias
                WHERE
                    ativoCATEGORIA = 1
                ORDER BY
                    nomeCATEGORIA ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Vagas($idCategoria) {
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoVAGA AS Codigo,
                    nomeVAGA  AS Nome
                FROM
                        tb0008_Vagas
                INNER JOIN 
                    tb0009_Categoria_Vagas ON codigoVAGA = vagaVAGACATEGORIA
                AND 
                    categoriaVAGACATEGORIA = $idCategoria
                ORDER BY
                    nomeVAGA ASC
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_ExistsEmail($EmailCrip) {        
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    COUNT(emailCADASTROPESSOA) as qtd
                FROM
                    tb0001_Cadastro_Pessoa
                WHERE
                    MD5(SHA1(MD5(emailCADASTROPESSOA)))  = '$EmailCrip'
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function Buscar_Profissionais($sexo, $estado, $AreaInteresse, $Vaga, $faixaEtaria, $cidade, $pretencao, $Palavra ,$PNE){
        $this->db->connect(); 
        
        $sexo = $this->db->escape(utf8_decode($sexo));
        $estado = $this->db->escape(utf8_decode($estado));
        $AreaInteresse = $this->db->escape(utf8_decode($AreaInteresse));
        $Vaga = $this->db->escape(utf8_decode($Vaga));
        $faixaEtaria = $this->db->escape(utf8_decode($faixaEtaria));
        $cidade = $this->db->escape(utf8_decode($cidade));
        $pretencao = $this->db->escape(utf8_decode($pretencao));
        $Palavra = $this->db->escape(utf8_decode($Palavra));
        $PNE = $this->db->escape(utf8_decode($PNE));
        
        $Query = 
                "SELECT	
                        SHA1(MD5(codigoCADASTROPESSOA)) AS Codigo,
                        nomecompletoCADASTROPESSOA AS Nome,
                        CONCAT((YEAR(CURDATE())-YEAR(STR_TO_DATE(datanascimentoCADASTROPESSOA,'%d/%m/%Y')))
                        - (RIGHT(CURDATE(),5)<RIGHT(STR_TO_DATE(datanascimentoCADASTROPESSOA,'%d/%m/%Y'),5)),' anos, ',
                        nomeESTADOCIVIL,', ',cidadeCADASTROPESSOA,'-', estadoCADASTROPESSOA,' (',GROUP_CONCAT(nomeVAGA),')') AS Descricao
                FROM
                        tb0001_Cadastro_Pessoa
                INNER JOIN 
                        tb0004_Estados_Civis ON codigoESTADOCIVIL = estadocivilCADASTROPESSOA
                INNER JOIN
                        tb0006_Vagas_Interesse ON pessoaVAGAINTERESSE = codigoCADASTROPESSOA
                INNER JOIN
                        tb0008_Vagas ON codigoVAGA = vagaVAGAINTERESSE
                INNER JOIN tb0007_Categorias ON codigoCATEGORIA = categoriaVAGAINTERESSE
                LEFT  JOIN tb0010_CV ON pessoaCV = codigoCADASTROPESSOA
                WHERE
                    1 = 1";
                if(!empty($sexo) || $sexo > 0){
                    $Query .= " AND		sexoCADASTROPESSOA = $sexo";
                }
                if(!empty($estado) || $estado > 0){
                    $Query .= " AND		estadoCADASTROPESSOA = '$estado'";
                }
                if(!empty($faixaEtaria) || $faixaEtaria > 0){
                    $Query .= " AND (YEAR(CURDATE())-YEAR(STR_TO_DATE(datanascimentoCADASTROPESSOA,'%d/%m/%Y')))
                    - (RIGHT(CURDATE(),5)<RIGHT(STR_TO_DATE(datanascimentoCADASTROPESSOA,'%d/%m/%Y'),5)) BETWEEN $faixaEtaria";
                }
                if(!empty($cidade) || $cidade > 0){
                    $Query .= " AND cidadeCADASTROPESSOA = '$cidade'";
                }
                if(!empty($pretencao) || $pretencao > 0){
                    $Query .= " AND	pretencaosalarialCADASTROPESSOA = $pretencao";
                }
                if(!empty($AreaInteresse) || $AreaInteresse > 0){
                    $Query .= " AND codigoCATEGORIA = $AreaInteresse";
                }
                if(!empty($Vaga) || $Vaga > 0){
                    $Query .= " AND codigoVAGA = $Vaga";
                }
                if(!empty($PNE) || $Vaga > 0){
                    $Query .= " AND pneCADASTROPESSOA = $PNE";
                }
                if(!empty($Palavra) || $Palavra > 0){
                    $Query .= " AND cvCV LIKE '%" . str_replace(' ', '%', $Palavra) . "%'";
                }
                $Query .= " GROUP BY codigoCADASTROPESSOA";

        $Retorno = $this->MySQLSelect($Query);
        
        return $Retorno;
    }
    
    public function set_Congelamento($valor) {
        if($valor != 1){
            $valor = 0;
        }

        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0001_Cadastro_Pessoa
                SET
                    ativoCADASTROPESSOA = $valor
                WHERE 
                    SHA1(MD5(codigoCADASTROPESSOA)) = '" . $_COOKIE['idCadastro'] . "'
                ;
                "
        );
        setcookie("Status", utf8_encode($valor), time() + (86400 * 7)); // 1 dia
        
        return $Retorno;
    }
    
    public function set_Senha($EmailCrip, $Senha) {    
        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0001_Cadastro_Pessoa
                SET
                    senhaCADASTROPESSOA = '$Senha'
                WHERE
                    MD5(SHA1(MD5(emailCADASTROPESSOA)))  = '$EmailCrip'
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function set_Confirmação($valor) {

        $Retorno = $this->MySQLIUD(
                "
                UPDATE 
                    tb0001_Cadastro_Pessoa
                SET
                    confirmadoCADASTROPESSOA = 1
                WHERE 
                    SHA1(MD5(CONCAT(emailCADASTROPESSOA,nomecompletoCADASTROPESSOA))) = '$valor'
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function Login($Login, $Senha) {
        
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                        codigoCADASTROPESSOA AS Codigo,
                        nomecompletoCADASTROPESSOA  AS Nome,
                        nomeSEXO AS Sexo,
                        datanascimentoCADASTROPESSOA AS DataNascimento,
                        nomeGRAUESCOLARIDADE AS GrauEscolaridade,
                        nomePRETENCAOSALARIAL AS Pretencao,
                        cidadeCADASTROPESSOA AS Cidade,
                        estadoCADASTROPESSOA AS Estado,
                        ativoCADASTROPESSOA AS Status,
                        confirmadoCADASTROPESSOA AS Confirmacao,
                        emailCADASTROPESSOA AS Email,
                        pneCADASTROPESSOA AS PNE,
                        pnedetalhesCADASTROPESSOA AS PNEDetalhes
                FROM
                        tb0001_Cadastro_Pessoa
                INNER	JOIN
                        tb0005_Sexos ON codigoSEXO = sexoCADASTROPESSOA
                INNER	JOIN
                        tb0003_Graus_Escolaridade ON codigoGRAUESCOLARIDADE = grauescolaridadeCADASTROPESSOA
                INNER	JOIN
                        tb0002_Pretencoes_Salarial ON codigoPRETENCAOSALARIAL = pretencaosalarialCADASTROPESSOA
                WHERE
                    emailCADASTROPESSOA = '$Login'
                AND
                    senhaCADASTROPESSOA = '" . sha1(sha1(md5($Senha))) . "'
                ;
                "
        );
        
        return $Retorno;
    }
}