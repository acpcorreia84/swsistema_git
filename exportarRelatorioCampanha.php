<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 17/09/2019
 * Time: 14:23
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

function exportarContadoresRelatorioMensal ($dados) {
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=relatorioCampanha.csv");

    $dados = json_decode($dados);

    $informacoes = array();

    foreach ($dados as $dado)
        $informacoes[] = get_object_vars($dado);
    $heading = false;
    if(!empty($informacoes))
        //var_dump(get_object_vars($dados[0]));exit;
  //      var_dump($informacoes);

        foreach($informacoes as $row) {
            $row["Nome"].=";";
            $row["Celular"].=";";
            if(!$heading) {
                // display field/column names as a first row
                echo "Nome;Celular;\n";
                $heading = true;
            }
            echo implode(array_values($row)) . "\n";
        }
    exit;
}

exportarContadoresRelatorioMensal($_POST['dadosPlanilha']);


?>