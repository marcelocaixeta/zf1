<?php
/**
 * Habilita as pastas forms, facades e business do módulo
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Sisad_Bootstrap extends Zend_Application_Module_Bootstrap 
{

    protected function _initAutoload() 
    {
        $this->bootstrap('frontController');

        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Sisad',
            'basePath' => APPLICATION_PATH . '/modules/sisad',
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
