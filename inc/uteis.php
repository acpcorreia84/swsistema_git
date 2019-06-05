<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader_off.php';
$funcao= $_REQUEST['funcao'];

if($funcao == 'erroEmail'){
    $mensagem= $_REQUEST['mensagem'];
    $nomeUsuario= $_REQUEST['nomeUsuario'];

    erroEmail($mensagem,$nomeUsuario);
};
function mtime ($time = NULL) {
  if (!empty($time)) {
    $rtime = $time + 14400;
  }
  else
  {
    $rtime = time() + 14400;
  }
  return $rtime;
};

/*INSERE UMA MASCARA EM QUALQUER TIPO DE CAMPO*/
/*echo mask($cnpj,'##.###.###/####-##');
echo mask($cpf,'###.###.###-##');
echo mask($cep,'#####-###');
echo mask($data,'##/##/####');*/
function mascara($val, $mask)
{
    /*SE O TAMANHO DA STRING FOR TEORICAMENTE A STRING JA ESTARA MASCARADA*/
    if (strlen($val) != strlen($mask) ) {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    return $val; /*SEM MASCARA*/
}

function formatarCPF_CNPJ($campo, $formatado = true){
	//retira formato
	$codigoLimpo = preg_replace("[' '-./ t]",'',$campo);
	// pega o tamanho da string menos os digitos verificadores
	$tamanho = (strlen($codigoLimpo) -2);
	//verifica se o tamanho do c�digo informado � v�lido
	if ($tamanho != 9 && $tamanho != 12){
		return false; 
	}
 
	if ($formatado){ 
		// seleciona a m�scara para cpf ou cnpj
		$mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##'; 
 
		$indice = -1;
		for ($i=0; $i < strlen($mascara); $i++) {
			if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
		}
		//retorna o campo formatado
		$retorno = $mascara;
 
	}else{
		//se n�o quer formatado, retorna o campo limpo
		$retorno = $codigoLimpo;
	}
 
	return $retorno;
 
};
function removeTracoPontoBarra($string){
	$string = str_replace("-","", $string);
	$string = str_replace("/","", $string);	
	$palavraNova = str_replace(".","", $string);	
	return $palavraNova; 
};
function removeEspeciais($string) {
    $strig = utf8_encode($string);
    return $strig;
}


function removeAcentos ($s) {
    $s = preg_replace("[áàâãª]","a",$s);
    $s = preg_replace("[ÁÀÂÃ]","A",$s);
    $s = preg_replace("[éèê]","e",$s);
    $s = preg_replace("[ÉÈÊ]","E",$s);
    $s = preg_replace("[óòôõº]","o",$s);
    $s = preg_replace("[ÓÒÔÕ]","O",$s);
    $s = preg_replace("[úùû]","u",$s);
    $s = preg_replace("[ÚÙÛ]","U",$s);
    $s = str_replace("ç","c",$s);
    $s = str_replace("Ç","C",$s);
//	$s = ereg_replace(" ","",$s);
    return $s;
}
function corLinhaTabela ($key) {
	if ( is_int($key/2) ) 
		return 'class="tr1" onMouseOver="javascript:this.style.backgroundColor=\'#FFFF66\'" onMouseOut="javascript:this.style.backgroundColor=\'\'"'; 
	else 
		return 'class="tr2" onMouseOver="javascript:this.style.backgroundColor=\'#FFFF66\'" onMouseOut="javascript:this.style.backgroundColor=\'\'"'; 
};
function formataMoeda ($valor) {
	return 'R$ '.number_format((float) $valor, 2, ',', '.');
};
function converterByteMb($tamanho) {
	$tamanho /= 1048576;
	$tamanho = formatarDoisDecimais($tamanho);
	return $tamanho;
};
function converterByteKb($tamanho) {
	$tamanho /= 1024;
	$tamanho = formatarDoisDecimais($tamanho);
	return $tamanho;
};
function formatarDoisDecimais($valor) {
   $float_arredondado = round($valor * 100) / 100;

   return $float_arredondado;
};
function formataQtd ($valor, $qtdZeros) {
	return str_pad($valor, $qtdZeros, 0, STR_PAD_LEFT);
};
function formataPercentual ($valor, $qtdZeros) {
	return number_format($valor, $qtdZeros, ',', '.');
};
function getLastDayOfMonth($month, $year)
{
	return idate('d', mktime(0, 0, 0, ($month + 1), 0, $year));
};
function dataCalendarDMA($data) {
	//Data gerada pelo componente calend�rio
	$dataAux = explode('-', $data);
	$dataFinal = $dataAux[2] .'/'. $dataAux[1] .'/'. $dataAux[0];
	return $dataFinal;
};
function timestampCalendarDMA($data) {
	//Data gerada pelo componente calend�rio
	$dataAux = explode('-', $data);
	return mktime(0,0,0,$dataAux[1], $dataAux[0], $dataAux[2]);
};
function dataDMAToDate($data) {
	$dateArray=explode('/',$data);
	return mktime(0,0,0,$dateArray[1], $dateArray[0], $dateArray[2]);
};
function js_ir($pagina) {
	echo '<script language="javascript">window.location = "'.$pagina.'"</script>';
};
function js_janela($pagina, $nome,$largura, $altura) {
	echo '<script language="javascript">window.open("'.$pagina.'", "'.$nome.'","location=1,status=1,scrollbars=1,width='.$largura.',height='.$altura.'")</script>';
};
function js_aviso($msg) {
	echo '<script language="javascript">alert("'.$msg.'")</script>';
};
function js_voltar() {
	echo "teste";exit;
	echo '<script language="javascript">history.go(-1);</script>';
};
function formataQtdProdutos($qtdTotal) {
	if (!isset($qtdTotal))
		$qtdTotal = 0;
	//monta a linha com os dados do item do pedido
	$qtdCx = intval($qtdTotal/50);
	if ($qtdCx) {
		$qtdExtenso =  number_format($qtdTotal, 0, '', '.');
		
		if (!is_float($qtdTotal/50))
			$qtdExtenso .= ' ('.$qtdCx.'CX' . ')';
		else
			$qtdExtenso .= ' ('.$qtdCx.'CX ';
		$qtdPc = $qtdTotal - ($qtdCx*50);
		if ($qtdPc > 0)
			$qtdExtenso .= $qtdPc . 'PCs)';			
	}
	else
		$qtdExtenso = $qtdTotal . 'Pcs';

	return $qtdExtenso;
};
function resumir22($texto,$limite,$tres_p = '...'){
 if(strlen(" ".strip_tags($texto))<=$limite){
 $tres_p = "";
 $retornar = $texto;
 }else{
 $texto = str_replace("<font ","<font",$texto);
 $texto = str_replace("<div ","<div",$texto);
 $vetor = explode(" ",$texto);
 $total = 0;
 $retornar = "";
   for($i=0;$i<sizeof($vetor);$i++){
   $total += strlen(" ".strip_tags($vetor[$i]));
   if($total<=$limite){
   $retornar .= " ".str_replace("<div","<div ",str_replace("<font","<font ",$vetor[$i]));
   }else{
   break;
   }
   }
 }
 return trim($retornar).$tres_p;
};
function LeArquivoArray($file) {
	$prospect = array();
	/*
	  Este exemplo mostra como ler o conteudo de um
	  arquivo a armazenar as linhas em um array
	*/
	
	// define o nome do arquivo a ser lido
	$arquivo = $file;
	
	// obt�m todas as linhas do arquivo e guarde-as
	// em um array
	$linhas = file($arquivo);
	
	// d� um la�o em todas as linhas para exib�-las
	for($i = 0; $i < count($linhas); $i++){
	  $prospect[$i] = explode(';',trim($linhas[$i]));
	}
	return $prospect;
};
function upload($arquivo,$caminho){
	if(!(empty($arquivo))){
		$arquivo1 = $arquivo;
		$arquivo_minusculo = strtolower($arquivo1['name']);
		$caracteres = array("�","~","^","]","[","{","}",";",":","�",",",">","<","-","/","|","@","$","%","�","�","�","�","�","�","�","�","+","=","*","&","(",")","!","#","?","`","�"," ","�");
		$arquivo_tratado = str_replace($caracteres,"",$arquivo_minusculo);
		$destino = $caminho."/".$arquivo_tratado;

		if(move_uploaded_file($arquivo1['tmp_name'],$destino)){
			return $destino;
			
		}else{
			echo "<script>window.alert('Erro ao enviar o arquivo');</script>";
		}
	}
};
function checaDataDMY($data) {
	$dataArr = explode("/", $data);
    if (strlen( $dataArr[2]) < 4) {
    	js_aviso("A data infomada precisa estar no formado dd/mm/aaaa, por favor corrija para proceguir");
       	js_voltar();
        return false;
    }

    if (!checkdate ($dataArr[1], $dataArr[0], $dataArr[2]) ) {
    	js_aviso("A data infomada nao � v�lida, por favor corrija para proceguir");
       	js_voltar();        
        return false;	
    }    
    
    return true;

};
function geraSenha($tamanho = 6, $maiusculas = true, $numeros = true, $simbolos = false){

	$lmin = 'abcdefghijklmnopqrstuvwxyz';
	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$simb = '!@#$%*-';
	$retorno = '';
	$caracteres = '';
	$caracteres .= $lmin;
	if ($maiusculas) $caracteres .= $lmai;
	if ($numeros) $caracteres .= $num;
	if ($simbolos) $caracteres .= $simb;
	$len = strlen($caracteres);
	
	for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand-1];
	}
	
	return $retorno;

};
function enviarEmailResetarSenha($nomeUsuario,$emailUsuario, $senhaProvisoria){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute; <strong>".trim(removeEspeciais(strtoupper($nomeUsuario))).",</strong><br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Conforme solicitado, pelo usu&aacute;rio ".$usuarioLogado->getNome(). " sua senha foi resetada. Utilize no seu pr&oacute;ximo login os dados abaixo:<br>";
        $body .= "<br>";
        $body .= "<strong>Login:</strong> ".$emailUsuario."<br>";
        $body .= "<strong>Senha Provis&oacute;ria:</strong> ".$senhaProvisoria."<br>";
        $body .= "<strong>Endere&ccedil;o:</strong> http://www.swsistema.com.br<br>";

        $body .= "<p style='size:25px'>Data e Hora da Solicita&ccedil;&atilde;o:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        $mail->IsSMTP();
        $mail->Subject = utf8_decode('Alteração de senha do usuário: ' . $nomeUsuario);
        $mail->MsgHTML($body);

        $mail->AddAddress(strtolower($emailUsuario), trim(strtoupper(removeEspeciais($nomeUsuario))));
        //$mail->AddAddress(strtolower('helio.correia@arsw.com.br'), trim(strtoupper(removeEspeciais($nomeUsuario))));
        //$mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (solicitante)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (solicitante)");

        $mail->Send();

        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao tentar resetar a senha do usu&aacute;rio:" .utf8_encode($e->getMessage()));
    }
};


function enviarEmailBoleto($nomeCliente,$emailCliente, $codigoDebarras,$urlBoleto,$nomeProduto, $preco){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $boletoAnexo = file_get_contents($urlBoleto);
        //$boletoAnexo = explode("http://www.swsistema.com.br/",$boletoAnexo);

        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute; <strong>".trim(removeEspeciais(strtoupper($nomeCliente))).",</strong><br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "De acordo com o seu pedido:<br>";
        $body .= "<br>";
        $body .= "<strong>Produto:</strong> ".trim(removeEspeciais(strtoupper($nomeProduto)))."<br>";
        $body .= "<strong>Valor:</strong> ".trim(formataMoeda($preco))."<br><br>";
        $body .= "<strong>Cliente:</strong> ".trim(removeEspeciais(strtoupper($nomeCliente)))."<br>";
        $body .= "<strong>Consultor(a):</strong> ".trim(removeEspeciais(strtoupper($usuarioLogado->getNome())))."<br>";

        $body .= "Linha Digitalizavel: ".trim($codigoDebarras)."<br>";

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";
        $body .= "<br><br><strong>Segue abaixo seu boleto. Caso haja alguma dificuldade em visualizar seu boleto, por favor clique no link abaixo: <br></strong>";
        $body .= "<a href='".trim($urlBoleto)."' title='Clique para re-imprimir o boleto'>Abrir Boleto</a><br>";


        $mail->IsSMTP();
        $mail->Subject = 'Boleto do Certificado ' . $nomeProduto . ' da empresa '. $nomeCliente;
        $mail->MsgHTML($body . $boletoAnexo);

        /*
         * CHECA SE ESTA EM AMBIENTE DE PRODUCAO OU DE HOMOLOGACAO
         * */
        if ($_SERVER['HTTP_HOST']== 'swsistema')
            $mail->AddAddress(strtolower('helio.correia@arsw.com.br'), trim(strtoupper(removeEspeciais($nomeCliente))));
        else
            $mail->AddAddress(strtolower($emailCliente), trim(strtoupper(removeEspeciais($nomeCliente))));

        $mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (consultor(a) SAFEWEB)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (consultor(a) SAFEWEB)");
        //$mail->Username = $usuarioLogado->getEmail();
        //$mail->Password = $usuarioLogado->getSenha();
        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar o Boleto:" .utf8_encode($e->getMessage()));
    }
};
function erroEmail($messagem,$titulo){

    require $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';
    try {
        $mail = new PHPMailer();

        $body = "Prezado Desenvolvedor(a),<br>";
        $body .= "<br>";
        $body .= "<p>Assunto: <strong>".$titulo."</strong></p>";
        $body .= "<br>";
        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";
        $body .= "<p style='size:25px'>" . $messagem . "</p>";
        $body .= "<br>";

        $mail->IsSMTP();
        $mail->Subject = "E-mail Automatico Sistema. " . date('d/m/Y');
        $mail->MsgHTML($body);
        $mail->AddAddress('comunicacao@swsistema.com.br', "Analista de Sistemas");
        $mail->AddAddress('pedro.souza@arsw.com.br', "Estagiario Sistema");

        if ($mail->Send()) {
            echo '0';
        } elseif (!$mail->Send()) {
            echo '1';
        }
    }catch (Exception $e){
        js_aviso('Erro no envio de e-mail para o desenvolvedor do sistema');
        js_aviso("Erro: ".$e->getMessage());
    }

};

function enviarEmailCupomDesconto($emailCliente,$nomeProduto,$vencimento,$desconto){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        //$usuarioLogado = UsuarioPeer::retrieveByPK(1);


        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute;,<br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Nosso Parceiro ".$usuarioLogado->getNome()." est&aacute; lhe enviando um cupom de desconto Safeweb:<br/>";
        $body .= "<br>";
        $body .= "<strong>Produto:</strong> ".trim(removeEspeciais(strtoupper($nomeProduto)))."<br>";
        $body .= "<strong>Vencimento:</strong> ".$vencimento."<br><br>";
        $body .= "<strong>Desconto:</strong> ".trim(formataMoeda($desconto))."<br><br>";
        $body .= "<strong>C&oacute;digo de Desconto:</strong> s<br>";

        $body .= "Para utiliz�-lo: acesse em www.safeweb.com.br/".$usuarioLogado->getUrl()."<br>";

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        $mail->IsSMTP();
        $mail->Subject = 'Cupom de desconto Safeweb';
        $mail->MsgHTML($body);

        //$mail->AddAddress(strtolower($emailCliente), trim(strtoupper(removeEspeciais($nomeCliente))));
        $mail->AddAddress(strtolower($emailCliente));
        $mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (consultor(a) Safeweb)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (consultor(a) Safeweb)");
        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar cupom de desconto:" .utf8_encode($e->getMessage()));
    }
};

function enviarEmailListaRenovacoes($quantidadeRenovacoes, $periodoInicial, $periodoFinal){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute; <br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Atualizamos a lista de renovações para seus consultores. Total de Renovações: ".$quantidadeRenovacoes."<br>";
        $body .= "De: ".$periodoInicial." até " . $periodoFinal . "<br>";
        $body .= "<br>";

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";


        $mail->IsSMTP();
        $mail->Subject = 'Atualiza&ccedil;&atilde;o de lista de renova&ccedil;&otilde;es de ' . $periodoInicial . ' at&eacute; '. $periodoFinal;
        $mail->MsgHTML($body);

        $mail->AddAddress(strtolower('helio.correia@arsw.com.br'));
        //$mail->AddAddress(strtolower('helio.correia@arsw.com.br'));
        $mail->setFrom(strtolower('helio.correia@arsw.com.br'), "CRM Safeweb");

        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar o e-mail:" .utf8_encode($e->getMessage()));
    }
};


function enviarEmailTrocaConsultorContador($consultor, $contador){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {

        $novoConsultor = UsuarioPeer::retrieveByPK($consultor);
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $tipoContador = ($contador->getPessoaTipo()=='F') ? 'Pessoa F&iacute;sica' : 'Pessoa Jur&iacute;dica';

        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute; ".utf8_encode($novoConsultor->getNome()).",<br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Parab&eacute;ns voc&ecirc; tem um novo contador na sua carteira: ";
        $body .= "<br><br>";
        $body .= "<strong>Contador:</strong> ".utf8_encode($contador->getNome())."<br>";
        $body .= "<strong>Tipo:</strong> ".$tipoContador."<br>";
        $body .= "<strong>C&oacute;digo do Contador:</strong> ".$contador->getCodContador()."<br><br>";

        $body .= "&Eacute; fundamental que voc&ecirc; fa&ccedil;a contato com ele assim que poss&iacute;vel e informe que daqui para frente voc&ecirc; ser&aacute; (o)a consultor(a) que ir&aacute; atend&ecirc;-lo. Pontos importantes a serem verificados no primeiro contato: <br>";
        $body .= "- Se ele (a) conhece nosso programa de benef&iacute;cios (comiss&atilde;o, gratuidade de CD, etc)? <br>";
        $body .= "- Atualizar os dados de cadastro. <br>";

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        $mail->IsSMTP();
        $mail->Subject = 'Novo contador amigo na sua carteira';
        $mail->MsgHTML($body);

        $mail->AddAddress(strtolower($novoConsultor->getEmail()));
        $mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome());
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome());
        $mail->Send();
        return true;

    }catch (Exception $e){
        var_dump(utf8_encode($e->getMessage()));
        return utf8_encode("Erro ao e-mail de troca de consultor:" .utf8_encode($e->getMessage()));
    }
};

function enviarEmailRetornoCartaoCredito($tipo, $idCertificado, $finalCartao, $nsu, $nomeCartao, $produto, $preco,$nomeCliente,$tipoCartao, $mensagem, $emailCliente, $emailConsultor){
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        /*
         * CLASS DE ENVIO DE E-MAILS
         * */
        $mail = new PHPMailer();

        $mail->AddAddress('marcia.lima@arsw.com.br');
        $mail->AddAddress('helio.correia@arsw.com.br');

        $assunto = '';
        $mensagemInicial = '';
        if ($tipo == 'pago') {
            $mensagemInicial .= 'Tudo bem?<br/>';
            $mensagemInicial .= 'Obrigado por escolher a Safeweb para emitir o seu Certificado Digital';
            $assunto = utf8_decode('Safeweb - Comprovante de cartao de credito');
            $corEmail = '#336699';
            $mail->AddAddress(strtolower($emailCliente));
            $mail->AddAddress(strtolower($emailConsultor));
        } elseif ($tipo == 'recusado') {
            $mensagemInicial .= 'Desculpe mas por algum motivo seu cartão foi recusado na tentativa de compra. Por favor, verifique junto à operadora. Obrigado!';
            $assunto = utf8_decode('Safeweb - Cartao de credito recusado');
            $corEmail = '#ff0000';
        } elseif ($tipo == 'extornado') {
            $mensagemInicial .= 'Por algum motivo foi solicitado extorno na compra de um certificado digital com o seu cartão. Pedimos desculpas por qualquer transtorno!';
            $assunto = utf8_decode('Safeweb - Cartão de crédito extornado');
            $corEmail = '#ff0000';
            $mail->AddAddress(strtolower($emailCliente));
            $mail->AddAddress(strtolower($emailConsultor));
        }

        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $body .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $body .= '<head>';
        $body .= '<title>SAFEWEB - Pagamento Cart&atilde;o de Cr&eacute;dito</title>';

        $body .= '<style type="text/css" media="screen">';
        $body .= 'a:link { color:#33348e; text-decoration: none; }';
        $body .= 'a:visited { color:#33348e; text-decoration: none; }';
        $body .= 'a:hover { color:#33348e; text-decoration: none; }';
        $body .= 'a:active { color:#7476b4; text-decoration: underline; }';
        $body .= '</style>';
        $body .= '</head>';
        $body .= '<body style="font-size:12px; background-color:#ececec; font-family:verdana,geneva,sans-serif;">';
        $body .= "<br/>";

        $body .= '<table width="100%" border="0" cellpadding="5">';
        $body .= '<tr>';
        $body .= '<td align="center"><table width="600" border="0" cellpadding="10" cellspacing="0">';
        $body .= '<tr>';
        $body .= '<td align="center" bgcolor="'.$corEmail.'"><table align="right" border="0" cellpadding="0" cellspacing="0" class="container2">';
        $body .= '<tbody>';
        $body .= '<tr>';
        $body .= '<td align="center" valign="top"><table align="center" border="0" cellpadding="0" cellspacing="0" class="container">';
        $body .= '<tbody>';
        $body .= '<tr>';
        $body .= '<td style="font-size: 12px; line-height: 27px; font-family: Arial,Tahoma, Helvetica, sans-serif; color:#FFFFFF; font-weight:normal; text-align:center; padding-right: 10px;"><span style="font-family:verdana,geneva,sans-serif;">Compartilhe</span></td>';
        $body .= '<td align="center" id="clear-padding" valign="middle"><a href="#" style="margin-top:5px;padding-top:5px;" target="_blank"><img alt="icon-facebook" border="0" hspace="0" src="http://www.swsistema.com.br/img/face.png" style="max-width:30px;" vspace="0" /></a></td>';
        $body .= '<td align="center" id="clear-padding" valign="middle"><span style="font-family:verdana,geneva,sans-serif;"><a href="https://business.google.com/b/109899903235291004176/dashboard/l/17199559175166432783" style="margin-top:5px;padding-top:5px;" target="_blank"><img alt="icon-facebook" border="0" hspace="0" src="http://www.swsistema.com.br/img/google.png" style="max-width:30px;" vspace="0" /></a></span></td>';

        $body .= '</tr>';
        $body .= '</tbody>';
        $body .= '</table></td>';
        $body .= '</tr>';
        $body .= '</tbody>';
        $body .= '</table></td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<td align="center" bgcolor="#FFFFFF"><img src="http://www.swsistema.com.br/img/logo_safeweb.gif" alt="logo" width="358" height="135" /></td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td bgcolor="#FFFFFF">';
        $body .= '<strong><span style="color: rgb(51, 102, 153); ">Ol&aacute; '.utf8_encode($nomeCliente).',</span></strong><br><br>';

        $body .= $mensagemInicial;

        $body .= '<br><br>';
        $body .= '<strong style="color: #000000; ">Voc&ecirc; optou em pagar com o cart&atilde;o de cr&eacute;dito</strong> <br>';
        $body .= '<strong style="color: #000000; ">N&uacute;mero do pedido:</strong> '.$idCertificado.'<br>';
        $body .= '<strong style="color: #000000; ">Tipo do Cart&atilde;o:</strong> '.$tipoCartao.'<br>';
        $body .= '<strong style="color: #000000; ">Nome no cart&atilde;o:</strong> '.$nomeCartao.'<br>';
        $body .= '<strong style="color: #000000; ">Cart&atilde;o Final:</strong> '.$finalCartao.'<br>';
        $body .= '<strong style="color: #000000; ">C&oacute;digo da opera&ccedil;&atilde;o:</strong> '.$nsu.'<br>';
        $body .= '<strong style="color: #000000; ">Produto Comprado:</strong> '.$produto.'<br>';
        $body .= '<strong style="color: #000000; ">Pre&ccedil;o</strong> '.$preco.'<br><br>';
        $body .= '<strong style="color: #000000; "> '.$mensagem.'</strong><br><br>';

        $body .= "</td>";

        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td align="left" bgcolor="#FFFFFF" style="background-color: #ffffff; border-bottom:2px solid #c7c7c7;">';
        $body .= '</td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td align="left" >';
        $body .= '<table width="100%" border="0" cellpadding="5">';
        $body .= '<tr>';
        $body .= '<td>&nbsp;</td>';
        $body .= '<td align="right"><span style="font-size: 13px;  line-height: 18px; color: #5eb0f0;  font-weight:normal; text-align: center; font-family:Tahoma, Helvetica, Arial, sans-serif;"><span style="font-family:verdana,geneva,sans-serif;"></span></span>                Safeweb - Seguran&ccedil;a Digital<br />';
        $body .= '07.467.912/0001-17<br />';
        $body .= 'Travessa Diogo Moia, 630, Umarizal, Bel&eacute;m - PA. Cep: 66055-080</td>';
        $body .= '</tr>';
        $body .= '</table></td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<td align="left" style=" border-bottom:8px solid #336699;">&nbsp;</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<td align="right" style="border-bottom:2px solid #c7c7c7; "><a href="http://www.safeweb.com.br" target="_blank">www.safeweb.com.br</a></td>';
        $body .= '</tr>';
        $body .= '</table></td>';
        $body .= '</tr>';
        $body .= '</table>';

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";
        $body .= '</body>';
        $body .= '</html>';

        $mail->IsSMTP();
        $mail->Subject = $assunto;
        $mail->MsgHTML($body);

        $mail->setFrom( 'comunicacao@swsistema.com.br','SAC SAFEWEB');
        $mail->Send();
        return true;

    }catch (Exception $e){
        var_dump(utf8_encode($e->getMessage()));
        return utf8_encode("Erro ao tentar enviar e-mail de comfirma&ccedil;&atilde;o de cart&atilde;o de cr&eacute;dito:" .utf8_encode($e->getMessage()));
    }
};
?>
