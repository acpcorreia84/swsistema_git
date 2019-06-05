<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $prodpectId = $_REQUEST['edtProspectId'];

    try
    {
            $prospectSituacao = new ProspectSituacao();
            $prospectSituacao->setProspectAcaoId(5);
            $prospectSituacao->setProspectId($prodpectId);
            $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
            $prospectSituacao->setUsuarioId($usuarioLogado->getId());

        try {
            $prospectSituacao->save();
        }
            catch(PropelException $e) {
                echo $e->getMessage();
                exit;
        }
        //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
        echo "1";
    }
    catch (Exception $ex)
    {
        //retorna 0 para no sucesso do ajax saber que foi um erro
        echo "0";
    }
?>