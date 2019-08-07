<?php
require 'confdb.php';
require 'scriptData.php';
require 'projetos.php';

$dataInicial = formatDate ( $_GET ["di"] );
$dataFinal = formatDate ( $_GET ["df"] );
$agencia = $_GET ["ag"];
$ano = date("Y",$dataInicial);
$projetos = $projetosagencia[$agencia];
// �TIMO-------------------------------------------------------------------
$sqlOtimo = "
		select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos)
and a.codevento = e. codevento
and a.codindicadoraval = '20136'
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'OTIMO';";
// $sqlOtimo = "select count(*) from itemindicadoraval" ;
$valorOtimoResult = mssql_query ( $sqlOtimo );
$valorOtimo20133 = mssql_fetch_array ( $valorOtimoResult );
// ------------------------------------------------------------------------
// BOM-------------------------------------------------------------------
$sqlBom = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval = '20136'
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'BOM';";
$valorBomResult = mssql_query ( $sqlBom );
$valorBom20133 = mssql_fetch_array ( $valorBomResult );
// ------------------------------------------------------------------------

// REGULAR-------------------------------------------------------------------
$sqlRegular = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval = '20136'
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'REGULAR';";
$valorRegularResult = mssql_query ( $sqlRegular );
$valorRegular20133 = mssql_fetch_array ( $valorRegularResult );
// ------------------------------------------------------------------------

// RUIM-------------------------------------------------------------------
$sqlRuim = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval = '20136'
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'RUIM';";
$valorRuimResult = mssql_query ( $sqlRuim );
$valorRuim20133 = mssql_fetch_array ( $valorRuimResult );
// ------------------------------------------------------------------------

// NA (N�O SE APLICA)-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval = '20136'
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'NA (NAO SE APLICA)';";
$valorNaResult = mssql_query ( $sqlNa );
$valorNa20133 = mssql_fetch_array ( $valorNaResult );
// ------------------------------------------------------------------------
// TOTAL---------------------------
$totalValores20133 = $valorOtimo20133 [0] + $valorBom20133 [0] + $valorRegular20133 [0] + $valorRuim20133 [0] + $valorNa20133 [0];
// --------------------------------
?>
<meta charset="ISO-8859-1">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawRespostasPizza() {
	var data = google.visualization.arrayToDataTable([
			['Resposta', 'Quantidade'],
			['OTIMO (<?echo $valorOtimo20133[0];?>)', <?echo $valorOtimo20133[0];?>],
			  ['BOM (<?echo $valorBom20133[0];?>)', <?echo $valorBom20133[0];?>],
			  ['REGULAR (<?echo $valorRegular20133[0];?>)', <?echo $valorRegular20133[0];?>],
			  ['RUIM (<?echo $valorRuim20133[0];?>)', <?echo $valorRuim20133[0];?>],
			  ['N�O SE APLICA (<?echo $valorNa20133[0];?>)', <?echo $valorNa20133[0];?>]
	    ]);

		var options = {
				backgroundColor: {
					'stroke': '#ccc',
		            'strokeWidth': 3
				},
				chartArea: {
					'backgroundColor': 'blue',
					left:5,top:5,width:'100%',height:'95%'
					}
				};
	    
	    new google.visualization.PieChart(document.getElementById('divrespostaspizza')).
	    	draw(data,options);
	}
	google.setOnLoadCallback(drawRespostasPizza);
</script>
<h2 style="text-align: center;">INFRAESTRUTURA</h2>
<div id="divrespostaspizza"
	style="width: 300px; height: 185px; margin: 0 auto;"></div>
