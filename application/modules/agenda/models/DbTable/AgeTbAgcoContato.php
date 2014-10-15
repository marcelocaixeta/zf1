<?php
/**
 * O Model Agenda é a Classe responsável pelo acesso ao banco de dados, onde 
 * são mapeados os relacionamentos das tabelas
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Agenda_Model_DbTable_AgeTbAgcoContato extends Zend_Db_Table_Abstract
{
    protected $_name = 'AGE_TB_AGCO_CONTATO';
    protected $_primary = 'AGCO_ID_CONTATO';
    protected $_sequence = 'AGE_SQ_AGCO_CONTATO';
 
}