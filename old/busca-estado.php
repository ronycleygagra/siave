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
        <style>
            .text-red{color:#dd4b39 !important}
            .text-yellow{color:#f39c12 !important}
            .text-aqua{color:#00c0ef !important}
            .text-blue{color:#0073b7 !important}
            .text-black{color:#111 !important}
            .text-light-blue{color:#3c8dbc !important}
            .text-green{color:#00a65a !important}
            .text-gray{color:#d2d6de !important}
            .text-navy{color:#001f3f !important}
            .text-teal{color:#39cccc !important}
            .text-olive{color:#3d9970 !important}
            .text-lime{color:#01ff70 !important}
            .text-orange{color:#ff851b !important}
            .text-fuchsia{color:#f012be !important}
            .text-purple{color:#605ca8 !important}
            .text-maroon{color:#d81b60 !important}
        </style>
    </head>
    <body class="main aos-all">
        <?php include 'header.html'; ?>
        <main class="main" role="main">
            <div class="container"> 
                <h2>Para iniciar, selecione uma categoria abaixo:</h2>
                <?php include 'dimensoes.html'; ?>
                <?php include 'formestado.php'; ?>
                <?php 
                    if ($_POST ["di"] != null && $_POST ["df"] != null) {
                        include 'graficos.php'; 
                        include 'dadosestado.php';
                    } 
                ?>
            </div>
        </main>

    </body>
</html>