<!-- INSEIRIR REAGENDAMENTO MODAL -->
<div class="modal fade" role="dialog" id="espera">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-calendar fa-lg"></i> Colocar Contato em Espera:</h3>
            </div>
            <!-- CHAMADA DO CALANEDARIO PELO SCRIPT -->
            <div class="modal-body">
                <div clas="form-group">
                    Data:
                    <div class="date" >
                        <input type="text" class="timepicker form-control" name="edtDataAgendamentoEspera" id="datetimepicker14" onblur="campoObrigatorio(this);"/>
                    </div>

                    <div>
                        <br/>
                        Motivo da Espera:
                        <textarea rows="10" class="form-control" name="edtMotivoAgendamentoEspera" id="edtMotivoAgendamentoEspera" onkeyUp="UpperCase(this);" onblur="campoObrigatorio(this);liberaBtn(this,'btnSalvaAgendar');"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success oculto" data-dismiss="modal" id="btnSalvaAgendar"  onClick="liberaBtn(this,'btnSalvarReagendar');espera_contato();"><i class="fa fa-check fa-lg"></i> Em Espera</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>