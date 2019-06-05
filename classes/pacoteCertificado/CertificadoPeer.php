<?php

require 'pacoteCertificado/om/BaseCertificadoPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'certificado' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    pacoteCertificado
 */
class CertificadoPeer extends BaseCertificadoPeer {

    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CertificadoPeer::addSelectColumns($criteria);
        $startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

        ParceiroPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

        ContadorPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

        LocalPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

        FormaPagamentoPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

        ProdutoPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

        ClientePeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

        UsuarioPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

        UsuarioPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

        $criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

        //$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://propel.phpdb.org/trac/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CertificadoPeer::getOMClass(false);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CertificadoPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Parceiro rows

            $key2 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ParceiroPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ParceiroPeer::getOMClass(false);

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ParceiroPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Certificado) to the collection in $obj2 (Parceiro)
                $obj2->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined Contador rows

            $key3 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ContadorPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ContadorPeer::getOMClass(false);

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ContadorPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Certificado) to the collection in $obj3 (Contador)
                $obj3->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined Local rows

            $key4 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = LocalPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = LocalPeer::getOMClass(false);

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LocalPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Certificado) to the collection in $obj4 (Local)
                $obj4->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined FormaPagamento rows

            $key5 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = FormaPagamentoPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = FormaPagamentoPeer::getOMClass(false);

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    FormaPagamentoPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Certificado) to the collection in $obj5 (FormaPagamento)
                $obj5->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined Produto rows

            $key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = ProdutoPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = ProdutoPeer::getOMClass(false);

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProdutoPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
                $obj6->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined Cliente rows

            $key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = ClientePeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = ClientePeer::getOMClass(false);

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ClientePeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
                $obj7->addCertificado($obj1);
            } // if joined row not null

            // Add objects for joined Usuario rows

            $key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = UsuarioPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = UsuarioPeer::getOMClass(false);

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UsuarioPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
                $obj8->addCertificadoRelatedByUsuarioId($obj1);
            } // if joined row not null

            // Add objects for joined Usuario rows

            $key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = UsuarioPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = UsuarioPeer::getOMClass(false);

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    UsuarioPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
                $obj9->addCertificadoRelatedByUsuarioValidouId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();
        return $results;
    }


    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CertificadoPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

        $criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

        //$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();
        return $count;
    }

} // CertificadoPeer
