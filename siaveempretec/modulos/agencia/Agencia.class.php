<?php
/**
 * Classe que recupera os dados estaduais de indicadores de satisfação de atendimento
 * @name $globalVariableName 
 * @author Ronycley Gonçalves Agra - suportecg@sebraepb.com.br
 * @since 23/01/2017
 * @version "1.0"
 * @uses Classe DatabaseConnection
 */
include_once '../../controles/DatabaseConnection.php';

class Agencia {

    /**
     *
     * @var DatabaseConection Conexão com o banco de dados
     */
    private $conn = null;

    /**
     *
     * @var String A data inicial do período da consulta
     */
    private $dataInicial = null;

    /**
     *
     * @var String A data final do período da consulta
     */
    private $dataFinal = null;

    /**
     *
     * @var String O código da agência selecionada para a consulta
     */
    private $codagencia = null;

    /**
     *
     * @var String Projetos vinculados à agência selecionada
     */
    private $projetos = null;
    
    /**
     *
     * @var Array Relação entre agências e projetos
     */
    private $projetosagencia = null;


    /**
     * Construtor
     */
    function __construct($dataInicial, $dataFinal, $codagencia, $projetosagencia) {
        $this->conn = new DatabaseConnection();
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->codagencia = $codagencia;
        $this->projetosagencia = $projetosagencia;
        $this->projetos = $this->projetosagencia[$this->codagencia];
    }

    /**
     * Retorna os valores de satisifação para o indicador <b>satisfação</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador aplicabilidade
     */
    public function satisfacao() {
        $satisfacao = Array();
        // EXCELENTE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and a.codindicadoraval = '20227' 
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '5 Excelente';";
        $valorExcelente = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and a.codindicadoraval = '20227'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '4 Bom';";
        $valorBom = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and a.codindicadoraval = '20227'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '3 Regular';";
        $valorRegular = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20227'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '2 Ruim';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // PÉSSIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20227'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '1 Péssimo';";
        $valorPessimo = $this->conn->query($sql)->fetch();

        
        $satisfacao["excelente"] = $valorExcelente [0];
        $satisfacao["bom"] = $valorBom [0];
        $satisfacao["regular"] = $valorRegular [0];
        $satisfacao["ruim"] = $valorRuim [0];
        $satisfacao["pessimo"] = $valorPessimo [0];

        return $satisfacao;
    }//satisfacao

    /**
     * Retorna os valores de satisifação para o indicador <b>satisfação com o entrevistador</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador satisfação com o entrevistador
     */
    public function satisfacaoentrevistador() {
        $satisfacaoentrevistador = Array();
        // EXCELENTE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20208' 
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '5 Excelente';";
        $valorExcelente = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20208'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '4 Bom';";
        $valorBom = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20208'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '3 Regular';";
        $valorRegular = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20208'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '2 Ruim';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // PÉSSIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20208'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '1 Péssimo';";
        $valorPessimo = $this->conn->query($sql)->fetch();

        $satisfacaoentrevistador["excelente"] = $valorExcelente [0];
        $satisfacaoentrevistador["bom"] = $valorBom [0];
        $satisfacaoentrevistador["regular"] = $valorRegular [0];
        $satisfacaoentrevistador["ruim"] = $valorRuim [0];
        $satisfacaoentrevistador["pessimo"] = $valorPessimo [0];

        return $satisfacaoentrevistador;
    }//satisfacaoentrevistador

    /**
     * Retorna os valores de satisifação para o indicador <b>satisfação com os facilitadores</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador satisfação com os facilitadores
     */
    public function satisfacaofacilitadores() {
        $satisfacaofacilitadores = Array();
        // EXCELENTE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20222' 
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '5 Excelente';";
        $valorExcelente = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20222'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '4 Bom';";
        $valorBom = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20222'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '3 regular';";
        $valorRegular = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20222'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '2 Ruim';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // PÉSSIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20222'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '1 Péssimo';";
        $valorPessimo = $this->conn->query($sql)->fetch();

        $satisfacaofacilitadores["excelente"] = $valorExcelente [0];
        $satisfacaofacilitadores["bom"] = $valorBom [0];
        $satisfacaofacilitadores["regular"] = $valorRegular [0];
        $satisfacaofacilitadores["ruim"] = $valorRuim [0];
        $satisfacaofacilitadores["pessimo"] = $valorPessimo [0];

        return $satisfacaofacilitadores;
    } //$infraestrutura

    /**
     * Retorna os valores de satisifação para o indicador <b>infraestrutura</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador infraestrutura
     */
    public function infraestrutura() {
        $infraestrutura = Array();
        // EXCELENTE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20213' 
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Excelente';";
        $valorExcelente = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20213'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '4 Bom';";
        $valorBom = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20213'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '3 regular';";
        $valorRegular = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20213'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '2 Ruim';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // PÉSSIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20213'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '1 Péssimo';";
        $valorPessimo = $this->conn->query($sql)->fetch();

        $infraestrutura["excelente"] = $valorExcelente [0];
        $infraestrutura["bom"] = $valorBom [0];
        $infraestrutura["regular"] = $valorRegular [0];
        $infraestrutura["ruim"] = $valorRuim [0];
        $infraestrutura["pessimo"] = $valorPessimo [0];

        return $infraestrutura;
    }//infraestrutura

    /**
     * Retorna os valores de satisifação para o indicador <b>conhecimento</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador conhecimento
     */
    public function aplicabilidade() {
        $aplicabilidade = Array();
        // EXCELENTE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20228' 
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '5 Excelente';";
        $valorExcelente = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20228'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '4 Bom';";
        $valorBom = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20228'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '3 Regular';";
        $valorRegular = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20228'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '2 Ruim';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // PÉSSIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20228'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '1 Péssimo';";
        $valorPessimo = $this->conn->query($sql)->fetch();

        $aplicabilidade["excelente"] = $valorExcelente [0];
        $aplicabilidade["bom"] = $valorBom [0];
        $aplicabilidade["regular"] = $valorRegular [0];
        $aplicabilidade["ruim"] = $valorRuim [0];
        $aplicabilidade["pessimo"] = $valorPessimo [0];

        return $aplicabilidade;
    }//conhecimento

    /**
     * Retorna os valores de satisifação para o indicador <b>promoção NPS</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador promoção NPS
     */
    public function promocaonps() {
        $fidelizacao = Array();
        
        //10-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20229'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '10';";
        $valor10 = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //9-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20229'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '9';";
        $valor9 = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //8-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20229'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '8';";
        $valor8 = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //7-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20229'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '7';";
        $valor7 = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //>7-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20229'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem < 7;";
        $valorMenor7 = $this->conn->query($sql)->fetch();

        $fidelizacao["10"] = $valor10 [0];
        $fidelizacao["9"] = $valor9 [0];
        $fidelizacao["8"] = $valor8 [0];
        $fidelizacao["7"] = $valor7 [0];
        $fidelizacao["menor7"] = $valorMenor7 [0];
        
        return $fidelizacao;
    }//promocaonps
    
    /**
     * Retorna os valores de satisifação para o indicador <b>conhecimento</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador conhecimento
     */
    public function conhecimento() {
        $conhecimento = Array();

        //Atendimento Sebrae-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Atendimento Sebrae';";
        $valorAtendimento = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Carro Som -------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Carro Som';";
        $valorCarro = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Email MKT -------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Email MKT';";
        $valorEmail = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Facebook-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Facebook';";
        $valorFacebook = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Instagram-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Instagram';";
        $valorInstagram = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Portal Sebrae-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Portal Sebrae';";
        $valorPortal = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Rádio-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Rádio';";
        $valorRadio = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Whattsapp-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Whattsapp';";
        $valorWhattsapp = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Outros-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20230'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Outros';";
        $valorOutros = $this->conn->query($sql)->fetch();

        $conhecimento["atendimento"] = $valorAtendimento [0];
        $conhecimento["carro"] = $valorCarro [0];
        $conhecimento["email"] = $valorEmail [0];
        $conhecimento["facebook"] = $valorFacebook [0];
        $conhecimento["instagram"] = $valorInstagram [0];
        $conhecimento["portal"] = $valorPortal [0];
        $conhecimento["radio"] = $valorRadio [0];
        $conhecimento["whatsapp"] = $valorWhattsapp [0];
        $conhecimento["outros"] = $valorOutros [0];

        return $conhecimento;
    }//conhecimento
    
    /**
     * 
     * @return String retorna um string formatado com os valores do objeto atual
     */
    public function toString(){
        return "Data inicial: $this->dataInicial , Data Final: $this->dataFinal, Agencia: $this->codagencia "
                . "Projetos: $this->projetos";
    }//toString
    
    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function getCodagencia() {
        return $this->codagencia;
    }

    function getProjetos() {
        return $this->projetos;
    }

    function setDataInicial(String $dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal(String $dataFinal) {
        $this->dataFinal = $dataFinal;
    }

    function setCodagencia(String $codagencia) {
        $this->codagencia = $codagencia;
    }

    function setProjetos(String $projetos) {
        $this->projetos = $projetos;
    }


    
}//Agenciadados 