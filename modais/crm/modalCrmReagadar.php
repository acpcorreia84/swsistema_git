<!-- INSEIRIR REAGENDAMENTO MODAL -->
<div class="modal fade" role="dialog" id="reagendamento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-calendar fa-lg"></i> Agendamento de Contato</h3>
            </div>
            <!-- CHAMADA DO CALANEDARIO PELO SCRIPT -->
            <div class="modal-body">
                Data:<input type="text" class="datetimepicker form-control" name="edtDataAgendamento" id="datetimepicker13" onblur="campoObrigatorio(this);"/>
                <div>
                    <br/>
                    Motivo do Reagendamento:
                    <textarea cols="5" row="15" class="form-control" name="edtMotivoAgendamento" id="edtMotivoAgendamento" onkeyUp="UpperCase(this);" onmousemove="liberaBtn(this,'btnSalvarReagendar');" onkeypress="liberaBtn(this,'btnSalvarReagendar');" onblur="liberaBtn(this,'btnSalvarReagendar');campoObrigatorio(this);"></textarea>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-success oculto" data-dismiss="modal" id="btnSalvarReagendar" onClick="liberaBtn(this,'btnSalvarReagendar');angendar_contato();bancoLocal_add('reagendamento');"><i class="fa fa-check fa-lg"></i> Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>