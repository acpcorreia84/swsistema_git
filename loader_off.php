<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/inc/uteis.php";
date_default_timezone_set('America/Belem');
define('TITULO_GERAL', 'Dashboard v3.0 - REVENDEDOR AUTORIZADO');

/*
 * ESTRUTURA DO PROPEL_INIT.PHP
 */
 
define('PREFIX',          $_SERVER['DOCUMENT_ROOT'] . '/classes/');
define('PEAR_BASE',      PREFIX . 'pear/');
define('PROJECT_CONF',     PREFIX . 'conf/swsistema-conf.php');
$includes   = array();

$includes[] = PEAR_BASE;
$includes[] = PREFIX;

// don't forget to add current include_path
$includes[] = ini_get('include_path');
ini_set('include_path', implode(PATH_SEPARATOR, $includes));

require_once 'propel/Propel.php';
$e = Propel::init(PROJECT_CONF);

$arquivo = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/' )+1);

switch ($arquivo) {
     case 'formulario_cd_cadastro_tipo.php':
          require_once 'pacoteCertificado/CertificadoSituacao.php';
          break;	
	
	case 'pageRecuperacaoSenha.php':
          require_once 'pacoteUsuario/Usuario.php';
          break;		
		  
	case 'cadastro.php':
          require_once 'pacoteCliente/ClienteCadastro.php';
          break;  
	case 'telaEsqueciSenha.php':
		require_once 'inc/PHPMailer_v5.1/class.phpmailer.php';
		break;
}
?>
