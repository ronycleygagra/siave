<html class="no-js" lang="pt-br">
    <?php include '../common/head.html'; ?>
    <body class="main aos-all">
        <?php include '../common/header.html'; ?>
        <main class="main" role="main">
            <div class="container"> 
                <?php include './dimensoes.html'; ?>
                <?php include './form.php'; ?>
                <?php 
                    if ($_POST ["di"] != null && $_POST ["df"] != null) {
                        include '../common/graficos.php'; 
                        include './dados.php';
                    } 
                ?>
            </div>
        </main>
    </body>
</html>