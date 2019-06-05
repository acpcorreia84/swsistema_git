<script type="text/javascript">
    /*SE CLICOU NO BOTAO DE ATENDER O CLIENTE, INCLUO ESTA PAGINA E MOSTRO O MODAL*/
    modalCliente();
</script>
<?
if($_POST['atenderCliente']){
    $prospect = ProspectPeer::retrieveByPk($_POST['atenderCliente']);
}else{
    $cProspect = new Criteria();
    $cProspect->add(ProspectPeer::SITUACAO, 0);
    $cProspect->add(ProspectPeer::CERTIFICADO_ID, $_POST['idCertificado']);
    $cProspect->addDescendingOrderByColumn(ProspectPeer::ID);
    $prospect = ProspectPeer::doSelectOne($cProspect);
}

if($prospect){
    if(!$prospect->getDataPrimeiroContato()) {
        $prospect->setDataPrimeiroContato(date('Y-m-d H:i:s'));
    }
    $prospect->save();

    if($prospect->getCertificadoId()) {
        $cliente = ClientePeer::retrieveByPk($prospect->getCertificado()->getClienteId());
    }

    if($prospect->getContadorId()) {
        $cliente = ContadorPeer::retrieveByPk($prospect->getContadorId());
    }

    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    if($prospect->getCertificadoId()) {
        $cCertificado->add(CertificadoPeer::CLIENTE_ID, $cliente->getId());
    }elseif($prospect->getContadorId()) {
        $cCertificado->add(CertificadoPeer::CONTADOR_ID, $cliente->getId());
    }
    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
    $certificados = CertificadoPeer::doSelect($cCertificado);
}else{
    $cliente = ClientePeer::RetrieveByPk($_POST['idCliente']);

    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::CLIENTE_ID, $cliente->getId());
    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::ID);
    $certificado = CertificadoPeer::doSelectOne($cCertificado);

    try{
        $prospect = new Prospect();
        $prospect->setUsuarioId($usuarioLogado->getId());
        $prospect->setProspectTipoId(3);
        $prospect->setSituacao(0);
        $prospect->setCertificadoId($certificado->getId());
        $prospect->setDataCadastro(date('Y-m-d H:i:s'));
        $prospect->setDataPrimeiroContato(date('Y-m-d H:i:s'));
        $prospect->save();

        ?>
        <script>modalCliente();</script>
        <?

    }catch (Exception $e){
        erroEmail($e->getMessage(), "erro no script line 421 de novo prospect na tela de prospect");
        echo $e->getMessage();
        exit;
    }
}

?>
<input type="hidden" name="prospectId" id="prospectId" value="<?=$prospect->getId();?>">
<div id="atenderCl" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <table>
                    <tr>
                        <td>
                            <div class="container-fluid row bg-success">
                                <div class="col-lg-9">
                                    <label>Codigo CRM:</label> <?=$prospect->getId();?><?=' (ATIVO)';?><label> Codigo CD:</label> <?=$prospect->getCertificadoId();?><br/>
                                    <label>Atendimento ao</label><?
                                    if($prospect->getCertificadoId()) {
                                        echo "<label>Cliente:</label> ";
                                        if($cliente->getRazaoSocial())
                                            echo $cliente->getRazaoSocial();
                                        else
                                            echo $cliente->getNomeFantasia();
                                    }else
                                        if($prospect->getContadorId()) {
                                            echo "<label>Contador(a):</label> ";

                                            echo str_pad($prospect->getContadorId(),4,0,STR_PAD_LEFT)." - ";
                                            if($prospect->getContador()->getRazaoSocial) {
                                                echo $prospect->getContador()->getRazaoSocial();
                                            }elseif($prospect->getContador()->getNomeFantasia()){
                                                echo $prospect->getContador()->getNomeFantasia();
                                            }else {
                                                echo $prospect->getContador()->getNome();
                                            }
                                        }
                                    ?><br/>
                                    <label>Tipo:</label><?=utf8_encode($prospect->getProspectTipo()->getDescricao());?>
                                    <table>
                                        <tr>
                                            <td>
                                                    <label>Contatos:</label>
                                                    <span class="myTitle">
                                                        <?
                                                            if($cliente->getFone1()) { echo  $cliente->getFone1(); } else { echo ""; }
                                                            if($cliente->getFone2()){ echo  " / ".$cliente->getFone2(); }else { echo ""; }
                                                            if($cliente->getCelular()){ echo  " / ".$cliente->getCelular(); }else { echo ""; }
                                                        ?>
                                                    </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                    <label>Email:</label>
                                                    <span class="myTitle">
                                                            <?
                                                                if($cliente->getEmail()) { // VERIFICA SE EXISTE EMAIL NO REGISTRO
                                                                    echo  $cliente->getEmail();
                                                                } else {
                                                                    echo "";
                                                                }

                                                                if($prospect->getProspectTipoId() != 2) { // SE DIFERENTE DE COONTADOR
                                                                    if($cliente->getEmailContato()){
                                                                        echo  " / ".$cliente->getEmailContato();
                                                                    }else {
                                                                        echo "";
                                                                    }
                                                                }
                                                            ?>
                                                    </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-primary"  title="Ajuda/Dúvidas" data-toggle="modal" data-target="#sobreAtendimentoCrm"><i class="fa fa-question fa-lg"></i></button>
                                    <a href="<?=$_SERVER['REQUEST_URI'];?>" title="Fechar" class="btn btn-danger" name="edtFechar" id="edtFechar" ><i class="fa fa-close fa-lg"></i></a>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Tempo de Atendimento:
                                        </div>
                                        <div class="panel-body">
                                            <input type="text" name="cronometro" id="cronometro" value="00:00:00" disabled="disabled" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 ">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Forma de Atendimento:
                                        </div>
                                        <div class="panel-body">
                                            <button class="col-md-2 center-block btn btn-info" title="Iniciar Contato(Telefone)" id="telefone" onClick="iniciar_contato(1);iniciar_tempo();prospect_atendimento(1);"><i class="fa fa-lg fa-2x fa-phone"></i><br></button>
                                            <div class="col-md-1"></div>
                                            <button class="col-md-2 center-block btn btn-info" title="Iniciar Contato(Celular)" id="celular" onClick="iniciar_contato(2);iniciar_tempo();prospect_atendimento(2);"><i class="fa fa-lg fa-2x fa-mobile"></i><br></button>
                                            <div class="col-md-1"></div>
                                            <button class="col-md-2 center-block btn btn-info" title="Iniciar Contato(Email)" id="email" onClick="iniciar_contato(3);iniciar_tempo();prospect_atendimento(3);"><i class="fa fa-lg fa-2x fa-envelope"></i><br></button>
                                            <div class="col-md-1"></div>
                                            <button class="col-md-2 center-block btn btn-info" title="Iniciar Contato(Whastapp)" id="wpp" onClick="iniciar_contato(4);iniciar_tempo();prospect_atendimento(4);"><i class="fa fa-lg fa-2x fa-whatsapp"></i><br></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <button class="btn btn-primary" title="Inserir Observação"  data-toggle="modal" data-target="#inserirObservacao" disabled="disabled" id="ioBtnObservacao"><i class="fa fa-lg fa-2x fa-comment"></i></button>
                                            <button class="btn btn-warning" title="Colocar em Espera" name="edtEspera" id="edtEspera" data-toggle="modal" data-target="#espera" disabled="disabled"><i class="fa fa-lg fa-2x fa-tty"></i></button>
                                            <button class="btn btn-danger " title="Finalizar Atendimento" name="edtFinalizar" id="edtFinalizar" data-toggle="modal" data-target="#observacaoChamada" disabled="disabled" onClick="bancoLocal_read();"><i class="fa fa-lg fa-2x fa-power-off"></i></button>
                                        </div>
                                    </div>

                                    <button class="btn btn-default col-lg-4 center-block" name="edtInserirProspect" id="edtInserirProspect" data-toggle="modal" data-target="#inserir" disabled="disabled"><i class="fa fa-plus fa-lg fa-2x"></i><h5>Inserir<br/>Prospect</h5></button>

                                    <?
                                    /*SE O PROSPECT FOR CONTADOR OU COBRANCA OU RENOVACAO*/
                                    if($prospect->getProspectTipoId() == 1 ||  $prospect->getProspectTipoId() == 8) {?>
                                        <button class="btn btn-default col-lg-4 center-block" name="edtFecharNegocio" type="submit" id="edtFecharNegocio" data-toggle="modal" data-target="#informarPagto" disabled="disabled"><i class="fa fa-check fa-lg fa-2x"></i><h5>Fechar<br/> Negocio</h5></button>
                                    <?
                                    }else if($prospect->getProspectTipoId() == 3) {
                                        if ($prospect->getCertificado()) {
                                            $cliente_id = $prospect->getCertificado()->getClienteId();
                                            $pessoa_tipo = $prospect->getCertificado()->getCliente()->getPessoaTipo();
                                            $contador_id = $prospect->getCertificado()->getContadorId();
                                            $temDesconto = 0;
                                            if (($contador_id) && ($prospect->getCertificado()->getContador()->getDesconto()==1))
                                                $temDesconto = 1;

                                            $produto_id = $prospect->getCertificado()->getProdutoId();

                                        }
                                        $pSituacao = new Criteria();
                                        $pSituacao->add(ProspectSituacaoPeer::PROSPECT_ACAO_ID, 10); /*SE GEROU PEDIDO DE RENOVACAO*/
                                        $situacoes = $prospect->getProspectSituacaosJoinProspectAcao($pSituacao);
                                        /*montar_select_contadores(<?=$contador_id?>); montar_select_produtos('<?=$pessoa_tipo?>', '<?=$temDesconto?>','<?=$produto_id?>');*/

                                        if (count($situacoes)<=0) {/*SE JA REALIZOU UMA RENOVACAO*/?>
                                        <button class="btn btn-default col-lg-4 center-block" onclick="consultaClienteCertificado('<?=$pessoa_tipo?>', '<?=$cliente_id?>');" name="edtFecharNegocio" type="submit" id="edtFecharNegocio" data-toggle="modal" data-target="#duplicarRenovacao" disabled="disabled" ><i class="fa fa-check fa-lg fa-2x"></i><h5>Fechar<br/> Negocio</h5></button>
                                    <?
                                        }
                                    }
                                    else{?>

                                        <button class="btn btn-default col-lg-4 center-block" name="edtFecharNegocio" type="submit" id="edtFecharNegocio" data-toggle="modal" data-target="#fecharNegocio" disabled="disabled"><i class="fa fa-check fa-lg fa-2x"></i><h5>Fechar<br/> Negocio</h5></button>
                                    <?}?>
                                    <button class="btn btn-default col-lg-4 center-block" name="edtReagendar" id="edtReagendar" data-toggle="modal" data-target="#reagendamento" disabled="disabled"><i class="fa fa-calendar fa-lg fa-2x"></i><h5>Retorno<br/>Agendamento</h5></button>
                                    <button class="btn btn-default col-lg-4 center-block" onClick="consulta_certificado();" name="edtConsultaCertificados" id="edtConsultaCertificados" data-toggle="modal" data-target="#ultimosCD"><i class="fa fa-history fa-lg fa-2x"></i><h5>Ultimos<br/>Certificados</h5></button>
                                    <button class="btn btn-default col-lg-4 center-block" type="submit" name="edtEnviarProposta" id="edtEnviarProposta" disabled="disabled"><i class="fa fa-envelope fa-lg fa-2x"></i><h5>Enviar<br/> Prosposta<br/></h5></button>
                                    <button class="btn btn-danger  col-lg-4 center-block" type="submit" name="edtRetencaoCliente" id="edtRetencaoCliente" data-toggle="modal" data-target="#retencao" disabled="disabled"><i class="fa fa-close fa-lg fa-2x"></i><h5>Cancelamento<br/>Reten&ccedil;&atilde;o</h5></button>
                                </div>

                                <div class="col-lg-6">
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            Hisotrico:
                                        </div>
                                        <div class="panel-body">
                                            <iframe src='iframe/prospectHistorico.php?prospect_id=<?=$prospect->getId()?>' width="100%" height="300px"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>