<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
include 'header.php';
include 'inc/script.php';

$cProspect = new Criteria();
$cProspect->add(ProspectPeer::SITUACAO , 0);
$cProspect->add(ProspectPeer::USUARIO_ID , $usuarioLogado->getId());
$cProspect->add(ProspectPeer::DATA_AGENDAMENTO , date("Y-m-d 23:59:59"), Criteria::LESS_EQUAL);
$agendamentoCount = ProspectPeer::doCount($cProspect);
$prospectsAgendamento = ProspectPeer::doSelect($cProspect);

$cRetencao = new Criteria();
$cRetencao->add(ProspectRetencaoPeer::SITUACAO , 0 );
$prospectRetencoes = ProspectRetencaoPeer::doSelect($cRetencao);

$cProduto = new  Criteria();
$cProduto->add(ProdutoPeer::SITUACAO, 0);
$produtos = ProdutoPeer::doSelect($cProduto);

$cFormas = new Criteria();
$formas = FormaPagamentoPeer::doSelect($cFormas);
?>

<script xmlns="http://www.w3.org/1999/html">
        function modalCliente(){
             $(document).ready(function(){
                $("#atenderCl").modal('show');
            });
        }
</script>

<? if($usuarioLogado->getPerfilId() == 4){
    echo '<body>';
}else{
   echo '<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">';
}?>

<div id="wrapper">
     <? include('inc/menu.php');?>
     <div id="page-wrapper">
         <div class="container-fluid">
             <div class="row" style="margin-top:50px;">
                 <!--PAINEL DE FILTROS-->
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         Filtros
                     </div>
                     <div class="panel-body" >
                         <div id="divFiltros"></div>
                         <? include 'inc/filtros/filtroProspect.php';?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <div class="text-left">
                                     <i class='fa fa-square' style='color:orange;'></i> Cobran&ccedil;a |&nbsp;
                                     <i class='fa fa-square' style='color:red;'></i> Cobran&ccedil;a (Restam 3 dias) |&nbsp;
                                     <i class='fa fa-square' style='color:blue;'></i> Renova&ccedil;ao |&nbsp;
                                     <i class='fa fa-square' style='color:green;'></i> Contador Carterizado |&nbsp;
                                     <i class='fa fa-square' style='color:green;'></i><i class="fa fa-flag" style="color:red;"></i> Contador s/ Indica&ccedil;ao |&nbsp;
                                     <i class='fa fa-square' style='color:orange;'></i><i class="fa fa-flag" style="color:black;"></i> Validado e nao Pago |&nbsp;
                                 </div>
                             </div><!-- PANEL BODY -->
                         </div><!-- PANEL DEFAULT -->
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-lg-12">
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-left"><label>
                                            <a data-toggle="collapse" href="#painelProspect" aria-expanded="false" aria-controls="collapseExample">
                                                Lista de Prospec&ccedil;&atilde;o <?="(".$num_rows.")";?>
                                            </a>
                                    </label></div>

                                    <div style="text-align: right">
                                        <button name="ligacaoPassiva" id="ligacaoPassiva" data-toggle="modal" data-target="#mdLigacaoPassiva" class="btn btn-primary"><i class="fa fa-phone"></i> Passiva</button>
                                        <? if($agendamentoCount) {?>
                                            <a href="#agenda" class="btn-danger btn text-primary"><i class="fa fa-calendar"></i> Agendamentos: <?=$agendamentoCount;?></a>
                                        <? }?>
                                    </div>
                                </div><!-- PANEL HWADING -->

                                <div class="panel-body collapse in" id="painelProspect">
                                    <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                                    <ul class="paginacao pagination-sm" id="paginacaoProspectTopo" ></ul>
                                    <div id="divTabelaProspects"></div>
                                    <ul class="paginacao pagination-sm" id="paginacaoProspectRodape" ></ul>

                                </div><!-- PANEL BODY -->
                           </div><!-- PANEL DEFAULT -->
                     </div>
                 </div>

                 <div class="row">
                    <!-- INICIO PAINEL AGENDAMENTOS -->
                    <div class="col-lg-8" id="agenda">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <label><a data-toggle="collapse" data-target="#painelAgendamento" >Agendamentos <?='('.$agendamentoCount.')';?></a></label>
                            </div><!-- PANEL HEADING -->
                            <div class="panel-body collapse in" id="painelAgendamento">
                                <table class="table table-bordered table-responsive small">
                                    <thead>
                                        <tr>
                                            <td>Qtde</td>
                                            <td>Nome</td>
                                            <td>Contato</td>
                                            <td>Data</td>
                                            <td>Tipo</td>
                                            <td>A&ccedil;ao</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($prospectsAgendamento as $prospectAgendamentos) { $qtde++;?>
                                            <? if($prospectAgendamentos->getDataAgendamento('d/m/Y') >= date('d/m/Y')) { ?>
                                                <tr>
                                                    <td><?=$qtde;?></td>
                                                    <? if($prospectAgendamentos->getContadorId()){?>
                                                        <td><?

                                                            echo str_pad($prospectAgendamentos->getId(),4,0,STR_PAD_LEFT)." - ";
                                                            if($prospectAgendamentos->getContador()->getRazaoSocial()) {
                                                                echo $prospectAgendamentos->getContador()->getRazaoSocial();
                                                            }elseif($prospectAgendamentos->getContador()->getNomeFantasia()){
                                                                echo $prospectAgendamentos->getContador()->getNomeFantasia();
                                                            }else{
                                                                echo $prospectAgendamentos->getContador()->getNome();
                                                            }

                                                        ?></td>
                                                        <td><?=$prospectAgendamentos->getContador()->getFone1();?></td>
                                                        <td><?=$prospectAgendamentos->getDataAgendamento('d/m/Y H:i');?></td>
                                                        <td><?
                                                            if($prospectAgendamentos->getProspectTipoId() == 1 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:orange'></i>";
                                                            }else if($prospectAgendamentos->getProspectTipoId() == 2 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:green '></i>";
                                                            }else if($prospectAgendamentos->getProspectTipoId() == 3 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:blue'></i>";
                                                            }else{
                                                                echo "";
                                                            }
                                                            ?></td>
                                                        <td><form action="" method="post">
                                                                <button type="submit" class="icon-button" name="atenderCliente"   value="<?=$prospectAgendamentos->getId();?>" data-toggle="modal" ><i class="fa fa-phone fa-lg"></i></button>
                                                            </form></td>
                                                    <? }?>

                                                    <? if($prospectAgendamentos->getCertificadoId()){?>
                                                        <td><?
                                                            echo $prospectAgendamentos->getId()." - ";
                                                            if($prospectAgendamentos->getCertificado()->getCliente()->getRazaoSocial()) {
                                                                echo $prospectAgendamentos->getCertificado()->getCliente()->getRazaoSocial();
                                                            }elseif($prospectAgendamentos->getCertificado()->getCliente()->getNomeFantasia()){
                                                                echo $prospectAgendamentos->getCertificado()->getCliente()->getNomeFantasia();
                                                            }else{
                                                                echo $prospectAgendamentos->getCertificado()->getCliente()->getNome();
                                                            }
                                                        ?></td>
                                                        <td><?=$prospectAgendamentos->getCertificado()->getCliente()->getFone1();?></td>
                                                        <td><?=$prospectAgendamentos->getDataAgendamento('d/m/Y H:i');?></td>
                                                        <td><?
                                                            if($prospectAgendamentos->getProspectTipoId() == 1 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:orange'></i>";
                                                            }else if($prospectAgendamentos->getProspectTipoId() == 2 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:green '></i>";
                                                            }else if($prospectAgendamentos->getProspectTipoId() == 3 ) {
                                                                echo "<i class='fa fa-square fa-lg' style='color:blue'></i>";
                                                            }else{
                                                                echo "";
                                                            }
                                                        ?></td>
                                                        <td><form action="" method="post">
                                                                <button type="submit" class="icon-button" name="atenderCliente"   value="<?=$prospectAgendamentos->getId();?>" data-toggle="modal" ><i class="fa fa-phone fa-lg"></i></button>
                                                            </form></td>
                                                    <? }?>
                                                </tr>
                                            <? }?>
                                        <? }?>
                                    </tbody>
                                </table>
                            </div><!-- PANEL BODY -->
                        </div><!-- PANEL DEFAULT -->
                    </div>
                    <!-- FIM PAINEL AGENDAEMTOS -->

                    <div class="col-lg-4">
                     <div class="panel panel-default">
                         <div class="panel-heading">
                             Contatos Inseridos
                         </div><!-- PANEL BODY -->
                         <div class="panel-body">
                             <table class="table table-stripped">
                             <?
                                $cProspectContato = new Criteria();
                                $cProspectContato->add(ProspectContatoPeer::USUARIO_ID,$usuarioLogado->getId());
                                $prospectCont = ProspectContatoPeer::doSelect($cProspectContato);

                                if($prospectCont){
                                    foreach ($prospectCont as $contato){
                             ?>
                                        <tr>
                                           <td><?=$contato->getNome();?></td>
                                           <td><?=$contato->getFone();?></td>
                                        </tr>
                                    <?}?>
                             <?}?>
                             </table>
                         </div><!-- PANEL BODY -->
                     </div><!-- PANEL DEFAULT -->
                    </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-12">
                         <span style="float-right" >Vers&atilde;o do CRM v1.0.0</span>
                     </div>
                 </div>

         </div><!-- FIM ROW FLUID -->
         </div>
     </div><!-- FOM PAGE WRAPPER -->
</div><!-- FIM WRAPPER -->


<!--CARREGAMENTO DE TODOS OS MODAIS DA TELA-->
 <?
 /*if($_POST['atenderCliente'] || $_POST['idCertificado']) {
      include "modais/crm/modalCrmPainelPrincipal.php" ;
      include "modais/crm/modalCrmEpera.php" ;
      include "modais/crm/modalCrmDuplicarRenovacao.php";
      include "modais/crm/modalCrmReagadar.php" ;
      include "modais/crm/modalCrmFecharNegocio.php" ;
      include "modais/crm/modalCrmFecharNegocioJuridica.php";
      include "modais/crm/modalCrmFecharNegocioFisica.php" ;
      include "modais/crm/modalCrmEscolherProduto.php" ;
      include "modais/crm/modalCrmUltimoCertificados.php";
      include "modais/crm/modalCrmInformarPagamento.php";
      include "modais/crm/modalCrmRetencao.php";
      include "modais/crm/modalCrmInserirProspect.php";
      include "modais/crm/modalCrmObservacaoFinalizar.php";
      include "modais/crm/modalCrmEviarProposta.php";
      include "modais/crm/modalCrmManualUsuario.php";
      include "modais/crm/modalCrmInserirObservacao.php";
      include "modais/crm/modalCrmAguardandoResposta.php" ;

  }*/
  ?>

<? include "modais/crm/modalCrmLigacaoPassiva.php" ;?>

<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="js/datetime.js"></script>

<script>
    $(document).ready(function(){
        carregarProspects(undefined,undefined,undefined,'sim');
        carregarFiltrosProspects();
    })
</script>
</body>
</html>