<?php
require './Evento.class.php';
//$ano = $_GET["ano"];
//$mes = $_GET["mes"];
$ev = new Evento(null);
$eventos = $ev->getEventos('10','2016');
?>
<meta charset="ISO-8859-1">
<?php 
echo "<select name='codevento' >";
echo "	<option value='0'>---</option>";
for ($i=0;$i<count($eventos);$i++){
	echo "<option value='".$eventos[$i]['codevento']."'>"
		.$eventos[$i]['codevento']." - ".substr(strtoupper($eventos[$i]['tituloevento']),0,25)."</option>";
}
echo "</select>";
