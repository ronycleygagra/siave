<?php include_once './nomesagencias.php'; ?>
<form name="filtros" method="post" action="./busca.php">
    <label>De </label>
    <input type="date" name="di">
    <label>a</label>
    <input type="date" name="df">
    <label>Agência:</label>
    <select name="codagencia">
        <?php
        for ($i = 0; $i < count($agencias); $i ++) {
            $agencia = $agencias [$i];
            if ($agencia ['cod'] == $_POST ["codagencia"]) {
                ?>
                <option value="<?php echo $agencia['cod']; ?>" selected><?php echo $agencia['nome']; ?></option>
                <?php
            } else {
                ?>	
                <option value="<?php echo $agencia['cod']; ?>"><?php echo $agencia['nome']; ?></option>
                <?php
            }
        }
        ?>
    </select>
    <button type="submit" onclick="enviar();"><img src="../../layout/images/lupa.png"></button>
    <!--
    <label>Comentário: </label>
    <input type="text" name="comentario" size="23" disabled="">
    <button disabled="true" name="butimprimir" onclick="imprimir();">
        <img src="../../layout/images/print.png"></button>  
    -->
</form>