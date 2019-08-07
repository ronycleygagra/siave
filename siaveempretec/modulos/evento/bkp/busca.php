<?php 
session_start(); 
?>
<html class="no-js" lang="pt-br">
    <?php include '../common/head.html'; ?>
    <body class="main aos-all">
        <?php include '../common/header.html'; ?>
        <main class="main" role="main">
            <div class="container"> 
                <?php include './dimensoes.html'; ?>
                <?php include './form.php'; ?>
                <?php 
                    if ($_POST ["mes"] != null && $_POST ["ano"] != null && $_POST ["codevento"] != null) {
                        $_SESSION["codevento"] = $_POST ["codevento"];
                        ?>
                        <script>
                            loadeventos();
                            $(document).ready(function() {
                                var mespost = '<?php echo $_POST ["mes"]; ?>';
                                var anopost = '<?php echo $_POST ["ano"]; ?>';
                                
                                $('#mes option').each(function() {
                                    if($(this).val() == mespost) {
                                        $(this).attr('selected', true);
                                    }
                                });
                                
                                $('#ano option').each(function() {
                                    if($(this).val() == anopost) {
                                        $(this).attr('selected', true);
                                    }
                                });                               
                            });
                            
                            //document.filtros.butimprimir.disabled = false;
                            //document.filtros.comentario.disabled = false;
                        </script>
                        <?php
                        include '../common/graficos.php'; 
                        include './dados.php';
                    } 
                ?>
            </div>
        </main>
    </body>
</html>