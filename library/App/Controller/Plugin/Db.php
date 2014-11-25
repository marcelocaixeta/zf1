<?php

Class App_Controller_Plugin_Db extends Zend_Controller_Plugin_Abstract 
{
    public function preDispatch(Zend_Controller_Request_Abstract $request) 
    {
        $module = strtolower($request->getModuleName());
        $resource = Zend_Controller_Front::getInstance ()->getParam('bootstrap')->getPluginResource('multidb');
        $dbName = $module;
        Zend_Debug::dump($dbName);exit;
//        if ($module == 'default') {
//            $dbName = 'guardiao';
//        }
//        if ($module == 'admin') {
//            $dbName = 'guardiao';
//        }
        $db = $resource->getDb($dbName);
        Zend_Db_Table::setDefaultAdapter($db);
    }

}