<?php
/**
 * Exemplo de uma classe Business que acessa o DataMapper e manipular os dados 
 * aplicando as regras de negócio do manter contatos da grid da agenda
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br> 
 */
class Agenda_Business_Contato
{

    public $_mapper;

    public function __construct() 
    {
        $this->_mapper = new Agenda_Model_DataMapper_Contato();
    }

    public function listAllBusiness() 
    {
        return $this->_mapper->listAll();
    }

    public function addBusiness($data, $form) 
    {
        if ($form->isValid($data)) {
            $descricao = $form->getValue('FADM_DS_FASE');
            $situacao = $form->getValue('FADM_IC_DCTO_FASE');
            $this->_mapper->add($descricao, $situacao);
            return true;
        } else {
            return false;
        }
    }

    public function editBusiness($data, $form) 
    {
        if ($form->isValid($data)) {
            $id = (int) $form->getValue('FADM_ID_FASE');
            $descricao = $form->getValue('FADM_DS_FASE');
            $situacao = $form->getValue('FADM_IC_DCTO_FASE');
            $this->_mapper->edit($id, $descricao, $situacao);
            return true;
        } else {
            return false;
        }
    }

    public function viewBusiness($id, $array = false) 
    {
        if (empty($id)) {
            return false;
        }
        $model = $this->_mapper->get($id, $array);
        if ($model) {
            return $model;
        }
        return false;
    }

    public function deleteBusiness($id) 
    {
        if (empty($id)) {
            return false;
        }
        $this->_mapper->delete($id);
        return true;
    }

}