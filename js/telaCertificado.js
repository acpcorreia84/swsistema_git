var msnPadrao = 'entre em contato com o administrador do sistema';

// var urlPadrao = 'funcoes/certificado/';
var pageUrl = 'funcoes/funcoesCertificado.php';

function liberaBtn(src1 , src2){
	if(src1.value != "" && src1.value != null){
		$("#"+src2).css('visibility','visible');
		$("#"+src2).css('display','inline');
	}else{
		$("#"+src2).css('visibility','hidden');
		$("#"+src2).css('display','none');
	}
}
function confirma_formulario() {
	if(document.getElementById('confirma').checked == true){
		$('#botao').attr('disabled', false);
	}else{
		$('#botao').attr('disabled', true);
	}
};

function inserir_observacao(funcao,usuario_id){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-comment"></i> Inserindo a Observa&ccedil;&atilde;o');
    $("#modalCarregando").modal('show');

    var dadosajax = {
		'certificado_id' : $('#ioCodCertificado').val(),
		'usuario_id' : usuario_id,
		'funcao' : funcao,
		'comentario' : $('#edtObservacao').val()
	}
/*
		console.log("Comentario: "+ dadosajax['comentario']);
		console.log("Usuario: "+usuario_id);
*/

		$.ajax ({
			url : pageUrl,
			data : dadosajax,
			type : 'POST',
			cache : true,

			error : function (){
				alert (acentuarMsn('Error TC.JS/95 - Erro na a??o de inserir observacao,' + msnPadrao + '.'));
                $("#modalCarregando").modal('hide');
			},
			success : function(result){
				if (result == 0) {
                    carregarModalDetalharCertificado($('#idCertificado').val());
					alertSucesso('Observacao Inserida com Sucesso!');
					$('#inserirObservacao').modal('hide');
					$('#edtObservacao').val("");
				}else{
				    erroEmail(result,acentuarMsn('Erro na fun??o javascritpt na iser??o de observa??o'));
					alert('Error TC.JS/102 - Erro ao inserir a sua Observacao,' + msnPadrao + '.');
					console.log(result);
				}
			}
		});

};

function selecionarFormaPagamento(formaEscolhida) {
    /*SELECIONA A FORMA DE PAGAMENTO DO CERTIFICADO NA TELA DE TROCA DE PRODUTO*/
    $("input[name=edtPagamentoTrocar]").val([formaEscolhida]);
}

function trocarProdutoCertificado(){
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Alterando o produto do cliente');
    $("#modalCarregando").modal('show');

    /*console.log("Escolheu: " + formaPagamento);*/

    var dadosajax = {
        'certificado_id' : $('#idCertificado').val(),
        'funcao' : 'trocar_produto_certificado',
        'produto_id' : $("#edtSelectProdutoTrocar").val(),
        'formaPagamentoId' :  $("input[name='edtPagamentoTrocar']:checked").val(),
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error TC.JS/152 - Erro na a??o de Trocar o Produto,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            resultado = result.split(';');

            if (resultado[0].trim() == 'tudoOk') {
                alertSucesso("Forma de pagamento alterada com Sucesso!");
                carregarModalDetalharCertificado($('#idCertificado').val());
                $('#modalTrocarProdutoCerticado').modal('hide');
            }else {
                alertErro("Opa, Algo Deu Errado, Erro:"+resultado[0]+" entre em contato com sistema@swsistema.com.br");
                erroEmail(result,acentuarMsn("Erro na fun??o de trocar o produto, erro:" + result));
                $("#modalCarregando").modal('hide');
            }

        }
    });
};
function visualizar_protocolo(certificado_id,funcao){
	var dadosajax = {
			'certificado_id' : certificado_id,
			'funcao' : funcao
		};

		$.ajax ({
			url : pageUrl,
			data : dadosajax,
			type : 'POST',
			cache : true,
			error : function (){
				alert ('Error TC.JS/165 - Erro na a??o visualizar protocolo,' + msnPadrao + '.');
			},
			success : function(result){
                var certificado = result.split(';');
                /*console.log(certificado);*/
				if (certificado[11] == 0) {
					if (certificado[4] == 'J') {
						document.getElementById("dadosEmpresariais").style.display='block';
						document.getElementById('vpSpanNomeEmpresa').innerHTML=certificado[2];
						document.getElementById('vpSpanCnpj').innerHTML=certificado[5];
						document.getElementById('vpSpanFoneEmpresa').innerHTML=certificado[10]
						document.getElementById('vpSpanEnderecoEmpresa').innerHTML=certificado[7];

					}else{
						document.getElementById("dadosEmpresariais").style.display='none';
					}

					document.getElementById('vpSpanNomeResponsavel').innerHTML=certificado[17];
					document.getElementById('vpSpanCpf').innerHTML=certificado[18];
					document.getElementById('vpSpanFoneResponsavel').innerHTML=certificado[23];
					document.getElementById('vpSpanEnderecoResponsavel').innerHTML=certificado[24];
					document.getElementById('vpSpanEmail').innerHTML=certificado[16];
					document.getElementById('vpSpanVendedor').innerHTML=certificado[35];
					document.getElementById('vpSpanNomeProduto').innerHTML=certificado[36];
					document.getElementById('vpSpanFormaPagto').innerHTML=certificado[37];
					document.getElementById('vpSpanPagamento').innerHTML=certificado[38];
					document.getElementById('vpSpanNumBol').innerHTML=certificado[39];
					document.getElementById('vpSpanProtocolo').innerHTML=certificado[40];
					document.getElementById('vpSpanLocal').innerHTML=certificado[41];
					document.getElementById('vpSpanAgendamento').innerHTML=certificado[42];
					document.getElementById('vpSpanDtPagamento').innerHTML=certificado[43];
					document.getElementById('vpSpanSituacao').innerHTML=certificado[44];
					document.getElementById('vpSpanNascResponsavel').innerHTML=certificado[19];
 				}else{
 				    console.log(result);
 				    //erroEmail(result,"Erro no javascritp da tela certificado");
                    //ir_para('telaCertificado.php');
					alert(acentuarMsn('Error TC.JS/203 - Erro na visualiza??o de protocolo,' + msnPadrao + '.'));
				}
			}
		});
};

function inserirDescontoCertificado(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-tag"> </i> Salvando desconto');
    $('#modalCarregando').modal('show');

    var dadosajax = {
		'certificado_id' : $('#idCertificado').val(),
		'funcao' : 'inserir_desconto_certificado',
		'valor' : $('#mdEdtValor').val(),
        'voucher' : $('#mdEdtVoucher').val(),
        'protocolo' : $('#mdEdtProtocolo').val(),
		'motivo' :  $('#mdEdtMotivoDesconto').val(),
	}
	$.ajax({
		url: pageUrl,
		data : dadosajax,
		type : 'POST',
		cache : true,
		error : function(){
			alertErro('Error TC.JS/362 - Erro na a??o de inserir desconto,' + msnPadrao + '.');
		},
		success : function(result){
			console.log('iniciou desconto...');
			if (result == 0){
				alertSucesso('Desconto inserido com Sucesso!');
                $('#modalDesconto').modal('hide');
                carregarModalDetalharCertificado($('#idCertificado').val());
			}
			else if (result==1){
				document.getElementById('mdEdtValor').value='';
				$('#modalCarregando').modal('hide');
                alertErro('Voc? n?o pode dar um valor maior que 10%')
			}
			else {
                alertErro('Error TC.JS/368 - Erro ao dar desconto,' + msnPadrao + '.');
                $('#modalCarregando').modal('hide');
				console.log(result);
			}
		}
	});
};
function revogar_certificado(motivo){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-ban"> </i> Revogando certificado');
    $('#modalCarregando').modal('show');

    if ($('#edtMotivoRevogacao').val())
        alertErro('&Eacute; necess&aacute;rio informar o motivo da revoga&ccedil;&atilde;o antes de revogar o certificado!');

    var dadosajax = {

		'certificado_id' :  $('#idCertificado').val(),
		'funcao' : 'revogar_certificado',
		'motivo' :  motivo,
	}
		$.ajax({
			url: pageUrl,
			data : dadosajax,
			type : 'POST',
			cache : true,
			error : function(){
				alertErro('Error TC.JS/433 - Erro na a??o de revogar certificado,' + msnPadrao + '.');
                $('#modalCarregando').modal('hide');
			},
			success : function(result){
				if (result){
					alertSucesso('Certificado Revogado com Sucesso!');
                    carregarModalDetalharCertificado($('#idCertificado').val());
				}else{
                    $('#modalCarregando').modal('hide');
					alertErro('Error TC.JS/441 - Erro ao revogar certificado,' + msnPadrao + '.');
					console.log(result);
				}
			}
		});

};
function editar_certificado(certificado_id,funcao,usuario_id){
	if(funcao =="editar_certificado"){
		var dadosajax = {
			'certificado_id' : certificado_id,
			'funcao' : funcao
		};
	}else{
		var checado = ' ';
		var radios = document.getElementsByName("ecEdtPagamento");
		for (var i = 0; i < radios.length; i++) {
    		if (radios[i].checked) {
    			checado =  radios[i].value;
        		/*console.log("Escolheu: " + radios[i].value);*/
	        }
	    }
		var dadosajax = {
			'certificado_id' : $('#ecInputIdCertificado').val(),
			'funcao' : funcao,
			'local' : $('#ecEdtLocal').val(),
			'produto' :  $('#ecEdtProduto').val(),
			'pagamento' : checado,
			'vendedor' :  $('#ecEdtVendedor').val(),
			'usuario_id' : usuario_id
			};
		}

		$.ajax ({
			url : pageUrl,
			data : dadosajax,
			type : 'POST',
			cache : true,
			error : function (){
				alert (acentuarMsn('Error TC.JS/424 - Erro na a??o editar certificado,' + msnPadrao + '.'));
			},
			success : function(result){
				if (result) {
					if (funcao == "editar_certificado") {
						var certificado = result.split(';');
						var elemento = document.getElementsByName('ecEdtPagamento');
				        for(i=0;i<elemento.length;i++){
				        	var e = elemento[i];
				        	if(e.value == certificado[9]) {
				          		e.checked = true;
				          	}
				        }
				        var optionProduto = certificado[7];
				       	var c = document.getElementById("ecEdtProduto").options;
						for (i=0; i<c.length; i++){
							if (c[i].value == optionProduto){
								c[i].selected = true;
							}
						}
						var optionLocal = certificado[6];
				       	var c = document.getElementById("ecEdtLocal").options;
						for (i=0; i<c.length; i++){
							if (c[i].value == optionLocal){
								c[i].selected = true;
							}
						}
						var optionVendedor = certificado[10];

				       	var c = document.getElementById("ecEdtVendedor").options;
						for (i=0; i<c.length; i++){
							if (c[i].value == optionVendedor){
								c[i].selected = true;
							}
						}

						document.getElementById('ecInputIdCertificado').value = certificado[0];
						document.getElementById('ecSpanNomeCliente').innerHTML=certificado[1];
						document.getElementById('ecSpanEmail').innerHTML=certificado[2];
						document.getElementById('ecSpanTelefone').innerHTML=certificado[3];
						document.getElementById('ecSpanEndereco').innerHTML=certificado[4];
						document.getElementById('ecSpanBairro').innerHTML=certificado[5];
						document.getElementById('ecSpanValor').innerHTML=certificado[8];
					}else{
						alertSucesso('Certificado alterado com sucesso!');
					}
				}else{
                    $("#editarCliente").modal('hide');
				    erroEmail(result, 'Erro no javascritp na fun??o editar certificado');
					alert('Error TC.JS/444 - Erro ao editar certificado,' + msnPadrao + '.');
				}
			}
		});
};
function editar_cliente_certificado(funcao){
    if(funcao =="editar_cliente"){
        $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Carregando a tela de editar Cliente');
        $("#modalCarregando").modal('show');
		var dadosajax = {
			'certificado_id' : $('#idCertificado').val(),
			'funcao' : funcao
		}
	}else{
        $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Alterando informa&ccedil;&otilde;es do Cliente');
        $("#modalCarregando").modal('show');
		var dadosajax = {
			'certificado_id' : $('#idCertificado').val(),
			'funcao' : funcao,
			'tipo_cliente':$('#clEdtPessoaTipo').val(),
			'razao' : $('#clEdtRazaoSocial').val(),
			'nome_fantasia' :  $('#clEdtNomeFantasia').val(),
			'cnpj' : $('#clEdtCnpj').val(),
			'cep_empresa' :  $('#clEdtCepEmpresa').val(),
			'endereco_empresa' : $('#clEdtEnderecoEmpresa').val(),
			'bairro_empresa' :  $('#clEdtBairroEmpresa').val(),
			'num_empresa' : $('#clEdtNumeroEmpresa').val(),
			'uf_empresa' : $('#clEdtUfEmpresa').val(),
			'complemento_empresa' :  $('#clEdtComplementoEmpresa').val(),
			'cidade_empresa' : $('#clEdtCidadeEmpresa').val(),
			'fone1_empresa' :  $('#clEdtFone1Empresa').val(),
			'fone2_empresa' : $('#clEdtFone2Empresa').val(),
			'celular_empresa' :  $('#clEdtCelularEmpresa').val(),
			'email_empresa' :  $('#clEdtEmailEmpresa').val(),
			'cpf_responsavel' :  $('#clEdtCpfResponsavel').val(),
			'nascimento_responsavel' : $('#clEdtNascimentoResponsavel').val(),
			'nome_responsavel' :  $('#clEdtNomeResponsavel').val(),
			'cep_responsavel' : $('#clEdtCepResponsavel').val(),
			'endereco_responsavel' :  $('#clEdtEnderecoResponsavel').val(),
			'numero_responsavel' :  $('#clEdtNumeroResponsavel').val(),
			'uf_responsavel' :  $('#clEdtUfResponsavel').val(),
			'completamento_responsavel' :  $('#clEdtCompletamentoResponsavel').val(),
			'bairro_responsavel' : $('#clEdtBairroResponsavel').val(),
			'cidade_responsavel' :  $('#clEdtCidadeResponsavel').val(),
			'fone1_responsavel' : $('#clEdtFone1Responsavel').val(),
			'fone2_responsavel' :  $('#clEdtFone2Responsavel').val(),
			'celular_responsavel' :  $('#clEdtCelularResponsavel').val(),
			'email_responsavel' :  $('#clEdtEmailResponsavel').val(),
			};
		}
		$.ajax ({
			url : pageUrl,
			data : dadosajax,
			type : 'POST',
			cache : true,
			error : function (){
                $("#modalCarregando").modal('hide');
                alertErro (acentuarMsn('Error TC.JS/591 - Erro na a??o editar cliente,' + msnPadrao + '.'));
			},
			success : function(result){
				console.log(result);
				var resultado = JSON.parse(result);
                var certificado = resultado.dados.split(';');
                console.log(certificado);

				if ( resultado.mensagem=='Ok') {

					var elemento = document.getElementsByName('clEdtUfEmpresa');
					var optionUf = certificado[10];
					var c = document.getElementById("clEdtUfEmpresa").options;
					for (i=0; i<c.length; i++){
						if (c[i].value == optionUf){
							c[i].selected = true;
						}
					}
					if (funcao == "editar_cliente") {
                        $("#modalCarregando").modal('hide');
						if(certificado[3] == 'J'){
                            $("#pessoaJuridica").css('visibility','visible');
                            $('#pessoaJuridica').css('display','block');
							document.getElementById('clEdtRazaoSocial').value=certificado[1];
							document.getElementById('clEdtNomeFantasia').value=certificado[2];
							document.getElementById('clEdtCnpj').value=certificado[4];
							document.getElementById('clEdtCepEmpresa').value=certificado[5];
							document.getElementById('clEdtEnderecoEmpresa').value=certificado[6];
							document.getElementById('clEdtBairroEmpresa').value=certificado[7];
							document.getElementById('clEdtNumeroEmpresa').value=certificado[8];
							document.getElementById('clEdtUfEmpresa').value=certificado[9];
							document.getElementById('clEdtComplementoEmpresa').value=certificado[10];
							document.getElementById('clEdtCidadeEmpresa').value=certificado[11];
							document.getElementById('clEdtFone1Empresa').value=certificado[12];
							document.getElementById('clEdtFone2Empresa').value=certificado[13];
							document.getElementById('clEdtCelularEmpresa').value=certificado[14];
							document.getElementById('clEdtEmailEmpresa').value=certificado[15];
                            console.log('editou cliente pj');
						} else {
                            $('#pessoaJuridica').css('display','none');
                            $("#pessoaJuridica").css('visibility','hidden');
                            console.log('editou cliente pf');
						}
                        document.getElementById('clEdtPessoaTipo').value=certificado[3];
                        document.getElementById('clEdtNomeResponsavel').value=certificado[16];
                        document.getElementById('clEdtCpfResponsavel').value=certificado[17];
                        document.getElementById('clEdtNascimentoResponsavel').value=certificado[18];
                        document.getElementById('clEdtFone1Responsavel').value=certificado[19];
                        document.getElementById('clEdtFone2Responsavel').value=certificado[20];
                        document.getElementById('clEdtCelularResponsavel').value=certificado[21];
                        document.getElementById('clEdtEnderecoResponsavel').value=certificado[23];
                        document.getElementById('clEdtBairroResponsavel').value=certificado[24];
                        document.getElementById('clEdtNumeroResponsavel').value=certificado[25];
                        document.getElementById('clEdtCepResponsavel').value=certificado[26];
                        document.getElementById('clEdtCompletamentoResponsavel').value=certificado[27];
                        document.getElementById('clEdtUfResponsavel').value=certificado[28];
                        document.getElementById('clEdtCidadeResponsavel').value=certificado[29];
                        document.getElementById('clEdtEmailResponsavel').value=certificado[30];

					}else{
                        alertSucesso('Certificado alterado com sucesso!');
                        carregarModalDetalharCertificado($('#idCertificado').val());
					}
				}else{
                    $("#modalCarregando").modal('hide');

                    erroEmail(result,acentuarMsn('Erro no javascritpt na fun??o editar cliente'));
					alertErro('Error TC.JS/636 - Erro ao editar cliente,' + msnPadrao + '.');
					console.log(result);
				}
			}
		});
};

function gerarProtocoloCertificado() {

    $("#esperaGerarProtocolo").modal('show');

	var dadosajax = {
		'funcao' : 'gerarProtocolo',
		'certificado_id' : $('#idCertificado').val()
	};
	//console.log (dadosajax);
	$.ajax ({
		url : pageUrl,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
			alertErro ('Error TC.JS/725 - Erro na a??o de Gerar Protocolo,' + msnPadrao + '.');
		},
		success : function(result){
			var certificado = result.split(';');
            console.log('teste: '+certificado);

			if ( (certificado[1] == 0)) {
				document.getElementById('gpDivGeral').innerHTML = '<div class="modal-header bg-success"><div class ="col-lg-12"><h4><i class="fa fa-lg fa-check"></i> Protocolo Gerado</h4></div></div><div class="modal-body "><div class="row"><div class="col-lg-12"><p>N&uacute;mero do protocolo: <span id="gpSpanProtocolo">'+certificado[0]+'</span></p></div></div><!--DIV CLASS row--></div><div class="modal-footer"></div>';
                carregarModalDetalharCertificado(dadosajax['certificado_id']);
                $("#esperaGerarProtocolo").modal('hide');
			}else if (certificado[1]==1){
				//document.getElementById('gpDivGeral').innerHTML ='<div class="modal-header" style="background-color: #cc0000"><div class ="col-lg-12"><h4 style="color: white"><i class="fa fa-lg fa-check"></i> Erro ao Gerar Protocolo</h4></div></div><div class="modal-body "><div class="row"><div class="col-lg-12"><p>Ocorreu um erro ao Gerar protocolo. ' + msnPadrao + '</p></div></div><!--DIV CLASS row--></div><div class="modal-footer"></div>';
                $("#esperaGerarProtocolo").modal('hide');
			}
			else{
				erroEmail(result, "Erro no javascript de gerar Protocolo");
                alertErro(result);
                $("#esperaGerarProtocolo").modal('hide');
				console.log(result);
			}
		}
	});
};


function verificaTipoCliente(campo){
	var tipoCliente = campo.value;
	$("#divPrimeiraEtapa").css('visibility','visible');
	$('#divPrimeiraEtapa').css('display','block');

	if(tipoCliente == 'pf'){
		$("#divEdtCpf").css('visibility','visible');
		$('#divEdtCpf').css('display','inline-block');
		$("#divEdtDataNascimento").css('visibility','visible');
		$('#divEdtDataNascimento').css('display','inline-block');
		$("#divEdtCnpj").css('visibility','hidden');
		$('#divEdtCnpj').css('display','none');
        $('#edtCpfVendaInterna').focus();
	}else if(tipoCliente == 'pj'){
		$("#divEdtCpf").css('visibility','hidden');
		$("#divEdtDataNascimento").css('visibility','hidden');
		$('#divEdtCpf').css('display','none');
		$('#divEdtDataNascimento').css('display','none');
		$("#divEdtCnpj").css('visibility','visible');
		$('#divEdtCnpj').css('display','inline-block');
        $('#edtCnpjVendaInterna').focus();
	}
};
/* CONSULTA CEP DOS CORREIORS */
function limpa_formulario_cep(campoEndereco, campoCidade, campoBairro, campoUf, campoComplemento) {
    //Limpa valores do formul?rio de cep.
    document.getElementById(campoEndereco).value="";
    document.getElementById(campoBairro).value="";
    document.getElementById(campoCidade).value="";
    document.getElementById(campoComplemento).value="";
    document.getElementById(campoUf).value="";
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('edtEnderecoVendaInternaPj').value=(conteudo.logradouro).toUpperCase();
        document.getElementById('edtBairroPjVendaInterna').value=(conteudo.bairro).toUpperCase();
        //document.getElementById('edtComplementoVendaInterna').value=(conteudo.complemento).toUpperCase();
        document.getElementById('edtCidadePjVendaInterna').value=(conteudo.localidade).toUpperCase();
        document.getElementById('edtUfVendaInterna').value=(conteudo.uf).toUpperCase();
        document.getElementById('edtNumeroVendaInterna').focus();
    } //end if.
    else {
        //CEP n?o Encontrado.
        limpa_formulario_cep('edtEnderecoVendaInternaPj','edtCidadePjVendaInterna', 'edtBairroPjVendaInterna', 'edtUfVendaInterna', 'edtComplementoVendaInterna');
        alert("CEP nao encontrado.");
    }
}
function meu_callback_pf(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('edtEnderecoRepresentanteVendaInterna').value=(conteudo.logradouro).toUpperCase();
        document.getElementById('edtBairroRepresentanteVendaInterna').value=(conteudo.bairro).toUpperCase();
        document.getElementById('edtComplementoRepresentanteVendaInterna').value=(conteudo.complemento).toUpperCase();
        document.getElementById('edtCidadeRepresentanteVendaInterna').value=(conteudo.localidade).toUpperCase();
        document.getElementById('edtUfRepresentanteVendaInterna').value=(conteudo.uf).toUpperCase();
        document.getElementById('edtNumeroRepresentanteVendaInterna').focus();
    } //end if.
    else {
        //CEP n?o Encontrado.
        limpa_formulario_cep('edtEnderecoRepresentanteVendaInterna','edtCidadeRepresentanteVendaInterna', 'edtBairroRepresentanteVendaInterna', 'edtUfRepresentanteVendaInterna', 'edtComplementoRepresentanteVendaInterna');
        alert("CEP nao encontrado.");
    }
}

function pesquisa_cep_cliente(valor, campoEndereco, campoCidade, campoBairro, campoUf, campoComplemento, pessoa_tipo) {
    //Nova vari?vel "cep" somente com d?gitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Express?o regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById(campoEndereco).value="Carregando...";
            document.getElementById(campoBairro).value="Carregando...";
            document.getElementById(campoCidade).value="Carregando...";
            //document.getElementById(campoComplemento).value="Carregando...";
            document.getElementById(campoUf).value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            if (pessoa_tipo=='J')
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
            else if (pessoa_tipo=='F')
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback_pf';

            //Insere script no documento e carrega o conte?do.
            document.body.appendChild(script);


        } //end if.
        else {
            //cep ? inv?lido.
            limpa_formulario_cep(campoEndereco, campoCidade, campoBairro, campoUf, campoComplemento);
            alert("Formato de CEP inv&aacute;lido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formul?rio.
        limpa_formulario_cep(campoEndereco, campoCidade, campoBairro, campoUf, campoComplemento);
    }
};

function vincula_contador() {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Vinculando contador');
    $("#modalCarregando").modal('show');

    var dadosajax = {
		'certificado_id' : $("#idCertificado").val(),
		'contador_id' : $("#edtCertificadoVincularContador").val(),
		'motivo': $('#vcEdtObservacao').val(),
		'funcao' : 'vincula_contador',
	};

	$.ajax ({
		url : pageUrl,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
            alertErro ('Error US101 - Erro na a??o de vincular contador,' + msnPadrao + '.');
		},
		success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Contador vinculado com sucesso!');
                    $('#vincularContador').modal('hide');
                    $('#tcSpanNomeContador').html(resultado.nomeContador);
                    carregarModalDetalharCertificado($('#idCertificado').val());
                }
                else {
                    erroEmail(result, "Erro no javascript de vincular contador");
                    alertErro('Error TC.JS/1111 - Erro ao vincular contador ao certificado,' + msnPadrao + '.');
                }
            } catch (e) {
                console.log(result);
                alertErro ('Error US102 - Erro ao vincular contador ao certificado,' + e + ', '+ msnPadrao + '.');
                erroEmail('Error US102 - Erro ao vincular contador ao certificado,' + e + ', '+ msnPadrao + '.');
            }

		}
	});
};

function voltarVendaInterna() {
    $('#divPrimeiraEtapa').css('visibility', 'visible');
    $('#divPrimeiraEtapa').css('display', 'block');
    $('#divEtapaConsultaCertificados').css('visibility', 'hidden');
    $('#divEtapaConsultaCertificados').css('display', 'none');

    $('#btnVoltar1').css('visibility', 'hidden');
    $('#btnVoltar1').css('display', 'none');
    $('#btnVoltar').css('visibility', 'hidden');
    $('#btnVoltar').css('display', 'none');
    $('#btnAvancar1').css('visibility', 'visible');
    $('#btnAvancar1').css('display', 'block');
    $('#btnFinalizar').css('visibility', 'hidden');
    $('#btnFinalizar').css('display', 'none');
    $('#divSegundaEtapa').css('visibility', 'hidden');
    $('#divSegundaEtapa').css('display', 'none');
}

/*TIPO DA BUSCA PODE SER ID OU CODIGO*/
function procurar_contador(cod_contador){
    var tipo_cliente = '';
    if ($("input[name='tipoPessoa']:checked").val()=='pf')
        tipo_cliente='F';
    else
        tipo_cliente='J';
    var contador_id = 0;

    if (cod_contador !== undefined)
        contador_id = cod_contador;
    else
        contador_id = $("#edtInformarCodContador").val();

    var dadosajax ={
        'cod_desconto_contador':contador_id
    }


    $.ajax ({
        url : 'ajax/php/procurar_contador.php',
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error TC.JS/725 - Erro na a??o de Procurar Contador,' + msnPadrao + '.');
        },
        success : function(result){
            if (result) {
                var contador = result.split(";");
                /*SE NAO FOI PASSADO NENHUM CONTADOR NA CONSULTA E POR QUE ESTAMOS REALIZANDO A FUNCAO DE BUSCAR O CONTADOR DE OUTRA CARTEIRA*/
                if (cod_contador === undefined) {
                    if (contador[2] == 0){

                        $("#edtNomeContador").val(contador[0]);
                        $("#edtCodigoContador").val(contador[1]);
                        $("#edtCodigoContadorPedido").val(contador[1]);
                        $("#baixaValidacao").css('visibility','visible');
                        $("#baixaValidacao").css('display','block');

                        $("#gerarRenovacao").css('visibility','visible');
                        $("#gerarRenovacao").css('display','block');
                        carregar_select_produtos(tipo_cliente, contador[3], $('#edtProdutoCertificado').val());
                    }else{
                        $("#edtNomeContador").html("");
                        $("#edtCodigoContador").val("");
                        $("#edtCodigoContadorPedido").val("");
                        //alert(acentuarMsn('Nenhum contador encontrado com o Codigo de Desconto Informado'));
                    }
                } else { /*SE NAO SIMPLESMENTE E UMA BUSCA DE CONTADOR*/
                    carregar_select_produtos(tipo_cliente, contador[3], $('#edtProdutoCertificado').val());
                }
            }
        }
    });
}
function mudancaSelect(){
	if (selectContadores.value == 'outra') {
		$('#div_outros_contadores').css({'visibility':'visible', 'display':'block'});
	} else
		$('#div_outros_contadores').css({'visibility':'hidden', 'display':'none'});
}

function carregar_select_produtos(tipo_cliente,tem_desconto, produto_selecionado, div_select, edit_select) {
    $('#mensagemLoading').html('<i class="fa fa-gift"></i> Carregando a lista de produtos');
    var divSelectContadores = '';
    var dadosAjax = '';
    var produto_id = 0;
    var contador_id = 0
    var edtSelProds = '';

    if (edit_select !== undefined)
        edtSelProds = edit_select;
    else
        edtSelProds = 'edtSelectProdutos';

    if (div_select !== undefined)
        divSelectContadores = div_select;
    else
        divSelectContadores = 'div_select_produtos';


    if (produto_selecionado !== undefined)
        produto_id = produto_selecionado;

    if (tipo_cliente === undefined)
        tipo_cliente = 0;

    if (tem_desconto == 1)
        alertSucesso('Lembrete: O contador deste cliente &eacute; contador amigo e optou por dar desconto pra seus clientes.');
    /*PEGA O CONTADOR CHECA SE ELE TEM DESCONTO E SO MOSTRA OS PRODUTOS PRO CLIENTE DELE COM DESCONTO*/
    dadosAjax ={
        'contador_id':tem_desconto,
        'tipo_cliente':tipo_cliente,
        'produto_certificado': produto_selecionado,
        'tem_desconto':tem_desconto
    };

    var x = $.ajax({
        url: 'ajax/php/carregar_select_produtos.php',
        data: dadosAjax,
        type: 'POST',
        cache: false,
        error: function(){
            alert('Erro: Ao carregar os produtos!!');
            //$("#modalCarregando").modal('hide');

        },
        success: function(result){
            var resultado = result.split(';');
            $("#modalCarregando").modal('hide');
            if(resultado[0] == 0) {
                var $select = $('<select/>', {
                    'id' : edtSelProds,
                    'class':"selectpicker",
                    'data-live-search':"true",
                });

                produtos = JSON.parse(resultado[1]);
                /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE PRODUTOS*/
                $select.append('<option data-tokens="Selecione o produto caso queira trocar" value="">Selecione o produto caso queira trocar</option>');
                /*CASO O PRODUTO TENHA SIDO DE CONTADOR AMIGO OU NAO ESTEJA NA LISTA, SIMPLESMETE ADICIONA-LO*/

                achou_produto = false;
                for (i = 0; i < produtos.length; i++) {
                    if (produtos[i].id == produto_id) {
                        $select.append('<option data-tokens="'+produtos[i].nome+'" value="' + produtos[i].id + '" selected="selected">' + produtos[i].id+ ' | ' + produtos[i].nome + ' = '+ produtos[i].preco + '</option>');
                        achou_produto = true;
                    }
                    else
                        $select.append('<option data-tokens="'+produtos[i].nome+'" value="' + produtos[i].id + '">' + produtos[i].id+ ' | ' + produtos[i].nome + ' = '+ produtos[i].preco + '</option>');
                }
                if (!achou_produto)
                    if (resultado[2])
                        $select.append('<option data-tokens="'+resultado[3]+'" value="' + resultado[2] + '" selected="selected">' + resultado[2]+ ' | ' + resultado[3] + ' = '+ resultado[4] + '</option>');

                $('#'+divSelectContadores).empty();

                $select.appendTo('#'+divSelectContadores).selectpicker('refresh');
            }else {
                //$("#modalCarregando").modal('hide');
                alert("Opa, Algo Deu Errado, entre em contato com sistema@swsistema.com.br");
                erroEmail(result,acentuarMsn("Erro na funcao de carregar os contadores. Tela: prospect.js"));
                console.log(result);
            }
        }
    });
};

function mudancaSelectContadores(selectContadores){
    if (selectContadores.value == 'outra') {
        $('#div_outros_contadores').css({'visibility':'visible', 'display':'block'});
    } else
        $('#div_outros_contadores').css({'visibility':'hidden', 'display':'none'});

    /*CRIEI UMA CONDICAO PRA QUANDO CHAMAR A FUNCAO PROCURAR CONTADOR ATUALIZAR O SELECT DE PRODUTOS*/
    /*QUANDO SELECIONAR UM CONTADOR QUE DE DESCONTO ATUALIZAR A LISTA DE PRODUTOS COM DESCONNTO*/
    if ((selectContadores.value) != '' && (selectContadores.value != 'outra'))
        procurar_contador(selectContadores.value);
}

function carregar_select_contadores(contador_selecionado, funcaoOnChange) {
    $('#mensagemLoading').html('<i class="fa fa-user-circle-o"></i> Carregando a lista de contadores');
    //$("#modalCarregando").modal('show');
    var contador_id = 0;
    if (contador_selecionado !== undefined)
        contador_id = contador_selecionado;

	funcaoSelect = 'mudancaSelectContadores(this)';
	if (funcaoOnChange !== undefined)
		funcaoSelect = funcaoOnChange;

    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    var x = $.ajax({

        //url da pagina
        url: 'ajax/php/carregar_select_contadores.php',
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //retorna o resultado da pagina para onde enviamos os dados
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Ao carregar os contadores!!');
        },
        success: function(result){
            //$("#modalCarregando").modal('hide');
            var resultado = result.split(';');

            if(resultado[0] == 0) {
                var $select = $('<select/>', {
                    'id' : 'edtSelectContador',
                    'class':"selectpicker",
                    'data-live-search':"true",
                    'onchange':funcaoSelect
                });

                contadores = JSON.parse(resultado[1]);
                /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE CONTADORES*/
                $select.append('<option data-tokens="Selecione o contador ou escolha outro" value="">Selecione o contador ou Digite o Codigo</option>');

                for (i = 0; i < contadores.length; i++) {
                    if (contador_id==contadores[i].id)
                        $select.append('<option data-tokens="'+contadores[i].nome+'" value="' + contadores[i].id + '" selected="selected">' + contadores[i].id+ ' | ' + contadores[i].nome + '</option>');
                    else
                        $select.append('<option data-tokens="'+contadores[i].nome+'" value="' + contadores[i].id + '">' + contadores[i].id+ ' | ' + contadores[i].nome + '</option>');
                }
                $select.append('<option data-tokens="Contador de outra cateira" value="outra">Contador de outra cateira</option>');

                $('#div_select_contadores').empty();
                $select.appendTo('#div_select_contadores').selectpicker('refresh');

            }else {
                //$("#modalCarregando").modal('hide');
                alert("Opa, Algo Deu Errado, entre em contato com sistema@swsistema.com.br");
                erroEmail(result,acentuarMsn("Erro na funcao de carregar os contadores. Tela: prospect.js"));
                console.log(result);
            }
        }
    });
};

function limparModalVendaInterna(){
    $('#idCertificadoDuplicado').val('');
    $('#idCertificadoRenovacao').val('');
    $("#idClienteVendaInterna").val('');

    $('#divNovoPedido').css('visibility', 'hidden');
    $('#divNovoPedido').css('display', 'none');

    $('#divMotivoDuplicidade').css('visibility', 'hidden');
    $('#divMotivoDuplicidade').css('display', 'none');

    $('#txtMotivoDuplicacao').val('');

    $('#divEtapaConsultaCertificados').css('visibility', 'hidden');
    $('#divEtapaConsultaCertificados').css('display', 'none');

    $('#btnAvancar1').css('visibility', 'hidden');
    $('#btnAvancar1').css('display', 'none');

    $('#btnVoltar1').css('visibility', 'hidden');
    $('#btnVoltar1').css('display', 'none');

    $('#divEtapaConsultaCertificados').css('visibility', 'hidden');
    $('#divEtapaConsultaCertificados').css('display', 'none');

    $('#divPrimeiraEtapa').css('visibility', 'hidden');
    $('#divPrimeiraEtapa').css('display', 'none');
    $('#divEdtCpf').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divEdtCnpj').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divFormCliente').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divPessoaJuridica').css({
        visibility:"hidden",
        display:"none"
    });

    $('#div_outros_contadores').css({
        visibility:"hidden",
        display:"none"
    });

    $('#btnFinalizar').css({
        visibility:"hidden",
        display:"none"
    });

    $('#btnVoltar').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divSegundaEtapa').css('visibility', 'hidden');
    $('#divSegundaEtapa').css('display', 'none');
    $('#btnVoltar').css('visibility', 'hidden');
    $('#btnVoltar').css('display', 'none');
    $('#btnVoltar1').css('visibility', 'hidden');
    $('#btnVoltar1').css('display', 'none');

    $('#btnFinalizar').css('visibility', 'hidden');
    $('#btnFinalizar').css('display', 'none');

    var pessoa_tipo = $('input[name="tipoPessoa"]:checked').val();
    $('#codigo_cliente_'+pessoa_tipo).html('');

    /*APAGA O TIPO DE PESSOA NAO SELECIONADO, SO HABILITA QUANDO RESETAR FORMULARIO*/
    $('input[name="tipoPessoa"]').each(function() {
        $('#'+this.value).css('visibility', 'visible');
        $('#'+this.value).css('display', 'block');
        this.checked=false;
    });

    /*APAGA TODOS OS INPUTS DA PRIMEIRA ETAPA*/
    $('#divPrimeiraEtapa input[class="form-control"]').each(function() {
        if (this.id!= "" && this.value != "") {
            this.value='';
        }
    });

    /*APAGA OS DADOS DO USUARIO*/
    localStorage.removeItem('variaveis para serem apagadas');
}

function finalizarVendaInterna(){
    var validaformulario = true;
    var formaPagamento = $('input[name=edtVnPagamento]:checked').val();
    var vencimentoBoleto = $('#edtVenVenc').val();
    var produtoVenda = $('#edtSelectProdutos').val();
    var pessoa_tipo = '';
    var codigoCliente = '';
    var codigoResponsavel = '';
    if ($('input[name="tipoPessoa"]:checked').val() == 'pf') {
        /*SE FOR NOVO CLIENTE ENVIAR A INFORMACAO DO CAMPO CODIGOCLIENTE VAZIO*/
        if ($('#codigo_cliente_pf').html() == 'Novo Cliente')
            codigoCliente = "";
        else
            codigoCliente = $('#codigo_cliente_pf').html().trim();
        pessoa_tipo = "F";
    }
    else {
        if ($('#codigo_cliente_pj').html() == 'Novo Cliente')
            codigoCliente = "";
        else
            codigoCliente = $('#codigo_cliente_pj').html().trim();

        if ($('#codigoRepresentanteVendaInterna').html() == 'Cod.Rep: Novo Rep.')
            codigoResponsavel = "";
        else
            codigoResponsavel = $('#codigoRepresentanteVendaInterna').html().substring(9);

        pessoa_tipo = "J";
    }

    if (formaPagamento === undefined) {
        alertErro('Por favor selecione a forma de pagamento do Certificado');
        validaformulario = false;
    }

    if ($('#idCertificadoDuplicado').val() !='' && $('#txtMotivoDuplicacao').val() == '') {
        alertErro('Por favor informe o motivo da duplicacao do certificado');
        validaformulario = false;
    }
    
    /*SE FOR BOLETO PEGA A DATA DE VENCIMENTO
    if (formaPagamento == 1) {
        var dataVencimento = $('#edtVenVenc').val().split(' ');
        dataVencimento = dataVencimento[0].split('/');
        var dataVencimento = new Date(dataVencimento[2], (dataVencimento[1]-1), dataVencimento[0]);
        var dataHoje = new Date();
    
        if (dataVencimento < dataHoje) {
            alertErro('A data de vencimento do boleto deve ser maior ou igual a data de hoje.');
            validaformulario = false;
        }
    }*/


    if (produtoVenda =='') {
        alertErro('Por favor selecione o produto do Certificado');
        validaformulario = false;
    }



    /*SE FORMULARIO FOI VALIDADO SEM ESQUECER DE INFORMAR TUDO*/
    if (validaformulario) {
        var id_contador = '';
        //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
        /*PEGA O CODIGO DO CONTADOR DO SELECT OU DO INPUT*/
        if ($('#edtSelectContador').val()!='outro' && $('#edtSelectContador').val()!='')
            var id_contador = $('#edtSelectContador').val();
        else if ($('#edtSelectContador').val()!='')
            var id_contador = $("#edtCodigoContadorPedido").val();

        $('#mensagemLoading').html('<i class="fa fa-lg fa-cart-plus"></i> Salvando o pedido');
        $("#modalCarregando").modal('show');

        if (pessoa_tipo == 'F') {
            var dadosajax = {
                'clienteId':codigoCliente,
                'edtprodutoVenda':produtoVenda,
                'funcao': 'finalizarvendaInterna',
                'edtVencimentoBoleto':vencimentoBoleto,
                'edtFormaPagamento' :formaPagamento,
                'edtCodigoContadorPedido':id_contador,
                'idUsuarioLogado' : sessionStorage.usuarioLogadoId,
                'edtNomeFantasia':$('#edtNomeRepresentanteVendaInterna').val(),
                'edtNumero':$('#edtNumeroRepresentanteVendaInterna').val(),
                'edtEndereco':$('#edtEnderecoRepresentanteVendaInterna').val(),
                'edtEmail':$('#edtEmailRepresentanteVendaInterna').val(),
                'edtComplemento':$('#edtComplementoVendaInterna').val(),
                'edtCidade':$('#edtCidadeRepresentanteVendaInterna').val(),
                'edtUf':$('#edtUfRepresentanteVendaInterna').val(),
                'edtNomeContato':'',
                'edtEmailContato':'',
                'edtReferenciaContato':'',
                'edtTelefoneContato':'',
                'edtCnpj':'',
                'edtPessoaTipo':"F",
                'edtCpfCnpj':$('#edtCpfVendaInterna').val(),
                'edtNascimento':$('#edtDataNascimento').val(),
                'edtBairro':$('#edtBairroRepresentanteVendaInterna').val(),
                'edtCep':$('#edtCepRepresentanteVendaInterna').val(),
                'edtFone1':$('#edtFoneRepresentanteVendaInterna').val(),
                'edtFone2':$('#edtFone2RepresentanteVendaInterna').val(),
                'edtCelular':$('#edtCelularRepresentanteVendaInterna').val(),
                'idCertificadoRenovacao':$('#idCertificadoRenovacao').val(),
                'idCertificadoDuplicado':$('#idCertificadoDuplicado').val(),
				'motivoDuplicacao': $('#txtMotivoDuplicacao').val()
            };
        } else {
            var dadosajax = {
                'clienteId':codigoCliente,
                'responsavelId':codigoResponsavel,
                'edtprodutoVenda':produtoVenda,
                'funcao': 'finalizarvendaInterna',
                'edtVencimentoBoleto':vencimentoBoleto,
                'edtFormaPagamento' :formaPagamento,
                'edtCodigoContadorPedido':id_contador,
                'idUsuarioLogado' : sessionStorage.usuarioLogadoId,
                'edtPessoaTipo':"J",

                'edtRazaoSocial' :$('#edtRazaoSocial').val(),
                'edtNomeFantasia':$('#edtNomeFantasia').val(),
                'edtNumero': $('#edtNumeroVendaInterna').val(),
                'edtEndereco': $('#edtEnderecoVendaInternaPj').val(),
                'edtEmail':$('#edtEmailPjVendaInterna').val(),
                'edtBairro':$('#edtBairroPjVendaInterna').val(),
                'edtComplemento':$('#edtComplementoVendaInterna').val(),
                'edtCidade':$('#edtCidadePjVendaInterna').val(),
                'edtUf':$('#edtUfVendaInterna').val(),
                'edtCpfCnpj':$('#edtCnpjVendaInterna').val(),
                'edtCep':$('#edtCepPjVendaInterna').val(),
                'edtFone1':$('#edtFonePjVendaInterna').val(),
                'edtFone2':$('#edtFone2PjVendaInterna').val(),
                'edtCelular':$('#edtCelularPjVendaInterna').val(),

                'edtNomeResponsavel':$('#edtNomeRepresentanteVendaInterna').val(),
                'edtNumeroResponsavel':$('#edtNumeroRepresentanteVendaInterna').val(),
                'edtEnderecoResponsavel':$('#edtEnderecoRepresentanteVendaInterna').val(),
                'edtEmailResponsavel':$('#edtEmailRepresentanteVendaInterna').val(),
                'edtCpfResponsavel':$('#edtCpfVendaInternaPj').val(),
                'edtBairroResponsavel':$('#edtBairroRepresentanteVendaInterna').val(),
                'edtComplementoResponsavel':$('#edtComplementoVendaInterna').val(),

                'edtCidadeResponsavel':$('#edtCidadeRepresentanteVendaInterna').val(),
                'edtUfResponsavel':$('#edtUfRepresentanteVendaInterna').val(),
                'edtCepResponsavel':$('#edtCepRepresentanteVendaInterna').val(),
                'edtNascimentoResponsavel':$('#edtDataNascimentoPj').val(),
                'edtFone1Responsavel':$('#edtFoneRepresentanteVendaInterna').val(),
                'edtFone2Responsavel':$('#edtFone2RepresentanteVendaInterna').val(),
                'edtCelularResponsavel':$('#edtCelularRepresentanteVendaInterna').val(),
                'idCertificadoRenovacao':$('#idCertificadoRenovacao').val(),
                'idCertificadoDuplicado':$('#idCertificadoDuplicado').val(),
                'motivoDuplicacao': $('#txtMotivoDuplicacao').val()
            };
        }
        var x = $.ajax({

            //url da pagina
            url: pageUrl,
            //parametros a passar
            data: dadosajax,
            //tipo: POST ou GET
            type: 'POST',
            //cache
            cache: false,
            //se ocorrer um erro na chamada ajax, retorna este alerta
            //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
            error: function(){
                alert('Erro: Inserir Registo!!');
            },
            //retorna o resultado da pagina para onde enviamos os dados
            success: function(result){
                console.log(result);
                resultado = result.split(';');

                if (resultado[0].trim() == 'tudoOk') {
                    alertSucesso("Novo pedido gerado com Sucesso!");
                    limparModalVendaInterna();
                    carregarCertificados();
                    $('#modalCarregando').modal('hide');
                    $('#vendaInterna').modal('hide');
                }else if (resultado[0].trim() == 'Erro') {
                    alertErro(resultado[1].trim());
                    $('#modalCarregando').modal('hide');
                } else {
                    alertErro('Erro!');
                }
                /*if (formaPagamento == 1) {
                    if(resultado[1].trim() == 'boletoOk'){
                        alertSucesso("Boleto gerado com sucesso!");
                    }else if (resultado[0].trim() == 'Erro') {
                        alertErro(resultado[1].trim());
                        $('#modalCarregando').modal('hide');
                    }
                }*/
                $('#modalCarregando').modal('hide');
                $('#vendaInterna').modal('hide');

                carregarCertificados();


            }
        });
    }
}

function abreModalVendaInterna() {
    $('#divFormCliente').css('visibility', 'none');
    $('#divFormCliente').css('display', 'none');

    limparModalVendaInterna();
}

function autorizar_certificado(funcao,usuario_id){
	var dadosajax = {
		'certificado_id' :  $('#idCertificado').val(),
		'funcao' : funcao,
		'motivo' :  $('#edtMotivoAutorizacao').val(),
		'usuario_id' : usuario_id
	}
	$.ajax({
		url: pageUrl,
		data : dadosajax,
		type : 'POST',
		cache : true,
		error : function(){
			alert('Error TC.JS/433 - Erro na a??o de autorizar certificado,' + msnPadrao + '.');
		},
		success : function(result){
			console.log(result);
			if (result){
				alert('Certificado Autorizado com Sucesso!');
				ir_para('telaCertificado.php');
			}else{
				erroEmail(result, "Erro no javascript de autorizar certificado");
				ir_para('telaCertificadoNaoAutorizados.php');
				alert('Error TC.JS/1601 - Erro ao autorizar certificado,' + msnPadrao + '.');
				console.log(result);
			}
		}
	});

}

function limpar_protocolo(protocolo) {
    if (protocolo == '-----')
        alertErro ('N&atilde;o foi gerado nenhum protocolo para este certificado');
    else if ($('#dcSpanDataValidacao').html() != "-") {
        alertErro ('Este certificado j&aacute; foi validado, por isso n&atilde;o poder&aacute; apagar este protocolo.');
    }
    else {
        $('#mensagemLoading').html('<i class="fa fa-lg fa-recycle"> </i> Apagando o protocolo deste certificado');
        $("#modalCarregando").modal('show');

        var dadosajax = {
            'funcao' : "limparProtocolo",
            'certificadoId' : $('#idCertificado').val(),
        };
        $.ajax ({
            url : pageUrl,
            data : dadosajax,
            type : 'POST',
            cache : true,

            error : function (){
                alertErro ('Error TC.JS/725 - Erro na a??o de Gerar Boleto,' + msnPadrao + '.');
            },
            success : function(result){

                if (result) {
                    resultado = result;
                    if (resultado.trim() == 'tudoOk'){
                        alertSucesso('Protocolo apagado com sucesso.');
                        $('#dcSpanProtocolo').html('-----');
                        carregarModalDetalharCertificado($('#idCertificado').val());
                    }else{
                        erroEmail(result, "Erro ao tentar apagar o protocolo");
                        alertErro("Opa, Algo Deu Errado na hora apagar o protocolo. Erro:"+resultado);
                        console.log(result);
                    }
                }
            }
        });
    }

}

function carregarModalVincularContador() {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Carregando campos da tela de vincular contador');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'funcao': 'carregar_campos_modal_vincular_contador',
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CD1001 - Erro na a&ccedil;&atilde;o carregar campos da tela de Vincular contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    montarSelect('edtCertificadoVincularContador', resultado.contadores, 'div_select_contadores_vincular' );
                    $("#vcEdtObservacao").val('');
                }
            } catch (e) {
                alertErro ('Error CD1002 - Erro na a&ccedil;&atilde;o carregar campos da tela de Vincular contador,' + msnPadrao + '.');
            }
        }

    });

}

function informarPagamentoCertificado(acao, boleto){
    if (acao == 'pagar')
        $('#mensagemLoading').html('<i class="fa fa-money" aria-hidden="true"> </i> O pagamento est&aacute; sendo informado...');
    else
        $('#mensagemLoading').html('<i class="fa fa-money" aria-hidden="true"> </i> O extorno est&aacute; sendo realizado...');
    $('#modalCarregando').modal('show');

    if (boleto !== undefined)
        boleto_id = boleto;
    else
        boleto_id = '';

    var dadosajax = {
        'acao': acao,
        'certificado_id' : $('#idCertificado').val(),
        'funcao' : 'informar_pagamento_extorno_certificado',
        'boleto_id': boleto_id,
        'edtObservacaoExttorno':$("#edtObservacaoExttorno").val()
    }

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alertErro ('Error CD3002 - Erro na a&ccedil;&atilde;o informar pagamento,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);
                if (resultado.mensagem == 'Sucesso') {
                    $("#edtObservacaoExttorno").val("");
                    carregarModalDetalharCertificado(dadosajax['certificado_id']);
                    alertSucesso(resultado.mensagemSucesso);
                }
            } catch (e){
                $("#modalCarregando").modal('hide');
                console.log(result, e);
                alertErro ('Error CD3002 - Erro na ao informar/extornar pagamento,' + msnPadrao + '.');

            }

        }
    });

};


function carregarCertificados(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao){
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;
    console.log('pagina selecionada:'+pagina);
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    if ((typeof window['filtroProdutosCertificados'] !== 'undefined') && (Array.isArray(window['filtroProdutosCertificados'])))
        produtos = window['filtroProdutosCertificados'];
    else
        produtos = '';

    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    nomeCampoFiltro = '';
    valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    if ($('#filtroDataCompraCertificado').val()) {
        var filtroData = $('#filtroDataCompraCertificado').val();
        /*SE TIVER DATA SELECIONADA*/
        if (filtroData) {
            var filtroDataValidator = filtroData.split(',');
            /*
            * SE ESCOLHEU ENTRE DATAS EXECUTA O SCRIPT,
            * CASO E POR QUE CONTRARIO ESCOLHEU APENAS UMA DATA
            * */
            if (filtroDataValidator.length > 1) {
                var dataDe = filtroDataValidator[0].split('/'); var dataAte = filtroDataValidator[1].split('/');

                dataDe = new Date(dataDe[2],dataDe[1], dataDe[0] ,0,0,0,0);
                dataAte = new Date(dataAte[2],dataAte[1], dataAte[0], 23,59,59,0 );

                if (dateDiffInDays(dataDe, dataAte)>31) {
                    alertErro('Por favor selecione um intervalo entre datas menor');
                    filtroData = '';
                }
            } else {
                filtroData = filtroData + ',' + filtroData;
            }
        }
    }
    var escolheFiltroPago = '';
    if ($('#filtroEscolhePago').prop('checked')) {
        escolheFiltroPago = $('#filtroChkPagoNaoPago').prop('checked');
    }

    var escolheFiltroValidado = '';
    if ($('#filtroEscolheValidado').prop('checked')) {
        var escolheFiltroValidado = $('#filtroChkApenasValidados').prop('checked');
    }


    filtros = {
        'filtroConsultores':consultores,
        'filtroProdutos':produtos,
        'filtroData':filtroData,
        'filtroTipoData':$('#spanTipoData').html(),
        'filtroPago':escolheFiltroPago,
        'filtroNaoPago':$('#filtroChkApenasNaoPagos').prop('checked'),
        'filtroValidado':escolheFiltroValidado,
        'filtroFormasPagamento': $('#filtroFormasPagamento').val(),
        'campoFiltro' : camposFiltro
    };

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

    var dadosajax = {
        'funcao' : "carregar_certificados",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros': filtros
    };
    $.ajax ({
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaCertificados').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('#divFiltroProdutos').html('<i class="fa fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CD4001 - Erro na a&ccedil;&atilde;o de carregar os Certificados,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);
                var quantidadeCertificadosTotal = JSON.parse(resultado.quantidadeCertificadosTotal);
                if (resultado.mensagem == 'Ok') {
                    /*
                     * MONTA FILTRO DE PRODUTOS DE ACORDO COM OS PRODUTOS SELECIONADOS
                     * */
                    montarSelectMultiplo('filtroProdutosCertificados', resultado.filtroProdutos, 'divFiltroProdutos', '', 'divFiltroProdutosCertificados');

                    montarTabelaDinamica(resultado.colunas, resultado.certificados, 'tabelaCertificados', 'divTabelaCertificados');
                    if (carregarPaginacao)
                        mostrar_paginacao(quantidadeCertificadosTotal.qtdCertificados, qtdItens, carregarCertificados, 'divPaginacaoCertificadosTopo', 'divPaginacaoCertificadosRodape');

                    $('#qtdCertificadosConsulta').html('<label>Qtd:'+quantidadeCertificadosTotal.qtdCertificados+'</label>');
                    $('#valorCertificadosEmAberto').html('<label>'+quantidadeCertificadosTotal.somaTotalCertificadosEmAberto + ' (' + quantidadeCertificadosTotal.qtdCertificadosEmAberto+') </label>');
                    $('#valorCertificadosPagos').html('<label>'+quantidadeCertificadosTotal.somaTotalCertificadosPagos + ' (' + quantidadeCertificadosTotal.qtdCertificadosPagos+')</label>');


                }
                result = '';
                resultado = '';
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD4002 - Erro ao carregar dados dos certificados,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }

    });
}

function carregarModalBoleto() {
    $('#gbSpanCliente').html($('#dcSpanIdCliente').html() +' - ' +$('#dcSpanNomeCliente').html());
    $('#gbSpanVendedor').html($('#dcSpanConsultor').html());
    $('#gbSpanProduto').html($('#dcSpanNomeProduto').html());
    $('#gbSpanPreco').html($('#dcSpanPrecoProduto').html() +'-'+ $('#dcSpanDesconto').html() +'='+ $('#dcSpanValorTotal').html());
    $('#edtVencimentoBoletoCertificado').html('');
};

function carregarModalDesconto() {
    $('#gbSpanClienteDesconto').html($('#dcSpanIdCliente').html() +' - ' +$('#dcSpanNomeCliente').html());
    $('#gbSpanVendedorDesconto').html($('#dcSpanConsultor').html());
    $('#gbSpanProdutoDesconto').html($('#dcSpanNomeProduto').html());
    $('#gbSpanPrecoDesconto').html($('#dcSpanPrecoProduto').html() +'-'+ $('#dcSpanDesconto').html() +'='+ $('#dcSpanValorTotal').html());

    $('#mdEdtValor').val('');
    $('#mdEdtMotivoDesconto').val('');
};

function carregarModalDetalharCertificado(certificado_id, desabilitarBotoes){
    /*if (abrirModalCarregando)
        $('#modalCarregando').modal('show');*/

    try {
		$('#idCertificado').val(certificado_id);

		var dadosajax = {
			'certificado_id' : certificado_id,
			'funcao' : 'carregar_modal_detalhar_certificado'
		};
		/*console.log("ID CERTIFICADO:"+certificado_id);*/

		$.ajax ({
			url : 'funcoes/funcoesCertificado.php',
			data : dadosajax,
			type : 'POST',
			cache : true,
			beforeSend: function () {
				$('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando a p&aacute;gina de detalhes do certificado');
				$('#modalCarregando').modal('show');
			},
			error : function (){
				$("#modalCarregando").modal('hide');
				console.log(result, e);
				alertErro ('Error CD6001 - Erro na a&ccedil;&atilde;o detalhar certificado,' + msnPadrao + '.');
			},
			success : function(result){
				try {
					//console.log(result);
					var resultado = JSON.parse(result);
					var certificado = JSON.parse(resultado.dadosCertificado);
					var pagamentos = JSON.parse(resultado.dadosPagamento);
					var situacoes = JSON.parse(resultado.dadosSituacoes);

					if (resultado.mensagem == 'Ok') {

						/*
						 * SET AS PERMISSOES DOS BOTOES
						 * */
						var permissoes = JSON.parse(resultado.permissoes);
						if (permissoes.permiteAlterarConsultorCertificado == 'sim')
							$('#btnTrocarConsultor').prop("disabled",false);
						else
							$('#btnTrocarConsultor').prop("disabled",true);

						/*
						 * HABILITA O BOTAO APAGAR O CERTIFICADO
						 * CASO HAJA PERMISSAO DE APAGAR O CERTIFICADO
						 * */
						if (permissoes.permiteApagarCertificado == 'sim') {
							if (certificado.dataPagamento=='-' && certificado.dataValidacaoCertificado=='-' && (certificado.protocolo=='-'))
								$('#btnApagarCertificado').prop("disabled",false);
							else
								$('#btnApagarCertificado').prop("disabled",true);
						} else
							$('#btnApagarCertificado').prop("disabled",true);


                        /*
                         * HABILITA O BOTAO DE BAIXA DE PAGAMENTOS
                         * */
                        if (permissoes.permiteBaixarContaReceber == 'sim')
                            $('#btnBaixarPagamento').prop("disabled",false);
                        else
                            $('#btnBaixarPagamento').prop("disabled",true);

						/*
						 * HABILITA O BOTAO DE GERAR PROTOCOLO SE
						 * SE JA FOI PAGO, SE NAO ESTIVER VALIDADO E SE NAO TIVER PROTOCOLO
						 * */
						if ((permissoes.permiteGerarProtocolo == 'sim') && certificado.dataPagamento!='-' && certificado.dataValidacaoCertificado=='-' && (certificado.protocolo=='-')) {
							$('#btnGerarProtocolo').prop("disabled",false);
							$('#btnGerarProtocolo').prop("title", 'Gerar Protocolo');
						}
						else {
							$('#btnGerarProtocolo').prop("disabled",true);
							$('#btnGerarProtocolo').prop("title", resultado.mensagemErroGerarProtocolo);
						}

						/*
						 * HABILITA O BOTAO DE RECIBO SE
						 * SE JA FOI PAGO
						 * */
						if (certificado.dataPagamento!='-')
							$('#btnCarregarModalGerarRecibo').prop("disabled",false);
						else
							$('#btnCarregarModalGerarRecibo').prop("disabled",true);
						/*
						 * HABILITA O BOTAO DE DESCONTO SE
						 * SE FOR DO PERFIL ALTA GESTAO OU SE
						 * AINDA NAO FOI PAGO E NEM VALIDADO
						 * */
						if ((certificado.dataPagamento=='-') && ( permissoes.permiteApagarCertificado=='sim' || certificado.dataValidacaoCertificado=='-') )
							$('#btnCarregarModalDesconto').prop("disabled",false);
						else
							$('#btnCarregarModalDesconto').prop("disabled",true);

						/*
						 * HABILITA O BOTAO DE TROCAR PRODUTO SE
						 * FOR DO PERFIL ALTA GESTAO OU SE
						 * AINDA NAO FOI PAGO E NEM VALIDADO
						 * */
						if ( (certificado.dataPagamento=='-') && (permissoes.permiteAlterarProduto=='sim' || certificado.dataValidacaoCertificado=='-') )
							$('#btnCarregarModalTrocaDeProduto').prop("disabled",false);
						else
							$('#btnCarregarModalTrocaDeProduto').prop("disabled",true);

						/*
						 * HABILITA O BOTAO DE GERAR BOLETO SE
						 * EXISTIR A FORMA DE PAGAMENTO FOR BOLETO, E AINDA NAO FOI PAGO
						 * */
						if (certificado.formaPagamento=='Boleto' && certificado.dataPagamento=='-')
							$('#btnCarregarModalBoleto').prop("disabled",false);
						else
							$('#btnCarregarModalBoleto').prop("disabled",true);
						/*
						 * HABILITA O BOTAO DE REVOGAR SE
						 * EXISTIR PROTOCOLO, SE JA FOI VALIDADO E SE AINDA NAO FOI REVOGADO
						 * */
						if ((certificado.protocolo!='-') && (certificado.dataValidacaoCertificado!='-') )
							$('#btnRevogarCertificado').prop("disabled",false);
						else
							$('#btnRevogarCertificado').prop("disabled",true);

						/*
						 * HABILITA O BOTAO DE LIMPAR PROTOCOLO SE
						 * EXISTIR PROTOCOLO, E AINDA NAO FOI VALIDADO
						 * E SE ELE PUDER FAZER ESTA FUNCAO
						 * */
						if (certificado.protocolo!='-' && (certificado.dataValidacaoCertificado=='-') && (permissoes.permiteApagarProtocolo == 'sim'))
							$('#btnLimparProtocolo').prop("disabled",false);
						else
							$('#btnLimparProtocolo').prop("disabled",true);
						/*
						 * FIM DAS PERMISSOES DOS BOTOES
						 * */



						$('#ioCodCertificado').val(certificado.id);
						$('#dcSpanDataCompra').html(certificado.dataCompra);
						$('#dcSpanCodCertificado').html(certificado.id);
						$('#dcSpanIdCliente').html(certificado.clienteId);
						$('#idCliente').val(certificado.clienteId);
						$('#tcSpanNomeContador').html(certificado.nomeContador);
						$('#dcSpanNomeCliente').html(certificado.nomeCliente);
						$('#dcSpanProtocolo').html(certificado.protocolo);
						$('#dcSpanNomeProduto').html(certificado.nomeProduto);
						$('#dcSpanPrecoProduto').html(certificado.precoProduto);
						$('#dcSpanDesconto').html(certificado.desconto);
						$('#dcSpanValorTotal').html(certificado.valorTotal);
						$('#dcSpanDataValidacao').html(certificado.dataValidacaoCertificado);
						$('#dcSpanDataPagamento').html(certificado.dataPagamento);
						$('#dcSpanFormaPagamento').html(certificado.formaPagamento);
						$('#dcSpanConsultor').html(certificado.consultor);
						$('#dcSpanAgrValidacao').html(certificado.agr);
						$('#dcSpanValidadeCertificado').html(certificado.validade);


						/*
						* MOSTRA CONTATOS DO CLIENTE E DO CONTADOR
						* */
						montarTabelaDinamica(certificado.colunasContatos, certificado.contatosCliente, 'tabelaContatosCliente', 'divTabelaContatosCliente');

						/*
						* INSERE O VALOR TOTAL SEM FORMATACAO NA TELA DE DESCONTO PARA ABRIR O CAMPO DE VOUCHER CASO SEJA NECESSARIO
						* */
						$('#mdEdtPrecoOriginal').val(certificado.valorTotalSemFormatacao);


						/*CAMPO E E-MAIL DO MODALGERARBOLETO*/
						$('#gbSpanEmail').html(certificado.email);

						/*
						* DADOS DO PAGAMENTO
						* */
						if (pagamentos.mensagem == 'Ok') {
							montarTabelaDinamica(pagamentos.colunasPagamento, pagamentos.pagamento, 'tabelaPagamentosCertificado', 'divTabelaPagamentosCertificado');
						}

						/*
						* DADOS DA SITUACAO
						* */
						if (situacoes.mensagem == 'Ok') {
							montarTabelaDinamica(situacoes.colunasSituacoes, situacoes.situacoes, 'tabelaSituacoesCertificado', 'divTabelaSituacoesCertificado');
						}

						$('#modalCarregando').modal('hide');

						if (desabilitarBotoes == 'sim')
							desabilitarTelaDetalharCertificados();


						/*
						* PREPARAR O MODAL DE COMPROVANTES DE PAGAMENTO
						* */

						/*
						 * PREECHER INFORMACOES DO MODAL DE INFORMAR PAGAMENTO
						 * */
						$('#edtCertificadoCartaoCredito').val($('#ioCodCertificado').val());
						$('#edtEmailCartaoCredito').val(certificado.email);
						$('#edtDocumentoCartaoCredito').val(certificado.documento);
						$('#ipSpanCliente').html($('#dcSpanIdCliente').html() +' - ' +$('#dcSpanNomeCliente').html());
						$('#ipSpanVendedor').html($('#dcSpanConsultor').html());
						$('#ipSpanProduto').html($('#dcSpanNomeProduto').html());
						$('#ipSpanPreco').html($('#dcSpanPrecoProduto').html() +'-'+ $('#dcSpanDesconto').html() +'='+ $('#dcSpanValorTotal').html());
						$('#ipSpanForma').html($('#dcSpanFormaPagamento').html());
						$('#formaPagamentoId').val(certificado.formaPagamentoId);
						$('#ipPrecoCertificado').val(certificado.valorTotalSemFormatacao);

						/*PARA O SAFETOPAY*/
						$('#edtDocumentoLogradouro').val(certificado.logradouro);
						$('#edtDocumentoBairro').val(certificado.bairro);
						$('#edtDocumentoNumero').val(certificado.numero);
						$('#edtDocumentoComplemento').val(certificado.complemento);
						$('#edtDocumentoCep').val(certificado.cep);
						console.log(certificado.cidade);
						$('#edtDocumentoCidade').val(certificado.cidade);
						$('#edtDocumentoUf').val(certificado.uf);
						$('#precoProdutoSemFormatacao').val(certificado.precoProdutoSemFormatacao);
						$('#codigoProdutoSafeweb').val(certificado.codigoProdutoSafeweb);





						/*
						* SE O PEDIDO TIVER COMPROVANTE DE PAGAMENTO E ESTIVER PAGO (PODE SER QUE TENHA COMPROVANTE POREM TENHA SIDO EXTORNADO)
						* MOSTRA OS DADOS DO MESMO
						* SE NAO, ABRE A TELA DE INSERIR INFORMACOES DO PAGAMENTO OU O CARTAO DE CREDITO
						* */

						if ((pagamentos.comprovantePagamento.length > 2) && (certificado.dataPagamento!='-')){
							$('#btnInformarPagamento').css({display: 'block', visibility: 'visible'});
							var comprovantePagamento = JSON.parse(pagamentos.comprovantePagamento);
							$('#panelInformacoesPagamento').css({display: 'block', visibility: 'visible'});
							$('#panelCrudPagamento').css({display: 'none', visibility: 'hidden'});

							$('#ipSpanComprovanteCodigo').html(comprovantePagamento.id);
							$('#ipSpanImagemComprovante').html(comprovantePagamento.thumbImagemComprovante);
							$('#ipSpanIdCertificado').html(certificado.id);
							$('#ipSpanDataTransacao').html(comprovantePagamento.dataTransacao);
							$('#ipSpanValorPago').html(comprovantePagamento.valorPago);
							$('#ipSpanCodigoPagamento').html(comprovantePagamento.codigoPagamento);
							$('#ipSpanFormaPagamento').html($('#dcSpanFormaPagamento').html());
							$('#ipSpanComprovante').html('');
							$('#ipSpanObservacao').html(comprovantePagamento.observacao);
						}
						/*
						* SE NAO TIVER COMPROVANTE E NAO TIVER PAGO MOSTRA APENAS A OPCAO DE INFORMAR COMPROVANTE
						* */
						else if ( (pagamentos.comprovantePagamento.length <= 2) && (certificado.dataPagamento!='-') ){
							$('#btnInformarPagamento').css({display: 'block', visibility: 'visible'});
							$('#panelInformacoesPagamento').css({display: 'none', visibility: 'hidden'});
							$('#panelCrudPagamento').css({display: 'block', visibility: 'visible'});


							$('#panelCartaoCredito').css({display: 'none', visibility: 'hidden'});
							$('#panelInformacoesPagamentoOutrosTipos').css({display: 'block', visibility: 'visible'});

						}
						/*
						* SE NAO ESTIVER PAGO MOSTRA APENAS O CARTAO DE CREDITO SE ESTA FOI A FORMA DE PAGAMENTO ESCOLHIDA
						* */
						else if (certificado.dataPagamento=='-') {
							$('#panelInformacoesPagamento').css({display: 'none', visibility: 'hidden'});
							$('#panelInformacoesPagamentoOutrosTipos').css({display: 'none', visibility: 'hidden'});
							$('#panelCrudPagamento').css({display: 'block', visibility: 'visible'});

							/*
							SE NAO HOUVER PAGAMENTO E A FORMA FOI CARTAO MOSTRA O FORM DO CARTAO
							CASO CONTRARIO DESABILITA O BOTAO DE PAGAMENTO
							*/
							if ($('#formaPagamentoId').val() == '6') { /*CARTAO DE CREDITO ONLINE*/
								$('#panelCartaoCredito').css({display: 'block', visibility: 'visible'});
							}
							else {
								$('#btnInformarPagamento').css({display: 'none', visibility: 'hidden'});
								$('#panelCartaoCredito').css({display: 'none', visibility: 'hidden'});
							}

						}
					}
					/*FIM DO RESULTADO = Ok*/
				} catch (e) {
					$("#modalCarregando").modal('hide');
					console.log(result, e);
					alertErro ('Error CD6002 - Erro na a&ccedil;&atilde;o detalhar certificado,' + msnPadrao + '.');

				}
			}
		});
		return;
    } catch (e) {
        $('#modalCarregando').modal('hide');
        console.log(result, e);
        alertErro ('Error CD6003 - Erro ao carregar tela de detalhar certificado.,' + msnPadrao + ' '+e + '.');
    }
};


function gerarBoletoCertificado() {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Gerando boleto para o cliente. Lembrete: O boleto ir&aacute; para o e-mail do cliente e do usu&aacute;rio logado.');
    $("#modalCarregando").modal('show');

    var dadosajax = {
        'funcao' : "gerar_boleto",
        'certificado_id' : $('#idCertificado').val(),
        'vencimento' : $('#edtVencimentoBoletoCertificado').val()
    };
    console.log (dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error CD8001 - Erro na a&ccedil;&atilde;o de Gerar Boleto,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Boleto Gerado com Sucesso!');
                    $("#gerarBoleto").modal('hide');

                    carregarModalDetalharCertificado($('#idCertificado').val());
                } else if (resultado.mensagem == 'Erro') {
                    alertErro(resultado.mensagemErro);
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD8002 - Algo Deu Errado na hora de gerar o boleto.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};

function guardarBoletoSafeToPay(tid, urlBoleto, descricaoSafe, mensagemSafe, codigoBarras, statusBoleto, vencimentoBoleto ) {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Salvando boleto do cliente.');
    $("#modalCarregando").modal('show');

    var dadosajax = {
        'funcao' : "salvar_boleto_safetoPay",
        'certificado_id' : $('#idCertificado').val(),
		'valor': $('#precoProdutoSemFormatacao').val(),
		'urlBoleto': urlBoleto,
		'tid': tid,
		'codigoBarras': codigoBarras,
        'vencimento' : vencimentoBoleto
    };
    console.log (dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error CD8001 - Erro na a&ccedil;&atilde;o de Gerar Boleto,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Boleto Gerado com Sucesso!');
                    $("#gerarBoleto").modal('hide');

                    carregarModalDetalharCertificado($('#idCertificado').val());
                } else if (resultado.mensagem == 'Erro') {
                    alertErro(resultado.mensagemErro);
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD8002 - Algo Deu Errado na hora de gerar o boleto.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};

function carregarModalTrocarProdutos() {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Carregando tela de trocar produto');
    $("#modalCarregando").modal('show');

    $('#gbSpanClienteTrocarProduto').html($('#dcSpanIdCliente').html() +' - ' +$('#dcSpanNomeCliente').html());
    $('#gbSpanVendedorTrocarProduto').html($('#dcSpanConsultor').html());
    $('#gbSpanProdutoTrocarProduto').html($('#dcSpanNomeProduto').html());
    $('#gbSpanPrecoTrocarProduto').html($('#dcSpanPrecoProduto').html() +'-'+ $('#dcSpanDesconto').html() +'='+ $('#dcSpanValorTotal').html());
    $('#gbSpanFormaTrocarProduto').html($('#dcSpanFormaPagamento').html());


    var dadosajax = {
        'certificado_id' : $('#idCertificado').val(),
        'funcao' : 'carregar_modal_trocar_produto'
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            $("#modalCarregando").modal('hide');
            console.log(result, e);
            alertErro ('Error CD9001 - Erro na a&ccedil;&atilde;o detalhar certificado,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                /** FUNCAO QUE SELECIONA O CHECKBOX*/
                $('input[name=edtPagamentoTrocar][value="'+resultado.formaPagamento+'"]').prop('checked', true);

                if (resultado.mensagem == 'Ok') {
                    montarSelect('edtSelectProdutoTrocar', resultado.produtos, 'div_select_produtos_trocarproduto',resultado.produtoId );
                    $("#modalCarregando").modal('hide');
                }


            } catch (e) {
                $("#modalCarregando").modal('hide');
                console.log(result, e);
                alertErro ('Error CD6002 - Erro na a&ccedil;&atilde;o detalhar certificado,' + msnPadrao + '.');

            }
        }
    });


};

function carregarFiltrosCertificados(filtroUsuarioSelecionado) {

    var dadosajax = {
        'funcao' : "carregar_filtros_certificados",
    };

    $('#divFiltroConsultores').html('<i class="fa fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});


    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error CD9001 - Erro ao carregar os filtros dos certificado,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    montarSelectMultiplo('filtroUsuariosCertificados', resultado.usuarios, 'divFiltroConsultores', filtroUsuarioSelecionado, 'divUsuariosCertificados');
                    montarSelectMultiplo('filtroFormasPagamento', resultado.formasPagamento, 'divFiltroFormaPagamentos', filtroUsuarioSelecionado);
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD9002 - Erro ao carregar os filtros dos certificado.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};

function carregarModalAlterarConsultorCertificado() {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-user-times"></i> Carregando campos da tela de trocar consultor do Certificado');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'funcao': 'carregar_modal_alterar_consultor_certificado',
        'certificadoId' : $('#idCertificado').val(),
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CD10001 - Erro na a&ccedil;&atilde;o carregar lista de consultores,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    montarSelect('edtCertificadoConsultor', resultado.consultores, 'div_select_trocar_consultor_certificado', resultado.consultor );
                }
                $('#modalCarregando').modal('hide');
            } catch (e) {
                alertErro ('Error CD10002 - Erro na a&ccedil;&atilde;o carregar lista de consultores,' + msnPadrao + '.');
                console.log(e, result);
            }
        }

    });

}

function alterarConsultorCertificado(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-user-times"></i> Alterando consultor do Certificado');
    $("#modalCarregando").modal('show');

    var dadosajax = {
        'certificadoId' : $('#idCertificado').val(),
        'funcao' : 'alterar_consultor_certificado',
        'consultor' : $('#edtCertificadoConsultor').val()
    }

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert (acentuarMsn('Error CD20001 - Erro ao tentar alterar o consultor deste certificado,' + msnPadrao + '.'));
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Consultor alterado com sucesso!');
                    carregarModalDetalharCertificado($('#idCertificado').val());
                }

                $("#modalAlterarConsultorCertificado").modal('hide');
            } catch (e) {
                alertErro ('Error CD20002 - Erro ao tentar alterar o consultor deste certificado,' + msnPadrao + '.');
                console.log(e, result);
            }
        }
    });

};

function desabilitarTelaDetalharCertificados() {
    /*
    * DESABILITA TODAS AS ACOES DA TELA DE DETALHES DO CERTIFICADO,
    * NORMALMENTE PARA DETALHAR OS CERTIFICADOS EM OUTRAS TELAS
    * AL?M DISSO, REMOVE A ACAO DO BOTAO FECHAR
    * */

    $('#detalharCertificado').find('button').each(function (key,btn){
        $(this).prop("disabled",true);
    });

    $('#detalharCertificado').find('a').each(function (key,btn){
        $(this).prop("disabled",true);
    });
    $('#btnFecharDetalhesCertificado').prop("disabled",false);
    $('#btnFecharDetalhesCertificado').prop('onclick', '');

    $('#btnCupomDesconto').prop("disabled",false);
}

function importarBaixaPagamentosStone(){
    var dadosajax = {
        'certificadoId' : $('#idCertificado').val(),
        'funcao' : 'importar_baixa_pagamento_stone'
    };
    $.ajax ({
        url : '../../funcoes/funcoesCertificado.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaCertificadosImportados').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        error : function (){
            alert ('Error CD30001 - Erro ao tentar importar os certificados validados,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    $('#spanQuantidadeCertificadosImportados').html(resultado.quantidadeTotalImportada);

                    alertSucesso('Baixa de pagamento stone concluida!');
                    $('#divTabelaCertificadosImportados').html('<h4>Importacao finalizada!</h4>');
                }

            } catch (e) {
                console.log(result, e);
                alertErro('Error CD30002 - Erro ao tentar importar os certificados validados, Erro:' + e+ '. '+ msnPadrao + '.')
            }
        }


    });
};

function importarCertificadosValidados(){
    var dadosajax = {
        'certificadoId' : $('#idCertificado').val(),
        'funcao' : 'importar_certificados_validados'
    };
    $.ajax ({
        url : '../../funcoes/funcoesCertificado.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaCertificadosImportados').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        error : function (){
            alert ('Error CD30001 - Erro ao tentar importar os certificados validados,' + msnPadrao + '.');
        },
        success : function(result){
            try {
//            	console.log(result);return;
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    //console.log(resultado.colunasCertificados);
                    montarTabelaDinamica(resultado.colunasCertificados, resultado.certificadosImportados, 'tabelaCertificadosValidados', 'divTabelaCertificadosImportados');
                    montarTabelaDinamica(resultado.colunasCertificadosNaoImportados, resultado.certificadosNaoImportados, 'tabelaCertificadosNaoValidados', 'divTabelaCertificadosNaoImportados');

                    $('#periodoImportacao').html('<label>Per&iacute;odo de:</label>'+ resultado.periodoDe + ' <label>at&eacute;: ' + resultado.periodoAte + '</label>');
                    $('#divTabelaImportacao').html('');
                    $('#spanQuantidadeCertificadosImportados').html(resultado.quantidadeTotalImportada);

                    alertSucesso('Certificados validados importados com sucesso!');
                }

            } catch (e) {
                console.log(result, e);
                alertErro('Error CD30002 - Erro ao tentar importar os certificados validados, Erro:' + e+ '. '+ msnPadrao + '.')
            }
        }


    });
};

function apagarCertificado(motivoDelecao){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-trash"></i> Apagando Certificado');
    $("#modalCarregando").modal('show');

    var dadosajax = {
        'certificado_id' : $('#idCertificado').val(),
        'funcao' : 'apagar_certificado',
        'motivoExclusao' :  motivoDelecao,

    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alertErro('Error CD40001 - Erro ao tentar apagar certificados, Erro:' + e+ '. '+ msnPadrao + '.')
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Certificado excluido com sucesso!');
                    $("#modalCarregando").modal('hide');
                    $("#detalharCertificado").modal('hide');
                    carregarCertificados();
                }

            } catch (e) {
                alertErro('Error CD40002 - Erro ao tentar apagar certificados, Erro:' + e+ '. '+ msnPadrao + '.')
                console.log(result);
                $("#modalCarregando").modal('hide');
            }
        }
    });
};

function carregarModalInformacoesPagamento() {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-money"></i> Carregando tela de Informa&ccedil;&otilde;s de pagamento');
    $("#modalCarregando").modal('show');

    $('#edtCodigoPagamento').val('');
    $('#edtImagemComprovantePagamento').val('');
    $('#edtDataComprovante').val('');
    $('#edtDataComprovante').val('');
    if ($('#edtFormaPagamentoComprovante'))
        $('#edtFormaPagamentoComprovante').val('');
    $('#edtObservacaoComprovante').val('');

    var dadosajax = {
        'certificado_id' : $('#idCertificado').val(),
        'funcao' : 'carregar_modal_informacoes_pagamento',
    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alertErro('Error CD50001 - Erro ao tentar carregar tela de Informa&ccedil;&otilde;s de pagamento, Erro:' + e+ '. '+ msnPadrao + '.')
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                /*
                * FUNCAO EXCLUSIVA PRA CARREGAR QUANTIDADE DE PARCELAS, SE O VALOR DA COMPRA:
                * <300: APENAS 1, >= 300 E <500 2 E ACIMA DISSO 3
                * */
                if (resultado.mensagem == 'Ok') {
                    $("#modalCarregando").modal('hide');
                    montarSelect('edtQtdParcelasCartao', resultado.dados, 'divQtdParcelasCartao', '1');
                    montarSelect('edtFormaPagamentoComprovante', resultado.dadosFormaPagamento, 'divFormaPagamentoComprovante');
                }

            } catch (e) {
                alertErro('Error CD50002 - Erro ao tentar carregar tela de Informa&ccedil;&otilde;s de pagamento, Erro:' + e+ '. '+ msnPadrao + '.')
                console.log(result);
                $("#modalCarregando").modal('hide');
            }
        }
    });
}


function salvarComprovantePagamento (formulario) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-money"></i> Registrar comprovante de pagamento');
    $("#modalCarregando").modal('show');

    formulario.append('certificado_id' , $('#idCertificado').val());
    formulario.append('funcao' , 'salvar_comprovante_pagamento');
    formulario.append('valor' , $('#ipPrecoCertificado').val());

    $.ajax({
        url: pageUrl,
        data : formulario,
        type : 'POST',
        cache : true,
        contentType : false,
        processData : false,
        error : function(){
            alertErro('Error CD60001 - Erro ao tentar salvar o comprovante, Erro:' + e+ '. '+ msnPadrao + '.')
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $("#modalInformarPagamentoCertificado").modal('hide');

                    alertSucesso('Comprovante registrado com sucesso!');
                    carregarModalDetalharCertificado($('#idCertificado').val());

                } else if (resultado.mensagem == 'erro') {
                    alertErro('Ocorreu algum erro ao tentar enviar o comprovante!');
                }

            } catch (e) {
                alertErro('Error CD60002 - Erro ao tentar salvar o comprovante, Erro:' + result + e+ '. '+ msnPadrao + '.')
                console.log(e, result);
                $("#modalCarregando").modal('hide');
            }
        }
    });
}

function carregarModalCupomDesconto() {

	if ($('#edtCodigoCupom').val() == '') {
		alertErro('Informe o c&oacute;digo do cupom para carregar as informa&ccedil;&otilde;es');
		return;
    }
    $('#spCupomDesconto').html($('#hdCupom').val());

    $('#mensagemLoading').html('<i class="fa fa-lg fa-money"></i> Carregar tela de cupom de desconto');
    $("#modalCarregando").modal('show');

	var dadosajax = {
		'cupom': $('#hdCupom').val(),
		'idCertificado': $('#idCertificado').val(),
        'idCliente': $('#idCliente').val(),
		funcao: 'carregar_dados_tela_cupom'
	}

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alertErro('Error CD23010 - Erro ao tentar carregar cupom, Erro:' + e+ '. '+ msnPadrao + '.')
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                $("#modalCarregando").modal('hide');
                console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                	var dadosCupom = JSON.parse(resultado.dadosCupom);
                	console.log(dadosCupom);
                    $('#spRepresentanteLegal').html(dadosCupom.representanteLegal);
                    $('#spCupomDesconto').html(dadosCupom.codigo);
                    $('#edtCodigoCupom').val(dadosCupom.codigo);

                    $('#spDataValidade').html(dadosCupom.dataValidade);
                    $('#spDataEmissao').html(dadosCupom.dataEmissao);
                    $('#spCupomProduto').html(dadosCupom.produto);
                    $('#spCupomPreco').html(dadosCupom.preco);
                    $('#spValorDesconto').html(dadosCupom.descontoValor);

                    $('#percentualDesconto').val(dadosCupom.percentualDescontoSemFormatacao);
                    $('#spPercentualDesconto').html(dadosCupom.percentualDesconto);
                    $('#edtDescricaoCampanha').html(dadosCupom.descricaoCampanha);

                } else if (resultado.mensagem == 'erro') {
                    alertErro('Ocorreu algum erro carregar a tela de cupom!');
                    $("#modalInserirCupom").modal('hide');
                }
                else if (resultado.mensagem == 'semcupom') {
                    alertErro('N&atilde;o existe cupom vinculado a este certificado, vincule primeiro!');
                    $("#modalInserirCupom").modal('hide');
				}

            } catch (e) {
                alertErro('Error CD23012 - Erro ao tentar carregar cupom, Erro:' + result + e+ '. '+ msnPadrao + '.')
                console.log(e, result);
                $("#modalCarregando").modal('hide');
            }
        }
    });
}

function usarCupom() {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-money"></i> Aplicando cupom de desconto');
    $("#modalCarregando").modal('show');

    var dadosajax = {
        'cupom': $('#edtCodigoCupom').val(),
        'idCertificado': $('#idCertificado').val(),
        'idCliente': $('#idCliente').val(),
		'percentualDesconto': $('#percentualDesconto').val(),
        funcao: 'usarCupomDesconto'
    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alertErro('Error CD24010 - Erro ao tentar usar o cupom, Erro:' + e+ '. '+ msnPadrao + '.')
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {
                $("#modalCarregando").modal('hide');
                console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Cupom de desconto aplicado com sucesso!');
                    carregarModalDetalharCertificado($('#idCertificado').val());
                    $("#modalInserirCupom").modal('hide');
                } else{
                    alertErro(resultado.mensagem);
                }

            } catch (e) {
                alertErro('Error CD24012 - Erro ao tentar usar o cupom, Erro:' + result + e+ '. '+ msnPadrao + '.')
                console.log(e, result);
                $("#modalCarregando").modal('hide');
            }
        }
    });
}


/*
* PRIMEIRA ETAPA DA VENDA NO WIZARD
* */
function avancarVendaInterna(idCertificadoRenovacao='', $idCertificadoDuplicado='') {
	$('#idCertificadoRenovacao').val(idCertificadoRenovacao);
    $('#idCertificadoDuplicado').val($idCertificadoDuplicado);

    if ($idCertificadoDuplicado) {
        $('#divMotivoDuplicidade').css('visibility', 'visible');
        $('#divMotivoDuplicidade').css('display', 'block');

    } else {
        $('#divMotivoDuplicidade').css('visibility', 'hidden');
        $('#divMotivoDuplicidade').css('display', 'none');

    }

    console.log('ids:'+$('#idCertificadoRenovacao').val(), $('#idCertificadoDuplicado').val());

    /*CHECA SE O CERTIFICADO E RENOVACAO */

    /*CARREGA O SELECT DE CONTADORES, SE HOUVER CONTADOR NO CADASTRO DO CERTIFICADO SELECIONE*/
    if ($("#edtCodigoContadorCadastro").val() != 0)
        carregar_select_contadores($("#edtCodigoContadorCadastro").val());
    else
        carregar_select_contadores();

    var tipo_cliente = '';
    if ($("input[name='tipoPessoa']:checked").val()=='pf')
        tipo_cliente='F';
    else
        tipo_cliente='J';

    /*SE AINDA NAO HOUVER CONTADOR SELECIONADO, CARREGUE O SELECT DE PRODUTOS COM OS PRODUTOS SEM DESCONTO*/
    //if ( ($('#edtSelectContador').val()!='') && ($('#edtSelectContador').val()!='outra') )
    carregar_select_produtos(tipo_cliente, 0);

    /*
    * HABILITA OS PAINEIS E BOTOES CERTOS
    * */
    $('#divPrimeiraEtapa').css('visibility', 'hidden');
    $('#divPrimeiraEtapa').css('display', 'none');

    $('#divSegundaEtapa').css('visibility', 'visible');
    $('#divSegundaEtapa').css('display', 'block');

    $('#btnFinalizar').css('visibility', 'visible');
    $('#btnFinalizar').css('display', 'block');


    $('#divEtapaConsultaCertificados').css('visibility', 'hidden');
    $('#divEtapaConsultaCertificados').css('display', 'none');

    $('#btnAvancar1').css('visibility', 'hidden');
    $('#btnAvancar1').css('display', 'none');
    $('#btnVoltar1').css('visibility', 'visible');
    $('#btnVoltar1').css('display', 'block');

    if (typeof(Storage) !== "undefined") {
        sessionStorage.ssCpfVendaInternaRepresentante = $("#edtCpfVendaInterna").val();
        sessionStorage.ssCnpjVendaInternaRepresentante = $("#edtCnpjVendaInterna").val();
        sessionStorage.ssDataNascimentoRepresentante = $("#edtDataNascimento").val();
        sessionStorage.ssNomeRepresentante = $("#edtNome").val();
        sessionStorage.ssCepRepresentante = $("#edtCep").val();
        sessionStorage.ssBairroRepresentante = $("#edtBairroVendaInterna").val();
        sessionStorage.ssCidadeRepresentante = $("#edtCidadeVendaInterna").val();
        sessionStorage.ssEnderecoRepresentante = $("#edtEnderecoVendaInterna").val();
        sessionStorage.ssNumeroRepresentante = $("#edtNumeroVendaInterna").val();
        sessionStorage.ssComplementoRepresentante = $("#edtComplementoVendaInterna").val();
        sessionStorage.ssUfRepresentante = $("#edtUfVendaInterna").val();
        sessionStorage.ssFoneRepresentante = $("#edtFone1").val();
        sessionStorage.ssFone2Representante = $("#edtFone2").val();
        sessionStorage.ssCelularRepresentante = $("#edtCelular").val();
        sessionStorage.ssEmailRepresentante = $("#edtEmail").val();
        /*PEGA O CAMPO HIDDEN QUE GUARDARA O CODIGO DO CONTADOR ENCONTRADO OU NAO NA CONSULTA DE CNPJ/CPF*/
        sessionStorage.ssContadorRepresentante = $("#edtCodigoContadorCadastro").val();

    } else {
        alert('O seu navegados nao possui suporte para Gravacao de dados. Por favor entre em contato com o departamento de suporte para solucionar o problema.');
    }

}

function consultaClienteBase() {

    $('#mensagemLoading').html('<i class="fa fa-user-circle-o"></i> Pesquisando de o cliente existe na base de dados do sistema');
    $("#modalCarregando").modal('show');
    /*
    * FAZ A CONSULTA PREVIA PARA HABILITAR OU NAO O BOTAO DE AVANCAR
    * */

	var checado = '';
	var mensagemErro = '';

	$('#btnAvancar1').prop("disabled",false);

	$('#btnAvancar1').css({
		visibility: "visible",
		display: "block"
	});

	/*APAGA O TIPO DE PESSOA NAO SELECIONADO, SO HABILITA QUANDO RESETAR FORMULARIO*/
	$("input[name='tipoPessoa']").each(function () {
		if (this.checked == false) {
			$('#' + this.value).css('visibility', 'hidden');
			$('#' + this.value).css('display', 'none');
		}
	});

	var radios = document.getElementsByName("tipoPessoa");
	for (var i = 0; i < radios.length; i++) {
		if (radios[i].checked) {
			checado = radios[i].value;
		}
	}

	if (checado == 'pf') {
		var dadosajax = {
			'cpf': $("#edtCpfVendaInterna").val(),
			'dataNascimento': $("#edtDataNascimento").val(),
			'tipoPessoa': checado
		}
	} else {
		var dadosajax = {
			'cnpj': $("#edtCnpjVendaInterna").val(),
			'dataNascimento': $("#edtDataNascimentoPj").val(),
			'cpf': $("#edtCpfVendaInternaPj").val(),
			'tipoPessoa': checado
		}
	}

	if (mensagemErro == '') {
		$.ajax({
			url: 'inc/consultaClienteBase.php',
			data: dadosajax,
			type: 'POST',
			cache: false,
			error: function () {
				alert(acentuarMsn('Error TC.JS/591 - Erro de consulta Previa de CPF/CNPJ,' + msnPadrao + '.'));
				$("#modalCarregando").modal('hide');
			},
			success: function (result) {
				$("#modalCarregando").modal('hide');
				var dados = result.split(";");

				if (checado == 'pf') {
					/*SE ENCONTROU UM CLIENTE COM ESTE CPF*/

					if ((dados[14]) && dados[14].trim() == 0) {
						//INSERE O CODIGO DO CLIENTE QUE SERA UTILIZADO NA CONSULTA DOS PEDIDOS DESTE CLIENTE
						$('#idClienteVendaInterna').val(dados[0]);
						$('#divFormCliente').css('visibility', 'visible');
						$('#divFormCliente').css('display', 'inline');
						$('#codigo_cliente_' + checado).html(dados[0]);
						$('#div_codigo_cliente_' + checado).css({'visibility': 'visible', "display": "block"});

//						$('#edtNomeRepresentanteVendaInterna').val(dados[1]);

						$('#edtEnderecoRepresentanteVendaInterna').val(dados[2]);
						$('#edtComplementoRepresentanteVendaInterna').val(dados[3]);
						$('#edtNumeroRepresentanteVendaInterna').val(dados[4]);
						$('#edtUfRepresentanteVendaInterna').val(dados[5]);
						$('#edtBairroRepresentanteVendaInterna').val(dados[6]);
						$('#edtCidadeRepresentanteVendaInterna').val(dados[7]);
						$('#edtFoneRepresentanteVendaInterna').val(dados[8]);
						$('#edtFone2RepresentanteVendaInterna').val(dados[9]);
						$('#edtCelularRepresentanteVendaInterna').val(dados[10]);
						$('#edtEmailRepresentanteVendaInterna').val(dados[11]);
						$('#edtCepRepresentanteVendaInterna').val(dados[12]);
						$('#edtCodigoContadorCadastro').val(dados[13]);

					} /*SE NAO ENCONTROU O CLIENTE ABRE OS CAMPOS PARA INICIAR O CADASTRO DO ZERO*/
					else if (dados[0].trim() == 'naoEncontrouCliente') {
						$('#idClienteVendaInterna').val('');
						$('#divFormCliente').css('visibility', 'visible');
						$('#divFormCliente').css('display', 'inline');
						$('#codigo_cliente_' + checado).html('Novo Cliente');
						$('#div_codigo_cliente_' + checado).css({'visibility': 'visible', "display": "block"});

						$('#edtNomeRepresentanteVendaInterna').val('');
						$('#edtEnderecoRepresentanteVendaInterna').val('');
						$('#edtComplementoRepresentanteVendaInterna').val('');
						$('#edtNumeroRepresentanteVendaInterna').val('');
						$('#edtUfRepresentanteVendaInterna').val('');
						$('#edtBairroRepresentanteVendaInterna').val('');
						$('#edtCidadeRepresentanteVendaInterna').val('');
						$('#edtFoneRepresentanteVendaInterna').val('');
						$('#edtFone2RepresentanteVendaInterna').val('');
						$('#edtCelularRepresentanteVendaInterna').val('');
						$('#edtEmailRepresentanteVendaInterna').val('');
						$('#edtCepRepresentanteVendaInterna').val('');
						$('#edtCodigoContadorCadastro').val('');
					}
				} else if (checado == 'pj') { /*FIM DO PF*/


					if (dados[0].trim() == 'ok') {
						$('#divPessoaJuridica').css('visibility', 'visible');
						$('#divPessoaJuridica').css('display', 'inline');
						$('#divFormCliente').css('visibility', 'visible');
						$('#divFormCliente').css('display', 'inline');

						$('#div_codigo_cliente_pj').css({'visibility': 'visible', "display": "block"});

						if (dados[1].trim() != 'naoEncontrouResponsavel') {
							var arrResponsavel = JSON.parse(dados[1]);
							$('#edtNomeRepresentanteVendaInterna').val(arrResponsavel.nomeResponsavel);
							$('#codigoRepresentanteVendaInterna').html("Cod.Rep: " + arrResponsavel.codigoResponsavel);
							if (arrResponsavel.cpfResponsavel)
								$('#edtCpfVendaInternaPj').val(arrResponsavel.cpfResponsavel);
							if (arrResponsavel.nascimentoReponsavel)
								$('#edtDataNascimentoPj').val(arrResponsavel.nascimentoReponsavel);
							$('#edtEnderecoRepresentanteVendaInterna').val(arrResponsavel.enderecoResponsavel);
							$('#edtComplementoRepresentanteVendaInterna').val(arrResponsavel.complementoResponsavel);
							$('#edtNumeroRepresentanteVendaInterna').val(arrResponsavel.numeroReponsavel);
							$('#edtUfRepresentanteVendaInterna').val(arrResponsavel.ufResponsavel);
							$('#edtBairroRepresentanteVendaInterna').val(arrResponsavel.bairroResponsavel);
							$('#edtCidadeRepresentanteVendaInterna').val(arrResponsavel.cidadeResponsavel);
							$('#edtFoneRepresentanteVendaInterna').val(arrResponsavel.foneResponsavel);
							$('#edtFone2RepresentanteVendaInterna').val(arrResponsavel.fone2Responsavel);
							$('#edtCelularRepresentanteVendaInterna').val(arrResponsavel.celularReponsavel);
							$('#edtEmailRepresentanteVendaInterna').val(arrResponsavel.emailResponsavel);
							$('#edtCepRepresentanteVendaInterna').val(arrResponsavel.cepResponsavel);
							$('#edtCodigoContadorCadastro').val(arrResponsavel.contadorReponsavel);

						} else {
							$('#codigoRepresentanteVendaInterna').html("Cod.Rep: Novo Rep.");
							$('#edtNomeRepresentanteVendaInterna').val("");
							$('#edtCepRepresentanteVendaInterna').val("");
							$('#edtBairroRepresentanteVendaInterna').val("");
							$('#edtCidadeRepresentanteVendaInterna').val("");
							$('#edtEnderecoRepresentanteVendaInterna').val("");
							$('#edtNumeroRepresentanteVendaInterna').val("");
							$('#edtComplementoRepresentanteVendaInterna').val("");
							$('#edtUfRepresentanteVendaInterna').val("");
							$('#edtFoneRepresentanteVendaInterna').val("");
							$('#edtFone2RepresentanteVendaInterna').val("");
							$('#edtCelularRepresentanteVendaInterna').val("");
							$('#edtEmailRepresentanteVendaInterna').val("");
							$('#edtCodigoContadorCadastro').val("");
						}

						if (dados[2].trim() != 'naoEncontrouCliente') {
							var arrCliente = JSON.parse(dados[2]);
							$('#idClienteVendaInterna').val(arrCliente.codigoEmpresa);
							$('#codigo_cliente_pj').html(arrCliente.codigoEmpresa);
							$('#div_codigo_cliente_pj').css({'visibility': 'visible', "display": "block"});
							/*SE FOR UMA PESSOA FISICA, ATRIBUI O NOME AO CAMPO NOME, SE FOR PJ ATRIBUI O NOME A RAZAO SOCIAL*/
							$('#edtRazaoSocial').val(arrCliente.razaoSocial);
							$('#edtNomeFantasia').val(arrCliente.nomeFantasia);
							$('#edtEnderecoVendaInternaPj').val(arrCliente.enderecoEmpresa);
							$('#edtComplementoVendaInterna').val(arrCliente.complementoEmpresa);
							$('#edtNumeroVendaInterna').val(arrCliente.numeroEmpresa);
							$('#edtUfVendaInterna').val(arrCliente.ufEmpresa);
							$('#edtBairroPjVendaInterna').val(arrCliente.bairroEmpresa);
							$('#edtCidadePjVendaInterna').val(arrCliente.cidadeEmpresa);
							$('#edtFonePjVendaInterna').val(arrCliente.foneEmpresa);
							$('#edtFone2PjVendaInterna').val(arrCliente.fone2Empresa);
							$('#edtCelularPjVendaInterna').val(arrCliente.celularEmpresa);
							$('#edtEmailPjVendaInterna').val(arrCliente.emailEmpresa);
							$('#edtCepPjVendaInterna').val(arrCliente.cepEmpresa);
						} else {
							$('#codigo_cliente_pj').html("Novo Cliente");
							/*SE FOR UMA PESSOA FISICA, ATRIBUI O NOME AO CAMPO NOME, SE FOR PJ ATRIBUI O NOME A RAZAO SOCIAL*/
							$('#edtRazaoSocial').val('');
							$('#edtNomeFantasia').val('');
							$('#edtCepPjVendaInterna').val('');
							$('#edtBairroPjVendaInterna').val('');
							$('#edtCidadePjVendaInterna').val('');
							$('#edtEnderecoVendaInternaPj').val('');
							$('#edtNumeroVendaInterna').val('');
							$('#edtComplementoVendaInterna').val('');
							$('#edtUfVendaInterna').val('');
							$('#edtFonePjVendaInterna').val('');
							$('#edtFone2PjVendaInterna').val('');
							$('#edtCelularPjVendaInterna').val('');
							$('#edtEmailPjVendaInterna').val('');
							$('#edtContadorVendaInterna').val('');

						}


					} /*CASO NAO ENCONTRE O CLIENTE*/
					else if (dados[0].trim() == 'naoEncontrouCliente') {
					}

				}
				else {
					$("#modalCarregando").modal('hide');
					alert("Erro na consulta do cliente");
					console.log(result);
					//erroEmail(result, "Erro no javascript de consultarReceira, dados nao encontrados ou cliente nao registrado na base de dados");
				}
			}
		});
	}

};


function consultaPrevia () {
    $('#mensagemLoading').html('<i class="fa fa-circle-o"></i> Realizando a consulta pr&eacute;via nas bases da RFB');
    $("#modalCarregando").modal('show');

    var tipo_cliente = '';
    var nascimento = '';
    var cpf = '';
    if ($("input[name='tipoPessoa']:checked").val()=='pf') {
        tipo_cliente=1;
    	nascimento = $('#edtDataNascimento').val();
    	cpf = $('#edtCpfVendaInterna').val();
    }
    else {
        tipo_cliente=2;
        nascimento = $('#edtDataNascimentoPj').val();
        cpf = $('#edtCpfVendaInternaPj').val();
    }

	var dadosajax = {
		'cpf': cpf,
		'tipo': tipo_cliente,
		'nascimento': nascimento,
        'cnpj': $('#edtCnpjVendaInterna').val(),
		'funcao': 'consulta_previa_nova',
	};

    $.ajax({
        url: 'inc/novaApi.php',
        data: dadosajax,
        type: 'POST',
        cache: true,

        error: function () {
            alertErro('Error CP3912 - Erro ao realizar a consulta previa!' + msnPadrao + '.');
        },
        success: function (result) {
            console.log(result);
            var res = JSON.parse(result.trim());
            $("#modalCarregando").modal('hide');
            try {
                if (res.codigo == 0) {
                    $('#btnAvancar1').prop('disabled', false);
                    if (tipo_cliente == 1) {
                        $('#edtNomeRepresentanteVendaInterna').val(res.mensagem);
                        $('#divFormCliente').css('visibility', 'visible');
                        $('#divFormCliente').css('display', 'inline');
                        $('#edtNomeRepresentanteVendaInterna').focus();

                    } else if (tipo_cliente == 2) {
                        $('#edtRazaoSocial').val(res.mensagem);

                        $('#divPessoaJuridica').css('visibility', 'visible');
                        $('#divPessoaJuridica').css('display', 'inline');
                        $('#divFormCliente').css('visibility', 'visible');
                        $('#divFormCliente').css('display', 'inline');

                        $('#edtRazaoSocial').focus();


                        $('#div_codigo_cliente_pj').css({'visibility': 'visible', "display": "block"});

                    }
				} else {
                    alertErro(res.codigo + ' - ' + res.mensagem + ' Corrija o erro para avancar.');
                    $('#btnAvancar1').prop('disabled', true);
				}
            } catch (e) {
                console.log('erro:' + result);
                alertErro('CP3128 - Erro ao realizar a consulta previa!' + e + ', ' + msnPadrao + '.');
            }

        }
    });
}
/*
* ETAPA DE DUPLICIDADE
* */

function consultarCertificadosVendaInterna() {

	$('#mensagemLoading').html('<i class="fa fa-circle-o"></i> Consultar certificados duplicados');
	$("#modalCarregando").modal('show');
	console.log('idClienteConsultar:'+$('#idClienteVendaInterna').val());
	/*
	* SE FOR CLIENTE NOVO NEM ENTRA AQUI
	* */
	if ($("#idClienteVendaInterna").val()) {
		var dadosajax = {
			'cliente_id': $("#idClienteVendaInterna").val(),
			'funcao': 'consultar_certificados_venda_interna',
		};

		$.ajax({
			url: pageUrl,
			data: dadosajax,
			type: 'POST',
			cache: true,

			error: function () {
				alertErro('Error CD9120 - Erro ao consultar certificados duplicados!' + msnPadrao + '.');
			},
			success: function (result) {
				try {
					console.log('saida: ' + result);
					resultado = JSON.parse(result);
					$('#modalCarregando').modal('hide');
					if (resultado.mensagem == 'Ok') {


						if (resultado.avancarUltimaTela == 'nao') {
							if (resultado.mostrarTelaNovoPedido == 'sim') {
								$('#divNovoPedido').css('visibility', 'visible');
								$('#divNovoPedido').css('display', 'block');
							}

							/*
							* HABILITA OS PAINEIS E BOTOES CERTOS
							* */

							$('#btnVoltar').css('visibility', 'hidden');
							$('#btnVoltar').css('display', 'none');

							$('#divPrimeiraEtapa').css('visibility', 'hidden');
							$('#divPrimeiraEtapa').css('display', 'none');

							$('#divSegundaEtapa').css('visibility', 'hidden');
							$('#divSegundaEtapa').css('display', 'none');

							$('#divEtapaConsultaCertificados').css('visibility', 'visible');
							$('#divEtapaConsultaCertificados').css('display', 'block');
							$('#btnAvancar1').css('visibility', 'visible');
							$('#btnAvancar1').css('display', 'block');
							$('#btnVoltar1').css('visibility', 'visible');
							$('#btnVoltar1').css('display', 'block');

							montarTabelaDinamica(resultado.colunasRenovacao, resultado.certificadosRenovacao, 'tabelaConsultaCertificadosRenVendaInterna', 'divTabelaCdsRenVendaInterna');
							montarTabelaDinamica(resultado.colunasDuplicados, resultado.certificadosDuplicados, 'tabelaConsultaCertificadosDupVendaInterna', 'divTabelaCdsDupVendaInterna');
						} else {
							avancarVendaInterna();
							$('#btnAvancar1').css('visibility', 'hidden');
							$('#btnAvancar1').css('display', 'none');

						}

					}
				} catch (e) {
					console.log('erro:' + result);
					alertErro('CD9121 - Erro ao consultar certificados duplicados!' + e + ', ' + msnPadrao + '.');
				}

			}
		});
	} else
		avancarVendaInterna();

}

function carregarModalBaixarContasReceber () {
	/*
	* CARREGA O MODAL DE CONTAS A RECEBER MAS PRINCIPALMENTE CRIA PEDIDO,
	* CONTAS A RECEBER E ITEM DE PEDIDO CASO NECESSITE
	* */

    $('#mensagemLoading').html('<i class="fa fa-circle-o"></i> Carregando modal contas a receber');
    $("#modalCarregando").modal('show');

	var dadosajax = {
		'certificadoId': $('#idCertificado').val(),
		'funcao': 'carregar_modal_baixa_contas_receber',
	};

	$.ajax({
		url: pageUrl,
		data: dadosajax,
		type: 'POST',
		cache: true,

		error: function () {
			alertErro('Error CD9120 - Erro ao consultar certificados duplicados!' + msnPadrao + '.');
		},
		success: function (result) {
			try {
                $('#modalCarregando').modal('hide');
                var dados = JSON.parse(result);

                if (dados.mensagem=='Ok') {
                    $('#crObservacaoBaixa').val('');
                    $('#crCodigoOperacaoBaixa').val('');
                    $('#idContaReceber').val(dados.contaReceberId);
                    montarSelect('crDestinoLancamento', dados.bancos, 'divCrBanco');
                    montarSelect('crFormaPagamentoLancamento', dados.formasPagamento, 'divCrFormaLancamento');
                    /*INSERE FUNCAO PARA MOSTRAR O SELECT DA LISTA DE BOLETOS*/
                    $('#divCrFormaLancamento').append('<script>$("#crFormaPagamentoLancamento").change(function() { if($("#crFormaPagamentoLancamento option:selected").val()==1) { $("#divLabelBoletos").css({vibility:"visible", display:"block"});$("#divBoletosCr").css({vibility:"visible", display:"block"});} else {$("#divLabelBoletos").css({vibility:"hidden", display:"none"});$("#divBoletosCr").css({vibility:"hidden", display:"none"});} });</script>');
                    /*ESCONDE O SELECT DE BOLETOS E SO MOSTRA QUANDO O CLIENTE CLICAR*/
                    if (dados.boletos)
                        montarSelect('crBoletoPago', dados.boletos, 'divCrBoletos');

                    $("#divLabelBoletos").css({vibility: "hidden", display: "none"});
                    $("#divBoletosCr").css({vibility: "hidden", display: "none"});
                }


			} catch (e) {
				console.log('erro:' + result);
				alertErro('CD2938 Erro ao carregar modal de baixa de contas a receber na tela de certificados!' + e + ', ' + msnPadrao + '.');
			}

		}
	});


}


/*
* SALVAR CONTA A RECEBER
* */
function salvarContaReceber () {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Baixando contas a receber');
    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "salvar_conta_receber",
        'contaId': $('#idContaReceber').val(),
        'dataLancamento': $('#crDataLancamento').val(),
        'banco': $('#crDestinoLancamento').val(),
        'formaPagamento': $('#crFormaPagamentoLancamento').val(),
        'codigoOperacao': $('#crCodigoOperacaoBaixa').val(),
        'observacao': $('#crObservacaoBaixa').val(),
        'idBoletoPago': $('#crBoletoPago').val(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR500 - Erro ao salvar a conta a Receber,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                $('#modalContaReceberBaixarPagamento').modal('hide');
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Conta a receber Baixada com sucesso');
                    carregarModalDetalharCertificado($('#idCertificado').val());
                }
                else
                    throw result + '! Erro inesperado';

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CR501 - Erro na tela de Contas a receber na a&ccedil;&atilde;o de Salvar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}