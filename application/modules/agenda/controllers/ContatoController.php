<?php
/**
 * O Controller cria uma instancia de AgendaFactoryFacade para trazer a Facade
 * da página inicial.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Agenda_ContatoController extends Zend_Controller_Action
{
	
    public function init() 
    {
        /* Initialize action controller here */
        $this->view->titleBrowser = 'e-Sisad';
        $this->facade = App_Factory_FactoryFacade::createInstance(
            'Agenda_Facade_Contato'
        );
    }

    public function indexAction() 
    {
        $i = 0;
        $newData = array();
        foreach ($this->facade->listBusiness() as $d) {
            $newData[$i]['id'] = $d->getId();
            $newData[$i]['nome'] = $d->getNome();
            $newData[$i]['fone'] = $d->getFone();
            $newData[$i]['endereco'] = $d->getEndereco();
            $i++;
        }
        $this->view->data = $newData;
    }
 
    // Action para fornecer os dados do grid
    public function dadosAction() {
        $this->_helper->layout->disableLayout();
        $page   = $this->_request->getParam("page",1);
        $limit  = $this->_request->getParam("rows");
        $sidx   = $this->_request->getParam("sidx",1);
        $sord   = $this->_request->getParam("sord");
 
//        $tabela = new Agenda_Model_DbTable_AgeTbAgcoContato();
       
        
 
 $agenda = $this->facade->listBusiness();
//        $agenda = $tabela->fetchAll(/*null, $sidx.$sord, $limit, ($page*$limit-$limit)*/);
  $count = count( $agenda );
  $total_pages = 0;
        if( $count >0 ) {
//            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }
 
        if ($page > $total_pages)
            $page = $total_pages;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;
 
        foreach($agenda as $row) {
            $responce->rows[$i]['id']=$row->AGCO_ID_CONTATO;
            $responce->rows[$i]['cell']=array(
                    $row->AGCO_ID_CONTATO,
                    $row->AGCO_NOME_CONTATO,
                    $row->AGCO_FONE_CONTATO,
                    $row->AGCO_ENDERECO_CONTATO
            );
            $i++;
        }
//        Zend_Debug::dump($responce);exit;
        $this->view->dados = $responce;
    }
 
    // Action para adicionar, editar ou deletar os registros da agenda
    public function saveAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
 
//        $tabela = new Agenda();
        $oper = $this->_request->getPost("oper");
 
        if($oper == "edit" || $oper == "del") {
            $id     = $this->_request->getPost("id");
            $agenda = $tabela->find($id)->current();
        } else {
            $agenda = $tabela->fetchNew();
        }
 
        if($oper == "add" || $oper == "edit") {
            $agenda->nome      = $this->_request->getPost("nome");
            $agenda->fone      = $this->_request->getPost("fone");
            $agenda->endereco  = $this->_request->getPost("endereco");
            $agenda->save();
 
        } elseif($oper == "del") {
            $agenda->delete();
        }
    }
    
    public function tableAction() 
    {
    
    }

    
}
