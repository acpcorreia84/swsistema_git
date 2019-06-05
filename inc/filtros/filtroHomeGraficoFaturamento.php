<!-- FILTRO PAGE -->
	<div class="col-lg-10">
    	<form role="form" name="form" action="" method="post" >
        	<table class="table-responsive" border="2">
            	<tbody>
                        	<tr>
                                <? if(!$_POST) {?>
                                    <td class="col-lg-3">
                                        <select class="form-control" name="filtro" id="filtro" onclick="efeito_filtro(this, 'select');">
                                            <option value="" selected="selected">Selecione um Filtro</option>
                                            <option value="Local">Escolha a Localidade</option>
                                            <option value="Vendedor">Escolhar o Vendedor</option>
                                            <option value="Parceiro">Escolha o Parceiro</option>
                                        </select>
                                    </td>
                                <? }?>
                                <td class="col-lg-3 oculto" id="divSpanWhereBD">
                                    <span class="form-control " id="whereBD"></span>
                                    <input type="hidden" name="edtWhereBD" id="edtWhereBD"/>
                                </td>

                                <td>
                                     <div class="input-group datetimeInput oculto" id="datetimepicker12">
                                            <input type="text" onKeyPress="formatarCpfCnpj(this , 'data')" maxlength="10" class="form-control" name="<? echo$_POST['filtro'].'_de';?>" id="<? echo $_POST['filtro'].'_de';?>" value="<?=$_POST[$nameFiltroDe];?>" placeholder="De" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                    </div>
                                </td>

                                <td >
                                     <div class="input-group  datetimeInput oculto" id="datetimepicker13">
                                            <input type="text" onKeyPress="formatarCpfCnpj(this , 'data')" maxlength="10" class="form-control" name="<? echo$_POST['filtro'].'_ate';?>" id="<? echo $_POST['filtro'].'_ate';?>" value="<?=$_POST[$nameFiltroDe];?>" placeholder="At&eacute;" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                    </div>
                                </td>

                                <td class="col-lg-3" id="camposDeFiltro"></td>

                                <td >
                                    <select name="edVendedor" id="edVendedor" class="col-lg-3 oculto">
                                        <option value="" selected>Selecione o vendedor</option>
                                        <? foreach ($vendedores as $vendedor) { ?>
                                            <option value="<?=$vendedor->getId()?>" <? if ($_GET['edVendedor'] == $vendedor->getId()) echo 'selected="selected"'?>>
                                                <?=$vendedor->getNome()?>
                                            </option>
                                        <? }?>
                                    </select>

                                    <select name="edParceiro" id="edParceiro" class="col-lg-3 oculto">
                                        <option value="" selected>Selecione o Parceiro</option>
                                        <? foreach ($parceiros as $parceiro) { ?>
                                            <option value="<?=$parceiro->getId()?>" <? if ($_GET['edVendedor'] == $parceiro->getId()) echo 'selected="selected"'?>>
                                                <?=$parceiro->getNome()?>
                                            </option>
                                        <? }?>
                                    </select>

                                    <select name="edLocal" id="edLocal" class="col-lg-3 oculto">
                                        <option value="" selected>Selecione a Localidade</option>
                                        <? foreach ($locais as $local) { ?>
                                            <option value="<?=$local->getId()?>" <? if ($_GET['edVendedor'] == $local->getId()) echo 'selected="selected"'?>>
                                                <?=$local->getNome()?>
                                            </option>
                                        <? }?>
                                    </select>


                                </td>

                                <td>
                                    <input type="submit" name="edtConsulta" id="edtConsulta" class="btn btn-primary oculto" value="Consultar">
                                </td>

                                <? if($_POST) {?>
                                    <td>
                                        <a href="telaCertificado.php" name="edtLimparConsulta" id="edtLimparConsulta" class="btn btn-danger"><i class="fa fa-erase"></i> Limpar Consulta</a>
                                    </td>
                                <? }?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

<!-- FIM FILTRO PAGE -->