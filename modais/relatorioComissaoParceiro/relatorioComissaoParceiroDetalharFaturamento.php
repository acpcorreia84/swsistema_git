<div id="detalharFaturamento" class="modal modal-wide fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-11">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar <span id="spanTituloModal"></span> </h3>
                    <input type="hidden" name="idParceiro" id="idParceiro">
                </div>
                <div class ="col-lg-1">
                    <h3>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#detalharFaturamento"><i class="fa fa-lg fa-close"></i></a>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Parceiro: <span id="dpSpanIdParceiro">...</span></h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-12">
                                Emitido por: <?=$usuarioLogado->getNome();?>
                            </div>

                            <div class="col-lg-6">
                                <p>Periodo da Consulta: <span id="dpSpanPeriodo">...</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Data da Emiss&atilde;o: <?=date('d/m/Y h:i')?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h4>Certificados:</h4>
                        <div class="table table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td align="center"><b>COD</b></td>
                                    <!--<td align="center" class="style1"><b>STATUS</b></td>-->
                                    <td align="center"><b>DATA PGT</b></td>
                                    <td align="center"><b>PROTO</b></td>
                                    <td align="center"><b>CLIENTE</b></td>
                                    <td align="center"><b>DATA COMPRA</b></td>
                                    <td align="center"><b>TIPO CD</b></td>
                                    <td align="center"><b>VENDEDOR</b></td>
                                    <td align="center"><b>AGR</b></td>
                                    <td align="center"><b>LOCAL</b></td>
                                    <td align="center"><b>SITUA&Ccedil;&Atilde;O</b></td>
                                    <td align="center"><b>VALOR</b></td>
                                </tr>
                                </thead>
                                <tbody id="dfTableFaturamento">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!--DIV CLASS row-->
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharParceiro-->
