<?php
/**
 * O Controller cria uma instancia de SisadFactoryFacade para trazer a Facade
 * com o método que lista as fases administrativas.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Sisad_FaseAdmController extends Zend_Controller_Action 
{

    public function init() 
    {
        /* Initialize action controller here */
        $this->view->titleBrowser = 'e-Sisad';
        $this->facade = App_Factory_FactoryFacade::createInstance(
            'Sisad_Facade_FaseAdm'
        );
    }

    public function indexAction() 
    {
        $this->view->confirmationKey = $this->_helper->generateId();

        /* paginação */
        $page = Zend_Filter::filterStatic($this->_getParam('page', 1), 'int');
        /* Ordenação das paginas */
        $order = $this->_getParam('ordem', 'FADM_DS_FASE');
        $direction = $this->_getParam('direcao', 'ASC');
        $order_aux = $order . ' ' . $direction;
        ($direction == 'ASC') ? ($direction = 'DESC') : ($direction = 'ASC');
        /* Ordenação */

        $select = $this->facade->listBusiness();

        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage(15);
        $this->view->ordem = $order;
        $this->view->direcao = $direction;
        $this->view->data = $paginator;
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');

        $this->view->title = "Fases Administrativas";

        //$this->_helper->layout->disableLayout();
    }

    public function listajaxAction() 
    {
        // $this->_helper->layout->disableLayout();
        /* paginação */
        $page = Zend_Filter::filterStatic($this->_getParam('page', 1), 'int');
        /* Ordenação das paginas */
        $order = $this->_getParam('ordem', 'FADM_DS_FASE');
        $direction = $this->_getParam('direcao', 'ASC');
        $order_aux = $order . ' ' . $direction;
        ($direction == 'ASC') ? ($direction = 'DESC') : ($direction = 'ASC');
        /* Ordenação */

        $select = $this->facade->listBusiness();

        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage(15);
        $this->view->ordem = $order;
        $this->view->direcao = $direction;
        $this->view->data = $paginator;
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');

        $this->view->title = "Fases Administrativas";
    }

    public function adicionarAction() 
    {
        $this->view->headTitle('Nova Fase Administrativa', 'PREPEND');

        $form = new Sisad_Form_FaseAdm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($this->facade->addBusiness($data, $form)) {
                $this->_helper->flashMessenger(array('message' => "Fase administrativa cadastrada.", 'status' => 'success'));
                $this->_helper->_redirector('index', 'fase-adm', 'sisad');
            } else {
                $form->populate($data);
            }
        }
    }

    public function editarAction() 
    {
        $this->view->headTitle('Editar Fase Administrativa', 'PREPEND');

        $form = new Sisad_Form_FaseAdm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($this->facade->editBusiness($data, $form)) {
                $this->_helper->flashMessenger(array('message' => "Fase administrativa atualizada.", 'status' => 'success'));
                $this->_helper->_redirector('index', 'fase-adm', 'sisad');
            } else {
                $form->populate($data);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if (!$data = $this->facade->viewBusiness($id, true)) {
                $this->_redirect('/index');
            } else {
                $form->populate($data);
            }
        }
    }

    public function deletarAction() 
    {
        if ($this->facade->deleteBusiness($this->_getParam('id'))) {
            $this->_helper->flashMessenger(array('message' => "Fase administrativa excluída.", 'status' => 'success'));
            $this->_helper->_redirector('index', 'fase-adm', 'sisad');
        }
        $this->_redirect('/membro');
    }

}
