<?php
/**
 * A Facade esconde as partes complexas dos Business, pode conter tambem 
 * DataMappers... mostra uma "cara bonita" para ser apresentada para o Controller
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Admin_Facade_PaginaInicial
{

    protected $_businessListFaseAdm;
    protected $_businessTabelaAvisos;

    public function __construct() 
    {
        $this->_businessListFaseAdm = new Sisad_Business_FaseAdm();
        $this->_businessTabelaAvisos = new Admin_Business_ListaAvisos();
    }

    public function listFaseAdmBusiness() 
    {
        return $this->_businessListFaseAdm->listAllBusiness();
    }
    
    public function tabelaAvisosBusiness()
    {
        return $this->_businessTabelaAvisos->indexBusiness();
    }
}