<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$usuario_id = $_REQUEST['usuario_id'];
$funcao = $_REQUEST['funcao'];
$certificado_id = $_REQUEST['certificado_id'];

//VARIAVEL PARA A FUNÇÃO INSERIR OBSERVAÇÃO

if($funcao == 'carregarFaturamento') { carregar($usuario_id); }
if($funcao == 'detalharCertificado') {detalharCertificado($certificado_id,$usuarioLogado);}

function carregar ($usuario_id){
    try{
        $user = UsuarioPeer::retrieveByPK($usuario_id);
        $usuario_id = $user->getId();
        $perfilUsuarioLogado = $user->getPerfilId();
        $certQtd ='';
        $hora_ini = ' 00:00:00';
        $hora_fim = ' 23:59:59';
        $totalVenda = 0;
        $vendedoresRelatorio = '';
        $qtdCertificados = 0;
        $eNota = 0;
        $leitora = 0;
        $outrosCert=0;
        $retorno = $usuario_id.';';
        $tipoCds = array();
        $produtos = array();
        $objProdutos = ProdutoPeer::doSelect(new Criteria());
        foreach ($objProdutos as $produto) {
            $produtos[strtoupper($produto->getNome())] = $produto->getNome();
        }

        $cCertificado = new Criteria();
        $cCertificado->add(CertificadoPeer::APAGADO, 0);

        //SE O PERFIL NAO FOR DIRETORIA, MOSTRA APENAS OS CDS DAQUELE USUARIO
        if ($perfilUsuarioLogado!= 4) {
            // SE O PERFIL FOR SUPERVISÃO CONSULTA POR LOCALIDADE
            if($user->getPerfilId() == 1) {
                $cCertificado->add(CertificadoPeer::LOCAL_ID, $user->getLocalId());
            }else {
                $cCertificado->add(CertificadoPeer::USUARIO_ID, $user->getId());
            }
            $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR, 1);
        }

        if ( ($_GET['edtDataDe']) && ($_GET['edtDataAte']) ) {
            $dataDe = explode('/',$_GET['edtDataDe']);
            $dataAte = explode('/',$_GET['edtDataAte']);
            $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2].'/'.$dataDe[1].'/'.($dataDe[0]).$hora_ini, Criteria::GREATER_THAN);
            $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0].$hora_fim, Criteria::LESS_EQUAL);
        } else {
            $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y-m-01') . $hora_ini, Criteria::GREATER_EQUAL);
            $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y-m-') . getLastDayOfMonth(date('10'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
        }

        $certificadosQtds = CertificadoPeer::doSelectJoinAll($cCertificado);

        if($certificadosQtds) {
            foreach ($certificadosQtds as $key=>$certificado) {
                $qtdCertificados++;
                $tipoCds[strtoupper($certificado->getProduto()->getNome())] += 1;
                $idProduto = $certificado->getProdutoId();
                if ($idProduto == '90'|| $idProduto =='15'){
                    $preco = $certificado->getProduto()->getPreco() - ($certificado->getDesconto());
                    $eNota = $eNota + $preco;
                }else if ($idProduto == '102'||$idProduto =='101'||$idProduto =='98'||$idProduto =='91'||$idProduto =='56'||$idProduto =='55'||$idProduto =='36'||$idProduto =='35'||$idProduto =='33'||$idProduto =='31'){
                    $preco = $certificado->getProduto()->getPreco() - ($certificado->getDesconto());
                    $leitora = $leitora + $preco;
                }else{
                    $preco = $certificado->getProduto()->getPreco() - ($certificado->getDesconto());
                    $outrosCert = $outrosCert + $preco;
                }
                /* ALTERACAO DEVIDO A MUDANCA DE PRECOS */
                if ( $certificado->getDataCompra() <= '2013-06-09' ){
                    $totalVenda += $certificado->getProduto()->getPrecoAntigo() - ($certificado->getDesconto()) ;
                }else{
                    $totalVenda += $certificado->getProduto()->getPreco() - ($certificado->getDesconto()) ;
                }

                /* ALTERACAO DEVIDO A MUDANCA DE PRECOS */
                if (($certificado->getUsuario()) && (strstr($vendedoresRelatorio, $certificado->getUsuario()->getNome()) === false))
                    $vendedoresRelatorio .= $certificado->getUsuario()->getNome() . ';<br/> ';
            }
        }

        $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO);
        $certificados = CertificadoPeer::doSelectJoinAll($cCertificado);

        if($certificados){

            $retorno .= '<thead>';
            $retorno .= '<tr>';
            $retorno .= '<td align="center">Codigo</td>';
            $retorno .= '<td align="center">Pgto</td>';
            $retorno .= '<td align="center">Dt. Pgto</td>';
            $retorno .= '<td align="center">Protocolo</td>';
            $retorno .= '<td align="center">Cliente</td>';
            $retorno .= '<td align="center">Tito de certificado</td>';
            $retorno .= '<td align="center">Local</td>';
            $retorno .= '<td align="center">Valor</td>';
            $retorno .= '<td align="center">Situacao</td>';
            $retorno .= '<td align="center"  >Acao</td>';
            $retorno .= '</tr>';
            $retorno .= '</thead>';

            foreach ($certificados as $key => $certificado) {
                $idCertificado = str_pad($certificado->getId(), 4, 0, STR_PAD_LEFT);

                $cSit = new Criteria();
                $cSit->add(CertificadoSituacaoPeer::CERTIFICADO_ID,$certificado->getId());
                $cSit->addDescendingOrderByColumn(CertificadoSituacaoPeer::ID);
                $situacoes = CertificadoSituacaoPeer::doSelect($cSit);
                if($certificado->getConfirmacaoValidacao() <> 0){
                    if($certificado->getConfirmacaoValidacao() == 1) {
                        $titulo = 'APROVADO';
                        $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#096" title="'.$titulo.'" ></i></span>';
                    }
                    elseif( ($certificado->getConfirmacaoValidacao() == 2) || ($certificado->getConfirmacaoValidacao() == 3)) {
                        $titulo = 'PENDENTE';
                        $situacaoCert = '<span class="totais_menor">PENDENTE <i class="fa fa-flag" style="color:#FF0" title="'.$titulo.'" ></i></span>';
                    }elseif($certificado->getConfirmacaoValidacao() == 4) {
                        $titulo = 'REVOGADO';
                        $situacaoCert = '<span class="totais_menor">REVOGADO <i class="fa fa-flag" style="color:#f00" title="' . $titulo . '" ></i></span>';
                    }else {
                        $titulo = 'SEM STATUS';
                        $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#FF0" title="'.$titulo.'" ></i></span>';
                    }
                }	else {
                    if($situacoes[0]->getSituacao()->getId() == 6)
                        $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#F60" title="PENDENTE NA SAFEWEB" ></i></span>';
                    else
                        $situacaoCert = $situacoes[0]->getSituacao()->getNome();
                }
                if ($certificado->getDataPagamento()) {
                    $confirmacaoPagamento = $certificado->getDataPagamento('d/m/Y');
                } else {
                    $confirmacaoPagamento = '----';
                }
                if ($certificado->getProtocolo() != 0) { $protocolo = $certificado->getProtocolo(); } else { $protocolo = "---"; }
                if ($certificado->getCliente()->getRazaoSocial() != '') {
                    $nome = $certificado->getCliente()->getId() . ' - ' . removeEspeciais($certificado->getCliente()->getRazaoSocial());
                } else {
                    $nome = $certificado->getCliente()->getId() . ' - ' . removeEspeciais($certificado->getCliente()->getNomeFantasia());
                }

                $preco = $certificado->getProduto()->getPreco();
                $nomeProduto = $certificado->getProduto()->getNome();
                if ($certificado->getLocal() !== NULL) { $local = $certificado->getLocal()->getNome(); } else { echo '---'; }

                /* ALTERACAO DEVIDO A MUDANCA DE PRECOS */
                if ($certificado->getDesconto() !== 0) { $valor = formataMoeda(($preco) - ($certificado->getDesconto())); }
                $retornoFuncao = "'detalharCertificado'";

                $retorno .= '<tbody class="small">';
                $retorno .= '<tr'.corLinhaTabela($key).'>';
                $retorno .= '<td align="center" valign="top" >' . $idCertificado . '</td>';
                $retorno .= '<td align="center" valign="top" >';
                if($confirmacaoPagamento){
                    $retorno .= '<i class="fa fa-circle" style="color: #096"></i> <i class="fa fa-check" style="color: #096" ></i>';
                }
                $retorno .= '</td>';
                $retorno .= '<td align="left" valign="top" >' . $confirmacaoPagamento . '</td>';
                $retorno .= '<td align="left" valign="top" >' . $protocolo . '</td>';
                $retorno .= '<td align="left" valign="top" >' . removeEspeciais($nome) . '</td>';
                $retorno .= '<td align="left" valign="top" >' . removeEspeciais($nomeProduto) . '</td>';
                $retorno .= '<td align="left" valign="middle" >' . removeEspeciais($local) . '</td>';
                $retorno .= '<td align="center" >' . $valor . '</td>';
                $retorno .= '<td align="center" >' . $situacaoCert . '</td>';
                $retorno .= '<td align="center" >
                                    <a data-toggle="modal" data-target="#visualizarProtocolo" title="visualizar Protocolo"> <i class="fa fa-lg fa-search-plus" onclick="detalhar(' . $idCertificado . ',' . $retornoFuncao . ')"></i> </a>
                            </td>';
                $retorno .= '</tr>';
                $retorno .= '</tbody>';
            }
        }

        foreach ($tipoCds as $key=>$qtd) {
            $certQtd .= $produtos[$key].': '.$qtd.'</br>';
        }

        $retorno .= ';'.formataQtd ($qtdCertificados, 2).';'.formataMoeda($totalVenda).';'.removeEspeciais($certQtd).';'.formataMoeda($eNota).';'.formataMoeda($leitora).';'.formataMoeda($outrosCert).';'.$idProduto.';0';
        echo $retorno;
    }catch (Exception $e){
        $user = UsuarioPeer::retrieveByPK($usuario_id);
        erroEmail($e->getMessage(),$user->getNome());
        echo $e->getMessage();
    }
}

function detalharCertificado($certificado_id,$usuarioLogado){

    try {
        //Consulta Certificado
        $certificado = CertificadoPeer::retrieveByPk($certificado_id);
        $vendedor = $certificado->getUsuario()->getNome();
        $idCliente = $certificado->getClienteId();
        $cliente = ClientePeer::retrieveByPk($idCliente);
        $nomeCliente = $cliente->getRazaoSocial();
        if (isset($nomeCliente) && $nomeCliente != null && $nomeCliente != ''){
            $nomeCliente = $nomeCliente;
        }else{
            $nomeCliente = $cliente->getNomeFantasia();
        }
        //Resumo
        $nomeProduto = removeEspeciais($certificado->getProduto()->getNome());
        $formapgto = $certificado->getFormaPagamento()->getNome();
        $preco = $certificado->getProduto()->getPreco();
        $desconto = $certificado->getDesconto();
        $valor = $preco - $desconto;
        if ($formapgto == 'Boleto') {
            //Consulta Boleto
            $cBoleto = new Criteria();
            $cBoleto->add(BoletoPeer::CERTIFICADO_ID,$certificado_id);
            $dataPagamento = $certificado->getDataPagamento('d/m/Y');
            $dataConfirmacaoPagamento = $certificado->getDataConfirmacaoPagamento('d/m/Y');
            if (isset($dataConfirmacaoPagamento) && $dataConfirmacaoPagamento != NULL && $dataConfirmacaoPagamento != '0000-00-00 00:00:00') {
                $cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_CONFIRMACAO_PAGAMENTO);
                $dataPagamento = $dataConfirmacaoPagamento;
            }elseif (isset($dataPagamento) && $dataPagamento != null && $dataPagamento != '0000-00-00' ) {
                $cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_PAGAMENTO);
                $dataPagamento = $dataPagamento;
            }else{
                $cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_VENCIMENTO);
                $dataPagamento = "--/--/----";
            }
            $boleto = BoletoPeer::doSelectOne($cBoleto);
            if(isset($boleto) && $boleto != null){
                $numeroBoleto = $boleto->getId();
            }else{
                $numeroBoleto = "-----";
            }
        }else{
            $numeroBoleto = "-----";
            $dataPagamento = $certificado->getDataPagamento('d/m/Y');

        }

        if($certificado->getProtocolo()){
            $protocolo = $certificado->getProtocolo();
        }else {
            $protocolo = "-----";
        }

        $local = $certificado->getLocal()->getNome();

        $cAgendamento = new Criteria();
        $cAgendamento->add(AgendamentoPeer::CERTIFICADO_ID,$certificado_id);
        $cAgendamento->addDescendingOrderByColumn(AgendamentoPeer::ID,DATA_AGENDAMENTO);
        $agendamento = AgendamentoPeer::doSelectOne($cAgendamento);

        if ($agendamento) {
            $dtAgendamento = $agendamento->getDataAgendamento('d/m/Y');
        }else{
            $dtAgendamento = "----";
        }

        //Consulta  certificado_situacao
        $cCertificadoSituacao = new Criteria();
        $cCertificadoSituacao->add(CertificadoSituacaoPeer::CERTIFICADO_ID,$certificado_id);
        $certificadoSituacoes = CertificadoSituacaoPeer::doSelect($cCertificadoSituacao);
        $vResultadoSituacao = "";
        if (isset($certificadoSituacoes)) {
            foreach ($certificadoSituacoes as $certificadoSituacao) {
                $dataSituacao = $certificadoSituacao->getData('d/m/Y H:i:s');

                //Consulta situacao
                $situacao_id = $certificadoSituacao->getSituacaoId();
                $situacao = SituacaoPeer::retrieveByPk($situacao_id);
                $nomeSituacao = $situacao->getNome();
                $idUsuario= $certificadoSituacao->getUsuarioId();
                if (isset($idUsuario) && $idUsuario!='0' && $idUsuario!=null) {
                    $usuarioSituacao = $certificadoSituacao->getUsuario()->getNome();
                }else{
                    $usuarioSituacao = "  ";
                }

                $vResultadoSituacao .="<div class='text-danger'><small>(".$dataSituacao.") ".$nomeSituacao." - ".$usuarioSituacao."</small></div>";
            }
        }else{
            $vResultadoSituacao = "-----";
        }

        if((($certificado->getDataPagamento() != NULL) && $certificado->getDataPagamento() != '0000-00-00 00:00:00' ) ||
            (($certificado->getDataConfirmacaoPagamento() != NULL) && ($certificado->getDataConfirmacaoPagamento()!='0000-00-00 00:00:00'))){
            if (!$certificado->getProtocolo()){
                $parametroProtocolo = '"gerarProtocolo",'.$usuarioLogado->getId();
                $gerarProtocolo= " <button id='limpar' class='btn btn-primary' title='Gerar Protocolo' data-toggle='modal' data-target='#gerarProtocolo' onclick='gerarProtocolo(".$parametroProtocolo.")' ><i class='fa fa-internet-explorer fa-lg'></i></button>";
            }
        }

        $retorno = $certificado_id.';'.$idCliente.";".formataMoeda($preco).";".formataMoeda($desconto).";".removeEspeciais($vendedor).";".removeEspeciais($nomeProduto).";".removeEspeciais($formapgto).";".formataMoeda($valor).";".$numeroBoleto.";".$protocolo.";".removeEspeciais($local).";".$dtAgendamento.";".$dataPagamento.";".removeEspeciais($vResultadoSituacao).';'.$nomeCliente.';'.$gerarProtocolo;

        echo $retorno;

    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function gerarMeuProtocolo($certificado_id,$usuario_id){
    try{
        $certificado = CertificadoPeer::retrieveByPK($certificado_id);

        $ws = new WSCertificado();
        if ($certificado->getCliente()->getPessoaTipo() == 'F') { //SE FOR PESSOA F?SICA
            //CONSULTA PREVIA CPF
            if($certificado->getCliente()->getFone1()){
                $foneCliente = $certificado->getCliente()->getFone1();
                $foneCliente = explode(" ",$foneCliente);
            }elseif($foneCliente = $certificado->getCliente()->getCelular()){
                $foneCliente = $certificado->getCliente()->getCelular();
                $foneCliente = explode(" ",$foneCliente);
            }

            ob_start();                      // start capturing output
            $cpf = $ws->consultarCPF(removeTracoPontoBarra($certificado->getCliente()->getCpfCnpj()), $certificado->getCliente()->getNascimento('d/m/Y'));
            $mensagemErro = ob_get_contents();    // get the contents from the buffer
            ob_end_clean();

            if (!$mensagemErro) { //SE N?O TROUXE NENHUMA MENSAGEM DE ERRO FA?A
                $solicitacao = $ws->solicitarCertificadoPF(
                    $certificado->getProduto()->getCodigo(),
                    $cpf['Nome'],
                    $cpf['CPF'],
                    $cpf['DataNascimento'],
                    // 	contato
                    array(
                        'DDD' => $foneCliente[0],
                        'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                        'Email' => removeEspeciais($certificado->getCliente()->getEmail())
                    ),
                    // 	endereco
                    array(
                        'Logradouro' => removeEspeciais($certificado->getCliente()->getEndereco()),
                        'Numero' => removeEspeciais($certificado->getCliente()->getNumero()),
                        'Complemento' => removeEspeciais($certificado->getCliente()->getComplemento()),
                        'Bairro' => removeEspeciais($certificado->getCliente()->getBairro()),
                        'Cidade' => removeEspeciais($certificado->getCliente()->getCidade()),
                        'UF' => removeEspeciais($certificado->getCliente()->getUf()),
                        'CEP' => removeEspeciais($certificado->getCliente()->getCep()),
                    ),
                    // 	documento
                    array(),
                    array()
                );
                $certificado->setProtocolo($solicitacao);
                $certificado->save();

                $certSit = new CertificadoSituacao();
                $certSit->setCertificadoId($certificado->getId());
                $cSit = new Criteria();
                if ($usuario_id != 0)
                    $certSit->setUsuarioId($usuario_id);
                $cSit->add(SituacaoPeer::SIGLA, 'ger_prot');
                $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                $certSit->setComentario('Gerou Protocolo pelo sistema');
                $certSit->setData(date("Y-m-d H:i:s",mtime()));
                $certSit->save();

                //js_aviso($solicitacao);
                echo $solicitacao.'; 0';
            }else{
                js_aviso("Erro na consulta previa de CPF");
            }
        } //Se o Cliente for Pessoa Juridica! (Sem problemas)
        else { //SE FOR PESSOA JUR?DICA
            //CONSULTA PREVIA POR CNPJ
            $produtoCodigo = $certificado->getProduto()->getCodigo();
            $email = $certificado->getCliente()->getEmail();
            $enderecoEmpresa= $certificado->getCliente()->getEndereco();
            $numeroEmpresa = $certificado->getCliente()->getNumero();
            $complementoEmpresa = $certificado->getCliente()->getComplemento();
            $bairroEmpresa = $certificado->getCliente()->getBairro();
            $cidadeEmpresa = $certificado->getCliente()->getCidade();
            $ufEmpresa = $certificado->getCliente()->getUf();
            $cepEmpresa = $certificado->getCliente()->getCep();
            // DADOS DO CLIENTE
            if($certificado->getCliente()->getResponsavel()->getFone1()){
                $foneCliente = $certificado->getCliente()->getResponsavel()->getFone1();
                $foneCliente = explode(" ",$foneCliente);
            }elseif($foneCliente = $certificado->getCliente()->getResponsavel()->getCelular()){
                $foneCliente = $certificado->getCliente()->getResponsavel()->getCelular();
                $foneCliente = explode(" ",$foneCliente);
            }

            $cpfResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCpf();
            $emailResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getEmail();
            $enderecoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getEndereco();
            $numeroResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getNumero();
            $complementoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getComplemento();
            $bairroResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getBairro();
            $cidadeResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCidade();
            $ufResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getUf();
            $cepResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCep();
            $dataNascimentoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getNascimento('d/m/Y');
            $cnpjEmpresa = $certificado->getCliente()->getCpfCnpj();

            //try {

            ob_start();                      // start capturing output
            $cnpj = $ws->consultarCNPJ(removeTracoPontoBarra($cpfResponsavelEmpresa), $dataNascimentoResponsavelEmpresa, removeTracoPontoBarra($cnpjEmpresa));
            //Definição da variavel $cnpj
            $mensagemErro = ob_get_contents();    // get the contents from the buffer {Mensagem de Erro}
            ob_end_clean();
            if (!$mensagemErro) { //SE N?O TROUXE NENHUMA MENSAGEM DE ERRO FA?A
                //solicitar protocolo para pj
                $solicitacao = $ws->solicitarCertificadoPJ(
                    $produtoCodigo,
                    $cnpj['RazaoSocial'],
                    $cnpj['CNPJ'],
                    // 	contato empresa
                    array(
                        'DDD' => $foneCliente[0],
                        'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                        'Email' => removeEspeciais($email)
                    ),
                    // 	endere?o empresa
                    array(
                        'Logradouro' => removeEspeciais($enderecoEmpresa),
                        'Numero' => removeEspeciais($numeroEmpresa),
                        'Complemento' => removeEspeciais($numeroEmpresa),
                        'Bairro' => removeEspeciais($bairroEmpresa),
                        'Cidade' => removeEspeciais($cidadeEmpresa),
                        'UF' => removeEspeciais($ufEmpresa),
                        'CEP' => removeEspeciais($cepEmpresa),
                    ),
                    // 	titular dados
                    array(
                        'Nome' 			=> $cnpj['Nome'],
                        'Cpf' 			=> removeTracoPontoBarra($cpfResponsavelEmpresa),
                        'DataNascimento' => $cnpj['DataNascimento'],
                    ),
                    // 	titular contato
                    array(
                        'DDD' => $foneCliente[0],
                        'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                        'Email' => removeEspeciais($emailResponsavelEmpresa)
                    ),
                    // 	titular endere?o
                    array(
                        'Logradouro' => removeEspeciais($enderecoResponsavelEmpresa),
                        'Numero' => removeEspeciais($numeroResponsavelEmpresa),
                        'Complemento' => removeEspeciais($complementoResponsavelEmpresa),
                        'Bairro' => removeEspeciais($bairroResponsavelEmpresa),
                        'Cidade' => removeEspeciais($cidadeResponsavelEmpresa),
                        'UF' => removeEspeciais($ufResponsavelEmpresa),
                        'CEP' => removeEspeciais($cepResponsavelEmpresa),
                    ),
                    array(),
                    array()
                ); //Criação do Array

                $certificado->setProtocolo($solicitacao);
                $certificado->save();

                $certSit = new CertificadoSituacao();
                $certSit->setCertificadoId($certificado->getId());
                if ($usuario_id!=0)
                    $certSit->setUsuarioId($usuario_id);
                $certSit->setSituacaoId(12);
                $certSit->setComentario('Gerou Protocolo pelo sistema'); //Passar Campo pelo JavasScript
                $certSit->setData(date("Y-m-d H:i:s",mtime()));
                $certSit->save();

                //js_aviso($solicitacao);
                echo $solicitacao.';0';
            }else{
                js_aviso("Erro na consulta do CNPJ");
            } // Protocolo sem Erro!
        }
    }catch (Exception $e){
        //erroEmail($e->getMessage(),"Erro na funcao de gerar protocolos");
        echo $e->getMessage();
    }
};
