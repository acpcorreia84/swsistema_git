<div class="row">
    <div class="col-lg-3">
        Pesquisar Por
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3" id="divPesquisarPor">
        <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
        <select class="form-control" name="tipo_filtro" id="tipo_filtro" onchange="montarFiltroPesquisarPor(this)">
            <option value="" selected="selected">Selecione um Filtro</option>
            <option value="parceiro.ID">Codigo do Parceiro</option>
            <option value="parceiro.NOME">Nome do Parceiro</option>
        </select>
    </div>

</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label for="filtroEscolheCanal">Tipo do canal</label>
    </div>

</div>

<div class="row">
    <div class="col-lg-3">
        <div id="divFiltroEscolheCanal">
            <select name="filtroEscolheCanal" id="filtroEscolheCanal" class="form-control">
                <option value="">Selecione o tipo do canal</option>
                <option value="parceiro">Parceiro</option>
                <option value="unidade">Unidade pr&oacute;pria</option>
                <option value="tabela">Parceiro de Tabela Fixa</option>
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <button name="btnFiltrarParceiro" id="btnFiltrarParceiro" class="btn btn-primary">Pesquisar</button>
    </div>

</div>
<script>
    $('#btnFiltrarParceiro').click(function () {
        carregar_parceiros(0, 50,'sim');
    })

</script>
<!--END ROW-->