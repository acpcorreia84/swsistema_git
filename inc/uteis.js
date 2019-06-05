/**
 * Remove acentos de caracteres
 * @param  {String} stringComAcento [string que contem os acentos]
 * @return {String}                 [string sem acentos]
 */
function removerAcentos( newStringComAcento ) {
	var string = newStringComAcento;
	var mapaAcentosHex 	= {
		a : /[\xE0-\xE6]/g,
		e : /[\xE8-\xEB]/g,
		i : /[\xEC-\xEF]/g,
		o : /[\xF2-\xF6]/g,
		u : /[\xF9-\xFC]/g,
		c : /\xE7/g,
		n : /\xF1/g
	};

	for ( var letra in mapaAcentosHex ) {
		var expressaoRegular = mapaAcentosHex[letra];
		string = string.replace( expressaoRegular, letra );
	}

	return string;
}
function precision(n,d) {
  function zero_pad (n,l) {
    function zeros (n) { var z = ''; for ( i = 0; i < n; ++i ) z += '0'; return z; }
    var p = 0;
    for ( t = Math.pow(10,l)/10; t >= 1; t /= 10 ) {
      if ( 0 == Math.floor(n/t) ) p += 1;
      else break;
    }
    return zeros(p);
  }
  var i = Math.floor(n);
  var f = Math.round((n-i) * Math.pow(10,d));
  return i + "." + zero_pad(f,d) + (0 != f ? f : "");
}
//Fun??o para mostrar ou esconder o conte?do do form de inclus?o
function mostra_esconde(div, flag) {
	var campo = document.getElementById(div);
	if (flag)
		campo.style.display = '';
	else 
		campo.style.display = 'none';
}
function abre_janela(pagina, largura, altura) { 
	window.open (pagina, "mywindow","location=1,status=1,scrollbars=1, width="+largura+",height="+altura);
}
function confirma_url(url, mensagem){
	if(confirm(mensagem))
		window.location = url;
}
function confirma_form(form, mensagem){
	var formulario = document.getElementById(form);
	if(confirm(mensagem))
		formulario.submit();
}
function confirma(mensagem){
	if(confirm(mensagem))
		return true;
	else
		return false;
}
function voltar() {
	history.go(-1);
}
function ir(url) {
	window.location=url;
}
function marcarTodos( formulario ) {
    var rows = document.getElementById(formulario).getElementsByTagName('tr');
    var checkbox;
	var j;

    for ( var i = 0; i < rows.length-1; i++ ) {
		var row = document.getElementById("linha"+(i+1));
		if (row.className != 'editando')
			row.className = "destacar";


        checkbox = rows[i+1].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' )
            if ( checkbox.disabled == false )
                checkbox.checked = true;

    }

    return true;
}
function desmarcarTodos ( formulario ) {
    var rows = document.getElementById(formulario).getElementsByTagName('tr');
    var checkbox;

    for ( var i = 0; i < rows.length-1; i++ ) {
		var row = document.getElementById("linha"+(i+1));
		if (row.className != 'editando') {
			if (i%2 == 0)
				row.className = 'linha_escura';
			else
				row.className = 'linha_clara';

			checkbox = rows[i+1].getElementsByTagName( 'input' )[0];

			if ( checkbox && checkbox.type == 'checkbox' )
				checkbox.checked = false;
		}
    }

    return true;
};
function mudar_cor_linha(num){
    var row = document.getElementById("linha"+num);

	if (row.className != "destacar") {
		row.className = 'destacar';
	}else {
		if (num % 2 == 0) {
			row.className = 'linha_clara';
		} else {
			row.className = 'linha_escura';
		}
	}
};
function handleEnter (field, event) {
var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
if (keyCode == 13) {
var i;
for (i = 0; i < field.form.elements.length; i++)
if (field == field.form.elements[i])
break;
i = (i + 1) % field.form.elements.length;
field.form.elements[i].focus();
return false;
}
else
return true;
}
function formatar(src, mask) {
	var tipoCampo = '';
	if (mask == 'cpf') {
		mask = '###.###.###-##';
		tipoCampo = 'cpf';
		src.maxLength=14;
	} else if ( mask == 'cnpj') {
		mask = '##.###.###/####-##';
		tipoCampo = 'cnpj';
		src.maxLength=18;
	} else if ( mask == 'cep') {
		mask = '#####-###';
		tipoCampo = 'cep';
		src.maxLength=9;
	} else if (mask == 'data') {
		mask = '##/##/####';
		tipoCampo = 'data';
		src.maxLength=10;
	} else if (mask == 'data2') {
		mask = '##/##/####';
		src.maxLength=10;
		tipoCampo = 'data';
	} else if (mask == 'fone') {
		mask = '## ####-####';
		src.maxLength=12;
		tipoCampo = 'fone';
	}else if (mask == 'celular') {
		mask = '## #####-####';
		tipoCampo = 'celular';
		src.maxLength=13;
	}
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}

function formatarBlur(src, mask) {
    var tipoCampo = '';
    if (mask == 'cpf') {
        mask = '###.###.###-##';
        tipoCampo = 'cpf';
        src.maxLength=14;
    } else if ( mask == 'cnpj') {
        mask = '##.###.###/####-##';
        tipoCampo = 'cnpj';
        src.maxLength=18;
    } else if ( mask == 'cep') {
        mask = '#####-###';
        tipoCampo = 'cep';
        src.maxLength=9;
    } else if (mask == 'data') {
        mask = '##/##/####';
        tipoCampo = 'data';
        src.maxLength=10;
    } else if (mask == 'data2') {
        mask = '##/##/####';
        src.maxLength=10;
        tipoCampo = 'data';
    } else if (mask == 'fone') {
        mask = '## ####-####';
        src.maxLength=12;
        tipoCampo = 'fone';
    }else if (mask == 'celular') {
        mask = '## #####-####';
        tipoCampo = 'celular';
        src.maxLength=13;
    }
    if ((src.value.length != mask.length) && (src.value != '')){
        var tam = mask.length;
        var final = "";
        var contCaractere = 0;
        //0123456789
        //###.###.###-00
        //35027263708
        for (var i=0; i<tam; i++ ) {
            var caractereMascara = mask.slice(i,i+1);
            /*se nao for um numero*/
            if (caractereMascara == '#') {
                var caractere = src.value.slice(contCaractere,contCaractere+1);
                final += caractere ;
                contCaractere++;
            }else {
                final +=  caractereMascara ;
            }
        }
        src.value = final;
    }
}

/* VALIDAÇÃO DE CAMPOS */
function validDate(obj){
 date=obj.value
if (/[^\d/]|(\/\/)/g.test(date))  {obj.value=obj.value.replace(/[^\d/]/g,'');obj.value=obj.value.replace(/\/{2}/g,'/'); return }
if (/^\d{2}$/.test(date)){obj.value=obj.value+'/'; return }
if (/^\d{2}\/\d{2}$/.test(date)){obj.value=obj.value+'/'; return }
if (!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(date)) return

 test1=(/^\d{1,2}\/?\d{1,2}\/\d{4}$/.test(date))
 date=date.split('/')
 d=new Date(date[2],date[1]-1,date[0])
 test2=(1*date[0]==d.getDate() && 1*date[1]==(d.getMonth()+1) && 1*date[2]==d.getFullYear())
 if (test1 && test2){ 

	obj.style.backgroundColor = "white";
	return true;
 
 }
	 obj.focus();
	 obj.style.backgroundColor = "#FF6347"; 
	 return false
}
function validaCPF(campo) {
	var error = 0;
	var cpf = campo.value;


	cpf = cpf.replace(/[^\d]+/g,'');
    if(cpf == '') error = 1;

	// Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
            error = 1;

    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = (add * 10) % 11;
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            error = 1;

	// Valida 2o digito

	if (rev = 0) {

		add = 0;
		for (i = 0; i < 10; i++)
			add += parseInt(cpf.charAt(i)) * (11 - i);
		rev = (add * 10) % 11;
		if (rev == 10 || rev == 11)
			rev = 0;
		if (rev != parseInt(cpf.charAt(10)))
			error = 1;

	}

	if (error <= 0) {
		 campo.style.backgroundColor ="#fff";
         campo.style.borderColor ='green';
	} else {
		campo.focus();
        campo.style.borderColor ='red';
	}
}
function validaCNPJ(campo) {
	var error = 0;
	var cnpj = campo.value;
	cnpj = cnpj.replace(/[^\d]+/g,'');

    if(cnpj == '') {
		error = 1;
	}

    if (cnpj.length != 14){
		error = 1;
	}

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999") {

		error = 1;
		}
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)) {
		error =1;
	}

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
		error = 1;
	}

	if (error <= 0) {
		 campo.style.backgroundColor = "white";
         campo.style.borderColor ='green';
	} else {
		campo.style.backgroundColor = "white";
        campo.style.borderColor ='red';
		campo.focus();
	}
}
/* FIM VALIDAÇÃO DE CAMPO */

/* CONSULTA CEP DOS CORREIORS */
function limpa_formulario_cep1() {
		//Limpa valores do formul?rio de cep.
		document.getElementById('edtEndereco').value=("");
		document.getElementById('edtBairro').value=("");
		document.getElementById('edtCidade').value=("");
		document.getElementById('edtComplemento').value=("");
		document.getElementById('edtUf').value=("");
}
function meu_callback1(conteudo) {
	if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('edtEndereco').value=(conteudo.logradouro).toUpperCase();
		document.getElementById('edtBairro').value=(conteudo.bairro).toUpperCase();
		document.getElementById('edtComplemento').value=(conteudo.complemento).toUpperCase();
		document.getElementById('edtCidade').value=(conteudo.localidade).toUpperCase();
		document.getElementById('edtUf').value=(conteudo.uf).toUpperCase();
	} //end if.
	else {
		//CEP n?o Encontrado.
		limpa_formulario_cep1();
		alert("CEP n?o encontrado.");
	}
}
function pesquisacep1(valor) {

	//Nova vari?vel "cep" somente com d?gitos.
	var cep = valor.replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Express?o regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if(validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('edtEndereco').value="Carregando...";
			document.getElementById('edtBairro').value="Carregando...";
			document.getElementById('edtCidade').value="Carregando...";
			document.getElementById('edtComplemento').value="Carregando...";
			document.getElementById('edtUf').value="...";

			//Cria um elemento javascript.
			var script = document.createElement('script');

			//Sincroniza com o callback.
			script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback1';

			//Insere script no documento e carrega o conte?do.
			document.body.appendChild(script);


		} //end if.
		else {
			//cep ? inv?lido.
			limpa_formulario_cep1();
			alert("Formato de CEP inv?lido.");
		}
	} //end if.
	else {
		//cep sem valor, limpa formul?rio.
		limpa_formulario_cep();
	}
};
/* FIM CONSULTA CEP CORREIOS*/

/* CONSULTA CEP DOS CORREIORS */
function limpa_formulario_cep() {
		//Limpa valores do formul?rio de cep.
		document.getElementById('edtEnderecoNegocio').value=("");
		document.getElementById('edtBairroNegocio').value=("");
		document.getElementById('edtCidadeNegocio').value=("");
		document.getElementById('edtComplementoNegocio').value=("");
		document.getElementById('edtUfNegocio').value=("");
}
function meu_callback(conteudo) {
	if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('edtEnderecoNegocio').value=(conteudo.logradouro).toUpperCase();
		document.getElementById('edtBairroNegocio').value=(conteudo.bairro).toUpperCase();
		document.getElementById('edtComplementoNegocio').value=(conteudo.complemento).toUpperCase();
		document.getElementById('edtCidadeNegocio').value=(conteudo.localidade).toUpperCase();
		document.getElementById('edtUfNegocio').value=(conteudo.uf).toUpperCase();
	} //end if.
	else {
		//CEP n?o Encontrado.
		limpa_formulario_cep();
		alert("CEP n?o encontrado.");
	}
}
function pesquisacep(valor) {

	//Nova vari?vel "cep" somente com d?gitos.
	var cep = valor.replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Express?o regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if(validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('edtEnderecoNegocio').value="Carregando...";
			document.getElementById('edtBairroNegocio').value="Carregando...";
			document.getElementById('edtCidadeNegocio').value="Carregando...";
			document.getElementById('edtComplementoNegocio').value="Carregando...";
			document.getElementById('edtUfNegocio').value="...";

			//Cria um elemento javascript.
			var script = document.createElement('script');

			//Sincroniza com o callback.
			script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

			//Insere script no documento e carrega o conte?do.
			document.body.appendChild(script);


		} //end if.
		else {
			//cep ? inv?lido.
			limpa_formulario_cep();
			alert("Formato de CEP inv?lido.");
		}
	} //end if.
	else {
		//cep sem valor, limpa formul?rio.
		limpa_formulario_cep();
	}
};
/* FIM CONSULTA CEP CORREIOS*/
function somenteTexto(partecla){
	 
	 var error =0;
	 evt = window.event;
	 var vartecla = evt.keyCode;
	 alert(vartecla);
	 if ( (vartecla > 64 && vartecla < 91)  ){
		error =0;
	}else if (vartecla > 96 && vartecla < 123){
		error=0;
	}else{
	   error=1;
	}
	
	if(error == 1){
	   partecla.focus();
	   alert("Este campo permite apenas letras mai?culas ou min?sculas!");
	   partecla.value=("");
	}
}
function UpperCase(campo){
	campo.value = campo.value.toUpperCase();	
}
function LowerCase(campo){
	campo.value = campo.value.toLowerCase();	
}
function ativar(){
	document.getElementById('btnCancelar').disabled=false;
}
function semNumero(){
	alert("Foi Selecionado");
}
function verificaEmail(campo){
	var email = campo.value;
	var error = 0;
	var subemail = email.split("@");
	if (subemail[1]){

		if ( (subemail[0] =="") || (subemail[1] == 'gruposerama.com.br') || (subemail[1] == 'serama.com.br') || (subemail[1] == 'gruposerama.com') || (subemail[1] == 'serama.com') || (subemail[1] == 'email.com') ||(subemail[1] == 'email.com.br')){
			error = 1;
		}else{
			error = 0;
		}

		if (error <= 0) {
			var verificaponto = subemail[1].split('.');
			console.log(verificaponto);
			if (verificaponto[1] =='' || ((verificaponto[1] == 'gruposerama') || (verificaponto[1] == 'serama'))){
				campo.focus();
				campo.style.backgroundColor="red";
				campo.style.backgroundColor = "#FF6347";
			}else{
				campo.style.backgroundColor="white";
			}
		} else {
			campo.focus();
			campo.style.backgroundColor="red";
			campo.style.backgroundColor = "#FF6347";
		}
	}else {
		campo.focus();
		campo.style.backgroundColor="red";
		campo.style.backgroundColor = "#FF6347";
	}
}
function ir_para(link){
	window.location.href = link;
}
function campoObrigatorio(campo) {
    if(campo.value ==""){
        campo.focus();
        campo.style.borderColor ='red';
        campo.style.backgroundColor="white";
    }else{
        campo.style.borderColor ='green';
        campo.style.backgroundColor="white";
    }
}

function alertErro (mensagem) {
	BootstrapDialog.show({
		title: 'Erro',
		type: BootstrapDialog.TYPE_DANGER,
		message: mensagem,
		buttons: [{
			label: 'Fechar',
			action: function(dialog) {
				dialog.close();
			}
		}, ]
	});

}

function alertSucesso (mensagem) {
	BootstrapDialog.show({
		title: 'Informa&ccedil;&atilde;o',
		type: BootstrapDialog.TYPE_INFO,
		message: mensagem,
		buttons: [{
			label: 'Fechar',
			action: function(dialog) {
				dialog.close();
			}
		}, ]
	});

}

/*FUNCAO NAO TERMINADA*/
function promptSN(mensagem, funcaoSucesso) {
	BootstrapDialog.show({
		title: 'Informa&ccedil;&atilde;o',
		type: BootstrapDialog.TYPE_PRIMARY,
		message: mensagem,
		buttons: [
			{
				label: 'Sim',
				action: function(dialog) {
                    funcaoSucesso;
					dialog.close();
				}
			},
			{
				label: 'N&atilde;o',
				action: function(dialog) {
					dialog.close();
				}

			}, ]
	});

}

/*FUNCAO PARA ALERT, PROMPT E CONFIRM*/
function ezBSAlert (options) {
    var deferredObject = $.Deferred();
    var defaults = {
        type: "alert", //alert, prompt,confirm
        modalSize: 'modal-sm', //modal-sm, modal-lg
        okButtonText: 'Ok',
        cancelButtonText: 'Cancel',
        yesButtonText: 'Yes',
        noButtonText: 'No',
        headerText: 'Atenção',
        messageText: 'Mensagem',
        alertType: 'default', //default, primary, success, info, warning, danger
        inputFieldType: 'text', //could ask for number,email,etc
    }
    $.extend(defaults, options);

    var _show = function(){
        var headClass = "navbar-default";
        switch (defaults.alertType) {
            case "primary":
                headClass = "alert-primary";
                break;
            case "success":
                headClass = "alert-success";
                break;
            case "info":
                headClass = "alert-info";
                break;
            case "warning":
                headClass = "alert-warning";
                break;
            case "danger":
                headClass = "alert-danger";
                break;
        }
        $('BODY').append(
            '<div id="ezAlerts" class="modal fade">' +
            '<div class="modal-dialog" class="' + defaults.modalSize + '">' +
            '<div class="modal-content">' +
            '<div id="ezAlerts-header" class="modal-header ' + headClass + '">' +
            '<button id="close-button" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
            '<h4 id="ezAlerts-title" class="modal-title">Modal title</h4>' +
            '</div>' +
            '<div id="ezAlerts-body" class="modal-body">' +
            '<div id="ezAlerts-message" ></div>' +
            '</div>' +
            '<div id="ezAlerts-footer" class="modal-footer">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>'
        );

        $('.modal-header').css({
            'padding': '15px 15px',
            '-webkit-border-top-left-radius': '5px',
            '-webkit-border-top-right-radius': '5px',
            '-moz-border-radius-topleft': '5px',
            '-moz-border-radius-topright': '5px',
            'border-top-left-radius': '5px',
            'border-top-right-radius': '5px'
        });

        $('#ezAlerts-title').text(defaults.headerText);
        $('#ezAlerts-message').html(defaults.messageText);

        var keyb = "false", backd = "static";
        var calbackParam = "";
        switch (defaults.type) {
            case 'alert':
                keyb = "true";
                backd = "true";
                $('#ezAlerts-footer').html('<button class="btn btn-' + defaults.alertType + '">' + defaults.okButtonText + '</button>').on('click', ".btn", function () {
                    calbackParam = true;
                    $('#ezAlerts').modal('hide');
                });
                break;
            case 'confirm':
                var btnhtml = '<button id="ezok-btn" class="btn btn-primary">' + defaults.yesButtonText + '</button>';
                if (defaults.noButtonText && defaults.noButtonText.length > 0) {
                    btnhtml += '<button id="ezclose-btn" class="btn btn-default">' + defaults.noButtonText + '</button>';
                }
                $('#ezAlerts-footer').html(btnhtml).on('click', 'button', function (e) {
                    if (e.target.id === 'ezok-btn') {
                        calbackParam = true;
                        $('#ezAlerts').modal('hide');
                    } else if (e.target.id === 'ezclose-btn') {
                        calbackParam = false;
                        $('#ezAlerts').modal('hide');
                    }
                });
                break;
            case 'prompt':
                $('#ezAlerts-message').html(defaults.messageText + '<br /><br /><div class="form-group"><input type="' + defaults.inputFieldType + '" class="form-control" id="prompt" /></div>');
                $('#ezAlerts-footer').html('<button class="btn btn-primary" id="btnOk1">' + defaults.okButtonText + '</button>' + '<button class="btn btn-danger" onclick="$(\'#ezAlerts\').modal(\'hide\');">' + defaults.cancelButtonText + '</button>' ).on('click', "#btnOk1", function () {
                    calbackParam = $('#prompt').val();
                    $('#ezAlerts').modal('hide');
                });
                break;
        }

        $('#ezAlerts').modal({
            show: false,
            backdrop: backd,
            keyboard: keyb
        }).on('hidden.bs.modal', function (e) {
            $('#ezAlerts').remove();
            deferredObject.resolve(calbackParam);
        }).on('shown.bs.modal', function (e) {
            if ($('#prompt').length > 0) {
                $('#prompt').focus();
            }
        }).modal('show');
    }

    _show();
    return deferredObject.promise();
}

var msnPadrao = 'entre em contato com o administrador do sistema (3321-5081)';

function pesquisa_cep_padrao(valor, campoEndereco, campoCidade, campoBairro, campoUf, campoComplemento) {
    //Nova vari?vel "cep" somente com d?gitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Express?o regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#"+ campoEndereco).val("Carregando...");
            $("#"+ campoBairro).val("Carregando...");
            $("#"+ campoCidade).val("Carregando...");
            $("#"+ campoUf).val("Carregando...");
            $("#"+ campoComplemento).val("Carregando...");
            //Consulta o webservice viacep.com.br/
            $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#"+ campoEndereco).val(dados.logradouro);
                    $("#"+ campoBairro).val(dados.bairro);
                    $("#"+ campoCidade).val(dados.localidade);
                    $("#"+ campoUf).val(dados.uf);
                    $("#"+ campoComplemento).val(dados.complemento);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulario_cep();
                    alert("CEP não encontrado.");
                }
            });


        } //end if.
        else {
            $("#"+ campoEndereco).val("");
            $("#"+ campoBairro).val("");
            $("#"+ campoCidade).val("");
            $("#"+ campoUf).val("");
            $("#"+ campoComplemento).val("");
            alert("Formato de CEP inv&aacute;lido.");
        }
    } //end if.
    else {
        $("#"+ campoEndereco).val("");
        $("#"+ campoBairro).val("");
        $("#"+ campoCidade).val("");
        $("#"+ campoUf).val("");
        $("#"+ campoComplemento).val("");
    }
};

function montarTabelaDinamica (colunas, dados, tabelaId, divId, classTabela) {
    if (classTabela === undefined)
        estilo = "table table-striped table-bordered";
    else
        estilo = classTabela;

    $('#'+divId).html('');
    var $tabela = $('<table/>', {
        'id': tabelaId,
        'class': estilo,
    });

    var $tabelaCabecalho = $('<thead/>');
    var $tabelaCorpo = $('<tbody/>');

    /*var $dados = $('<tbody/>');
     $tabela.append($dados);*/
    colunas = JSON.parse(colunas);

    dados = JSON.parse(dados);

    var $linha = $('<tr/>');
    /*ACRESCENTA AS COLUNAS*/
    for (i = 0; i < colunas.length; i++) {
        var $celulaTitulo = $('<td/>').text(colunas[i].nome);
        $linha.append($celulaTitulo);
    }

    $tabelaCabecalho.append($linha);
    $tabela.append($tabelaCabecalho);

    /*ACRESCENTA AS LINHAS*/

    for (i = 0; i < dados.length; i++) {
        var $linhaDado = $('<tr/>', {
            'onMouseOver':"javascript:this.style.backgroundColor='#FFFF66'",
            'onMouseOut':"javascript:this.style.backgroundColor=''"
        });
        for (j = 0; j < colunas.length; j++ ) {
            var $celulaTitulo = $('<td/>').html(dados[i][colunas[j].nome]);
            $linhaDado.append($celulaTitulo);
        }
        $tabelaCorpo.append($linhaDado);
    }

    $tabela.append($tabelaCorpo);

    //$select.appendTo('#div_select_contadores').selectpicker('refresh');
    $('#'+divId).append($tabela);

}

function mostrar_paginacao (qtdItens, qtdItensPagina, funcaoPaginar, div_paginacao_topo, div_paginacao_rodape) {
    /*TODO: PRECISO TERMINAR A PAGINACAO PARA MOSTRAR SETAS E ABREVIAR QUANDO A PAGINACAO FOR ACIMA DE 10 ITENS*/
    if (qtdItensPagina === undefined)
        var qtdItensPorPagina = 20;
    else
        var qtdItensPorPagina = qtdItensPagina;

    var qtdTotalItens = qtdItens;

    $('#' + div_paginacao_topo).html('');
    $('#' + div_paginacao_rodape).html('');
    if (qtdTotalItens > 0) {
        /*DIVIDE A QUANTIDADE TOTAL PELA QTD POR PAGINAS E ARREDONDA PRA CIMA*/
        var qtdPaginas = Math.ceil(qtdTotalItens / qtdItensPorPagina);
        $('.paginacao').twbsPagination('destroy');

        $('.paginacao').twbsPagination({
            totalPages: qtdPaginas,
            visiblePages: 10,
            onPageClick: function (event, page) {
                /*console.info(page + ' (from options)');*/

            }
        }).on('page', function (event, page) {
            /*console.info(page + ' (from event listening)');*/
            funcaoPaginar(page, qtdItensPorPagina, 'paginar');
        });

    }


}

function efeito_filtro(campo, tipo) {
    var campoValue = $(campo).val();

    if(  (campoValue != "") &&(
            (campoValue == 'contador_id') || (campoValue == 'cod_contador') || (campoValue == 'cpf') || (campoValue == 'cnpj') ||
            (campoValue == 'certificado_id') || (campoValue == 'cliente_id') || (campoValue == 'protocolo') || (campoValue == 'cpf') || (campoValue == 'cnpj') ||
            (campoValue == 'usuario_id') || (campoValue == 'local_id') || (campoValue == 'perfil_id') || (campoValue == 'cpf') || (campoValue == 'situacao_id') ||
            (campoValue == 'todos') || (campoValue == 'entre_datas') || (campoValue == 'renovacaoa3') || (campoValue == 'contador')
            || (campoValue == 'contadorSemIndicacao') || (campoValue == 'cobranca') || (campoValue == 'validadoNaoPago')
            || (campoValue == 'Local') || (campoValue == 'Vendedor')|| (campoValue == 'Parceiro')
        )
    ){
        $('#whereBD').show().html("igual a");
        $('#edtWhereBD').val("equal");
        $('#divSpanWhereBD').css('visibility','visible');

        if (tipo == 'select') {
            $('#ed'+ campoValue).css('visibility','visible');
            $('#ed'+ campoValue).css('display','block');
            console.log('#ed'+ campoValue);
        } else if( (campoValue == 'cpf') || (campoValue == 'cnpj') ) {
            if(campoValue == 'cpf'){
                var string = '"cpf"';
            }else{
                var string = '"cnpj"';
            }
            var x = "<input class='form-control' onkeypress='formatar(this,"+string+")' name='edt_"+campoValue+"' id='edt_" + campoValue + "' type='text' />";

            document.getElementById("camposDeFiltro").innerHTML=x;
            $('#edtConsulta').css('visibility','visible');
            $('#edtConsulta').css('display','block');
            console.info(x);

        }else{
            var x = '<input class="form-control" name="edt_' + campoValue + '" id="edt_' + campoValue + '" type="text" />';
            document.getElementById("camposDeFiltro").innerHTML=x;
            $('#edtConsulta').css('visibility','visible');
            $('#edtConsulta').css('display','block');
            console.info(x);
        }
    }else{
        $('#edtConsulta').css('visibility','hidden');
        $('#divSpanWhereBD').css('visibility','hidden');
        document.getElementById("camposDeFiltro").innerHTML="";
    }

}

function montarFiltroPesquisarPor (campoSelecionado) {
    var $divPesquisarPor = $(campoSelecionado).parent('div');

    if ( ($('#igual_a')) && ($('#input_filtro'))) {
        $('#div_igual_a').remove();
        $('#div_filtro_pesquisa_por').remove();
    }

    /*
    * SE HOUVER UM ATRIBUTO NA TAG OPTION DA LISTA DE FILTROS CHAMADO tipocampo
    * INSERE ELE NO INPUT E COLOCA NO NOME DA MASCARA
    * */
    var mascaraCampo = '';
    //tipoCampo = campoSelecionado.options[campoSelecionado.selectedIndex].getAttribute('tipocampo');
    var tipoCampo = $(campoSelecionado).find('option:selected').attr('tipocampo');

    if (tipoCampo)
        var mascaraCampo = 'onkeypress="formatar(this,\''+tipoCampo+'\');" onblur="formatarBlur(this,\''+tipoCampo+'\');"';
    if (campoSelecionado.value != '') {
        $('<div class="col-lg-2" id="div_igual_a"><input type="text" class="form-control" value="igual a" disabled="disabled" '+mascaraCampo+'></div>').insertAfter($divPesquisarPor);
        $('<div class="col-lg-4" id="div_filtro_pesquisa_por"><input type="text" id="filtro_pesquisa_por" class="form-control" placeholder="'+$(campoSelecionado).find('option:selected').text()+'" '+mascaraCampo+'></div>').insertAfter('#div_igual_a');
    }
}

/*
* FUNCAO QUE RECEBE OS DADOS EM JSON E ENTREGA UM SELECT JA POSICIONADO NO DIV INDICADO
* */
function montarSelect (nomeSelect, dados, divSelect, idSelecionado) {
        var $select = $('<select/>', {
            'id' : nomeSelect,
            'name' : nomeSelect,
            'class':"selectpicker",
            'data-live-search':"true"
        });

        dadosSelect = JSON.parse(dados);
        /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE CONTADORES*/
        //$select.append('<option data-tokens="Selecione o contador ou escolha outro" value="">Selecione o contador ou Digite o Codigo</option>');

        $.each(dadosSelect, function(i,dado){
            /*CASO TENHA A OPCAO COM ID VAZIO*/
            if (dado.id == '') {
                $select.append('<option data-tokens="'+dado.nome+'" value="">' + dado.nome + '</option>');
            }else {
                /*MONTA AS OPCOES E SE HOUVER ALGUMA SELECIONADA INSERE A TAG SELECTED='SELECTED'*/
                if (idSelecionado==dado.id)
                    $select.append('<option data-tokens="'+dado.nome+'" value="' + dado.id + '" selected="selected">' + dado.id+ ' | ' + dado.nome + '</option>');
                else
                    $select.append('<option data-tokens="'+dado.nome+'" value="' + dado.id + '">' + dado.id+ ' | ' + dado.nome + '</option>');
            }
        });

        $('#'+divSelect).empty();
        $('#'+divSelect).selectpicker('refresh');
        $select.appendTo('#' + divSelect).selectpicker('refresh');
        $('#' + nomeSelect).selectpicker('render');
        $('#' + nomeSelect).selectpicker('refresh');


}

function removerItemComponente (nomeComponente, idItem) {
    if ($("#btnItemComponente"+idItem))
        $("#btnItemComponente"+idItem).remove();


    /*
    * REMOVO ITEM DO ARRAY ATRIBUI A UM NOVO ARRAY AUXILIAR DEPOIS
    * ATRIBUI O NOVO ARRAY AUXILIAR AO ARRAY PRINCIPAL DE COMPONENTES
    * */
    var novoArrayComponente = [];
    for (x in window[nomeComponente]) {
        if (idItem != window[nomeComponente][x].id)
            novoArrayComponente.push( window[nomeComponente][x]);
    }

    window[nomeComponente] = novoArrayComponente;

/*
    /!*debug*!/
    var itens = '';
    for (x in itensComponente) {
        itens = itens + ' | '+itensComponente[x].nome;
    }
    console.log(itens);
*/

}

function adicionarItemComponente(nomeComponente, divMostraDados) {

    /*PEGA O NOME DO ITEM NO SELECT*/
    var nomeItem = $('#'+nomeComponente +' option:selected').text();
    /*PEGA O VALOR DO ITEM NO SELECT PARA INSERIR NO JSON*/
    var idItem = $('#'+nomeComponente +' option:selected').val();

    /*
    * SE O USUARIO ESCOLHEU ALGUM ITEM ADICIONA CASO CONTRARIO NAO FAZ NADA
    * */
    if (idItem != '') {
        /*
        * CRIA UM ARRAY GLOBAL COM OS ITENS DO SELECT
        * E ADICIONA ITENS CADA VEZ QUE A FUNCAO E CHAMADA
        * */
        if ((typeof window[nomeComponente] !== 'undefined') && (Array.isArray(window[nomeComponente]))){
            var achou = false;
            for (i in window[nomeComponente]) {
                if (window[nomeComponente][i].id == idItem)
                    achou = true;
            };

            if (!achou) {
                window[nomeComponente].push({id: idItem, nome: nomeItem});
                $('#' + divMostraDados).append('<button id="btnItemComponente'+idItem+'" class="btn btn-success" onclick="removerItemComponente(\''+nomeComponente+'\',' + idItem + ')"><i class="fa fa-lg fa-close"></i> ' + nomeItem + '</button> ');
            }
        }
        else {
            window[nomeComponente] = [];
            window[nomeComponente].push({id: idItem, nome:nomeItem});
            $('#' + divMostraDados).append('<button id="btnItemComponente'+idItem+'" class="btn btn-success" onclick="removerItemComponente(\''+nomeComponente+'\',' + idItem + ')"><i class="fa fa-lg fa-close"></i> ' + nomeItem + '</button> ');

        }

        /*/!*debug*!/
        var itens = '';
        for (x in itensComponente) {
            itens = itens + ' | '+itensComponente[x].nome;
        }
        console.log(itens);*/
    }

}

/*
 * FUNCAO QUE RECEBE OS DADOS EM JSON E ENTREGA UM SELECT JA POSICIONADO NO DIV INDICADO
 * */
function montarSelectMultiplo (nomeSelect, dados, divSelect, idSelecionado, divMostraDados) {
    var $select = $('<select/>', {
        'id' : nomeSelect,
        'name' : nomeSelect,
        'class':"selectpicker",
        'data-live-search':"true",
        'onChange': "adicionarItemComponente('"+nomeSelect+"', '"+divMostraDados+"');"
    });

    dadosSelect = JSON.parse(dados);
    /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE CONTADORES*/
    //$select.append('<option data-tokens="Selecione o contador ou escolha outro" value="">Selecione o contador ou Digite o Codigo</option>');

    $.each(dadosSelect, function(i,dado){
        if (dado.id == '') {
            $select.append('<option data-tokens="'+dado.nome+'" value="">' + dado.nome + '</option>');
        }else {
            $select.append('<option data-tokens="' + dado.nome + '" value="' + dado.id + '" >' + dado.id + ' | ' + dado.nome + '</option>');
        }
    });

    $('#'+divSelect).empty();
    $select.appendTo('#' + divSelect).selectpicker('refresh');
}



/*
* FUNCAO QUE CHECA A DIFERENCA ENTRE DUAS DATAS E RETORNA A QUANTIDADE EM DIAS
* */
function dateDiffInDays(a, b) {

    // Discard the time and time-zone information.
    var t2 = b.getTime();
    var t1 = a.getTime();


    return parseInt((t2-t1)/(24*3600*1000));
}

function removerComponente (numeroComponentes,nomeComponente, spanContadorComponentes) {
    $('#'+spanContadorComponentes).html(parseInt($('#'+spanContadorComponentes).html()) -1 );

    $('#'+nomeComponente).remove();
}

/*
* FUNCAO QUE SERVE PARA DUPLICAR UMA DETERMINADA DIV COMPONENTE (COMO CAMPOS A SEREM PREENCHIDOS)
* INSERINDO A FUNCAO DE APAGAR COMPONENTES
* */
function duplicarComponente (containerReceptor, nomeComponente, divBtnApagarComponente, legendaBtnApagarComponente, spanContadorComponentes) {

    if ($('#'+spanContadorComponentes).html())
        var idNum = parseInt( $('#'+spanContadorComponentes).html())
    else
        var idNum = 1;

    var $divComponente = $('#'+nomeComponente).clone();

    $divComponente.prop("id", nomeComponente+idNum);

    /*LIMPA O COMPONENTE ANTES DE DUPLICA-LO*/
    $divComponente.find('input:text').each(function (posicaoComponente) {
        $(this).val('');
    });

    btnApagar = '<button type="button" id="btnExcluir" title="'+legendaBtnApagarComponente+'" class="btn btn-danger" onclick="removerComponente('+idNum+',\''+nomeComponente+idNum+'\', \''+spanContadorComponentes+'\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';

    $divComponente.find('#'+divBtnApagarComponente).append(btnApagar);

    $('#'+containerReceptor).append(
        $divComponente
    );

    idNum++;

    $('#'+spanContadorComponentes).html(idNum);


}
/*
* NOME COMPONENTE : NOME DO DIV QUE CONTEM OS CAMPOS
 * CAMPOS : ARRAY COM OS CAMPOS QUE VAO SER RETORNADOS
 * spanContadorComponentes : informa o numero de componentes
* */
function obterDadosComponente (nomeComponente,campos, spanContadorComponentes ) {
    var qtdComponentes = parseInt($('#'+spanContadorComponentes).html());

    var dados = [];
    for (i=0; i<qtdComponentes; i++) {
        var contato = {};
        if (i>0) {
            $.each(campos, function( chave, nomeCampo ) {
                contato[nomeCampo] = $('#'+(nomeComponente+i)).find('input[name="'+nomeCampo+'"]').val();
            });

        } else {
            $.each(campos, function( chave, nomeCampo ) {
                contato[nomeCampo] = $('#'+nomeComponente).find('input[name="'+nomeCampo+'"]').val();
            });
        }


        dados.push(contato);
    }

    return dados;
}

/*
 * NOME COMPONENTE : NOME DO DIV QUE CONTEM OS CAMPOS
 * APAGA OS COMPONENTES
 * */
function apagarDadosComponente (nomeComponente, spanContadorComponentes ) {
    var qtdComponentes = parseInt($('#'+spanContadorComponentes).html());
    /*
    * APAGA OS CAMPOS DA DIV ORIGINAL
    * */

    $('#'+nomeComponente).find('input:text').each(function (posicaoComponente) {
        $(this).val('');
    })

    for (i=1; i<qtdComponentes; i++) {
        var $divComponente = $('#'+nomeComponente+i);
        /*
        * REMOVE A DIV DUPLICADA SE EXISTIR
        * */
        if ($divComponente)
            $divComponente.remove();
    }

    return true;
}

function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}