<?php

class LoginController extends Zend_Controller_Action 
{

    public function init() 
    {
        $this->view->titleBrowser = "Projeto Piloto ZF";
    }

    public function indexAction() 
    {        

        $this->view->title = "Página de Login do Projeto Piloto";
        $this->_helper->layout->setLayout('login');
        $form = new Form_Login ();
        $data = $this->_getAllParams();
        $this->view->form = $form;
        if ($this->_getParam('sessao') == 'expirada') {
            $this->view->message_sessao = "Sua sessão expirou, favor logar novamente";
        }
        try {
            if ($this->_request->isPost()) {
                $formData = $this->_request->getPost();
                if ($form->isValid($formData)) {
                    $userNs = new Zend_Session_Namespace('userNs');
                    $userNs->bancoUsuario = $form->getValue('COU_NM_BANCO');

                    $authAdapter = new App_Auth_Adapter_Db ();
                    $authAdapter->setIdentity($form->getValue('COU_COD_MATRICULA'));
                    $authAdapter->setCredential($form->getValue('COU_COD_PASSWORD'));
                    $authAdapter->setDbName($form->getValue('COU_NM_BANCO'));
                    $uf = strtoupper(substr($form->getValue('COU_COD_MATRICULA'), 0, 2));
                    $auth = Zend_Auth::getInstance();

                    $result = $auth->authenticate($authAdapter);
                    $messageLogin = $result->getMessages();

                    if ($result->isValid()) {
                        $data = $authAdapter->getResultRowObject(null, 'COU_COD_PASSWORD');
                        $userNs->matricula = strtoupper($form->getValue('COU_COD_MATRICULA'));
                        $userNs->banco = $messageLogin [1];
                        $userNs->codSec = $messageLogin [2];
                        $userNs->perfil = 'usuario';
                        $userNs->uf = $uf;

                        $userNs->nome = 'Marcelo Caixeta Rocha';
                        $userNs->siglasecao = 'TR';
                        $userNs->codlotacao = 1133;
                        $userNs->siglalotacao = 'DISAD';
                        $userNs->descicaolotacao = 'DIVISÃO DE SISTEMAS ADMINISTRATIVOS';
                        $userNs->localizacao = '';
                        $userNs->email = strtolower($form->getValue('COU_COD_MATRICULA')) . '@trf1.jus.br';

                        return $this->_helper->_redirector('index', 'fase-administrativa', 'sisad');
                    } else {
                        $this->view->message = $messageLogin [0];
                    }
                }
            }
        } catch (Exception $e) {
            $e = 'Logon Negado';
            $this->view->message = $e;
        }
    }

    public function successAction() 
    {
        if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
            $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
        } else {
            $this->_redirect('/');
        }
    }

    public function logoutAction() 
    {
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        $this->_redirect('/login');
    }

    public function ajaxbancoAction() 
    {
        $matricula = $this->_getParam('matricula');
        $banco = new Application_Model_DbTable_CoUserId ();
        $bancosArray = $banco->getNomeBanco($matricula);
        $this->view->bancosArray = $bancosArray;
    }

}