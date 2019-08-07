function carrega(camada) {
	$("#content").load(camada+".php");
}

function showindicador() {
	bootbox
		.dialog({
			title : "<img src='images/info.png' width='20' height='20'>&nbsp;Informa&ccedil;&otilde;es sobre os indicadores",
			message : "APLICABILIDADE<br>"
					+ "Pergunta relacionada: O conte&uacute;do poder&aacute; ser aplicado na sua empresa ou na sua atividade <BR>profissional ?"
					+ "<br><br>"
					+ "SATISFA&Ccedil;&Atilde;O<br>"
					+ "Pergunta relacionada: Voc&ecirc; classificaria sua satisfa&ccedil;&atilde;o com o evento do SEBRAE oferecido como:"
					+ "<br><br>"
					+ "INFRAESTRTURA<br>"
					+ "Pergunta relacionada: A infra-instrutura foi adequada - espa&ccedil;o f&iacute;sico, recurso &aacute;udio-visual, "
					+ "ilumina&ccedil;&atilde;o, mobili&aacute;rio, etc ?"
					+ "<br><br>"
					+ "INSTRUTOR/FACILITADOR<br>"
					+ "Pergunta relacionada: Conduziu os trabalhos de maneira a possibilitar o alcance dos objetivos da  "
					+ "capacita&ccedil;&atilde;o ?"
					+ "<br><br>"
					+ "CONHECIMENTO<br>"
					+ "Pergunta relacionada: Como tomou conhecimento deste evento? "
					+ "<br><br>"
					+ "FIDELIZA&Ccedil;&Atilde;O<br>"
					+ "Pergunta relacionada: Voc&ecirc; indicaria esta solu&ccedil;&atilde;o para um amigo? ",
			buttons : {

				main : {
					label : "Fechar",
					className : "btn-primary",
				}
			}
		});
}

function enviar() {
	var di = document.formperiodo.from.value;
	var df = document.formperiodo.to.value;
	$("#content").load("estado.php?di="+di+"&df="+df);
}

function enviaragencia() {
	var di = document.formagencia.from.value;
	var df = document.formagencia.to.value;
	var ag = document.formagencia.agencia.value;
	$("#content").load("agencias.php?di="+di+"&df="+df+"&ag="+ag);
}

function enviarevento() {
	var ano = document.formevento.ano.value;
	var mes = document.formevento.mes.value;
	var ce = document.formevento.codevento.value;
	$("#content").load("eventos.php?ano="+ano+"&mes="+mes+"&ce="+ce);
}