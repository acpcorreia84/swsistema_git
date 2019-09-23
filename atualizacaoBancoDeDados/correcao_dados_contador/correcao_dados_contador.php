<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 18/09/2019
 * Time: 18:24
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';

$cContadores = new Criteria();

$contadores = ContadorPeer::doSelect($cContadores);
$i = 1;
foreach ($contadores as $contador) {
    if (strpos($contador->getAgencia(), '-')) {
        $aux = explode( '-', $contador->getAgencia());
        echo $i++ . ':<br>'; var_dump($aux); echo "<br>";

        if (strlen(trim($aux[1])) == 1) {
            $contador->setAgencia(trim($aux[0]));
            $contador->setDigitoAgencia(trim($aux[1]));
            $contador->save();
        }
    }
}
?>