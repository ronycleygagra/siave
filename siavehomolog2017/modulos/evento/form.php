<script>
    function loadeventos() {
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttpMeso = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttpMeso = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttpMeso.onreadystatechange = function () {
            if (xmlhttpMeso.readyState == 4 && xmlhttpMeso.status == 200) {
                document.getElementById("codevento").innerHTML = xmlhttpMeso.responseText;
            }
        }
        var ano = document.filtros.ano.value;
        var mes = document.filtros.mes.value;
        var stringurl = "./listeventos.php?ano=" + ano + "&mes=" + mes;
        xmlhttpMeso.open("GET", stringurl, true);
        xmlhttpMeso.send();
    }
</script>
<form name="filtros" method="post" action="./busca.php">
    <label>Ano:</label>
    <select name="ano" id="ano">
		<option value="2017" selected>2017</option>
        <option value="2016">2016</option>
    </select>
    <label>Mês:</label>
    <select name="mes" onchange="javascript: loadeventos()" id="mes">
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
    </select>
    <label>Eventos:</label>
        <select name="codevento" id="codevento">
        </select>
    <button type="submit" onclick="enviar();"><img src="../../layout/images/lupa.png"></button><br>
    <!--
    <label>Comentário: </label>
    <input type="text" name="comentario" size="23" disabled="">
    <button disabled="true" name="butimprimir" onclick="imprimir();">
        <img src="../../layout/images/print.png"></button>  
    -->
</form>