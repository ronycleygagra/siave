<script>
    document.filtros.di.value = '<?php echo $_POST ["di"]; ?>';
    document.filtros.df.value = '<?php echo $_POST ["df"]; ?>';
    //document.filtros.butimprimir.disabled = false;
    //document.filtros.comentario.disabled = false;
</script>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <p class="title-resultado">Resultado da pesquisa:</p>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Aplicabilidade</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="aplicabilidade" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> Ótimo</li>
                    <li><i class="fa fa-circle-o text-green"></i> Bom</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Regular</li>
                    <li><i class="fa fa-circle-o text-red"></i> Ruim</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Satisfação</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="satisfacao" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> Ótimo</li>
                    <li><i class="fa fa-circle-o text-green"></i> Bom</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Regular</li>
                    <li><i class="fa fa-circle-o text-red"></i> Ruim</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Infraestrutura</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="infraestrutura" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> Ótimo</li>
                    <li><i class="fa fa-circle-o text-green"></i> Bom</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Regular</li>
                    <li><i class="fa fa-circle-o text-red"></i> Ruim</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Credenciado</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="credenciado" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> Ótimo</li>
                    <li><i class="fa fa-circle-o text-green"></i> Bom</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Regular</li>
                    <li><i class="fa fa-circle-o text-red"></i> Ruim</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Conhecimento</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="conhecimento" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> Mala direta</li>
                    <li><i class="fa fa-circle-o text-green"></i> Rádio</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Jornal</li>
                    <li><i class="fa fa-circle-o text-black"></i> Internet</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Central de Relacionamento</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> E-mail</li>
                    <li><i class="fa fa-circle-o text-lime"></i> Telemarketin</li>
                    <li><i class="fa fa-circle-o text-maroon"></i> Recepção</li>
                    <li><i class="fa fa-circle-o text-purple"></i> Outros</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="box-resultado">
            <span>Fidelização</span>
            <div class="col-xs-12 col-md-7">
                <canvas id="fidelizacao" style="height:250px"></canvas>
            </div>
            <div class="col-xs-12 col-md-5">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-aqua"></i> 10</li>
                    <li><i class="fa fa-circle-o text-green"></i> 9</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> 8</li>
                    <li><i class="fa fa-circle-o text-red"></i> 7</li>
                    <li><i class="fa fa-circle-o text-purple"></i> < 7</li>
                </ul>
            </div>
        </div>
    </div>
</div>