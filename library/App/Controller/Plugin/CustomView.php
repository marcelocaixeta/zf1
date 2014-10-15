<?php
class App_Controller_Plugin_CustomView extends Zend_Controller_Plugin_Abstract 
{
	
	public function init()
	{
            $this->_initView();
	}

	/**
	 * Before dispatching the requested controller/action
	 * check to see if teh request is an AJAX request (via XMLHTTPREQUEST or $_GET['ajax']
	 *
	 * If it is an ajax request, remove the layout
	 *
	 * If it is not, setup the FlashMessenger
	 */
	public function preDispatch()
	{
		$this->_initView();
		//if  its an AJAX request stop here - can be simulated via ?ajax GET parameter sent in the request
		if ($this->_request->isXmlHttpRequest() || isset($_GET['ajax']))
		{
			Zend_Controller_Action_HelperBroker::removeHelper('Layout');
		}
		/*
		if (!$this->getRequest()->isXmlHttpRequest())
		{
			$messages = array();
			$messages['error']   = $this->_helper->FlashMessenger->setNamespace('error')->getMessages();
			$messages['success'] = $this->_helper->FlashMessenger->setNamespace('success')->getMessages();
			$this->view->messages = $messages;
		}
		*/
		//Sets the base url to the javascripts of the application
                
                $authNamespace = new Zend_Session_Namespace('Zend_Auth');
                $timeout =       $authNamespace->timeout;
                $time_render = time();
                
		$script = '
			var base_url = "' . $this->view->baseUrl().'",
                         timeout = "'.$timeout.'",
			 time_render = "' .$time_render.'";
		';
                
		$this->view->headScript()->prependScript($script, $type = 'text/javascript', $attrs = array());
                $this->view->inlineScript()->appendFile(($this->view->baseUrl().'/js/contadorsessao.js'), 'text/javascript');
                
	}

    protected function _initView()
    {
    	$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		if (null === $viewRenderer->view) $viewRenderer->initView();
		$view = $viewRenderer->view;
		$this->view = $view;
    }
}