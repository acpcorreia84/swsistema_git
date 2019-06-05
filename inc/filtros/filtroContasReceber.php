<!-- FILTRO PAGE -->
<!--<form id="frmFiltroCertificado" name="frmFiltroCertificado" method="post" >
-->
<div class="row">
    <div class="col-lg-3">
        Pesquisar Por
    </div>
</div>
<div class="row">
    <div class="col-lg-3" id="divPesquisarPor">
        <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
        <select class="form-control" name="tipo_filtro" id="tipo_filtro" onchange="montarFiltroPesquisarPor(this)">
            <option value="" selected="selected">Selecione um Filtro</option>
            <option value="contas_receber.ID">C&oacute;digo da Conta a Receber</option>
            <option value="contas_receber.CERTIFICADO_ID">C&oacute;digo do Certificado</option>
            <option value="certificado.CLIENTE_ID">C&oacute;digo do Cliente</option>
            <option value="contas_receber.DATA_DOCUMENTO">Data do documento</option>
            <option value="cliente.CPF_CNPJ">CPF</option>
            <option value="cliente.CPF_CNPJ">CNPJ</option>
        </select>
    </div>
    <div class="col-lg-3">
        <button name="btnFiltrarContasReceber" id="btnFiltrarContasReceber" class="btn btn-primary">Pesquisar</button>
    </div>

</div>
<div class="row">
    <div class="col-lg-3">
        Data documento:
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataContasReceber" name="filtroDataContasReceber"/>
        <script>
            // Initialization
            $('#filtroDataContasReceber').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
            // Access instance of plugin
            var dataPk = $('#filtroDataContasReceber').data('datepicker');
            //dataPk.update('minDate', new Date());

            dataAtual = new Date();
            function ResetaData() {
                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
            }
            ResetaData();
        </script>
    </div>
    <div class="col-lg-1">
        <label for="filtroApenasPagas"> <input class="checkbox" type="checkbox" name="filtroApenasPagas" id="filtroApenasPagas" value="true"/> Pagas</label>
    </div>

    <div class="col-lg-4">
        <label for="filtroAguardandoConfirmacao"> <input class="checkbox" type="checkbox" name="filtroAguardandoConfirmacao" id="filtroAguardandoConfirmacao" value="true"/> Aguardando Confirma&ccedil;&atilde;o</label>
    </div>

</div>
<script>
    $('#btnFiltrarContasReceber').click(function () {
        carregaPaginacaoContasReceber();
        carregarContasReceber();
    })

</script>
<!--END ROW-->
<!--<a onclick="ir_para('telaContaReceber.php')" name="edtLimparConsulta" id="edtLimparConsulta" class="btn btn-danger"><i class="fa fa-erase"></i> Limpar Consulta</a>-->

<!--</form>-->
<!-- FIM FILTRO PAGE -->