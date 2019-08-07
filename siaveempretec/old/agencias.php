<?php
include 'nomesagencias.php';
?>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="css/estilos.css">
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<script src="js/scripts.js"></script>
<script>
$(function() {
	$( "#from" ).datepicker({
		/* defaultDate: "+1w", */
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
		$( "#to" ).datepicker({
			/* defaultDate: "+1w", */
			changeMonth: true,
			numberOfMonths: 3,
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
});

function imprimiragencia(di,df,ag){
	bootbox.prompt("Fa&ccedil;a um coment&aacute;rio sobre o resultado", function(comentario) {   
		window.open("printagencia.php?di="+di+"&df="+df+"&ag="+ag+"&comentario="+comentario,"_blank"); 
	});
}
</script>
<body>
	<div class="filtros">
		<form class="pure-form" name="formagencia">
			<fieldset>
				<table width="100%" border="0">
					<tr>
						<td width="50%" align="left"><label for="to" class="labelcontent">Período:
						</label> <input type="text" id="from" name="from"> <label for="to"
							class="labelcontent">a </label> <input type="text" id="to"
							name="to"></td>
						<td width="50%" align="left"><label for="from"
							class="labelcontent">Agência: </label> <select name="agencia">
							<?php
							for($i = 0; $i < count ( $agencias ); $i ++) {
								$agencia = $agencias [$i];
								if ($agencia ['cod'] == $_GET ['ag']) {
									?>
									<option value="<?php echo $agencia['cod'];?>" selected><?php echo $agencia['nome'];?></option>
									<?php
								} else {
									?>	
									<option value="<?php echo $agencia['cod'];?>"><?php echo $agencia['nome'];?></option>
								<?php
								}
							}
							?>
					</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-primary" 
								onclick="javascript: enviaragencia();">Consultar&nbsp;<i class="glyphicon glyphicon-search"></i></button>
							<button type="button" name = "butimprimir" class="btn btn-danger"
							onclick="javascript: imprimiragencia('<?php echo $_GET ['di'];?>','<?php echo $_GET ['df'];?>','<?php echo $_GET ['ag'];?>');" 
							disabled>Imprimir resultado&nbsp;<i class="glyphicon glyphicon-print"></i></button>	
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
			document.formagencia.butimprimir.disabled = false;
		</script>
	<table border="0" width="100%">
		<tr>
			<td width="34%">
					<iframe
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