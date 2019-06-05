<?
$boleto = BoletoPeer::retrieveByPk($_GET['boleto_id']);

$nome = $boleto->getCliente()->getNomeFantasia();
if (!isset($nome) || $nome==null || $nome==''){
    $nome = $boleto->getCliente()->getRazaoSocial();
}
$produto = $boleto->getDescricao();
$boleto_url=$_GET['boleto_url'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Emiss&atilde;o de Boleto SERAMA</title>
    
	<style type="text/css" media="screen">
    a:link { color:#33348e; text-decoration: none; }
    a:visited { color:#33348e; text-decoration: none; }
    a:hover { color:#33348e; text-decoration: none; }
    a:active { color:#7476b4; text-decoration: underline; }
    </style>    
</head>
<body style="font-size:12px; background-color:#ececec; font-family:verdana,geneva,sans-serif;">
<table width="100%" border="0" cellpadding="5">
  <tr>
    <td align="center"><table width="600" border="0" cellpadding="10" cellspacing="0">
      <tr></tr>
      <tr>
        <td align="center" bgcolor="#336699"><table align="right" border="0" cellpadding="0" cellspacing="0" class="container2">
          <tbody>
            <tr>
              <td align="center" valign="top"><table align="center" border="0" cellpadding="0" cellspacing="0" class="container">
                <tbody>
                  <tr>
                    <td style="font-size: 12px; line-height: 27px; font-family: Arial,Tahoma, Helvetica, sans-serif; color:#ffffff; font-weight:normal; text-align:center; padding-right: 10px;"><span style="font-family:verdana,geneva,sans-serif;">Compartilhe</span></td>
                    <td align="center" id="clear-padding" valign="middle"><a href="https://www.facebook.com/gruposerama/" style="margin-top:5px;padding-top:5px;" target="_blank"><img alt="icon-facebook" border="0" hspace="0" src="http://www.gruposerama.com/img/face.png" style="max-width:30px;" vspace="0" /></a></td>
                    <td align="center" id="clear-padding" valign="middle"><span style="font-family:verdana,geneva,sans-serif;"><a href="https://business.google.com/b/109899903235291004176/dashboard/l/17199559175166432783" style="margin-top:5px;padding-top:5px;" target="_blank"><img alt="icon-facebook" border="0" hspace="0" src="http://www.gruposerama.com/img/google.png" style="max-width:30px;" vspace="0" /></a></span></td>
                    </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><img src="http://gruposerama.com/site/wp-content/themes/serama/imagens/logo_serama.png" alt="logo" width="358" height="135" /></td>
      </tr>
      <tr >
        <td align="left" bgcolor="#FFFFFF" style="background-color: #ffffff; border-bottom:2px solid #c7c7c7;"><p>&nbsp;</p>
          <p><a href="<?=$boleto_url?>" style="text-decoration: none; color: #555555; font-weight: bold; font-size:22px" ><span style="color: rgb(51, 102, 153); ">Boleto de Pagamento</span></a></p></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF"><p style="color:#696969;"><strong>Cliente</strong>: <?=$nome;?><br />
            <strong>Produto</strong>: 
            <?=$produto?>
        </p>
          <p style="color:#696969;">Segue Abaixo o link para emiss&atilde;o do boleto de pagamento: </p>
          <br />
          <table width="100%" border="0" cellpadding="5">
              <tr>
                <td align="center"><a href="<?=$boleto_url?>" target="_blank"><span style="color: rgb(85, 85, 85); font-weight: normal;"><img src="http://www.gruposerama.com/imgs/boleto_menor.png" /><br />
                  <br />
Emitir Boleto</span></a></td>
              </tr>
            </table></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF" style="background-color: #ffffff; border-bottom:2px solid #c7c7c7; ">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" ><a href="http://gruposerama.com/site/wp-content/uploads/2016/01/logo_serama_autoridade_registro-e1453376159115.png"></a>
          <table width="100%" border="0" cellpadding="5">
            <tr>
              <td><a href="http://gruposerama.com/site/wp-content/uploads/2016/01/logo_serama_autoridade_registro-e1453376159115.png"><img alt="Serama" height="42" src="http://gruposerama.com/site/wp-content/uploads/2016/01/logo_serama_autoridade_registro-e1453376159115.png" style="max-width: 137px; border-width: 0px; border-style: solid; margin: 0px;" width="111" /></a></td>
              <td align="right"><span style="font-size: 13px;  line-height: 18px; color: #5eb0f0;  font-weight:normal; text-align: center; font-family:Tahoma, Helvetica, Arial, sans-serif;"><span style="font-family:verdana,geneva,sans-serif;"><a href="http://www.gruposerama.com/site"></a></span></span>                Serama - Seguran&ccedil;a Digital<br />
                07.467.912/0001-17<br />
                Rua Bernal do Couto, 610, Bel&eacute;m - PA. Cep: 66055-080</td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="left" style=" border-bottom:8px solid #336699;">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" style="border-bottom:2px solid #c7c7c7; "><a href="http://www.gruposerama.com/site" target="_blank">www.serama.com.br</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>