<?php
require 'confdb.php';
require 'scriptData.php';

$dataInicial = formatDate($_GET["di"]);
$dataFinal = formatDate($_GET["df"]);

//ÓTIMO-------------------------------------------------------------------
$sqlOtimo = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'OTIMO' or id.descItem = '1 - Muito Satisfeito');";

//$sqlOtimo = "select count(*) from itemindicadoraval"	;
$valorOtimoResult = mssql_query($sqlOtimo);
$valorOtimo20137 =  mssql_fetch_array($valorOtimoResult);
//------------------------------------------------------------------------

//BOM-------------------------------------------------------------------
$sqlBom = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'BOM' or id.descItem = '2 - Satisfeito');";
$valorBomResult = mssql_query($sqlBom);
$valorBom20137 =  mssql_fetch_array($valorBomResult);

//------------------------------------------------------------------------

//REGULAR-------------------------------------------------------------------
$sqlRegular = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'REGULAR' or id.descItem = '3 - Pouco Satisfeito');";
$valorRegularResult = mssql_query($sqlRegular);
$valorRegular20137 =  mssql_fetch_array($valorRegularResult);
//------------------------------------------------------------------------

//RUIM-------------------------------------------------------------------
$sqlRuim = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'RUIM' or id.descItem = '4 - Insatisfeito');";
$valorRuimResult = mssql_query($sqlRuim);
$valorRuim20137 =  mssql_fetch_array($valorRuimResult);
//------------------------------------------------------------------------

//TOTAL---------------------------
$totalValores20137 = $valorOtimo20137[0]+$valorBom20137[0]+$valorRegular20137[0]+$valorRuim20137[0];
//--------------------------------
?>
<meta charset="ISO-8859-1">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load('visualization', '1', {packages: ['corechart']});
	google.load('visualization', '1', {packages: ['table']});
</script>
<script type="text/javascript">
function drawRespostasPizza() {
	var data = google.visualization.arrayToDataTable([
			['Resposta', 'Quantidade'],
			['MUITO SATISFEITO (<?echo $valorOtimo20137[0];?>)', <?echo $valorOtimo20137[0];?>],
			  ['SATISFEITO (<?echo $valorBom20137[0];?>)', <?echo $valorBom20137[0];?>],
			  ['POUCO SATISFEITO (<?echo $valorRegular20137[0];?>)', <?echo $valorRegular20137[0];?>],
			  ['INSATISFEITO (<?echo $valorRuim20137[0];?>)', <?echo $valorRuim20137[0];?>]
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
<h2 style="text-align: center;">SATISFA&Ccedil;&Atilde;O</h2>
<div id="divrespostaspizza" style="width: 300px; height: 185px; margin: 0 auto;"></div>