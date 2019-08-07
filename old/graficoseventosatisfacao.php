<?php
require 'confdb.php';
require 'scriptData.php';

$ano = formatDate ( $_GET ["ano"] );
$mes = formatDate ( $_GET ["mes"] );
$ce = $_GET ["ce"];

// ÓTIMO-------------------------------------------------------------------
$sqlOtimo = "
		select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where 
h.codevento = '$ce' 
and e.codevento = h.codevento
and e.datacan is null 
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'OTIMO' or id.descItem = '1 - Muito Satisfeito');";
// $sqlOtimo = "select count(*) from itemindicadoraval" ;
$valorOtimoResult = mssql_query ( $sqlOtimo );
$valorOtimo20133 = mssql_fetch_array ( $valorOtimoResult );
// ------------------------------------------------------------------------
// BOM-------------------------------------------------------------------
$sqlBom = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where   
h.codevento = '$ce' 
and e.codevento = h.codevento
and e.datacan is null 
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'BOM' or id.descItem = '2 - Satisfeito');";
$valorBomResult = mssql_query ( $sqlBom );
$valorBom20133 = mssql_fetch_array ( $valorBomResult );
// ------------------------------------------------------------------------

// REGULAR-------------------------------------------------------------------
$sqlRegular = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where   
h.codevento = '$ce' 
and e.codevento = h.codevento
and e.datacan is null 
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'REGULAR' or id.descItem = '3 - Pouco Satisfeito');";
$valorRegularResult = mssql_query ( $sqlRegular );
$valorRegular20133 = mssql_fetch_array ( $valorRegularResult );
// ------------------------------------------------------------------------

// RUIM-------------------------------------------------------------------
$sqlRuim = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where   
h.codevento = '$ce' 
and e.codevento = h.codevento
and e.datacan is null  
and a.codevento = e. codevento
and (a.codindicadoraval = '20137' or a.codindicadoraval = '20186')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and (id.descItem = 'RUIM' or id.descItem = '4 - Insatisfeito');";
$valorRuimResult = mssql_query ( $sqlRuim );
$valorRuim20133 = mssql_fetch_array ( $valorRuimResult );
// ------------------------------------------------------------------------

// TOTAL---------------------------
$totalValores20133 = $valorOtimo20133 [0] + $valorBom20133 [0] + $valorRegular20133 [0] + $valorRuim20133 [0];
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
			['MUITO SATISFEITO (<?echo $valorOtimo20133[0];?>)', <?echo $valorOtimo20133[0];?>],
			  ['SATISFEITO (<?echo $valorBom20133[0];?>)', <?echo $valorBom20133[0];?>],
			  ['POUCO SATISFEITO (<?echo $valorRegular20133[0];?>)', <?echo $valorRegular20133[0];?>],
			  ['INSATISFEITO (<?echo $valorRuim20133[0];?>)', <?echo $valorRuim20133[0];?>]
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
<h2 style="text-align: center;">SATISFAÇÃO</h2>
<div id="divrespostaspizza"
	style="width: 300px; height: 185px; margin: 0 auto;"></div>
