<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader_off.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/WSCertificado.php';

$tipoPessoa = $_POST['tipoPessoa'];
$ws = new WSCertificado();

if ($tipoPessoa == 'pf') { //SE FOR PESSOA F?SICA
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];

    //CONSULTA PREVIA CPF
    try {
        $consultouReceita = false;
        $cCliente = new Criteria();
        $cCliente->add(ClientePeer::CPF_CNPJ,$cpf);
        $cCliente->add(ClientePeer::SITUACAO,-1, Criteria::NOT_EQUAL);
        $cCliente->addDescendingOrderByColumn(ClientePeer::ID);
        $cliente = ClientePeer::doSelectOne($cCliente);
        if (!isset($cliente) || $cliente == null){
            $cResponsavel = new  Criteria();
            $cResponsavel->add(ResponsavelPeer::CPF,$cpf);
            $cResponsavel->addDescendingOrderByColumn(ResponsavelPeer::ID);
            $responsavel = ResponsavelPeer::doSelectOne($cCliente);

            /* CASO NAO ENCONTRE O CLIENTE NA BASE DA SERAMA BUSCA NA COSNULTA PREVIA
             * if ($cliente===null) {
                try {
                    $cpf = $ws->consultarCPF(removeTracoPontoBarra($cpf), $dataNascimento);
                    var_dump($cpf);
                    $consultouReceita = true;
                    echo "receita;" . $cpf["Nome"] . ";".$cpf["CPF"]. ";".$cpf["DataNascimento"];
                }catch (Exception $e) {
                    echo "erroConsultaPrevia;" . $e->getMessage();
                }
            }*/
        }
    }catch (Exception $e){
        erroEmail($e->getMessage(), "Erro na consulta de Cpf, não foi possível retornar cpf.");
        $mensagemErro =  $e->getMessage();
        echo $mensagemErro;
        exit;
    }

    /*SE ENCONTROU CLIENTE NA BASE DE DADOS*/
    if ($cliente) {
        if ($cliente->getRazaoSocial()){
            $nomeCliente= $cliente->getRazaoSocial();
        }else if( $cliente->getNomeFantasia()){
            $nomeCliente = $cliente->getNomeFantasia();
        }else if($cliente->getNome()){
            $nomeCliente = $cliente->getNome();
        }else{
            $nomeCliente = "";
        }
        $codCliente = $cliente->getId();
        $endereco = removeEspeciais($cliente->getEndereco());
        $complemento = removeEspeciais($cliente->getComplemento());
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $bairro = removeEspeciais($cliente->getBairro());
        $cidade = removeEspeciais($cliente->getCidade());
        $fone = $cliente->getFone1();
        $fone2 = $cliente->getFone2();
        $celular = $cliente->getCelular();
        $email = $cliente->getEmail();
        $cep = mascara($cliente->getCep(), "#####-###");
        $contadorId = $cliente->getContadorId();

        $arrCl = $codCliente.";".$nomeCliente .";".$endereco.";".$complemento.";".$numero .";".$uf.";".$bairro;
        $arrCl.=";".$cidade.";".$fone.";".$fone2.";".$celular.";".$email .";".$cep .";".$contadorId;
        $retorno = $arrCl.';0';
        echo $retorno;
    }
    else
        echo "naoEncontrouCliente;0";

/*FIM DE CODIGO DE PF*/
} else if($tipoPessoa == 'pj') {
    $cnpj = $_POST['cnpj'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];

    try{
        $cCliente = new Criteria();
        $cCliente->add(ClientePeer::CPF_CNPJ,$cnpj);
        $cCliente->addDescendingOrderByColumn(ClientePeer::ID);
        $clientes = ClientePeer::doSelectJoinResponsavel($cCliente);
        $cliente = $clientes[0];
        /*CHAMADA AJAX PARA CONSULTA RECEITA FEDERAL*/
        //$cnpj = $ws->consultarCNPJ(removeTracoPontoBarra($cpf),$dataNascimento, removeTracoPontoBarra($cnpj));
    }catch (Exception $e){
        $mensagemErro = $e->getMessage();
    }

    if ($mensagemErro===null) { //SE N?O TROUXE NENHUMA MENSAGEM DE ERRO FA?A]
        /*BUSCA POR RESPONSAVEIS, CASO O RESPONSAVEL LEGAL DA EMPRESA NAO SEJA O MESMO DO CCADASTRO NO SISTEMA TROCA*/
        $cResponsavel = new Criteria();
        $cResponsavel->add(ResponsavelPeer::CPF, $cpf);
        $cResponsavel->addDescendingOrderByColumn(ResponsavelPeer::ID);
        $responsavel = ResponsavelPeer::doSelectOne($cResponsavel);

        $codEmpresa = $cliente->getId();

        $razaoSocial = $cliente->getRazaoSocial();
        $nomeFantasia = $cliente->getNomeFantasia();

        $endereco = removeEspeciais($cliente->getEndereco());
        $complemento = removeEspeciais($cliente->getComplemento());
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $bairro = removeEspeciais($cliente->getBairro());
        $cidade = removeEspeciais($cliente->getCidade());
        $fone = $cliente->getFone1();
        $fone2 = $cliente->getFone2();
        $celular = $cliente->getCelular();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $contadorId = $cliente->getContadorId();

        if (!$responsavel) {
            if ($cliente->getResponsavel())
                $responsavel = $cliente->getResponsavel();
            else
                $responsavel = new Responsavel();
        }
        $nomeResponsavel = $responsavel->getNome();
        $enderecoResponsavel = removeEspeciais($responsavel->getEndereco());
        $complementoResponsavel = removeEspeciais($responsavel->getComplemento());
        $numeroResponsavel = $responsavel->getNumero();
        $ufResponsavel = $responsavel->getUf();
        $bairroResponsavel = removeEspeciais($responsavel->getBairro());
        $cidadeResponsavel = removeEspeciais($responsavel->getCidade());
        $foneResponsavel = $responsavel->getFone1();
        $fone2Responsavel = $responsavel->getFone2();
        $celularResponsavel = $responsavel->getCelular();
        $emailResponsavel = $responsavel->getEmail();
        $cepResponsavel = $responsavel->getCep();

        $arrCliente = array("codigoEmpresa"=>$codEmpresa, "razaoSocial"=>$razaoSocial,"nomeFantasia"=>$nomeFantasia,"enderecoEmpresa"=>$endereco,"complementoEmpresa"=>$complemento,"numeroEmpresa"=>$numero ,
                        "ufEmpresa"=>$uf,"bairroEmpresa"=>$bairro,"cidadeEmpresa"=>$cidade,"foneEmpresa"=>$fone,"fone2Empresa"=>$fone2,"celularEmpresa"=>$celular,"emailEmpresa"=>$email ,"cepEmpresa"=>$cep ,"contadorEmpresa"=>$contadorId,
                        );
        $arrResponsavel = array("codigoResponsavel"=>$codResponsavel,"nomeResponsavel"=>$nomeResponsavel ,"enderecoResponsavel"=>$enderecoResponsavel,"complementoResponsavel"=>$complementoResponsavel,"numeroReponsavel"=>$numeroResponsavel ,"ufResponsavel"=>$ufResponsavel,"bairroResponsavel"=>$bairroResponsavel,
                        "cidadeResponsavel"=>$cidadeResponsavel,"foneResponsavel"=>$foneResponsavel,"fone2Responsavel"=>$fone2Responsavel,"celularResponsavel"=>$celularResponsavel,"emailResponsavel"=>$emailResponsavel,"cepResponsavel"=>$cepResponsavel);

        $retorno = json_encode($arrCliente).';'.json_encode($arrResponsavel).';ok';
    }else{
        $codCliente = $cliente->getId();

        $endereco = removeEspeciais($cliente->getEndereco());
        $complemento = removeEspeciais($cliente->getComplemento());
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $bairro = removeEspeciais($cliente->getBairro());
        $cidade = removeEspeciais($cliente->getCidade());
        $fone = $cliente->getFone1();
        $fone2 = $cliente->getFone2();
        $celular = $cliente->getCelular();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $contadorId = $cliente->getContadorId();

        $responsavel = ResponsavelPeer::retrieveByPK($cliente->getResponsavelId());

        $enderecoResponsavel = removeEspeciais($responsavel->getEndereco());
        $complementoResponsavel = removeEspeciais($responsavel->getComplemento());
        $numeroResponsavel = $responsavel->getNumero();
        $ufResponsavel = $responsavel->getUf();
        $bairroResponsavel = removeEspeciais($responsavel->getBairro());
        $cidadeResponsavel = removeEspeciais($responsavel->getCidade());
        $foneResponsavel = $responsavel->getFone1();
        $fone2Responsavel = $responsavel->getFone2();
        $celularResponsavel = $responsavel->getCelular();
        $emailResponsavel = $responsavel->getEmail();
        $cepResponsavel = $responsavel->getCep();
        //$contadorIdResponsavel = $responsavel->getContadorId();


        $arrCl = $codCliente.";".$nomeCliente .";".$endereco.";".$complemento.";".$numero .";".$uf.";".$bairro;
        $arrCl.=";".$cidade.";".$fone.";".$fone2.";".$celular.";".$email .";".$cep .";".$contadorId;
        $arrResponsavel = $codResponsavel.";".$nomeResponsavel .";".$enderecoResponsavel.";".$complementoResponsavel.";".$numeroResponsavel .";".$ufResponsavel.";".$bairroResponsavel;
        $arrResponsavel.=";".$cidadeResponsavel.";".$foneResponsavel.";".$fone2Responsavel.";".$celularResponsavel.";".$emailResponsavel.";".$cepResponsavel.";".$contadorIdResponsavel;
        $retorno = $arrCl.';0;'.$arrResponsavel = $codResponsavel.";".$nomeResponsavel .";".$enderecoResponsavel.";".$complementoResponsavel.";".$numeroResponsavel .";".$ufResponsavel.";".$bairroResponsavel;
        $arrResponsavel.=";".$cidadeResponsavel.";".$foneResponsavel.";".$fone2Responsavel.";".$celularResponsavel.";".$emailResponsavel.";".$cepResponsavel.";".$contadorIdResponsavel;
        ;
    }
    echo $retorno.';'.$mensagemErro;
}
?>