<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require './Evento.class.php';
$ano = $_GET["ano"];
$mes = $_GET["mes"];
$ev = new Evento(null);
$eventos = $ev->getEventos($mes, $ano);
?>
<meta charset="ISO-8859-1">
<?php
for ($i = 0; $i < count($eventos); $i++) {
    if($_SESSION["codevento"] == $eventos[$i]['codevento']){
        echo "<option value='" . $eventos[$i]['codevento'] . "' selected>"
    . $eventos[$i]['codevento'] . " - " . substr(strtoupper(utf8_encode($eventos[$i]['tituloevento'])), 0, 50) . "</option>";
    }else{
        echo "<option value='" . $eventos[$i]['codevento'] . "'>"
    . $eventos[$i]['codevento'] . " - " . substr(strtoupper(utf8_encode($eventos[$i]['tituloevento'])), 0, 50) . "</option>";
    }
}
