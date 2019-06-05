<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros
    $pessoaTipo = $_REQUEST['pessoaTipo'];
    $nome =  $_REQUEST['edtNome'];
    $data_nascimento =  $_REQUEST['edtDataNascimento'];
    $nascimento = explode("/",$data_nascimento);
    $nascimento = $nascimento[2]."-".$nascimento[1]."-".$nascimento[0];
    $cpf =  $_REQUEST['edtCpf'];
    $cep =  $_REQUEST['edtCep'];
    $email =  $_REQUEST['edtEmail'];
    $endereco =  $_REQUEST['edtEndereco'];
    $complemento =  $_REQUEST['edtComplemento'];
    $numero =  $_REQUEST['edtNumero'];
    $bairro =  $_REQUEST['edtBairro'];
    $cidade =  $_REQUEST['edtCidade'];
    $uf =  $_REQUEST['edtUf'];
    $fone1 =  $_REQUEST['edtFone'];
    $fone2 =  $_REQUEST['edtFone2'];
    $celular =  $_REQUEST['edtCelular'];

    $edtCnpjNegocio=$_REQUEST['edtCnpjNegocio'];
    $edtRazaoSocial=$_REQUEST['edtRazaoSocial'];
    $edtNomeFantasiaNegocio=$_REQUEST['edtNomeFantasiaNegocio'];
    $edtEmailEmpresaNegocio=$_REQUEST['edtEmailEmpresaNegocio'];
    $edtEnderecoEmpresaNegocio=$_REQUEST['edtEnderecoEmpresaNegocio'];
    $edtComplementoEmpresaNegocio=$_REQUEST['edtComplementoEmpresaNegocio'];
    $edtNumeroEmpresaNegocio=$_REQUEST['edtNumeroEmpresaNegocio'];
    $edtBairroEmpresaNegocio=$_REQUEST['edtBairroEmpresaNegocio'];
    $edtUfEmpresaNegocio=$_REQUEST['edtUfEmpresaNegocio'];
    $edtFoneEmpresaNegocio=$_REQUEST['edtFoneEmpresaNegocio'];
    $edtFone2EmpresaNegocio=$_REQUEST['edtFone2EmpresaNegocio'];
    $edtCelularEmpresaNegocio=$_REQUEST['edtCelularEmpresaNegocio'];

    $idFisico =  $_REQUEST['edtCodigoFisico'];
    $idjuridico =  $_REQUEST['edtCodigoJuridico'];
    $prodpectId = $_REQUEST['edtProspectId'];

    try{
                if($pessoaTipo == "J") {
                    $cliente = ClientePeer::RetrieveByPk($idjuridico);
                    if($cliente) {
                        $cResponsavel = new Criteria();
                        $cResponsavel->add(ResponsavelPeer::CPF,$cpf);
                        $cResponsavel->addDescendingOrderByColumn(ResponsavelPeer::ID);
                        $responsavel = ResponsavelPeer::doSelectOne($cResponsavel);

                        if(!$responsavel){
                            $responsavel = new Responsavel();
                        }
                    }else{
                        $cliente = new Cliente();

                        $cResponsavel = new Criteria();
                        $cResponsavel->add(ResponsavelPeer::CPF,$cpf);
                        $cResponsavel->addDescendingOrderByColumn(ResponsavelPeer::ID);
                        $responsavel = ResponsavelPeer::doSelectOne($cResponsavel);

                        if(!$responsavel){
                            $responsavel = new Responsavel();
                        }
                    }

                    $responsavel->setNome(trim(removeEspeciais($nome)));
                    $responsavel->setNascimento(trim($nascimento));
                    $responsavel->setCpf(trim($cpf));
                    $responsavel->setCep(trim($cep));
                    $responsavel->setEmail(trim(removeEspeciais($email)));
                    $responsavel->setEndereco(trim(removeEspeciais($endereco)));
                    $responsavel->setComplemento(trim(removeEspeciais($complemento)));
                    $responsavel->setNumero(trim($numero));
                    $responsavel->setBairro(trim(removeEspeciais($bairro)));
                    $responsavel->setCidade(trim(removeEspeciais($cidade)));
                    $responsavel->setUf(trim(removeEspeciais($uf)));
                    $responsavel->setFone1(trim($fone1));
                    $responsavel->setFone2(trim($fone2));
                    $responsavel->setCelular(trim($celular));
                    $responsavel->save();

                    $cliente->setRazaoSocial(trim(removeEspeciais(strtoupper($edtRazaoSocial))));
                    $cliente->setPessoaTipo(trim($pessoaTipo));
                    $cliente->setCpfCnpj(trim($edtCnpjNegocio));
                    $cliente->setNomeFantasia(trim(removeEspeciais(strtoupper($edtNomeFantasiaNegocio))));
                    $cliente->setEmail(trim(removeEspeciais(strtolower($edtEmailEmpresaNegocio))));
                    $cliente->setEmailContato(trim(removeEspeciais(strtolower($edtEmailEmpresaNegocio))));
                    $cliente->setEndereco(trim(removeEspeciais(strtoupper($edtEnderecoEmpresaNegocio))));
                    $cliente->setComplemento(trim(removeEspeciais(strtoupper($edtComplementoEmpresaNegocio))));
                    $cliente->setNumero(trim($edtNumeroEmpresaNegocio));
                    $cliente->setBairro(trim(removeEspeciais($edtBairroEmpresaNegocio)));
                    $cliente->setUf(trim(removeEspeciais($edtUfEmpresaNegocio)));
                    $cliente->setFone1(trim($edtFoneEmpresaNegocio));
                    $cliente->setFone2(trim($edtFone2EmpresaNegocio));
                    $cliente->setCelular(trim($edtCelularEmpresaNegocio));
                    $cliente->setResponsavelId($responsavel->getId());
                    $cliente->setLocalId($usuarioLogado->getLocalId());

                }else {
                    $cliente = ClientePeer::RetrieveByPk($idFisico);
                    if(!$cliente){
                        $cliente = new Cliente();
                    }
                    $cliente->setNomeFantasia(trim(removeEspeciais($nome)));
                    $cliente->setPessoaTipo(trim($pessoaTipo));
                    $cliente->setNascimento(trim($nascimento));
                    $cliente->setCpfCnpj(trim($cpf));
                    $cliente->setCep(trim($cep));
                    $cliente->setEmail(trim(removeEspeciais($email)));
                    $cliente->setEndereco(trim(removeEspeciais($endereco)));
                    $cliente->setComplemento(trim(removeEspeciais($complemento)));
                    $cliente->setNumero(trim($numero));
                    $cliente->setBairro(trim(removeEspeciais($bairro)));
                    $cliente->setCidade(trim(removeEspeciais($cidade)));
                    $cliente->setUf(trim(removeEspeciais($uf)));
                    $cliente->setFone1(trim($fone1));
                    $cliente->setFone2(trim($fone2));
                    $cliente->setCelular(trim($celular));
                }
            $cliente->save();


            echo $cliente->getId().";0";
    }catch (Exception $ex){
       echo $ex->getMessage();
        //erroEmail($ex->getMessage(),"Erro de inserir cadastro no prospect");
    }
?>
