<div class="panel panel-default collapse" id="divFiltrosIndicadores">
    <div class="panel-body bg-info">
        <button type="button" class="close" data-toggle="collapse" data-target="#divFiltrosIndicadores"><span aria-hidden="true">&times;</span></button>
        <div class="row">
            <div class="col-lg-3">
                <label for="filtroDataRenovacao">Per&iacute;odo:</label>
            </div>
            <div class="col-lg-3">
                Consultores
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroPeriodoGraficos" name="filtroPeriodoGraficos"/>
                <script>
                    // Initialization
                    $('#filtroPeriodoGraficos').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
                    // Access instance of plugin
                    var dataPk = $('#filtroPeriodoGraficos').data('datepicker');
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

            <div class="col-lg-1">
                <button name="btnFiltrarCertificados" id="btnFiltrarCertificados" class="btn btn-primary">Pesquisar</button>
            </div>

            <script>
                $('#btnFiltrarCertificados').click(function () {
                    carregarFiltrosCertificados();
                    carregarGraficoRenovacoes();
                    carregarGraficosPedidos('nao');

                    /*
                     * LIMPA GRAFICOS
                     * */
                    $('#graficoContadores').html('');
                    $('#btnCarregarContadores').css({visibility:'visible', display:'block'});
                    $('#totalContadores').css({visibility:'hidden', display:'none'});
                })
            </script>
        </div>



    </div>

    <div class="panel-footer">

        <div class="row">
            <div class="col-lg-12" id="divUsuariosCertificados"></div>

        </div>
    </div>
</div>