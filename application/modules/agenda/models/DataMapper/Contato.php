<?php
/**
 * O DataMapper é responsável por mapear a classe de acesso ao banco de dados 
 * DbTable e o criar o objeto Model.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Agenda_Model_DataMapper_Contato extends Zend_Db_Table_Abstract
{
   
    protected $_dbTable;

    public function __construct() 
    {
        $this->setDbTable(new Agenda_Model_DbTable_AgeTbAgcoContato());
    }

    private function setDbTable(Agenda_Model_DbTable_AgeTbAgcoContato $dbtable) 
    {
        $this->_dbTable = $dbtable;
    }

    private function getDbTable() 
    {
        return $this->_dbTable;
    }

    public function add($nome, $fone, $endereco) 
    {
        $data = array(
            'AGCO_NOME_CONTATO'     => $nome,
            'AGCO_FONE_CONTATO'     => $fone,
            'AGCO_ENDERECO_CONTATO' => $endereco
        );
        $this->getDbTable()->insert($data);
    }

    public function edit($id, $nome, $fone, $endereco) 
    {
        $data = array(
            'AGCO_NOME_CONTATO'     => $nome,
            'AGCO_FONE_CONTATO'     => $fone,
            'AGCO_ENDERECO_CONTATO' => $endereco
        );
        $this->getDbTable()->update($data, 'AGCO_ID_CONTATO = ' . (int) $id);
    }

    public function delete($id) 
    {
        $this->getDbTable()->delete('AGCO_ID_CONTATO = ' . (int) $id);
    }

    public function get($id, $array = false) 
    {
        $row = $this->getDbTable()->fetchRow('AGCO_ID_CONTATO = ' . (int) $id);
        if ($row) {
            $data = $row->toArray();
            if ($array) {
                return $data;
            }
            $model = new Sisad_Model_Entity_Agenda();
            $model->setId($data['AGCO_ID_CONTATO'])
                  ->setDescricao($data['AGCO_NOME_CONTATO'])
                  ->setDescricao($data['AGCO_FONE_CONTATO'])
                  ->setSituacao($data['AGCO_ENDERECO_CONTATO']);
            return $model;
        }
        return false;
    }

    public function listAll() 
    {
        $rs = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($rs as $row) {
            $model = new Agenda_Model_Entity_Contato();
            $model->setId($row->AGCO_ID_CONTATO)
                  ->setNome($row->AGCO_NOME_CONTATO)
                  ->setFone($row->AGCO_FONE_CONTATO)
                  ->setEndereco($row->AGCO_ENDERECO_CONTATO);
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