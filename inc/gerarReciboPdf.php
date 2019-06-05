<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require $_SERVER['DOCUMENT_ROOT'].'/inc/MPDF54/mpdf.php';
$informacoes = unserialize($_SESSION['informacoesRecibo']);

$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Recibo SAFEWEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="Gerador" content="Projeto ReciboPHP" />
	
<style>

table.img {
	margin-bottom: 3px;
	padding-bottom: 1px;
	border-bottom: 1px black solid;
}

table.texto {
	margin-bottom: 3px;
	padding-bottom: 1px;	
	border-bottom: 1px black solid;
}

table.texto tr.trtitulo td.tdtitulo h1 {
	text-align:center;
	font-family:"Times New Roman", Times, serif;
	font-size:18px;
}

table.end tr.rodape td.dados_rodape h1{
	text-align:center;
	font-size:10px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}

table.end tr.rodape td.dados_rodape{
	text-align:center;
	font-size:10px;
	font-style:normal;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}

</style>

</head>
<body>

    <table class="texto" width="100%" border="0" cellpadding="5" cellspacing="5">
        <tr>
        	<td align="left"><img src="../img/logo_safeweb.png" /></td>
        </tr>
	</table>
    
	<table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr class="trtitulo">
            <td class="tdtitulo" align="center">
            	<strong><u>RECIBO</u></strong>
            </td>
        </tr>
    </table> 
		
    <table class="texto" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
        	<td align="left">
            	&nbsp;
            </td>
            <td align="right" width="30%">
            	<numero><strong>TOTAL R$ '.$informacoes["valor"].' ('.utf8_decode($informacoes["formaPagamento"]).')</strong></numero>
            </td>
        </tr>
        <tr>
            <td align="justify" width="100%">
                    <texto> Recebi  da empresa <b>'.utf8_decode($informacoes["cliente"]).'</b> - CNPJ/CPF <b>'.$informacoes["documento"].'</b>, localizada '.utf8_decode($informacoes['endereco']).' CEP: '.$informacoes["cep"].'. <b>Referente a AQUISIÇÃO DE '.utf8_decode($informacoes["produto"]).'</b></texto>
			</td>
        </tr>
        <tr>
            <td align="left">
            	<br /><texto>No qual dou plena quita&ccedil;&atilde;o.</texto>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
    
	<br><br>
    
	<table class="texto" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td align="left" width="50%"><assinatura><b>Ass: __________________________________________</b></assinatura></td>
            <td align="right" width="50%"><data><b>Belém-PA '.date('d') . ' do '. date('m') .' de ' .date('Y').' </b></data></td>
        </tr>
        <tr>
			<td align="left"><assinatura><b>Carimbo/Assinatura</b></assinatura></td>
            <td align="left">&nbsp;</td>
        </tr>
    </table>
	
    <table class="end" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr class="rodape">    
            <td class="dados_rodape">
                <b>'.utf8_decode($informacoes["informacoesEmpresa"]).'</b>
			</td>
        </tr>
    </table>
    <hr style="border-top: 1px dashed #8c8b8b;">
    
    <table class="texto" width="100%" border="0" cellpadding="5" cellspacing="5">
        <tr>
        	<td align="left"><img src="../img/logo_safeweb.png" /></td>
        </tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr class="trtitulo">
            <td class="tdtitulo" align="center">
            	<strong><u>RECIBO</u></strong>
            </td>
        </tr>
    </table> 
		
    <table class="texto" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
        	<td align="left">
            	&nbsp;
            </td>
            <td align="right" width="30%">
            	<numero><strong>TOTAL R$ '.$informacoes["valor"].' ('.utf8_decode($informacoes["formaPagamento"]).')</strong></numero>
            </td>
        </tr>
        <tr>
            <td align="justify" width="100%">
                    <texto> Recebi  da empresa <b>'.utf8_decode($informacoes["cliente"]).'</b> - CNPJ/CPF <b>'.$informacoes["documento"].'</b>, localizada '.utf8_decode($informacoes['endereco']).' CEP: '.$informacoes["cep"].'. <b>Referente a AQUISIÇÃO DE '.utf8_decode($informacoes["produto"]).'</b></texto>
			</td>
        </tr>
        <tr>
            <td align="left">
            	<br /><texto>No qual dou plena quita&ccedil;&atilde;o.</texto>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
    
	<br><br>
    
	<table class="texto" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td align="left" width="50%"><assinatura><b>Ass: __________________________________________</b></assinatura></td>
            <td align="right" width="50%"><data><b>Belém-PA '.date('d') . ' do '. date('m') .' de ' .date('Y').' </b></data></td>
        </tr>
        <tr>
			<td align="left"><assinatura><b>Carimbo/Assinatura</b></assinatura></td>
            <td align="left">&nbsp;</td>
        </tr>
    </table>
	
    <table class="end" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr class="rodape">    
            <td class="dados_rodape">
                <b>'.utf8_decode($informacoes["informacoesEmpresa"]).'</b>
			</td>
        </tr>
    </table>
</body>

</html>
';



//para gerar o recibo em PDF

$mpdf=new mPDF('c');
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('real','single');
$mpdf->WriteHTML($html);

$fileName = $informacoes["cliente"].".pdf";

$mpdf->Output("recibos/".$fileName,"F");

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename='.$fileName);
header('Pragma: no-cache');
readfile("recibos/". $fileName);

?>

