<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
$usuario = UsuarioPeer::RetrieveByPk($usuarioLogado->getId());
?>
<? include 'header.php';?>
<body>
    <div id="wrapper">
         <? include('inc/menu.php');?>
         <div id="page-wrapper">
                <div class="row space-padrao">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4></h4>
                                    </div>

                                    <div class="panel-body">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="edtNome">Nome:</label>
                                                        <input type="text" class="form-control" name="edtNome" id="edtNome" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" value="<?=$usuario->getNome();?>" />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="edtCpf">CPF:</label>
                                                        <input type="text" class="form-control" name="edtCpf" id="edtCpf" onblur="campoObrigatorio(this) ; liberaBtn(this,'btnEditar')" value="<?=$usuario->getCpf();?>" />
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="edtCep">CEP:</label>
                                                        <input type="text" class="form-control" name="edtCep" id="edtCep" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" onkeypress="formatar(this,'cep')" value="<?=$usuario->getcep();?>" />
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="edtEndereco">Endere&ccedil;o:</label>
                                                        <input type="text" class="form-control" name="edtEndereco" id="edtEndereco" onblur="liberaBtn(this,'btnEditar');campoObrigatorio(this)" value="<?=$usuario->getEndereco();?>" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="edtComplemento">Complemento:</label>
                                                        <input type="text" class="form-control" name="edtComplemento" id="edtComplemento" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="edtNumero">N&uacute;mero:</label>
                                                        <input type="text" class="form-control" name="edtNumero" id="edtNumero" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" value="<?=$usuario->getNumero();?>" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="edtBairro">Bairro:</label>
                                                        <input type="text" class="form-control" name="edtBairro" id="edtBairro" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" value="<?=$usuario->getBairro();?>" />
                                                    </div>

                                                     <div class="col-lg-3">
                                                        <label for="edtCidade">Cidade:</label>
                                                        <input type="text" class="form-control" name="edtCidade" id="edtCidade" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" value="<?=$usuario->getCidade();?>" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="edtUf">UF:</label>
                                                        <input type="text" class="form-control" name="edtUf" id="edtUf" onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')" value="<?=$usuario->getUf();?>" />
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label >E-mail:</label><br/>
                                                        <span class="text-danger" ><?=$usuario->getEmail();?></span>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label>URL:</label><br/>
                                                        <a href="http://parceiro.serama.com.br/<?=$usuario->getUrl();?>">http://parceiro.serama.com.br/<?=$usuario->getUrl();?></a>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="edtDataCadastro">Data Cadastro:</label><br/>
                                                        <span class="text-danger"><?=$usuario->getDataCadastro("d/m/Y");?></span>
                                                        <input type="hidden" class="form-control" name="edtDataCadastro" id="edtDataCadastro" value="<?=$usuario->getDataCadastro("d/m/Y");?>" />
                                                    </div>


                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="edtFone">Telefone:</label>
                                                        <input type="text" class="form-control" name="edtFone" id="edtFone" onblur="campoObrigatorio(this);formatar(this,'telefone'); liberaBtn(this,'btnEditar')" value="<?=$usuario->getFone();?>" />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="edtFone2">Telefone 2:</label>
                                                        <input type="text" class="form-control" name="edtFone2" id="edtFone2" value="<?=$usuario->getFone();?>" />
                                                    </div>

                                                    <div class="col-lg-4">
                                                            <label for="edtDataNascimento">Data Nascimento:</label>
                                                            <input type="date" class="form-control" name="edtDataNascimento" id="edtDataNascimento" value="<?=$usuario->getNascimento('Y-m-d');?>"  onblur="campoObrigatorio(this); liberaBtn(this,'btnEditar')"/>
                                                    </div>
                                                </div>
                                                    <hr>

                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <br/><button class="btn btn-success oculto" id="btnEditar" onclick="editarUsuario(<?=$usuario->getId()?>)">Editar Perfil</button>
                                                    </div>
                                                </div>

                                            </form>
                                    </div>
                            </div>
                        </div>
                </div>
         </div>
    </div>
    <? include 'inc/script.php'?>
</body>
</html>