<?php
    class Application_Model_StatusMapper
    {

        public function insertStatus($array)
        {
            $zendAdapter = Zend_Db_Table::getDefaultAdapter();
            $zendAdapter->insert('status_homologa',
                    array(
                        'id_status' => 0,
                        'NomeStatus' => $array['cStatus']
            ));

            return $zendAdapter->lastInsertId();
        }
        public function findStatus($cid_status)
        {
            $zendAdapter = Zend_Db_Table::getDefaultAdapter();
            $select = $zendAdapter->select()->from(
                    array(
                        'chs' => 'controle_homologa_status'
                    ))
            ->where('id_status = ?', $cid_status);

            return $zendAdapter->fetchRow($select);
        }
        public function alteraNomeStatus($params)
        {
            $zendAdapter = Zend_Db_Table::getDefaultAdapter();
            $rows = $zendAdapter->update('controle_homologa_status',
                    array(
                        'status' => $params['cstatus']),
                        "id_status = {$params['cid_status']}");

            return $rows;
        }
        public function deleteStatus($params)
        {
            $zendAdapter = Zend_Db_Table::getDefaultAdapter();
            $rows = $zendAdapter->delete(
                    'controle_homologa_status',
                    "id_status = {$params['cid_status']}");
            return $rows;
        }
        public function listar() 
        {
            $zendAdapter = Zend_Db_Table::getDefaultAdapter();
            $select = $zendAdapter->select()->from(
                    array(
                        'chs' => 'controle_homologa_status'
                    ));

            return $zendAdapter->fetchAll($select);
        }
    }
     