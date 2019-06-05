<div class="modal fade" role="dialog" id="modalHomeListarCertificados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modalHomeListarCertificados" ><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-check fa-lg" aria-hidden="true"></i> Lista de Certificados Renovados <button class="btn btn-primary" title="Recarregar lista de certificados" onclick="carregarListaCertificadosRenovados()"><i class="fa fa-refresh" aria-hidden="true"></i></button><span id="spanTipoLista"></span></h3>
            </div>

            <div class="modal-body">
                <div class="panel-group" id="acordionlistaCertificadosRenovacao">

                    <!--CERTIFICADOS VENCIDOS-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#listaCertificadosRenovacao1" style="color: black">
                                    <i class="fa fa-circle" aria-hidden="true"> Certificados Vencidos</i>
                                </a>
                                <div class="alinharTituloDireitaBox" id="numerosCdsVencidos"></div>
                            </h4>
                        </div>
                        <div id="listaCertificadosRenovacao1" class="panel-collapse collapse">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosVencidosListar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS VENCIDOS-->

                    <!--CERTIFICADOS A RENOVAR SEM PEDIDOS-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#listaCertificadosRenovacao5" style="color: #960018">
                                    <i class="fa fa-circle" aria-hidden="true"></i> Certificados a Renovar Sem Pedidos
                                </a>
                                <div class="alinharTituloDireitaBox" id="numerosCdsARenovarSemPedidos"></div>
                            </h4>
                        </div>
                        <div id="listaCertificadosRenovacao5" class="panel-collapse collapse">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosARenovarSemPedidos"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS RENOVADOS-->


                    <!--CERTIFICADOS A RENOVAR EM ABERTO-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#listaCertificadosRenovacao2" style="color: #E23D28">
                                    <i class="fa fa-circle" aria-hidden="true"> Certificados A Renovar em Aberto</i>
                                </a>
                                <div class="alinharTituloDireitaBox" id="numerosCdsARenovarEmAberto"></div>
                            </h4>
                        </div>
                        <div id="listaCertificadosRenovacao2" class="panel-collapse collapse">

                            <div class="row" >
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosARenovarEmAbertoListar"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS A RENOVAR EM ABERTO-->

                    <!--CERTIFICADOS A RENOVAR PAGOS-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#listaCertificadosRenovacao3" style="color: #22ff91">
                                    <i class="fa fa-circle" aria-hidden="true"> Certificados A Renovar Pagos</i>
                                </a>
                                <div class="alinharTituloDireitaBox" id="numerosCdsARenovarPagos"></div>
                            </h4>
                        </div>
                        <div id="listaCertificadosRenovacao3" class="panel-collapse collapse">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosARenovarPagosListar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS A RENOVAR PAGOS-->

                    <!--CERTIFICADOS RENOVADOS-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#listaCertificadosRenovacao4" style="color: #33cc33">
                                    <i class="fa fa-circle" aria-hidden="true"> Certificados Renovados</i>
                                </a>
                                <div class="alinharTituloDireitaBox" id="numerosCdsRenovados"></div>
                            </h4>
                        </div>
                        <div id="listaCertificadosRenovacao4" class="panel-collapse collapse">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosRenovadosListar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS RENOVADOS-->

                </div>
            </div>

        </div>
    </div>
</div>