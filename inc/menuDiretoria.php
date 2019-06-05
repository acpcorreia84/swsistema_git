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
                <a class="navbar-brand" href="home.php"><img src="../img/logo_serama.png"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li><a href="home.php" title="Painel Inicial"><i class="fa fa-lg fa-home"></i></a></li>

                <? if($_SERVER['REQUEST_URI'] == '/telaCertificado.php') {?>
                    <li><a title="Venda" data-target="#vendaInterna" data-toggle="modal"><i class="fa fa-lg fa-cart-plus"></i></a></li>
                    <!--<li><a title="Venda pelo Sistema" href=""><i class="fa fa-lg fa-plus-circle"></i></a></li>-->
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaProspect.php' && $qtdeProspect ==0) {?>
                    <li><a title="Atualizar CRM" href="atualizacaoBancoDeDados/transferir_id_cd_prospect.php" target="_blank"><i class="fa fa-lg fa-download"></i></a></li>
                <? }?>

                <? if($_SERVER['REQUEST_URI'] == '/telaMeuFaturamento.php') {?>
                    <li><a href="" onclick="imprimir();"><i class="fa fa-lg fa-print"></i></a></li>
                <? }?>
                <li><a title="Sair/Deslogar" href="deslogar.php"><i class="fa fa-lg fa-power-off"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$usuarioLogado->getNome();?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="small">&Uacute;ltimo Acesso: <br/><?=$usuarioLogado->getDataUltimoAcesso('d/m/Y H:i:s');?></a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="telaProfile.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
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
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cadastro"><i class="fa fa-fw fa-user-plus"></i> Cadastro <i class="fa fa-fw fa-chevron-down"></i></a>
                        <ul id="cadastro" class="collapse">
                            <li><a href="telaContador.php"><i class="fa fa-address-card"></i> Contador Amigo <?='('.$qtdeContador.')';?></a></li>
                            <? if (array_search('telaUsuario.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaUsuario.php"><i class="fa fa-users"></i> Usu&aacute;rios <?='('.$qtdeUsuario.')';?></a></li>
                            <? }?>
                            <? if (array_search('telaFuncionario.php', $arrTelasMenu)!==false) {?>
                                <!--<li><a href="#">Funcion&aacute;rios</a></li>-->
                            <? }?>

                            <? if (array_search('telaParceiro.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaParceiro.php"><i class="fa fa-user-circle "></i> Parceiros</a></li>
                            <? }?>
                            <? if (array_search('telaProduto.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaProduto.php"><i class="fa fa-product-hunt"></i> Produtos <?='('.$qtdeProduto.')';?></a></li>
                            <? }?>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="tables.html"><i class="fa fa-fw fa-calendar"></i> Calendário</a>
                    </li>-->
                   <li>
                        <a  href="javascript:;" data-toggle="collapse" data-target="#certificado"><i class="fa fa-fw fa-certificate"></i> Certificados <?='('.$qtdeCertificadosTotal.')';?> <i class="fa fa-fw fa-chevron-down"></i></a>
                         <ul id="certificado" class="collapse">
                            <li><a href="telaCertificado.php"><i class="fa fa-search"></i> Consulta <?='('.$qtdeCertificadosLiberados.')';?></a></li>
                             <li><a href="telaMeuFaturamento.php"><i class="fa fa-line-chart"></i> Faturamento <?='('.$qtdeFaturados.')';?></a></li>
                             <li><a href="telaCertificadoInformePagamento.php"><i class="fa fa-money"></i> Info Pagamento <?='('.$qtdeInformePagamento.')';?></a></li>
                            <? if (array_search('telaCertificadosApagados.php', $arrTelasMenu)!==false) {?>
                                <li><a href="#"><i class="fa fa-recycle"></i> Apagados</a></li>
                            <? }?>
                            <? if (array_search('telaMeusCertificadosValidados.php', $arrTelasMenu)!==false) {?>
                                <li><a href="telaMeusCertificadosValidados.php">Validados</a></li>
                            <? }?>
                        </ul>
                    </li>

                    <? if (array_search('PainelCRM', $arrTelasMenu)!==false) {?>
                        <li>
                            <a  href="telaProspect.php"><i class="fa fa-fw fa-address-book"></i> CRM <?='('.$qtdeProspect.')';?> </a>
                        </li>
                    <? }?>

                    <? if (array_search('PainelRelatorio', $arrTelasMenu)!==false) { ?>
                        <li>
                            <a  href="javascript:;" data-toggle="collapse" data-target="#relatorio"><i class="fa fa-fw fa-file"></i> Rel&aacute;torio <i class="fa fa-fw fa-chevron-down"></i></a>
                             <ul id="relatorio" class="collapse">
                                 <? if (array_search('ComissaoParceiro', $arrTelasMenu)!==false) { ?>
                                    <li><a href="telaRelatorioComissaoCertificadoParceiro.php"><i class="fa fa-line-chart"></i> Comiss&atilde;o Parceiro</a></li>
                                 <? }?>
                            </ul>
                        </li>
                    <? }?>


                    <? if (array_search('PainelParceiro', $arrTelasMenu)!==false) {?>
                        <li>
                            <a  href="javascript:;" data-toggle="collapse" data-target="#parceiro"><i class="fa fa-fw fa-file"></i> Parceiro <i class="fa fa-fw fa-chevron-down"></i></a>
                            <ul id="parceiro" class="collapse">
                                <li><a href="telaParceiro.php"><i class="fa fa-line-chart"></i>Parceiros</a></li>
                            </ul>
                        </li>
                    <? }?>
                   <!-- <li><? if (array_search('telaFinanceiro', $arrTelasMenu)!==false) {?>
                            <li><a href="javascript:;" data-toggle="collapse" data-target="#financeiro"><i class="fa fa-fw fa-money"></i> Financeiro <i class="fa fa-fw fa-chevron-down"></i></a>
                                <ul id="financeiro" class="collapse">
                                    <li><a href="#">Caixa</a></li>
                                    <li><a href="#">Contas à Pagar</a></li>
                                    <li><a href="#">Contas à Receber</a></li>
                                    <li><a href="#">Contas Bancárias</a></li>
                                    <li><a href="#">Contas Contábeis</a></li>
                                    <li><a href="#">Categorias Contas Contábeis</a></li>
                                    <li><a href="javascript:;" data-toggle="collapse" data-target="#extrato">Extrato <i class="fa fa-fw fa-chevron-down"></i></a>
                                        <ul id="extrato" class="collapse">
                                            <li><a href="#">Consulta</a></li>
                                            <li><a href="#">Importação</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                     <? }?>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-support"></i> Solicita&ccedil;&otilde;es</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Chekclist <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-warning"></i> Avisos</a>
                    </li>-->

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
                                <a href="telaRelatorioRankingContador.php">Ranking Contadores</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
</nav>