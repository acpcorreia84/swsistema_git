<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="inc/uteis.js"></script>
<script type="text/javascript" src="js/localStorage.js"></script>

<? $arquivo = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/' )+1);
    switch ($arquivo) {
        case 'home.php':
            echo '<script src="../js/telaHome.js"></script>';
            echo '<script src="../js/telaCertificado.js"></script>
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            ';

            break;
        case 'telaCertificado.php':
            echo '<script src="../js/telaCertificado.js"></script>
            <script src="https://assets.pagar.me/js/pagarme.min.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
            

	        <script src="js/ajuda.js"></script>';
            break;

        case 'telaCentralNegocios.php':
            echo '<script src="../js/telaCentralNegocios.js"></script>
            <script src="https://kit.fontawesome.com/269b16848d.js" crossorigin="anonymous"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
            <script src="js/ajuda.js"></script>
            ';
            break;

        case 'telaUsuario.php':
            echo '
            <script src="../js/telaCertificado.js" charset="utf-8"></script>
            <script src="../js/telaUsuario.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>;
            

	        <script src="js/ajuda.js"></script>';
            break;
        case 'telaRecibo.php':
            echo '<script src="../js/telaCertificado.js"></script>';
            break;
        case 'telaMeuFaturamento.php':
            echo '<script src="../js/telaMeuFaturamento.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
	        <script src="js/ajuda.js"></script>';
            break;
        case 'telaContador.php':
            echo '
                <script src="../js/telaCertificado.js" charset="utf-8"></script>
                <script src="../js/telaContador.js"></script>
                <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
                <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
                <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
                <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
                <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>;
            ';
            break;
        case 'telaParceiro.php':
            echo '
            <script src="../js/telaCertificado.js" charset="utf-8"></script>
            <script src="../js/telaParceiro.js" charset="utf-8"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            
            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>;

            ';
            break;
        case 'telaProspect.php':
            echo '
                <script type="text/javascript" src="ajax/prospect.js" charset="utf-8"></script>
                <script src="../js/telaProspect.js" charset="utf-8"></script>
            ';
            break;
        case 'telaCertificadoNaoAutorizados.php':
            echo '<script src="../js/telaCertificado.js"></script>
	        <script src="js/ajuda.js"></script>';
            break;

        case 'telaCertificadoInformePagamento.php':
            echo '<script src="../js/telaCertificado.js"></script>
	        <script src="js/ajuda.js"></script>';
            break;
        case 'telaProfile.php':
            echo '<script src="../js/telaProfile.js"></script>';
            break;
        case 'telaRelatorioRankingContador.php':
            echo '<script src="../js/telaContador.js"></script>';
            break;
        case 'telaCuponsDesconto.php':
            echo '<script src="../js/telaCuponsDesconto.js"></script>
                  <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
                  <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
                  <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            ';
            break;
        case 'telaContaReceber.php':
            echo '
            <script src="../js/telaContaReceber.js" charset="utf-8"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>
            ';
            break;
        case 'telaRelatorioComissionamentoParceiros.php':
            echo '
            <script src="../js/telaCertificado.js" charset="utf-8"></script>
            <script src="../js/telaParceiro.js" charset="utf-8"></script>
            <script src="../js/telaRelatorioComissionamentoParceiros.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>';
            break;
        case 'telaRelatorioComissionamentoUsuarios.php':
            echo '<script src="../js/telaUsuario.js" charset="utf-8"></script>
            <script src="../js/telaCertificado.js" charset="utf-8"></script>
            <script src="../js/telaRelatorioComissionamentoUsuarios.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>';
            break;

        case 'telaRelatorioComissionamentoContador.php':
            echo '<script src="../js/telaContador.js" charset="utf-8"></script>
            <script src="../js/telaCertificado.js" charset="utf-8"></script>
            <script src="../js/telaRelatorioComissionamentoContador.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>';
            break;

        case 'telaComissionamentoMensalContadorRep.php':
            echo '<script src="../js/telaContador.js" charset="utf-8"></script>
            <script src="../js/telaComissionamentoMensalContadorRep.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>';
            break;
        case 'telaGeracaoCampanhaMkt.php':
            echo '<script src="../js/telaRelatorio.js" charset="utf-8"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <link href="inc/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="inc/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>';
            break;

        case 'telaAlterarFotoPerfil.php':
            echo '
            <script src="../js/telaPerfil.js" charset="utf-8"></script>';
            break;

        case 'telaLocal.php':
            echo '
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <script src="../js/telaLocal.js" charset="utf-8"></script>';
            break;
        case 'telaGrupoProduto.php':
            echo '
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <script src="../js/telaGrupoProduto.js" charset="utf-8"></script>';
            break;
        case 'telaProduto.php':
            echo '
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
            <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

            <script src="../js/telaProduto.js" charset="utf-8"></script>';
            break;
    }

?>

