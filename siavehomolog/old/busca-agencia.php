<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
        <title>SIAVE - Sebrae</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/bootstrap.min.css" rel="stylesheet">
        <link href="https://file.myfontastic.com/25femE7xeK8GoTXAmZ4zwY/icons.css" rel="stylesheet">
        <link href="styles/aos.css" rel="stylesheet">
        <link href="styles/cores.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="scripts/aos.js"></script>
        <script src="scripts/chartjs/Chart.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                AOS.init({
                    easing: 'ease-out-in',
                    duration: 800
                });
            });

            function enviar() {
                document.filtros.submit();
            }

            function imprimir() {
                var di = document.filtros.di.value;
                var df = document.filtros.df.value;
                var comentario = document.filtros.comentario.value;
                window.open("printestado.php?di=" + di + "&df=" + df + "&comentario=" + comentario, "_blank");
            }
        </script>
    </head>
    <body class="main aos-all">
        <?php include 'header.html'; ?>
        <main class="main" role="main">
            <div class="container"> 
                <h2>Para iniciar, selecione uma categoria abaixo:</h2>
                <?php include 'dimensoes.html'; ?>
                <?php include 'formagencia.php'; ?>
                <?php include 'resultadoagencia.php'; ?>
            </div>
        </main>
    </body>
</html>