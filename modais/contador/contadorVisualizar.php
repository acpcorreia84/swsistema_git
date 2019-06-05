<div id="visualizarContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3> <i class="fa fa-lg fa-arrows"></i> Visualizar Contador</h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"onclick="modalDuvida(5)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#visualizarContador"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                    <div class="modal-body">

                        <div class="panel panel-default">
                            <div class="panel-body bg-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>DADOS CONTADOR:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        Nome: <span id="vcSpanNome">...</span>
                                    </div>

                                    <div class="col-lg-6">
                                        C&oacute;digo Contador: <span id="vcSpanCodigoDesconto">...</span>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-lg-6">
                                        crc: <span id="vcSpanCrc" >...</span>
                                    </div>
                                    <div class="col-lg-3">
                                        Nascimento: <span id="vcSpanNascimento">...</span>
                                    </div>
                                    <div class="col-lg-3">
                                        CPF: <span id="vcSpanCpf">...</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        Vendedor: <span id="vcSpanVendedor">..</span>

                                    </div>
                                    <div class="col-lg-6">
                                        Local: <span id="vcSpanLocal">...</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        Email do contador: <span id="vcSpanEmailContador" >...</span>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <!-- DADOS RESPONS�VEL -->

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>ESCRIT&Oacute;RIO CONT&Aacute;BIL:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        Raz&atilde;o Social: <span  id="vcSpanRazaoSocial">...</span>
                                    </div>
                                    <div class="col-lg-3">
                                        CNPJ:  <span id="vcSpanCnpj">...</span>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                      Nome Fantasia: <span id="vcSpanNomeFantasia">...</span>
                                    </div>
                                    <div class="col-lg-3">
                                      Fone1: <span id="vcSpanFone1">...</span>
                                    </div>
                                    <div class="col-lg-3">
                                      Fone2: <span id="vcSpanFone2">...</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        Email do escrit&oacute;rio:
                                    </div>
                                    <div class="col-lg-8">
                                       <span id="vcSpanEmailEscritorio" >...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>ENDERE&Ccedil;O:</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                      Cep: <span id="vcSpanCep" >...</span>
                                    </div>
                                    <div class="col-lg-6">
                                      Endere&ccedil;o: <span id="vcSpanEndereco" >...</span>
                                    </div>
                                    <div class="col-lg-3">
                                      Numero: <span  id="vcSpanNumero" >...</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        Complemento:  <span id="vcSpanComplemento" >...</span>
                                    </div>
                                    <div class="col-lg-3">
                                        Bairro:  <span id="vcSpanBairro" >...</span>
                                    </div>
                                    <div class="col-lg-3">
                                        Cidade: <span id="vcSpanCidade" >...</span>
                                    </div>
                                    <div class="col-lg-2">
                                        UF: <span id="vcSpanUfContador" >...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>DADOS BANC&Aacute;RIOS:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                       Banco: <span  id="vcSpanBanco">
                                    </div>
                                    <div class="col-lg-6">
                                       CPF/CNPJ: <span  id="vcSpanCpfCnpjConta">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Agencia: <span  id="vcSpanAg">
                                    </div>
                                    <div class="col-lg-4">
                                        Conta Corrente: <span  id="vcSpanCc">
                                    </div>
                                    <div class="col-lg-4">
                                        Opera&ccedil;&atilde;o:  <span  id="vcSpanOpConta">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>CONTATOS:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Nome: <span  id="vcSpanContato1Nome">
                                    </div>
                                    <div class="col-lg-4">
                                        Cargo: <span  id="vcSpanContato1Cargo">
                                    </div>
                                    <div class="col-lg-4">
                                        Telefone:  <span  id="vcSpanContato1Telefone"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Nome: <span  id="vcSpanContato2Nome">
                                    </div>
                                    <div class="col-lg-4">
                                        Cargo: <span  id="vcSpanContato2Cargo">
                                    </div>
                                    <div class="col-lg-4">
                                        Telefone: <span  id="vcSpanContato2Telefone">...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        O Contador(a) receber&aacute; comiss&atilde;o: <span id="vcSpanComissao">...</span>
                                    </div>
                                    <div class="col-lg-6">
                                        O Contador(a) ter&aacute; o desconto de contador amigo: <span id="vcSpanDesconto">...</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!--Div Modal Body -->
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->