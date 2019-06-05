<? //Conexão à base de dados
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

//recebe os parâmetros

try{
    $cContadores = new Criteria();
    $cContadores->add(ContadorPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
    if ($usuarioLogado->getPerfil()->getNome()!='DIRETORIA')
        $cContadores->add(ContadorPeer::USUARIO_ID, $usuarioLogado->getId());
    $contadoresObj = ContadorPeer::doSelect($cContadores);

    $contadoresArr = array();
    foreach ($contadoresObj as $contador) {
        if ($contador->getNome())
            $contadoresArr[$contador->getId()] = trim($contador->getNome());
        elseif ($contador->getRazaoSocial())
            $contadoresArr[$contador->getId()] = trim($contador->getRazaoSocial());
        else
            $contadoresArr[$contador->getId()] = trim($contador->getNomeFantasia());
    }
    asort($contadoresArr);

    $contadoresJson = array();
    foreach ($contadoresArr as $key=>$nome) {
        $contadoresJson[] = array("id"=>$key, "nome"=>$nome);
    }

    echo '0;'.json_encode($contadoresJson);

}catch (Exception $e){
    erroEmail($e->getMessage(),"Erro na funcao de carregar contadores no fechar negócio do prospect");
    echo $e->getMessage();
}
?>