<?php
/**
 * O Controller cria uma instancia de AdminFactoryFacade para trazer a Facade
 * da página inicial.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Admin_IndexController extends Zend_Controller_Action
{
	
    public function init()
    {
	$this->view->titleBrowser = "e-Admin";
        $this->facade = App_Factory_FactoryFacade::createInstance(
            'Admin_Facade_PaginaInicial'
        );
    }

    public function indexAction() 
    {
        $page = Zend_Filter::filterStatic($this->_getParam('page', 1), 'int');
        $order = $this->_getParam('ordem', 'FADM_DS_FASE');
        $direction = ($this->_getParam('direcao', 'ASC') == 'ASC') ? ('DESC') : ('ASC');
        /**
         * Busca as fases administrativas da Business Sisad_Business_FaseAdm()
         * para listar na página inicial
         */
        $select = $this->facade->listFaseAdmBusiness();
        /**
         * Busca a tabela de avisos da Admin_Business_ListaAvisos() para listar
         * na página inicial
         */
        $this->view->tabelaAvisos = $this->facade->tabelaAvisosBusiness();
        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($page)
                  ->setItemCountPerPage(15);
        $this->view->ordem = $order;
        $this->view->direcao = $direction;
        $this->view->data = $paginator;
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');
    }
    
}