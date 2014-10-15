<?php
/**
 * Busca no código fonte os nomes dos modules, dos controllers e das actions e 
 * retorna as strings contendo os resources para serem utilizados no Acl 
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class App_Controller_Action_Helper_AssetsListsResources extends Zend_Controller_Action_Helper_Abstract 
{

    public function aclResources() 
    {
        $front = $this->getFrontController();
        $acl = array();
        foreach ($front->getControllerDirectory() as $module => $path) {
            foreach (scandir($path) as $file) {
                if (strstr($file, "Controller.php") !== false) {
                    include_once $path . DIRECTORY_SEPARATOR . $file;
                    foreach (get_declared_classes() as $class) {
                        if (is_subclass_of($class, 'Zend_Controller_Action')) {
                            $controller = strtolower(substr($class, 0, strpos($class, "Controller")));
                            $actions = array();
                            foreach (get_class_methods($class) as $action) {
                                if (strstr($action, "Action") !== false) {
                                    $actions[] = str_replace('Action', '', $action);
                                }
                            }
                        }
                    }
                    $acl[$module][$controller] = $actions;
                }
            }
        }
        foreach ($acl as $list1 => $counter1) {
            foreach ($counter1 as $list2 => $counter2) {
                foreach ($counter2 as $counter3) {
                    if (strstr($list2, '_') == true) {
                        $control = explode('_', $list2);
                        $list2 = $control[1];
                    }
                    $app[] = $list1.':'.$list2.'.'.$counter3;
                }
            }
        }
        return $app;
    }

}
