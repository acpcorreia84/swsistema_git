<?php

require 'pacoteUsuario/om/BaseUsuario.php';


/**
 * Skeleton subclass for representing a row from the 'usuario' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    pacoteUsuario
 */
class Usuario extends BaseUsuario {

    /*
     * RETORNA TODOS OS USUARIOS DO LOCAL
     * QUE O USUARIO INSTANCIADO TEM
     * */
    public function getUsuariosLocaisUsuario () {
        $sql = 'select usuario.ID,usuario.LOCAL_ID,usuario.FOTO_AVATAR,usuario.PERFIL_ID,usuario.LOGIN,usuario.SENHA,usuario.DATA_EXPIRACAO_SENHA,usuario.DATA_ULTIMO_ACESSO,
usuario.URL,usuario.NOME,usuario.ENDERECO,usuario.COMPLEMENTO,usuario.NUMERO,usuario.BAIRRO,
usuario.CIDADE,usuario.EMAIL,usuario.UF,usuario.CEP,usuario.CPF,usuario.FONE,usuario.FONE2,
usuario.CELULAR,usuario.NASCIMENTO,usuario.SETOR_ID,usuario.SITUACAO,usuario.DATA_CADASTRO,
usuario.SAIDA_FERIAS,usuario.VOLTA_FERIAS from usuario where usuario.situacao not in (-1) and usuario.local_id in
                (
                    select l.id from 
                    ((local_usuario lu join local l on lu.local_id = l.id) join
                    usuario u on lu.usuario_id = u.id)
                    where 
                    u.id = '.$this->getId().' and lu.situacao <> -1
                    
                )';

        $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return UsuarioPeer::populateObjects($stmt);
    }

    /*
     * SE O USUARIO INSTANCIADO E UM PARCEIRO
     * RETORNA TODOS OS USUARIOS DESTE PARCEIRO
     * */
    public function getUsuariosParceiroUsuario () {

        $sql = 'select usuario.ID,usuario.LOCAL_ID,usuario.FOTO_AVATAR,usuario.PERFIL_ID,usuario.LOGIN,usuario.SENHA,usuario.DATA_EXPIRACAO_SENHA,usuario.DATA_ULTIMO_ACESSO,
usuario.URL,usuario.NOME,usuario.ENDERECO,usuario.COMPLEMENTO,usuario.NUMERO,usuario.BAIRRO,
usuario.CIDADE,usuario.EMAIL,usuario.UF,usuario.CEP,usuario.CPF,usuario.FONE,usuario.FONE2,
usuario.CELULAR,usuario.NASCIMENTO,usuario.SETOR_ID,usuario.SITUACAO,usuario.DATA_CADASTRO,
usuario.SAIDA_FERIAS,usuario.VOLTA_FERIAS from usuario join parceiro_usuario pu on usuario.id = pu.usuario_id
            where usuario.situacao <> -1 and pu.parceiro_id in (
            
            select pu.parceiro_id from
            (parceiro_usuario pu join usuario u on pu.usuario_id = u.id) join
            parceiro_usuario_tipo put on pu.parceiro_usuario_tipo_id = put.id
            where pu.usuario_id = '.$this->getId().' and put.nome like \'%PARCEIRO MASTER\'
    
        )';
        $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return UsuarioPeer::populateObjects($stmt);
    }



} // Usuario
