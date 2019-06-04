<?php
session_start();
//const DOCUMENT_ROOT = '/home/serama/public_html/dashboard.serama.com.br';
const DOCUMENT_ROOT = 'c:/xampp/htdocs/serama3.0';
require_once DOCUMENT_ROOT."/inc/uteis_cron.php";

date_default_timezone_set('America/Belem');
define('TITULO_GERAL', 'Dashboard v3.0');

/*
 * ESTRUTURA DO PROPEL_INIT.PHP
 */
 
define('PREFIX',          DOCUMENT_ROOT. '/classes/');
define('PEAR_BASE',      PREFIX . 'pear/');
define('PROJECT_CONF',     PREFIX . 'conf/serama-conf.php');
$includes   = array();

$includes[] = PEAR_BASE;
$includes[] = PREFIX;

// don't forget to add current include_path
$includes[] = ini_get('include_path');
ini_set('include_path', implode(PATH_SEPARATOR, $includes));

require_once 'propel/Propel.php';
$e = Propel::init(PROJECT_CONF);

?>
