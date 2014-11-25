<?php
/**
 * O DataMapper é responsável por mapear a classe de acesso ao banco de dados 
 * DbTable e o criar o objeto Model.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Sisad_Model_DataMapper_FaseAdministrativa extends Zend_Db_Table_Abstract
{
   
    protected $_dbTable;

    public function __construct() 
    {
        $this->setDbTable(new Sisad_Model_DbTable_SadTbFaseAdministrativa);
    }

    private function setDbTable(Sisad_Model_DbTable_SadTbFaseAdministrativa $dbtable) 
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
            'fa_descricao' => $descricao,
            'fa_situacao' => $situacao
        );
        $this->getDbTable()->insert($data);
    }

    public function edit($id, $descricao, $situacao) 
    {
        $data = array(
            'fa_descricao' => $descricao,
            'fa_situacao' => $situacao
        );
        $this->getDbTable()->update($data, 'fa_id = ' . (int) $id);
    }

    public function delete($id) 
    {
        $this->getDbTable()->delete('fa_id = ' . (int) $id);
    }

    public function get($id, $array = false) 
    {
        $row = $this->getDbTable()->fetchRow('fa_id = ' . (int) $id);
        if ($row) {
            $data = $row->toArray();
            if ($array) {
                return $data;
            }
            $model = new Sisad_Model_Entity_FaseAdm();
            $model->setId($data['fa_id'])
                  ->setDescricao($data['fa_descricao'])
                  ->setSituacao($data['fa_situacao']);
            return $model;
        }
        return false;
    }

    public function listAll() 
    {
        $rs = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($rs as $row) {
            $model = new Sisad_Model_Entity_FaseAdministrativa();
            $model->setId($row->fa_id)
                  ->setDescricao($row->fa_descricao)
                  ->setSituacao($row->fa_situacao);
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