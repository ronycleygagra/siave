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

class Empretec {

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
     * Retorna os valores de satisifação para o indicador <b>satisfação com o evento EMPRETEC</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador 'satisfação com o evento EMPRETEC'
     */
    public function satisfacaoEvento() {
        $satisfacaoEvento = Array();
        // OTIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'OTIMO' or id.descItem = '4');";
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'BOM' or id.descItem = '3');";
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
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'REGULAR' or id.descItem = '2');";
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
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'RUIM' or id.descItem = '1');";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // NA (NÃO SE APLICA)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'NA (NAO SE APLICA)' or id.descItem = 'NA');";
        $valorNa = $this->conn->query($sql)->fetch();

        $satisfacaoEvento["otimo"] = $valorOtimo [0];
        $satisfacaoEvento["bom"] = $valorBom [0];
        $satisfacaoEvento["regular"] = $valorRegular [0];
        $satisfacaoEvento["ruim"] = $valorRuim [0];
        $satisfacaoEvento["na"] = $valorNa [0];

        return $satisfacaoEvento;
    }//aplicabilidade

    /**
     * Retorna os valores de satisifação para o indicador <b>satisfação</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador satisfação
     */
    public function satisfacaoSelecionador() {
        $satisfacao = Array();
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'OTIMO' or id.descItem = '1 - Muito Satisfeito');";
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'BOM' or id.descItem = '2 - Satisfeito');";
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
        and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'REGULAR' or id.descItem = '3 - Pouco Satisfeito');";
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
        and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'RUIM' or id.descItem = '4 - Insatisfeito');";
        $valorRuim = $this->conn->query($sql)->fetch();

        $satisfacao["otimo"] = $valorOtimo [0];
        $satisfacao["bom"] = $valorBom [0];
        $satisfacao["regular"] = $valorRegular [0];
        $satisfacao["ruim"] = $valorRuim [0];

        return $satisfacao;
    }

//satisfacao

    /**
     * Retorna os valores de satisifação para o indicador <b>infraestrutura</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador infraestrutura
     */
    public function satisfacaoFacilitador() {
        $infraestrutura = Array();
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and a.codindicadoraval = '20136'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'OTIMO';";
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20136'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'BOM';";
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
        and a.codindicadoraval = '20136'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'REGULAR';";
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
        and a.codindicadoraval = '20136'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'RUIM';";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // NA (N�O SE APLICA)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval = '20136'
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'NA (NAO SE APLICA)';";
        $valorNa = $this->conn->query($sql)->fetch();

        $infraestrutura["otimo"] = $valorOtimo [0];
        $infraestrutura["bom"] = $valorBom [0];
        $infraestrutura["regular"] = $valorRegular [0];
        $infraestrutura["ruim"] = $valorRuim [0];
        $infraestrutura["na"] = $valorNa [0];

        return $infraestrutura;
    }//$infraestrutura

    /**
     * Retorna os valores de satisifação para o indicador <b>credenciado</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador credenciado
     */
    public function infraestrutura() {
        $credenciado = Array();
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20131' or a.codindicadoraval = '20180')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'OTIMO' or id.descItem = '4');";
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20131' or a.codindicadoraval = '20180')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'BOM' or id.descItem = '3');";
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
        and (a.codindicadoraval = '20131' or a.codindicadoraval = '20180')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'REGULAR' or id.descItem = '2');";
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
        and (a.codindicadoraval = '20131' or a.codindicadoraval = '20180')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'RUIM' or id.descItem = '1');";
        $valorRuim = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // NA (N�O SE APLICA)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20131' or a.codindicadoraval = '20180')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'NA (NAO SE APLICA)' or id.descItem = 'NA');";
        $valorNa = $this->conn->query($sql)->fetch();

        $credenciado["otimo"] = $valorOtimo [0];
        $credenciado["bom"] = $valorBom [0];
        $credenciado["regular"] = $valorRegular [0];
        $credenciado["ruim"] = $valorRuim [0];
        $credenciado["na"] = $valorNa [0];

        return $credenciado;
    }//credenciado

    /**
     * Retorna os valores de satisifação para o indicador <b>conhecimento</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador conhecimento
     */
    public function aplicabilidade() {
        $conhecimento = Array();

        //MALA DIRETA-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Mala direta';";
        $valorMalaDireta = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //R�dio -------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'R�dio';";
        $valorRadio = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Jornal -------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Jornal';";
        $valorJornal = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Internet/Portal-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Internet/Portal';";
        $valorInternet = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //Central de Relacioanamento(0800 570 0800))-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Central de Relacioanamento(0800 570 0800)';";
        $valorCentral = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------
        //E-mail(recebido)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'E-mail(recebido)';";
        $valorEmail = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------

        //Telemarketing-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Telemarketing';";
        $valorTelemarketing = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------

        //Recep��o do SEBRAE-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Recep��o do SEBRAE';";
        $valorRecepcao = $this->conn->query($sql)->fetch();
        //------------------------------------------------------------------------

        //Outros-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and a.codindicadoraval in ('20140','20188')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = 'Outros';";
        $valorOutros = $this->conn->query($sql)->fetch();

        $conhecimento["maladireta"] = $valorMalaDireta [0];
        $conhecimento["radio"] = $valorRadio [0];
        $conhecimento["jornal"] = $valorJornal [0];
        $conhecimento["internet"] = $valorInternet [0];
        $conhecimento["central"] = $valorCentral [0];
        $conhecimento["email"] = $valorEmail [0];
        $conhecimento["telemarketing"] = $valorTelemarketing [0];
        $conhecimento["recepcao"] = $valorRecepcao [0];
        $conhecimento["outros"] = $valorOutros [0];

        return $conhecimento;
    }//conhecimento

    /**
     * Retorna os valores de satisifação para o indicador <b>fidelizacao</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador fidelizacao
     */
    public function promocaoNps() {
        $fidelizacao = Array();

        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos)
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '10';";
        $valor10 = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '9';";
        $valor9 = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------

        // REGULAR-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '8';";
        $valor8 = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------

        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '7';";
        $valor7 = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------

        // NA (N�O SE APLICA)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where h.DataInicio between '$this->dataInicial' and '$this->dataFinal'
        and e.codevento = h.codevento
        and e.datacan is null 
        and e.codsol in ($this->projetos) 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
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
    }//fidelizacao
    
    /**
     * 
     * @return String retorna um string formatado com os valores do objeto atual
     */
    public function toString(){
        return "Data inicial: $this->dataInicial , Data Final: $this->dataFinal, Agencia: $this->codagencia";
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