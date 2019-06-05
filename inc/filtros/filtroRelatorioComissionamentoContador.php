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

    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolheTemRegistro" id="filtroEscolheTemRegistro" value="sim" >
        <label for="filtroEscolheTemRegistro">Registrada:</label>

        <script>
            $(function() {
                $("#divPossuiRegistro").css({visibility: 'hidden',  display: 'none'});
                $("#divEscolheComissaoPaga").css({visibility: 'hidden', display: 'none'});

                $('#filtroEscolheTemRegistro').click (function () {
                    $('#labelPedidosEm').html('Registrada em:');
                    if ($('#filtroEscolheTemRegistro').prop('checked')) {
                        $("#divPossuiRegistro").css({visibility: 'visible', display: 'block'});
                        $("#divEscolheComissaoPaga").css({visibility: 'visible', display: 'block'});
                    }
                    else {
                        $('#labelPedidosEm').html('Pedidos em:');
                        $("#divPossuiRegistro").css({visibility: 'hidden', display: 'none'});
                        $("#divEscolheComissaoPaga").css({visibility: 'hidden', display: 'none'});
                    }
                });

                $("#filtroChkTemRegistro").bootstrapToggle({
                    on: "Sim",
                    off: "N&atilde;o"
                });
            });
        </script>

    </div>

    <div class="col-lg-2" id="divEscolheComissaoPaga">
        <input type="checkbox" name="filtroEscolheComissaoPaga" id="filtroEscolheComissaoPaga" value="sim" >
        <label for="filtroEscolheComissaoPaga">Pago?</label>

        <script>
            $(function() {
                $("#divFiltroComissaoPaga").css({visibility: 'hidden',  display: 'none'});

                $('#filtroEscolheComissaoPaga').click (function () {
                    if ($('#filtroEscolheComissaoPaga').prop('checked'))
                        $("#divFiltroComissaoPaga").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divFiltroComissaoPaga").css({visibility: 'hidden', display: 'none'});
                });

                $("#filtroChkComissaoPaga").bootstrapToggle({
                    on: "Sim",
                    off: "N&atilde;o"
                });
            });
        </script>
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

    <div class="col-lg-2">
        <div >
            <span id="divPossuiRegistro"><input type="checkbox" id="filtroChkTemRegistro" data-onstyle="success" checked="checked"></span>
        </div>
    </div>

    <div class="col-lg-2">
        <div >
            <span id="divFiltroComissaoPaga"><input type="checkbox" id="filtroChkComissaoPaga" data-onstyle="success" checked="checked" data-offstyle="danger"></span>
        </div>
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolhePossuiCartao" id="filtroEscolhePossuiCartao" value="sim" >
        <label for="filtroEscolhePossuiCartao">Possui Cart&atilde;o:</label>
    </div>

</div>
<div class="row form-group">
    <div class="col-lg-2">
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

    <div class="col-lg-1">
        <button name="btnFiltrarContadores" id="btnFiltrarContadores" class="btn btn-primary">Filtrar</button>
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-12">
        <div id="divUsuariosContadores"></div>
    </div>
</div>

<script>
    $('#btnFiltrarContadores').click(function () {
        carregarContadoresRelatorioComissao(0, 50);
    })

</script>
<!--END ROW-->