<?php
require 'confdb.php';
require 'scriptData.php';
$ano = $_GET["ano"];
$mes = $_GET["mes"];
?>
<meta charset="ISO-8859-1">
<?php 
$sqleventos = "
select distinct(h.codrealizacao) as 'codevento', e.tituloevento as 'tituloevento'
from historicorealizacoescliente h, evento e
where year(mesanocompetencia) = '$ano' and month(mesanocompetencia) = '$mes' 
and e.codevento = h.codrealizacao 
and (instrumento like '%curso%' or instrumento like '%palestra%') 
order by e.tituloevento";

$result = mssql_query ( $sqleventos );
$eventos = Array();
$inc = 0;
while($row = mssql_fetch_assoc($result)){
	$eventos[$inc] = $row;
	$inc++;
}
echo "<select name='codevento' >";
echo "	<option value='0'>---</option>";
for ($i=0;$i<count($eventos);$i++){
	echo "<option value='".$eventos[$i]['codevento']."'>"
		.$eventos[$i]['codevento']." - ".substr(strtoupper($eventos[$i]['tituloevento']),0,25)."</option>";
}
echo "</select>";