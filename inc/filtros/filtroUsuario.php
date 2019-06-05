<div class="col-lg-12 ">
    <div class="row">
        <div class="col-lg-3">
            Pesquisar Por
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div class="row form-group">
        <div class="col-lg-3" id="divPesquisarPor">
            <!--OS VALORES DO SELECT SAO INSERIDOS DIRETAMENTE NA CONSULTA DO PROPEL-->
            <select class="form-control" name="tipo_filtro" id="tipo_filtro" onchange="montarFiltroPesquisarPor(this)">
                <option value="" selected="selected">Selecione um Filtro</option>
                <option value="usuario.ID">Codigo do Usuario</option>
                <option value="usuario.NOME">Nome</option>
                <option value="usuario.CPF" tipocampo="cpf" >CPF</option>
            </select>
        </div>
        <div class="col-lg-3">
            <button name="btnFiltrar" id="btnFiltrar" class="btn btn-primary">Pesquisar</button>
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div class="row form-group">
        <div class="col-lg-2">
            Bloqueados?
        </div>
        <div class="col-lg-2">
            Comissionados? <a href="#"><i class="fa fa-question-circle" aria-hidden="true" title="Filtra apenas usu&aacute;rios Supervisores, Consultores, Consultores/Agrs"></i></a>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row form-group">
        <div class="col-lg-2">
            <input type="checkbox" id="filtroChkBloqueados" data-onstyle="danger">
            <script>
                $(function() {
                    $("#filtroChkBloqueados").bootstrapToggle({
                        on: "Bloqueados",
                        off: "Todos"
                    });

                    $("#filtroChkBloqueados").change(function() {
                        carregarUsuarios('', '', 'sim');
                    });
                });
            </script>
        </div>

        <div class="col-lg-2">
            <input type="checkbox" id="filtroChkComissionados" data-onstyle="success">
            <script>
                $(function() {
                    $("#filtroChkComissionados").bootstrapToggle({
                        on: "Comissionados",
                        off: "Todos"
                    });

                    $("#filtroChkComissionados").change(function() {
                        carregarUsuarios('', '', 'sim');
                    });
                });
            </script>
        </div>
    </div>
</div>


<script>
    $('#btnFiltrar').click(function () {
        carregarUsuarios(0,50,'sim');
    })

</script>
<!--END ROW-->