<div class="row form-group">
    <div class="col-lg-3">
        <label>Pesquisar Por</label>
    </div>

    <div class="col-lg-3">
        <label>Filtro Consultores:</label>
    </div>

</div>
<div class="row form-group">
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
    </div>

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
        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroPeriodoComissao" name="filtroPeriodoComissao"/>
        <script>
            // Initialization
            $('#filtroPeriodoComissao').datepicker({language:"pt-BR", range:'true'});
            // Access instance of plugin
            var dataPk = $('#filtroPeriodoComissao').data('datepicker');
            //dataPk.update('minDate', new Date());

            dataAtual = new Date();
            function ResetaData() {
                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);
            }
            ResetaData();
        </script>
    </div>


</div>

<!--<div class="row form-group">
    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolhePossuiCartao" id="filtroEscolhePossuiCartao" value="sim" >
        <label for="filtroEscolhePossuiCartao">Possui Cart&atilde;o:</label>
    </div>

</div>-->
<div class="row form-group">
<!--    <div class="col-lg-2">
        <span id="divPossuiCartao"><input type="checkbox" id="filtroPossuiCartao" data-onstyle="success" checked="checked"></span>
    </div>

    <script>
        $("#divPossuiCartao").css({visibility: 'hidden', display: 'none'});

        $('#filtroEscolhePossuiCartao').click (function () {
            if ($('#filtroEscolhePossuiCartao').prop('checked'))
                $("#divPossuiCartao").css({visibility: 'visible', display: 'block'});
            else
                $("#divPossuiCartao").css({visibility: 'hidden', display: 'none'});
        });


        $("#filtroPossuiCartao").bootstrapToggle({
            on: "Sim",
            off: "N&atilde;o"
        });

    </script>
-->
    <div class="col-lg-1">
        <button name="btnFiltrarContadores" id="btnFiltrarContadores" class="btn btn-primary">Filtrar</button>
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


<form id="frmExportar" method="post" target="_blank" action="exportarRelatorioContadores.php">
    <input type="hidden" name="dadosPlanilha" id="dadosPlanilha"/>
</form>


<script>
    $('#btnFiltrarContadores').click(function () {
        carregarRelatorioComissaoGeralMensalContadores();
    })

    $('#btnExportar').click(function () {
        frmExportar.submit();

    })

</script>
<!--END ROW-->

<input type="hidden" id="usuarioLogadoId" name="usuarioLogadoId" value="<?=$usuarioLogado->getId()?>">