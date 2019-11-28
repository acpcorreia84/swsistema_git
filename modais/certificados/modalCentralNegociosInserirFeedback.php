<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 28/11/2019
 * Time: 11:30
 */

?>

<div class="modal fade" id="modalInserirFeedbackCertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title" id="tituloFeedback"><i class="fa fa-commenting-o"></i> Inserir Feedback para o neg&oacute;cio</h3>
                <h5 id="legendaFeedback" >Ao inserir o feedback, voc&ecirc; resolve temporariamente a situa&ccedil;&atilde;o do cliente. E coloca ele para o final da fila. Lembrando que esta a&ccedil;&atilde;o s&oacute; poder&aacute; ser executada por duas vezes. </h5>
            </div>
            <div class="modal-body">

                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Cliente: <span id="cnSpanCodigoCliente">...</span> - <span id="cnSpanNomeCliente">...</span></h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Codigo Certificado:</label> <span id="cnSpanCodigoCertificado">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Data da Compra:</label> <span id="cnSpanDataCompra">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Protocolo:</label> <span id="cnSpanProtocolo">...</span>
                            </div>

                        </div> <!--DIV CLASS row-->

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4>Situa&ccedil;&otilde;es: <a onclick="carregarInformacoesNegocio($('#cnSpanCodigoCertificado').html());" title="Recarregar situa&ccedil;&otilde;es"><i class="fa fa-refresh" aria-hidden="true"></i></a></h4>
                        <!--<i class="fa fa-refresh fa-lg" onclick="consulta_situacao();"></i>-->
                        <div id="divTabelaSituacoesNegocios"></div>
                    </div>
                </div> <!--DIV CLASS row-->


                <form method="post" action="#" id="frmFeedbackCd" name="frmFeedbackCd" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div >
                                <label class="btn btn-secondary" >
                                    <input type="radio" name="optFeedback" id="optFeedback1" value="feed1"> <i class="fa fa-commenting-o"></i> Feedback
                                </label>

                                <label class="btn btn-secondary" >
                                    <input type="radio" name="optFeedback" id="optFeedback2" value="feed2"> <i class="fa fa-thumbs-down"></i> Perdeu
                                </label>
                            </div>

                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row" id="panelFeedback">
                        <div class="col-lg-3">
                            Feedback
                        </div>
                        <div class="col-lg-9">
                            <select name="selectFeedback" id="selectFeedback" type="text" class="form-control" >
                                <option value="">Selecione o tipo de feedback</option>
                                <option value="39">N&atilde;o consegui falar com o cliente</option>
                                <option value="40">O cliente disse que vai pagar ainda esta semana</option>
                                <option value="41">O cliente pediu pra ligar na outra semana</option>
                                <option value="42">O cliente precisou ajustar a documenta&ccedil;&atilde;o</option>
                                <option value="43">O cliente est&aacute; viajando</option>
                                <option value="44">Est&aacute; aguardando o outro s&oacute;cio</option>
                                <option value="45">A empresa est&aacute; inativa, dependendo de regulariza&ccedil;&atilde;o</option>
                                <option value="46">Outro...</option>
                            </select>
                        </div>
                    </div>

                    <div class="row oculto" id="panelLost">
                        <div class="col-lg-3">
                            Motivo
                        </div>
                        <div class="col-lg-9">

                            <select name="selectLost" id="selectLost" type="text" class="form-control" >
                                <option value="">Selecione o tipo de perda do neg&oacute;cio</option>
                                <option value="47">Fechou com o concorrente</option>
                                <option value="48">A empresa fechou</option>
                                <option value="49">N&atilde;o conseguiu mais falar com o cliente</option>
                                <option value="50">Achou o pre&ccedil;o alto</option>
                                <option value="51">Vendeu a empresa</option>
                                <option value="52">A empresa est&aacute; inativa, dependendo de regulariza&ccedil;&atilde;o</option>
                                <option value="53">Outro...</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            Coment&aacute;rio
                        </div>
                        <div class="col-lg-9">
                            <textarea rows="5"  name="edtFeedbackCd" id="edtFeedbackCd" class="form-control" placeholder="Descreva aqui em detalhes."></textarea>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSalvarFeedback" >Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
