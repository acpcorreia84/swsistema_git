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
        $cCliente->addOr(ClientePeer::CPF_CNPJ, removeTracoPontoBarra($cpf));
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
        var_dump( $mensagemErro);
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
        $endereco = $cliente->getEndereco();
        $complemento = $cliente->getComplemento();
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $bairro = $cliente->getBairro();
        $cidade = $cliente->getCidade();
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
} else if ($tipoPessoa == 'pj') {
    $cnpj = $_POST['cnpj'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];

    try{
        $cCliente = new Criteria();
        $cCliente->add(ClientePeer::CPF_CNPJ,$cnpj);
        $cCliente->add(ClientePeer::SITUACAO,-1, Criteria::NOT_EQUAL);
        $cCliente->addDescendingOrderByColumn(ClientePeer::ID);
        $cliente = ClientePeer::doSelectOne($cCliente);

        /*CHAMADA AJAX PARA CONSULTA RECEITA FEDERAL*/
        //$cnpj = $ws->consultarCNPJ(removeTracoPontoBarra($cpf),$dataNascimento, removeTracoPontoBarra($cnpj));
    }catch (Exception $e){
        erroEmail($e->getMessage(), "Erro na consulta de Cnpj, não foi possível retornar o cliente.");
        $mensagemErro =  $e->getMessage();
        var_dump( $mensagemErro);
        exit;
    }

    $retorno = 'ok;';

    /*BUSCA POR RESPONSAVEIS, CASO O RESPONSAVEL LEGAL DA EMPRESA NAO SEJA O MESMO DO CCADASTRO NO SISTEMA TROCA*/
    $cResponsavel2 = new Criteria();
    $cResponsavel2->add(ResponsavelPeer::CPF, $cpf);
    $cResponsavel2->addOr(ResponsavelPeer::CPF, removeTracoPontoBarra($cpf));
    $cResponsavel2->addDescendingOrderByColumn(ResponsavelPeer::ID);
    $responsavelObj = ResponsavelPeer::doSelectOne($cResponsavel2);

    if ($responsavelObj) {
        $responsavel = $responsavelObj;
    }
/*    elseif ((empty($cpf)) && ($cliente)) {
        $responsavel = $cliente->getResponsavel();
    }*/
    if ($responsavel) {
        /*SE NAO ENCONTROU CLIENTE PESSOA JURIDICA, TENTA ACHAR UM CLIENTE PESSOA FISICA NA TABELA DE CLIENTES*/
        $codResponsavel = $responsavel->getId();
        $cpfResponsavel = $responsavel->getCpf();
        $nascimentoResponsavel = $responsavel->getNascimento('d/m/Y');
        $nomeResponsavel = trim($responsavel->getNome());
        $enderecoResponsavel = trim($responsavel->getEndereco());
        $complementoResponsavel = $responsavel->getComplemento();
        $numeroResponsavel = $responsavel->getNumero();
        $ufResponsavel = $responsavel->getUf();
        $bairroResponsavel = trim($responsavel->getBairro());
        $cidadeResponsavel = trim($responsavel->getCidade());
        $foneResponsavel = $responsavel->getFone1();
        $fone2Responsavel = $responsavel->getFone2();
        $celularResponsavel = $responsavel->getCelular();
        $emailResponsavel = $responsavel->getEmail();
        $cepResponsavel = $responsavel->getCep();

        $arrResponsavel = array("codigoResponsavel"=>$codResponsavel,"nomeResponsavel"=>$nomeResponsavel ,"enderecoResponsavel"=>$enderecoResponsavel,"complementoResponsavel"=>$complementoResponsavel,"numeroReponsavel"=>$numeroResponsavel ,"ufResponsavel"=>$ufResponsavel,"bairroResponsavel"=>$bairroResponsavel,
            "cpfResponsavel"=>$cpfResponsavel,"cidadeResponsavel"=>$cidadeResponsavel,"foneResponsavel"=>$foneResponsavel,"fone2Responsavel"=>$fone2Responsavel,"celularResponsavel"=>$celularResponsavel,
            "nascimentoReponsavel"=>$nascimentoResponsavel,"emailResponsavel"=>$emailResponsavel,"cepResponsavel"=>$cepResponsavel);

        $retorno .= json_encode($arrResponsavel) . ";";
    } else
        $retorno .= "naoEncontrouResponsavel;";

    /*SE ENCONTROU O CLIENTE*/
    if ($cliente) {
        $codEmpresa = $cliente->getId();

        $razaoSocial = utf8_encode(trim($cliente->getRazaoSocial()));
        $nomeFantasia = utf8_encode(trim($cliente->getNomeFantasia()));

        $endereco = utf8_encode(trim($cliente->getEndereco()));
        $complemento = utf8_encode($cliente->getComplemento());
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $bairro = utf8_encode(trim($cliente->getBairro()));
        $cidade = utf8_encode(trim($cliente->getCidade()));
        $fone = $cliente->getFone1();
        $fone2 = $cliente->getFone2();
        $celular = $cliente->getCelular();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $contadorId = $cliente->getContadorId();

        $arrCliente = array("codigoEmpresa"=>$codEmpresa, "razaoSocial"=>$razaoSocial,"nomeFantasia"=>$nomeFantasia,"enderecoEmpresa"=>$endereco,"complementoEmpresa"=>$complemento,"numeroEmpresa"=>$numero ,
                        "ufEmpresa"=>$uf,"bairroEmpresa"=>$bairro,"cidadeEmpresa"=>$cidade,"foneEmpresa"=>$fone,"fone2Empresa"=>$fone2,"celularEmpresa"=>$celular,"emailEmpresa"=>$email ,"cepEmpresa"=>$cep ,"contadorEmpresa"=>$contadorId,
                        );

        $retorno .= json_encode($arrCliente);
        echo $retorno.';'.$mensagemErro;
    } else {
        $retorno .= "naoEncontrouCliente";
        echo $retorno;
    }

}
?>