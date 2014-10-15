<?php

class App_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract 
{

    public function preDispatch(Zend_Controller_Request_Abstract $request) 
    {
        $controller = strtolower($request->getControllerName());
        $action = strtolower($request->getActionName());
        $auth = Zend_Auth::getInstance();
        if (!($controller == 'autenticar' && $action == 'login') && !$auth->hasIdentity()) {
            $request->setModuleName('default');
            $request->setControllerName('autenticar');
            $request->setActionName('login');
        }
    }

}