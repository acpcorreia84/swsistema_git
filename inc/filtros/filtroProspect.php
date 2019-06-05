<!-- FILTRO PAGE -->


<form name="form" action="" method="get" >
    <div class="row form-group">
        <?
        $arrFiltroTipo = array("cobranca" => "Cobrancas", "renovacao" => "Renovacoes", "contador" => "Contadores");
        $arrFiltroContactado = array("sim" => "SIM", "nao" => "NAO");
        $arrFiltroDetalhe = array("todos" => "TODOS", "entre_datas" => "ENTRE DATAS");
        if($_GET['filtro_tipo']) {
            $filtrosSelecionados = '';
            if ($_GET['filtro_tipo']) $filtrosSelecionados = 'Tipo Prospect: '.$arrFiltroTipo[$_GET['filtro_tipo']];
            if ($_GET['filtro_contactado']) $filtrosSelecionados .= ' | ' .'Contactado: '. $arrFiltroContactado[$_GET['filtro_contactado']];
            if ($_GET['filtro_detalhe']) $filtrosSelecionados .= ' | '. $arrFiltroDetalhe[$_GET['filtro_detalhe']];
            if ($_GET['filtro_datas'] && $_GET['filtro_detalhe']=='entre_datas') $filtrosSelecionados .= ' | '.$_GET['filtro_datas'];
         ?>
             <div class="col-lg-8" id="teste">Filtro de <?=strtoupper($filtrosSelecionados);?> <a href="telaProspect.php" name="edtLimparConsulta" id="edtLimparConsulta" class="btn btn-danger"><i class="fa fa-erase"></i> Limpar Consulta</a></div>
        <? } else {?>

            <div class="col-lg-3" >
                <select class="form-control" id="filtro_tipo" name="filtro_tipo" onchange="efeito_filtro_prospect(this, document.getElementById('filtro_detalhe'));">
                    <option value="" selected="selected">Selecione um Filtro</option>
                    <option value="cobranca">Cobran&ccedil;a</option>
                    <!--<option value="cobranca3">Cobran&ccedil;a (Restam 3 dias)</option>-->
                    <option value="renovacao">Renova&ccedil;&atilde;o</option>
                    <option value="contador">Contador Carterizado</option>
                    <!--<option value="contadorSemIndicacao">Contador sem Indica&ccedil;&atilde;o</option>-->
                    <!--<option value="validadoNaoPago">Validado e n&atilde;o pago</option>-->
                </select>
            </div>

            <div class="col-lg-2" >
                <select class="form-control" id="filtro_contactado" name="filtro_contactado" onchange="efeito_filtro_prospect(document.getElementById('filtro_tipo'), this,document.getElementById('filtro_contactado'));">
                    <option value="sim" >J&aacute; Contactado</option>
                    <option value="nao" selected="selected">Para Contactar</option>
                </select>
            </div>

            <div class="col-lg-2 oculto" id="div_filtro_detalhe">
                <select class="form-control " id="filtro_detalhe" name="filtro_detalhe" onchange="efeito_filtro_prospect(document.getElementById('filtro_tipo'),this );">
                    <option value="todos" selected="selected">Todos</option>
                    <option value="entre_datas">Entre Datas</option>
                </select>
            </div>

            <div class="col-lg-2 oculto" id="div_datas">
                <input type='text' class="datepicker-here form-control" data-position="right top" id="datap" name="filtro_datas"/>
                <script>
                    // Initialization
                    $('#datap').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
                    // Access instance of plugin
                    var dataPk = $('#datap').data('datepicker');
                    //dataPk.update('minDate', new Date());

                    dataAtual = new Date();
                    function ResetaData() {
                        dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
                    }
                    ResetaData();
                </script>
            </div>


            <div class="col-lg-3" id="div_btn_filtro">
                <input type="submit" name="btnConsultar" id="btnConsultar" class="btn btn-primary " value="Consultar">
            </div>
    </div>

    <div class="row form-group">
        <div class="col-lg-3">
            Consultores
        </div>

    </div>

    <div class="row form-group">
        <div class="col-lg-3">
            <div id="divFiltroConsultores"></div>
        </div>

    </div>

    <? }?>


</form>


<!-- FIM FILTRO PAGE -->