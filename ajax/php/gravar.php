<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $edtNome = $_REQUEST['edtNomes'];
    $edtCpfcnpj = $_REQUEST['edtCpf'];
    $edtCidade = $_REQUEST['edtCidade'];
    $edtBairro = $_REQUEST['edtBairro'];
    $edtPessoaTipo = $_REQUEST['edtPessoaTipo'];
    $edtFone = $_REQUEST['edtFone'];
    $edtSite = $_REQUEST['edtSite'];
    $edtEndereco = $_REQUEST['edtEndereco'];
    $edtCategoriaProspect = $_REQUEST['edtCategoriaProspect'];
    $prospectID = $_REQUEST['edtProspectId'];

    $tamanhoCpfCnpj = strlen($edtCpfcnpj);

    try{

        if($edtCpfcnpj != ""){
            $cProspectContato = new Criteria();
            if($tamanhoCpfCnpj == 14){
                $cProspectContato->add(ProspectContatoPeer::CPF,$edtCpfcnpj);
            }elseif($tamanhoCpfCnpj == 18) {
                $cProspectContato->add(ProspectContatoPeer::CNPJ, $edtCpfcnpj);
            }
            $prospectContato = ProspectContatoPeer::doSelectOne($cProspectContato);
        }

        if(!$prospectContato){
            $prospectContato = new ProspectContato();
        }

        $prospectContato->setNome($edtNome);
        if($tamanhoCpfCnpj == 14){
            $prospectContato->setCpf($edtCpfcnpj);
        }else{
            $prospectContato->setCnpj($edtCpfcnpj);
        }

        $prospectContato->setCidade($edtCidade);
        $prospectContato->setBairro($edtBairro);
        $prospectContato->setPessoaTipo("F");
        $prospectContato->setFone($edtFone);
        $prospectContato->setSite($edtSite);
        if(!$prospectContato->getUsuarioId()) {
            $prospectContato->setUsuarioId($usuarioLogado->getId());
        }
        $prospectContato->setEndereco($edtEndereco);
        $prospectContato->setProspectTipoId($edtCategoriaProspect);

        $prospectSituacao = new ProspectSituacao();
        $prospectSituacao->setProspectAcaoId(4);
        $prospectSituacao->setProspectId($prospectID);
        $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
        $prospectSituacao->setUsuarioId($usuarioLogado->getId());

        $prospectSituacao->save();
        $prospectContato->save();


        $cProspect = new Criteria();
        $cProspect->add(ProspectPeer::PROSPECT_CONTATOS_ID, $prospectContato->getId());
        $cProspect->addDescendingOrderByColumn(ProspectPeer::ID);
        $prospect = ProspectPeer::doSelectOne($cProspect);

        if(!$prospect){
            $prospect = new Prospect();
            $prospect->setUsuarioId($usuarioLogado->getId());
            $prospect->setProspectId($prospectID);
            $prospect->setDataCadastro(date('Y-m-d H:i:s'));
        }

        $prospect->setProspectContatosId($prospectContato->getId());
        $prospect->setSituacao(0);
        $prospect->setProspectTipoId(5);

        $prospect->save();

        echo "1";
    }
    catch (Exception $e){
        erroEmail($e->getMessage(),$usuarioLogado->getNome());
        echo $e->getMessage();
    }
?>