<div class="row form-group">
    <div class="col-lg-3">
        Produtos
    </div>

    <div class="col-lg-2">
        Pesquisar Por
    </div>
</div>

<div class="row form-group">
    <div class="col-lg-3" id="divFiltroProdutos"></div>

    <div class="col-lg-2" id="divPesquisarPor">
        <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
        <select class="form-control" name="tipo_filtro" id="tipo_filtro" onchange="montarFiltroPesquisarPor(this)">
            <option value="" selected="selected">Selecione um Filtro</option>
            <option value="certificado.ID">Codigo do Certificado</option>
            <option value="certificado.CLIENTE_ID">Codigo do Cliente</option>
            <option value="certificado.PROTOCOLO">Protocolo</option>
            <option value="cliente.CPF_CNPJ" tipocampo="cpf">CPF</option>
            <option value="cliente.CPF_CNPJ" tipocampo="cnpj">CNPJ</option>
        </select>
    </div>
    <div class="col-lg-1">
        <button name="btnFiltrarCertificados" id="btnFiltrarCertificados" class="btn btn-primary">Pesquisar</button>
    </div>

</div>
<!--FILTROS DE PRODUTOS-->
<div class="row form-group">
    <div class="col-lg-12">
        <div id="divFiltroProdutosCertificados"></div>
    </div>
</div>


<div class="row form-group">
    <div class="col-lg-3">
        <label>Dt.<span id="spanTipoData">Compra</span></label>
        <span class="maisOpcoes" data-toggle="popover" data-mysettings="#someid" data-original-title="Tipo da data"> <i class="fa fa-bars"></i></span>
        <fieldset id="someid" style="display: none">
            <select id='selectTipoData' class="form-control">
                <option value=''>Escolha o tipo da Data do Filtro</option>
                <option value='Pagamento'>Pagamento</option>
                <option value='Compra'>Compra</option>
                <option value='Valida&ccedil;&atilde;o'>Valida&ccedil;&atilde;o</option>
                <option value='Vencimento'>Vencimento</option>
            </select>
        </fieldset>
        <script>
            var $popoversettings = $('.maisOpcoes').popover({
                html: true,
                placement: 'right',
                content: function () {
                    var mySettings = $(this).data('mysettings');
                    return $(mySettings).html();
                }
            });


            $(':not(#anything)').on('click', function (e) {
                $popoversettings.each(function () {
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                        // before hide update original elements

                        $(this).popover('hide');
                        return;
                    }
                });
            });


            $(document).on('change', '#selectTipoData', function () {
                $('#spanTipoData').html($('#selectTipoData option:selected').val());
            }).change();
        </script>

    </div>
    <div class="col-lg-3">
        Consultores
    </div>
    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolhePago" id="filtroEscolhePago" value="sim" >
        <label for="filtroEscolhePago">Pagos?</label>
    </div>

    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolheValidado" id="filtroEscolheValidado" value="sim" >
        <label for="filtroEscolheValidado">Validados?</label>

    </div>



</div>
<div class="row form-group">
    <div class="col-lg-3">

        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataCompraCertificado" name="filtroDataCompraCertificado"/>
        <script>
            // Initialization
            $('#filtroDataCompraCertificado').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
            // Access instance of plugin
            var dataPk = $('#filtroDataCompraCertificado').data('datepicker');
            //dataPk.update('minDate', new Date());

            dataAtual = new Date();
            function ResetaData() {
                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
            }
            ResetaData();
        </script>
    </div>

    <div class="col-lg-3">
        <div id="divFiltroConsultores"></div>
    </div>

    <div class="col-lg-2">
        <div id="divFiltroEscolhePagoNaoPago">
            <input checked="checked" type="checkbox" id="filtroChkPagoNaoPago" name="filtroChkPagoNaoPago" data-onstyle="success" data-offstyle="danger" class="datepicker-here form-control oculto">
        </div>
        <script>

            $(function() {

                $('#filtroEscolhePago').click (function () {
                    if ($('#filtroEscolhePago').prop('checked'))
                        $("#divFiltroEscolhePagoNaoPago").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divFiltroEscolhePagoNaoPago").css({visibility: 'hidden',  display: 'none'});
                });

                $("#filtroChkPagoNaoPago").bootstrapToggle({
                    on: "Pagos",
                    off: "N&atilde;o Pagos"
                });
                $("#divFiltroEscolhePagoNaoPago").css({visibility: 'hidden', display: 'none'});

            });
        </script>
    </div>



    <div class="col-lg-2">
        <div id="divFiltroEscolheValidados">
            <input type="checkbox" id="filtroChkApenasValidados" data-onstyle="success" data-offstyle="danger" checked="checked">
        </div>
        <script>
            $(function() {

                $('#filtroEscolheValidado').click (function () {
                    if ($('#filtroEscolheValidado').prop('checked'))
                        $("#divFiltroEscolheValidados").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divFiltroEscolheValidados").css({visibility: 'hidden',  display: 'none'});
                });


                $("#filtroChkApenasValidados").bootstrapToggle({
                    on: "Validados",
                    off: "N&atilde;o Validados"
                });

                $("#divFiltroEscolheValidados").css({visibility: 'hidden', display: 'none'});

            });
        </script>
    </div>

</div>
<div class="row form-group">
    <div class="col-lg-2" >Forma Pagto.</div>
</div>
<div class="row form-group">
    <div class="col-lg-2" id="divFiltroFormaPagamentos"></div>
</div>
<div class="row">
    <div class="col-lg-12" id="divUsuariosCertificados"></div>
</div>

<script>
    $('#btnFiltrarCertificados').click(function () {
        carregarCertificados(undefined,undefined,undefined,'sim');
    })

</script>
<!-- FIM FILTRO PAGE -->