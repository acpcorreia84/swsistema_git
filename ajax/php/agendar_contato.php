<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $prodpectId = $_REQUEST['edtProspectId'];
	$edtDataAgendamento = $_REQUEST['edtDataAgendamento'];
    $edtMotivoAgendamento = $_REQUEST['edtMotivoAgendamento'];
    $funcao = $_REQUEST['funcao'];

    try {
			$prospect = ProspectPeer::RetrieveByPk($prodpectId);

            if ($funcao == 'espera'){
                $dataCorreta = date('Y-m-d '.$edtDataAgendamento.":00");
            }else{
                $dataAgendamento = explode("/",$edtDataAgendamento);
                $horaAgendamento = explode(" ",$dataAgendamento[2]);
                $dataCorreta = $horaAgendamento[0]."-".$dataAgendamento[1]."-".$dataAgendamento[0]." ".$horaAgendamento[1];
            }

            $prospect->setDataAgendamento($dataCorreta);
            $prospect->save();

            $prospectSituacao = new ProspectSituacao();
            $prospectSituacao->setProspectAcaoId(7);
			$prospectSituacao->setObservacao($edtMotivoAgendamento);
            $prospectSituacao->setProspectId($prodpectId);
            $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
            $prospectSituacao->setUsuarioId($usuarioLogado->getId());
			$prospectSituacao->save();

            echo '1';
    }catch (Exception $ex){
        erroEmail($ex->getMessage(),"Erro na inserção de dados no arquvo agendar contato em ajax");
        echo $ex->getMessage();
    }
?>