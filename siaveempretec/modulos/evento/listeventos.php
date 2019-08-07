<?php
session_start();
require './Evento.class.php';
$ano = $_GET["ano"];
$mes = $_GET["mes"];
$ev = new Evento(null);
$eventos = $ev->getEventos($ano);
?>
<meta charset="ISO-8859-1">
<?php
for ($i = 0; $i < count($eventos); $i++) {
    if($_SESSION["codevento"] == $eventos[$i]['codevento']){
        echo "<option value='" . $eventos[$i]['codevento'] . "' selected>"
    . $eventos[$i]['codevento'] . " - " . substr(strtoupper($eventos[$i]['tituloevento']), 0, 50) . "</option>";
    }else{
        echo "<option value='" . $eventos[$i]['codevento'] . "'>"
    . $eventos[$i]['codevento'] . " - " . substr(strtoupper($eventos[$i]['tituloevento']), 0, 50) . "</option>";
    }
}
