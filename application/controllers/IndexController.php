<?php
/**
 * Teste do Zend_Session_Namespace asdf
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class IndexController extends Zend_Controller_Action 
{

    public function init() 
    {
        $this->_helper->layout->setLayout('login');
        $this->view->titleBrowser = "Projeto Piloto ZF";
    }

    public function indexAction() 
    {
        $this->_redirect('login');
    }

    public function inicioAction() 
    {
        $aNamespace = new Zend_Session_Namespace('userNs');
        Zend_Debug::dump($aNamespace->matricula . ' - ' . $aNamespace->banco);
    }

}