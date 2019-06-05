<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $prodpectId = $_REQUEST['edtProspectId'];
	$edtObservacaoChamada = $_REQUEST['edtObservacaoChamada'];

    try {
            $prospect = ProspectPeer::retrieveByPK($prodpectId);

            $prospect->setDataUltimoContato(date('Y-m-d H:i:s'));

            $prospectSituacao = new ProspectSituacao();
            $prospectSituacao->setProspectAcaoId(8);
			$prospectSituacao->setObservacao($edtObservacaoChamada);
            $prospectSituacao->setProspectId($prodpectId);
            $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
            $prospectSituacao->setUsuarioId($usuarioLogado->getId());
			$prospectSituacao->save();

            $prospect->save();

            jr_ir("telaProspect.php");
        //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
        echo "1";
    }
    catch (Exception $ex){
        var_dump($ex);exit;
        //retorna 0 para no sucesso do ajax saber que foi um erro
        echo "0";
    }
?>