<?
    date_default_timezone_set('America/Belem');
	require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
	$funcao = $_REQUEST['funcao'];

//VARIAVEL PARA A FUNÇÃO INSERIR OBSERVAÇÃO
if ($funcao == 'consultarClienteCertificado') {carregarClienteCertificado(); }

function carregarClienteCertificado()
{
    $tipoPessoa = $_POST['pessoa_tipo'];
    try {
        $cliente = ClientePeer::retrieveByPK($_POST['cliente_id']);
    } catch (Exception $e) {
        erroEmail($e->getMessage(), "Erro na consulta do cliente.");
        var_dump($e->getMessage());
        exit;
    }
    if ($tipoPessoa == 'F') { //SE FOR PESSOA F?SICA
        /*SE ENCONTROU CLIENTE NA BASE DE DADOS*/
        if ($cliente) {
            if ($cliente->getRazaoSocial()) {
                $nomeCliente = $cliente->getRazaoSocial();
            } else if ($cliente->getNomeFantasia()) {
                $nomeCliente = $cliente->getNomeFantasia();
            } else if ($cliente->getNome()) {
                $nomeCliente = $cliente->getNome();
            } else {
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

            $arrCl = $codCliente . ";" . $nomeCliente . ";" . $endereco . ";" . $complemento . ";" . $numero . ";" . $uf . ";" . $bairro;
            $arrCl .= ";" . utf8_encode($cidade) . ";" . $fone . ";" . $fone2 . ";" . $celular . ";" . $email . ";" . $cep . ";" . $contadorId;
            $retorno = $arrCl . ';0';
            echo $retorno;
        }

        /*FIM DE CODIGO DE PF*/
    } else if ($tipoPessoa == 'J') {
        $retorno = 'ok;';
        $responsavel = $cliente->getResponsavel();

        if ($responsavel) {
            /*SE NAO ENCONTROU CLIENTE PESSOA JURIDICA, TENTA ACHAR UM CLIENTE PESSOA FISICA NA TABELA DE CLIENTES*/
            $codResponsavel = $responsavel->getId();
            $cpfResponsavel = $responsavel->getCpf();
            $nascimentoResponsavel = $responsavel->getNascimento('d/m/Y');
            $nomeResponsavel = utf8_encode(trim($responsavel->getNome()));
            $enderecoResponsavel = trim($responsavel->getEndereco());
            $complementoResponsavel = $responsavel->getComplemento();
            $numeroResponsavel = $responsavel->getNumero();
            $ufResponsavel = $responsavel->getUf();
            $bairroResponsavel = utf8_encode(trim($responsavel->getBairro()));
            $cidadeResponsavel = utf8_encode(trim($responsavel->getCidade()));
            $foneResponsavel = $responsavel->getFone1();
            $fone2Responsavel = $responsavel->getFone2();
            $celularResponsavel = $responsavel->getCelular();
            $emailResponsavel = $responsavel->getEmail();
            $cepResponsavel = $responsavel->getCep();

            $arrResponsavel = array("codigoResponsavel" => $codResponsavel, "nomeResponsavel" => $nomeResponsavel, "enderecoResponsavel" => $enderecoResponsavel, "complementoResponsavel" => $complementoResponsavel, "numeroReponsavel" => $numeroResponsavel, "ufResponsavel" => $ufResponsavel, "bairroResponsavel" => $bairroResponsavel,
                "cpfResponsavel" => $cpfResponsavel, "cidadeResponsavel" => $cidadeResponsavel, "foneResponsavel" => $foneResponsavel, "fone2Responsavel" => $fone2Responsavel, "celularResponsavel" => $celularResponsavel,
                "nascimentoReponsavel" => $nascimentoResponsavel, "emailResponsavel" => $emailResponsavel, "cepResponsavel" => $cepResponsavel);

            $retorno .= json_encode($arrResponsavel) . ";";
        }

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

            $arrCliente = array("codigoEmpresa" => $codEmpresa, "razaoSocial" => $razaoSocial, "nomeFantasia" => $nomeFantasia, "enderecoEmpresa" => $endereco, "complementoEmpresa" => $complemento, "numeroEmpresa" => $numero,
                "ufEmpresa" => $uf, "bairroEmpresa" => $bairro, "cidadeEmpresa" => $cidade, "foneEmpresa" => $fone, "fone2Empresa" => $fone2, "celularEmpresa" => $celular, "emailEmpresa" => $email, "cepEmpresa" => $cep, "contadorEmpresa" => $contadorId,
            );

            $retorno .= json_encode($arrCliente);
            echo $retorno . ';';
        }

    }
}

?>

