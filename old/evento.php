<meta charset="ISO-8859-1">
<link rel="stylesheet" href="css/estilos.css">
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<script src="http://www.google.com/jsapi"></script>
<script src="js/scripts.js"></script>
<script>
function loadeventos(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttpMeso=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttpMeso = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttpMeso.onreadystatechange=function(){
		if(xmlhttpMeso.readyState==4 && xmlhttpMeso.status==200){
			document.getElementById("diveventos").innerHTML=xmlhttpMeso.responseText;
		}
	}
	var ano = document.formevento.ano.value;
	var mes = document.formevento.mes.value;
	var stringurl = "./listeventos.php?ano="+ano+"&mes="+mes;
	xmlhttpMeso.open("GET",stringurl,true);
	xmlhttpMeso.send();
}
</script>
<body>
	<div class="filtros">
		<form class="pure-form" name="formevento">
			<fieldset>
				<table width="100%" border="0">
					<tr>
						<td width="40%" align="left"><label for="to" class="labelcontent">Ano
								e Mês de Competência: </label> <select name="ano">
								<option value="2016">2016</option>
						</select> / <select name="mes"
							onchange="javascript: loadeventos()">
								<option value="0">---</option>
								<option value="1">Janeiro</option>
								<option value="2">Fevereiro</option>
								<option value="3">Março</option>
								<option value="4">Abril</option>
								<option value="5">Maio</option>
								<option value="6">Junho</option>
								<option value="7">Julho</option>
								<option value="8">Agosto</option>
								<option value="9">Setembro</option>
								<option value="10">Outubro</option>
								<option value="11">Novembro</option>
								<option value="12">Dezembro</option>
						</select></td>
						<td width="60%" align="left">
							<table width="100%" border="0">
								<tr>
									<td width="10%"><label for="from" class="labelcontent"
										align="right">Evento:</label></td>
									<td width="75%">
										<div id="diveventos">
											<select name="codevento">
												<option value="0">---</option>
											</select>
										</div>
									</td>
									<td width="15%" align="left">&nbsp;&nbsp;
										<button type="button" class="pure-button pure-button-primary"
											onclick="javascript: enviarevento();">Consultar</button>&nbsp;&nbsp;
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>

	<br>
	<?php
	if ($_GET ["di"] != null && $_GET ["df"] != null) {
		?>
		<script>
			document.formagencia.from.value = '<?php echo $_GET ["di"];?>' ;
			document.formagencia.to.value = '<?php echo $_GET ["df"];?>' ;
		</script>
	<table border="0" width="100%">
		<tr>
			<td width="34%"><iframe
					src="./graficosagenciaaplicabilidade.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficosagenciasatisfacao.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficosagenciainfraestrutura.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
		</tr>
		<tr>
			<td width="34%"><iframe
					src="./graficosagenciacredenciado.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficosagenciaconhecimento.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficosagenciafidelizacao.php?di=<?php echo $_GET ['di']; ?>&df=<?php echo $_GET ['df']; ?>&ag=<?php echo $_GET ['ag']; ?>	"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
		</tr>
	</table>
	<?php
	}
	?>
</body>
</html>