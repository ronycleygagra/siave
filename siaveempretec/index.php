<!DOCTYPE html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
        <title>SIAVE EMPRETEC - Sebrae</title>
        <!-- styles -->
        <link href="./layout/styles/login.css" rel="stylesheet">
        <link href="./layout/styles/bootstrap.min.css" rel="stylesheet">
        <link href="https://file.myfontastic.com/25femE7xeK8GoTXAmZ4zwY/icons.css" rel="stylesheet">
        <link href="./layout/styles/aos.css" rel="stylesheet">
        <!-- scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="./layout/scripts/aos.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                AOS.init({
                    easing: 'ease-out-in',
                    duration: 800
                });
            });
        </script>
    </head>
    <body class="main aos-all">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <a href="">
                            <h1 data-aos="zoom-in"><img src="./layout/images/logo-login.png"></h1>
                        </a>

                        <p data-aos="zoom-in">SIAVE - Sistema de Acompanhamento das Avaliações do EMPRETEC</p>
                    </div>
                </div>
            </div>
        </header>
        <main class="main" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <p data-aos="zoom-in">Entre com suas credenciais abaixo:</p>
                        <form data-aos="zoom-in" action="./login.php" method="post">
                            <input type="text" name="login" placeholder="Usuário de rede">
                            <input type="password" name="senha" placeholder="Senha">
                            <button type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
