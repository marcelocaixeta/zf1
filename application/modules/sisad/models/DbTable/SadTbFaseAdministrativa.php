<?php
/**
 * O Model DbTable é a Classe responsável pelo acesso ao banco de dados, onde 
 * são mapeados os relacionamentos das tabelas
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Sisad_Model_DbTable_SadTbFaseAdministrativa extends Zend_Db_Table_Abstract
{
//    protected $_schema = 'sad';
    protected $_name = 'sad_tb_fase_administrativa';
    protected $_primary = 'fa_id';
    
//    protected $_sequence = 'SAD_SQ_FADM_FASE_ADM';
    
}