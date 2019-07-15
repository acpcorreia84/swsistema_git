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

    <div class="col-lg-3 form-inline">
        <input type="checkbox" name="filtroEscolheDataCadastroContador" id="filtroEscolheDataCadastroContador" value="sim" >
        <label for="filtroEscolheDataCadastroContador"> Data do cadastro:</label>
    </div>

    <div class="col-lg-3">
        <input type="checkbox" name="filtroEscolheRecebeComissao" id="filtroEscolheRecebeComissao" value="Sim" data-onstyle="success" data-offstyle="danger">
        <label for="filtroEscolheRecebeComissao">Comiss&atilde;o?</label>
        <script>
            $(function() {
                $("#divRecebeComissao").css({visibility: 'hidden',  display: 'none'});

                $('#filtroEscolheRecebeComissao').click (function () {
                    if ($('#filtroEscolheRecebeComissao').prop('checked'))
                        $("#divRecebeComissao").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divRecebeComissao").css({visibility: 'hidden', display: 'none'});
                });

                $("#filtroChkRecebeComissao").bootstrapToggle({
                    on: "Sim",
                    off: "N&atilde;o"
                });
            });
        </script>
    </div>

    <div class="col-lg-3">
        <input type="checkbox" name="filtroEscolheConcedeDesconto" id="filtroEscolheConcedeDesconto" value="Sim" data-onstyle="success" data-offstyle="danger">
        <label for="filtroEscolheConcedeDesconto">Desconto? </label>
        <script>
            $(function() {
                $("#divConcedeDesconto").css({visibility: 'hidden', display: 'none'});

                $('#filtroEscolheConcedeDesconto').click (function () {
                    if ($('#filtroEscolheConcedeDesconto').prop('checked'))
                        $("#divConcedeDesconto").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divConcedeDesconto").css({visibility: 'hidden', display: 'none'});
                });

                $("#filtroChkConcedeDesconto").bootstrapToggle({
                    on: "Sim",
                    off: "N&atilde;o"
                });
            });
        </script>
    </div>

    <div class="col-lg-3">
        <input type="checkbox" name="filtroEscolheTemComissao" id="filtroEscolheTemComissao" value="Sim" data-onstyle="success" data-offstyle="danger">
        <label for="filtroEscolheTemComissao">Pedidos em: </label>
        <script>
            $(function() {
                $("#divPossuiComissao").css({visibility: 'hidden', display: 'none'});

                $('#filtroEscolheTemComissao').click (function () {
                    if ($('#filtroEscolheTemComissao').prop('checked'))
                        $("#divPossuiComissao").css({visibility: 'visible', display: 'block'});
                    else
                        $("#divPossuiComissao").css({visibility: 'hidden', display: 'none'});
                });
            });
        </script>
    </div>
</div>
<div class="row form-group">


    <div class="col-lg-3 ">
        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataCadastroContador" name="filtroDataCadastroContador"/>
        <script>
            $("#filtroDataCadastroContador").css({visibility: 'hidden', display: 'none'});

            $('#filtroEscolheDataCadastroContador').click (function () {
                if ($('#filtroEscolheDataCadastroContador').prop('checked'))
                    $("#filtroDataCadastroContador").css({visibility: 'visible', display: 'block'});
                else
                    $("#filtroDataCadastroContador").css({visibility: 'hidden',  display: 'none'});
            });
            // Initialization
            $('#filtroDataCadastroContador').datepicker({language:"pt-BR", range:'true'});
            // Access instance of plugin
            var dataPk = $('#filtroDataCadastroContador').data('datepicker');
            //dataPk.update('minDate', new Date());

            dataAtual = new Date();
            function ResetaData() {
                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
            }
            ResetaData();
        </script>
    </div>

    <div class="col-lg-3">
        <span id="divRecebeComissao"><input type="checkbox" id="filtroChkRecebeComissao" data-onstyle="success" checked="checked"></span>
    </div>

    <div class="col-lg-3">
        <span id="divConcedeDesconto"><input type="checkbox" id="filtroChkConcedeDesconto" data-onstyle="success" checked="checked"></span>
    </div>

    <div class="col-lg-3">
        <div id="divPossuiComissao">
            <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataComissaoContador" name="filtroDataComissaoContador"/>
            <script>
                // Initialization
                $('#filtroDataComissaoContador').datepicker({language:"pt-BR", range:'true'});

                // Access instance of plugin
                var dataComissaoContador = $('#filtroDataComissaoContador').data('datepicker');

                //dataPk.update('minDate', new Date());

                dataAtual = new Date();
                dataComissaoContador.selectDate([new Date(dataAtual.getFullYear(),(dataAtual.getMonth()-1),'01'), new Date(dataAtual.getFullYear(),(dataAtual.getMonth()-1),<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);
            </script>
        </div>
    </div>

</div>
<div class="row form-group">
    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolhePossuiCartao" id="filtroEscolhePossuiCartao" value="sim" >
        <label for="filtroEscolhePossuiCartao">Possui Cart&atilde;o:</label>
    </div>
    <div class="col-lg-2">
        <input type="checkbox" name="filtroEscolheSyncSafe" id="filtroEscolheSyncSafe" value="sim" >
        <label for="filtroEscolheSyncSafe">Sincronizado</label>
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-2">
        <span id="divPossuiCartao"><input type="checkbox" id="filtroPossuiCartao" data-onstyle="success" checked="checked"></span>
    </div>

    <div class="col-lg-2">
        <span id="divSyncSafe"><input type="checkbox" id="filtroSyncSafe" data-onstyle="success" checked="checked"></span>
    </div>

    <script>
        $("#divSyncSafe").css({visibility: 'hidden', display: 'none'});

        $('#filtroEscolheSyncSafe').click (function () {
            if ($('#filtroEscolheSyncSafe').prop('checked'))
                $("#divSyncSafe").css({visibility: 'visible', display: 'block'});
            else
                $("#divSyncSafe").css({visibility: 'hidden', display: 'none'});
        });


        $("#filtroSyncSafe").bootstrapToggle({
            on: "Sim",
            off: "N&atilde;o"
        });

    </script>

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
        <button name="btnFiltrarContadores" id="btnFiltrarContadores" class="btn btn-primary">Pesquisar</button>
    </div>



</div>
<div class="row form-group">
    <div class="col-lg-12">
        <div id="divUsuariosContadores"></div>
    </div>
</div>

<script>
    $('#btnFiltrarContadores').click(function () {
        carregarContadores(0, 50, '', 'sim');
    })

</script>
<!--END ROW-->