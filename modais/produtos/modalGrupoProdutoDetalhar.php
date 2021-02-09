<div id="modalGrupoProdutoDetalhar" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-5">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhes do Grupo de produto </h3>
                </div>
                <div class ="col-lg-7 text-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#modalInserirEditarGrupoProduto" onclick="carregarModalInserirEditarGrupoProduto('editar')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <button class="btn btn-primary" id="btnApagarGrupoProduto" ><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Grupo Produto"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalGrupoProdutoDetalhar" onclick="carregarGruposProdutos();"><i class="fa fa-lg fa-close"></i></a>
                    <script>$("#btnApagarGrupoProduto").on("click", function(){
                            ezBSAlert({
                                type: "confirm",
                                messageText: "Tem certeza que deseja apagar o Grupo de produtos "+$('#labelNomeGrupoProduto').html()+"?",
                                alertType: "info"
                            }).done(function (e) {
                                if (e === true)
                                    apagarGrupoProduto();
                            });
                        });</script>

                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--GUARDA O ID DA CONTA A RECEBER-->
                                <label>Grupo Produto: </label><span id="labelNomeGrupoProduto">...</span>
                            </div>

                        </div> <!--DIV CLASS row-->

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <label>Produtos: </label><div id="divListaProdutos">...</div>
                            </div>

                        </div> <!--DIV CLASS row-->

                    </div>

                </div>

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" id="GrupoProdutoId">
                <input type="hidden" id="acaoGrupoProduto">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharParceiro-->