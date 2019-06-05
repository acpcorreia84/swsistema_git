<?
//const DOCUMENT_ROOT = '/home/serama/public_html/dashboard.serama.com.br';
const DOCUMENT_ROOT = 'c:/xampp/htdocs/serama3.0';
require_once  DOCUMENT_ROOT.'/loader_cron.php';

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
    require_once DOCUMENT_ROOT.'/inc/PHPMailer_v5.1/class.phpmailer.php';

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
        $body .= "<strong>Endere&ccedil;o:</strong> http://dashboard.serama.com.br<br>";

        $body .= "<p style='size:25px'>Data e Hora da Solicita&ccedil;&atilde;o:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        $mail->IsSMTP();
        $mail->Subject = utf8_decode('Alteração de senha do usuário: ' . $nomeUsuario);
        $mail->MsgHTML($body);

        $mail->AddAddress(strtolower($emailUsuario), trim(strtoupper(removeEspeciais($nomeUsuario))));
        //$mail->AddAddress(strtolower('correia.antonio@gruposerama.com.br'), trim(strtoupper(removeEspeciais($nomeUsuario))));
        //$mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (solicitante)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (solicitante)");
        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao tentar resetar a senha do usu&aacute;rio:" .utf8_encode($e->getMessage()));
    }
};


function enviarEmailBoleto($nomeCliente,$emailCliente, $codigoDebarras,$urlBoleto,$nomeProduto, $preco){
    require_once DOCUMENT_ROOT.'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $boletoAnexo = file_get_contents($urlBoleto);
        //$boletoAnexo = explode("http://dashboard.serama.com.br/",$boletoAnexo);

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

        //$mail->AddAddress(strtolower($emailCliente), trim(strtoupper(removeEspeciais($nomeCliente))));
        $mail->AddAddress(strtolower('correia.antonio@gruposerama.com.br'), trim(strtoupper(removeEspeciais($nomeCliente))));
        $mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (consultor(a) SERAMA)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (consultor(a) SERAMA)");
        //$mail->Username = $usuarioLogado->getEmail();
        //$mail->Password = $usuarioLogado->getSenha();
        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar o Boleto:" .utf8_encode($e->getMessage()));
    }
};
function erroEmail($messagem,$titulo){

    require DOCUMENT_ROOT.'/inc/PHPMailer_v5.1/class.phpmailer.php';
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
        $mail->AddAddress('sistema@gruposerama.com.br', "Analista de Sistemas");
        $mail->AddAddress('estagiario.sistema@gruposerama.com.br', "Estagi�rio Sistema");

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
    require_once DOCUMENT_ROOT.'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        //$usuarioLogado = UsuarioPeer::retrieveByPK(1);


        $mail = new PHPMailer();
        $body = '';
        $body .= "Ol&aacute;,<br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Nosso Parceiro ".$usuarioLogado->getNome()." est&aacute; lhe enviando um cupom de desconto Serama:<br/>";
        $body .= "<br>";
        $body .= "<strong>Produto:</strong> ".trim(removeEspeciais(strtoupper($nomeProduto)))."<br>";
        $body .= "<strong>Vencimento:</strong> ".$vencimento."<br><br>";
        $body .= "<strong>Desconto:</strong> ".trim(formataMoeda($desconto))."<br><br>";
        $body .= "<strong>C&oacute;digo de Desconto:</strong> s<br>";

        $body .= "Para utilizá-lo: acesse em www.loja.serama.com.br/".$usuarioLogado->getUrl()."<br>";

        $body .= "<p style='size:25px'>Data:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        $mail->IsSMTP();
        $mail->Subject = 'Cupom de desconto Serama';
        $mail->MsgHTML($body);

        //$mail->AddAddress(strtolower($emailCliente), trim(strtoupper(removeEspeciais($nomeCliente))));
        $mail->AddAddress(strtolower($emailCliente));
        $mail->AddAddress(strtolower($usuarioLogado->getEmail()), $usuarioLogado->getNome() . " (consultor(a) SERAMA)");
        $mail->setFrom( $usuarioLogado->getEmail(),$usuarioLogado->getNome() . " (consultor(a) SERAMA)");
        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar cupom de desconto:" .utf8_encode($e->getMessage()));
    }
};

function enviarEmailListaRenovacoes($quantidadeRenovacoes, $periodoInicial, $periodoFinal){
    require_once DOCUMENT_ROOT.'/inc/PHPMailer_v5.1/class.phpmailer.php';

    try {
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
        $mail->Subject = utf8_decode('Atualização de lista de renovações de ' . $periodoInicial . ' até '. $periodoFinal);
        $mail->MsgHTML($body);

        $mail->AddAddress(strtolower('correia.antonio@gruposerama.com.br'));
        //$mail->AddAddress(strtolower('correia.helio@gruposerama.com.br'));
        $mail->setFrom(strtolower('correia.antonio@gruposerama.com.br'), "CRM SERAMA");

        $mail->Send();
        return true;

    }catch (Exception $e){
        return utf8_encode("Erro ao enviar o e-mail:" .utf8_encode($e->getMessage()));
    }
};


?>