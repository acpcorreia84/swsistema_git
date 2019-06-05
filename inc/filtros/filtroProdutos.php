<div class="row form-group">
    <div class="col-lg-4">
        Tipo da Pessoa
    </div>
    <div class="col-lg-4">
        Produtos do Contador
    </div>
    <div class="col-lg-4">
        Validade do produto
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-4">
        <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
        <select class="form-control" name="filtroProdutoTipoPessoa" id="filtroProdutoTipoPessoa" >
            <option value="" selected="selected">Todas</option>
            <option value="F">Pessoa F&iacute;sica</option>
            <option value="J">Pessoa Jur&iacute;dica</option>
        </select>
    </div>
    <div class="col-lg-4">
        <select class="form-control" name="filtroProdutoProdutosContador" id="filtroProdutoProdutosContador" >
            <option value="" selected="selected">Todas</option>
            <option value="normais">Produtos pre&ccedil;os normais</option>
            <option value="contadores">Apenas de Contadores</option>
        </select>
    </div>
    <div class="col-lg-4">
        <select class="form-control" name="filtroProdutoValidadadeProduto" id="filtroProdutoValidadadeProduto" >
            <option value="" selected="selected">Todas</option>
            <option value="1">Validade de 1 ano</option>
            <option value="2">Validade de 2 anos</option>
            <option value="3">Validade de 3 anos</option>
        </select>
    </div>


</div>
<!--
<div class="row form-group">
    <div class="col-lg-3">
        Pesquisar Por
    </div>
</div>

<div class="row form-group">
    <div class="col-lg-3" id="divProdutosPesquisarPor" >
        <select class="form-control" name="filtroTelaProduto" id="filtroTelaProduto" onchange="montarFiltroPesquisarPor($(this), 'divProdutosPesquisarPor')">
            <option value="" selected="selected">Selecione um Filtro</option>
            <option value="produto.NOME">Nome do produto</option>
            <option value="produto.PRECO">Pre&ccedil;o do produto</option>
        </select>
    </div>


</div>-->
<div class="row">
    <div class="col-lg-2">
        <button name="btnFiltrarProdutos" id="btnFiltrarProdutos" class="btn btn-primary">Filtrar</button>
    </div>
</div>
<script>
    $('#btnFiltrarProdutos').click(function () {
        carregarProdutos(undefined, undefined, 'sim');
    })
</script>
<!-- FIM FILTRO PAGE -->