
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- parceiro
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parceiro`;


CREATE TABLE `parceiro`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50)  NOT NULL,
	`empresa` VARCHAR(50)  NOT NULL,
	`cnpj` VARCHAR(20)  NOT NULL,
	`endereco` VARCHAR(100)  NOT NULL,
	`numero` VARCHAR(4)  NOT NULL,
	`bairro` VARCHAR(50)  NOT NULL,
	`cidade` VARCHAR(30)  NOT NULL,
	`complemento` VARCHAR(30),
	`email` VARCHAR(60)  NOT NULL,
	`uf` CHAR(2)  NOT NULL,
	`cep` CHAR(10)  NOT NULL,
	`ibge` VARCHAR(10)  NOT NULL,
	`fone` VARCHAR(15),
	`celular` VARCHAR(15),
	`local_id` INTEGER  NOT NULL,
	`situacao` INTEGER,
	`data_cadastro` DATE  NOT NULL,
	`banco` VARCHAR(50),
	`conta_corrente` VARCHAR(12),
	`agencia` VARCHAR(8),
	`operacao` VARCHAR(5),
	`comissao_venda` INTEGER  NOT NULL,
	`comissao_validacao` INTEGER  NOT NULL,
	`comissao_venda_validacao` INTEGER  NOT NULL,
	`observacao` VARCHAR(150),
	`tipo_canal` VARCHAR(8),
	`paga_contador` VARCHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI__parceiro_local` (`local_id`),
	CONSTRAINT `Rel_parceiro_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- parceiro_comissionamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parceiro_comissionamento`;


CREATE TABLE `parceiro_comissionamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(150),
	`parceiro_id` INTEGER,
	`data_registro` DATETIME  NOT NULL,
	`data_pagamento` DATETIME  NOT NULL,
	`periodo_inicial` DATETIME  NOT NULL,
	`periodo_final` DATETIME  NOT NULL,
	`venda_validacao` FLOAT  NOT NULL,
	`venda` FLOAT  NOT NULL,
	`validacao` FLOAT  NOT NULL,
	`comissao_venda` INTEGER  NOT NULL,
	`comissao_validacao` INTEGER  NOT NULL,
	`comissao_venda_validacao` INTEGER  NOT NULL,
	`observacao` VARCHAR(150),
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__parceiroComissionamento_parceiro` (`parceiro_id`),
	CONSTRAINT `Rel_parceiroComissionamento_parceiro`
		FOREIGN KEY (`parceiro_id`)
		REFERENCES `parceiro` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- parceiro_lancamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parceiro_lancamento`;


CREATE TABLE `parceiro_lancamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_lancamento` DATETIME  NOT NULL,
	`descricao` VARCHAR(150)  NOT NULL,
	`tipo_lancamento` CHAR(1)  NOT NULL,
	`valor` FLOAT  NOT NULL,
	`observacao` VARCHAR(150)  NOT NULL,
	`parceiro_comissionamento_id` INTEGER  NOT NULL,
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__Lancamento_comissionamento_Parceiro_Comissionamento` (`parceiro_comissionamento_id`),
	CONSTRAINT `Rel_Lancamento_comissionamento_Parceiro_Comissionamento`
		FOREIGN KEY (`parceiro_comissionamento_id`)
		REFERENCES `parceiro_comissionamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- parceiro_usuario_tipo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parceiro_usuario_tipo`;


CREATE TABLE `parceiro_usuario_tipo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- parceiro_usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parceiro_usuario`;


CREATE TABLE `parceiro_usuario`
(
	`usuario_id` INTEGER  NOT NULL,
	`parceiro_id` INTEGER  NOT NULL,
	`parceiro_usuario_tipo_id` INTEGER,
	`situacao` INTEGER,
	PRIMARY KEY (`usuario_id`,`parceiro_id`),
	INDEX `FI__parceiro_usuario` (`parceiro_id`),
	CONSTRAINT `Rel_parceiro_usuario`
		FOREIGN KEY (`parceiro_id`)
		REFERENCES `parceiro` (`id`)
		ON DELETE RESTRICT,
	CONSTRAINT `Rel_usuario_usuarioId`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__parceiro_usuario_parceiro_usuario_tipo` (`parceiro_usuario_tipo_id`),
	CONSTRAINT `Rel_parceiro_usuario_parceiro_usuario_tipo`
		FOREIGN KEY (`parceiro_usuario_tipo_id`)
		REFERENCES `parceiro_usuario_tipo` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;


CREATE TABLE `usuario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`local_id` INTEGER,
	`foto_avatar` VARCHAR(200),
	`perfil_id` INTEGER  NOT NULL,
	`login` VARCHAR(20),
	`senha` VARCHAR(10),
	`data_expiracao_senha` DATE,
	`data_ultimo_acesso` DATETIME,
	`url` VARCHAR(255)  NOT NULL,
	`nome` VARCHAR(50)  NOT NULL,
	`endereco` VARCHAR(100),
	`complemento` VARCHAR(100),
	`numero` VARCHAR(4),
	`bairro` VARCHAR(50),
	`cidade` VARCHAR(30),
	`email` VARCHAR(60)  NOT NULL,
	`uf` CHAR(2),
	`cep` CHAR(10),
	`cpf` VARCHAR(20)  NOT NULL,
	`fone` VARCHAR(15),
	`fone2` VARCHAR(15),
	`celular` VARCHAR(15),
	`nascimento` DATE  NOT NULL,
	`setor_id` INTEGER  NOT NULL,
	`cargo_id` INTEGER  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`data_cadastro` DATE  NOT NULL,
	`saida_ferias` DATE  NOT NULL,
	`volta_ferias` DATE  NOT NULL,
	`limite_quantidade` INTEGER  NOT NULL,
	`margem_desconto` INTEGER  NOT NULL,
	`grupo_produto_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__funcionario_setor` (`setor_id`),
	CONSTRAINT `Rel_funcionario_setor`
		FOREIGN KEY (`setor_id`)
		REFERENCES `setor` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_local` (`local_id`),
	CONSTRAINT `Rel_usuario_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_cargo` (`cargo_id`),
	CONSTRAINT `Rel_usuario_cargo`
		FOREIGN KEY (`cargo_id`)
		REFERENCES `cargo` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_perfil` (`perfil_id`),
	CONSTRAINT `Rel_usuario_perfil`
		FOREIGN KEY (`perfil_id`)
		REFERENCES `perfil` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_produto_grupo` (`grupo_produto_id`),
	CONSTRAINT `rel_usuario_produto_grupo`
		FOREIGN KEY (`grupo_produto_id`)
		REFERENCES `grupo_produto` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- usuario_comissionamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_comissionamento`;


CREATE TABLE `usuario_comissionamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(150),
	`usuario_id` INTEGER,
	`data_registro` DATETIME  NOT NULL,
	`data_pagamento` DATETIME  NOT NULL,
	`periodo_inicial` DATETIME  NOT NULL,
	`periodo_final` DATETIME  NOT NULL,
	`venda` FLOAT  NOT NULL,
	`comissao_venda` INTEGER  NOT NULL,
	`observacao` VARCHAR(150),
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__usuarioComissionamento_usuario` (`usuario_id`),
	CONSTRAINT `Rel_usuarioComissionamento_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- usuario_lancamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_lancamento`;


CREATE TABLE `usuario_lancamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_lancamento` DATETIME  NOT NULL,
	`descricao` VARCHAR(150)  NOT NULL,
	`tipo_lancamento` CHAR(1)  NOT NULL,
	`valor` FLOAT  NOT NULL,
	`observacao` VARCHAR(150)  NOT NULL,
	`usuario_comissionamento_id` INTEGER  NOT NULL,
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__LancamentoUsuario_Usuario_Comissionamento` (`usuario_comissionamento_id`),
	CONSTRAINT `Rel_LancamentoUsuario_Usuario_Comissionamento`
		FOREIGN KEY (`usuario_comissionamento_id`)
		REFERENCES `usuario_comissionamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cargo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo`;


CREATE TABLE `cargo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200)  NOT NULL,
	`cbo` VARCHAR(20)  NOT NULL,
	`setor_id` INTEGER,
	`apagado` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__Cargo_setor` (`setor_id`),
	CONSTRAINT `Rel_Cargo_setor`
		FOREIGN KEY (`setor_id`)
		REFERENCES `setor` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- perfil
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil`;


CREATE TABLE `perfil`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(15),
	`situacao` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- permissao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `permissao`;


CREATE TABLE `permissao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tela` VARCHAR(20),
	`funcao` VARCHAR(10),
	`descricao` VARCHAR(60),
	`grupo_permissao_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__permissao_grupoPermissao` (`grupo_permissao_id`),
	CONSTRAINT `Rel_permissao_grupoPermissao`
		FOREIGN KEY (`grupo_permissao_id`)
		REFERENCES `grupo_permissao` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- grupo_permissao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `grupo_permissao`;


CREATE TABLE `grupo_permissao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(30),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- perfil_permissao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil_permissao`;


CREATE TABLE `perfil_permissao`
(
	`perfil_id` INTEGER  NOT NULL,
	`permissao_id` INTEGER  NOT NULL,
	PRIMARY KEY (`perfil_id`,`permissao_id`),
	CONSTRAINT `Rel_perfilPermissao_perfil`
		FOREIGN KEY (`perfil_id`)
		REFERENCES `perfil` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__perfilPermissao_permissao` (`permissao_id`),
	CONSTRAINT `Rel_perfilPermissao_permissao`
		FOREIGN KEY (`permissao_id`)
		REFERENCES `permissao` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- agendamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `agendamento`;


CREATE TABLE `agendamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`certificado_id` INTEGER,
	`data_agendamento` DATETIME,
	`local_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__agendamento_local` (`local_id`),
	CONSTRAINT `Rel_agendamento_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__agendamento_certificado` (`certificado_id`),
	CONSTRAINT `Rel_agendamento_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- acao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `acao`;


CREATE TABLE `acao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`sigla` CHAR(8),
	`descricao` VARCHAR(80),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- log_serama
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `log_serama`;


CREATE TABLE `log_serama`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`usuario_id` INTEGER,
	`registro_id` INTEGER,
	`acao_id` INTEGER,
	`descricao` VARCHAR(120),
	`data` DATETIME,
	`tela` VARCHAR(50),
	PRIMARY KEY (`id`),
	INDEX `FI__logSerama_acao` (`acao_id`),
	CONSTRAINT `Rel_logSerama_acao`
		FOREIGN KEY (`acao_id`)
		REFERENCES `acao` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__logSerama_usuario` (`usuario_id`),
	CONSTRAINT `Rel_logSerama_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- log_acesso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `log_acesso`;


CREATE TABLE `log_acesso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`usuario_id` INTEGER,
	`acao` VARCHAR(50),
	`ip` VARCHAR(120),
	`descricao` VARCHAR(120),
	`data` DATETIME,
	`tela` VARCHAR(50),
	PRIMARY KEY (`id`),
	INDEX `FI__logSerama_usuario` (`usuario_id`),
	CONSTRAINT `Rel_logSerama_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- setor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `setor`;


CREATE TABLE `setor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50)  NOT NULL,
	`fone` VARCHAR(20)  NOT NULL,
	`cor` VARCHAR(10),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- responsavel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `responsavel`;


CREATE TABLE `responsavel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50),
	`endereco` VARCHAR(100),
	`numero` VARCHAR(4),
	`bairro` VARCHAR(50),
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(30),
	`uf` CHAR(2),
	`cep` CHAR(10),
	`cpf` VARCHAR(20),
	`fone1` VARCHAR(15),
	`fone2` VARCHAR(15),
	`celular` VARCHAR(15),
	`apelido` VARCHAR(30),
	`nascimento` DATE,
	`email` VARCHAR(60)  NOT NULL,
	`cargo` VARCHAR(20),
	`rg` VARCHAR(20),
	`nis` VARCHAR(15),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- forma_pagamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `forma_pagamento`;


CREATE TABLE `forma_pagamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(20)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_situacao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_situacao`;


CREATE TABLE `certificado_situacao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`situacao_id` INTEGER  NOT NULL,
	`comentario` TEXT,
	`usuario_id` INTEGER,
	`certificado_id` INTEGER  NOT NULL,
	`data` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__certificadoSituacao_usuario` (`usuario_id`),
	CONSTRAINT `Rel_certificadoSituacao_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificadoSituacao_situacao` (`situacao_id`),
	CONSTRAINT `Rel_certificadoSituacao_situacao`
		FOREIGN KEY (`situacao_id`)
		REFERENCES `situacao` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificadoSituacao_cewrtificado` (`certificado_id`),
	CONSTRAINT `Rel_certificadoSituacao_cewrtificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- situacao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `situacao`;


CREATE TABLE `situacao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`sigla` VARCHAR(8)  NOT NULL,
	`nome` VARCHAR(20)  NOT NULL,
	`descricao` VARCHAR(40)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- fornecedor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fornecedor`;


CREATE TABLE `fornecedor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cupons_desconto_certificado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cupons_desconto_certificado`;


CREATE TABLE `cupons_desconto_certificado`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`produto_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`certificado_id` INTEGER  NOT NULL,
	`usuario_autorizacao_id` INTEGER  NOT NULL,
	`usado` INTEGER,
	`vencimento` DATE,
	`cpf_cnpj` VARCHAR(20)  NOT NULL,
	`desconto` FLOAT,
	`codigo_desconto` VARCHAR(50)  NOT NULL,
	`motivo` VARCHAR(255)  NOT NULL,
	`email_cliente` VARCHAR(60)  NOT NULL,
	`autorizado` INTEGER,
	`motivo_autorizacao` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__produto_cupons_desconto_certificado` (`produto_id`),
	CONSTRAINT `rel_produto_cupons_desconto_certificado`
		FOREIGN KEY (`produto_id`)
		REFERENCES `produto` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_cupons_desconto_certificado` (`usuario_id`),
	CONSTRAINT `rel_usuario_cupons_desconto_certificado`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_cupons_desconto_certificado` (`certificado_id`),
	CONSTRAINT `rel_certificado_cupons_desconto_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario_autorizacao_cupons_desconto_certificado` (`usuario_autorizacao_id`),
	CONSTRAINT `rel_usuario_autorizacao_cupons_desconto_certificado`
		FOREIGN KEY (`usuario_autorizacao_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- produto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `produto`;


CREATE TABLE `produto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fornecedor_id` INTEGER  NOT NULL,
	`codigo` INTEGER,
	`nome` VARCHAR(50)  NOT NULL,
	`preco` FLOAT  NOT NULL,
	`preco_venda` FLOAT  NOT NULL,
	`preco_custo` FLOAT  NOT NULL,
	`pessoa_tipo` CHAR(1)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`validade` INTEGER  NOT NULL,
	`produto_id` INTEGER  NOT NULL,
	`grupo_produto_id` INTEGER  NOT NULL,
	`comissao` FLOAT,
	`produto_loja` INTEGER  NOT NULL,
	`tipo_emissao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__produto_fornecedor` (`fornecedor_id`),
	CONSTRAINT `Rel_produto_fornecedor`
		FOREIGN KEY (`fornecedor_id`)
		REFERENCES `fornecedor` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__produto_produto` (`produto_id`),
	CONSTRAINT `rel_produto_produto`
		FOREIGN KEY (`produto_id`)
		REFERENCES `produto` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__produto_grupo` (`grupo_produto_id`),
	CONSTRAINT `rel_produto_grupo`
		FOREIGN KEY (`grupo_produto_id`)
		REFERENCES `grupo_produto` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- grupo_produto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `grupo_produto`;


CREATE TABLE `grupo_produto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(100)  NOT NULL,
	`descricao` VARCHAR(150)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- local_produto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `local_produto`;


CREATE TABLE `local_produto`
(
	`local_id` INTEGER  NOT NULL,
	`produto_id` INTEGER  NOT NULL,
	`preco` FLOAT  NOT NULL,
	`comissionamento` FLOAT  NOT NULL,
	`observacao` VARCHAR(1000),
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`local_id`,`produto_id`),
	CONSTRAINT `Rel_localProduto_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__localProduto_produto` (`produto_id`),
	CONSTRAINT `Rel_localProduto_produto`
		FOREIGN KEY (`produto_id`)
		REFERENCES `produto` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- local_usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `local_usuario`;


CREATE TABLE `local_usuario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`local_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__localusuario_local` (`local_id`),
	CONSTRAINT `Rel_localusuario_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__localusuario_usuario` (`usuario_id`),
	CONSTRAINT `Rel_localusuario_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- local
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `local`;


CREATE TABLE `local`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50)  NOT NULL,
	`situacao` INTEGER,
	`comissao` FLOAT,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- importacao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `importacao`;


CREATE TABLE `importacao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`arquivo` VARCHAR(50)  NOT NULL,
	`data` DATETIME  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`tela` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__usuario_importacao` (`usuario_id`),
	CONSTRAINT `Rel_usuario_importacao`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_fora_sistema
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_fora_sistema`;


CREATE TABLE `certificado_fora_sistema`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`protocolo` INTEGER,
	`documento` VARCHAR(100),
	`razao` VARCHAR(100),
	`status` VARCHAR(100),
	`produto` VARCHAR(150),
	`local` VARCHAR(100),
	`ar` VARCHAR(150),
	`cpf_ar` VARCHAR(50),
	`valor` VARCHAR(50),
	`data_avp` DATETIME,
	`data_validacao` DATETIME,
	`data_importacao` DATETIME,
	`data_mes_referente` INTEGER,
	`email_cliente` VARCHAR(100),
	`telefone_cliente` VARCHAR(20),
	`situacao` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_cupom
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_cupom`;


CREATE TABLE `certificado_cupom`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`certificado_id` INTEGER,
	`cliente_id` INTEGER,
	`codigo` VARCHAR(10)  NOT NULL,
	`data_vencimento` DATETIME  NOT NULL,
	`data_emissao` DATETIME,
	`data_utilizacao` DATETIME,
	`valor_cupom` FLOAT,
	`valor_final` FLOAT,
	`descricao` VARCHAR(150),
	`observacao` VARCHAR(150),
	PRIMARY KEY (`id`),
	INDEX `FI__cupom_certificado` (`certificado_id`),
	CONSTRAINT `Rel_cupom_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__cupom_cliente` (`cliente_id`),
	CONSTRAINT `Rel_cupom_cliente`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_nota
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_nota`;


CREATE TABLE `certificado_nota`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`certificado_id` INTEGER,
	`pessoa_tipo` CHAR(1)  NOT NULL,
	`sacado` VARCHAR(80)  NOT NULL,
	`endereco` VARCHAR(100)  NOT NULL,
	`numero` VARCHAR(4)  NOT NULL,
	`bairro` VARCHAR(50)  NOT NULL,
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(30)  NOT NULL,
	`email` VARCHAR(60)  NOT NULL,
	`uf` CHAR(2)  NOT NULL,
	`cep` CHAR(10)  NOT NULL,
	`fone1` VARCHAR(15)  NOT NULL,
	`celular` VARCHAR(15),
	`cpf_cnpj` VARCHAR(20)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`ie` VARCHAR(15),
	PRIMARY KEY (`id`),
	INDEX `FI__certificado_nota` (`certificado_id`),
	CONSTRAINT `Rel_certificado_nota`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado`;


CREATE TABLE `certificado`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`produto_id` INTEGER  NOT NULL,
	`cliente_id` INTEGER  NOT NULL,
	`forma_pagamento_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`funcionario_validou_id` INTEGER,
	`usuario_validou_id` INTEGER,
	`local_id` INTEGER  NOT NULL,
	`contador_id` INTEGER,
	`autorizado_venda_sem_contador` INTEGER,
	`codigo_documento` VARCHAR(30),
	`protocolo` INTEGER,
	`voucher` VARCHAR(30),
	`desconto` FLOAT,
	`motivo_desconto` VARCHAR(200),
	`observacao` VARCHAR(255),
	`data_compra` DATETIME  NOT NULL,
	`data_ultima_validacao` DATETIME,
	`data_pagamento` DATETIME,
	`data_validacao` DATETIME,
	`data_confirmacao_pagamento` DATETIME,
	`data_revogacao` DATETIME,
	`data_inicio_validade` DATETIME,
	`data_fim_validade` DATETIME,
	`data_recarteirizacao` DATETIME,
	`data_sincronizacao_ac` DATETIME,
	`confirmacao_validacao` INTEGER,
	`certificado_renovado` INTEGER,
	`apagado` INTEGER  NOT NULL,
	`parceiro_id` INTEGER,
	`status_followup` INTEGER,
	`inseriu_hope` INTEGER,
	`url_documentacao` VARCHAR(80),
	PRIMARY KEY (`id`),
	INDEX `FI__certificado_followup` (`status_followup`),
	CONSTRAINT `Rel_certificado_followup`
		FOREIGN KEY (`status_followup`)
		REFERENCES `situacao` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_parceiro` (`parceiro_id`),
	CONSTRAINT `Rel_certificado_parceiro`
		FOREIGN KEY (`parceiro_id`)
		REFERENCES `parceiro` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_contador` (`contador_id`),
	CONSTRAINT `Rel_certificado_contador`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_local` (`local_id`),
	CONSTRAINT `Rel_certificado_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_formaPagamento` (`forma_pagamento_id`),
	CONSTRAINT `Rel_certificado_formaPagamento`
		FOREIGN KEY (`forma_pagamento_id`)
		REFERENCES `forma_pagamento` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_produto` (`produto_id`),
	CONSTRAINT `Rel_certificado_produto`
		FOREIGN KEY (`produto_id`)
		REFERENCES `produto` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_cliente` (`cliente_id`),
	CONSTRAINT `Rel_certificado_cliente`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_usuario` (`usuario_id`),
	CONSTRAINT `Rel_certificado_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_usuariovalidou` (`usuario_validou_id`),
	CONSTRAINT `Rel_certificado_usuariovalidou`
		FOREIGN KEY (`usuario_validou_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__certificado_certificado` (`certificado_renovado`),
	CONSTRAINT `Rel_certificado_certificado`
		FOREIGN KEY (`certificado_renovado`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_pagamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_pagamento`;


CREATE TABLE `certificado_pagamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_pagamento` DATETIME,
	`data_confirmacao_pagamento` DATETIME,
	`certificado_id` INTEGER  NOT NULL,
	`pedido_id` INTEGER  NOT NULL,
	`data_inclusao` DATETIME  NOT NULL,
	`valor` FLOAT  NOT NULL,
	`codigo_pagamento` VARCHAR(15),
	`forma_pagamento_id` INTEGER,
	`quantidade_parcelas` INTEGER,
	`comprovante_pagamento` VARCHAR(200),
	`observacao` VARCHAR(200),
	PRIMARY KEY (`id`),
	INDEX `FI__pagamento_certificado` (`certificado_id`),
	CONSTRAINT `Rel_pagamento_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__pagamento_pedido` (`pedido_id`),
	CONSTRAINT `Rel_pagamento_pedido`
		FOREIGN KEY (`pedido_id`)
		REFERENCES `pedido` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__pedido_formaPagamento` (`forma_pagamento_id`),
	CONSTRAINT `Rel_pedido_formaPagamento`
		FOREIGN KEY (`forma_pagamento_id`)
		REFERENCES `forma_pagamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- certificado_protocolo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `certificado_protocolo`;


CREATE TABLE `certificado_protocolo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`protocolo` INTEGER,
	`tipo` CHAR,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cliente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;


CREATE TABLE `cliente`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`responsavel_id` INTEGER,
	`local_id` INTEGER,
	`pessoa_tipo` CHAR(1)  NOT NULL,
	`razao_social` VARCHAR(80)  NOT NULL,
	`nome_fantasia` VARCHAR(80)  NOT NULL,
	`endereco` VARCHAR(100)  NOT NULL,
	`numero` VARCHAR(4)  NOT NULL,
	`bairro` VARCHAR(50)  NOT NULL,
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(30)  NOT NULL,
	`email` VARCHAR(60)  NOT NULL,
	`uf` CHAR(2)  NOT NULL,
	`cep` CHAR(10)  NOT NULL,
	`fone1` VARCHAR(15)  NOT NULL,
	`fone2` VARCHAR(15),
	`celular` VARCHAR(15),
	`cpf_cnpj` VARCHAR(20)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`nascimento` DATE,
	`nome_contato` VARCHAR(50),
	`referencia_contato` VARCHAR(30),
	`telefone_contato` VARCHAR(15),
	`email_contato` VARCHAR(60),
	`cargo` VARCHAR(20),
	`rg` VARCHAR(20),
	`nis` VARCHAR(15),
	`contador_id` INTEGER,
	`telefone_ac` VARCHAR(20)  NOT NULL,
	`email_ac` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__cliente_local` (`local_id`),
	CONSTRAINT `Rel_cliente_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__cliente_contador` (`contador_id`),
	CONSTRAINT `Rel_cliente_contador`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__cliente_responsavel` (`responsavel_id`),
	CONSTRAINT `Rel_cliente_responsavel`
		FOREIGN KEY (`responsavel_id`)
		REFERENCES `responsavel` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cliente_contato
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente_contato`;


CREATE TABLE `cliente_contato`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`telefone` VARCHAR(15),
	`email` VARCHAR(60)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`cliente_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__cliente_Contato` (`cliente_id`),
	CONSTRAINT `Rel_cliente_Contato`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cliente_cadastro
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente_cadastro`;


CREATE TABLE `cliente_cadastro`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(80)  NOT NULL,
	`endereco` VARCHAR(100),
	`numero` VARCHAR(10),
	`bairro` VARCHAR(50),
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(40),
	`email` VARCHAR(60),
	`uf` CHAR(2),
	`cep` CHAR(10),
	`fone1` VARCHAR(15),
	`fone2` VARCHAR(15),
	`celular` VARCHAR(15),
	`cpf` VARCHAR(20)  NOT NULL,
	`situacao` INTEGER,
	`data_nascimento` DATE,
	`profissao` VARCHAR(60),
	`rg_orgao` VARCHAR(40),
	`tipo` CHAR(1),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- cliente_historico
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente_historico`;


CREATE TABLE `cliente_historico`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`cliente_id` INTEGER(11)  NOT NULL,
	`usuario_id` INTEGER(11),
	`acao` VARCHAR(200),
	`comentario` VARCHAR(200),
	PRIMARY KEY (`id`),
	INDEX `FI__cliente` (`cliente_id`),
	CONSTRAINT `Rel_cliente`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__usuario` (`usuario_id`),
	CONSTRAINT `Rel_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contador
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contador`;


CREATE TABLE `contador`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`local_id` INTEGER,
	`comissao` INTEGER,
	`desconto` INTEGER,
	`banco` VARCHAR(50),
	`conta_corrente` VARCHAR(12),
	`digitoConta` CHAR(1),
	`agencia` VARCHAR(1),
	`digitoAgencia` CHAR(1),
	`operacao` VARCHAR(5),
	`cpf_cnpj_conta` VARCHAR(20),
	`responsavel_id` INTEGER,
	`usuario_id` INTEGER,
	`data_cadastro` DATETIME,
	`nome` VARCHAR(50),
	`nascimento` DATE,
	`cpf` VARCHAR(20),
	`celular` VARCHAR(15),
	`email` VARCHAR(60)  NOT NULL,
	`razao_social` VARCHAR(80)  NOT NULL,
	`cnpj` VARCHAR(20),
	`nome_fantasia` VARCHAR(80)  NOT NULL,
	`endereco` VARCHAR(100),
	`numero` VARCHAR(4),
	`bairro` VARCHAR(50),
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(30),
	`email_empresa` VARCHAR(60)  NOT NULL,
	`uf` CHAR(2),
	`cep` CHAR(10),
	`fone1` VARCHAR(15),
	`fone2` VARCHAR(15),
	`pessoa_tipo` VARCHAR(2),
	`crc` VARCHAR(8),
	`cod_contador` VARCHAR(10),
	`situacao` INTEGER,
	`url` VARCHAR(255),
	`logo` VARCHAR(255),
	`localidade` VARCHAR(255),
	`contato1_nome` VARCHAR(100),
	`contato1_cargo` VARCHAR(100),
	`contato1_fone` VARCHAR(50),
	`contato2_nome` VARCHAR(100),
	`contato2_cargo` VARCHAR(100),
	`contato2_fone` VARCHAR(50),
	`tipo_contador` VARCHAR(100),
	`possui_cartao` INTEGER,
	`sync_safe` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__contador_usuario` (`usuario_id`),
	CONSTRAINT `Rel_contador_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__contador_local` (`local_id`),
	CONSTRAINT `Rel_contador_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__contador_responsavel` (`responsavel_id`),
	CONSTRAINT `Rel_contador_responsavel`
		FOREIGN KEY (`responsavel_id`)
		REFERENCES `responsavel` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contador_comissionamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contador_comissionamento`;


CREATE TABLE `contador_comissionamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(150),
	`contador_id` INTEGER,
	`data_registro` DATETIME  NOT NULL,
	`data_pagamento` DATETIME  NOT NULL,
	`periodo_inicial` DATETIME  NOT NULL,
	`periodo_final` DATETIME  NOT NULL,
	`venda` FLOAT  NOT NULL,
	`comissao_venda` INTEGER  NOT NULL,
	`observacao` VARCHAR(150),
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__contadorComissionamento_contador` (`contador_id`),
	CONSTRAINT `Rel_contadorComissionamento_contador`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contador_lancamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contador_lancamento`;


CREATE TABLE `contador_lancamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_lancamento` DATETIME  NOT NULL,
	`descricao` VARCHAR(150)  NOT NULL,
	`tipo_lancamento` CHAR(1)  NOT NULL,
	`valor` FLOAT  NOT NULL,
	`observacao` VARCHAR(150)  NOT NULL,
	`contador_comissionamento_id` INTEGER  NOT NULL,
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__LancamentoContador_Contador_Comissionamento` (`contador_comissionamento_id`),
	CONSTRAINT `Rel_LancamentoContador_Contador_Comissionamento`
		FOREIGN KEY (`contador_comissionamento_id`)
		REFERENCES `contador_comissionamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contador_contato
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contador_contato`;


CREATE TABLE `contador_contato`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50),
	`fone` VARCHAR(15),
	`celular` VARCHAR(15),
	`cargo` VARCHAR(50),
	`email` VARCHAR(60)  NOT NULL,
	`nascimento` DATE,
	`cpf` VARCHAR(20),
	`situacao` INTEGER  NOT NULL,
	`contador_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__contador_contadorContato` (`contador_id`),
	CONSTRAINT `Rel_contador_contadorContato`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contato
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contato`;


CREATE TABLE `contato`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`local_id` INTEGER,
	`nome` VARCHAR(60)  NOT NULL,
	`empresa` VARCHAR(80)  NOT NULL,
	`email` VARCHAR(60),
	`nascimento` DATE,
	`sexo` CHAR(1)  NOT NULL,
	`endereco` VARCHAR(100),
	`bairro` VARCHAR(50),
	`complemento` VARCHAR(80),
	`cidade` VARCHAR(30),
	`uf` CHAR(2),
	`cep` CHAR(10),
	`fone1` VARCHAR(15),
	`celular` VARCHAR(15),
	`cpf_cnpj` VARCHAR(20)  NOT NULL,
	`situacao` INTEGER,
	`cargo` VARCHAR(20),
	PRIMARY KEY (`id`),
	INDEX `FI__contato_local` (`local_id`),
	CONSTRAINT `Rel_contato_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contador_detalhar
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contador_detalhar`;


CREATE TABLE `contador_detalhar`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`contador_id` INTEGER,
	`usuario_id` INTEGER,
	`data_cadastro` DATETIME,
	`descricao` VARCHAR(250),
	PRIMARY KEY (`id`),
	INDEX `FI__contador_usuario` (`usuario_id`),
	CONSTRAINT `Rel_contador_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__acao_contador` (`contador_id`),
	CONSTRAINT `Rel_acao_contador`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- boleto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `boleto`;


CREATE TABLE `boleto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tid` INTEGER,
	`certificado_id` INTEGER  NOT NULL,
	`pedido_id` INTEGER  NOT NULL,
	`contas_receber_id` INTEGER  NOT NULL,
	`cliente_id` VARCHAR(50)  NOT NULL,
	`usuario_id` INTEGER,
	`vencimento` DATE,
	`data_processamento` DATE,
	`data_pagamento` DATE,
	`data_confirmacao_pagamento` DATETIME,
	`valor` FLOAT,
	`url_boleto` VARCHAR(150),
	`descricao` VARCHAR(200),
	PRIMARY KEY (`id`),
	INDEX `FI__boleto_certificado` (`certificado_id`),
	CONSTRAINT `Rel_boleto_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__boleto_usuario` (`usuario_id`),
	CONSTRAINT `Rel_boleto_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__boleto_pedido` (`pedido_id`),
	CONSTRAINT `Rel_boleto_pedido`
		FOREIGN KEY (`pedido_id`)
		REFERENCES `pedido` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__boleto_contasReceber` (`contas_receber_id`),
	CONSTRAINT `Rel_boleto_contasReceber`
		FOREIGN KEY (`contas_receber_id`)
		REFERENCES `contas_receber` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__boleto_cliente` (`cliente_id`),
	CONSTRAINT `Rel_boleto_cliente`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- recibo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `recibo`;


CREATE TABLE `recibo`
(
	`id_recibo` INTEGER  NOT NULL AUTO_INCREMENT,
	`certificado_id` INTEGER  NOT NULL,
	`data_geracao` DATETIME,
	`valor` FLOAT,
	PRIMARY KEY (`id_recibo`),
	INDEX `FI__recibo_certificado` (`certificado_id`),
	CONSTRAINT `Rel_recibo_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- caixa
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `caixa`;


CREATE TABLE `caixa`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`usuario_id` INTEGER  NOT NULL,
	`data_abertura` DATETIME  NOT NULL,
	`data_fechamento` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `FI__caixa_usuario` (`usuario_id`),
	CONSTRAINT `Rel_caixa_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- lancamento_caixa
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lancamento_caixa`;


CREATE TABLE `lancamento_caixa`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`caixa_id` INTEGER  NOT NULL,
	`conta_pagar_id` INTEGER,
	`CONTA_CONTABIL_ID` INTEGER,
	`conta_contabil_dest_id` INTEGER,
	`conta_receber_id` INTEGER,
	`data_lancamento` DATETIME,
	`descricao` VARCHAR(255),
	`valor` FLOAT,
	`tipo` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI__lancamentoCaixa_contaContabil` (`CONTA_CONTABIL_ID`),
	CONSTRAINT `Rel_lancamentoCaixa_contaContabil`
		FOREIGN KEY (`CONTA_CONTABIL_ID`)
		REFERENCES `conta_contabil` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoCaixa_contasPagar` (`conta_pagar_id`),
	CONSTRAINT `Rel_lancamentoCaixa_contasPagar`
		FOREIGN KEY (`conta_pagar_id`)
		REFERENCES `contas_pagar` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoCaixa_contasReceber` (`conta_receber_id`),
	CONSTRAINT `Rel_lancamentoCaixa_contasReceber`
		FOREIGN KEY (`conta_receber_id`)
		REFERENCES `contas_receber` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoCaixa_caixa` (`caixa_id`),
	CONSTRAINT `Rel_lancamentoCaixa_caixa`
		FOREIGN KEY (`caixa_id`)
		REFERENCES `caixa` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- categoria_conta_contabil
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria_conta_contabil`;


CREATE TABLE `categoria_conta_contabil`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`codigo` VARCHAR(6),
	`nome` VARCHAR(50)  NOT NULL,
	`descricao` VARCHAR(80)  NOT NULL,
	`tipo` CHAR(1),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- conta_contabil
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `conta_contabil`;


CREATE TABLE `conta_contabil`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`codigo` VARCHAR(50),
	`classificacao` VARCHAR(100),
	`categoria_conta_contabil_id` INTEGER  NOT NULL,
	`nome` VARCHAR(50)  NOT NULL,
	`apelido` VARCHAR(50)  NOT NULL,
	`descricao` VARCHAR(100)  NOT NULL,
	`tipo` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI__contaContabil_categoriaContaContabil` (`categoria_conta_contabil_id`),
	CONSTRAINT `Rel_contaContabil_categoriaContaContabil`
		FOREIGN KEY (`categoria_conta_contabil_id`)
		REFERENCES `categoria_conta_contabil` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- detalhe_lancamento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `detalhe_lancamento`;


CREATE TABLE `detalhe_lancamento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`lancamento_caixa_id` INTEGER  NOT NULL,
	`cedulas` FLOAT,
	`moedas` FLOAT,
	`cheques` FLOAT,
	`deposito` FLOAT,
	`despesa` FLOAT,
	`outro` FLOAT,
	`observacao_outro` VARCHAR(200),
	`observacao_despesa` VARCHAR(200),
	PRIMARY KEY (`id`),
	INDEX `FI__detalheLancamento_lancamentoCaixa` (`lancamento_caixa_id`),
	CONSTRAINT `Rel_detalheLancamento_lancamentoCaixa`
		FOREIGN KEY (`lancamento_caixa_id`)
		REFERENCES `lancamento_caixa` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- detalhe_cheque
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `detalhe_cheque`;


CREATE TABLE `detalhe_cheque`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`banco_id` INTEGER  NOT NULL,
	`vendedor_id` INTEGER,
	`lancamento_caixa_id` INTEGER,
	`numero` INTEGER,
	`bom_para` DATETIME,
	`valor` FLOAT,
	`data_recebimento` DATETIME,
	`nome_cliente` VARCHAR(40),
	`situacao` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI__detalheCheque_lancamentoCaixa` (`lancamento_caixa_id`),
	CONSTRAINT `Rel_detalheCheque_lancamentoCaixa`
		FOREIGN KEY (`lancamento_caixa_id`)
		REFERENCES `lancamento_caixa` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__detalheCheque_banco` (`banco_id`),
	CONSTRAINT `Rel_detalheCheque_banco`
		FOREIGN KEY (`banco_id`)
		REFERENCES `banco` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- banco
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `banco`;


CREATE TABLE `banco`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`codigo` VARCHAR(5),
	`nome` VARCHAR(50),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- pedido
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pedido`;


CREATE TABLE `pedido`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`cliente_id` INTEGER,
	`forma_pagamento_id` INTEGER,
	`funcionario_id` INTEGER,
	`data_pedido` DATETIME,
	`desconto` FLOAT,
	`observacao` VARCHAR(200),
	`situacao` INTEGER,
	`data_confirmacao_pagamento` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `FI__pedido_cliente` (`cliente_id`),
	CONSTRAINT `Rel_pedido_cliente`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__pedido_formaPagamento` (`forma_pagamento_id`),
	CONSTRAINT `Rel_pedido_formaPagamento`
		FOREIGN KEY (`forma_pagamento_id`)
		REFERENCES `forma_pagamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- item_pedido
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `item_pedido`;


CREATE TABLE `item_pedido`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`produto_id` INTEGER,
	`certificado_id` INTEGER,
	`pedido_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__itemPedido_produto` (`produto_id`),
	CONSTRAINT `Rel_itemPedido_produto`
		FOREIGN KEY (`produto_id`)
		REFERENCES `produto` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__itemPedido_certificado` (`certificado_id`),
	CONSTRAINT `Rel_itemPedido_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__itemPedido_pedido` (`pedido_id`),
	CONSTRAINT `Rel_itemPedido_pedido`
		FOREIGN KEY (`pedido_id`)
		REFERENCES `pedido` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contas_receber
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contas_receber`;


CREATE TABLE `contas_receber`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pedido_id` INTEGER,
	`banco_id` INTEGER,
	`certificado_id` INTEGER,
	`conta_contabil_id` INTEGER,
	`descricao` VARCHAR(200)  NOT NULL,
	`data_documento` DATETIME,
	`data_pagamento` DATETIME,
	`valor_documento` FLOAT,
	`vencimento` DATETIME,
	`desconto` FLOAT,
	`observacao` VARCHAR(200),
	`situacao` INTEGER  NOT NULL,
	`forma_pagamento_id` INTEGER,
	`codigo_documento` VARCHAR(30),
	`nota_fiscal` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__CReceber_Banco` (`banco_id`),
	CONSTRAINT `Rel_CReceber_Banco`
		FOREIGN KEY (`banco_id`)
		REFERENCES `banco` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__0099sdf975` (`conta_contabil_id`),
	CONSTRAINT `Rel_0099sdf975`
		FOREIGN KEY (`conta_contabil_id`)
		REFERENCES `conta_contabil` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__c00999sd3f75fasdf` (`pedido_id`),
	CONSTRAINT `Rel_c00999sd3f75fasdf`
		FOREIGN KEY (`pedido_id`)
		REFERENCES `pedido` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__contaReceber_certificado` (`certificado_id`),
	CONSTRAINT `Rel_contaReceber_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__0SD099975` (`forma_pagamento_id`),
	CONSTRAINT `Rel_0SD099975`
		FOREIGN KEY (`forma_pagamento_id`)
		REFERENCES `forma_pagamento` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- contas_pagar
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contas_pagar`;


CREATE TABLE `contas_pagar`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`conta_pagar_id` INTEGER,
	`conta_contabil_id` INTEGER,
	`lancamento_caixa_id` INTEGER,
	`data_pagamento` DATETIME,
	`data_documento` DATE  NOT NULL,
	`descricao` VARCHAR(100)  NOT NULL,
	`valor_documento` FLOAT  NOT NULL,
	`valor_restante` FLOAT  NOT NULL,
	`vencimento` DATE  NOT NULL,
	`desconto` FLOAT,
	`observacao` VARCHAR(100),
	`motivo_desconto` VARCHAR(200),
	`situacao` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__contasPagar_contasPagar` (`conta_pagar_id`),
	CONSTRAINT `Rel_contasPagar_contasPagar`
		FOREIGN KEY (`conta_pagar_id`)
		REFERENCES `contas_pagar` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__contasPagar_lancamentoCaixa` (`lancamento_caixa_id`),
	CONSTRAINT `Rel_contasPagar_lancamentoCaixa`
		FOREIGN KEY (`lancamento_caixa_id`)
		REFERENCES `lancamento_caixa` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__contasPagar_contaContabil` (`conta_contabil_id`),
	CONSTRAINT `Rel_contasPagar_contaContabil`
		FOREIGN KEY (`conta_contabil_id`)
		REFERENCES `conta_contabil` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- lancamento_conta
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lancamento_conta`;


CREATE TABLE `lancamento_conta`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`conta_bancaria_id` INTEGER  NOT NULL,
	`conta_pagar_id` INTEGER,
	`conta_receber_id` INTEGER,
	`conta_contabil_id` INTEGER,
	`cod_movimentacao` VARCHAR(20),
	`data_lancamento` DATETIME,
	`descricao` VARCHAR(255),
	`valor` FLOAT,
	`tipo` CHAR(1),
	`observacao` VARCHAR(100),
	`local_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__lancamentoConta_contasPagar` (`conta_pagar_id`),
	CONSTRAINT `Rel_lancamentoConta_contasPagar`
		FOREIGN KEY (`conta_pagar_id`)
		REFERENCES `contas_pagar` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoConta_contasReceber` (`conta_receber_id`),
	CONSTRAINT `Rel_lancamentoConta_contasReceber`
		FOREIGN KEY (`conta_receber_id`)
		REFERENCES `contas_receber` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoConta_contaBancaria` (`conta_bancaria_id`),
	CONSTRAINT `Rel_lancamentoConta_contaBancaria`
		FOREIGN KEY (`conta_bancaria_id`)
		REFERENCES `conta_bancaria` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoConta_contaContabil` (`conta_contabil_id`),
	CONSTRAINT `Rel_lancamentoConta_contaContabil`
		FOREIGN KEY (`conta_contabil_id`)
		REFERENCES `conta_contabil` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__lancamentoConta_local` (`local_id`),
	CONSTRAINT `Rel_lancamentoConta_local`
		FOREIGN KEY (`local_id`)
		REFERENCES `local` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- conta_bancaria
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `conta_bancaria`;


CREATE TABLE `conta_bancaria`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`banco` VARCHAR(50)  NOT NULL,
	`agencia` VARCHAR(7),
	`numero_conta` VARCHAR(10),
	`tipo` CHAR(2),
	`situacao` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- aviso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aviso`;


CREATE TABLE `aviso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`titulo` VARCHAR(40)  NOT NULL,
	`texto` VARCHAR(100)  NOT NULL,
	`data_inicial` DATE  NOT NULL,
	`data_final` DATE  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`data` DATETIME  NOT NULL,
	`data_envio` DATETIME,
	`tipo_aviso_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__aviso_tipoaviso` (`tipo_aviso_id`),
	CONSTRAINT `Rel_aviso_tipoaviso`
		FOREIGN KEY (`tipo_aviso_id`)
		REFERENCES `tipo_aviso` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__aviso_usuario` (`usuario_id`),
	CONSTRAINT `Rel_aviso_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- tipo_aviso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_aviso`;


CREATE TABLE `tipo_aviso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(40)  NOT NULL,
	`descricao` VARCHAR(100)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- aviso_usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aviso_usuario`;


CREATE TABLE `aviso_usuario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipo_usuario` CHAR(1),
	`status` INTEGER,
	`data_visualizacao` DATETIME,
	`data_resumo` DATETIME,
	`aviso_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`usuario_cliente_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__avisousuario_aviso` (`aviso_id`),
	CONSTRAINT `Rel_avisousuario_aviso`
		FOREIGN KEY (`aviso_id`)
		REFERENCES `aviso` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__avisousuario_usuario` (`usuario_id`),
	CONSTRAINT `Rel_avisousuario_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect`;


CREATE TABLE `prospect`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_cadastro` DATETIME  NOT NULL,
	`data_prospeccao` DATETIME  NOT NULL,
	`data_primeiro_contato` DATETIME  NOT NULL,
	`data_ultimo_contato` DATETIME  NOT NULL,
	`data_agendamento` DATETIME  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	`contador_id` INTEGER  NOT NULL,
	`certificado_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`supervisor_usuario_id` INTEGER  NOT NULL,
	`prospect_contatos_id` INTEGER  NOT NULL,
	`prospect_tipo_id` INTEGER  NOT NULL,
	`parceiro_id` INTEGER  NOT NULL,
	`prospect_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_contador` (`contador_id`),
	CONSTRAINT `Rel_prospect_contador`
		FOREIGN KEY (`contador_id`)
		REFERENCES `contador` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_certificado` (`certificado_id`),
	CONSTRAINT `Rel_prospect_certificado`
		FOREIGN KEY (`certificado_id`)
		REFERENCES `certificado` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_usuario` (`usuario_id`),
	CONSTRAINT `Rel_prospect_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_usuario` (`supervisor_usuario_id`),
	CONSTRAINT `Rel_prospect_usuario`
		FOREIGN KEY (`supervisor_usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectContados` (`prospect_contatos_id`),
	CONSTRAINT `Rel_prospect_prospectContados`
		FOREIGN KEY (`prospect_contatos_id`)
		REFERENCES `prospect_contato` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectTipo` (`prospect_tipo_id`),
	CONSTRAINT `Rel_prospect_prospectTipo`
		FOREIGN KEY (`prospect_tipo_id`)
		REFERENCES `prospect_tipo` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_tipo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_tipo`;


CREATE TABLE `prospect_tipo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(200)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_acao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_acao`;


CREATE TABLE `prospect_acao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200)  NOT NULL,
	`descricao` VARCHAR(200)  NOT NULL,
	`situacao` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_meio_contato
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_meio_contato`;


CREATE TABLE `prospect_meio_contato`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200)  NOT NULL,
	`situacao` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_meta
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_meta`;


CREATE TABLE `prospect_meta`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`meta` VARCHAR(200)  NOT NULL,
	`descricao` VARCHAR(200)  NOT NULL,
	`perfil_id` INTEGER,
	`prospect_tipo_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_prospectTipo` (`prospect_tipo_id`),
	CONSTRAINT `Rel_prospect_prospectTipo`
		FOREIGN KEY (`prospect_tipo_id`)
		REFERENCES `prospect_tipo` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_contato
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_contato`;


CREATE TABLE `prospect_contato`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200)  NOT NULL,
	`pessoa_tipo` CHAR(1)  NOT NULL,
	`cpf` VARCHAR(15)  NOT NULL,
	`cnpj` VARCHAR(16)  NOT NULL,
	`fone` VARCHAR(16)  NOT NULL,
	`site` VARCHAR(100)  NOT NULL,
	`cidade` VARCHAR(100)  NOT NULL,
	`bairro` VARCHAR(100)  NOT NULL,
	`uf` CHAR(2)  NOT NULL,
	`endereco` VARCHAR(250)  NOT NULL,
	`prospect_tipo_id` INTEGER  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_usuario` (`usuario_id`),
	CONSTRAINT `Rel_prospect_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectTipo` (`prospect_tipo_id`),
	CONSTRAINT `Rel_prospect_prospectTipo`
		FOREIGN KEY (`prospect_tipo_id`)
		REFERENCES `prospect_tipo` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_contato_detalhe
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_contato_detalhe`;


CREATE TABLE `prospect_contato_detalhe`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome_pessoa` VARCHAR(200)  NOT NULL,
	`email` VARCHAR(100)  NOT NULL,
	`fone` VARCHAR(20)  NOT NULL,
	`celular` VARCHAR(20)  NOT NULL,
	`prospect_contato_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_prospectContato` (`prospect_contato_id`),
	CONSTRAINT `Rel_prospect_prospectContato`
		FOREIGN KEY (`prospect_contato_id`)
		REFERENCES `prospect_contato` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_situacao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_situacao`;


CREATE TABLE `prospect_situacao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_acao` DATETIME  NOT NULL,
	`observacao` VARCHAR(250)  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`prospect_meio_contato_id` INTEGER  NOT NULL,
	`prospect_acao_id` INTEGER  NOT NULL,
	`prospect_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_prospectAcao` (`prospect_acao_id`),
	CONSTRAINT `Rel_prospect_prospectAcao`
		FOREIGN KEY (`prospect_acao_id`)
		REFERENCES `prospect_acao` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectViaContato` (`prospect_meio_contato_id`),
	CONSTRAINT `Rel_prospect_prospectViaContato`
		FOREIGN KEY (`prospect_meio_contato_id`)
		REFERENCES `prospect_meio_contato` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectProspect` (`prospect_id`),
	CONSTRAINT `Rel_prospect_prospectProspect`
		FOREIGN KEY (`prospect_id`)
		REFERENCES `prospect` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectUsuario` (`usuario_id`),
	CONSTRAINT `Rel_prospect_prospectUsuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_retencao
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_retencao`;


CREATE TABLE `prospect_retencao`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(500)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_concorrente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_concorrente`;


CREATE TABLE `prospect_concorrente`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(500)  NOT NULL,
	`situacao` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_atendimento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_atendimento`;


CREATE TABLE `prospect_atendimento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_atendimento` DATETIME(500)  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`prospect_meio_contato_id` INTEGER  NOT NULL,
	`prospect_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_prospectMeioContato` (`prospect_meio_contato_id`),
	CONSTRAINT `Rel_prospect_prospectMeioContato`
		FOREIGN KEY (`prospect_meio_contato_id`)
		REFERENCES `prospect_meio_contato` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectUsuario` (`usuario_id`),
	CONSTRAINT `Rel_prospect_prospectUsuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectId` (`prospect_id`),
	CONSTRAINT `Rel_prospect_prospectId`
		FOREIGN KEY (`prospect_id`)
		REFERENCES `prospect` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- prospect_negocio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prospect_negocio`;


CREATE TABLE `prospect_negocio`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`data_processamento` DATETIME(500)  NOT NULL,
	`usuario_id` INTEGER  NOT NULL,
	`prospect_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI__prospect_prospectUsuario` (`usuario_id`),
	CONSTRAINT `Rel_prospect_prospectUsuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
		ON DELETE RESTRICT,
	INDEX `FI__prospect_prospectId` (`prospect_id`),
	CONSTRAINT `Rel_prospect_prospectId`
		FOREIGN KEY (`prospect_id`)
		REFERENCES `prospect` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
