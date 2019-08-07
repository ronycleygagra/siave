<?php
session_start();
?>
<html class="no-js" lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
    <title>SIAVE - Sebrae</title>

    <!-- styles -->
    <link href="styles/login.css" rel="stylesheet">
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="https://file.myfontastic.com/25femE7xeK8GoTXAmZ4zwY/icons.css" rel="stylesheet">
    <link href="styles/aos.css" rel="stylesheet">

    <!-- favicons -->

    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>

<body class="main aos-all">

    <!--[if (lt IE 9) & (!IEMobile)]> <p class="browsehappy">Você está usando um <strong>navegador antigo</strong>. Por favor <a href="http://browsehappy.com/">atualize o seu navegador</a> para uma boa experiência.</p> <![endif]-->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <a href="">
                        <h1 data-aos="zoom-in"><img src="images/logo-login.png"></h1>
                    </a>

                    <p data-aos="zoom-in">SIAVE - Sistema de Acompanhamento das Avaliações dos Eventos</p>
                </div>
            </div>
        </div>
    </header>

    <main class="main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <p data-aos="zoom-in">Entre com suas credenciais abaixo:</p>
                    <form data-aos="zoom-in" action="login.php">
                        <input type="text" placeholder="Usuário de rede">
                        <input type="text" placeholder="Senha">
                        <button type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/aos.js"></script>

    <script type="text/javascript">
    jQuery(document).ready(function($){

        AOS.init({
            easing: 'ease-out-in',
            duration: 800
        });

    });

    </script>

</body>
</html>
