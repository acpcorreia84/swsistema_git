<?session_start();setlocale(LC_ALL, NULL);setlocale(LC_ALL, 'pt_BR');date_default_timezone_set('America/Brasilia');set_time_limit(60);$requestUri = $_SERVER['REQUEST_URI'];require_once $_SERVER['DOCUMENT_ROOT']."/inc/uteis.php";require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/controleacesso.class.php';define('TITULO_GERAL', 'Dashboard v3.0 - SISTEMA DE ADMINISTR&Ccedil;&Atilde;O DE CERTIFICADOS');/* * ESTRUTURA DO PROPEL_INIT.PHP */define('PREFIX',          $_SERVER['DOCUMENT_ROOT'] . '/classes/');define('PEAR_BASE',      PREFIX . 'pear/');define('PROJECT_CONF',     PREFIX . 'conf/swsistema-conf.php');$includes   = array();$includes[] = PEAR_BASE;$includes[] = PREFIX;// don't forget to add current include_path$includes[] = ini_get('include_path');ini_set('include_path', implode(PATH_SEPARATOR, $includes));require_once 'propel/Propel.php';require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/logClass.php';$logger = new MyLogger();//Propel::setLogger($logger); Implementa��o futura: Aprender express�es regulares para a cada modifica��o no banco logar no sistema o que foi feito e por quem//Classe inc/logClass.php � a interface que far� isto$e = Propel::init(PROJECT_CONF);$arquivo = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/' )+1);/*PEGA O USUARIO SERAIALIZADO DA SESSAO*/$usuarioLogado = controleAcesso::getUsuarioLogado();//CHECA SE O USU�RIO EST� LOGADO E SE N�O ESTIVER MANDA PARA A TELA DE ACESSO NEGADOif (!ControleAcesso::estaLogado())    $estaLogado = false;else {    $estaLogado = true;    //PRECISAMOS SERIALIZAR ESSAS ARRAY PARA S� FAZER CONSULTA AO BANCO NA HORA DO LOGIN DO USU�RIO    $cPerfPermTela = new Criteria();    $cPerfPermTela->add(PerfilPermissaoPeer::PERFIL_ID, $_SESSION['idPerfil']);    $urlDoArquivo = explode('/',trim($_SERVER['PHP_SELF'], '/'));    if ($urlDoArquivo[0] =='funcoes'){        switch ($urlDoArquivo[1]){            case 'funcoesCertificado.php':                $pesquisaPermissao = 'telaCertificado.php';                break;            case 'funcoesContador.php':                $pesquisaPermissao = 'telaContador.php';                break;            case 'funcoesComissaoParceiro.php':                $pesquisaPermissao = 'telaRelatorioComissaoCertificadoParceiro.php';                break;            case 'funcoesMeuFaturamento.php':                $pesquisaPermissao = 'telaFaturamento.php';                break;            case 'funcoesParceiro.php':                $pesquisaPermissao = 'telaParceiro.php';                break;            case 'funcoesUsuario.php':                $pesquisaPermissao = 'telaUsuario.php';                break;        }        $cPerfPermTela->add(PermissaoPeer::TELA, $pesquisaPermissao);    }else{        $cPerfPermTela->add(PermissaoPeer::TELA, trim($_SERVER['PHP_SELF'], '/'));    }    $permissoesPerfilTela = PerfilPermissaoPeer::doSelectJoinPermissao($cPerfPermTela);    $arrPermissaoTela = array();    foreach ($permissoesPerfilTela as $permissaoPerfilTela) {        $arrPermissaoTela[] = $permissaoPerfilTela->getPermissao()->getFuncao();    }/*    //Permiss�es para o MENU    $cPerfPermMenu = new Criteria();    $cPerfPermMenu->add(PerfilPermissaoPeer::PERFIL_ID, $_SESSION["idPerfil"]);    $cPerfPermMenu->add(PermissaoPeer::FUNCAO, 'acessar');    $permissoesPerfilMenu = PerfilPermissaoPeer::doSelectJoinPermissao($cPerfPermMenu);    $arrTelasMenu = array();    foreach ($permissoesPerfilMenu as $permissaoPerfilMenu) {        $arrTelasMenu[] = $permissaoPerfilMenu->getPermissao()->getTela();    }*/    /*PEGA TODAS AS PERMISSOES DO MENU DO USUARIO QUE ESTIVER LOGADO*/    $arrTelasMenu = ControleAcesso::getPermissoesMenu();    //Fim permissoes menu    $urlDoArquivo = explode('/',trim($_SERVER['PHP_SELF'], '/'));    if ($urlDoArquivo[0] =='funcoes'){        switch ($urlDoArquivo[1]){            case 'funcoesCertificado.php':                $arquivo = 'telaCertificado.php';                break;            case 'funcoesContador.php':                $arquivo = 'telaContador.php';                break;            case 'funcoesComissaoParceiro.php':                $arquivo = 'telaRelatorioComissaoCertificadoParceiro.php';                break;            case 'funcoesMeuFaturamento.php':                $arquivo = 'telaFaturamento.php';                break;            case 'funcoesParceiro.php':                $arquivo = 'telaParceiro.php';                break;            case 'funcoesUsuario.php':                $arquivo = 'telaUsuario.php';                break;        }    }    //RESTRINGE O ACESSO A TELAS DO SISTEMA QUE NAO ESTAO AUTORIZADAS!    if (!ControleAcesso::permitido($arquivo, 'acessar', $_SESSION['idPerfil']) )        $permitido = false;    else        $permitido = true;    //COMO ALGUMAS TELAS IR�O PRECISAR SABER SE EXISTE CAIXA ABERTO,    //O C�GIGO ABAIXO FAZ ESTA CONSULTA    $cCaixaAberto = new Criteria();    $cCaixaAberto->add(CaixaPeer::DATA_FECHAMENTO, null, Criteria::ISNULL);    $cCaixaAberto->add(CaixaPeer::USUARIO_ID, $usuarioLogado->getId());    $cxUsuarioLogado = CaixaPeer::doSelectOne($cCaixaAberto);    //CRIAÇÃO DO LOG DE AÇÕES DO USUÁRIO NO SISTEMA    $logAcesso = new LogAcesso();    $logAcesso->setUsuarioId($usuarioLogado->getId());    if($_GET['acao'])        $logAcesso->setAcao(strtoupper($_GET['acao']));    else        $logAcesso->setAcao("ACESSO");    $logAcesso->setIp($_SERVER['REMOTE_ADDR']);    $logAcesso->setData(date('Y-m-d H:i:s'));    $logAcesso->setTela($_SERVER['REQUEST_URI']);    $descricao = explode('.php', $_SERVER['REQUEST_URI']);    if ($descricao) {        if($_GET['acao']){            $descricaoAcao = explode($_GET['acao'] , $descricao[1]);            if($descricaoAcao[1]){                $logAcesso->setDescricao(strtoupper($_GET['acao']." ".$descricaoAcao[1]));            }        }else {            $tela = explode('/tela',$descricao[0]);            if ($tela[1])                $logAcesso->setDescricao(strtoupper("Acessou a Tela : ").$tela[1] );            else                $logAcesso->setDescricao(strtoupper("Acessou a Tela : ").$descricao[0] );        }    }    $logAcesso->save();    /*require_once $_SERVER['DOCUMENT_ROOT'] . '/funcoes/funcoesMenuInicial.php';    //PESQUISAS DE QUANTIDADES PARA OS MENUS    $qtdeProspect = qtdProspect($usuarioLogado);    //$qtdeCertificados = qtdCertificadosFaturados($usuarioLogado);    $qtdeCertificadosLiberados = qtdCertificadosNaoPagos($usuarioLogado);    $qtdeInformePagamento = qtdCertificadosInformePamento($usuarioLogado);    $qtdeContador = qtdContadores($usuarioLogado);    $qtdeUsuario = qtdUsuarios($usuarioLogado);    $cProduto = new Criteria();    $cProduto->add(ProdutoPeer::SITUACAO,0);    $qtdeProduto = ProdutoPeer::doCount($cProduto);    //TOTAL SOMA OS NAO AUTORIZADOS COM OS FATURADOS    $qtdeFaturados = qtdCertificadosConfirmadosPagamento($usuarioLogado);    $qtdeCertificadosTotal = $qtdeFaturados + $qtdeCertificadosLiberados;    $qtdeCertificadosNaoAutorizados = qtdCertificadosNaoAutorizados($usuarioLogado);*/}/*var_dump(ControleAcesso::permitido($arquivo, 'acessar', $_SESSION['idPerfil']), $arquivo, $_SESSION['idPerfil'] );    */if (($_SERVER['PHP_SELF'] != '/index.php') && ($_SERVER['PHP_SELF'] != '/acessoNegadoLogin.php') && ($_SERVER['PHP_SELF'] != '/acessoNegado.php')  && ($_SERVER['PHP_SELF'] != '/login.php') )    if (!$estaLogado) {        header('Location:acessoNegadoLogin.php?motivo=2');        exit;    }    elseif ($estaLogado && ($permitido === false) ) {        header('Location:acessoNegado.php?motivo=1');        exit;    }switch ($arquivo) {    case 'index.php':        if ($estaLogado) header('Location:home.php');        break;    case 'telaCertificado.php'||'telaCertificadoInformePagamento.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        //require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';        break;    case 'telaCertificadoNaoAutorizados.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;    case 'telaContador.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;    case 'telaProspect.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;    case 'telaMeuFaturamento.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;    case 'telaParceiro.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;    case 'telaRelatorioComissaoCertificadoParceiro.php':        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/paginator.class.php';        break;}?>