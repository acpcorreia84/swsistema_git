<script>
    function carregarListaProdutos () {
        /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
        nomeCampoFiltro = '';
        valorCampoFiltro = '';
        if (($('#filtroCampoProduto').val()) && ($('#filtro_pesquisa_por').val())) {
            nomeCampoFiltro = $('#filtroCampoProduto').val();
            valorCampoFiltro = $('#filtro_pesquisa_por').val();
        }

        camposFiltro = {};
        camposFiltro[nomeCampoFiltro] = valorCampoFiltro;


        var dadosajax = {
            'funcao' : 'carregar_produtos',
            'filtroTipoPessoa' : $('#filtroTipoPessoa').val(),
            'filtroContador' : $('#filtroProdutosContador').val(),
            'filtroValidade' : $('#filtroValidadadeProduto').val(),
            'filtroCampo' : $('#filtroCampoProduto').val(),
            'campoFiltro' : camposFiltro
        }

        $.ajax({
            url: 'funcoes/funcaoProdutos.php',
            data : dadosajax,
            type : 'POST',
            cache : true,
            beforeSend: function () {
                /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
                $('#divProdutos').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            },
            error : function(){
                alertErro(acentuarMsn('Error US001 - Erro ao carregar lista de produtos,' + ' '+ msnPadrao + '.'));
            },
            success : function(result){
                try {
                    var resultado = JSON.parse(result);
                    if (resultado.mensagem == 'Ok') {
                        montarTabelaDinamica(resultado.colunas, resultado.produtos, 'tabelaProdutos', 'divProdutos');
                    }
                } catch (e) {
                    console.log(result, e);
                    alertErro(acentuarMsn('Error US002 - Erro ao carregar lista de produtos,' +' '+e + ' '+ msnPadrao + '.'));
                }
            },
            complete : function ( ) {

            }
        });

    }

    function limparCamposListaProdutos() {
        $('#filtroTipoPessoa').val('');
        $('#filtroProdutosContador').val('');
        $('#filtroValidadadeProduto').val('');
        $('#filtro_pesquisa_por').val('');
    }
</script>
<!-- INICIO DO MODAL DETALHAR CONTADOR -->
<div id="modalListaProdutos" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-6">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Usu&aacute;rio </h3>
                </div>
                <div class ="col-lg-6 text-right">

                        <a class="btn btn-danger" data-toggle="modal" data-target="#modalListaProdutos" onclick=""><i class="fa fa-lg fa-close"></i></a>

                </div>
            </div>
            <div class="modal-body">
                <? require_once 'inc/filtros/filtroListaProdutos.php';?>

                <div id="divProdutos"></div>

            </div>
            <!--FIM MODAL BODY-->
            <div class="modal-footer">
                <input type="hidden" name="valorVendaUsuario" id="valorVendaUsuario">
                <input type="hidden" name="registro_comissao_id" id="registro_comissao_id">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharContador-->
<!-- FIM DO MODAL DETALHAR CONTADOR-->
