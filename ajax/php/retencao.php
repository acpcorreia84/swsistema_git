<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $prodpectId = $_REQUEST['edtProspectId'];
	$edtObservacaoRetencao = $_REQUEST['edtObservacaoRetencao'];

    function hierarquiaRetencao($perfilId, $localId, $setorId){
        try {
            $cProximoHierarquia = new Criteria();
            $cProximoHierarquia->add(UsuarioPeer::PERFIL_ID, $perfilId);
            $cProximoHierarquia->add(UsuarioPeer::SETOR_ID, $setorId);
            $cProximoHierarquia->add(UsuarioPeer::SITUACAO, 0);
            $cProximoHierarquia->add(UsuarioPeer::LOCAL_ID, $localId);
            $proximoHierarquia = UsuarioPeer::doSelectOne($cProximoHierarquia);

            if($proximoHierarquia){
                return $proximoHierarquia->getId();
            }else{
                return 276;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    try
    {
			// PERFIL DE SUPERVISÃO IGUAL A 1
            $supervisor = hierarquiaRetencao(1,$usuarioLogado->getLocalId(),5);
            // PERFIL DE COORDENADOR IGUAL A 69
            $coordenador = hierarquiaRetencao(69,$usuarioLogado->getLocalId(),5);
            // PERFIL DE GERENCIA IGUAL A 69
            $gerente = hierarquiaRetencao(67,$usuarioLogado->getLocalId(),5);
            // PERFIL DE DIRETOR IGUAL A 69
            $diretor = hierarquiaRetencao(4,$usuarioLogado->getLocalId(),7);
			$prospect = ProspectPeer::RetrieveByPk($prodpectId);
			if($supervisor){
				$prospect->setSupervisorUsuarioId($supervisor);
			}elseif($coordenador) {
                $prospect->setSupervisorUsuarioId($coordenador);
			}elseif($gerente) {
                $prospect->setSupervisorUsuarioId($gerente);
            }elseif($diretor) {
                $prospect->setSupervisorUsuarioId($diretor);
            }
			
            $prospectSituacao = new ProspectSituacao();
            $prospectSituacao->setProspectAcaoId(7);
			$prospectSituacao->setObservacao($edtObservacaoRetencao);
            $prospectSituacao->setProspectId($prodpectId);
            $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
            $prospectSituacao->setUsuarioId($usuarioLogado->getId());
			$prospect->save();
			$prospectSituacao->save();

        echo "0";
    }catch (Exception $ex){
        echo $ex->getMessage();
    }
?>