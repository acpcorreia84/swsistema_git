<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 17/09/2019
 * Time: 14:23
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

function exportarContadoresRelatorioMensal ($dados) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=relatorioMensalContadores.xls");
    $dados = stripslashes(html_entity_decode($dados));
    $dados = json_decode($dados);
    //var_dump($dados);
    $informacoes = array();

    foreach ($dados as $dado)
        $informacoes[] = get_object_vars($dado);
    $heading = false;
    if(!empty($dados))
        //var_dump(get_object_vars($dados[0]));exit;
        //var_dump($informacoes);

        foreach($informacoes as $row) {
            if(!$heading) {
                // display field/column names as a first row
                echo implode("\t", array_keys($row)) . "\n";
                $heading = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    exit;
}
exportarContadoresRelatorioMensal($_POST['dadosPlanilha']);


?>