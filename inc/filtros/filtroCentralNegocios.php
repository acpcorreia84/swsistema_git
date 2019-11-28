
<div class="row form-group" >

    <div class="col-lg-3">
        Consultores
    </div>



</div>
<div class="row form-group">

    <div class="col-lg-3">
        <div id="divFiltroConsultoresNegocios"></div>
    </div>
    <div class="col-lg-1">
        <button name="btnFiltrarNegocios" id="btnFiltrarNegocios" class="btn btn-primary">Pesquisar</button>
    </div>

</div>
<div class="row">
    <div class="col-lg-12" id="divNegociosUsuariosCertificados"></div>
</div>

<script>
    $('#btnFiltrarNegocios').click(function () {
        carregarNegocios();
    })

</script>
<!-- FIM FILTRO PAGE -->