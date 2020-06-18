<?php
// This file generated by Propel  convert-conf target
// from XML runtime conf file C:\xampp\htdocs\swsistema\classes\propel-gen\propel\generator\swsistema\runtime-conf.xml
return array (
    'datasources' =>
        array (
            'swsistema' =>
                array (
                    'adapter' => 'sqlite',
                    'connection' =>
                        array (
                            'classname' => 'DebugPDO',
                            'dsn' => 'mysql:host=localhost;dbname=swsistem_principal',
                            'user' => 'swsistem_master',
                            'password' => 'NP%?4fLuXhsV',
                            'options' =>
                                array (
                                    'ATTR_PERSISTENT' =>
                                        array (
                                            'value' => false,
                                        ),
                                ),
                            'attributes' =>
                                array (
                                    'ATTR_EMULATE_PREPARES' =>
                                        array (
                                            'value' => true,
                                        ),
                                ),
                        ),
                ),
            'default' => 'swsistema',
        ),
    'log' =>
        array (
            'name' => 'propel.log',
            'ident' => 'log_sw',
            'level' => '0',
        ),
    'generator_version' => '1.4.1',
    'classmap' =>
        array (
            'ParceiroTableMap' => 'pacoteParceiro/map/ParceiroTableMap.php',
            'ParceiroPeer' => 'pacoteParceiro/ParceiroPeer.php',
            'Parceiro' => 'pacoteParceiro/Parceiro.php',
            'ParceiroComissionamentoTableMap' => 'pacoteParceiro/map/ParceiroComissionamentoTableMap.php',
            'ParceiroComissionamentoPeer' => 'pacoteParceiro/ParceiroComissionamentoPeer.php',
            'ParceiroComissionamento' => 'pacoteParceiro/ParceiroComissionamento.php',
            'ParceiroLancamentoTableMap' => 'pacoteParceiro/map/ParceiroLancamentoTableMap.php',
            'ParceiroLancamentoPeer' => 'pacoteParceiro/ParceiroLancamentoPeer.php',
            'ParceiroLancamento' => 'pacoteParceiro/ParceiroLancamento.php',
            'ParceiroUsuarioTipoTableMap' => 'pacoteParceiro/map/ParceiroUsuarioTipoTableMap.php',
            'ParceiroUsuarioTipoPeer' => 'pacoteParceiro/ParceiroUsuarioTipoPeer.php',
            'ParceiroUsuarioTipo' => 'pacoteParceiro/ParceiroUsuarioTipo.php',
            'ParceiroUsuarioTableMap' => 'pacoteParceiro/map/ParceiroUsuarioTableMap.php',
            'ParceiroUsuarioPeer' => 'pacoteParceiro/ParceiroUsuarioPeer.php',
            'ParceiroUsuario' => 'pacoteParceiro/ParceiroUsuario.php',
            'UsuarioTableMap' => 'pacoteUsuario/map/UsuarioTableMap.php',
            'UsuarioPeer' => 'pacoteUsuario/UsuarioPeer.php',
            'Usuario' => 'pacoteUsuario/Usuario.php',
            'UsuarioComissionamentoTableMap' => 'pacoteUsuario/map/UsuarioComissionamentoTableMap.php',
            'UsuarioComissionamentoPeer' => 'pacoteUsuario/UsuarioComissionamentoPeer.php',
            'UsuarioComissionamento' => 'pacoteUsuario/UsuarioComissionamento.php',
            'UsuarioLancamentoTableMap' => 'pacoteUsuario/map/UsuarioLancamentoTableMap.php',
            'UsuarioLancamentoPeer' => 'pacoteUsuario/UsuarioLancamentoPeer.php',
            'UsuarioLancamento' => 'pacoteUsuario/UsuarioLancamento.php',
            'CargoTableMap' => 'pacoteUsuario/map/CargoTableMap.php',
            'CargoPeer' => 'pacoteUsuario/CargoPeer.php',
            'Cargo' => 'pacoteUsuario/Cargo.php',
            'PerfilTableMap' => 'pacoteUsuario/map/PerfilTableMap.php',
            'PerfilPeer' => 'pacoteUsuario/PerfilPeer.php',
            'Perfil' => 'pacoteUsuario/Perfil.php',
            'PermissaoTableMap' => 'pacoteUsuario/map/PermissaoTableMap.php',
            'PermissaoPeer' => 'pacoteUsuario/PermissaoPeer.php',
            'Permissao' => 'pacoteUsuario/Permissao.php',
            'GrupoPermissaoTableMap' => 'pacoteUsuario/map/GrupoPermissaoTableMap.php',
            'GrupoPermissaoPeer' => 'pacoteUsuario/GrupoPermissaoPeer.php',
            'GrupoPermissao' => 'pacoteUsuario/GrupoPermissao.php',
            'PerfilPermissaoTableMap' => 'pacoteAcesso/map/PerfilPermissaoTableMap.php',
            'PerfilPermissaoPeer' => 'pacoteAcesso/PerfilPermissaoPeer.php',
            'PerfilPermissao' => 'pacoteAcesso/PerfilPermissao.php',
            'AgendamentoTableMap' => 'pacoteComum/map/AgendamentoTableMap.php',
            'AgendamentoPeer' => 'pacoteComum/AgendamentoPeer.php',
            'Agendamento' => 'pacoteComum/Agendamento.php',
            'AcaoTableMap' => 'pacoteComum/map/AcaoTableMap.php',
            'AcaoPeer' => 'pacoteComum/AcaoPeer.php',
            'Acao' => 'pacoteComum/Acao.php',
            'LogSeramaTableMap' => 'pacoteComum/map/LogSeramaTableMap.php',
            'LogSeramaPeer' => 'pacoteComum/LogSeramaPeer.php',
            'LogSerama' => 'pacoteComum/LogSerama.php',
            'LogAcessoTableMap' => 'pacoteComum/map/LogAcessoTableMap.php',
            'LogAcessoPeer' => 'pacoteComum/LogAcessoPeer.php',
            'LogAcesso' => 'pacoteComum/LogAcesso.php',
            'SetorTableMap' => 'pacoteUsuario/map/SetorTableMap.php',
            'SetorPeer' => 'pacoteUsuario/SetorPeer.php',
            'Setor' => 'pacoteUsuario/Setor.php',
            'ResponsavelTableMap' => 'pacoteResponsavel/map/ResponsavelTableMap.php',
            'ResponsavelPeer' => 'pacoteResponsavel/ResponsavelPeer.php',
            'Responsavel' => 'pacoteResponsavel/Responsavel.php',
            'FormaPagamentoTableMap' => 'pacoteFinanceiro/map/FormaPagamentoTableMap.php',
            'FormaPagamentoPeer' => 'pacoteFinanceiro/FormaPagamentoPeer.php',
            'FormaPagamento' => 'pacoteFinanceiro/FormaPagamento.php',
            'CertificadoSituacaoTableMap' => 'pacoteCertificado/map/CertificadoSituacaoTableMap.php',
            'CertificadoSituacaoPeer' => 'pacoteCertificado/CertificadoSituacaoPeer.php',
            'CertificadoSituacao' => 'pacoteCertificado/CertificadoSituacao.php',
            'SituacaoTableMap' => 'pacoteCertificado/map/SituacaoTableMap.php',
            'SituacaoPeer' => 'pacoteCertificado/SituacaoPeer.php',
            'Situacao' => 'pacoteCertificado/Situacao.php',
            'FornecedorTableMap' => 'pacoteProduto/map/FornecedorTableMap.php',
            'FornecedorPeer' => 'pacoteProduto/FornecedorPeer.php',
            'Fornecedor' => 'pacoteProduto/Fornecedor.php',
            'CuponsDescontoCertificadoTableMap' => 'pacoteCertificado/map/CuponsDescontoCertificadoTableMap.php',
            'CuponsDescontoCertificadoPeer' => 'pacoteCertificado/CuponsDescontoCertificadoPeer.php',
            'CuponsDescontoCertificado' => 'pacoteCertificado/CuponsDescontoCertificado.php',
            'ProdutoTableMap' => 'pacoteProduto/map/ProdutoTableMap.php',
            'ProdutoPeer' => 'pacoteProduto/ProdutoPeer.php',
            'Produto' => 'pacoteProduto/Produto.php',
            'LocalProdutoTableMap' => 'pacoteProduto/map/LocalProdutoTableMap.php',
            'LocalProdutoPeer' => 'pacoteProduto/LocalProdutoPeer.php',
            'LocalProduto' => 'pacoteProduto/LocalProduto.php',
            'LocalUsuarioTableMap' => 'pacoteUsuario/map/LocalUsuarioTableMap.php',
            'LocalUsuarioPeer' => 'pacoteUsuario/LocalUsuarioPeer.php',
            'LocalUsuario' => 'pacoteUsuario/LocalUsuario.php',
            'LocalTableMap' => 'pacoteComum/map/LocalTableMap.php',
            'LocalPeer' => 'pacoteComum/LocalPeer.php',
            'Local' => 'pacoteComum/Local.php',
            'ImportacaoTableMap' => 'pacoteComum/map/ImportacaoTableMap.php',
            'ImportacaoPeer' => 'pacoteComum/ImportacaoPeer.php',
            'Importacao' => 'pacoteComum/Importacao.php',
            'CertificadoForaSistemaTableMap' => 'pacoteCertificado/map/CertificadoForaSistemaTableMap.php',
            'CertificadoForaSistemaPeer' => 'pacoteCertificado/CertificadoForaSistemaPeer.php',
            'CertificadoForaSistema' => 'pacoteCertificado/CertificadoForaSistema.php',
            'CertificadoCupomTableMap' => 'pacoteCertificado/map/CertificadoCupomTableMap.php',
            'CertificadoCupomPeer' => 'pacoteCertificado/CertificadoCupomPeer.php',
            'CertificadoCupom' => 'pacoteCertificado/CertificadoCupom.php',
            'CertificadoTableMap' => 'pacoteCertificado/map/CertificadoTableMap.php',
            'CertificadoPeer' => 'pacoteCertificado/CertificadoPeer.php',
            'Certificado' => 'pacoteCertificado/Certificado.php',
            'CertificadoPagamentoTableMap' => 'pacoteCertificado/map/CertificadoPagamentoTableMap.php',
            'CertificadoPagamentoPeer' => 'pacoteCertificado/CertificadoPagamentoPeer.php',
            'CertificadoPagamento' => 'pacoteCertificado/CertificadoPagamento.php',
            'CertificadoProtocoloTableMap' => 'pacoteCertificado/map/CertificadoProtocoloTableMap.php',
            'CertificadoProtocoloPeer' => 'pacoteCertificado/CertificadoProtocoloPeer.php',
            'CertificadoProtocolo' => 'pacoteCertificado/CertificadoProtocolo.php',
            'ClienteTableMap' => 'pacoteCliente/map/ClienteTableMap.php',
            'ClientePeer' => 'pacoteCliente/ClientePeer.php',
            'Cliente' => 'pacoteCliente/Cliente.php',
            'ClienteContatoTableMap' => 'pacoteCliente/map/ClienteContatoTableMap.php',
            'ClienteContatoPeer' => 'pacoteCliente/ClienteContatoPeer.php',
            'ClienteContato' => 'pacoteCliente/ClienteContato.php',
            'ClienteCadastroTableMap' => 'pacoteCliente/map/ClienteCadastroTableMap.php',
            'ClienteCadastroPeer' => 'pacoteCliente/ClienteCadastroPeer.php',
            'ClienteCadastro' => 'pacoteCliente/ClienteCadastro.php',
            'ClienteHistoricoTableMap' => 'pacoteCliente/map/ClienteHistoricoTableMap.php',
            'ClienteHistoricoPeer' => 'pacoteCliente/ClienteHistoricoPeer.php',
            'ClienteHistorico' => 'pacoteCliente/ClienteHistorico.php',
            'ContadorTableMap' => 'pacoteContador/map/ContadorTableMap.php',
            'ContadorPeer' => 'pacoteContador/ContadorPeer.php',
            'Contador' => 'pacoteContador/Contador.php',
            'ContadorComissionamentoTableMap' => 'pacoteContador/map/ContadorComissionamentoTableMap.php',
            'ContadorComissionamentoPeer' => 'pacoteContador/ContadorComissionamentoPeer.php',
            'ContadorComissionamento' => 'pacoteContador/ContadorComissionamento.php',
            'ContadorLancamentoTableMap' => 'pacoteContador/map/ContadorLancamentoTableMap.php',
            'ContadorLancamentoPeer' => 'pacoteContador/ContadorLancamentoPeer.php',
            'ContadorLancamento' => 'pacoteContador/ContadorLancamento.php',
            'ContadorContatoTableMap' => 'pacoteContador/map/ContadorContatoTableMap.php',
            'ContadorContatoPeer' => 'pacoteContador/ContadorContatoPeer.php',
            'ContadorContato' => 'pacoteContador/ContadorContato.php',
            'ContatoTableMap' => 'pacoteContato/map/ContatoTableMap.php',
            'ContatoPeer' => 'pacoteContato/ContatoPeer.php',
            'Contato' => 'pacoteContato/Contato.php',
            'ContadorDetalharTableMap' => 'pacoteContador/map/ContadorDetalharTableMap.php',
            'ContadorDetalharPeer' => 'pacoteContador/ContadorDetalharPeer.php',
            'ContadorDetalhar' => 'pacoteContador/ContadorDetalhar.php',
            'BoletoTableMap' => 'pacoteFinanceiro/map/BoletoTableMap.php',
            'BoletoPeer' => 'pacoteFinanceiro/BoletoPeer.php',
            'Boleto' => 'pacoteFinanceiro/Boleto.php',
            'ReciboTableMap' => 'pacoteFinanceiro/map/ReciboTableMap.php',
            'ReciboPeer' => 'pacoteFinanceiro/ReciboPeer.php',
            'Recibo' => 'pacoteFinanceiro/Recibo.php',
            'CaixaTableMap' => 'pacoteFinanceiro/map/CaixaTableMap.php',
            'CaixaPeer' => 'pacoteFinanceiro/CaixaPeer.php',
            'Caixa' => 'pacoteFinanceiro/Caixa.php',
            'LancamentoCaixaTableMap' => 'pacoteFinanceiro/map/LancamentoCaixaTableMap.php',
            'LancamentoCaixaPeer' => 'pacoteFinanceiro/LancamentoCaixaPeer.php',
            'LancamentoCaixa' => 'pacoteFinanceiro/LancamentoCaixa.php',
            'CategoriaContaContabilTableMap' => 'pacoteFinanceiro/map/CategoriaContaContabilTableMap.php',
            'CategoriaContaContabilPeer' => 'pacoteFinanceiro/CategoriaContaContabilPeer.php',
            'CategoriaContaContabil' => 'pacoteFinanceiro/CategoriaContaContabil.php',
            'ContaContabilTableMap' => 'pacoteFinanceiro/map/ContaContabilTableMap.php',
            'ContaContabilPeer' => 'pacoteFinanceiro/ContaContabilPeer.php',
            'ContaContabil' => 'pacoteFinanceiro/ContaContabil.php',
            'DetalheLancamentoTableMap' => 'pacoteFinanceiro/map/DetalheLancamentoTableMap.php',
            'DetalheLancamentoPeer' => 'pacoteFinanceiro/DetalheLancamentoPeer.php',
            'DetalheLancamento' => 'pacoteFinanceiro/DetalheLancamento.php',
            'DetalheChequeTableMap' => 'pacoteFinanceiro/map/DetalheChequeTableMap.php',
            'DetalheChequePeer' => 'pacoteFinanceiro/DetalheChequePeer.php',
            'DetalheCheque' => 'pacoteFinanceiro/DetalheCheque.php',
            'BancoTableMap' => 'pacoteFinanceiro/map/BancoTableMap.php',
            'BancoPeer' => 'pacoteFinanceiro/BancoPeer.php',
            'Banco' => 'pacoteFinanceiro/Banco.php',
            'PedidoTableMap' => 'pacoteComercial/map/PedidoTableMap.php',
            'PedidoPeer' => 'pacoteComercial/PedidoPeer.php',
            'Pedido' => 'pacoteComercial/Pedido.php',
            'ItemPedidoTableMap' => 'pacoteComercial/map/ItemPedidoTableMap.php',
            'ItemPedidoPeer' => 'pacoteComercial/ItemPedidoPeer.php',
            'ItemPedido' => 'pacoteComercial/ItemPedido.php',
            'ContasReceberTableMap' => 'pacoteFinanceiro/map/ContasReceberTableMap.php',
            'ContasReceberPeer' => 'pacoteFinanceiro/ContasReceberPeer.php',
            'ContasReceber' => 'pacoteFinanceiro/ContasReceber.php',
            'ContasPagarTableMap' => 'pacoteFinanceiro/map/ContasPagarTableMap.php',
            'ContasPagarPeer' => 'pacoteFinanceiro/ContasPagarPeer.php',
            'ContasPagar' => 'pacoteFinanceiro/ContasPagar.php',
            'LancamentoContaTableMap' => 'pacoteFinanceiro/map/LancamentoContaTableMap.php',
            'LancamentoContaPeer' => 'pacoteFinanceiro/LancamentoContaPeer.php',
            'LancamentoConta' => 'pacoteFinanceiro/LancamentoConta.php',
            'ContaBancariaTableMap' => 'pacoteUsuario/map/ContaBancariaTableMap.php',
            'ContaBancariaPeer' => 'pacoteUsuario/ContaBancariaPeer.php',
            'ContaBancaria' => 'pacoteUsuario/ContaBancaria.php',
            'AvisoTableMap' => 'pacoteInformacao/map/AvisoTableMap.php',
            'AvisoPeer' => 'pacoteInformacao/AvisoPeer.php',
            'Aviso' => 'pacoteInformacao/Aviso.php',
            'TipoAvisoTableMap' => 'pacoteInformacao/map/TipoAvisoTableMap.php',
            'TipoAvisoPeer' => 'pacoteInformacao/TipoAvisoPeer.php',
            'TipoAviso' => 'pacoteInformacao/TipoAviso.php',
            'AvisoUsuarioTableMap' => 'pacoteInformacao/map/AvisoUsuarioTableMap.php',
            'AvisoUsuarioPeer' => 'pacoteInformacao/AvisoUsuarioPeer.php',
            'AvisoUsuario' => 'pacoteInformacao/AvisoUsuario.php',
            'ProspectTableMap' => 'pacoteProspect/map/ProspectTableMap.php',
            'ProspectPeer' => 'pacoteProspect/ProspectPeer.php',
            'Prospect' => 'pacoteProspect/Prospect.php',
            'ProspectTipoTableMap' => 'pacoteProspect/map/ProspectTipoTableMap.php',
            'ProspectTipoPeer' => 'pacoteProspect/ProspectTipoPeer.php',
            'ProspectTipo' => 'pacoteProspect/ProspectTipo.php',
            'ProspectAcaoTableMap' => 'pacoteProspect/map/ProspectAcaoTableMap.php',
            'ProspectAcaoPeer' => 'pacoteProspect/ProspectAcaoPeer.php',
            'ProspectAcao' => 'pacoteProspect/ProspectAcao.php',
            'ProspectMeioContatoTableMap' => 'pacoteProspect/map/ProspectMeioContatoTableMap.php',
            'ProspectMeioContatoPeer' => 'pacoteProspect/ProspectMeioContatoPeer.php',
            'ProspectMeioContato' => 'pacoteProspect/ProspectMeioContato.php',
            'ProspectMetaTableMap' => 'pacoteProspect/map/ProspectMetaTableMap.php',
            'ProspectMetaPeer' => 'pacoteProspect/ProspectMetaPeer.php',
            'ProspectMeta' => 'pacoteProspect/ProspectMeta.php',
            'ProspectContatoTableMap' => 'pacoteProspect/map/ProspectContatoTableMap.php',
            'ProspectContatoPeer' => 'pacoteProspect/ProspectContatoPeer.php',
            'ProspectContato' => 'pacoteProspect/ProspectContato.php',
            'ProspectContatoDetalheTableMap' => 'pacoteProspect/map/ProspectContatoDetalheTableMap.php',
            'ProspectContatoDetalhePeer' => 'pacoteProspect/ProspectContatoDetalhePeer.php',
            'ProspectContatoDetalhe' => 'pacoteProspect/ProspectContatoDetalhe.php',
            'ProspectSituacaoTableMap' => 'pacoteProspect/map/ProspectSituacaoTableMap.php',
            'ProspectSituacaoPeer' => 'pacoteProspect/ProspectSituacaoPeer.php',
            'ProspectSituacao' => 'pacoteProspect/ProspectSituacao.php',
            'ProspectRetencaoTableMap' => 'pacoteProspect/map/ProspectRetencaoTableMap.php',
            'ProspectRetencaoPeer' => 'pacoteProspect/ProspectRetencaoPeer.php',
            'ProspectRetencao' => 'pacoteProspect/ProspectRetencao.php',
            'ProspectConcorrenteTableMap' => 'pacoteProspect/map/ProspectConcorrenteTableMap.php',
            'ProspectConcorrentePeer' => 'pacoteProspect/ProspectConcorrentePeer.php',
            'ProspectConcorrente' => 'pacoteProspect/ProspectConcorrente.php',
            'ProspectAtendimentoTableMap' => 'pacoteProspect/map/ProspectAtendimentoTableMap.php',
            'ProspectAtendimentoPeer' => 'pacoteProspect/ProspectAtendimentoPeer.php',
            'ProspectAtendimento' => 'pacoteProspect/ProspectAtendimento.php',
            'ProspectNegocioTableMap' => 'pacoteProspect/map/ProspectNegocioTableMap.php',
            'ProspectNegocioPeer' => 'pacoteProspect/ProspectNegocioPeer.php',
            'ProspectNegocio' => 'pacoteProspect/ProspectNegocio.php',
        ),
);