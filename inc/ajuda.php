<?
	$edtModal = $_REQUEST['edtModal'];
    $edtTela = $_REQUEST['edtTela'];

switch ($edtTela){
    case 'certificado' :
        switch ($edtModal) {
            case '1':
                echo '<div class="row"><div class="col-lg-12">
					Modal detalhar certificado <br/>
					Quando o modal certificado é aberto aparece a seguinte tela:
				</div>
			</div>

			<div class="row">
				<div class= "col-lg-2">  </div>
				<div class="col-lg-10"> 
					<img src="img/manual_certificado/detalhar/detCert.jpg" width="90%">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					Onde é possível visualizar os dados do Cliente:
				</div>
			</div>
			<div class="row">
				<div class= "col-lg-2">  </div>
				<div class="col-lg-10"> 
				<img src="img/manual_certificado/detalhar/detalharCertDados.jpg" width="90%">
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				Visualizar dados do Pagamento:
				</div>
			</div>

			<div class="row">
				<div class= "col-lg-2">  </div>
				<div class="col-lg-10"> 
					<img src="img/manual_certificado/detalhar/detCertPag.jpg" width="90%">
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					E as observações e Situações cadastradas do certificado:	
				</div>
			</div>

			<div class="row">
				<div class= "col-lg-2">  </div>
				<div class="col-lg-10"> 
					<img src="img/manual_certificado/detalhar/detCertObs.jpg" width="90%">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					Na parte superior, apresenta botões de ação cada botão é responsável pela abertura de um modal:
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<button class="btn btn-primary" ><i class="fa fa-comment "></i></button> - Inserir Observação
				</div>
				<div class="col-lg-3">
			   		<button class="btn btn-primary" > <i class="fa fa-edit "></i></button> - Editar Cliente
				</div>
				<div class="col-lg-3">
					<button class="btn btn-primary" > <i class="fa fa-retweet "></i></button> - Trocar Produto e Forma de Pagamento
				</div>
				<div class="col-lg-3">
			   		<button class="btn btn-primary" ><i class="glyphicon glyphicon-magnet"></i></button> - Gerar Protocolo
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3">
			  		<button class="btn btn-primary" ><i class="fa fa-calendar-plus-o"></i></button> - Tela de Agendamento
							
				</div>
				<div class="col-lg-3">
					<button class="btn btn-primary" ><i class="fa fa-question"></i></button> - Dúvida 

				</div>
				<div class="col-lg-3">
					<a class="btn btn-danger"><i class="fa fa-close"></i></a> - Fechar				
				</div>
			</div>';
                break;
            case '2':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Trocar Produto e Forma de Pagamento</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						Nesse modal será possível fazer a alteração do produto do cliente e também da forma de pagamento do mesmo:
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/troca/trocapagamento.jpg" width="90%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						Para efetuar a alteração do produto o usuário deverá selecionar o certificado desejado no campo abaixo:		
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/troca/trocaproduto.jpg" width="90%">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						Para alterar a forma de pagamento o usuário deverá selecionar um dos campos abiaxo:
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/troca/trocafpag.jpg" width="90%">
					</div>
				</div>';
                break;
            case '3':
                echo '<div class="row">
				<div class="col-lg-12">
					<h4>Modal Inserir Observação</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					Inserir observação apresenta uma caixa texto que permite o usuário digitar a observação que pretende um botão de salvar no rodapé do modal.
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<img src="img/manual_certificado/detalhar/obs.jpg" width="90%">
				</div>
			</div>';
                break;

            case '4':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Editar Certificado mostra a seguinte tela:</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_certificado/tela.jpg" width="90%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						No primeiro bloco é possível visualizar os dados do cliente como mostrado abaixo:	
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_certificado/dadosCliente.jpg" width="60%">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						Caso haja qualquer erro no cadastro do cliente, usuário poderá editar o cliente clicando na opção <img src="img/manual_certificado/edt_certificado/btnedtcli.jpg">,mostrada na imagem a cima, onde abrirá o modal Editar Cliente que será apresentado mais adiante.<br/>

						No bloco do formulário é possível editar as informações referentes ao certificado:<br/>
						Localidade: 

					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_certificado/local.jpg" width="60%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						Trocar Produto: 
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_certificado/tipocertificado.jpg" width="60%">
					</div>
				</div>?
				<div class="row">
					<div class="col-lg-12"> Visualizar Valor do Certificado:</div>	
				</div>
				<div class="row">
					<div class="col-lg-6">Inserir desconto</div>
					<div class="col-lg-6">Inserir Motivo da alteração</div>
				</div>
				<div class="row">
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_certificado/descmotivo.jpg">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						Alterar Forma de Pagamento 

					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/troca/trocafpag.jpg">
					</div>
				</div>';
                break;
            case '5':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Editar Cliente:</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						Nesse modal é permitido fazer a edição dos dados cadastrais do cliente, como razão social, CNPJ, Nome, Cep, etc::	
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_cliente/tela.jpg" width="90%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						O Modal é dividido em dois quadros o primeiro para alteração de dados cadastrais da empresa:	
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_cliente/bloco1.jpg" width="90%">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						No segundo bloco os dados cadastrais do responsável pela empresa:
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/edt_cliente/bloco2.jpg" width="90%">
					</div>
				</div>';
                break;
            case '6':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Visualizar Protocolo:</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						O modal a seguir mostra os  dados do protocolo:	
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/visualizar/tela.jpg" width="90%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						Primeiro Quadro mostra os dados empresárias do cliente	
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/visualizar/dadosEmpresariais.jpg" width="90%">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						O segundo Quadro mostra os dados pessoais do responsável: :
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/visualizar/dadosPessoais.jpg" width="90%">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						O terceiro quadro mostra um resumo sobre a movimentação do cliente no sistema:
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/visualizar/resumo.jpg" width="90%">
					</div>
				</div>';
                break;
            case '7':
                echo '<div class="row">
						<div class="col-lg-12">
							<h4>Modal Gerar Recibo:</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<img src="img/manual_certificado/recibo/recibo.jpg" width="90%">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							Modal gerar recibo mostra uma página com os dados da compra para emissão do Recibo:	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<img src="img/manual_certificado/recibo/indentificacao.jpg" width="90%">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							Abaixo mostra o modelo do recibo já com os dados do cliente preenchidos:
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<img src="img/manual_certificado/recibo/pre_visualizacao.jpg" width="90%">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							E o botão Imprimir Recibo em seu rodapé:
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<img src="img/manual_certificado/recibo/btnimprimir.jpg" width="40%">
						</div>
					</div>';
                break;
            case '8':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Apagar Certificado: :</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						Modal Apagar Certificado mostra uma tela simples, solicitando o motivo da exclusão, e com botão de confirmação da operação como mostrado na imagem a seguir:
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/modais/apagarcertificado.jpg" width="90%">
					</div>
				</div>';
                break;

            case '9':
                echo '<div class="row">
				<div class="col-lg-12">
					<h4>Modal Revogar Certificado</h4>
				</div>
			</div>


			<div class="row">
				<div class="col-lg-12">
					Modal Revogar Certificado mostra uma tela simples, solicitando o motivo da revogação do certificado, e com botão de confirmação da operação como mostrado na imagem a seguir:
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<img src="img/manual_certificado/modais/revogar.jpg" width="90%">
				</div>
			</div>';
                break;
            case '10':
                echo '<div class="row">
					<div class="col-lg-12">
						<h4>Modal Gerar Boleto</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						No modal a seguir aparece apenas uma tela de confirmação da operação
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<img src="img/manual_certificado/modais/gerarboleto.jpg" width="90%">
					</div>
				</div>';
                break;
            case '11':
                echo '<div class="row">
						<div class="col-lg-12">
							<h4>Modal Desconto</h4>
						</div>
					</div>


					<div class="row">
						<div class="col-lg-12">
							Modal Inserir Desconto mostra uma tela simples, solicitando o motivo do desconto, o valor do desconto em percentagem e com botão de confirmação da operação como mostrado na imagem a seguir:	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<img src="img/manual_certificado/modais/insdesc.jpg" width="90%">
						</div>
					</div>';
                break;
        }
        break;
    case 'contador':

        break;
    case 'crm':

        break;
    case '':

        break;
    case 'contador':

        break;
    case 'contador':

        break;
    case 'contador':

        break;
}
?>