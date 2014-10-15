<?php
/**
 * Habilita o autoload nas pastas forms, facades e business do módulo, iniciliza 
 * o Zend_Translate, Zend_Navigation e Zend_Acl
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap 
{

    protected function _initAutoload() 
    {
        $autoloader = $this->getApplication()->getAutoloader();
        if (!$autoloader->isFallbackAutoloader()) {
            $autoloader->setFallbackAutoloader(true);
        }
        $autoloaderArray = new Zend_Loader_Autoloader_Resource(array(
                    'namespace' => '',
                    'basePath' => APPLICATION_PATH . '/',
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
        return $autoloaderArray;
    }

    public function _initTranslate() 
    {
        $translate = new Zend_Translate(
            'Array', APPLICATION_PATH . DIRECTORY_SEPARATOR . 'i18n' 
                . DIRECTORY_SEPARATOR . 'pt_BR.php', 'pt_BR'
        );
        Zend_Registry::set('Zend_Translate', $translate);
        Zend_Validate_Abstract::setDefaultTranslator($translate);
    }

    protected function _initNavigation() 
    {
        $this->bootstrap('view');
        $this->bootstrap('frontController');
        $this->bootstrap('acl');
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');

        $resource = new Zend_Application_Resource_Navigation(array(
                    'pages' => $config->toArray(),
                ));
        $resource->setBootstrap($this);

        return $resource->init();
    }

    public function _initAcl() 
    {
        $this->bootstrap('FrontController');
        $auth = Zend_Auth::getInstance();
        $acl = new App_Acl();
        Zend_Registry::set('Zend_Acl', $acl);
        $frontController = $this->getResource('frontController');
        $frontController->registerPlugin(new App_Controller_Plugin_Acl($auth, $acl));
    }

}