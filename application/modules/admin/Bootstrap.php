<?php
/**
 * Habilita o autoload nas pastas forms, facades e business do módulo
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap 
{

    protected function _initAutoload() 
    {
        $this->bootstrap('frontController');

        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Admin',
            'basePath' => APPLICATION_PATH . '/modules/admin',
            'resourceTypes' => array(
                'form' => array(
                    'path' => 'forms',
                    'namespace' => 'Form'
                ),
                'facades' => array(
                    'path' => 'facades',
                    'namespace' => 'Facade'
                ),
                'business' => array(
                    'path' => 'business',
                    'namespace' => 'Business'
                )
            )
        ));
        return $autoloader;
    }

}
