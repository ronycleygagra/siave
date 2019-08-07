<?php
/**
 * Classe que recupera os dados de indicadores de satisfação de atendimento de um evento
 * @name $globalVariableName 
 * @author Ronycley Gonçalves Agra - suportecg@sebraepb.com.br
 * @since 30/01/2017
 * @version "1.0"
 * @uses Classe DatabaseConnection
 */
include_once '../../controles/DatabaseConnection.php';

class Evento {

    /**
     *
     * @var DatabaseConection Conexão com o banco de dados
     */
    private $conn = null;

    /**
     *
     * @var String O código da agência selecionada para a consulta
     */
    private $codevento = null;

    /**
     * Construtor
     */
    function __construct($codevento) {
        $this->conn = new DatabaseConnection();
        $this->codevento = $codevento;
    }

    /**
     * Retorna os valores de satisifação para o indicador <b>aplicabilidade</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador aplicabilidade
     */
    public function aplicabilidade() {
        $aplicabilidade = Array();
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'OTIMO' or id.descItem = '4');";
        // $sqlOtimo = "select count(*) from itemindicadoraval" ;
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'REGULAR' or id.descItem = '2');";
        $valorRegular = $this->conn->query($sql)->fetch();;

        // ------------------------------------------------------------------------

        // RUIM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null  
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'RUIM' or id.descItem = '1');";
        $valorRuim = $this->conn->query($sql)->fetch();;
        // ------------------------------------------------------------------------

        // NA (N�O SE APLICA)-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20133' or a.codindicadoraval = '20182')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'NA (NAO SE APLICA)' or id.descItem = 'NA');";
        $valorNa = $this->conn->query($sql)->fetch();

        $aplicabilidade["otimo"] = $valorOtimo [0];
        $aplicabilidade["bom"] = $valorBom [0];
        $aplicabilidade["regular"] = $valorRegular [0];
        $aplicabilidade["ruim"] = $valorRuim [0];
        $aplicabilidade["na"] = $valorNa [0];

        return $aplicabilidade;
    }

//aplicabilidade

    /**
     * Retorna os valores de satisifação para o indicador <b>satisfação</b>
     * @access public
     * @param Date $dataInicial Data inicial
     * @param Date $dataFinal Data final
     * @return Array os valores de satisifação para o indicador satisfação
     */
    public function satisfacao() {
        $satisfacao = Array();
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and (id.descItem = 'OTIMO' or id.descItem = '1 - Muito Satisfeito');";
        // $sqlOtimo = "select count(*) from itemindicadoraval" ;
        $valorOtimo = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null  
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
    public function infraestrutura() {
        $infraestrutura = Array();
        
        // OTIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null  
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
    public function credenciado() {
        $credenciado = Array();
        
        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null  
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
    public function conhecimento() {
        $conhecimento = Array();

        //MALA DIRETA-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null  
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
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null  
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
        where 
        h.codevento = '$this->codevento'
        and e.codevento = h.codevento
        and e.datacan is null 
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
    public function fidelizacao() {
        $fidelizacao = Array();

        // �TIMO-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where 
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
        and a.codevento = e. codevento
        and (a.codindicadoraval = '20196' or a.codindicadoraval = '20202')
        and ia.codindicadoraval = a.codindicadoraval
        and id.coditemaval = a.coditemaval
        and id.descItem = '10';";
        // $sqlOtimo = "select count(*) from itemindicadoraval" ;
        $valor10 = $this->conn->query($sql)->fetch();
        // ------------------------------------------------------------------------
        // BOM-------------------------------------------------------------------
        $sql = "select count(e.codevento) as qtd
        from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null  
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
        where   
        h.codevento = '$this->codevento' 
        and e.codevento = h.codevento
        and e.datacan is null 
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

    public function getCodevento() {
        return $this->evento;
    }

    public function setCodevento(String $codevento) {
        $this->codagencia = $codevento;
    }
    
    public function getEventos($mes, $ano){
        $sql = "
            select distinct(h.codrealizacao) as 'codevento', e.tituloevento as 'tituloevento'
            from historicorealizacoescliente_anosanteriores h, evento e
            where year(mesanocompetencia) = '$ano' and month(mesanocompetencia) = '$mes' 
            and e.codevento = h.codrealizacao 
            and (instrumento like '%curso%' or instrumento like '%palestra%') 
            order by e.tituloevento";
        return $this->conn->query($sql)->fetchall(PDO::FETCH_ASSOC);
    }
    
    /**
     * 
     * @return String retorna um string formatado com os valores do objeto atual
     */
    public function toString(){
        return "Cod Evento: $this->codevento";
    }//toString
}//Agenciadados 