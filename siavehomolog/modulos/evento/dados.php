<?php
require './Evento.class.php';

$ev = new Evento($_POST ["codevento"]);
$aplicabilidade = $ev->aplicabilidade();
$satisfacao = $ev->satisfacao();
$infraestrutura = $ev->infraestrutura();
$credenciado = $ev->credenciado();
$conhecimento = $ev->conhecimento();
$fidelizacao = $ev->fidelizacao();
?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var aplicabilidadeCanvas = $("#aplicabilidade").get(0).getContext("2d");
        var aplicabilidade = new Chart(aplicabilidadeCanvas);
        var PieData = [
            {
                value: <?php echo $aplicabilidade["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Ruim"
            },
            {
                value: <?php echo $aplicabilidade["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $aplicabilidade["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $aplicabilidade["otimo"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Ótimo"
            },
        ];

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
        aplicabilidade.Doughnut(PieData, pieOptions);

        var satisfacaoCanvas = $("#satisfacao").get(0).getContext("2d");
        var satisfacao = new Chart(satisfacaoCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacao["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacao["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $satisfacao["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $satisfacao["otimo"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Ótimo"
            },
        ];

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
        satisfacao.Doughnut(PieData, pieOptions);

        var infraestruturaCanvas = $("#infraestrutura").get(0).getContext("2d");
        var infraestrutura = new Chart(infraestruturaCanvas);
        var PieData = [
            {
                value: <?php echo $infraestrutura["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Não se aplica"
            },
            {
                value: <?php echo $infraestrutura["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $infraestrutura["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $infraestrutura["otimo"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Ótimo"
            },
        ];

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
        infraestrutura.Doughnut(PieData, pieOptions);

        var credenciadoCanvas = $("#credenciado").get(0).getContext("2d");
        var credenciado = new Chart(credenciadoCanvas);
        var PieData = [
            {
                value: <?php echo $credenciado["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Não se aplica"
            },
            {
                value: <?php echo $credenciado["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $credenciado["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $credenciado["otimo"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Ótimo"
            },
        ];

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
        credenciado.Doughnut(PieData, pieOptions);

        var conhecimentoCanvas = $("#conhecimento").get(0).getContext("2d");
        var conhecimento = new Chart(conhecimentoCanvas);
        var PieData = [
            {
                value: <?php echo $conhecimento["maladireta"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Mala direta"
            },
            {
                value: <?php echo $conhecimento["radio"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Rádio"
            },
            {
                value: <?php echo $conhecimento["jornal"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Jornal"
            },
            {
                value: <?php echo $conhecimento["internet"]; ?>,
                color: "#111",
                highlight: "#111",
                label: "Internet"
            },
            {
                value: <?php echo $conhecimento["central"]; ?>,
                color: "#d2d6de",
                highlight: "#d2d6de",
                label: "Central de Relacionamento"
            },
            {
                value: <?php echo $conhecimento["email"]; ?>,
                color: "#3c8dbc",
                highlight: "#3c8dbc",
                label: "E-mail"
            },
            {
                value: <?php echo $conhecimento["telemarketing"]; ?>,
                color: "#01ff70",
                highlight: "#01ff70",
                label: "Telemarketing"
            },
            {
                value: <?php echo $conhecimento["recepcao"]; ?>,
                color: "#d81b60",
                highlight: "#d81b60",
                label: "Recepção"
            },
            {
                value: <?php echo $conhecimento["outros"]; ?>,
                color: "#605ca8",
                highlight: "#605ca8",
                label: "Outros"
            },
        ];

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
        conhecimento.Doughnut(PieData, pieOptions);

        var fidelizacaoCanvas = $("#fidelizacao").get(0).getContext("2d");
        var fidelizacao = new Chart(fidelizacaoCanvas);
        var PieData = [
            {
                value: <?php echo $fidelizacao["10"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "10"
            },
            {
                value: <?php echo $fidelizacao["9"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "9"
            },
            {
                value: <?php echo $fidelizacao["8"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "8"
            },
            {
                value: <?php echo $fidelizacao["7"]; ?>,
                color: "#dd4b39",
                highlight: "#dd4b39",
                label: "7"
            },
            {
                value: <?php echo $fidelizacao["menor7"]; ?>,
                color: "#605ca8",
                highlight: "#605ca8",
                label: "Menor que 7"
            },
        ];

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
        fidelizacao.Doughnut(PieData, pieOptions);
    });
</script>