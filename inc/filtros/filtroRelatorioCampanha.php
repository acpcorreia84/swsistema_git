<div class="row form-group">
<!--    <div class="col-lg-3">
        <label>Pesquisar Por</label>
    </div>
-->
    <div class="col-lg-3">
        <label>Filtro Consultores:</label>
    </div>

</div>
<div class="row form-group">
    <?PHP /*
    <div class="col-lg-3" id="divPesquisarPor">
        <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
        <select class="form-control" name="tipo_filtro" id="tipo_filtro" onchange="montarFiltroPesquisarPor(this)">
            <option value="" selected="selected">Selecione um Filtro</option>
            <option value="contador.ID">Id do contador</option>
            <option value="contador.COD_CONTADOR">C&oacute;digo do Contador</option>
            <option value="contador.NOME">Nome do Contador</option>
            <option value="contador.RAZAO_SOCIAL">Raz&atilde;o Social do Escrit&aacute;rio</option>
            <option value="contador.NOME_FANTASIA">Nome Fantasia do Escrit&aacute;rio</option>
            <option value="contador.CELULAR">Celular</option>
            <option value="contador.CPF" tipocampo="cpf">CPF</option>
            <option value="contador.CNPJ" tipocampo="cnpj">CNPJ</option>
        </select>
    </div>*/
    ?>

    <div class="col-lg-3">
        <div id="divFiltroConsultores"></div>
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-3">
        <label id='labelPedidosEm'>Pedidos em:</label>
    </div>





</div>

<div class="row form-group">
    <div class="col-lg-3">
        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroPeriodoCampanha" name="filtroPeriodoCampanha"/>
        <script>
            // Initialization
            $('#filtroPeriodoCampanha').datepicker({language:"pt-BR", range:'true'});
            // Access instance of plugin
            var dataPk = $('#filtroPeriodoCampanha').data('datepicker');
            //dataPk.update('minDate', new Date());

            dataAtual = new Date();
            function ResetaData() {
                var dataAtualMais15 = new Date();
                dataAtualMais15.setTime(dataAtualMais15.getTime() +  (21 * 24 * 60 * 60 * 1000));
                dataPk.selectDate([dataAtual, dataAtualMais15]);
            }
            ResetaData();
        </script>
    </div>


</div>

<div class="row form-group">
    <div class="col-lg-1">
        <button name="btnFiltrarRelatorioCampanha" id="btnFiltrarRelatorioCampanha" class="btn btn-primary">Filtrar</button>
    </div>
    <div class="col-lg-1">
        <button name="btnExportar" id="btnExportar" class="btn btn-warning"><i class="glyphicon glyphicon-cloud-download"></i> Exportar</button>
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-12">
        <div id="divUsuariosContadores"></div>
    </div>
</div>


<form id="frmExportar" method="post" target="_blank" action="exportarRelatorioCampanha.php">
    <input type="hidden" name="dadosPlanilha" id="dadosPlanilha"/>
</form>


<script>
    $('#btnFiltrarRelatorioCampanha').click(function () {
        carregarDadosCampanha();
    })

    $('#btnExportar').click(function () {
        frmExportar.submit();

    })

</script>
<!--END ROW-->

<input type="hidden" id="usuarioLogadoId" name="usuarioLogadoId" value="<?=$usuarioLogado->getId()?>">