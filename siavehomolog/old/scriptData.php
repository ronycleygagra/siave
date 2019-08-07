<?php
/*
 * formata a data conforme o BD
 */
function formatDate($data) {
	$dia = substr ( $data, 0, 2 );
	$mes = substr ( $data, 3, 2 );
	$ano = substr ( $data, 6, 4 );
	$separador = "-";
	return $ano . $separador . $mes . $separador . $dia;
}

/*
 * formata a data para ser exibida na página
 */
function formatDateInverse($data) {
	$ano = substr ( $data, 0, 4 );
	$mes = substr ( $data, 5, 2 );
	$dia = substr ( $data, 8, 2 );
	$separador = "/";
	$datafinal = $dia . $separador . $mes . $separador . $ano;
	if ($datafinal == "00/00/0000") {
		return "";
	}
	return $dia . $separador . $mes . $separador . $ano;
}
