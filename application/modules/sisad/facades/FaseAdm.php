<?php
/**
 * A Facade esconde as partes complexas dos Business, pode conter tambem 
 * DataMappers... mostra uma "cara bonita" para ser apresentada para o Controller
 * e gerencia as conexões com o banco de dados
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Sisad_Facade_FaseAdm 
{

    protected $_business = "";
    protected $_db = "";

    public function __construct() 
    {
        $this->_db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $this->_business = new Sisad_Business_FaseAdm();
    }

    public function htmlselectBusiness() 
    {
        return $this->_business->listAllBusiness();
    }

    public function listBusiness() 
    {
        return $this->_business->listAllBusiness();
    }

    public function addBusiness($data, $form) 
    {
        $this->_db->beginTransaction();
        try {
            $this->_business->addBusiness($data, $form);
            $exe = $this->_db->commit();
        } catch ( Exception $e) {
            $exe = $e; 
            $this->_db->rollBack();
        }
        return $exe;
    }

    public function editBusiness($data, $form) 
    {
        $this->_db->beginTransaction();
        try {
            $this->_business->editBusiness($data, $form);
            $exe = $this->_db->commit();
        } catch ( Exception $e) {
            $exe = $e;
            $this->_db->rollBack();
        }
        return $exe;
    }

    public function viewBusiness($id, $array = false) 
    {
        return $this->_business->viewBusiness($id, $array);
    }

    public function deleteBusiness($id) 
    {
        $this->_db->beginTransaction();
        try {
            $this->_business->deleteBusiness($id);
            $exe = $this->_db->commit();
        } catch ( Exception $e) {
            $exe = $e;
            $this->_db->rollBack();
        }
        return $exe;   
    }

    public function __destruct() 
    {
        $this->_db->closeConnection();
    }
}