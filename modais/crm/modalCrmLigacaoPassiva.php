<div class="modal fade" role="dialog" id="mdLigacaoPassiva">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-lg fa-phone"></i> Atendimento/Liga&ccedil;&otilde;es</h3>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="panel panel-default">
                        <div class="panel-body btn-info">
                            <div class="col-lg-2"><label>CPF/CNPJ:</label></div>
                            <div class="col-lg-7"><input type="text" name="edtPesquisaProspect" id="edtPesquisaProspect" class="form-control" /></div>
                            <div class="col-lg-2"><button class="btn btn-primary" onclick="consulta_passiva();"><i class="fa fa-search fa-lg"></i></button></div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-3"><button class="btn btn-success" data-toggle="modal" data-target="#inserir" id="btnEdtNovo" disabled="disabled"><i class="fa fa-lg fa-plus"></i> NOVO</button></div>
                            <form action="" method="post">
                                <input type="hidden" id="idCertificado" name="idCertificado" />
                                <input type="hidden" id="idCliente" name="idCliente" />
                                <div class="col-lg-3"><button name="atender" class="btn btn-primary" id="btnEdtAnteder" onclick="modalCliente();" disabled="disabled"><i class="fa fa-lg fa-phone"></i> ATENDER</button></div>
                            </form>
                            <div class="col-lg-3"><button class="btn btn-danger"  id="btnEdtLimpar" onclick="limpar_passiva();" disabled="disabled"><i class="fa fa-lg fa-close"></i> LIMPAR</button></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label for="edtPesquisaDados">CPF/CNPJ:</label> <span type="text" name="pssCpfCnpj" id="pssCpfCnpj"></span><br>
                            <label for="edtPesquisaDados">Nome:</label> <span type="text" name="pssEdtNome" id="pssEdtNome"></span><br>
                            <label for="edtPesquisaDados">Nascimento:</label> <span type="text" name="pssEdtNascimento" id="pssEdtNascimento"></span><br>
                            <label for="edtPesquisaDados">Produto:</label> <span type="text" name="pssEdtProduto" id="pssEdtProduto"></span><br>
                            <label for="edtPesquisaDados">Localidade:</label> <span type="text" name="pssEdtLocal" id="pssEdtLocal"></span><br>
                            <label for="edtPesquisaDados">Valor:</label> <span type="text" name="pssValorProduto" id="pssValorProduto"></span><br>
                            <label for="edtPesquisaDados">Protocolo:</label> <span type="text" name="pssEdtProtocolo" id="pssEdtProtocolo"></span><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>