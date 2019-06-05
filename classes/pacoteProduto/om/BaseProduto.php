<?php

/**
 * Base class that represents a row from the 'produto' table.
 *
 * 
 *
 * @package    pacoteProduto.om
 */
abstract class BaseProduto extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProdutoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the fornecedor_id field.
	 * @var        int
	 */
	protected $fornecedor_id;

	/**
	 * The value for the codigo field.
	 * @var        int
	 */
	protected $codigo;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the preco field.
	 * @var        double
	 */
	protected $preco;

	/**
	 * The value for the preco_antigo2 field.
	 * @var        double
	 */
	protected $preco_antigo2;

	/**
	 * The value for the preco_antigo field.
	 * @var        double
	 */
	protected $preco_antigo;

	/**
	 * The value for the preco_custo field.
	 * @var        double
	 */
	protected $preco_custo;

	/**
	 * The value for the pessoa_tipo field.
	 * @var        string
	 */
	protected $pessoa_tipo;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the validade field.
	 * @var        int
	 */
	protected $validade;

	/**
	 * The value for the produto_id field.
	 * @var        int
	 */
	protected $produto_id;

	/**
	 * The value for the comissao field.
	 * @var        double
	 */
	protected $comissao;

	/**
	 * The value for the produto_loja field.
	 * @var        int
	 */
	protected $produto_loja;

	/**
	 * @var        Fornecedor
	 */
	protected $aFornecedor;

	/**
	 * @var        Produto
	 */
	protected $aProdutoRelatedByProdutoId;

	/**
	 * @var        array CuponsDescontoCertificado[] Collection to store aggregation of CuponsDescontoCertificado objects.
	 */
	protected $collCuponsDescontoCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCuponsDescontoCertificados.
	 */
	private $lastCuponsDescontoCertificadoCriteria = null;

	/**
	 * @var        array Produto[] Collection to store aggregation of Produto objects.
	 */
	protected $collProdutosRelatedByProdutoId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProdutosRelatedByProdutoId.
	 */
	private $lastProdutoRelatedByProdutoIdCriteria = null;

	/**
	 * @var        array LocalProduto[] Collection to store aggregation of LocalProduto objects.
	 */
	protected $collLocalProdutos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLocalProdutos.
	 */
	private $lastLocalProdutoCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

	/**
	 * @var        array ItemPedido[] Collection to store aggregation of ItemPedido objects.
	 */
	protected $collItemPedidos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collItemPedidos.
	 */
	private $lastItemPedidoCriteria = null;

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
	 * Get the [fornecedor_id] column value.
	 * 
	 * @return     int
	 */
	public function getFornecedorId()
	{
		return $this->fornecedor_id;
	}

	/**
	 * Get the [codigo] column value.
	 * 
	 * @return     int
	 */
	public function getCodigo()
	{
		return $this->codigo;
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
	 * Get the [preco] column value.
	 * 
	 * @return     double
	 */
	public function getPreco()
	{
		return $this->preco;
	}

	/**
	 * Get the [preco_antigo2] column value.
	 * 
	 * @return     double
	 */
	public function getPrecoAntigo2()
	{
		return $this->preco_antigo2;
	}

	/**
	 * Get the [preco_antigo] column value.
	 * 
	 * @return     double
	 */
	public function getPrecoAntigo()
	{
		return $this->preco_antigo;
	}

	/**
	 * Get the [preco_custo] column value.
	 * 
	 * @return     double
	 */
	public function getPrecoCusto()
	{
		return $this->preco_custo;
	}

	/**
	 * Get the [pessoa_tipo] column value.
	 * 
	 * @return     string
	 */
	public function getPessoaTipo()
	{
		return $this->pessoa_tipo;
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
	 * Get the [validade] column value.
	 * 
	 * @return     int
	 */
	public function getValidade()
	{
		return $this->validade;
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
	 * Get the [comissao] column value.
	 * 
	 * @return     double
	 */
	public function getComissao()
	{
		return $this->comissao;
	}

	/**
	 * Get the [produto_loja] column value.
	 * 
	 * @return     int
	 */
	public function getProdutoLoja()
	{
		return $this->produto_loja;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProdutoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [fornecedor_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setFornecedorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fornecedor_id !== $v) {
			$this->fornecedor_id = $v;
			$this->modifiedColumns[] = ProdutoPeer::FORNECEDOR_ID;
		}

		if ($this->aFornecedor !== null && $this->aFornecedor->getId() !== $v) {
			$this->aFornecedor = null;
		}

		return $this;
	} // setFornecedorId()

	/**
	 * Set the value of [codigo] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setCodigo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = ProdutoPeer::CODIGO;
		}

		return $this;
	} // setCodigo()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ProdutoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [preco] column.
	 * 
	 * @param      double $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setPreco($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->preco !== $v) {
			$this->preco = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRECO;
		}

		return $this;
	} // setPreco()

	/**
	 * Set the value of [preco_antigo2] column.
	 * 
	 * @param      double $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setPrecoAntigo2($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->preco_antigo2 !== $v) {
			$this->preco_antigo2 = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRECO_ANTIGO2;
		}

		return $this;
	} // setPrecoAntigo2()

	/**
	 * Set the value of [preco_antigo] column.
	 * 
	 * @param      double $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setPrecoAntigo($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->preco_antigo !== $v) {
			$this->preco_antigo = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRECO_ANTIGO;
		}

		return $this;
	} // setPrecoAntigo()

	/**
	 * Set the value of [preco_custo] column.
	 * 
	 * @param      double $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setPrecoCusto($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->preco_custo !== $v) {
			$this->preco_custo = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRECO_CUSTO;
		}

		return $this;
	} // setPrecoCusto()

	/**
	 * Set the value of [pessoa_tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setPessoaTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pessoa_tipo !== $v) {
			$this->pessoa_tipo = $v;
			$this->modifiedColumns[] = ProdutoPeer::PESSOA_TIPO;
		}

		return $this;
	} // setPessoaTipo()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ProdutoPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Set the value of [validade] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setValidade($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->validade !== $v) {
			$this->validade = $v;
			$this->modifiedColumns[] = ProdutoPeer::VALIDADE;
		}

		return $this;
	} // setValidade()

	/**
	 * Set the value of [produto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setProdutoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->produto_id !== $v) {
			$this->produto_id = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRODUTO_ID;
		}

		if ($this->aProdutoRelatedByProdutoId !== null && $this->aProdutoRelatedByProdutoId->getId() !== $v) {
			$this->aProdutoRelatedByProdutoId = null;
		}

		return $this;
	} // setProdutoId()

	/**
	 * Set the value of [comissao] column.
	 * 
	 * @param      double $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setComissao($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->comissao !== $v) {
			$this->comissao = $v;
			$this->modifiedColumns[] = ProdutoPeer::COMISSAO;
		}

		return $this;
	} // setComissao()

	/**
	 * Set the value of [produto_loja] column.
	 * 
	 * @param      int $v new value
	 * @return     Produto The current object (for fluent API support)
	 */
	public function setProdutoLoja($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->produto_loja !== $v) {
			$this->produto_loja = $v;
			$this->modifiedColumns[] = ProdutoPeer::PRODUTO_LOJA;
		}

		return $this;
	} // setProdutoLoja()

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
			$this->fornecedor_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->codigo = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nome = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->preco = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->preco_antigo2 = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
			$this->preco_antigo = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->preco_custo = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->pessoa_tipo = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->situacao = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->validade = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->produto_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->comissao = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
			$this->produto_loja = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 14; // 14 = ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Produto object", $e);
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

		if ($this->aFornecedor !== null && $this->fornecedor_id !== $this->aFornecedor->getId()) {
			$this->aFornecedor = null;
		}
		if ($this->aProdutoRelatedByProdutoId !== null && $this->produto_id !== $this->aProdutoRelatedByProdutoId->getId()) {
			$this->aProdutoRelatedByProdutoId = null;
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
			$con = Propel::getConnection(ProdutoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProdutoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aFornecedor = null;
			$this->aProdutoRelatedByProdutoId = null;
			$this->collCuponsDescontoCertificados = null;
			$this->lastCuponsDescontoCertificadoCriteria = null;

			$this->collProdutosRelatedByProdutoId = null;
			$this->lastProdutoRelatedByProdutoIdCriteria = null;

			$this->collLocalProdutos = null;
			$this->lastLocalProdutoCriteria = null;

			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

			$this->collItemPedidos = null;
			$this->lastItemPedidoCriteria = null;

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
			$con = Propel::getConnection(ProdutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProdutoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProdutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProdutoPeer::addInstanceToPool($this);
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

			if ($this->aFornecedor !== null) {
				if ($this->aFornecedor->isModified() || $this->aFornecedor->isNew()) {
					$affectedRows += $this->aFornecedor->save($con);
				}
				$this->setFornecedor($this->aFornecedor);
			}

			if ($this->aProdutoRelatedByProdutoId !== null) {
				if ($this->aProdutoRelatedByProdutoId->isModified() || $this->aProdutoRelatedByProdutoId->isNew()) {
					$affectedRows += $this->aProdutoRelatedByProdutoId->save($con);
				}
				$this->setProdutoRelatedByProdutoId($this->aProdutoRelatedByProdutoId);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProdutoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProdutoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProdutoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCuponsDescontoCertificados !== null) {
				foreach ($this->collCuponsDescontoCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProdutosRelatedByProdutoId !== null) {
				foreach ($this->collProdutosRelatedByProdutoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLocalProdutos !== null) {
				foreach ($this->collLocalProdutos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificados !== null) {
				foreach ($this->collCertificados as $referrerFK) {
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

			if ($this->aFornecedor !== null) {
				if (!$this->aFornecedor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFornecedor->getValidationFailures());
				}
			}

			if ($this->aProdutoRelatedByProdutoId !== null) {
				if (!$this->aProdutoRelatedByProdutoId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProdutoRelatedByProdutoId->getValidationFailures());
				}
			}


			if (($retval = ProdutoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCuponsDescontoCertificados !== null) {
					foreach ($this->collCuponsDescontoCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProdutosRelatedByProdutoId !== null) {
					foreach ($this->collProdutosRelatedByProdutoId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLocalProdutos !== null) {
					foreach ($this->collLocalProdutos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificados !== null) {
					foreach ($this->collCertificados as $referrerFK) {
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
		$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProdutoPeer::ID)) $criteria->add(ProdutoPeer::ID, $this->id);
		if ($this->isColumnModified(ProdutoPeer::FORNECEDOR_ID)) $criteria->add(ProdutoPeer::FORNECEDOR_ID, $this->fornecedor_id);
		if ($this->isColumnModified(ProdutoPeer::CODIGO)) $criteria->add(ProdutoPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(ProdutoPeer::NOME)) $criteria->add(ProdutoPeer::NOME, $this->nome);
		if ($this->isColumnModified(ProdutoPeer::PRECO)) $criteria->add(ProdutoPeer::PRECO, $this->preco);
		if ($this->isColumnModified(ProdutoPeer::PRECO_ANTIGO2)) $criteria->add(ProdutoPeer::PRECO_ANTIGO2, $this->preco_antigo2);
		if ($this->isColumnModified(ProdutoPeer::PRECO_ANTIGO)) $criteria->add(ProdutoPeer::PRECO_ANTIGO, $this->preco_antigo);
		if ($this->isColumnModified(ProdutoPeer::PRECO_CUSTO)) $criteria->add(ProdutoPeer::PRECO_CUSTO, $this->preco_custo);
		if ($this->isColumnModified(ProdutoPeer::PESSOA_TIPO)) $criteria->add(ProdutoPeer::PESSOA_TIPO, $this->pessoa_tipo);
		if ($this->isColumnModified(ProdutoPeer::SITUACAO)) $criteria->add(ProdutoPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ProdutoPeer::VALIDADE)) $criteria->add(ProdutoPeer::VALIDADE, $this->validade);
		if ($this->isColumnModified(ProdutoPeer::PRODUTO_ID)) $criteria->add(ProdutoPeer::PRODUTO_ID, $this->produto_id);
		if ($this->isColumnModified(ProdutoPeer::COMISSAO)) $criteria->add(ProdutoPeer::COMISSAO, $this->comissao);
		if ($this->isColumnModified(ProdutoPeer::PRODUTO_LOJA)) $criteria->add(ProdutoPeer::PRODUTO_LOJA, $this->produto_loja);

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
		$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);

		$criteria->add(ProdutoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Produto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFornecedorId($this->fornecedor_id);

		$copyObj->setCodigo($this->codigo);

		$copyObj->setNome($this->nome);

		$copyObj->setPreco($this->preco);

		$copyObj->setPrecoAntigo2($this->preco_antigo2);

		$copyObj->setPrecoAntigo($this->preco_antigo);

		$copyObj->setPrecoCusto($this->preco_custo);

		$copyObj->setPessoaTipo($this->pessoa_tipo);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setValidade($this->validade);

		$copyObj->setProdutoId($this->produto_id);

		$copyObj->setComissao($this->comissao);

		$copyObj->setProdutoLoja($this->produto_loja);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCuponsDescontoCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCuponsDescontoCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProdutosRelatedByProdutoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProdutoRelatedByProdutoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLocalProdutos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLocalProduto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getItemPedidos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addItemPedido($relObj->copy($deepCopy));
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
	 * @return     Produto Clone of current object.
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
	 * @return     ProdutoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProdutoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Fornecedor object.
	 *
	 * @param      Fornecedor $v
	 * @return     Produto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFornecedor(Fornecedor $v = null)
	{
		if ($v === null) {
			$this->setFornecedorId(NULL);
		} else {
			$this->setFornecedorId($v->getId());
		}

		$this->aFornecedor = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Fornecedor object, it will not be re-added.
		if ($v !== null) {
			$v->addProduto($this);
		}

		return $this;
	}


	/**
	 * Get the associated Fornecedor object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Fornecedor The associated Fornecedor object.
	 * @throws     PropelException
	 */
	public function getFornecedor(PropelPDO $con = null)
	{
		if ($this->aFornecedor === null && ($this->fornecedor_id !== null)) {
			$this->aFornecedor = FornecedorPeer::retrieveByPk($this->fornecedor_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aFornecedor->addProdutos($this);
			 */
		}
		return $this->aFornecedor;
	}

	/**
	 * Declares an association between this object and a Produto object.
	 *
	 * @param      Produto $v
	 * @return     Produto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProdutoRelatedByProdutoId(Produto $v = null)
	{
		if ($v === null) {
			$this->setProdutoId(NULL);
		} else {
			$this->setProdutoId($v->getId());
		}

		$this->aProdutoRelatedByProdutoId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Produto object, it will not be re-added.
		if ($v !== null) {
			$v->addProdutoRelatedByProdutoId($this);
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
	public function getProdutoRelatedByProdutoId(PropelPDO $con = null)
	{
		if ($this->aProdutoRelatedByProdutoId === null && ($this->produto_id !== null)) {
			$this->aProdutoRelatedByProdutoId = ProdutoPeer::retrieveByPk($this->produto_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProdutoRelatedByProdutoId->addProdutosRelatedByProdutoId($this);
			 */
		}
		return $this->aProdutoRelatedByProdutoId;
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
	 * Otherwise if this Produto has previously been saved, it will retrieve
	 * related CuponsDescontoCertificados from storage. If this Produto is new, it will return
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
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
			   $this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

				CuponsDescontoCertificadoPeer::addSelectColumns($criteria);
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

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
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
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

				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

				$count = CuponsDescontoCertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

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
			$l->setProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCuponsDescontoCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

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
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCuponsDescontoCertificadosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;

		return $this->collCuponsDescontoCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related CuponsDescontoCertificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCuponsDescontoCertificadosJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuponsDescontoCertificados === null) {
			if ($this->isNew()) {
				$this->collCuponsDescontoCertificados = array();
			} else {

				$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCuponsDescontoCertificadoCriteria) || !$this->lastCuponsDescontoCertificadoCriteria->equals($criteria)) {
				$this->collCuponsDescontoCertificados = CuponsDescontoCertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioAutorizacaoId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuponsDescontoCertificadoCriteria = $criteria;

		return $this->collCuponsDescontoCertificados;
	}

	/**
	 * Clears out the collProdutosRelatedByProdutoId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProdutosRelatedByProdutoId()
	 */
	public function clearProdutosRelatedByProdutoId()
	{
		$this->collProdutosRelatedByProdutoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProdutosRelatedByProdutoId collection (array).
	 *
	 * By default this just sets the collProdutosRelatedByProdutoId collection to an empty array (like clearcollProdutosRelatedByProdutoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProdutosRelatedByProdutoId()
	{
		$this->collProdutosRelatedByProdutoId = array();
	}

	/**
	 * Gets an array of Produto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Produto has previously been saved, it will retrieve
	 * related ProdutosRelatedByProdutoId from storage. If this Produto is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Produto[]
	 * @throws     PropelException
	 */
	public function getProdutosRelatedByProdutoId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProdutosRelatedByProdutoId === null) {
			if ($this->isNew()) {
			   $this->collProdutosRelatedByProdutoId = array();
			} else {

				$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

				ProdutoPeer::addSelectColumns($criteria);
				$this->collProdutosRelatedByProdutoId = ProdutoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

				ProdutoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProdutoRelatedByProdutoIdCriteria) || !$this->lastProdutoRelatedByProdutoIdCriteria->equals($criteria)) {
					$this->collProdutosRelatedByProdutoId = ProdutoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProdutoRelatedByProdutoIdCriteria = $criteria;
		return $this->collProdutosRelatedByProdutoId;
	}

	/**
	 * Returns the number of related Produto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Produto objects.
	 * @throws     PropelException
	 */
	public function countProdutosRelatedByProdutoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProdutosRelatedByProdutoId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

				$count = ProdutoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

				if (!isset($this->lastProdutoRelatedByProdutoIdCriteria) || !$this->lastProdutoRelatedByProdutoIdCriteria->equals($criteria)) {
					$count = ProdutoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProdutosRelatedByProdutoId);
				}
			} else {
				$count = count($this->collProdutosRelatedByProdutoId);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Produto object to this object
	 * through the Produto foreign key attribute.
	 *
	 * @param      Produto $l Produto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProdutoRelatedByProdutoId(Produto $l)
	{
		if ($this->collProdutosRelatedByProdutoId === null) {
			$this->initProdutosRelatedByProdutoId();
		}
		if (!in_array($l, $this->collProdutosRelatedByProdutoId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProdutosRelatedByProdutoId, $l);
			$l->setProdutoRelatedByProdutoId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related ProdutosRelatedByProdutoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getProdutosRelatedByProdutoIdJoinFornecedor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProdutosRelatedByProdutoId === null) {
			if ($this->isNew()) {
				$this->collProdutosRelatedByProdutoId = array();
			} else {

				$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

				$this->collProdutosRelatedByProdutoId = ProdutoPeer::doSelectJoinFornecedor($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProdutoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastProdutoRelatedByProdutoIdCriteria) || !$this->lastProdutoRelatedByProdutoIdCriteria->equals($criteria)) {
				$this->collProdutosRelatedByProdutoId = ProdutoPeer::doSelectJoinFornecedor($criteria, $con, $join_behavior);
			}
		}
		$this->lastProdutoRelatedByProdutoIdCriteria = $criteria;

		return $this->collProdutosRelatedByProdutoId;
	}

	/**
	 * Clears out the collLocalProdutos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLocalProdutos()
	 */
	public function clearLocalProdutos()
	{
		$this->collLocalProdutos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLocalProdutos collection (array).
	 *
	 * By default this just sets the collLocalProdutos collection to an empty array (like clearcollLocalProdutos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLocalProdutos()
	{
		$this->collLocalProdutos = array();
	}

	/**
	 * Gets an array of LocalProduto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Produto has previously been saved, it will retrieve
	 * related LocalProdutos from storage. If this Produto is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LocalProduto[]
	 * @throws     PropelException
	 */
	public function getLocalProdutos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
			   $this->collLocalProdutos = array();
			} else {

				$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

				LocalProdutoPeer::addSelectColumns($criteria);
				$this->collLocalProdutos = LocalProdutoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

				LocalProdutoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
					$this->collLocalProdutos = LocalProdutoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocalProdutoCriteria = $criteria;
		return $this->collLocalProdutos;
	}

	/**
	 * Returns the number of related LocalProduto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LocalProduto objects.
	 * @throws     PropelException
	 */
	public function countLocalProdutos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

				$count = LocalProdutoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

				if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
					$count = LocalProdutoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLocalProdutos);
				}
			} else {
				$count = count($this->collLocalProdutos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LocalProduto object to this object
	 * through the LocalProduto foreign key attribute.
	 *
	 * @param      LocalProduto $l LocalProduto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLocalProduto(LocalProduto $l)
	{
		if ($this->collLocalProdutos === null) {
			$this->initLocalProdutos();
		}
		if (!in_array($l, $this->collLocalProdutos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLocalProdutos, $l);
			$l->setProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related LocalProdutos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getLocalProdutosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
				$this->collLocalProdutos = array();
			} else {

				$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

				$this->collLocalProdutos = LocalProdutoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LocalProdutoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
				$this->collLocalProdutos = LocalProdutoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastLocalProdutoCriteria = $criteria;

		return $this->collLocalProdutos;
	}

	/**
	 * Clears out the collCertificados collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificados()
	 */
	public function clearCertificados()
	{
		$this->collCertificados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificados collection (array).
	 *
	 * By default this just sets the collCertificados collection to an empty array (like clearcollCertificados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificados()
	{
		$this->collCertificados = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Produto has previously been saved, it will retrieve
	 * related Certificados from storage. If this Produto is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificados($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoCriteria = $criteria;
		return $this->collCertificados;
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
	public function countCertificados(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificados);
				}
			} else {
				$count = count($this->collCertificados);
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
	public function addCertificado(Certificado $l)
	{
		if ($this->collCertificados === null) {
			$this->initCertificados();
		}
		if (!in_array($l, $this->collCertificados, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificados, $l);
			$l->setProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
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
	 * Otherwise if this Produto has previously been saved, it will retrieve
	 * related ItemPedidos from storage. If this Produto is new, it will return
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
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
			   $this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

				ItemPedidoPeer::addSelectColumns($criteria);
				$this->collItemPedidos = ItemPedidoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

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
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
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

				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

				$count = ItemPedidoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

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
			$l->setProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getItemPedidosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Produto is new, it will return
	 * an empty collection; or if this Produto has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Produto.
	 */
	public function getItemPedidosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::PRODUTO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
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
			if ($this->collCuponsDescontoCertificados) {
				foreach ((array) $this->collCuponsDescontoCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProdutosRelatedByProdutoId) {
				foreach ((array) $this->collProdutosRelatedByProdutoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLocalProdutos) {
				foreach ((array) $this->collLocalProdutos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collItemPedidos) {
				foreach ((array) $this->collItemPedidos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCuponsDescontoCertificados = null;
		$this->collProdutosRelatedByProdutoId = null;
		$this->collLocalProdutos = null;
		$this->collCertificados = null;
		$this->collItemPedidos = null;
			$this->aFornecedor = null;
			$this->aProdutoRelatedByProdutoId = null;
	}

} // BaseProduto
