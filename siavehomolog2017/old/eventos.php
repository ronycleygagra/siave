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

function imprimirevento(di,df,ce){
	bootbox.prompt("Fa&ccedil;a um coment&aacute;rio sobre o resultado", function(comentario) {   
		window.open("printagencia.php?di="+di+"&df="+df+"&ce="+ce+"&comentario="+comentario,"_blank"); 
	});
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
									<td width="45%">
										<div id="diveventos">
											<select name="codevento">
												<option value="0">---</option>
											</select>
										</div>
									</td>
									<td width="45%" align="left">&nbsp;&nbsp;
										<button type="button" class="btn btn-primary"
											onclick="javascript: enviarevento();">Consultar&nbsp;<i class="glyphicon glyphicon-search"></i></button>&nbsp;&nbsp;
										<button type="button" name = "butimprimir" class="btn btn-danger"
										onclick="javascript: imprimirevento('<?php echo $_GET ['di'];?>','<?php echo $_GET ['df'];?>','<?php echo $_GET ['ce'];?>');" 
										disabled>Imprimir resultado&nbsp;<i class="glyphicon glyphicon-print"></i></button>	
								</td>
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
	if ($_GET ["ano"] != null && $_GET ["mes"] != null) {
		?>
		<script>
			document.formevento.butimprimir.disabled = false;
		</script>
	<table border="0" width="100%">
		<tr>
			<td width="34%"><iframe
					src="./graficoseventoaplicabilidade.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficoseventosatisfacao.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficoseventoinfraestrutura.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
		</tr>
		<tr>
			<td width="34%"><iframe
					src="./graficoseventocredenciado.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficoseventoconhecimento.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
			<td width="33%"><iframe
					src="./graficoseventofidelizacao.php?ano=<?php echo $_GET ['ano']; ?>&mes=<?php echo $_GET ['mes']; ?>&ce=<?php echo $_GET ['ce']; ?>	"
					class="graficoMissao" frameborder="0" width="100%" height="237px"></iframe>
			</td>
		</tr>
	</table>
	<?php
	}
	?>
</body>
</html>