<?php
$usuarioLogado = controleAcesso::getUsuarioLogado();

if ($usuarioLogado->getFotoAvatar())
    $fotoPerfil = $usuarioLogado->getFotoAvatar();
else
    $fotoPerfil = 'inc/jQuery-Picture-Cut-master/src/img/icon_add_image2.png';

require_once 'modais/modalListaProdutos.php';
?>
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="../img/guiar.png"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!--
                <li><a href="#" title="AMBIENTE DE HOMOLOGACAO" >******************** BETA - AMBIENTE DE TESTE ********************</a></li>
-->
                <li><a href="home.php" title="Painel Inicial"><i class="fa fa-lg fa-home"></i></a></li>

                <? if($usuarioLogado->getPerfilId() == 4 ) {?>
                    <li ><a href="telaCertificado.php" target="_blank" title="Tela de Certificados" class="text-success"><i class="fa fa-lg fa-id-card"></i> Certificados </a></li>
                <? }?>



                <? if (array_search('telaFinanceiro', $arrTelasMenu)!==false) {?>
                    <li>
                        <a href="biInformacoesGeraisConsultores.php" title="BI Consultores Pr&oacute;prios" target="_blank"><i class="fa fa-lg fa-bar-chart-o"></i></a>
                    </li>
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaProduto.php') {?>
                    <li><a data-toggle="modal" data-target="#modalInserirEditarProduto" onclick="carregarModalInserirEditarProduto('inserir')"> <i class="fa fa-lg fa-plus"></i> </a></li>
                <? }?>


                <? if (($_SERVER['REQUEST_URI'] == '/telaLocal.php') && (array_search('telaLocal.php', $arrTelasMenu)!==false) ) {?>
                    <li><a data-toggle="modal" data-target="#modalInserirEditarLocal"  onclick="carregarModalInserirEditarLocal('inserir')" title="Criar novo Local" ><i class="fa fa-lg fa-plus" aria-hidden="true"></i></a></li>
                <? }?>

                <li><a data-toggle="modal" data-target="#modalListaProdutos" title="Lista de produtos" onclick="carregarListaProdutos(); limparCamposListaProdutos();"><i class="fa fa-lg fa-gift" aria-hidden="true"></i></a></li>


                <? if($_SERVER['REQUEST_URI'] == '/telaParceiro.php') {?>
                    <li><a title="Inserir novo Canal" data-toggle="modal" data-target="#modalSalvarParceiro" onclick="limpar_formulario_inserir()"><i class="fa fa-lg fa-plus"></i></a></li>
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaUsuario.php') {?>
                    <li><a title="Inserir novo usu&aacute;rio" data-target="#modalUsuarioInserirEditar" data-toggle="modal" onclick="$('#acaoUsuario').val('inserir'); $('#idUsuario').val(''); limparModalInserirUsuario();"><i class="fa fa-lg fa-user-plus"></i></a></li>
                <? }?>

                <? if (($_SERVER['REQUEST_URI'] == '/telaGrupoProduto.php') && (array_search('telaGrupoProduto.php', $arrTelasMenu)!==false) ) {?>

                    <li><a title="Inserir / editar grupo de produtos"  class="btn btn-primary" data-toggle="modal" data-target="#modalInserirEditarGrupoProduto" onclick="carregarModalInserirEditarGrupoProduto('inserir')"><i class="fa fa-lg fa-plus"></i></a></li>
                <? }?>


                <? if($_SERVER['REQUEST_URI'] == '/telaCentralNegocios.php' ) {?>
                    <li ><a href="telaCertificado.php" target="_blank" title="Tela antiga de certificados" class="text-success"><i class="fa fa-lg fa-id-card"></i> Certificados </a></li>
                <? }?>
                <? if(strpos($_SERVER['REQUEST_URI'], 'telaCertificado.php') ) {?>
                    <li><a title="Venda ERP 3.0" data-target="#vendaInterna" data-toggle="modal" onclick="abreModalVendaInterna()"><i class="fa fa-lg fa-cart-plus"></i></a></li>
                    <!--
                    SO MOSTRAR ICONE DE CERTIFICADOS VALIDADOS NA TELA DE CERTIFICADOS
                    -->
                    <? if (array_search('importarCertificadosValidados', $arrTelasMenu)!==false) {?>
                        <li><a data-toggle="modal" data-target="#modalImportarCertificadosValidados" title="Importar Certificados Validados" ><i class="fa fa-lg fa-download" aria-hidden="true"></i></a></li>
                    <? }?>

                    <? if (array_search('importarCertificadosValidados', $arrTelasMenu)!==false) {?>
                        <li><a data-toggle="modal" data-target="#modalBaixaStone" title="Baixar pagamentos stone" ><i class="fa fa-lg fa-money" aria-hidden="true"></i></a></li>
                    <? }?>

                    <? if (array_search('importarBaixasPagamento', $arrTelasMenu)!==false) {?>
                        <li><a data-toggle="modal" data-target="#modalBaixaPagamentos" title="Baixar pagamentos S2P" ><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a></li>
                    <? }?>

                    <!--<li><a title="Venda pelo Sistema" href=""><i class="fa fa-lg fa-plus-circle"></i></a></li>-->
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaContador.php') {?>
                    <li><a data-toggle="modal" data-target="#modalInserirEditarContador" onclick="carregarModalInserirEditarContador('inserir')"> <i class="fa fa-lg fa-plus"></i> </a></li>
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaMeuFaturamento.php') {?>
                    <li><a href="" onclick="imprimir();"><i class="fa fa-lg fa-print"></i></a></li>
                <? }?>
                <li><a title="Sair/Deslogar" href="deslogar.php"><i class="fa fa-lg fa-power-off"></i></a></li>
                <li class="dropdown">
                    <a href="telaAlterarFotoPerfil.php" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=$fotoPerfil?>" class="fotoAvatar"> <?=utf8_encode($usuarioLogado->getNome());?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="small">&Uacute;ltimo Acesso: <br/><?=$usuarioLogado->getDataUltimoAcesso('d/m/Y H:i:s');?></a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="telaProfile.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?$linkSenha = 'telaAlterarSenha.php?usuario_id='.$usuarioLogado->getId();?>
                            <a href="<?=$linkSenha?>"><i class="fa fa-fw fa-lock"></i> Alterar Senha</a>
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>-->

                        <li class="divider"></li>
                        <li>
                            <a href="../deslogar.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">
                    <li class="avatar">
                        <div >
                            <a title="Trocar o perfil" href="telaAlterarFotoPerfil.php" >
                                <img src="<?=$fotoPerfil?>" class="fotoPrincipalAvatar">
                            </a>

                        </div>
                        <span class="nomeAvatar"><?=utf8_encode(resumir22($usuarioLogado->getNome(), 20, ''));?></span>
                        <div class="textoAvatar">
                            Bem vindo de volta<br>
                            <a href="telaProfile.php"> <i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> | <a href="deslogar.php"> <i class="fa fa-power-off" aria-hidden="true"></i> Deslogar</a>
                        </div>
                        <div>

                        </div>
                    </li>
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <? if (array_search('telaFinanceiro', $arrTelasMenu)!==false) {?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#financeiro"><i class="fa fa-money"></i> Financeiro <i class="fa fa-fw fa-chevron-down"></i></a>
                            <ul id="financeiro" class="collapse">
                                <? if (array_search('telaFinanceiro', $arrTelasMenu)!==false) {?>
                                    <li><a href="telaContaReceber.php"><i class="fa fa-download"></i> Contas a receber</a></li>
                                <? }?>

                            </ul>
                        </li>
                    <? }?>
                    <li style="background-color: darkred" >
                        <a href="telaCentralNegocios.php" style="color: white"><i class="fa fa-smile-o"></i> Central de Neg&oacute;cios</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cadastro"><i class="fa fa-fw fa-user-plus"></i> Cadastro <i class="fa fa-fw fa-chevron-down"></i></a>
                        <ul id="cadastro" class="collapse">
                            <li><a href="telaContador.php"><i class="fa fa-address-card"></i> Contador Amigo </a></li>
                            <? if (array_search('telaUsuario.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaUsuario.php"><i class="fa fa-users"></i> Usu&aacute;rios </a></li>
                            <? }?>
                            <? if (array_search('telaGrupoProduto.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaGrupoProduto.php"><i class="fa fa-product-hunt"></i> Grupo de produtos </a></li>
                            <? }?>
                            <? if (array_search('telaFuncionario.php', $arrTelasMenu)!==false) {?>
                                <!--<li><a href="#">Funcion&aacute;rios</a></li>-->
                            <? }?>

                            <? if (array_search('telaParceiro.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaParceiro.php"><i class="fa fa-building-o "></i> Canais de Atendimento</a></li>
                            <? }?>
                            <? if (array_search('telaProduto.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaProduto.php"><i class="fa fa-product-hunt"></i> Produtos </a></li>
                            <? }?>
                            <? if (array_search('telaLocal.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaLocal.php"><i class="fa fa-globe"></i> Locais </a></li>
                            <? }?>
                        </ul>
                    </li>
                    <? if (array_search('PainelCRM', $arrTelasMenu)!==false) {?>
                        <li>
                            <a  href="telaProspect.php"><i class="fa fa-fw fa-address-book"></i> CRM  </a>
                        </li>
                    <? }?>


                    <? if (array_search('telaOpcao', $arrTelasMenu)!==false) {?>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#opcao"><i class="fa fa-fw fa-cogs"></i> Op&ccedil;&otilde;es <i class="fa fa-fw fa-chevron-down"></i></a>
                                <ul id="opcao" class="collapse">
                                    <li>
                                        <a href="#">Recuperar Usu&aacute;rio</a>
                                    </li>

                                    <li>
                                        <a href="#">Edi&ccedil;&atilde;o de Perfil</a>
                                    </li>

                                    <li>
                                        <a href="#"><i class="fa fa-history"></i> Log Sistema</a>
                                    </li>
                                </ul>
                            </li>
                     <? }?>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#relatorios"><i class="fa fa-bar-chart"></i> Relat&oacute;rios <i class="fa fa-fw fa-chevron-down"></i></a>
                        <ul id="relatorios" class="collapse">
                            <li>
                                <a href="telaComissionamentoMensalContadorRep.php"><i class="glyphicon glyphicon-signal"></i> Relat&oacute;rio individual de comiss&atilde;o de contadores</a>
                            </li>

                            <? if (array_search('telaGeracaoCampanhaMkt.php', $arrTelasMenu)!==false) {?>
                            <li>
                                <a href="telaGeracaoCampanhaMkt.php"><i class="fa fa-whatsapp"></i> Gerador de campanhas para whatsapp</a>
                            </li>
                            <? }?>

                            <? if (array_search('telaRelatorioRankingContador.php', $arrTelasMenu)!==false) {?>
                            <li>
                                <a href="telaRelatorioRankingContador.php"><i class="fa fa-trophy"></i> Ranking Contadores</a>
                            </li>
                            <? }?>

                            <? //if (array_search('telaRelatorioComissionamentoContador.php', $arrTelasMenu)!==false) {?>
<!--                                <li>
                                    <a href="telaRelatorioComissionamentoContador.php"><i class="fa fa-address-card"></i> Comissionamento de Contadores</a>
                                </li>
-->                            <? //}?>

                            <? if (array_search('telaRelatorioComissionamentoParceiros.php', $arrTelasMenu)!==false) {?>
                                <li>
                                    <a href="telaRelatorioIndividualParceiro.php"><i class="fa fa-user-circle"></i> Comissionamento de Parceiros tabela fixa</a>
                                </li>
                            <? }?>

                            <? if (array_search('telaRelatorioComissionamentoParceiros.php', $arrTelasMenu)!==false) {?>
                                <li>
                                    <a href="telaRelatorioComissionamentoParceiros.php"><i class="fa fa-user-circle"></i> Comissionamento de Parceiros</a>
                                </li>
                            <? }?>
                            <? if (array_search('telaRelatorioComissionamentoUsuarios.php', $arrTelasMenu)!==false) {?>
                                <li>
                                    <a href="telaRelatorioComissionamentoUsuarios.php"><i class="fa fa-user-plus"></i> Comissionamento de Funcion&aacute;rios</a>
                                </li>
                            <? }?>

                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
</nav>