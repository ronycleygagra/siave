<form name="comentario" method="post" action="printestado.php">
    <input type="hidden" name='comentario_di' value='<?php echo $_POST ['di']; ?>'>
    <input type="hidden" name='comentario_df' value='<?php echo $_POST ['df']; ?>'>
    <label style=''>Comentário: </label>
    <textarea name="comentario_texto" rows='2' cols="80"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;
    <button  type="submit" onclick="document.comentario.submit();">
        <img src="images/print.png">
    </button>
</form>