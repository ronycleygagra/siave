<?php
require 'confdb.php';
require 'scriptData.php';
require 'projetos.php';

$dataInicial = formatDate ( $_GET ["di"] );
$dataFinal = formatDate ( $_GET ["df"] );
$agencia = $_GET ["ag"];
$ano = date("Y",$dataInicial);
$projetos = $projetosagencia[$agencia];

//MALA DIRETA-------------------------------------------------------------------
$sqlOtimo = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos)
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Mala direta';";

//$sqlOtimo = "select count(*) from itemindicadoraval"	;
$valorOtimoResult = mssql_query($sqlOtimo);
$valor1 =  mssql_fetch_array($valorOtimoResult);
//------------------------------------------------------------------------
//Rádio -------------------------------------------------------------------
$sqlBom = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Rádio';";
$valorBomResult = mssql_query($sqlBom);
$valor2 =  mssql_fetch_array($valorBomResult);

//------------------------------------------------------------------------

//Jornal -------------------------------------------------------------------
$sqlRegular = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Jornal';";
$valorRegularResult = mssql_query($sqlRegular);
$valor3 =  mssql_fetch_array($valorRegularResult);
//------------------------------------------------------------------------

//Internet/Portal-------------------------------------------------------------------
$sqlRuim = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Internet/Portal';";
$valorRuimResult = mssql_query($sqlRuim);
$valor4 =  mssql_fetch_array($valorRuimResult);
//------------------------------------------------------------------------

//Central de Relacioanamento(0800 570 0800))-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Central de Relacioanamento(0800 570 0800)';";
$valorNaResult = mssql_query($sqlNa);
$valor5 =  mssql_fetch_array($valorNaResult);
//------------------------------------------------------------------------

//E-mail(recebido)-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'E-mail(recebido)';";
$valorNaResult = mssql_query($sqlNa);
$valor6 =  mssql_fetch_array($valorNaResult);
//------------------------------------------------------------------------

//Telemarketing-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Telemarketing';";
$valorNaResult = mssql_query($sqlNa);
$valor7 =  mssql_fetch_array($valorNaResult);
//------------------------------------------------------------------------

//Recepção do SEBRAE-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Recepção do SEBRAE';";
$valorNaResult = mssql_query($sqlNa);
$valor8 =  mssql_fetch_array($valorNaResult);
//------------------------------------------------------------------------

//Outros-------------------------------------------------------------------
$sqlNa = "select count(e.codevento) as qtd
from avaliacaoeve a, evento e, indicadoraval ia, itemindicadoraval id, HorarioEvento h
where h.DataInicio between '$dataInicial' and '$dataFinal'
and e.codevento = h.codevento
and e.datacan is null 
and e.codsol in ($projetos) 
and a.codevento = e. codevento
and a.codindicadoraval in ('20140','20188')
and ia.codindicadoraval = a.codindicadoraval
and id.coditemaval = a.coditemaval
and id.descItem = 'Outros';";
$valorNaResult = mssql_query($sqlNa);
$valor9 =  mssql_fetch_array($valorNaResult);
//------------------------------------------------------------------------

//TOTAL---------------------------
$totalValores = $valor1[0]+$valor2[0]+$valor3[0]+$valor4[0]+$valor5[0]+
$valor6[0]+$valor7[0]+$valor8[0]+$valor9[0];
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
			['Mala Direta (<?echo $valor1[0];?>)', <?echo $valor1[0];?>],
			  ['Rádio (<?echo $valor2[0];?>)', <?echo $valor2[0];?>],
			  ['Jornal (<?echo $valor3[0];?>)', <?echo $valor3[0];?>],
			  ['Internet/Portal (<?echo $valor4[0];?>)', <?echo $valor4[0];?>],
			  ['0800 570 0800 (<?echo $valor5[0];?>)', <?echo $valor5[0];?>],
			  ['E-mail(recebido) (<?echo $valor6[0];?>)', <?echo $valor6[0];?>],
			  ['Telemarketing (<?echo $valor7[0];?>)', <?echo $valor7[0];?>],
			  ['Recepção do SEBRAE (<?echo $valor8[0];?>)', <?echo $valor8[0];?>],
			  ['Outros (<?echo $valor9[0];?>)', <?echo $valor9[0];?>]
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
<h2 style="text-align: center;">CONHECIMENTO</h2>
<div id="divrespostaspizza" style="width: 300px; height: 185px; margin: 0 auto;"></div>
