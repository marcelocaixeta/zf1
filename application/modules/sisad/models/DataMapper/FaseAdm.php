<?php
/**
 * O DataMapper é responsável por mapear a classe de acesso ao banco de dados 
 * DbTable e o criar o objeto Model.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Sisad_Model_DataMapper_FaseAdm extends Zend_Db_Table_Abstract
{
   
    protected $_dbTable;

    public function __construct() 
    {
        $this->setDbTable(new Sisad_Model_DbTable_SadTbFadmFaseAdm);
    }

    private function setDbTable(Sisad_Model_DbTable_SadTbFadmFaseAdm $dbtable) 
    {
        $this->_dbTable = $dbtable;
    }

    private function getDbTable() 
    {
        return $this->_dbTable;
    }

    public function add($descricao, $situacao) 
    {
        $data = array(
            'FADM_DS_FASE' => $descricao,
            'FADM_IC_DCTO_FASE' => $situacao
        );
        $this->getDbTable()->insert($data);
    }

    public function edit($id, $descricao, $situacao) 
    {
        $data = array(
            'FADM_DS_FASE' => $descricao,
            'FADM_IC_DCTO_FASE' => $situacao
        );
        $this->getDbTable()->update($data, 'FADM_ID_FASE = ' . (int) $id);
    }

    public function delete($id) 
    {
        $this->getDbTable()->delete('FADM_ID_FASE = ' . (int) $id);
    }

    public function get($id, $array = false) 
    {
        $row = $this->getDbTable()->fetchRow('FADM_ID_FASE = ' . (int) $id);
        if ($row) {
            $data = $row->toArray();
            if ($array) {
                return $data;
            }
            $model = new Sisad_Model_Entity_FaseAdm();
            $model->setId($data['FADM_ID_FASE'])
                  ->setDescricao($data['FADM_DS_FASE'])
                  ->setSituacao($data['FADM_IC_DCTO_FASE']);
            return $model;
        }
        return false;
    }

    public function listAll() 
    {
        $rs = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($rs as $row) {
            $model = new Sisad_Model_Entity_FaseAdm();
            $model->setId($row->FADM_ID_FASE)
                  ->setDescricao($row->FADM_DS_FASE)
                  ->setSituacao($row->FADM_IC_DCTO_FASE);
            $entries[] = $model;
        }
        return $entries;
    }

    public function listSelect() 
    {
        $rs = $this->getDbTable()->fetchAll()->toArray();
        return $rs;
    }

}