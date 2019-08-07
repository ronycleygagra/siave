<?php
require './Estado.class.php';
$ed = new Estado($_POST ["di"], $_POST ["df"]);
$satisfacao = $ed->satisfacao();
$satisfacaoentrevistador = $ed->satisfacaoentrevistador();
$satisfacaofacilitadores = $ed->satisfacaofacilitadores();
$infraestrutura = $ed->infraestrutura();
$aplicabilidade = $ed->aplicabilidade();
$promocaonps = $ed->promocaonps();
$conhecimento = $ed->conhecimento();

?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        
        //CONFIGURAÇÃO PADRÃO DOS GRÁFICOS
        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true
        };
        
        var coraqua = '#00c0ef';
        var corgreen = '#00a65a';
        var coryellow = '#f39c12';
        var corred = '#dd4339';
        var cormaroom = '#d81b60';
        var corlightblue = '#3c8dbc';
        var corlime = '#01ff70';
        var corblack = '#111';
        var corpurple = '#605ca8';
        
        //APLICABILIDADE
        var aplicabilidadeCanvas = $("#aplicabilidade").get(0).getContext("2d");
        var aplicabilidade = new Chart(aplicabilidadeCanvas);
        var PieData = [
            {
                value: <?php echo $aplicabilidade["pessimo"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Péssimo"
            },
            {
                value: <?php echo $aplicabilidade["ruim"]; ?>,
                color: corred,
                highlight: cormaroom,
                label: "Ruim"
            },
            {
                value: <?php echo $aplicabilidade["regular"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "Regular"
            },
            {
                value: <?php echo $aplicabilidade["bom"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Bom"
            },
            {
                value: <?php echo $aplicabilidade["excelente"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Excelente"
            },
        ];
        aplicabilidade.Doughnut(PieData, pieOptions);

        //SATISFAÇÃO
        var satisfacaoCanvas = $("#satisfacao").get(0).getContext("2d");
        var satisfacao = new Chart(satisfacaoCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacao["pessimo"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Péssimo"
            },
            {
                value: <?php echo $satisfacao["ruim"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacao["regular"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "Regular"
            },
            {
                value: <?php echo $satisfacao["bom"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Bom"
            },
            {
                value: <?php echo $satisfacao["excelente"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Excelente"
            },
        ];
        satisfacao.Doughnut(PieData, pieOptions);

        //SATISFAÇÃO COM O ENTREVISTADOR
        var satisfacaoentrevistadorCanvas = $("#satisfacaoentrevistador").get(0).getContext("2d");
        var satisfacaoentrevistador = new Chart(satisfacaoentrevistadorCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacaoentrevistador["pessimo"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Péssimo"
            },
            {
                value: <?php echo $satisfacaoentrevistador["ruim"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacaoentrevistador["regular"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "Regular"
            },
            {
                value: <?php echo $satisfacaoentrevistador["bom"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Bom"
            },
            {
                value: <?php echo $satisfacaoentrevistador["excelente"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Excelente"
            },
        ];
        satisfacaoentrevistador.Doughnut(PieData, pieOptions);

        //SATISFAÇÃO COM OS FACILITADORES
        var satisfacaofacilitadoresCanvas = $("#satisfacaofacilitadores").get(0).getContext("2d");
        var satisfacaofacilitadores = new Chart(satisfacaofacilitadoresCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacaofacilitadores["pessimo"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Péssimo"
            },
            {
                value: <?php echo $satisfacaofacilitadores["ruim"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacaofacilitadores["regular"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "Regular"
            },
            {
                value: <?php echo $satisfacaofacilitadores["bom"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Bom"
            },
            {
                value: <?php echo $satisfacaofacilitadores["excelente"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Excelente"
            },
        ];
        satisfacaofacilitadores.Doughnut(PieData, pieOptions);

        //INFRAESTRUTURA
        var infraestruturaCanvas = $("#infraestrutura").get(0).getContext("2d");
        var infraestrutura = new Chart(infraestruturaCanvas);
        var PieData = [
            {
                value: <?php echo $infraestrutura["pessimo"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Pessimo"
            },
            {
                value: <?php echo $infraestrutura["ruim"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Ruim"
            },
            {
                value: <?php echo $infraestrutura["regular"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "Regular"
            },
            {
                value: <?php echo $infraestrutura["bom"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Bom"
            },
            {
                value: <?php echo $infraestrutura["excelente"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Excelente"
            },
        ];
        infraestrutura.Doughnut(PieData, pieOptions);

        //CONHECIMENTO
        var conhecimentoCanvas = $("#conhecimento").get(0).getContext("2d");
        var conhecimento = new Chart(conhecimentoCanvas);
        var PieData = [
            {
                value: <?php echo $conhecimento["atendimento"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "Atendimento Sebrae"
            },
            {
                value: <?php echo $conhecimento["carro"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "Carro de som"
            },
            {
                value: <?php echo $conhecimento["email"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "E-mail MKT"
            },
            {
                value: <?php echo $conhecimento["facebook"]; ?>,
                color: corred,
                highlight: corred,
                label: "Facebook"
            },
            {
                value: <?php echo $conhecimento["instagram"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Instagram"
            },
            {
                value: <?php echo $conhecimento["portal"]; ?>,
                color: corlightblue,
                highlight: corlightblue,
                label: "Portal Sebrae"
            },
            {
                value: <?php echo $conhecimento["radio"]; ?>,
                color: corlime,
                highlight: corlime,
                label: "Rádio"
            },
            {
                value: <?php echo $conhecimento["whatsapp"]; ?>,
                color: corblack,
                highlight: corblack,
                label: "Whatsapp"
            },
            {
                value: <?php echo $conhecimento["outros"]; ?>,
                color: corpurple,
                highlight: corpurple,
                label: "Outros"
            },
        ];
        conhecimento.Doughnut(PieData, pieOptions);

        //PROMOÇÃO NPS
        var fidelizacaoCanvas = $("#fidelizacao").get(0).getContext("2d");
        var fidelizacao = new Chart(fidelizacaoCanvas);
        var PieData = [
            {
                value: <?php echo $promocaonps["10"]; ?>,
                color: coraqua,
                highlight: coraqua,
                label: "10"
            },
            {
                value: <?php echo $promocaonps["9"]; ?>,
                color: corgreen,
                highlight: corgreen,
                label: "9"
            },
            {
                value: <?php echo $promocaonps["8"]; ?>,
                color: coryellow,
                highlight: coryellow,
                label: "8"
            },
            {
                value: <?php echo $promocaonps["7"]; ?>,
                color: corred,
                highlight: corred,
                label: "7"
            },
            {
                value: <?php echo $promocaonps["menor7"]; ?>,
                color: cormaroom,
                highlight: cormaroom,
                label: "Menor que 7"
            },
        ];
        fidelizacao.Doughnut(PieData, pieOptions);
    });
</script>