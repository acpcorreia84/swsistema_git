<?php

require 'pacoteCertificado/om/BaseCertificado.php';


/**
 * Skeleton subclass for representing a row from the 'certificado' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    pacoteCertificado
 */
class Certificado extends BaseCertificado {


    /*
 * COMO QUANDO UM OBJETO TEM MAIS DE UM CAMPO REFERENCIADO PARA MESMA TABELA, NESTE CASO USUARIO_ID E USUARIO_VALIDOU_ID
 * ELE PERDE A FUNCAO PADRAO GETUSUARIO E PASSA A TER FUNCOES GETUSUARIORELATEDBY_USUARIO_ID | _USUARIO_VALIDOU_ID
 * POR ISSO CRIEI A FUNCAO GETUSUARIO PARA NAO PARAR O SISTEMA
*/
    public function getUsuario(PropelPDO $con = null) {

        return $this->getUsuarioRelatedByUsuarioId($con);

    }


} // Certificado
