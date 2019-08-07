<?php
require './projetos.php';
require './Agencia.class.php';

$em = new Empretec($_POST ["di"], $_POST ["df"], $_POST ["codagencia"],$projetosagencia);
$satisfacaoEvento = $em->satisfacaoEvento();
$satisfacaoSelecionador = $em->satisfacaoSelecionador();
$satisfacaoFacilitador = $em->satisfacaoFacilitador();
$infraestrutura = $em->infraestrutura();
$aplicabilidade = $em->aplicabilidade();
$promocaoNps = $em->promocaoNps();
?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var satisfacaoEventoCanvas = $("#satisfacaoEvento").get(0).getContext("2d");
        var satisfacaoEvento = new Chart(satisfacaoEventoCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacaoEvento["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacaoEvento["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $satisfacaoEvento["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $satisfacaoEvento["otimo"]; ?>,
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
        satisfacaoEvento.Doughnut(PieData, pieOptions);
		//--------------------
        var satisfacaoSelecionadorCanvas = $("#satisfacaoSelecionador").get(0).getContext("2d");
        var satisfacaoSelecionador = new Chart(satisfacaoSelecionadorCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacaoSelecionador["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Ruim"
            },
            {
                value: <?php echo $satisfacaoSelecionador["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $satisfacaoSelecionador["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $satisfacaoSelecionador["otimo"]; ?>,
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
        satisfacaoSelecionador.Doughnut(PieData, pieOptions);
		//--------------------
        var satisfacaoFacilitadorCanvas = $("#satisfacaoFacilitador").get(0).getContext("2d");
        var satisfacaoFacilitador = new Chart(satisfacaoFacilitadorCanvas);
        var PieData = [
            {
                value: <?php echo $satisfacaoFacilitador["ruim"]; ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Não se aplica"
            },
            {
                value: <?php echo $satisfacaoFacilitador["bom"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Bom"
            },
            {
                value: <?php echo $satisfacaoFacilitador["regular"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Regular"
            },
            {
                value: <?php echo $satisfacaoFacilitador["otimo"]; ?>,
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
        satisfacaoFacilitador.Doughnut(PieData, pieOptions);
		//--------------------
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
		//--------------------
        var aplicabilidadeCanvas = $("#aplicabilidade").get(0).getContext("2d");
        var aplicabilidade = new Chart(aplicabilidadeCanvas);
        var PieData = [
            {
                value: <?php echo $aplicabilidade["maladireta"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Mala direta"
            },
            {
                value: <?php echo $aplicabilidade["radio"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Rádio"
            },
            {
                value: <?php echo $aplicabilidade["jornal"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Jornal"
            },
            {
                value: <?php echo $aplicabilidade["internet"]; ?>,
                color: "#111",
                highlight: "#111",
                label: "Internet"
            },
            {
                value: <?php echo $aplicabilidade["central"]; ?>,
                color: "#d2d6de",
                highlight: "#d2d6de",
                label: "Central de Relacionamento"
            },
            {
                value: <?php echo $aplicabilidade["email"]; ?>,
                color: "#3c8dbc",
                highlight: "#3c8dbc",
                label: "E-mail"
            },
            {
                value: <?php echo $aplicabilidade["telemarketing"]; ?>,
                color: "#01ff70",
                highlight: "#01ff70",
                label: "Telemarketing"
            },
            {
                value: <?php echo $aplicabilidade["recepcao"]; ?>,
                color: "#d81b60",
                highlight: "#d81b60",
                label: "Recepção"
            },
            {
                value: <?php echo $aplicabilidade["outros"]; ?>,
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
        aplicabilidade.Doughnut(PieData, pieOptions);
		//--------------------
        var promocaoNpsCanvas = $("#promocaoNps").get(0).getContext("2d");
        var promocaoNps = new Chart(promocaoNpsCanvas);
        var PieData = [
            {
                value: <?php echo $promocaoNps["10"]; ?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "10"
            },
            {
                value: <?php echo $promocaoNps["9"]; ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "9"
            },
            {
                value: <?php echo $promocaoNps["8"]; ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "8"
            },
            {
                value: <?php echo $promocaoNps["7"]; ?>,
                color: "#dd4b39",
                highlight: "#dd4b39",
                label: "7"
            },
            {
                value: <?php echo $promocaoNps["menor7"]; ?>,
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
        promocaoNps.Doughnut(PieData, pieOptions);

    });
</script>