<?php

class Cadastrar_vaga_Model {
    private $db;
    public $Cadastrar_Empresa_Model;
    

    public function __construct() {
        $this->db = new MysqlImproved_Driver();
        
        $this->Cadastrar_Empresa_Model = new Cadastrar_Empresa_Model();
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
    public function get_VagasEmpresa(){
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    SHA1(MD5(codigoVAGAEMPRESA)) as idVaga,
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
                WHERE
                    empresaVAGAEMPRESA = " . $idEmpresa . " 
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_Vaga($idVaga){
       
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    codigoVAGAEMPRESA AS Codigo,
                    nomeCATEGORIA AS AreaAtuacao,
                    ramoVAGAEMPRESA AS Ramo,
                    IF(confidencialVAGAEMPRESA = 1, 'Confidencial',empresaVAGAEMPRESA) AS Empresa,
                    porteVAGAEMPRESA AS Porte,
                    nacionalidadeVAGAEMPRESA AS Nacionalidade,
                    ramoVAGAEMPRESA AS Ramo,
                    COALESCE(nomeVAGA,'[sem nome]') as Vaga,
                    quantidadeVAGAEMPRESA AS Qtd,
                    regimecontratacaoVAGAEMPRESA AS RegimeContratacao,
                    atribuicoesVAGAEMPRESA AS Atribuicoes,
                    salarioVAGAEMPRESA as Salario,
                    acombinarVAGAEMPRESA as Combinar,
                    atribuicoesVAGAEMPRESA as Atribuicoes,
                    experienciaVAGAEMPRESA AS Experiencia,
                    escolaridadeVAGAEMPRESA AS Escolaridade,
                    qualificacoesVAGAEMPRESA AS Qualificacoes,
                    beneficiosVAGAEMPRESA AS Beneficios,
                    CONCAT(regimetrabalhoVAGAEMPRESA, ' - ', horarioVAGAEMPRESA)  AS Regime,
                    questao1VAGAEMPRESA AS Questao1,
                    tiporesposta1VAGAEMPRESA AS TipoResposta1,
                    filtroativo1VAGAEMPRESA AS Filtro1,
                    questao2VAGAEMPRESA AS Questao2,
                    tiporesposta2VAGAEMPRESA AS TipoResposta2,
                    filtroativo2VAGAEMPRESA AS Filtro2,
                    questao3VAGAEMPRESA AS Questao3,
                    tiporesposta3VAGAEMPRESA AS TipoResposta3,
                    filtroativo3VAGAEMPRESA AS Filtro3,
                    questao4VAGAEMPRESA AS Questao4,
                    tiporesposta4VAGAEMPRESA AS TipoResposta4,
                    filtroativo4VAGAEMPRESA AS Filtro4,
                    questao5VAGAEMPRESA AS Questao5,
                    tiporesposta5VAGAEMPRESA AS TipoResposta5,
                    filtroativo5VAGAEMPRESA AS Filtro5,
                    SHA1(MD5(codigoFILTROVAGA)) AS idFiltro
                FROM
                    tb0013_Vagas_Empresa
                LEFT JOIN
                    tb0007_Categorias ON codigoCATEGORIA = categoriaVAGAEMPRESA
                LEFT JOIN
                    tb0008_Vagas ON codigoVAGA = vagaVAGAEMPRESA
                LEFT JOIN
                    tb0014_Filtros_Vaga ON vagaempresaFILTROVAGA = codigoVAGAEMPRESA
                WHERE
                    SHA1(MD5(codigoVAGAEMPRESA)) = '" . $idVaga . "' 
                ;
                "
        );
        
        return $Retorno;
    }
    
    public function get_VagaEdit($idVaga){
       
        $Retorno = $this->MySQLSelect(
                "
                SELECT 
                    empresaVAGAEMPRESA AS Empresa,
                    localVAGAEMPRESA AS 'Local',
                    nomeempresaVAGAEMPRESA AS 'NomeEmpresa',
                    cidadeempresaVAGAEMPRESA AS 'CidadeEmpresa',
                    estadoempresaVAGAEMPRESA AS 'EstadoEmpresa',
                    confidencialVAGAEMPRESA AS Confidencial,
                    ramoVAGAEMPRESA AS Ramo,
                    nacionalidadeVAGAEMPRESA AS Nacionalidade,
                    porteVAGAEMPRESA AS Porte,
                    descricaoVAGAEMPRESA AS Descricao,
                    quantidadeVAGAEMPRESA AS Qtd,
                    atribuicoesVAGAEMPRESA AS Atribuicoes,
                    experienciaVAGAEMPRESA AS Experiencia,
                    escolaridadeVAGAEMPRESA AS Escolaridade,
                    qualificacoesVAGAEMPRESA AS Qualificacoes,
                    categoriaVAGAEMPRESA AS Categoria,
                    vagaVAGAEMPRESA AS Vaga,
                    salarioVAGAEMPRESA AS Salario,
                    acombinarVAGAEMPRESA AS ACombinar,
                    regimecontratacaoVAGAEMPRESA AS RegimeContratacao,
                    beneficiosVAGAEMPRESA AS Beneficios,
                    regimetrabalhoVAGAEMPRESA AS RegimeTrabalho,
                    horarioVAGAEMPRESA AS Horario,
                    meiosrecebimentoVAGAEMPRESA AS MeiosRecebimento,
                    emailrecebimentoVAGAEMPRESA AS EmailRecebimento,
                    ativarVAGAEMPRESA AS Ativar,
                    questao1VAGAEMPRESA AS Questao1,
                    tiporesposta1VAGAEMPRESA AS TipoQuestao1,
                    filtroativo1VAGAEMPRESA AS FiltroAtivo1,
                    questao2VAGAEMPRESA AS Questao2,
                    tiporesposta2VAGAEMPRESA AS TipoQuestao2,
                    filtroativo2VAGAEMPRESA AS FiltroAtivo2,
                    questao3VAGAEMPRESA AS Questao3,
                    tiporesposta3VAGAEMPRESA AS TipoQuestao3,
                    filtroativo3VAGAEMPRESA AS FiltroAtivo3,
                    questao4VAGAEMPRESA AS Questao4,
                    tiporesposta4VAGAEMPRESA AS TipoQuestao4,
                    filtroativo4VAGAEMPRESA AS FiltroAtivo4,
                    questao5VAGAEMPRESA AS Questao5,
                    tiporesposta5VAGAEMPRESA AS TipoQuestao5,
                    filtroativo5VAGAEMPRESA AS FiltroAtivo5
                FROM
                    tb0013_Vagas_Empresa
                WHERE
                    SHA1(MD5(codigoVAGAEMPRESA)) = '" . $idVaga . "' 
                ;
                "
        );
        
        return $Retorno;
    }
    
     public function get_FiltroEdit($idFiltro){
       
        $Retorno = $this->MySQLSelect(
                "
                SELECT
                     sexoFILTROVAGA AS Sexo,
                     faixaetariaFILTROVAGA AS Faixa,
                     pretencaoFILTROVAGA AS Pretencao,
                     pneFILTROVAGA AS PNE,
                     estadoFILTROVAGA AS Estado,
                     cidadeFILTROVAGA AS Cidade
                FROM	
                        tb0014_Filtros_Vaga
                WHERE
                    SHA1(MD5(codigoFILTROVAGA)) = '" . $idFiltro . "' 
                ;
                "
        );
        
        return $Retorno;
    }   
    
    //CREATE
    public function set_CadastroVaga($arrVaga) {
                
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        if(isset($idEmpresa) && !empty($idEmpresa))
        {
            
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            

            
            $values = array($idEmpresa, $arrVaga['local'], $arrVaga['NomeEmpresa'],
                            $arrVaga['CidadeEmpresa'], $arrVaga['EstadoEmpresa'], $arrVaga['confidencial'],
                            $arrVaga['ramoAtuacao'], $arrVaga['nacionalidade'], $arrVaga['porte'],
                            $arrVaga['descricao'], $arrVaga['quantidade'], $arrVaga['atribuicoes'],
                            $arrVaga['experiencia'], $arrVaga['escolaridade'],$arrVaga['qualificacoes'],
                            $arrVaga['categoria'], $arrVaga['vaga'], $arrVaga['salario'],
                            $arrVaga['salarioCombinar'], $arrVaga['regimeContratacao'],$arrVaga['beneficios'],
                            $arrVaga['regimeTrabalho'], $arrVaga['horario'],
                            $arrVaga['meiosRecebimento'],$arrVaga['emailRecebimento'], $arrVaga['ativar'],
                            $arrVaga['questao1'], $arrVaga['tipoResposta1'], $arrVaga['filtroAtivo1'],
                            $arrVaga['questao2'], $arrVaga['tipoResposta2'], $arrVaga['filtroAtivo2'],
                            $arrVaga['questao3'], $arrVaga['tipoResposta3'], $arrVaga['filtroAtivo3'],
                            $arrVaga['questao4'], $arrVaga['tipoResposta4'], $arrVaga['filtroAtivo4'],
                            $arrVaga['questao5'], $arrVaga['tipoResposta5'], $arrVaga['filtroAtivo5']);


            $idCadastro = $this->db->Create('tb0013_Vagas_Empresa',$values);

            if($idCadastro > 0){
                $values = array($idCadastro, $arrVaga['filtroSexo'], $arrVaga['filtroFaixaEtaria'],
                                $arrVaga['filtroPretensaoSalarial'], $arrVaga['filtroPNE'],
                                $arrVaga['filtroEstado'], $arrVaga['filtroCidade']);
                
                $idFiltro = $this->db->Create('tb0014_Filtros_Vaga',$values);
            }
            
            return $idCadastro;
        }
    }
    
    //EDIT
    public function edit_CadastroVaga($arrVaga) {
        
        $idEmpresa = $this->Cadastrar_Empresa_Model->get_idEmpresa();
        
        if(isset($arrVaga['idVaga']) && !empty($arrVaga['idVaga']) &&
           isset($idEmpresa) && !empty($idEmpresa))
        {  
            if($arrVaga['salarioCombinar'] == "on"){
                $arrVaga['salarioCombinar'] = 1;
            }else{
                $arrVaga['salarioCombinar'] = 0;
            }
            
            $values = array($arrVaga['idVaga'], $idEmpresa, $arrVaga['local'],$arrVaga['NomeEmpresa'],
                            $arrVaga['CidadeEmpresa'], $arrVaga['EstadoEmpresa'], $arrVaga['confidencial'],
                            $arrVaga['ramoAtuacao'], $arrVaga['nacionalidade'], $arrVaga['porte'],
                            $arrVaga['descricao'], $arrVaga['quantidade'], $arrVaga['atribuicoes'],
                            $arrVaga['experiencia'], $arrVaga['escolaridade'],$arrVaga['qualificacoes'],
                            $arrVaga['categoria'], $arrVaga['vaga'], $arrVaga['salario'],
                            $arrVaga['salarioCombinar'], $arrVaga['regimeContratacao'],$arrVaga['beneficios'],
                            $arrVaga['regimeTrabalho'], $arrVaga['horario'],
                            $arrVaga['meiosRecebimento'],$arrVaga['emailRecebimento'], $arrVaga['ativar'],
                            $arrVaga['questao1'], $arrVaga['tipoResposta1'], $arrVaga['filtroAtivo1'],
                            $arrVaga['questao2'], $arrVaga['tipoResposta2'], $arrVaga['filtroAtivo2'],
                            $arrVaga['questao3'], $arrVaga['tipoResposta3'], $arrVaga['filtroAtivo3'],
                            $arrVaga['questao4'], $arrVaga['tipoResposta4'], $arrVaga['filtroAtivo4'],
                            $arrVaga['questao5'], $arrVaga['tipoResposta5'], $arrVaga['filtroAtivo5']);
        
            $retorno = $this->db->Update('tb0013_Vagas_Empresa',$values);

            if($arrVaga['idFiltro'] > 0  && $arrVaga['idVaga'] > 0){
                $values = array($arrVaga['idFiltro'], $arrVaga['idVaga'], $arrVaga['filtroSexo'], $arrVaga['filtroFaixaEtaria'],
                                $arrVaga['filtroPretensaoSalarial'], $arrVaga['filtroPNE'],
                                $arrVaga['filtroEstado'], $arrVaga['filtroCidade']);

                $retorno = $this->db->Update('tb0014_Filtros_Vaga',$values);
            }
            
            return $retorno;
        }
    }
}