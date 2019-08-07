<script>
    //function loadeventos() {
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
        //var ano = document.filtros.ano.value;
        var ano = "2017";
        var stringurl = "./listeventos.php?ano=" + ano;
        xmlhttpMeso.open("GET", stringurl, true);
        xmlhttpMeso.send();
    //}
</script>
<form name="filtros" method="post" action="./busca.php">
    <label>Ano:</label>
    <select name="ano" id="ano">
        <option value="2017">2017</option>
    </select>
    <label>Eventos:</label>
        <select name='codevento' id='codevento'></select>;
    <button type="submit" onclick="enviar();"><img src="../../layout/images/lupa.png"></button><br>
    <!--
    <label>Comentário: </label>
    <input type="text" name="comentario" size="23" disabled="">
    <button disabled="true" name="butimprimir" onclick="imprimir();">
        <img src="../../layout/images/print.png"></button>  
    -->
</form>