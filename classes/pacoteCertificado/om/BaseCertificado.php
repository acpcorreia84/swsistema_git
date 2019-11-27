<?php

/**
 * Base class that represents a row from the 'certificado' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificado extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CertificadoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the produto_id field.
	 * @var        int
	 */
	protected $produto_id;

	/**
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the forma_pagamento_id field.
	 * @var        int
	 */
	protected $forma_pagamento_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the funcionario_validou_id field.
	 * @var        int
	 */
	protected $funcionario_validou_id;

	/**
	 * The value for the usuario_validou_id field.
	 * @var        int
	 */
	protected $usuario_validou_id;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * The value for the contador_id field.
	 * @var        int
	 */
	protected $contador_id;

	/**
	 * The value for the autorizado_venda_sem_contador field.
	 * @var        int
	 */
	protected $autorizado_venda_sem_contador;

	/**
	 * The value for the codigo_documento field.
	 * @var        string
	 */
	protected $codigo_documento;

	/**
	 * The value for the protocolo field.
	 * @var        int
	 */
	protected $protocolo;

	/**
	 * The value for the voucher field.
	 * @var        string
	 */
	protected $voucher;

	/**
	 * The value for the desconto field.
	 * @var        double
	 */
	protected $desconto;

	/**
	 * The value for the motivo_desconto field.
	 * @var        string
	 */
	protected $motivo_desconto;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the data_compra field.
	 * @var        string
	 */
	protected $data_compra;

	/**
	 * The value for the data_ultima_validacao field.
	 * @var        string
	 */
	protected $data_ultima_validacao;

	/**
	 * The value for the data_pagamento field.
	 * @var        string
	 */
	protected $data_pagamento;

	/**
	 * The value for the data_validacao field.
	 * @var        string
	 */
	protected $data_validacao;

	/**
	 * The value for the data_confirmacao_pagamento field.
	 * @var        string
	 */
	protected $data_confirmacao_pagamento;

	/**
	 * The value for the data_revogacao field.
	 * @var        string
	 */
	protected $data_revogacao;

	/**
	 * The value for the data_inicio_validade field.
	 * @var        string
	 */
	protected $data_inicio_validade;

	/**
	 * The value for the data_fim_validade field.
	 * @var        string
	 */
	protected $data_fim_validade;

	/**
	 * The value for the data_sincronizacao_ac field.
	 * @var        string
	 */
	protected $data_sincronizacao_ac;

	/**
	 * The value for the confirmacao_validacao field.
	 * @var        int
	 */
	protected $confirmacao_validacao;

	/**
	 * The value for the certificado_renovado field.
	 * @var        int
	 */
	protected $certificado_renovado;

	/**
	 * The value for the apagado field.
	 * @var        int
	 */
	protected $apagado;

	/**
	 * The value for the parceiro_id field.
	 * @var        int
	 */
	protected $parceiro_id;

	/**
	 * The value for the status_followup field.
	 * @var        int
	 */
	protected $status_followup;

	/**
	 * @var        Situacao
	 */
	protected $aSituacao;

	/**
	 * @var        Parceiro
	 */
	protected $aParceiro;

	/**
	 * @var        Contador
	 */
	protected $aContador;

	/**
	 * @var        Local
	 */
	protected $aLocal;

	/**
	 * @var        FormaPagamento
	 */
	protected $aFormaPagamento;

	/**
	 * @var        Produto
	 */
	protected $aProduto;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioValidouId;

	/**
	 * @var        Certificado
	 */
	protected $aCertificadoRelatedByCertificadoRenovado;

	/**
	 * @var        array Agendamento[] Collection to store aggregation of Agendamento objects.
	 */
	protected $collAgendamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAgendamentos.
	 */
	private $lastAgendamentoCriteria = null;

	/**
	 * @var        array CertificadoSituacao[] Collection to store aggregation of CertificadoSituacao objects.
	 */
	protected $collCertificadoSituacaos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoSituacaos.
	 */
	private $lastCertificadoSituacaoCriteria = null;

	/**
	 * @var        array CuponsDescontoCertificado[] Collection to store aggregation of CuponsDescontoCertificado objects.
	 */
	protected $collCuponsDescontoCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCuponsDescontoCertificados.
	 */
	private $lastCuponsDescontoCertificadoCriteria = null;

	/**
	 * @var        array CertificadoCupom[] Collection to store aggregation of CertificadoCupom objects.
	 */
	protected $collCertificadoCupoms;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoCupoms.
	 */
	private $lastCertificadoCupomCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificadosRelatedByCertificadoRenovado;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadosRelatedByCertificadoRenovado.
	 */
	private $lastCertificadoRelatedByCertificadoRenovadoCriteria = null;

	/**
	 * @var        array CertificadoPagamento[] Collection to store aggregation of CertificadoPagamento objects.
	 */
	protected $collCertificadoPagamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoPagamentos.
	 */
	private $lastCertificadoPagamentoCriteria = null;

	/**
	 * @var        array Boleto[] Collection to store aggregation of Boleto objects.
	 */
	protected $collBoletos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collBoletos.
	 */
	private $lastBoletoCriteria = null;

	/**
	 * @var        array Recibo[] Collection to store aggregation of Recibo objects.
	 */
	protected $collRecibos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collRecibos.
	 */
	private $lastReciboCriteria = null;

	/**
	 * @var        array ItemPedido[] Collection to store aggregation of ItemPedido objects.
	 */
	protected $collItemPedidos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collItemPedidos.
	 */
	private $lastItemPedidoCriteria = null;

	/**
	 * @var        array ContasReceber[] Collection to store aggregation of ContasReceber objects.
	 */
	protected $collContasRecebers;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasRecebers.
	 */
	private $lastContasReceberCriteria = null;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspects;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspects.
	 */
	private $lastProspectCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [produto_id] column value.
	 * 
	 * @return     int
	 */
	public function getProdutoId()
	{
		return $this->produto_id;
	}

	/**
	 * Get the [cliente_id] column value.
	 * 
	 * @return     int
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
	}

	/**
	 * Get the [forma_pagamento_id] column value.
	 * 
	 * @return     int
	 */
	public function getFormaPagamentoId()
	{
		return $this->forma_pagamento_id;
	}

	/**
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [funcionario_validou_id] column value.
	 * 
	 * @return     int
	 */
	public function getFuncionarioValidouId()
	{
		return $this->funcionario_validou_id;
	}

	/**
	 * Get the [usuario_validou_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioValidouId()
	{
		return $this->usuario_validou_id;
	}

	/**
	 * Get the [local_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalId()
	{
		return $this->local_id;
	}

	/**
	 * Get the [contador_id] column value.
	 * 
	 * @return     int
	 */
	public function getContadorId()
	{
		return $this->contador_id;
	}

	/**
	 * Get the [autorizado_venda_sem_contador] column value.
	 * 
	 * @return     int
	 */
	public function getAutorizadoVendaSemContador()
	{
		return $this->autorizado_venda_sem_contador;
	}

	/**
	 * Get the [codigo_documento] column value.
	 * 
	 * @return     string
	 */
	public function getCodigoDocumento()
	{
		return $this->codigo_documento;
	}

	/**
	 * Get the [protocolo] column value.
	 * 
	 * @return     int
	 */
	public function getProtocolo()
	{
		return $this->protocolo;
	}

	/**
	 * Get the [voucher] column value.
	 * 
	 * @return     string
	 */
	public function getVoucher()
	{
		return $this->voucher;
	}

	/**
	 * Get the [desconto] column value.
	 * 
	 * @return     double
	 */
	public function getDesconto()
	{
		return $this->desconto;
	}

	/**
	 * Get the [motivo_desconto] column value.
	 * 
	 * @return     string
	 */
	public function getMotivoDesconto()
	{
		return $this->motivo_desconto;
	}

	/**
	 * Get the [observacao] column value.
	 * 
	 * @return     string
	 */
	public function getObservacao()
	{
		return $this->observacao;
	}

	/**
	 * Get the [optionally formatted] temporal [data_compra] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCompra($format = 'Y-m-d H:i:s')
	{
		if ($this->data_compra === null) {
			return null;
		}


		if ($this->data_compra === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_compra);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_compra, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_ultima_validacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataUltimaValidacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_ultima_validacao === null) {
			return null;
		}


		if ($this->data_ultima_validacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_ultima_validacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_ultima_validacao, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPagamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_pagamento === null) {
			return null;
		}


		if ($this->data_pagamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_pagamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_pagamento, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_validacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataValidacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_validacao === null) {
			return null;
		}


		if ($this->data_validacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_validacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_validacao, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_confirmacao_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataConfirmacaoPagamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_confirmacao_pagamento === null) {
			return null;
		}


		if ($this->data_confirmacao_pagamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_confirmacao_pagamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_confirmacao_pagamento, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_revogacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataRevogacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_revogacao === null) {
			return null;
		}


		if ($this->data_revogacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_revogacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_revogacao, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_inicio_validade] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataInicioValidade($format = 'Y-m-d H:i:s')
	{
		if ($this->data_inicio_validade === null) {
			return null;
		}


		if ($this->data_inicio_validade === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_inicio_validade);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_inicio_validade, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_fim_validade] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataFimValidade($format = 'Y-m-d H:i:s')
	{
		if ($this->data_fim_validade === null) {
			return null;
		}


		if ($this->data_fim_validade === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_fim_validade);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_fim_validade, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [data_sincronizacao_ac] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataSincronizacaoAc($format = 'Y-m-d H:i:s')
	{
		if ($this->data_sincronizacao_ac === null) {
			return null;
		}


		if ($this->data_sincronizacao_ac === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_sincronizacao_ac);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_sincronizacao_ac, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [confirmacao_validacao] column value.
	 * 
	 * @return     int
	 */
	public function getConfirmacaoValidacao()
	{
		return $this->confirmacao_validacao;
	}

	/**
	 * Get the [certificado_renovado] column value.
	 * 
	 * @return     int
	 */
	public function getCertificadoRenovado()
	{
		return $this->certificado_renovado;
	}

	/**
	 * Get the [apagado] column value.
	 * 
	 * @return     int
	 */
	public function getApagado()
	{
		return $this->apagado;
	}

	/**
	 * Get the [parceiro_id] column value.
	 * 
	 * @return     int
	 */
	public function getParceiroId()
	{
		return $this->parceiro_id;
	}

	/**
	 * Get the [status_followup] column value.
	 * 
	 * @return     int
	 */
	public function getStatusFollowup()
	{
		return $this->status_followup;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CertificadoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [produto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setProdutoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->produto_id !== $v) {
			$this->produto_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::PRODUTO_ID;
		}

		if ($this->aProduto !== null && $this->aProduto->getId() !== $v) {
			$this->aProduto = null;
		}

		return $this;
	} // setProdutoId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [forma_pagamento_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setFormaPagamentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->forma_pagamento_id !== $v) {
			$this->forma_pagamento_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::FORMA_PAGAMENTO_ID;
		}

		if ($this->aFormaPagamento !== null && $this->aFormaPagamento->getId() !== $v) {
			$this->aFormaPagamento = null;
		}

		return $this;
	} // setFormaPagamentoId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::USUARIO_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->aUsuarioRelatedByUsuarioId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [funcionario_validou_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setFuncionarioValidouId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->funcionario_validou_id !== $v) {
			$this->funcionario_validou_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::FUNCIONARIO_VALIDOU_ID;
		}

		return $this;
	} // setFuncionarioValidouId()

	/**
	 * Set the value of [usuario_validou_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setUsuarioValidouId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_validou_id !== $v) {
			$this->usuario_validou_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::USUARIO_VALIDOU_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioValidouId !== null && $this->aUsuarioRelatedByUsuarioValidouId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioValidouId = null;
		}

		return $this;
	} // setUsuarioValidouId()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [contador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setContadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contador_id !== $v) {
			$this->contador_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::CONTADOR_ID;
		}

		if ($this->aContador !== null && $this->aContador->getId() !== $v) {
			$this->aContador = null;
		}

		return $this;
	} // setContadorId()

	/**
	 * Set the value of [autorizado_venda_sem_contador] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setAutorizadoVendaSemContador($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->autorizado_venda_sem_contador !== $v) {
			$this->autorizado_venda_sem_contador = $v;
			$this->modifiedColumns[] = CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR;
		}

		return $this;
	} // setAutorizadoVendaSemContador()

	/**
	 * Set the value of [codigo_documento] column.
	 * 
	 * @param      string $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setCodigoDocumento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo_documento !== $v) {
			$this->codigo_documento = $v;
			$this->modifiedColumns[] = CertificadoPeer::CODIGO_DOCUMENTO;
		}

		return $this;
	} // setCodigoDocumento()

	/**
	 * Set the value of [protocolo] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setProtocolo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->protocolo !== $v) {
			$this->protocolo = $v;
			$this->modifiedColumns[] = CertificadoPeer::PROTOCOLO;
		}

		return $this;
	} // setProtocolo()

	/**
	 * Set the value of [voucher] column.
	 * 
	 * @param      string $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setVoucher($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->voucher !== $v) {
			$this->voucher = $v;
			$this->modifiedColumns[] = CertificadoPeer::VOUCHER;
		}

		return $this;
	} // setVoucher()

	/**
	 * Set the value of [desconto] column.
	 * 
	 * @param      double $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDesconto($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->desconto !== $v) {
			$this->desconto = $v;
			$this->modifiedColumns[] = CertificadoPeer::DESCONTO;
		}

		return $this;
	} // setDesconto()

	/**
	 * Set the value of [motivo_desconto] column.
	 * 
	 * @param      string $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setMotivoDesconto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->motivo_desconto !== $v) {
			$this->motivo_desconto = $v;
			$this->modifiedColumns[] = CertificadoPeer::MOTIVO_DESCONTO;
		}

		return $this;
	} // setMotivoDesconto()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = CertificadoPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Sets the value of [data_compra] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataCompra($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_compra !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_compra !== null && $tmpDt = new DateTime($this->data_compra)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_compra = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_COMPRA;
			}
		} // if either are not null

		return $this;
	} // setDataCompra()

	/**
	 * Sets the value of [data_ultima_validacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataUltimaValidacao($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_ultima_validacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_ultima_validacao !== null && $tmpDt = new DateTime($this->data_ultima_validacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_ultima_validacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_ULTIMA_VALIDACAO;
			}
		} // if either are not null

		return $this;
	} // setDataUltimaValidacao()

	/**
	 * Sets the value of [data_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataPagamento($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_pagamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_pagamento !== null && $tmpDt = new DateTime($this->data_pagamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_pagamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataPagamento()

	/**
	 * Sets the value of [data_validacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataValidacao($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_validacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_validacao !== null && $tmpDt = new DateTime($this->data_validacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_validacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_VALIDACAO;
			}
		} // if either are not null

		return $this;
	} // setDataValidacao()

	/**
	 * Sets the value of [data_confirmacao_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataConfirmacaoPagamento($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_confirmacao_pagamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_confirmacao_pagamento !== null && $tmpDt = new DateTime($this->data_confirmacao_pagamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_confirmacao_pagamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataConfirmacaoPagamento()

	/**
	 * Sets the value of [data_revogacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataRevogacao($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_revogacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_revogacao !== null && $tmpDt = new DateTime($this->data_revogacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_revogacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_REVOGACAO;
			}
		} // if either are not null

		return $this;
	} // setDataRevogacao()

	/**
	 * Sets the value of [data_inicio_validade] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataInicioValidade($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_inicio_validade !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_inicio_validade !== null && $tmpDt = new DateTime($this->data_inicio_validade)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_inicio_validade = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_INICIO_VALIDADE;
			}
		} // if either are not null

		return $this;
	} // setDataInicioValidade()

	/**
	 * Sets the value of [data_fim_validade] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataFimValidade($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_fim_validade !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_fim_validade !== null && $tmpDt = new DateTime($this->data_fim_validade)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_fim_validade = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_FIM_VALIDADE;
			}
		} // if either are not null

		return $this;
	} // setDataFimValidade()

	/**
	 * Sets the value of [data_sincronizacao_ac] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setDataSincronizacaoAc($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_sincronizacao_ac !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_sincronizacao_ac !== null && $tmpDt = new DateTime($this->data_sincronizacao_ac)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_sincronizacao_ac = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoPeer::DATA_SINCRONIZACAO_AC;
			}
		} // if either are not null

		return $this;
	} // setDataSincronizacaoAc()

	/**
	 * Set the value of [confirmacao_validacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setConfirmacaoValidacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->confirmacao_validacao !== $v) {
			$this->confirmacao_validacao = $v;
			$this->modifiedColumns[] = CertificadoPeer::CONFIRMACAO_VALIDACAO;
		}

		return $this;
	} // setConfirmacaoValidacao()

	/**
	 * Set the value of [certificado_renovado] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setCertificadoRenovado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_renovado !== $v) {
			$this->certificado_renovado = $v;
			$this->modifiedColumns[] = CertificadoPeer::CERTIFICADO_RENOVADO;
		}

		if ($this->aCertificadoRelatedByCertificadoRenovado !== null && $this->aCertificadoRelatedByCertificadoRenovado->getId() !== $v) {
			$this->aCertificadoRelatedByCertificadoRenovado = null;
		}

		return $this;
	} // setCertificadoRenovado()

	/**
	 * Set the value of [apagado] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setApagado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->apagado !== $v) {
			$this->apagado = $v;
			$this->modifiedColumns[] = CertificadoPeer::APAGADO;
		}

		return $this;
	} // setApagado()

	/**
	 * Set the value of [parceiro_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setParceiroId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_id !== $v) {
			$this->parceiro_id = $v;
			$this->modifiedColumns[] = CertificadoPeer::PARCEIRO_ID;
		}

		if ($this->aParceiro !== null && $this->aParceiro->getId() !== $v) {
			$this->aParceiro = null;
		}

		return $this;
	} // setParceiroId()

	/**
	 * Set the value of [status_followup] column.
	 * 
	 * @param      int $v new value
	 * @return     Certificado The current object (for fluent API support)
	 */
	public function setStatusFollowup($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status_followup !== $v) {
			$this->status_followup = $v;
			$this->modifiedColumns[] = CertificadoPeer::STATUS_FOLLOWUP;
		}

		if ($this->aSituacao !== null && $this->aSituacao->getId() !== $v) {
			$this->aSituacao = null;
		}

		return $this;
	} // setStatusFollowup()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->produto_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->cliente_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->forma_pagamento_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->usuario_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->funcionario_validou_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->usuario_validou_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->local_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->contador_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->autorizado_venda_sem_contador = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->codigo_documento = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->protocolo = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->voucher = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->desconto = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
			$this->motivo_desconto = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->observacao = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->data_compra = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->data_ultima_validacao = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->data_pagamento = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->data_validacao = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->data_confirmacao_pagamento = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->data_revogacao = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->data_inicio_validade = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->data_fim_validade = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->data_sincronizacao_ac = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->confirmacao_validacao = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->certificado_renovado = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
			$this->apagado = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->parceiro_id = ($row[$startcol + 28] !== null) ? (int) $row[$startcol + 28] : null;
			$this->status_followup = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 30; // 30 = CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Certificado object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aProduto !== null && $this->produto_id !== $this->aProduto->getId()) {
			$this->aProduto = null;
		}
		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
		}
		if ($this->aFormaPagamento !== null && $this->forma_pagamento_id !== $this->aFormaPagamento->getId()) {
			$this->aFormaPagamento = null;
		}
		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->usuario_id !== $this->aUsuarioRelatedByUsuarioId->getId()) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}
		if ($this->aUsuarioRelatedByUsuarioValidouId !== null && $this->usuario_validou_id !== $this->aUsuarioRelatedByUsuarioValidouId->getId()) {
			$this->aUsuarioRelatedByUsuarioValidouId = null;
		}
		if ($this->aLocal !== null && $this->local_id !== $this->aLocal->getId()) {
			$this->aLocal = null;
		}
		if ($this->aContador !== null && $this->contador_id !== $this->aContador->getId()) {
			$this->aContador = null;
		}
		if ($this->aCertificadoRelatedByCertificadoRenovado !== null && $this->certificado_renovado !== $this->aCertificadoRelatedByCertificadoRenovado->getId()) {
			$this->aCertificadoRelatedByCertificadoRenovado = null;
		}
		if ($this->aParceiro !== null && $this->parceiro_id !== $this->aParceiro->getId()) {
			$this->aParceiro = null;
		}
		if ($this->aSituacao !== null && $this->status_followup !== $this->aSituacao->getId()) {
			$this->aSituacao = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CertificadoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSituacao = null;
			$this->aParceiro = null;
			$this->aContador = null;
			$this->aLocal = null;
			$this->aFormaPagamento = null;
			$this->aProduto = null;
			$this->aCliente = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aUsuarioRelatedByUsuarioValidouId = null;
			$this->aCertificadoRelatedByCertificadoRenovado = null;
			$this->collAgendamentos = null;
			$this->lastAgendamentoCriteria = null;

			$this->collCertificadoSituacaos = null;
			$this->lastCertificadoSituacaoCriteria = null;

			$this->collCuponsDescontoCertificados = null;
			$this->lastCuponsDescontoCertificadoCriteria = null;

			$this->collCertificadoCupoms = null;
			$this->lastCertificadoCupomCriteria = null;

			$this->collCertificadosRelatedByCertificadoRenovado = null;
			$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = null;

			$this->collCertificadoPagamentos = null;
			$this->lastCertificadoPagamentoCriteria = null;

			$this->collBoletos = null;
			$this->lastBoletoCriteria = null;

			$this->collRecibos = null;
			$this->lastReciboCriteria = null;

			$this->collItemPedidos = null;
			$this->lastItemPedidoCriteria = null;

			$this->collContasRecebers = null;
			$this->lastContasReceberCriteria = null;

			$this->collProspects = null;
			$this->lastProspectCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CertificadoPeer::doDelete($this, $con);
				$this->postDelete($con);
				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				CertificadoPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSituacao !== null) {
				if ($this->aSituacao->isModified() || $this->aSituacao->isNew()) {
					$affectedRows += $this->aSituacao->save($con);
				}
				$this->setSituacao($this->aSituacao);
			}

			if ($this->aParceiro !== null) {
				if ($this->aParceiro->isModified() || $this->aParceiro->isNew()) {
					$affectedRows += $this->aParceiro->save($con);
				}
				$this->setParceiro($this->aParceiro);
			}

			if ($this->aContador !== null) {
				if ($this->aContador->isModified() || $this->aContador->isNew()) {
					$affectedRows += $this->aContador->save($con);
				}
				$this->setContador($this->aContador);
			}

			if ($this->aLocal !== null) {
				if ($this->aLocal->isModified() || $this->aLocal->isNew()) {
					$affectedRows += $this->aLocal->save($con);
				}
				$this->setLocal($this->aLocal);
			}

			if ($this->aFormaPagamento !== null) {
				if ($this->aFormaPagamento->isModified() || $this->aFormaPagamento->isNew()) {
					$affectedRows += $this->aFormaPagamento->save($con);
				}
				$this->setFormaPagamento($this->aFormaPagamento);
			}

			if ($this->aProduto !== null) {
				if ($this->aProduto->isModified() || $this->aProduto->isNew()) {
					$affectedRows += $this->aProduto->save($con);
				}
				$this->setProduto($this->aProduto);
			}

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if ($this->aUsuarioRelatedByUsuarioId->isModified() || $this->aUsuarioRelatedByUsuarioId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioId($this->aUsuarioRelatedByUsuarioId);
			}

			if ($this->aUsuarioRelatedByUsuarioValidouId !== null) {
				if ($this->aUsuarioRelatedByUsuarioValidouId->isModified() || $this->aUsuarioRelatedByUsuarioValidouId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioValidouId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioValidouId($this->aUsuarioRelatedByUsuarioValidouId);
			}

			if ($this->aCertificadoRelatedByCertificadoRenovado !== null) {
				if ($this->aCertificadoRelatedByCertificadoRenovado->isModified() || $this->aCertificadoRelatedByCertificadoRenovado->isNew()) {
					$affectedRows += $this->aCertificadoRelatedByCertificadoRenovado->save($con);
				}
				$this->setCertificadoRelatedByCertificadoRenovado($this->aCertificadoRelatedByCertificadoRenovado);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CertificadoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CertificadoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CertificadoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAgendamentos !== null) {
				foreach ($this->collAgendamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadoSituacaos !== null) {
				foreach ($this->collCertificadoSituacaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuponsDescontoCertificados !== null) {
				foreach ($this->collCuponsDescontoCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadoCupoms !== null) {
				foreach ($this->collCertificadoCupoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadosRelatedByCertificadoRenovado !== null) {
				foreach ($this->collCertificadosRelatedByCertificadoRenovado as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadoPagamentos !== null) {
				foreach ($this->collCertificadoPagamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletos !== null) {
				foreach ($this->collBoletos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecibos !== null) {
				foreach ($this->collRecibos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collItemPedidos !== null) {
				foreach ($this->collItemPedidos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContasRecebers !== null) {
				foreach ($this->collContasRecebers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspects !== null) {
				foreach ($this->collProspects as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSituacao !== null) {
				if (!$this->aSituacao->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSituacao->getValidationFailures());
				}
			}

			if ($this->aParceiro !== null) {
				if (!$this->aParceiro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aParceiro->getValidationFailures());
				}
			}

			if ($this->aContador !== null) {
				if (!$this->aContador->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContador->getValidationFailures());
				}
			}

			if ($this->aLocal !== null) {
				if (!$this->aLocal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocal->getValidationFailures());
				}
			}

			if ($this->aFormaPagamento !== null) {
				if (!$this->aFormaPagamento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFormaPagamento->getValidationFailures());
				}
			}

			if ($this->aProduto !== null) {
				if (!$this->aProduto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProduto->getValidationFailures());
				}
			}

			if ($this->aCliente !== null) {
				if (!$this->aCliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCliente->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if (!$this->aUsuarioRelatedByUsuarioId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUsuarioId->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUsuarioValidouId !== null) {
				if (!$this->aUsuarioRelatedByUsuarioValidouId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUsuarioValidouId->getValidationFailures());
				}
			}

			if ($this->aCertificadoRelatedByCertificadoRenovado !== null) {
				if (!$this->aCertificadoRelatedByCertificadoRenovado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificadoRelatedByCertificadoRenovado->getValidationFailures());
				}
			}


			if (($retval = CertificadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAgendamentos !== null) {
					foreach ($this->collAgendamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadoSituacaos !== null) {
					foreach ($this->collCertificadoSituacaos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuponsDescontoCertificados !== null) {
					foreach ($this->collCuponsDescontoCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadoCupoms !== null) {
					foreach ($this->collCertificadoCupoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadosRelatedByCertificadoRenovado !== null) {
					foreach ($this->collCertificadosRelatedByCertificadoRenovado as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadoPagamentos !== null) {
					foreach ($this->collCertificadoPagamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletos !== null) {
					foreach ($this->collBoletos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecibos !== null) {
					foreach ($this->collRecibos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collItemPedidos !== null) {
					foreach ($this->collItemPedidos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContasRecebers !== null) {
					foreach ($this->collContasRecebers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspects !== null) {
					foreach ($this->collProspects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CertificadoPeer::ID)) $criteria->add(CertificadoPeer::ID, $this->id);
		if ($this->isColumnModified(CertificadoPeer::PRODUTO_ID)) $criteria->add(CertificadoPeer::PRODUTO_ID, $this->produto_id);
		if ($this->isColumnModified(CertificadoPeer::CLIENTE_ID)) $criteria->add(CertificadoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(CertificadoPeer::FORMA_PAGAMENTO_ID)) $criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->forma_pagamento_id);
		if ($this->isColumnModified(CertificadoPeer::USUARIO_ID)) $criteria->add(CertificadoPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(CertificadoPeer::FUNCIONARIO_VALIDOU_ID)) $criteria->add(CertificadoPeer::FUNCIONARIO_VALIDOU_ID, $this->funcionario_validou_id);
		if ($this->isColumnModified(CertificadoPeer::USUARIO_VALIDOU_ID)) $criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->usuario_validou_id);
		if ($this->isColumnModified(CertificadoPeer::LOCAL_ID)) $criteria->add(CertificadoPeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(CertificadoPeer::CONTADOR_ID)) $criteria->add(CertificadoPeer::CONTADOR_ID, $this->contador_id);
		if ($this->isColumnModified(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR)) $criteria->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR, $this->autorizado_venda_sem_contador);
		if ($this->isColumnModified(CertificadoPeer::CODIGO_DOCUMENTO)) $criteria->add(CertificadoPeer::CODIGO_DOCUMENTO, $this->codigo_documento);
		if ($this->isColumnModified(CertificadoPeer::PROTOCOLO)) $criteria->add(CertificadoPeer::PROTOCOLO, $this->protocolo);
		if ($this->isColumnModified(CertificadoPeer::VOUCHER)) $criteria->add(CertificadoPeer::VOUCHER, $this->voucher);
		if ($this->isColumnModified(CertificadoPeer::DESCONTO)) $criteria->add(CertificadoPeer::DESCONTO, $this->desconto);
		if ($this->isColumnModified(CertificadoPeer::MOTIVO_DESCONTO)) $criteria->add(CertificadoPeer::MOTIVO_DESCONTO, $this->motivo_desconto);
		if ($this->isColumnModified(CertificadoPeer::OBSERVACAO)) $criteria->add(CertificadoPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(CertificadoPeer::DATA_COMPRA)) $criteria->add(CertificadoPeer::DATA_COMPRA, $this->data_compra);
		if ($this->isColumnModified(CertificadoPeer::DATA_ULTIMA_VALIDACAO)) $criteria->add(CertificadoPeer::DATA_ULTIMA_VALIDACAO, $this->data_ultima_validacao);
		if ($this->isColumnModified(CertificadoPeer::DATA_PAGAMENTO)) $criteria->add(CertificadoPeer::DATA_PAGAMENTO, $this->data_pagamento);
		if ($this->isColumnModified(CertificadoPeer::DATA_VALIDACAO)) $criteria->add(CertificadoPeer::DATA_VALIDACAO, $this->data_validacao);
		if ($this->isColumnModified(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO)) $criteria->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $this->data_confirmacao_pagamento);
		if ($this->isColumnModified(CertificadoPeer::DATA_REVOGACAO)) $criteria->add(CertificadoPeer::DATA_REVOGACAO, $this->data_revogacao);
		if ($this->isColumnModified(CertificadoPeer::DATA_INICIO_VALIDADE)) $criteria->add(CertificadoPeer::DATA_INICIO_VALIDADE, $this->data_inicio_validade);
		if ($this->isColumnModified(CertificadoPeer::DATA_FIM_VALIDADE)) $criteria->add(CertificadoPeer::DATA_FIM_VALIDADE, $this->data_fim_validade);
		if ($this->isColumnModified(CertificadoPeer::DATA_SINCRONIZACAO_AC)) $criteria->add(CertificadoPeer::DATA_SINCRONIZACAO_AC, $this->data_sincronizacao_ac);
		if ($this->isColumnModified(CertificadoPeer::CONFIRMACAO_VALIDACAO)) $criteria->add(CertificadoPeer::CONFIRMACAO_VALIDACAO, $this->confirmacao_validacao);
		if ($this->isColumnModified(CertificadoPeer::CERTIFICADO_RENOVADO)) $criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->certificado_renovado);
		if ($this->isColumnModified(CertificadoPeer::APAGADO)) $criteria->add(CertificadoPeer::APAGADO, $this->apagado);
		if ($this->isColumnModified(CertificadoPeer::PARCEIRO_ID)) $criteria->add(CertificadoPeer::PARCEIRO_ID, $this->parceiro_id);
		if ($this->isColumnModified(CertificadoPeer::STATUS_FOLLOWUP)) $criteria->add(CertificadoPeer::STATUS_FOLLOWUP, $this->status_followup);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);

		$criteria->add(CertificadoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Certificado (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProdutoId($this->produto_id);

		$copyObj->setClienteId($this->cliente_id);

		$copyObj->setFormaPagamentoId($this->forma_pagamento_id);

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setFuncionarioValidouId($this->funcionario_validou_id);

		$copyObj->setUsuarioValidouId($this->usuario_validou_id);

		$copyObj->setLocalId($this->local_id);

		$copyObj->setContadorId($this->contador_id);

		$copyObj->setAutorizadoVendaSemContador($this->autorizado_venda_sem_contador);

		$copyObj->setCodigoDocumento($this->codigo_documento);

		$copyObj->setProtocolo($this->protocolo);

		$copyObj->setVoucher($this->voucher);

		$copyObj->setDesconto($this->desconto);

		$copyObj->setMotivoDesconto($this->motivo_desconto);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setDataCompra($this->data_compra);

		$copyObj->setDataUltimaValidacao($this->data_ultima_validacao);

		$copyObj->setDataPagamento($this->data_pagamento);

		$copyObj->setDataValidacao($this->data_validacao);

		$copyObj->setDataConfirmacaoPagamento($this->data_confirmacao_pagamento);

		$copyObj->setDataRevogacao($this->data_revogacao);

		$copyObj->setDataInicioValidade($this->data_inicio_validade);

		$copyObj->setDataFimValidade($this->data_fim_validade);

		$copyObj->setDataSincronizacaoAc($this->data_sincronizacao_ac);

		$copyObj->setConfirmacaoValidacao($this->confirmacao_validacao);

		$copyObj->setCertificadoRenovado($this->certificado_renovado);

		$copyObj->setApagado($this->apagado);

		$copyObj->setParceiroId($this->parceiro_id);

		$copyObj->setStatusFollowup($this->status_followup);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAgendamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAgendamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadoSituacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoSituacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCuponsDescontoCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCuponsDescontoCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadoCupoms() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoCupom($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadosRelatedByCertificadoRenovado() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoRelatedByCertificadoRenovado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadoPagamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoPagamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBoleto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRecibos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRecibo($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getItemPedidos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addItemPedido($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasRecebers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasReceber($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspects() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspect($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Certificado Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     CertificadoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CertificadoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Situacao object.
	 *
	 * @param      Situacao $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSituacao(Situacao $v = null)
	{
		if ($v === null) {
			$this->setStatusFollowup(NULL);
		} else {
			$this->setStatusFollowup($v->getId());
		}

		$this->aSituacao = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Situacao object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Situacao object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Situacao The associated Situacao object.
	 * @throws     PropelException
	 */
	public function getSituacao(PropelPDO $con = null)
	{
		if ($this->aSituacao === null && ($this->status_followup !== null)) {
			$this->aSituacao = SituacaoPeer::retrieveByPk($this->status_followup);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSituacao->addCertificados($this);
			 */
		}
		return $this->aSituacao;
	}

	/**
	 * Declares an association between this object and a Parceiro object.
	 *
	 * @param      Parceiro $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setParceiro(Parceiro $v = null)
	{
		if ($v === null) {
			$this->setParceiroId(NULL);
		} else {
			$this->setParceiroId($v->getId());
		}

		$this->aParceiro = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Parceiro object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Parceiro object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Parceiro The associated Parceiro object.
	 * @throws     PropelException
	 */
	public function getParceiro(PropelPDO $con = null)
	{
		if ($this->aParceiro === null && ($this->parceiro_id !== null)) {
			$this->aParceiro = ParceiroPeer::retrieveByPk($this->parceiro_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aParceiro->addCertificados($this);
			 */
		}
		return $this->aParceiro;
	}

	/**
	 * Declares an association between this object and a Contador object.
	 *
	 * @param      Contador $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContador(Contador $v = null)
	{
		if ($v === null) {
			$this->setContadorId(NULL);
		} else {
			$this->setContadorId($v->getId());
		}

		$this->aContador = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Contador object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Contador object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Contador The associated Contador object.
	 * @throws     PropelException
	 */
	public function getContador(PropelPDO $con = null)
	{
		if ($this->aContador === null && ($this->contador_id !== null)) {
			$this->aContador = ContadorPeer::retrieveByPk($this->contador_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContador->addCertificados($this);
			 */
		}
		return $this->aContador;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLocal(Local $v = null)
	{
		if ($v === null) {
			$this->setLocalId(NULL);
		} else {
			$this->setLocalId($v->getId());
		}

		$this->aLocal = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Local object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Local object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Local The associated Local object.
	 * @throws     PropelException
	 */
	public function getLocal(PropelPDO $con = null)
	{
		if ($this->aLocal === null && ($this->local_id !== null)) {
			$this->aLocal = LocalPeer::retrieveByPk($this->local_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLocal->addCertificados($this);
			 */
		}
		return $this->aLocal;
	}

	/**
	 * Declares an association between this object and a FormaPagamento object.
	 *
	 * @param      FormaPagamento $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFormaPagamento(FormaPagamento $v = null)
	{
		if ($v === null) {
			$this->setFormaPagamentoId(NULL);
		} else {
			$this->setFormaPagamentoId($v->getId());
		}

		$this->aFormaPagamento = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the FormaPagamento object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated FormaPagamento object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     FormaPagamento The associated FormaPagamento object.
	 * @throws     PropelException
	 */
	public function getFormaPagamento(PropelPDO $con = null)
	{
		if ($this->aFormaPagamento === null && ($this->forma_pagamento_id !== null)) {
			$this->aFormaPagamento = FormaPagamentoPeer::retrieveByPk($this->forma_pagamento_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aFormaPagamento->addCertificados($this);
			 */
		}
		return $this->aFormaPagamento;
	}

	/**
	 * Declares an association between this object and a Produto object.
	 *
	 * @param      Produto $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProduto(Produto $v = null)
	{
		if ($v === null) {
			$this->setProdutoId(NULL);
		} else {
			$this->setProdutoId($v->getId());
		}

		$this->aProduto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Produto object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Produto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Produto The associated Produto object.
	 * @throws     PropelException
	 */
	public function getProduto(PropelPDO $con = null)
	{
		if ($this->aProduto === null && ($this->produto_id !== null)) {
			$this->aProduto = ProdutoPeer::retrieveByPk($this->produto_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProduto->addCertificados($this);
			 */
		}
		return $this->aProduto;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCliente(Cliente $v = null)
	{
		if ($v === null) {
			$this->setClienteId(NULL);
		} else {
			$this->setClienteId($v->getId());
		}

		$this->aCliente = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cliente object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cliente object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cliente The associated Cliente object.
	 * @throws     PropelException
	 */
	public function getCliente(PropelPDO $con = null)
	{
		if ($this->aCliente === null && ($this->cliente_id !== null)) {
			$this->aCliente = ClientePeer::retrieveByPk($this->cliente_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCliente->addCertificados($this);
			 */
		}
		return $this->aCliente;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByUsuarioId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioId(NULL);
		} else {
			$this->setUsuarioId($v->getId());
		}

		$this->aUsuarioRelatedByUsuarioId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoRelatedByUsuarioId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuarioRelatedByUsuarioId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByUsuarioId === null && ($this->usuario_id !== null)) {
			$this->aUsuarioRelatedByUsuarioId = UsuarioPeer::retrieveByPk($this->usuario_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuarioRelatedByUsuarioId->addCertificadosRelatedByUsuarioId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByUsuarioValidouId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioValidouId(NULL);
		} else {
			$this->setUsuarioValidouId($v->getId());
		}

		$this->aUsuarioRelatedByUsuarioValidouId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoRelatedByUsuarioValidouId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuarioRelatedByUsuarioValidouId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByUsuarioValidouId === null && ($this->usuario_validou_id !== null)) {
			$this->aUsuarioRelatedByUsuarioValidouId = UsuarioPeer::retrieveByPk($this->usuario_validou_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuarioRelatedByUsuarioValidouId->addCertificadosRelatedByUsuarioValidouId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioValidouId;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     Certificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCertificadoRelatedByCertificadoRenovado(Certificado $v = null)
	{
		if ($v === null) {
			$this->setCertificadoRenovado(NULL);
		} else {
			$this->setCertificadoRenovado($v->getId());
		}

		$this->aCertificadoRelatedByCertificadoRenovado = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Certificado object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoRelatedByCertificadoRenovado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Certificado object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Certificado The associated Certificado object.
	 * @throws     PropelException
	 */
	public function getCertificadoRelatedByCertificadoRenovado(PropelPDO $con = null)
	{
		if ($this->aCertificadoRelatedByCertificadoRenovado === null && ($this->certificado_renovado !== null)) {
			$this->aCertificadoRelatedByCertificadoRenovado = CertificadoPeer::retrieveByPk($this->certificado_renovado);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCertificadoRelatedByCertificadoRenovado->addCertificadosRelatedByCertificadoRenovado($this);
			 */
		}
		return $this->aCertificadoRelatedByCertificadoRenovado;
	}

	/**
	 * Clears out the collAgendamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAgendamentos()
	 */
	public function clearAgendamentos()
	{
		$this->collAgendamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAgendamentos collection (array).
	 *
	 * By default this just sets the collAgendamentos collection to an empty array (like clearcollAgendamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAgendamentos()
	{
		$this->collAgendamentos = array();
	}

	/**
	 * Gets an array of Agendamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related Agendamentos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Agendamento[]
	 * @throws     PropelException
	 */
	public function getAgendamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
			   $this->collAgendamentos = array();
			} else {

				$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

				AgendamentoPeer::addSelectColumns($criteria);
				$this->collAgendamentos = AgendamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

				AgendamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
					$this->collAgendamentos = AgendamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAgendamentoCriteria = $criteria;
		return $this->collAgendamentos;
	}

	/**
	 * Returns the number of related Agendamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Agendamento objects.
	 * @throws     PropelException
	 */
	public function countAgendamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

				$count = AgendamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
					$count = AgendamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collAgendamentos);
				}
			} else {
				$count = count($this->collAgendamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Agendamento object to this object
	 * through the Agendamento foreign key attribute.
	 *
	 * @param      Agendamento $l Agendamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAgendamento(Agendamento $l)
	{
		if ($this->collAgendamentos === null) {
			$this->initAgendamentos();
		}
		if (!in_array($l, $this->collAgendamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAgendamentos, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Agendamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getAgendamentosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
				$this->collAgendamentos = array();
			} else {

				$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

				$this->collAgendamentos = AgendamentoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AgendamentoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
				$this->collAgendamentos = AgendamentoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastAgendamentoCriteria = $criteria;

		return $this->collAgendamentos;
	}

	/**
	 * Clears out the collCertificadoSituacaos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadoSituacaos()
	 */
	public function clearCertificadoSituacaos()
	{
		$this->collCertificadoSituacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadoSituacaos collection (array).
	 *
	 * By default this just sets the collCertificadoSituacaos collection to an empty array (like clearcollCertificadoSituacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadoSituacaos()
	{
		$this->collCertificadoSituacaos = array();
	}

	/**
	 * Gets an array of CertificadoSituacao objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related CertificadoSituacaos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CertificadoSituacao[]
	 * @throws     PropelException
	 */
	public function getCertificadoSituacaos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
			   $this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				CertificadoSituacaoPeer::addSelectColumns($criteria);
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				CertificadoSituacaoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
					$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoSituacaoCriteria = $criteria;
		return $this->collCertificadoSituacaos;
	}

	/**
	 * Returns the number of related CertificadoSituacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CertificadoSituacao objects.
	 * @throws     PropelException
	 */
	public function countCertificadoSituacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				$count = CertificadoSituacaoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
					$count = CertificadoSituacaoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadoSituacaos);
				}
			} else {
				$count = count($this->collCertificadoSituacaos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CertificadoSituacao object to this object
	 * through the CertificadoSituacao foreign key attribute.
	 *
	 * @param      CertificadoSituacao $l CertificadoSituacao
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoSituacao(CertificadoSituacao $l)
	{
		if ($this->collCertificadoSituacaos === null) {
			$this->initCertificadoSituacaos();
		}
		if (!in_array($l, $this->collCertificadoSituacaos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadoSituacaos, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadoSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadoSituacaosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
				$this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoSituacaoCriteria = $criteria;

		return $this->collCertificadoSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadoSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadoSituacaosJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
				$this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoSituacaoCriteria = $criteria;

		return $this->collCertificadoSituacaos;
	}

	/**
	 * Clears out the collCuponsDescontoCertificados collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCuponsDescontoCertificados()
	 */
	public function clearCuponsDescontoCertificados()
	{
		$this->collCuponsDescontoCertificados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCuponsDescontoCertificados collection (array).
	 *
	 * By default this just sets the collCuponsDescontoCertificados collection to an empty array (like clearcollCuponsDescontoCertificados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCuponsDescontoCertificados()
	{
		$this->collCuponsDescontoCertificados = array();
	}

	/**
	 * Gets an array of CuponsDescontoCertificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related CuponsDescontoCertificados from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CuponsDescontoCertificado[]
	 * @throws     PropelException
	 */
	public function getCuponsDescontoCertificados($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
			   $this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
					$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;
		return $this->collCuponsDescontoCertificados;
	}

	/**
	 * Returns the number of related CuponsDescontoCertificado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CuponsDescontoCertificado objects.
	 * @throws     PropelException
	 */
	public function countCuponsDescontoCertificados(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
					$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCuponsDescontoCertificados);
				}
			} else {
				$count = count($this->collCuponsDescontoCertificados);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CuponsDescontoCertificado object to this object
	 * through the CuponsDescontoCertificado foreign key attribute.
	 *
	 * @param      CuponsDescontoCertificado $l CuponsDescontoCertificado
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCuponsDescontoCertificado(CuponsDescontoCertificado $l)
	{
		if ($this->collCuponsDescontoCertificados === null) {
			$this->initCuponsDescontoCertificados();
		}
		if (!in_array($l, $this->collCuponsDescontoCertificados, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCuponsDescontoCertificados, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCuponsDescontoCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;

		return $this->collCuponsDescontoCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCuponsDescontoCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;

		return $this->collCuponsDescontoCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCuponsDescontoCertificadosJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;

		return $this->collCuponsDescontoCertificados;
	}

	/**
	 * Clears out the collCertificadoCupoms collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadoCupoms()
	 */
	public function clearCertificadoCupoms()
	{
		$this->collCertificadoCupoms = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadoCupoms collection (array).
	 *
	 * By default this just sets the collCertificadoCupoms collection to an empty array (like clearcollCertificadoCupoms());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadoCupoms()
	{
		$this->collCertificadoCupoms = array();
	}

	/**
	 * Gets an array of CertificadoCupom objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related CertificadoCupoms from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CertificadoCupom[]
	 * @throws     PropelException
	 */
	public function getCertificadoCupoms($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
			   $this->collCertificadoCupoms = array();
			} else {

				$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

				CertificadoCupomPeer::addSelectColumns($criteria);
				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

				CertificadoCupomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
					$this->collCertificadoCupoms = CertificadoCupomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoCupomCriteria = $criteria;
		return $this->collCertificadoCupoms;
	}

	/**
	 * Returns the number of related CertificadoCupom objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CertificadoCupom objects.
	 * @throws     PropelException
	 */
	public function countCertificadoCupoms(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

				$count = CertificadoCupomPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
					$count = CertificadoCupomPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadoCupoms);
				}
			} else {
				$count = count($this->collCertificadoCupoms);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CertificadoCupom object to this object
	 * through the CertificadoCupom foreign key attribute.
	 *
	 * @param      CertificadoCupom $l CertificadoCupom
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoCupom(CertificadoCupom $l)
	{
		if ($this->collCertificadoCupoms === null) {
			$this->initCertificadoCupoms();
		}
		if (!in_array($l, $this->collCertificadoCupoms, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadoCupoms, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadoCupoms from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadoCupomsJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
				$this->collCertificadoCupoms = array();
			} else {

				$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCupomCriteria = $criteria;

		return $this->collCertificadoCupoms;
	}

	/**
	 * Clears out the collCertificadosRelatedByCertificadoRenovado collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadosRelatedByCertificadoRenovado()
	 */
	public function clearCertificadosRelatedByCertificadoRenovado()
	{
		$this->collCertificadosRelatedByCertificadoRenovado = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadosRelatedByCertificadoRenovado collection (array).
	 *
	 * By default this just sets the collCertificadosRelatedByCertificadoRenovado collection to an empty array (like clearcollCertificadosRelatedByCertificadoRenovado());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadosRelatedByCertificadoRenovado()
	{
		$this->collCertificadosRelatedByCertificadoRenovado = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related CertificadosRelatedByCertificadoRenovado from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificadosRelatedByCertificadoRenovado($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
			   $this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
					$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;
		return $this->collCertificadosRelatedByCertificadoRenovado;
	}

	/**
	 * Returns the number of related Certificado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Certificado objects.
	 * @throws     PropelException
	 */
	public function countCertificadosRelatedByCertificadoRenovado(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadosRelatedByCertificadoRenovado);
				}
			} else {
				$count = count($this->collCertificadosRelatedByCertificadoRenovado);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Certificado object to this object
	 * through the Certificado foreign key attribute.
	 *
	 * @param      Certificado $l Certificado
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoRelatedByCertificadoRenovado(Certificado $l)
	{
		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			$this->initCertificadosRelatedByCertificadoRenovado();
		}
		if (!in_array($l, $this->collCertificadosRelatedByCertificadoRenovado, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadosRelatedByCertificadoRenovado, $l);
			$l->setCertificadoRelatedByCertificadoRenovado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadosRelatedByCertificadoRenovado from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadosRelatedByCertificadoRenovadoJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByCertificadoRenovado === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByCertificadoRenovado = array();
			} else {

				$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CERTIFICADO_RENOVADO, $this->id);

			if (!isset($this->lastCertificadoRelatedByCertificadoRenovadoCriteria) || !$this->lastCertificadoRelatedByCertificadoRenovadoCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByCertificadoRenovado = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByCertificadoRenovadoCriteria = $criteria;

		return $this->collCertificadosRelatedByCertificadoRenovado;
	}

	/**
	 * Clears out the collCertificadoPagamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadoPagamentos()
	 */
	public function clearCertificadoPagamentos()
	{
		$this->collCertificadoPagamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadoPagamentos collection (array).
	 *
	 * By default this just sets the collCertificadoPagamentos collection to an empty array (like clearcollCertificadoPagamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadoPagamentos()
	{
		$this->collCertificadoPagamentos = array();
	}

	/**
	 * Gets an array of CertificadoPagamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related CertificadoPagamentos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CertificadoPagamento[]
	 * @throws     PropelException
	 */
	public function getCertificadoPagamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
			   $this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				CertificadoPagamentoPeer::addSelectColumns($criteria);
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				CertificadoPagamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
					$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;
		return $this->collCertificadoPagamentos;
	}

	/**
	 * Returns the number of related CertificadoPagamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CertificadoPagamento objects.
	 * @throws     PropelException
	 */
	public function countCertificadoPagamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				$count = CertificadoPagamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
					$count = CertificadoPagamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadoPagamentos);
				}
			} else {
				$count = count($this->collCertificadoPagamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CertificadoPagamento object to this object
	 * through the CertificadoPagamento foreign key attribute.
	 *
	 * @param      CertificadoPagamento $l CertificadoPagamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoPagamento(CertificadoPagamento $l)
	{
		if ($this->collCertificadoPagamentos === null) {
			$this->initCertificadoPagamentos();
		}
		if (!in_array($l, $this->collCertificadoPagamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadoPagamentos, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadoPagamentosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;

		return $this->collCertificadoPagamentos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getCertificadoPagamentosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;

		return $this->collCertificadoPagamentos;
	}

	/**
	 * Clears out the collBoletos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBoletos()
	 */
	public function clearBoletos()
	{
		$this->collBoletos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBoletos collection (array).
	 *
	 * By default this just sets the collBoletos collection to an empty array (like clearcollBoletos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initBoletos()
	{
		$this->collBoletos = array();
	}

	/**
	 * Gets an array of Boleto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related Boletos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Boleto[]
	 * @throws     PropelException
	 */
	public function getBoletos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
			   $this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletoCriteria = $criteria;
		return $this->collBoletos;
	}

	/**
	 * Returns the number of related Boleto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Boleto objects.
	 * @throws     PropelException
	 */
	public function countBoletos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				$count = BoletoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$count = BoletoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collBoletos);
				}
			} else {
				$count = count($this->collBoletos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Boleto object to this object
	 * through the Boleto foreign key attribute.
	 *
	 * @param      Boleto $l Boleto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addBoleto(Boleto $l)
	{
		if ($this->collBoletos === null) {
			$this->initBoletos();
		}
		if (!in_array($l, $this->collBoletos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collBoletos, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getBoletosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getBoletosJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getBoletosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}

	/**
	 * Clears out the collRecibos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRecibos()
	 */
	public function clearRecibos()
	{
		$this->collRecibos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRecibos collection (array).
	 *
	 * By default this just sets the collRecibos collection to an empty array (like clearcollRecibos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initRecibos()
	{
		$this->collRecibos = array();
	}

	/**
	 * Gets an array of Recibo objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related Recibos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Recibo[]
	 * @throws     PropelException
	 */
	public function getRecibos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecibos === null) {
			if ($this->isNew()) {
			   $this->collRecibos = array();
			} else {

				$criteria->add(ReciboPeer::CERTIFICADO_ID, $this->id);

				ReciboPeer::addSelectColumns($criteria);
				$this->collRecibos = ReciboPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ReciboPeer::CERTIFICADO_ID, $this->id);

				ReciboPeer::addSelectColumns($criteria);
				if (!isset($this->lastReciboCriteria) || !$this->lastReciboCriteria->equals($criteria)) {
					$this->collRecibos = ReciboPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastReciboCriteria = $criteria;
		return $this->collRecibos;
	}

	/**
	 * Returns the number of related Recibo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Recibo objects.
	 * @throws     PropelException
	 */
	public function countRecibos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRecibos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ReciboPeer::CERTIFICADO_ID, $this->id);

				$count = ReciboPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ReciboPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastReciboCriteria) || !$this->lastReciboCriteria->equals($criteria)) {
					$count = ReciboPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collRecibos);
				}
			} else {
				$count = count($this->collRecibos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Recibo object to this object
	 * through the Recibo foreign key attribute.
	 *
	 * @param      Recibo $l Recibo
	 * @return     void
	 * @throws     PropelException
	 */
	public function addRecibo(Recibo $l)
	{
		if ($this->collRecibos === null) {
			$this->initRecibos();
		}
		if (!in_array($l, $this->collRecibos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collRecibos, $l);
			$l->setCertificado($this);
		}
	}

	/**
	 * Clears out the collItemPedidos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addItemPedidos()
	 */
	public function clearItemPedidos()
	{
		$this->collItemPedidos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collItemPedidos collection (array).
	 *
	 * By default this just sets the collItemPedidos collection to an empty array (like clearcollItemPedidos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initItemPedidos()
	{
		$this->collItemPedidos = array();
	}

	/**
	 * Gets an array of ItemPedido objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related ItemPedidos from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ItemPedido[]
	 * @throws     PropelException
	 */
	public function getItemPedidos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
			   $this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				ItemPedidoPeer::addSelectColumns($criteria);
				$this->collItemPedidos = ItemPedidoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				ItemPedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
					$this->collItemPedidos = ItemPedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemPedidoCriteria = $criteria;
		return $this->collItemPedidos;
	}

	/**
	 * Returns the number of related ItemPedido objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ItemPedido objects.
	 * @throws     PropelException
	 */
	public function countItemPedidos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				$count = ItemPedidoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
					$count = ItemPedidoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collItemPedidos);
				}
			} else {
				$count = count($this->collItemPedidos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ItemPedido object to this object
	 * through the ItemPedido foreign key attribute.
	 *
	 * @param      ItemPedido $l ItemPedido
	 * @return     void
	 * @throws     PropelException
	 */
	public function addItemPedido(ItemPedido $l)
	{
		if ($this->collItemPedidos === null) {
			$this->initItemPedidos();
		}
		if (!in_array($l, $this->collItemPedidos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collItemPedidos, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getItemPedidosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getItemPedidosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
	}

	/**
	 * Clears out the collContasRecebers collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContasRecebers()
	 */
	public function clearContasRecebers()
	{
		$this->collContasRecebers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContasRecebers collection (array).
	 *
	 * By default this just sets the collContasRecebers collection to an empty array (like clearcollContasRecebers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContasRecebers()
	{
		$this->collContasRecebers = array();
	}

	/**
	 * Gets an array of ContasReceber objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related ContasRecebers from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContasReceber[]
	 * @throws     PropelException
	 */
	public function getContasRecebers($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
			   $this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
					$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContasReceberCriteria = $criteria;
		return $this->collContasRecebers;
	}

	/**
	 * Returns the number of related ContasReceber objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContasReceber objects.
	 * @throws     PropelException
	 */
	public function countContasRecebers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				$count = ContasReceberPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
					$count = ContasReceberPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContasRecebers);
				}
			} else {
				$count = count($this->collContasRecebers);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContasReceber object to this object
	 * through the ContasReceber foreign key attribute.
	 *
	 * @param      ContasReceber $l ContasReceber
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContasReceber(ContasReceber $l)
	{
		if ($this->collContasRecebers === null) {
			$this->initContasRecebers();
		}
		if (!in_array($l, $this->collContasRecebers, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContasRecebers, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getContasRecebersJoinBanco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getContasRecebersJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getContasRecebersJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getContasRecebersJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}

	/**
	 * Clears out the collProspects collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspects()
	 */
	public function clearProspects()
	{
		$this->collProspects = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspects collection (array).
	 *
	 * By default this just sets the collProspects collection to an empty array (like clearcollProspects());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspects()
	{
		$this->collProspects = array();
	}

	/**
	 * Gets an array of Prospect objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Certificado has previously been saved, it will retrieve
	 * related Prospects from storage. If this Certificado is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Prospect[]
	 * @throws     PropelException
	 */
	public function getProspects($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
			   $this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspects = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$this->collProspects = ProspectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectCriteria = $criteria;
		return $this->collProspects;
	}

	/**
	 * Returns the number of related Prospect objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Prospect objects.
	 * @throws     PropelException
	 */
	public function countProspects(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$count = ProspectPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspects);
				}
			} else {
				$count = count($this->collProspects);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Prospect object to this object
	 * through the Prospect foreign key attribute.
	 *
	 * @param      Prospect $l Prospect
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspect(Prospect $l)
	{
		if ($this->collProspects === null) {
			$this->initProspects();
		}
		if (!in_array($l, $this->collProspects, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspects, $l);
			$l->setCertificado($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getProspectsJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getProspectsJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getProspectsJoinUsuarioRelatedBySupervisorUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getProspectsJoinProspectContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Certificado is new, it will return
	 * an empty collection; or if this Certificado has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Certificado.
	 */
	public function getProspectsJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CERTIFICADO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAgendamentos) {
				foreach ((array) $this->collAgendamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadoSituacaos) {
				foreach ((array) $this->collCertificadoSituacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCuponsDescontoCertificados) {
				foreach ((array) $this->collCuponsDescontoCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadoCupoms) {
				foreach ((array) $this->collCertificadoCupoms as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadosRelatedByCertificadoRenovado) {
				foreach ((array) $this->collCertificadosRelatedByCertificadoRenovado as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadoPagamentos) {
				foreach ((array) $this->collCertificadoPagamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletos) {
				foreach ((array) $this->collBoletos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRecibos) {
				foreach ((array) $this->collRecibos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collItemPedidos) {
				foreach ((array) $this->collItemPedidos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasRecebers) {
				foreach ((array) $this->collContasRecebers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspects) {
				foreach ((array) $this->collProspects as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAgendamentos = null;
		$this->collCertificadoSituacaos = null;
		$this->collCuponsDescontoCertificados = null;
		$this->collCertificadoCupoms = null;
		$this->collCertificadosRelatedByCertificadoRenovado = null;
		$this->collCertificadoPagamentos = null;
		$this->collBoletos = null;
		$this->collRecibos = null;
		$this->collItemPedidos = null;
		$this->collContasRecebers = null;
		$this->collProspects = null;
			$this->aSituacao = null;
			$this->aParceiro = null;
			$this->aContador = null;
			$this->aLocal = null;
			$this->aFormaPagamento = null;
			$this->aProduto = null;
			$this->aCliente = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aUsuarioRelatedByUsuarioValidouId = null;
			$this->aCertificadoRelatedByCertificadoRenovado = null;
	}

} // BaseCertificado
