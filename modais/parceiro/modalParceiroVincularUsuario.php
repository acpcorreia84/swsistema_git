<?php
try {
    $cUsuario = new Criteria();
    $cUsuario->add(UsuarioPeer::SITUACAO, 0);
    $cUsuario->add(UsuarioPeer::SETOR_ID, 5);
    $cUsuario->addOr(UsuarioPeer::SETOR_ID, 6);
    $cUsuario->addOr(UsuarioPeer::SETOR_ID, 8);

    $cUsuario->addAscendingOrderByColumn(UsuarioPeer::NOME);
    $usuarios = UsuarioPeer::doSelect($cUsuario);
}catch(Exception $e){
    erroEmail($e->getMessage(),"Erro na consulta de usuario");
    js_aviso("Opa! Desculpa mais não conseguir consultar os usuarios para vocês");
}


?>
<div id="relacionarUsuarioParceiro" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-2x fa-user-plus"></i> Relacionar Usu&aacute;rio Parceiro </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#relacionarUsuarioParceiro"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="frmVincularUsuario">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Usu&aacute;rio: </h4>
                        </div>
                        <div class="col-lg-7">
                            <select name="rpEdtUsuario" id="rpEdtUsuario" class="selectpicker form-control campoValidar" data-show-subtext="true" data-live-search="true">
                                <option data-tokens="" value="">Escolha Usu&aacute;rio a ser relacionado </option>

                                <? foreach($usuarios as $usuario) {?>
                                    <?
                                    $localUsuario = $usuario->getLocalId();
                                    if($localUsuario!=null && $localUsuario!='0'){
                                        $localUsuario = $usuario->getLocal()->getNome();
                                    }else{
                                        $localUsuario= 'SEM LOCAL';
                                    }
                                    ?>
                                    <option data-tokens="<?=utf8_encode($usuario->getNome());?>" value="<?=$usuario->getId();?>"><?=str_pad($usuario->getId(), 4, 0, STR_PAD_LEFT);?> | <?=utf8_encode($usuario->getNome())." - ".utf8_encode($usuario->getSetor()->getNome())." de ".utf8_encode($localUsuario);?></option>
                                <? }?>
                            </select>
                        </div>
                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Tipo de usu&aacute;rio: </h4>
                        </div>
                        <div class="col-lg-7">
                            <?php
                            $tiposUsuarioParceiro = ParceiroUsuarioTipoPeer::doSelect(new Criteria());
                            ?>
                            <select name="rpEdtTipo" id="rpEdtTipo" class="selectpicker form-control campoValidar" data-show-subtext="true" data-live-search="true">
                                <option data-tokens="" value="">Escolha tipo do Usu&aacute;rio </option>
                                <? foreach($tiposUsuarioParceiro as $tipo) {?>
                                    <option data-tokens="<?=$tipo->getNome();?>" value="<?=$tipo->getId();?>"><?=str_pad($tipo->getId(), 4, 0, STR_PAD_LEFT);?> | <?=$tipo->getNome();?></option>
                                <? }?>
                            </select>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnVincularUsuario">Vincular</button>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->
<!-- MODAL DO SISTEMA DE PARCEIRO -->
<script>
    $( document ).ready( function () {

        $("#frmVincularUsuario").validate({
            rules: {
                rpEdtTipo: {
                    required: true,
                },
                rpEdtUsuario: {
                    required: true,
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".campoValidar").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".campoValidar").addClass("has-success").removeClass("has-error");
            }
        });

        $("#btnVincularUsuario").click(function () {
            if ($("#frmVincularUsuario").valid()) {
                vincular_usuario_parceiro();
            }
        })

    });
</script>