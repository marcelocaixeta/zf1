<?php
/**
 * O Model DbTable é a Classe responsável pelo acesso ao banco de dados, onde 
 * são mapeados os relacionamentos das tabelas
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Sisad_Model_DbTable_SadTbFadmFaseAdm extends Zend_Db_Table_Abstract
{
    protected $_name = 'SAD_TB_FADM_FASE_ADM';
    protected $_primary = 'FADM_ID_FASE';
    protected $_sequence = 'SAD_SQ_FADM_FASE_ADM';
    
}