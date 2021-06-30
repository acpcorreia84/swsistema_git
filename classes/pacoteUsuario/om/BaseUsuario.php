<?php

/**
 * Base class that represents a row from the 'usuario' table.
 *
 * 
 *
 * @package    pacoteUsuario.om
 */
abstract class BaseUsuario extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UsuarioPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * The value for the foto_avatar field.
	 * @var        string
	 */
	protected $foto_avatar;

	/**
	 * The value for the perfil_id field.
	 * @var        int
	 */
	protected $perfil_id;

	/**
	 * The value for the login field.
	 * @var        string
	 */
	protected $login;

	/**
	 * The value for the senha field.
	 * @var        string
	 */
	protected $senha;

	/**
	 * The value for the data_expiracao_senha field.
	 * @var        string
	 */
	protected $data_expiracao_senha;

	/**
	 * The value for the data_ultimo_acesso field.
	 * @var        string
	 */
	protected $data_ultimo_acesso;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the endereco field.
	 * @var        string
	 */
	protected $endereco;

	/**
	 * The value for the complemento field.
	 * @var        string
	 */
	protected $complemento;

	/**
	 * The value for the numero field.
	 * @var        string
	 */
	protected $numero;

	/**
	 * The value for the bairro field.
	 * @var        string
	 */
	protected $bairro;

	/**
	 * The value for the cidade field.
	 * @var        string
	 */
	protected $cidade;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the uf field.
	 * @var        string
	 */
	protected $uf;

	/**
	 * The value for the cep field.
	 * @var        string
	 */
	protected $cep;

	/**
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

	/**
	 * The value for the fone field.
	 * @var        string
	 */
	protected $fone;

	/**
	 * The value for the fone2 field.
	 * @var        string
	 */
	protected $fone2;

	/**
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the nascimento field.
	 * @var        string
	 */
	protected $nascimento;

	/**
	 * The value for the setor_id field.
	 * @var        int
	 */
	protected $setor_id;

	/**
	 * The value for the cargo_id field.
	 * @var        int
	 */
	protected $cargo_id;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the saida_ferias field.
	 * @var        string
	 */
	protected $saida_ferias;

	/**
	 * The value for the volta_ferias field.
	 * @var        string
	 */
	protected $volta_ferias;

	/**
	 * The value for the limite_quantidade field.
	 * @var        int
	 */
	protected $limite_quantidade;

	/**
	 * The value for the margem_desconto field.
	 * @var        int
	 */
	protected $margem_desconto;

	/**
	 * The value for the grupo_produto_id field.
	 * @var        int
	 */
	protected $grupo_produto_id;

	/**
	 * @var        Setor
	 */
	protected $aSetor;

	/**
	 * @var        Local
	 */
	protected $aLocal;

	/**
	 * @var        Cargo
	 */
	protected $aCargo;

	/**
	 * @var        Perfil
	 */
	protected $aPerfil;

	/**
	 * @var        GrupoProduto
	 */
	protected $aGrupoProduto;

	/**
	 * @var        array ParceiroUsuario[] Collection to store aggregation of ParceiroUsuario objects.
	 */
	protected $collParceiroUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collParceiroUsuarios.
	 */
	private $lastParceiroUsuarioCriteria = null;

	/**
	 * @var        array UsuarioComissionamento[] Collection to store aggregation of UsuarioComissionamento objects.
	 */
	protected $collUsuarioComissionamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUsuarioComissionamentos.
	 */
	private $lastUsuarioComissionamentoCriteria = null;

	/**
	 * @var        array LogSerama[] Collection to store aggregation of LogSerama objects.
	 */
	protected $collLogSeramas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLogSeramas.
	 */
	private $lastLogSeramaCriteria = null;

	/**
	 * @var        array LogAcesso[] Collection to store aggregation of LogAcesso objects.
	 */
	protected $collLogAcessos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLogAcessos.
	 */
	private $lastLogAcessoCriteria = null;

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
	protected $collCuponsDescontoCertificadosRelatedByUsuarioId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCuponsDescontoCertificadosRelatedByUsuarioId.
	 */
	private $lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria = null;

	/**
	 * @var        array CuponsDescontoCertificado[] Collection to store aggregation of CuponsDescontoCertificado objects.
	 */
	protected $collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId.
	 */
	private $lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria = null;

	/**
	 * @var        array LocalUsuario[] Collection to store aggregation of LocalUsuario objects.
	 */
	protected $collLocalUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLocalUsuarios.
	 */
	private $lastLocalUsuarioCriteria = null;

	/**
	 * @var        array Importacao[] Collection to store aggregation of Importacao objects.
	 */
	protected $collImportacaos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collImportacaos.
	 */
	private $lastImportacaoCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificadosRelatedByUsuarioId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadosRelatedByUsuarioId.
	 */
	private $lastCertificadoRelatedByUsuarioIdCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificadosRelatedByUsuarioValidouId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadosRelatedByUsuarioValidouId.
	 */
	private $lastCertificadoRelatedByUsuarioValidouIdCriteria = null;

	/**
	 * @var        array ClienteHistorico[] Collection to store aggregation of ClienteHistorico objects.
	 */
	protected $collClienteHistoricos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClienteHistoricos.
	 */
	private $lastClienteHistoricoCriteria = null;

	/**
	 * @var        array Contador[] Collection to store aggregation of Contador objects.
	 */
	protected $collContadors;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadors.
	 */
	private $lastContadorCriteria = null;

	/**
	 * @var        array ContadorDetalhar[] Collection to store aggregation of ContadorDetalhar objects.
	 */
	protected $collContadorDetalhars;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadorDetalhars.
	 */
	private $lastContadorDetalharCriteria = null;

	/**
	 * @var        array Boleto[] Collection to store aggregation of Boleto objects.
	 */
	protected $collBoletos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collBoletos.
	 */
	private $lastBoletoCriteria = null;

	/**
	 * @var        array Caixa[] Collection to store aggregation of Caixa objects.
	 */
	protected $collCaixas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCaixas.
	 */
	private $lastCaixaCriteria = null;

	/**
	 * @var        array Aviso[] Collection to store aggregation of Aviso objects.
	 */
	protected $collAvisos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAvisos.
	 */
	private $lastAvisoCriteria = null;

	/**
	 * @var        array AvisoUsuario[] Collection to store aggregation of AvisoUsuario objects.
	 */
	protected $collAvisoUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAvisoUsuarios.
	 */
	private $lastAvisoUsuarioCriteria = null;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspectsRelatedByUsuarioId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectsRelatedByUsuarioId.
	 */
	private $lastProspectRelatedByUsuarioIdCriteria = null;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspectsRelatedBySupervisorUsuarioId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectsRelatedBySupervisorUsuarioId.
	 */
	private $lastProspectRelatedBySupervisorUsuarioIdCriteria = null;

	/**
	 * @var        array ProspectContato[] Collection to store aggregation of ProspectContato objects.
	 */
	protected $collProspectContatos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectContatos.
	 */
	private $lastProspectContatoCriteria = null;

	/**
	 * @var        array ProspectSituacao[] Collection to store aggregation of ProspectSituacao objects.
	 */
	protected $collProspectSituacaos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectSituacaos.
	 */
	private $lastProspectSituacaoCriteria = null;

	/**
	 * @var        array ProspectAtendimento[] Collection to store aggregation of ProspectAtendimento objects.
	 */
	protected $collProspectAtendimentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectAtendimentos.
	 */
	private $lastProspectAtendimentoCriteria = null;

	/**
	 * @var        array ProspectNegocio[] Collection to store aggregation of ProspectNegocio objects.
	 */
	protected $collProspectNegocios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectNegocios.
	 */
	private $lastProspectNegocioCriteria = null;

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
	 * Get the [local_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalId()
	{
		return $this->local_id;
	}

	/**
	 * Get the [foto_avatar] column value.
	 * 
	 * @return     string
	 */
	public function getFotoAvatar()
	{
		return $this->foto_avatar;
	}

	/**
	 * Get the [perfil_id] column value.
	 * 
	 * @return     int
	 */
	public function getPerfilId()
	{
		return $this->perfil_id;
	}

	/**
	 * Get the [login] column value.
	 * 
	 * @return     string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Get the [senha] column value.
	 * 
	 * @return     string
	 */
	public function getSenha()
	{
		return $this->senha;
	}

	/**
	 * Get the [optionally formatted] temporal [data_expiracao_senha] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataExpiracaoSenha($format = '%x')
	{
		if ($this->data_expiracao_senha === null) {
			return null;
		}


		if ($this->data_expiracao_senha === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_expiracao_senha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_expiracao_senha, true), $x);
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
	 * Get the [optionally formatted] temporal [data_ultimo_acesso] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataUltimoAcesso($format = 'Y-m-d H:i:s')
	{
		if ($this->data_ultimo_acesso === null) {
			return null;
		}


		if ($this->data_ultimo_acesso === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_ultimo_acesso);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_ultimo_acesso, true), $x);
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
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Get the [nome] column value.
	 * 
	 * @return     string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Get the [endereco] column value.
	 * 
	 * @return     string
	 */
	public function getEndereco()
	{
		return $this->endereco;
	}

	/**
	 * Get the [complemento] column value.
	 * 
	 * @return     string
	 */
	public function getComplemento()
	{
		return $this->complemento;
	}

	/**
	 * Get the [numero] column value.
	 * 
	 * @return     string
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Get the [bairro] column value.
	 * 
	 * @return     string
	 */
	public function getBairro()
	{
		return $this->bairro;
	}

	/**
	 * Get the [cidade] column value.
	 * 
	 * @return     string
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [uf] column value.
	 * 
	 * @return     string
	 */
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * Get the [cep] column value.
	 * 
	 * @return     string
	 */
	public function getCep()
	{
		return $this->cep;
	}

	/**
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * Get the [fone] column value.
	 * 
	 * @return     string
	 */
	public function getFone()
	{
		return $this->fone;
	}

	/**
	 * Get the [fone2] column value.
	 * 
	 * @return     string
	 */
	public function getFone2()
	{
		return $this->fone2;
	}

	/**
	 * Get the [celular] column value.
	 * 
	 * @return     string
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Get the [optionally formatted] temporal [nascimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getNascimento($format = '%x')
	{
		if ($this->nascimento === null) {
			return null;
		}


		if ($this->nascimento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->nascimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->nascimento, true), $x);
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
	 * Get the [setor_id] column value.
	 * 
	 * @return     int
	 */
	public function getSetorId()
	{
		return $this->setor_id;
	}

	/**
	 * Get the [cargo_id] column value.
	 * 
	 * @return     int
	 */
	public function getCargoId()
	{
		return $this->cargo_id;
	}

	/**
	 * Get the [situacao] column value.
	 * 
	 * @return     int
	 */
	public function getSituacao()
	{
		return $this->situacao;
	}

	/**
	 * Get the [optionally formatted] temporal [data_cadastro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = '%x')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_cadastro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_cadastro, true), $x);
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
	 * Get the [optionally formatted] temporal [saida_ferias] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getSaidaFerias($format = '%x')
	{
		if ($this->saida_ferias === null) {
			return null;
		}


		if ($this->saida_ferias === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->saida_ferias);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->saida_ferias, true), $x);
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
	 * Get the [optionally formatted] temporal [volta_ferias] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getVoltaFerias($format = '%x')
	{
		if ($this->volta_ferias === null) {
			return null;
		}


		if ($this->volta_ferias === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->volta_ferias);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->volta_ferias, true), $x);
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
	 * Get the [limite_quantidade] column value.
	 * 
	 * @return     int
	 */
	public function getLimiteQuantidade()
	{
		return $this->limite_quantidade;
	}

	/**
	 * Get the [margem_desconto] column value.
	 * 
	 * @return     int
	 */
	public function getMargemDesconto()
	{
		return $this->margem_desconto;
	}

	/**
	 * Get the [grupo_produto_id] column value.
	 * 
	 * @return     int
	 */
	public function getGrupoProdutoId()
	{
		return $this->grupo_produto_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [foto_avatar] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setFotoAvatar($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->foto_avatar !== $v) {
			$this->foto_avatar = $v;
			$this->modifiedColumns[] = UsuarioPeer::FOTO_AVATAR;
		}

		return $this;
	} // setFotoAvatar()

	/**
	 * Set the value of [perfil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setPerfilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->perfil_id !== $v) {
			$this->perfil_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::PERFIL_ID;
		}

		if ($this->aPerfil !== null && $this->aPerfil->getId() !== $v) {
			$this->aPerfil = null;
		}

		return $this;
	} // setPerfilId()

	/**
	 * Set the value of [login] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setLogin($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->login !== $v) {
			$this->login = $v;
			$this->modifiedColumns[] = UsuarioPeer::LOGIN;
		}

		return $this;
	} // setLogin()

	/**
	 * Set the value of [senha] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSenha($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->senha !== $v) {
			$this->senha = $v;
			$this->modifiedColumns[] = UsuarioPeer::SENHA;
		}

		return $this;
	} // setSenha()

	/**
	 * Sets the value of [data_expiracao_senha] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataExpiracaoSenha($v)
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

		if ( $this->data_expiracao_senha !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_expiracao_senha !== null && $tmpDt = new DateTime($this->data_expiracao_senha)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_expiracao_senha = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = UsuarioPeer::DATA_EXPIRACAO_SENHA;
			}
		} // if either are not null

		return $this;
	} // setDataExpiracaoSenha()

	/**
	 * Sets the value of [data_ultimo_acesso] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataUltimoAcesso($v)
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

		if ( $this->data_ultimo_acesso !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_ultimo_acesso !== null && $tmpDt = new DateTime($this->data_ultimo_acesso)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_ultimo_acesso = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = UsuarioPeer::DATA_ULTIMO_ACESSO;
			}
		} // if either are not null

		return $this;
	} // setDataUltimoAcesso()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = UsuarioPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = UsuarioPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = UsuarioPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = UsuarioPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = UsuarioPeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = UsuarioPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = UsuarioPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsuarioPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = UsuarioPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = UsuarioPeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = UsuarioPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [fone] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setFone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone !== $v) {
			$this->fone = $v;
			$this->modifiedColumns[] = UsuarioPeer::FONE;
		}

		return $this;
	} // setFone()

	/**
	 * Set the value of [fone2] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setFone2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone2 !== $v) {
			$this->fone2 = $v;
			$this->modifiedColumns[] = UsuarioPeer::FONE2;
		}

		return $this;
	} // setFone2()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = UsuarioPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Sets the value of [nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNascimento($v)
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

		if ( $this->nascimento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->nascimento !== null && $tmpDt = new DateTime($this->nascimento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->nascimento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = UsuarioPeer::NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setNascimento()

	/**
	 * Set the value of [setor_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSetorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->setor_id !== $v) {
			$this->setor_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::SETOR_ID;
		}

		if ($this->aSetor !== null && $this->aSetor->getId() !== $v) {
			$this->aSetor = null;
		}

		return $this;
	} // setSetorId()

	/**
	 * Set the value of [cargo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCargoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cargo_id !== $v) {
			$this->cargo_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::CARGO_ID;
		}

		if ($this->aCargo !== null && $this->aCargo->getId() !== $v) {
			$this->aCargo = null;
		}

		return $this;
	} // setCargoId()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = UsuarioPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
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

		if ( $this->data_cadastro !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_cadastro = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = UsuarioPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Sets the value of [saida_ferias] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSaidaFerias($v)
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

		if ( $this->saida_ferias !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->saida_ferias !== null && $tmpDt = new DateTime($this->saida_ferias)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->saida_ferias = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = UsuarioPeer::SAIDA_FERIAS;
			}
		} // if either are not null

		return $this;
	} // setSaidaFerias()

	/**
	 * Sets the value of [volta_ferias] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setVoltaFerias($v)
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

		if ( $this->volta_ferias !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->volta_ferias !== null && $tmpDt = new DateTime($this->volta_ferias)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->volta_ferias = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = UsuarioPeer::VOLTA_FERIAS;
			}
		} // if either are not null

		return $this;
	} // setVoltaFerias()

	/**
	 * Set the value of [limite_quantidade] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setLimiteQuantidade($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->limite_quantidade !== $v) {
			$this->limite_quantidade = $v;
			$this->modifiedColumns[] = UsuarioPeer::LIMITE_QUANTIDADE;
		}

		return $this;
	} // setLimiteQuantidade()

	/**
	 * Set the value of [margem_desconto] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setMargemDesconto($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->margem_desconto !== $v) {
			$this->margem_desconto = $v;
			$this->modifiedColumns[] = UsuarioPeer::MARGEM_DESCONTO;
		}

		return $this;
	} // setMargemDesconto()

	/**
	 * Set the value of [grupo_produto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setGrupoProdutoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->grupo_produto_id !== $v) {
			$this->grupo_produto_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::GRUPO_PRODUTO_ID;
		}

		if ($this->aGrupoProduto !== null && $this->aGrupoProduto->getId() !== $v) {
			$this->aGrupoProduto = null;
		}

		return $this;
	} // setGrupoProdutoId()

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
			$this->local_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->foto_avatar = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->perfil_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->login = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->senha = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_expiracao_senha = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->data_ultimo_acesso = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->url = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->nome = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->endereco = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->complemento = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->numero = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->bairro = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->cidade = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->email = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->uf = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->cep = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->cpf = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->fone = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->fone2 = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->celular = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->nascimento = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->setor_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
			$this->cargo_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
			$this->situacao = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->data_cadastro = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->saida_ferias = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->volta_ferias = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->limite_quantidade = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
			$this->margem_desconto = ($row[$startcol + 30] !== null) ? (int) $row[$startcol + 30] : null;
			$this->grupo_produto_id = ($row[$startcol + 31] !== null) ? (int) $row[$startcol + 31] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 32; // 32 = UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
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

		if ($this->aLocal !== null && $this->local_id !== $this->aLocal->getId()) {
			$this->aLocal = null;
		}
		if ($this->aPerfil !== null && $this->perfil_id !== $this->aPerfil->getId()) {
			$this->aPerfil = null;
		}
		if ($this->aSetor !== null && $this->setor_id !== $this->aSetor->getId()) {
			$this->aSetor = null;
		}
		if ($this->aCargo !== null && $this->cargo_id !== $this->aCargo->getId()) {
			$this->aCargo = null;
		}
		if ($this->aGrupoProduto !== null && $this->grupo_produto_id !== $this->aGrupoProduto->getId()) {
			$this->aGrupoProduto = null;
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSetor = null;
			$this->aLocal = null;
			$this->aCargo = null;
			$this->aPerfil = null;
			$this->aGrupoProduto = null;
			$this->collParceiroUsuarios = null;
			$this->lastParceiroUsuarioCriteria = null;

			$this->collUsuarioComissionamentos = null;
			$this->lastUsuarioComissionamentoCriteria = null;

			$this->collLogSeramas = null;
			$this->lastLogSeramaCriteria = null;

			$this->collLogAcessos = null;
			$this->lastLogAcessoCriteria = null;

			$this->collCertificadoSituacaos = null;
			$this->lastCertificadoSituacaoCriteria = null;

			$this->collCuponsDescontoCertificadosRelatedByUsuarioId = null;
			$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria = null;

			$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = null;
			$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria = null;

			$this->collLocalUsuarios = null;
			$this->lastLocalUsuarioCriteria = null;

			$this->collImportacaos = null;
			$this->lastImportacaoCriteria = null;

			$this->collCertificadosRelatedByUsuarioId = null;
			$this->lastCertificadoRelatedByUsuarioIdCriteria = null;

			$this->collCertificadosRelatedByUsuarioValidouId = null;
			$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = null;

			$this->collClienteHistoricos = null;
			$this->lastClienteHistoricoCriteria = null;

			$this->collContadors = null;
			$this->lastContadorCriteria = null;

			$this->collContadorDetalhars = null;
			$this->lastContadorDetalharCriteria = null;

			$this->collBoletos = null;
			$this->lastBoletoCriteria = null;

			$this->collCaixas = null;
			$this->lastCaixaCriteria = null;

			$this->collAvisos = null;
			$this->lastAvisoCriteria = null;

			$this->collAvisoUsuarios = null;
			$this->lastAvisoUsuarioCriteria = null;

			$this->collProspectsRelatedByUsuarioId = null;
			$this->lastProspectRelatedByUsuarioIdCriteria = null;

			$this->collProspectsRelatedBySupervisorUsuarioId = null;
			$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = null;

			$this->collProspectContatos = null;
			$this->lastProspectContatoCriteria = null;

			$this->collProspectSituacaos = null;
			$this->lastProspectSituacaoCriteria = null;

			$this->collProspectAtendimentos = null;
			$this->lastProspectAtendimentoCriteria = null;

			$this->collProspectNegocios = null;
			$this->lastProspectNegocioCriteria = null;

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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				UsuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UsuarioPeer::addInstanceToPool($this);
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

			if ($this->aSetor !== null) {
				if ($this->aSetor->isModified() || $this->aSetor->isNew()) {
					$affectedRows += $this->aSetor->save($con);
				}
				$this->setSetor($this->aSetor);
			}

			if ($this->aLocal !== null) {
				if ($this->aLocal->isModified() || $this->aLocal->isNew()) {
					$affectedRows += $this->aLocal->save($con);
				}
				$this->setLocal($this->aLocal);
			}

			if ($this->aCargo !== null) {
				if ($this->aCargo->isModified() || $this->aCargo->isNew()) {
					$affectedRows += $this->aCargo->save($con);
				}
				$this->setCargo($this->aCargo);
			}

			if ($this->aPerfil !== null) {
				if ($this->aPerfil->isModified() || $this->aPerfil->isNew()) {
					$affectedRows += $this->aPerfil->save($con);
				}
				$this->setPerfil($this->aPerfil);
			}

			if ($this->aGrupoProduto !== null) {
				if ($this->aGrupoProduto->isModified() || $this->aGrupoProduto->isNew()) {
					$affectedRows += $this->aGrupoProduto->save($con);
				}
				$this->setGrupoProduto($this->aGrupoProduto);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UsuarioPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuarioPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UsuarioPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collParceiroUsuarios !== null) {
				foreach ($this->collParceiroUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarioComissionamentos !== null) {
				foreach ($this->collUsuarioComissionamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLogSeramas !== null) {
				foreach ($this->collLogSeramas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLogAcessos !== null) {
				foreach ($this->collLogAcessos as $referrerFK) {
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

			if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId !== null) {
				foreach ($this->collCuponsDescontoCertificadosRelatedByUsuarioId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId !== null) {
				foreach ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLocalUsuarios !== null) {
				foreach ($this->collLocalUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collImportacaos !== null) {
				foreach ($this->collImportacaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadosRelatedByUsuarioId !== null) {
				foreach ($this->collCertificadosRelatedByUsuarioId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadosRelatedByUsuarioValidouId !== null) {
				foreach ($this->collCertificadosRelatedByUsuarioValidouId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClienteHistoricos !== null) {
				foreach ($this->collClienteHistoricos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadors !== null) {
				foreach ($this->collContadors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadorDetalhars !== null) {
				foreach ($this->collContadorDetalhars as $referrerFK) {
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

			if ($this->collCaixas !== null) {
				foreach ($this->collCaixas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAvisos !== null) {
				foreach ($this->collAvisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAvisoUsuarios !== null) {
				foreach ($this->collAvisoUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectsRelatedByUsuarioId !== null) {
				foreach ($this->collProspectsRelatedByUsuarioId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectsRelatedBySupervisorUsuarioId !== null) {
				foreach ($this->collProspectsRelatedBySupervisorUsuarioId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectContatos !== null) {
				foreach ($this->collProspectContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectSituacaos !== null) {
				foreach ($this->collProspectSituacaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectAtendimentos !== null) {
				foreach ($this->collProspectAtendimentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectNegocios !== null) {
				foreach ($this->collProspectNegocios as $referrerFK) {
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

			if ($this->aSetor !== null) {
				if (!$this->aSetor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSetor->getValidationFailures());
				}
			}

			if ($this->aLocal !== null) {
				if (!$this->aLocal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocal->getValidationFailures());
				}
			}

			if ($this->aCargo !== null) {
				if (!$this->aCargo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCargo->getValidationFailures());
				}
			}

			if ($this->aPerfil !== null) {
				if (!$this->aPerfil->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPerfil->getValidationFailures());
				}
			}

			if ($this->aGrupoProduto !== null) {
				if (!$this->aGrupoProduto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrupoProduto->getValidationFailures());
				}
			}


			if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collParceiroUsuarios !== null) {
					foreach ($this->collParceiroUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarioComissionamentos !== null) {
					foreach ($this->collUsuarioComissionamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLogSeramas !== null) {
					foreach ($this->collLogSeramas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLogAcessos !== null) {
					foreach ($this->collLogAcessos as $referrerFK) {
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

				if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId !== null) {
					foreach ($this->collCuponsDescontoCertificadosRelatedByUsuarioId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId !== null) {
					foreach ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLocalUsuarios !== null) {
					foreach ($this->collLocalUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collImportacaos !== null) {
					foreach ($this->collImportacaos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadosRelatedByUsuarioId !== null) {
					foreach ($this->collCertificadosRelatedByUsuarioId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadosRelatedByUsuarioValidouId !== null) {
					foreach ($this->collCertificadosRelatedByUsuarioValidouId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClienteHistoricos !== null) {
					foreach ($this->collClienteHistoricos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadors !== null) {
					foreach ($this->collContadors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadorDetalhars !== null) {
					foreach ($this->collContadorDetalhars as $referrerFK) {
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

				if ($this->collCaixas !== null) {
					foreach ($this->collCaixas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAvisos !== null) {
					foreach ($this->collAvisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAvisoUsuarios !== null) {
					foreach ($this->collAvisoUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectsRelatedByUsuarioId !== null) {
					foreach ($this->collProspectsRelatedByUsuarioId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectsRelatedBySupervisorUsuarioId !== null) {
					foreach ($this->collProspectsRelatedBySupervisorUsuarioId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectContatos !== null) {
					foreach ($this->collProspectContatos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectSituacaos !== null) {
					foreach ($this->collProspectSituacaos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectAtendimentos !== null) {
					foreach ($this->collProspectAtendimentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectNegocios !== null) {
					foreach ($this->collProspectNegocios as $referrerFK) {
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
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::LOCAL_ID)) $criteria->add(UsuarioPeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(UsuarioPeer::FOTO_AVATAR)) $criteria->add(UsuarioPeer::FOTO_AVATAR, $this->foto_avatar);
		if ($this->isColumnModified(UsuarioPeer::PERFIL_ID)) $criteria->add(UsuarioPeer::PERFIL_ID, $this->perfil_id);
		if ($this->isColumnModified(UsuarioPeer::LOGIN)) $criteria->add(UsuarioPeer::LOGIN, $this->login);
		if ($this->isColumnModified(UsuarioPeer::SENHA)) $criteria->add(UsuarioPeer::SENHA, $this->senha);
		if ($this->isColumnModified(UsuarioPeer::DATA_EXPIRACAO_SENHA)) $criteria->add(UsuarioPeer::DATA_EXPIRACAO_SENHA, $this->data_expiracao_senha);
		if ($this->isColumnModified(UsuarioPeer::DATA_ULTIMO_ACESSO)) $criteria->add(UsuarioPeer::DATA_ULTIMO_ACESSO, $this->data_ultimo_acesso);
		if ($this->isColumnModified(UsuarioPeer::URL)) $criteria->add(UsuarioPeer::URL, $this->url);
		if ($this->isColumnModified(UsuarioPeer::NOME)) $criteria->add(UsuarioPeer::NOME, $this->nome);
		if ($this->isColumnModified(UsuarioPeer::ENDERECO)) $criteria->add(UsuarioPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(UsuarioPeer::COMPLEMENTO)) $criteria->add(UsuarioPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(UsuarioPeer::NUMERO)) $criteria->add(UsuarioPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(UsuarioPeer::BAIRRO)) $criteria->add(UsuarioPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(UsuarioPeer::CIDADE)) $criteria->add(UsuarioPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(UsuarioPeer::EMAIL)) $criteria->add(UsuarioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UsuarioPeer::UF)) $criteria->add(UsuarioPeer::UF, $this->uf);
		if ($this->isColumnModified(UsuarioPeer::CEP)) $criteria->add(UsuarioPeer::CEP, $this->cep);
		if ($this->isColumnModified(UsuarioPeer::CPF)) $criteria->add(UsuarioPeer::CPF, $this->cpf);
		if ($this->isColumnModified(UsuarioPeer::FONE)) $criteria->add(UsuarioPeer::FONE, $this->fone);
		if ($this->isColumnModified(UsuarioPeer::FONE2)) $criteria->add(UsuarioPeer::FONE2, $this->fone2);
		if ($this->isColumnModified(UsuarioPeer::CELULAR)) $criteria->add(UsuarioPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(UsuarioPeer::NASCIMENTO)) $criteria->add(UsuarioPeer::NASCIMENTO, $this->nascimento);
		if ($this->isColumnModified(UsuarioPeer::SETOR_ID)) $criteria->add(UsuarioPeer::SETOR_ID, $this->setor_id);
		if ($this->isColumnModified(UsuarioPeer::CARGO_ID)) $criteria->add(UsuarioPeer::CARGO_ID, $this->cargo_id);
		if ($this->isColumnModified(UsuarioPeer::SITUACAO)) $criteria->add(UsuarioPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(UsuarioPeer::DATA_CADASTRO)) $criteria->add(UsuarioPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(UsuarioPeer::SAIDA_FERIAS)) $criteria->add(UsuarioPeer::SAIDA_FERIAS, $this->saida_ferias);
		if ($this->isColumnModified(UsuarioPeer::VOLTA_FERIAS)) $criteria->add(UsuarioPeer::VOLTA_FERIAS, $this->volta_ferias);
		if ($this->isColumnModified(UsuarioPeer::LIMITE_QUANTIDADE)) $criteria->add(UsuarioPeer::LIMITE_QUANTIDADE, $this->limite_quantidade);
		if ($this->isColumnModified(UsuarioPeer::MARGEM_DESCONTO)) $criteria->add(UsuarioPeer::MARGEM_DESCONTO, $this->margem_desconto);
		if ($this->isColumnModified(UsuarioPeer::GRUPO_PRODUTO_ID)) $criteria->add(UsuarioPeer::GRUPO_PRODUTO_ID, $this->grupo_produto_id);

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
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Usuario (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLocalId($this->local_id);

		$copyObj->setFotoAvatar($this->foto_avatar);

		$copyObj->setPerfilId($this->perfil_id);

		$copyObj->setLogin($this->login);

		$copyObj->setSenha($this->senha);

		$copyObj->setDataExpiracaoSenha($this->data_expiracao_senha);

		$copyObj->setDataUltimoAcesso($this->data_ultimo_acesso);

		$copyObj->setUrl($this->url);

		$copyObj->setNome($this->nome);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setNumero($this->numero);

		$copyObj->setBairro($this->bairro);

		$copyObj->setCidade($this->cidade);

		$copyObj->setEmail($this->email);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setCpf($this->cpf);

		$copyObj->setFone($this->fone);

		$copyObj->setFone2($this->fone2);

		$copyObj->setCelular($this->celular);

		$copyObj->setNascimento($this->nascimento);

		$copyObj->setSetorId($this->setor_id);

		$copyObj->setCargoId($this->cargo_id);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setDataCadastro($this->data_cadastro);

		$copyObj->setSaidaFerias($this->saida_ferias);

		$copyObj->setVoltaFerias($this->volta_ferias);

		$copyObj->setLimiteQuantidade($this->limite_quantidade);

		$copyObj->setMargemDesconto($this->margem_desconto);

		$copyObj->setGrupoProdutoId($this->grupo_produto_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getParceiroUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addParceiroUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioComissionamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioComissionamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLogSeramas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLogSerama($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLogAcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLogAcesso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadoSituacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoSituacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCuponsDescontoCertificadosRelatedByUsuarioId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCuponsDescontoCertificadoRelatedByUsuarioId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLocalUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLocalUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getImportacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addImportacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadosRelatedByUsuarioId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoRelatedByUsuarioId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadosRelatedByUsuarioValidouId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoRelatedByUsuarioValidouId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClienteHistoricos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClienteHistorico($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadors() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContador($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadorDetalhars() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContadorDetalhar($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBoleto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCaixas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCaixa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAvisos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAviso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAvisoUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAvisoUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectsRelatedByUsuarioId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectRelatedByUsuarioId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectsRelatedBySupervisorUsuarioId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectRelatedBySupervisorUsuarioId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectSituacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectSituacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectAtendimentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectAtendimento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectNegocios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectNegocio($relObj->copy($deepCopy));
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
	 * @return     Usuario Clone of current object.
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
	 * @return     UsuarioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Setor object.
	 *
	 * @param      Setor $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSetor(Setor $v = null)
	{
		if ($v === null) {
			$this->setSetorId(NULL);
		} else {
			$this->setSetorId($v->getId());
		}

		$this->aSetor = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Setor object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Setor object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Setor The associated Setor object.
	 * @throws     PropelException
	 */
	public function getSetor(PropelPDO $con = null)
	{
		if ($this->aSetor === null && ($this->setor_id !== null)) {
			$this->aSetor = SetorPeer::retrieveByPk($this->setor_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSetor->addUsuarios($this);
			 */
		}
		return $this->aSetor;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Usuario The current object (for fluent API support)
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
			$v->addUsuario($this);
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
			   $this->aLocal->addUsuarios($this);
			 */
		}
		return $this->aLocal;
	}

	/**
	 * Declares an association between this object and a Cargo object.
	 *
	 * @param      Cargo $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCargo(Cargo $v = null)
	{
		if ($v === null) {
			$this->setCargoId(NULL);
		} else {
			$this->setCargoId($v->getId());
		}

		$this->aCargo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cargo object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cargo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cargo The associated Cargo object.
	 * @throws     PropelException
	 */
	public function getCargo(PropelPDO $con = null)
	{
		if ($this->aCargo === null && ($this->cargo_id !== null)) {
			$this->aCargo = CargoPeer::retrieveByPk($this->cargo_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCargo->addUsuarios($this);
			 */
		}
		return $this->aCargo;
	}

	/**
	 * Declares an association between this object and a Perfil object.
	 *
	 * @param      Perfil $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPerfil(Perfil $v = null)
	{
		if ($v === null) {
			$this->setPerfilId(NULL);
		} else {
			$this->setPerfilId($v->getId());
		}

		$this->aPerfil = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Perfil object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Perfil object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Perfil The associated Perfil object.
	 * @throws     PropelException
	 */
	public function getPerfil(PropelPDO $con = null)
	{
		if ($this->aPerfil === null && ($this->perfil_id !== null)) {
			$this->aPerfil = PerfilPeer::retrieveByPk($this->perfil_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPerfil->addUsuarios($this);
			 */
		}
		return $this->aPerfil;
	}

	/**
	 * Declares an association between this object and a GrupoProduto object.
	 *
	 * @param      GrupoProduto $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGrupoProduto(GrupoProduto $v = null)
	{
		if ($v === null) {
			$this->setGrupoProdutoId(NULL);
		} else {
			$this->setGrupoProdutoId($v->getId());
		}

		$this->aGrupoProduto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the GrupoProduto object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated GrupoProduto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     GrupoProduto The associated GrupoProduto object.
	 * @throws     PropelException
	 */
	public function getGrupoProduto(PropelPDO $con = null)
	{
		if ($this->aGrupoProduto === null && ($this->grupo_produto_id !== null)) {
			$this->aGrupoProduto = GrupoProdutoPeer::retrieveByPk($this->grupo_produto_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aGrupoProduto->addUsuarios($this);
			 */
		}
		return $this->aGrupoProduto;
	}

	/**
	 * Clears out the collParceiroUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addParceiroUsuarios()
	 */
	public function clearParceiroUsuarios()
	{
		$this->collParceiroUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collParceiroUsuarios collection (array).
	 *
	 * By default this just sets the collParceiroUsuarios collection to an empty array (like clearcollParceiroUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initParceiroUsuarios()
	{
		$this->collParceiroUsuarios = array();
	}

	/**
	 * Gets an array of ParceiroUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ParceiroUsuarios from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ParceiroUsuario[]
	 * @throws     PropelException
	 */
	public function getParceiroUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
			   $this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				ParceiroUsuarioPeer::addSelectColumns($criteria);
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				ParceiroUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
					$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;
		return $this->collParceiroUsuarios;
	}

	/**
	 * Returns the number of related ParceiroUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ParceiroUsuario objects.
	 * @throws     PropelException
	 */
	public function countParceiroUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				$count = ParceiroUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
					$count = ParceiroUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collParceiroUsuarios);
				}
			} else {
				$count = count($this->collParceiroUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ParceiroUsuario object to this object
	 * through the ParceiroUsuario foreign key attribute.
	 *
	 * @param      ParceiroUsuario $l ParceiroUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addParceiroUsuario(ParceiroUsuario $l)
	{
		if ($this->collParceiroUsuarios === null) {
			$this->initParceiroUsuarios();
		}
		if (!in_array($l, $this->collParceiroUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collParceiroUsuarios, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ParceiroUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getParceiroUsuariosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;

		return $this->collParceiroUsuarios;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ParceiroUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getParceiroUsuariosJoinParceiroUsuarioTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiroUsuarioTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiroUsuarioTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;

		return $this->collParceiroUsuarios;
	}

	/**
	 * Clears out the collUsuarioComissionamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarioComissionamentos()
	 */
	public function clearUsuarioComissionamentos()
	{
		$this->collUsuarioComissionamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarioComissionamentos collection (array).
	 *
	 * By default this just sets the collUsuarioComissionamentos collection to an empty array (like clearcollUsuarioComissionamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsuarioComissionamentos()
	{
		$this->collUsuarioComissionamentos = array();
	}

	/**
	 * Gets an array of UsuarioComissionamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related UsuarioComissionamentos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UsuarioComissionamento[]
	 * @throws     PropelException
	 */
	public function getUsuarioComissionamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioComissionamentos === null) {
			if ($this->isNew()) {
			   $this->collUsuarioComissionamentos = array();
			} else {

				$criteria->add(UsuarioComissionamentoPeer::USUARIO_ID, $this->id);

				UsuarioComissionamentoPeer::addSelectColumns($criteria);
				$this->collUsuarioComissionamentos = UsuarioComissionamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsuarioComissionamentoPeer::USUARIO_ID, $this->id);

				UsuarioComissionamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioComissionamentoCriteria) || !$this->lastUsuarioComissionamentoCriteria->equals($criteria)) {
					$this->collUsuarioComissionamentos = UsuarioComissionamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioComissionamentoCriteria = $criteria;
		return $this->collUsuarioComissionamentos;
	}

	/**
	 * Returns the number of related UsuarioComissionamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UsuarioComissionamento objects.
	 * @throws     PropelException
	 */
	public function countUsuarioComissionamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioComissionamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioComissionamentoPeer::USUARIO_ID, $this->id);

				$count = UsuarioComissionamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UsuarioComissionamentoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastUsuarioComissionamentoCriteria) || !$this->lastUsuarioComissionamentoCriteria->equals($criteria)) {
					$count = UsuarioComissionamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collUsuarioComissionamentos);
				}
			} else {
				$count = count($this->collUsuarioComissionamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a UsuarioComissionamento object to this object
	 * through the UsuarioComissionamento foreign key attribute.
	 *
	 * @param      UsuarioComissionamento $l UsuarioComissionamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUsuarioComissionamento(UsuarioComissionamento $l)
	{
		if ($this->collUsuarioComissionamentos === null) {
			$this->initUsuarioComissionamentos();
		}
		if (!in_array($l, $this->collUsuarioComissionamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUsuarioComissionamentos, $l);
			$l->setUsuario($this);
		}
	}

	/**
	 * Clears out the collLogSeramas collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLogSeramas()
	 */
	public function clearLogSeramas()
	{
		$this->collLogSeramas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLogSeramas collection (array).
	 *
	 * By default this just sets the collLogSeramas collection to an empty array (like clearcollLogSeramas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLogSeramas()
	{
		$this->collLogSeramas = array();
	}

	/**
	 * Gets an array of LogSerama objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related LogSeramas from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LogSerama[]
	 * @throws     PropelException
	 */
	public function getLogSeramas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLogSeramas === null) {
			if ($this->isNew()) {
			   $this->collLogSeramas = array();
			} else {

				$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

				LogSeramaPeer::addSelectColumns($criteria);
				$this->collLogSeramas = LogSeramaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

				LogSeramaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLogSeramaCriteria) || !$this->lastLogSeramaCriteria->equals($criteria)) {
					$this->collLogSeramas = LogSeramaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLogSeramaCriteria = $criteria;
		return $this->collLogSeramas;
	}

	/**
	 * Returns the number of related LogSerama objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LogSerama objects.
	 * @throws     PropelException
	 */
	public function countLogSeramas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLogSeramas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

				$count = LogSeramaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastLogSeramaCriteria) || !$this->lastLogSeramaCriteria->equals($criteria)) {
					$count = LogSeramaPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLogSeramas);
				}
			} else {
				$count = count($this->collLogSeramas);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LogSerama object to this object
	 * through the LogSerama foreign key attribute.
	 *
	 * @param      LogSerama $l LogSerama
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLogSerama(LogSerama $l)
	{
		if ($this->collLogSeramas === null) {
			$this->initLogSeramas();
		}
		if (!in_array($l, $this->collLogSeramas, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLogSeramas, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LogSeramas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getLogSeramasJoinAcao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLogSeramas === null) {
			if ($this->isNew()) {
				$this->collLogSeramas = array();
			} else {

				$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

				$this->collLogSeramas = LogSeramaPeer::doSelectJoinAcao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LogSeramaPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastLogSeramaCriteria) || !$this->lastLogSeramaCriteria->equals($criteria)) {
				$this->collLogSeramas = LogSeramaPeer::doSelectJoinAcao($criteria, $con, $join_behavior);
			}
		}
		$this->lastLogSeramaCriteria = $criteria;

		return $this->collLogSeramas;
	}

	/**
	 * Clears out the collLogAcessos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLogAcessos()
	 */
	public function clearLogAcessos()
	{
		$this->collLogAcessos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLogAcessos collection (array).
	 *
	 * By default this just sets the collLogAcessos collection to an empty array (like clearcollLogAcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLogAcessos()
	{
		$this->collLogAcessos = array();
	}

	/**
	 * Gets an array of LogAcesso objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related LogAcessos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LogAcesso[]
	 * @throws     PropelException
	 */
	public function getLogAcessos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLogAcessos === null) {
			if ($this->isNew()) {
			   $this->collLogAcessos = array();
			} else {

				$criteria->add(LogAcessoPeer::USUARIO_ID, $this->id);

				LogAcessoPeer::addSelectColumns($criteria);
				$this->collLogAcessos = LogAcessoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LogAcessoPeer::USUARIO_ID, $this->id);

				LogAcessoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLogAcessoCriteria) || !$this->lastLogAcessoCriteria->equals($criteria)) {
					$this->collLogAcessos = LogAcessoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLogAcessoCriteria = $criteria;
		return $this->collLogAcessos;
	}

	/**
	 * Returns the number of related LogAcesso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LogAcesso objects.
	 * @throws     PropelException
	 */
	public function countLogAcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLogAcessos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LogAcessoPeer::USUARIO_ID, $this->id);

				$count = LogAcessoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LogAcessoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastLogAcessoCriteria) || !$this->lastLogAcessoCriteria->equals($criteria)) {
					$count = LogAcessoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLogAcessos);
				}
			} else {
				$count = count($this->collLogAcessos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LogAcesso object to this object
	 * through the LogAcesso foreign key attribute.
	 *
	 * @param      LogAcesso $l LogAcesso
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLogAcesso(LogAcesso $l)
	{
		if ($this->collLogAcessos === null) {
			$this->initLogAcessos();
		}
		if (!in_array($l, $this->collLogAcessos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLogAcessos, $l);
			$l->setUsuario($this);
		}
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
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related CertificadoSituacaos from storage. If this Usuario is new, it will return
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
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
			   $this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

				CertificadoSituacaoPeer::addSelectColumns($criteria);
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

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
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
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

				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

				$count = CertificadoSituacaoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

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
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadoSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadoSituacaosJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
				$this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoSituacaoCriteria = $criteria;

		return $this->collCertificadoSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadoSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadoSituacaosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoSituacaos === null) {
			if ($this->isNew()) {
				$this->collCertificadoSituacaos = array();
			} else {

				$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoSituacaoCriteria) || !$this->lastCertificadoSituacaoCriteria->equals($criteria)) {
				$this->collCertificadoSituacaos = CertificadoSituacaoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoSituacaoCriteria = $criteria;

		return $this->collCertificadoSituacaos;
	}

	/**
	 * Clears out the collCuponsDescontoCertificadosRelatedByUsuarioId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCuponsDescontoCertificadosRelatedByUsuarioId()
	 */
	public function clearCuponsDescontoCertificadosRelatedByUsuarioId()
	{
		$this->collCuponsDescontoCertificadosRelatedByUsuarioId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCuponsDescontoCertificadosRelatedByUsuarioId collection (array).
	 *
	 * By default this just sets the collCuponsDescontoCertificadosRelatedByUsuarioId collection to an empty array (like clearcollCuponsDescontoCertificadosRelatedByUsuarioId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCuponsDescontoCertificadosRelatedByUsuarioId()
	{
		$this->collCuponsDescontoCertificadosRelatedByUsuarioId = array();
	}

	/**
	 * Gets an array of CuponsDescontoCertificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related CuponsDescontoCertificadosRelatedByUsuarioId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CuponsDescontoCertificado[]
	 * @throws     PropelException
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
			   $this->collCuponsDescontoCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
					$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria = $criteria;
		return $this->collCuponsDescontoCertificadosRelatedByUsuarioId;
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
	public function countCuponsDescontoCertificadosRelatedByUsuarioId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
					$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCuponsDescontoCertificadosRelatedByUsuarioId);
				}
			} else {
				$count = count($this->collCuponsDescontoCertificadosRelatedByUsuarioId);
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
	public function addCuponsDescontoCertificadoRelatedByUsuarioId(CuponsDescontoCertificado $l)
	{
		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId === null) {
			$this->initCuponsDescontoCertificadosRelatedByUsuarioId();
		}
		if (!in_array($l, $this->collCuponsDescontoCertificadosRelatedByUsuarioId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCuponsDescontoCertificadosRelatedByUsuarioId, $l);
			$l->setUsuarioRelatedByUsuarioId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CuponsDescontoCertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioIdJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCuponsDescontoCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CuponsDescontoCertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioIdJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioId = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCuponsDescontoCertificadosRelatedByUsuarioId;
	}

	/**
	 * Clears out the collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId()
	 */
	public function clearCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId()
	{
		$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId collection (array).
	 *
	 * By default this just sets the collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId collection to an empty array (like clearcollCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId()
	{
		$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = array();
	}

	/**
	 * Gets an array of CuponsDescontoCertificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related CuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CuponsDescontoCertificado[]
	 * @throws     PropelException
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId === null) {
			if ($this->isNew()) {
			   $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria->equals($criteria)) {
					$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria = $criteria;
		return $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId;
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
	public function countCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria->equals($criteria)) {
					$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId);
				}
			} else {
				$count = count($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId);
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
	public function addCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoId(CuponsDescontoCertificado $l)
	{
		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId === null) {
			$this->initCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId();
		}
		if (!in_array($l, $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId, $l);
			$l->setUsuarioRelatedByUsuarioAutorizacaoId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoIdJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria = $criteria;

		return $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoIdJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria) || !$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoIdCriteria = $criteria;

		return $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId;
	}

	/**
	 * Clears out the collLocalUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLocalUsuarios()
	 */
	public function clearLocalUsuarios()
	{
		$this->collLocalUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLocalUsuarios collection (array).
	 *
	 * By default this just sets the collLocalUsuarios collection to an empty array (like clearcollLocalUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLocalUsuarios()
	{
		$this->collLocalUsuarios = array();
	}

	/**
	 * Gets an array of LocalUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related LocalUsuarios from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LocalUsuario[]
	 * @throws     PropelException
	 */
	public function getLocalUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
			   $this->collLocalUsuarios = array();
			} else {

				$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

				LocalUsuarioPeer::addSelectColumns($criteria);
				$this->collLocalUsuarios = LocalUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

				LocalUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
					$this->collLocalUsuarios = LocalUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocalUsuarioCriteria = $criteria;
		return $this->collLocalUsuarios;
	}

	/**
	 * Returns the number of related LocalUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LocalUsuario objects.
	 * @throws     PropelException
	 */
	public function countLocalUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

				$count = LocalUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
					$count = LocalUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLocalUsuarios);
				}
			} else {
				$count = count($this->collLocalUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LocalUsuario object to this object
	 * through the LocalUsuario foreign key attribute.
	 *
	 * @param      LocalUsuario $l LocalUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLocalUsuario(LocalUsuario $l)
	{
		if ($this->collLocalUsuarios === null) {
			$this->initLocalUsuarios();
		}
		if (!in_array($l, $this->collLocalUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLocalUsuarios, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LocalUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getLocalUsuariosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
				$this->collLocalUsuarios = array();
			} else {

				$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

				$this->collLocalUsuarios = LocalUsuarioPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LocalUsuarioPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
				$this->collLocalUsuarios = LocalUsuarioPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastLocalUsuarioCriteria = $criteria;

		return $this->collLocalUsuarios;
	}

	/**
	 * Clears out the collImportacaos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addImportacaos()
	 */
	public function clearImportacaos()
	{
		$this->collImportacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collImportacaos collection (array).
	 *
	 * By default this just sets the collImportacaos collection to an empty array (like clearcollImportacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initImportacaos()
	{
		$this->collImportacaos = array();
	}

	/**
	 * Gets an array of Importacao objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related Importacaos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Importacao[]
	 * @throws     PropelException
	 */
	public function getImportacaos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImportacaos === null) {
			if ($this->isNew()) {
			   $this->collImportacaos = array();
			} else {

				$criteria->add(ImportacaoPeer::USUARIO_ID, $this->id);

				ImportacaoPeer::addSelectColumns($criteria);
				$this->collImportacaos = ImportacaoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ImportacaoPeer::USUARIO_ID, $this->id);

				ImportacaoPeer::addSelectColumns($criteria);
				if (!isset($this->lastImportacaoCriteria) || !$this->lastImportacaoCriteria->equals($criteria)) {
					$this->collImportacaos = ImportacaoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastImportacaoCriteria = $criteria;
		return $this->collImportacaos;
	}

	/**
	 * Returns the number of related Importacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Importacao objects.
	 * @throws     PropelException
	 */
	public function countImportacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collImportacaos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ImportacaoPeer::USUARIO_ID, $this->id);

				$count = ImportacaoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ImportacaoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastImportacaoCriteria) || !$this->lastImportacaoCriteria->equals($criteria)) {
					$count = ImportacaoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collImportacaos);
				}
			} else {
				$count = count($this->collImportacaos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Importacao object to this object
	 * through the Importacao foreign key attribute.
	 *
	 * @param      Importacao $l Importacao
	 * @return     void
	 * @throws     PropelException
	 */
	public function addImportacao(Importacao $l)
	{
		if ($this->collImportacaos === null) {
			$this->initImportacaos();
		}
		if (!in_array($l, $this->collImportacaos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collImportacaos, $l);
			$l->setUsuario($this);
		}
	}

	/**
	 * Clears out the collCertificadosRelatedByUsuarioId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadosRelatedByUsuarioId()
	 */
	public function clearCertificadosRelatedByUsuarioId()
	{
		$this->collCertificadosRelatedByUsuarioId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadosRelatedByUsuarioId collection (array).
	 *
	 * By default this just sets the collCertificadosRelatedByUsuarioId collection to an empty array (like clearcollCertificadosRelatedByUsuarioId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadosRelatedByUsuarioId()
	{
		$this->collCertificadosRelatedByUsuarioId = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related CertificadosRelatedByUsuarioId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificadosRelatedByUsuarioId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
			   $this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
					$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;
		return $this->collCertificadosRelatedByUsuarioId;
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
	public function countCertificadosRelatedByUsuarioId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadosRelatedByUsuarioId);
				}
			} else {
				$count = count($this->collCertificadosRelatedByUsuarioId);
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
	public function addCertificadoRelatedByUsuarioId(Certificado $l)
	{
		if ($this->collCertificadosRelatedByUsuarioId === null) {
			$this->initCertificadosRelatedByUsuarioId();
		}
		if (!in_array($l, $this->collCertificadosRelatedByUsuarioId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadosRelatedByUsuarioId, $l);
			$l->setUsuarioRelatedByUsuarioId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioIdJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioIdCriteria) || !$this->lastCertificadoRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioId = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioId;
	}

	/**
	 * Clears out the collCertificadosRelatedByUsuarioValidouId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadosRelatedByUsuarioValidouId()
	 */
	public function clearCertificadosRelatedByUsuarioValidouId()
	{
		$this->collCertificadosRelatedByUsuarioValidouId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadosRelatedByUsuarioValidouId collection (array).
	 *
	 * By default this just sets the collCertificadosRelatedByUsuarioValidouId collection to an empty array (like clearcollCertificadosRelatedByUsuarioValidouId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadosRelatedByUsuarioValidouId()
	{
		$this->collCertificadosRelatedByUsuarioValidouId = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related CertificadosRelatedByUsuarioValidouId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificadosRelatedByUsuarioValidouId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
			   $this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
					$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;
		return $this->collCertificadosRelatedByUsuarioValidouId;
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
	public function countCertificadosRelatedByUsuarioValidouId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadosRelatedByUsuarioValidouId);
				}
			} else {
				$count = count($this->collCertificadosRelatedByUsuarioValidouId);
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
	public function addCertificadoRelatedByUsuarioValidouId(Certificado $l)
	{
		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			$this->initCertificadosRelatedByUsuarioValidouId();
		}
		if (!in_array($l, $this->collCertificadosRelatedByUsuarioValidouId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadosRelatedByUsuarioValidouId, $l);
			$l->setUsuarioRelatedByUsuarioValidouId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CertificadosRelatedByUsuarioValidouId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getCertificadosRelatedByUsuarioValidouIdJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadosRelatedByUsuarioValidouId === null) {
			if ($this->isNew()) {
				$this->collCertificadosRelatedByUsuarioValidouId = array();
			} else {

				$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::USUARIO_VALIDOU_ID, $this->id);

			if (!isset($this->lastCertificadoRelatedByUsuarioValidouIdCriteria) || !$this->lastCertificadoRelatedByUsuarioValidouIdCriteria->equals($criteria)) {
				$this->collCertificadosRelatedByUsuarioValidouId = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoRelatedByUsuarioValidouIdCriteria = $criteria;

		return $this->collCertificadosRelatedByUsuarioValidouId;
	}

	/**
	 * Clears out the collClienteHistoricos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClienteHistoricos()
	 */
	public function clearClienteHistoricos()
	{
		$this->collClienteHistoricos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClienteHistoricos collection (array).
	 *
	 * By default this just sets the collClienteHistoricos collection to an empty array (like clearcollClienteHistoricos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClienteHistoricos()
	{
		$this->collClienteHistoricos = array();
	}

	/**
	 * Gets an array of ClienteHistorico objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ClienteHistoricos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClienteHistorico[]
	 * @throws     PropelException
	 */
	public function getClienteHistoricos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
			   $this->collClienteHistoricos = array();
			} else {

				$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

				ClienteHistoricoPeer::addSelectColumns($criteria);
				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

				ClienteHistoricoPeer::addSelectColumns($criteria);
				if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
					$this->collClienteHistoricos = ClienteHistoricoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClienteHistoricoCriteria = $criteria;
		return $this->collClienteHistoricos;
	}

	/**
	 * Returns the number of related ClienteHistorico objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClienteHistorico objects.
	 * @throws     PropelException
	 */
	public function countClienteHistoricos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

				$count = ClienteHistoricoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
					$count = ClienteHistoricoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collClienteHistoricos);
				}
			} else {
				$count = count($this->collClienteHistoricos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ClienteHistorico object to this object
	 * through the ClienteHistorico foreign key attribute.
	 *
	 * @param      ClienteHistorico $l ClienteHistorico
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClienteHistorico(ClienteHistorico $l)
	{
		if ($this->collClienteHistoricos === null) {
			$this->initClienteHistoricos();
		}
		if (!in_array($l, $this->collClienteHistoricos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClienteHistoricos, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ClienteHistoricos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getClienteHistoricosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
				$this->collClienteHistoricos = array();
			} else {

				$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClienteHistoricoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteHistoricoCriteria = $criteria;

		return $this->collClienteHistoricos;
	}

	/**
	 * Clears out the collContadors collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadors()
	 */
	public function clearContadors()
	{
		$this->collContadors = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadors collection (array).
	 *
	 * By default this just sets the collContadors collection to an empty array (like clearcollContadors());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadors()
	{
		$this->collContadors = array();
	}

	/**
	 * Gets an array of Contador objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related Contadors from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Contador[]
	 * @throws     PropelException
	 */
	public function getContadors($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
			   $this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				$this->collContadors = ContadorPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$this->collContadors = ContadorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorCriteria = $criteria;
		return $this->collContadors;
	}

	/**
	 * Returns the number of related Contador objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contador objects.
	 * @throws     PropelException
	 */
	public function countContadors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				$count = ContadorPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$count = ContadorPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadors);
				}
			} else {
				$count = count($this->collContadors);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Contador object to this object
	 * through the Contador foreign key attribute.
	 *
	 * @param      Contador $l Contador
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContador(Contador $l)
	{
		if ($this->collContadors === null) {
			$this->initContadors();
		}
		if (!in_array($l, $this->collContadors, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadors, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getContadorsJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getContadorsJoinResponsavel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
	}

	/**
	 * Clears out the collContadorDetalhars collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadorDetalhars()
	 */
	public function clearContadorDetalhars()
	{
		$this->collContadorDetalhars = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadorDetalhars collection (array).
	 *
	 * By default this just sets the collContadorDetalhars collection to an empty array (like clearcollContadorDetalhars());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadorDetalhars()
	{
		$this->collContadorDetalhars = array();
	}

	/**
	 * Gets an array of ContadorDetalhar objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ContadorDetalhars from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContadorDetalhar[]
	 * @throws     PropelException
	 */
	public function getContadorDetalhars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
			   $this->collContadorDetalhars = array();
			} else {

				$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

				ContadorDetalharPeer::addSelectColumns($criteria);
				$this->collContadorDetalhars = ContadorDetalharPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

				ContadorDetalharPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
					$this->collContadorDetalhars = ContadorDetalharPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorDetalharCriteria = $criteria;
		return $this->collContadorDetalhars;
	}

	/**
	 * Returns the number of related ContadorDetalhar objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContadorDetalhar objects.
	 * @throws     PropelException
	 */
	public function countContadorDetalhars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

				$count = ContadorDetalharPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
					$count = ContadorDetalharPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadorDetalhars);
				}
			} else {
				$count = count($this->collContadorDetalhars);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContadorDetalhar object to this object
	 * through the ContadorDetalhar foreign key attribute.
	 *
	 * @param      ContadorDetalhar $l ContadorDetalhar
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContadorDetalhar(ContadorDetalhar $l)
	{
		if ($this->collContadorDetalhars === null) {
			$this->initContadorDetalhars();
		}
		if (!in_array($l, $this->collContadorDetalhars, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadorDetalhars, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ContadorDetalhars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getContadorDetalharsJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
				$this->collContadorDetalhars = array();
			} else {

				$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

				$this->collContadorDetalhars = ContadorDetalharPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorDetalharPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
				$this->collContadorDetalhars = ContadorDetalharPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorDetalharCriteria = $criteria;

		return $this->collContadorDetalhars;
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
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related Boletos from storage. If this Usuario is new, it will return
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
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
			   $this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

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
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
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

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				$count = BoletoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

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
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getBoletosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getBoletosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

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
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getBoletosJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

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
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getBoletosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}

	/**
	 * Clears out the collCaixas collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCaixas()
	 */
	public function clearCaixas()
	{
		$this->collCaixas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCaixas collection (array).
	 *
	 * By default this just sets the collCaixas collection to an empty array (like clearcollCaixas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCaixas()
	{
		$this->collCaixas = array();
	}

	/**
	 * Gets an array of Caixa objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related Caixas from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Caixa[]
	 * @throws     PropelException
	 */
	public function getCaixas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaixas === null) {
			if ($this->isNew()) {
			   $this->collCaixas = array();
			} else {

				$criteria->add(CaixaPeer::USUARIO_ID, $this->id);

				CaixaPeer::addSelectColumns($criteria);
				$this->collCaixas = CaixaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CaixaPeer::USUARIO_ID, $this->id);

				CaixaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaixaCriteria) || !$this->lastCaixaCriteria->equals($criteria)) {
					$this->collCaixas = CaixaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaixaCriteria = $criteria;
		return $this->collCaixas;
	}

	/**
	 * Returns the number of related Caixa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Caixa objects.
	 * @throws     PropelException
	 */
	public function countCaixas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCaixas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CaixaPeer::USUARIO_ID, $this->id);

				$count = CaixaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CaixaPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastCaixaCriteria) || !$this->lastCaixaCriteria->equals($criteria)) {
					$count = CaixaPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCaixas);
				}
			} else {
				$count = count($this->collCaixas);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Caixa object to this object
	 * through the Caixa foreign key attribute.
	 *
	 * @param      Caixa $l Caixa
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCaixa(Caixa $l)
	{
		if ($this->collCaixas === null) {
			$this->initCaixas();
		}
		if (!in_array($l, $this->collCaixas, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCaixas, $l);
			$l->setUsuario($this);
		}
	}

	/**
	 * Clears out the collAvisos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAvisos()
	 */
	public function clearAvisos()
	{
		$this->collAvisos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAvisos collection (array).
	 *
	 * By default this just sets the collAvisos collection to an empty array (like clearcollAvisos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAvisos()
	{
		$this->collAvisos = array();
	}

	/**
	 * Gets an array of Aviso objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related Avisos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Aviso[]
	 * @throws     PropelException
	 */
	public function getAvisos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisos === null) {
			if ($this->isNew()) {
			   $this->collAvisos = array();
			} else {

				$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

				AvisoPeer::addSelectColumns($criteria);
				$this->collAvisos = AvisoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

				AvisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAvisoCriteria) || !$this->lastAvisoCriteria->equals($criteria)) {
					$this->collAvisos = AvisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAvisoCriteria = $criteria;
		return $this->collAvisos;
	}

	/**
	 * Returns the number of related Aviso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Aviso objects.
	 * @throws     PropelException
	 */
	public function countAvisos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAvisos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

				$count = AvisoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastAvisoCriteria) || !$this->lastAvisoCriteria->equals($criteria)) {
					$count = AvisoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collAvisos);
				}
			} else {
				$count = count($this->collAvisos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Aviso object to this object
	 * through the Aviso foreign key attribute.
	 *
	 * @param      Aviso $l Aviso
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAviso(Aviso $l)
	{
		if ($this->collAvisos === null) {
			$this->initAvisos();
		}
		if (!in_array($l, $this->collAvisos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAvisos, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Avisos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getAvisosJoinTipoAviso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisos === null) {
			if ($this->isNew()) {
				$this->collAvisos = array();
			} else {

				$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

				$this->collAvisos = AvisoPeer::doSelectJoinTipoAviso($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AvisoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastAvisoCriteria) || !$this->lastAvisoCriteria->equals($criteria)) {
				$this->collAvisos = AvisoPeer::doSelectJoinTipoAviso($criteria, $con, $join_behavior);
			}
		}
		$this->lastAvisoCriteria = $criteria;

		return $this->collAvisos;
	}

	/**
	 * Clears out the collAvisoUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAvisoUsuarios()
	 */
	public function clearAvisoUsuarios()
	{
		$this->collAvisoUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAvisoUsuarios collection (array).
	 *
	 * By default this just sets the collAvisoUsuarios collection to an empty array (like clearcollAvisoUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAvisoUsuarios()
	{
		$this->collAvisoUsuarios = array();
	}

	/**
	 * Gets an array of AvisoUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related AvisoUsuarios from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AvisoUsuario[]
	 * @throws     PropelException
	 */
	public function getAvisoUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
			   $this->collAvisoUsuarios = array();
			} else {

				$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

				AvisoUsuarioPeer::addSelectColumns($criteria);
				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

				AvisoUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
					$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAvisoUsuarioCriteria = $criteria;
		return $this->collAvisoUsuarios;
	}

	/**
	 * Returns the number of related AvisoUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AvisoUsuario objects.
	 * @throws     PropelException
	 */
	public function countAvisoUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

				$count = AvisoUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
					$count = AvisoUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collAvisoUsuarios);
				}
			} else {
				$count = count($this->collAvisoUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a AvisoUsuario object to this object
	 * through the AvisoUsuario foreign key attribute.
	 *
	 * @param      AvisoUsuario $l AvisoUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAvisoUsuario(AvisoUsuario $l)
	{
		if ($this->collAvisoUsuarios === null) {
			$this->initAvisoUsuarios();
		}
		if (!in_array($l, $this->collAvisoUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAvisoUsuarios, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related AvisoUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getAvisoUsuariosJoinAviso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
				$this->collAvisoUsuarios = array();
			} else {

				$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelectJoinAviso($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AvisoUsuarioPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelectJoinAviso($criteria, $con, $join_behavior);
			}
		}
		$this->lastAvisoUsuarioCriteria = $criteria;

		return $this->collAvisoUsuarios;
	}

	/**
	 * Clears out the collProspectsRelatedByUsuarioId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectsRelatedByUsuarioId()
	 */
	public function clearProspectsRelatedByUsuarioId()
	{
		$this->collProspectsRelatedByUsuarioId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectsRelatedByUsuarioId collection (array).
	 *
	 * By default this just sets the collProspectsRelatedByUsuarioId collection to an empty array (like clearcollProspectsRelatedByUsuarioId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectsRelatedByUsuarioId()
	{
		$this->collProspectsRelatedByUsuarioId = array();
	}

	/**
	 * Gets an array of Prospect objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectsRelatedByUsuarioId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Prospect[]
	 * @throws     PropelException
	 */
	public function getProspectsRelatedByUsuarioId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
			   $this->collProspectsRelatedByUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
					$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectRelatedByUsuarioIdCriteria = $criteria;
		return $this->collProspectsRelatedByUsuarioId;
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
	public function countProspectsRelatedByUsuarioId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
					$count = ProspectPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectsRelatedByUsuarioId);
				}
			} else {
				$count = count($this->collProspectsRelatedByUsuarioId);
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
	public function addProspectRelatedByUsuarioId(Prospect $l)
	{
		if ($this->collProspectsRelatedByUsuarioId === null) {
			$this->initProspectsRelatedByUsuarioId();
		}
		if (!in_array($l, $this->collProspectsRelatedByUsuarioId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectsRelatedByUsuarioId, $l);
			$l->setUsuarioRelatedByUsuarioId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedByUsuarioIdJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedByUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedByUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedByUsuarioIdJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedByUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedByUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedByUsuarioIdJoinProspectContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedByUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedByUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedByUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedByUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedByUsuarioIdJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedByUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedByUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedByUsuarioIdCriteria) || !$this->lastProspectRelatedByUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedByUsuarioId = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedByUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedByUsuarioId;
	}

	/**
	 * Clears out the collProspectsRelatedBySupervisorUsuarioId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectsRelatedBySupervisorUsuarioId()
	 */
	public function clearProspectsRelatedBySupervisorUsuarioId()
	{
		$this->collProspectsRelatedBySupervisorUsuarioId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectsRelatedBySupervisorUsuarioId collection (array).
	 *
	 * By default this just sets the collProspectsRelatedBySupervisorUsuarioId collection to an empty array (like clearcollProspectsRelatedBySupervisorUsuarioId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectsRelatedBySupervisorUsuarioId()
	{
		$this->collProspectsRelatedBySupervisorUsuarioId = array();
	}

	/**
	 * Gets an array of Prospect objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectsRelatedBySupervisorUsuarioId from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Prospect[]
	 * @throws     PropelException
	 */
	public function getProspectsRelatedBySupervisorUsuarioId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
			   $this->collProspectsRelatedBySupervisorUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
					$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = $criteria;
		return $this->collProspectsRelatedBySupervisorUsuarioId;
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
	public function countProspectsRelatedBySupervisorUsuarioId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
					$count = ProspectPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectsRelatedBySupervisorUsuarioId);
				}
			} else {
				$count = count($this->collProspectsRelatedBySupervisorUsuarioId);
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
	public function addProspectRelatedBySupervisorUsuarioId(Prospect $l)
	{
		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			$this->initProspectsRelatedBySupervisorUsuarioId();
		}
		if (!in_array($l, $this->collProspectsRelatedBySupervisorUsuarioId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectsRelatedBySupervisorUsuarioId, $l);
			$l->setUsuarioRelatedBySupervisorUsuarioId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedBySupervisorUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedBySupervisorUsuarioIdJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedBySupervisorUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedBySupervisorUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedBySupervisorUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedBySupervisorUsuarioIdJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedBySupervisorUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedBySupervisorUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedBySupervisorUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedBySupervisorUsuarioIdJoinProspectContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedBySupervisorUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedBySupervisorUsuarioId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectsRelatedBySupervisorUsuarioId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectsRelatedBySupervisorUsuarioIdJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectsRelatedBySupervisorUsuarioId === null) {
			if ($this->isNew()) {
				$this->collProspectsRelatedBySupervisorUsuarioId = array();
			} else {

				$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->id);

			if (!isset($this->lastProspectRelatedBySupervisorUsuarioIdCriteria) || !$this->lastProspectRelatedBySupervisorUsuarioIdCriteria->equals($criteria)) {
				$this->collProspectsRelatedBySupervisorUsuarioId = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectRelatedBySupervisorUsuarioIdCriteria = $criteria;

		return $this->collProspectsRelatedBySupervisorUsuarioId;
	}

	/**
	 * Clears out the collProspectContatos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectContatos()
	 */
	public function clearProspectContatos()
	{
		$this->collProspectContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectContatos collection (array).
	 *
	 * By default this just sets the collProspectContatos collection to an empty array (like clearcollProspectContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectContatos()
	{
		$this->collProspectContatos = array();
	}

	/**
	 * Gets an array of ProspectContato objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectContatos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectContato[]
	 * @throws     PropelException
	 */
	public function getProspectContatos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
			   $this->collProspectContatos = array();
			} else {

				$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

				ProspectContatoPeer::addSelectColumns($criteria);
				$this->collProspectContatos = ProspectContatoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

				ProspectContatoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
					$this->collProspectContatos = ProspectContatoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectContatoCriteria = $criteria;
		return $this->collProspectContatos;
	}

	/**
	 * Returns the number of related ProspectContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectContato objects.
	 * @throws     PropelException
	 */
	public function countProspectContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

				$count = ProspectContatoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
					$count = ProspectContatoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectContatos);
				}
			} else {
				$count = count($this->collProspectContatos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectContato object to this object
	 * through the ProspectContato foreign key attribute.
	 *
	 * @param      ProspectContato $l ProspectContato
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectContato(ProspectContato $l)
	{
		if ($this->collProspectContatos === null) {
			$this->initProspectContatos();
		}
		if (!in_array($l, $this->collProspectContatos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectContatos, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectContatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectContatosJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
				$this->collProspectContatos = array();
			} else {

				$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

				$this->collProspectContatos = ProspectContatoPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectContatoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
				$this->collProspectContatos = ProspectContatoPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectContatoCriteria = $criteria;

		return $this->collProspectContatos;
	}

	/**
	 * Clears out the collProspectSituacaos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectSituacaos()
	 */
	public function clearProspectSituacaos()
	{
		$this->collProspectSituacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectSituacaos collection (array).
	 *
	 * By default this just sets the collProspectSituacaos collection to an empty array (like clearcollProspectSituacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectSituacaos()
	{
		$this->collProspectSituacaos = array();
	}

	/**
	 * Gets an array of ProspectSituacao objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectSituacaos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectSituacao[]
	 * @throws     PropelException
	 */
	public function getProspectSituacaos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
			   $this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				ProspectSituacaoPeer::addSelectColumns($criteria);
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				ProspectSituacaoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
					$this->collProspectSituacaos = ProspectSituacaoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;
		return $this->collProspectSituacaos;
	}

	/**
	 * Returns the number of related ProspectSituacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectSituacao objects.
	 * @throws     PropelException
	 */
	public function countProspectSituacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				$count = ProspectSituacaoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
					$count = ProspectSituacaoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectSituacaos);
				}
			} else {
				$count = count($this->collProspectSituacaos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectSituacao object to this object
	 * through the ProspectSituacao foreign key attribute.
	 *
	 * @param      ProspectSituacao $l ProspectSituacao
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectSituacao(ProspectSituacao $l)
	{
		if ($this->collProspectSituacaos === null) {
			$this->initProspectSituacaos();
		}
		if (!in_array($l, $this->collProspectSituacaos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectSituacaos, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectSituacaosJoinProspectAcao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectAcao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectAcao($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectSituacaosJoinProspectMeioContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectSituacaosJoinProspect($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}

	/**
	 * Clears out the collProspectAtendimentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectAtendimentos()
	 */
	public function clearProspectAtendimentos()
	{
		$this->collProspectAtendimentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectAtendimentos collection (array).
	 *
	 * By default this just sets the collProspectAtendimentos collection to an empty array (like clearcollProspectAtendimentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectAtendimentos()
	{
		$this->collProspectAtendimentos = array();
	}

	/**
	 * Gets an array of ProspectAtendimento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectAtendimentos from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectAtendimento[]
	 * @throws     PropelException
	 */
	public function getProspectAtendimentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
			   $this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				ProspectAtendimentoPeer::addSelectColumns($criteria);
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				ProspectAtendimentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
					$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;
		return $this->collProspectAtendimentos;
	}

	/**
	 * Returns the number of related ProspectAtendimento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectAtendimento objects.
	 * @throws     PropelException
	 */
	public function countProspectAtendimentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				$count = ProspectAtendimentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
					$count = ProspectAtendimentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectAtendimentos);
				}
			} else {
				$count = count($this->collProspectAtendimentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectAtendimento object to this object
	 * through the ProspectAtendimento foreign key attribute.
	 *
	 * @param      ProspectAtendimento $l ProspectAtendimento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectAtendimento(ProspectAtendimento $l)
	{
		if ($this->collProspectAtendimentos === null) {
			$this->initProspectAtendimentos();
		}
		if (!in_array($l, $this->collProspectAtendimentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectAtendimentos, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectAtendimentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectAtendimentosJoinProspectMeioContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;

		return $this->collProspectAtendimentos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectAtendimentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectAtendimentosJoinProspect($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectAtendimentoPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;

		return $this->collProspectAtendimentos;
	}

	/**
	 * Clears out the collProspectNegocios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectNegocios()
	 */
	public function clearProspectNegocios()
	{
		$this->collProspectNegocios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectNegocios collection (array).
	 *
	 * By default this just sets the collProspectNegocios collection to an empty array (like clearcollProspectNegocios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectNegocios()
	{
		$this->collProspectNegocios = array();
	}

	/**
	 * Gets an array of ProspectNegocio objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Usuario has previously been saved, it will retrieve
	 * related ProspectNegocios from storage. If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectNegocio[]
	 * @throws     PropelException
	 */
	public function getProspectNegocios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
			   $this->collProspectNegocios = array();
			} else {

				$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

				ProspectNegocioPeer::addSelectColumns($criteria);
				$this->collProspectNegocios = ProspectNegocioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

				ProspectNegocioPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
					$this->collProspectNegocios = ProspectNegocioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectNegocioCriteria = $criteria;
		return $this->collProspectNegocios;
	}

	/**
	 * Returns the number of related ProspectNegocio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectNegocio objects.
	 * @throws     PropelException
	 */
	public function countProspectNegocios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

				$count = ProspectNegocioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

				if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
					$count = ProspectNegocioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectNegocios);
				}
			} else {
				$count = count($this->collProspectNegocios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectNegocio object to this object
	 * through the ProspectNegocio foreign key attribute.
	 *
	 * @param      ProspectNegocio $l ProspectNegocio
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectNegocio(ProspectNegocio $l)
	{
		if ($this->collProspectNegocios === null) {
			$this->initProspectNegocios();
		}
		if (!in_array($l, $this->collProspectNegocios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectNegocios, $l);
			$l->setUsuario($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ProspectNegocios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getProspectNegociosJoinProspect($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
				$this->collProspectNegocios = array();
			} else {

				$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

				$this->collProspectNegocios = ProspectNegocioPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectNegocioPeer::USUARIO_ID, $this->id);

			if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
				$this->collProspectNegocios = ProspectNegocioPeer::doSelectJoinProspect($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectNegocioCriteria = $criteria;

		return $this->collProspectNegocios;
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
			if ($this->collParceiroUsuarios) {
				foreach ((array) $this->collParceiroUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioComissionamentos) {
				foreach ((array) $this->collUsuarioComissionamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLogSeramas) {
				foreach ((array) $this->collLogSeramas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLogAcessos) {
				foreach ((array) $this->collLogAcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadoSituacaos) {
				foreach ((array) $this->collCertificadoSituacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCuponsDescontoCertificadosRelatedByUsuarioId) {
				foreach ((array) $this->collCuponsDescontoCertificadosRelatedByUsuarioId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId) {
				foreach ((array) $this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLocalUsuarios) {
				foreach ((array) $this->collLocalUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collImportacaos) {
				foreach ((array) $this->collImportacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadosRelatedByUsuarioId) {
				foreach ((array) $this->collCertificadosRelatedByUsuarioId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadosRelatedByUsuarioValidouId) {
				foreach ((array) $this->collCertificadosRelatedByUsuarioValidouId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClienteHistoricos) {
				foreach ((array) $this->collClienteHistoricos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadors) {
				foreach ((array) $this->collContadors as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadorDetalhars) {
				foreach ((array) $this->collContadorDetalhars as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletos) {
				foreach ((array) $this->collBoletos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCaixas) {
				foreach ((array) $this->collCaixas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAvisos) {
				foreach ((array) $this->collAvisos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAvisoUsuarios) {
				foreach ((array) $this->collAvisoUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectsRelatedByUsuarioId) {
				foreach ((array) $this->collProspectsRelatedByUsuarioId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectsRelatedBySupervisorUsuarioId) {
				foreach ((array) $this->collProspectsRelatedBySupervisorUsuarioId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectContatos) {
				foreach ((array) $this->collProspectContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectSituacaos) {
				foreach ((array) $this->collProspectSituacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectAtendimentos) {
				foreach ((array) $this->collProspectAtendimentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectNegocios) {
				foreach ((array) $this->collProspectNegocios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collParceiroUsuarios = null;
		$this->collUsuarioComissionamentos = null;
		$this->collLogSeramas = null;
		$this->collLogAcessos = null;
		$this->collCertificadoSituacaos = null;
		$this->collCuponsDescontoCertificadosRelatedByUsuarioId = null;
		$this->collCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId = null;
		$this->collLocalUsuarios = null;
		$this->collImportacaos = null;
		$this->collCertificadosRelatedByUsuarioId = null;
		$this->collCertificadosRelatedByUsuarioValidouId = null;
		$this->collClienteHistoricos = null;
		$this->collContadors = null;
		$this->collContadorDetalhars = null;
		$this->collBoletos = null;
		$this->collCaixas = null;
		$this->collAvisos = null;
		$this->collAvisoUsuarios = null;
		$this->collProspectsRelatedByUsuarioId = null;
		$this->collProspectsRelatedBySupervisorUsuarioId = null;
		$this->collProspectContatos = null;
		$this->collProspectSituacaos = null;
		$this->collProspectAtendimentos = null;
		$this->collProspectNegocios = null;
			$this->aSetor = null;
			$this->aLocal = null;
			$this->aCargo = null;
			$this->aPerfil = null;
			$this->aGrupoProduto = null;
	}

} // BaseUsuario
