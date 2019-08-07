<?php
session_start();
if ($_SESSION["usuario"] == NULL) {
    ?>
    <script>
        alert("Usuário não autenticado. Por favor faça seu login.");
        window.open('./index.php', '_self');
    </script>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html class="no-js" lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
            <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
            <title>SIAVE - Sebrae</title>
            <link rel="stylesheet" href="https://file.myfontastic.com/25femE7xeK8GoTXAmZ4zwY/icons.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="./layout/styles/main.css">
            <link rel="stylesheet" href="./layout/styles/bootstrap.min.css">
            <link rel="stylesheet" href="./layout/styles/aos.css">
            <link rel="stylesheet" href="./layout/styles/cores.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="./layout/scripts/aos.js"></script>
            <script src="./layout/scripts/chartjs/Chart.min.js"></script>
            <script src="./layout/scripts/functions.js"></script>

            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

            <script>
                $(function () {
                    $("#dialog").dialog({
                        autoOpen: false,
                        width: 500,
                        show: {
                            effect: "slide",
                            duration: 1000
                        },
                        hide: {
                            effect: "drop",
                            duration: 1000
                        }
                    });

                    $("#opener").on("click", function () {
                        $("#dialog").dialog("open");
                    });
                });
            </script>
        </head>
        <body class="main aos-all">
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-2">
                            <a href="">
                                <h1><img src="./layout/images/logo.png"></h1>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <p>SIAVE - Sistema de Acompanhamento das Avaliações dos Eventos</p>
                        </div>
                        <div class="col-xs-12 col-md-1" data-aos="zoom-in">
                            <div class="info">
                                <a id="opener">
                                    <img src="./layout/images/info.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="dialog" title="Informações">
                    <p>
                        APLICABILIDADE<br>
                        Pergunta relacionada: O conte&uacute;do poder&aacute; ser aplicado na sua empresa ou na sua atividade <BR>profissional ?
                        <br><br>
                        SATISFA&Ccedil;&Atilde;O<br>
                        Pergunta relacionada: Voc&ecirc; classificaria sua satisfa&ccedil;&atilde;o com o evento do SEBRAE oferecido como:
                        <br><br>
                        INFRAESTRTURA<br>
                        Pergunta relacionada: A infra-instrutura foi adequada - espa&ccedil;o f&iacute;sico, recurso &aacute;udio-visual, 
                        ilumina&ccedil;&atilde;o, mobili&aacute;rio, etc ?
                        <br><br>
                        INSTRUTOR/FACILITADOR<br>
                        Pergunta relacionada: Conduziu os trabalhos de maneira a possibilitar o alcance dos objetivos da  
                        capacita&ccedil;&atilde;o ?
                        <br><br>
                        CONHECIMENTO<br>
                        Pergunta relacionada: Como tomou conhecimento deste evento? 
                        <br><br>
                        FIDELIZA&Ccedil;&Atilde;O<br>
                        Pergunta relacionada: Voc&ecirc; indicaria esta solu&ccedil;&atilde;o para um amigo? 
                    </p>
                </div>
            </header>
            <main class="main" role="main">
                <div class="container">
                    <h2>Para iniciar, selecione uma categoria abaixo:</h2>
                    <div class="row">
                        <div class="col-md-4" data-aos="zoom-in">
                            <div class="box" onclick="location.href = './modulos/estado/busca.php';">
                                <h3 class="estados">Estados</h3>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="zoom-in">
                            <div class="box" onclick="location.href = './modulos/agencia/busca.php';">
                                <h3 class="agencias">Agências</h3>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="zoom-in">
                            <div class="box" onclick="location.href = './modulos/evento/busca.php';">
                                <h3 class="estrela">Eventos</h3>
                            </div>
                        </div>
						
                    </div>
					<br>
					<div class="row">
                        <div class="col-md-4" data-aos="zoom-in">
                            <div class="box" onclick="location.href = './modulos/empretec/busca.php';">
                                <h3 class="estrela">Empretec</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
    </html>
    <?php
}

