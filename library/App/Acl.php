<?php
/**
 * Controle de permissões do sistema e-Eleição modificado para o sistema e-Admin
 * Por: Marcelo Caixeta Rocha
 */

class App_Acl extends Zend_Acl 
{

    public function __construct()
    {
        $this->_addRoles();
        $this->_addResources();
        $this->_addPermissions();
    }

    public function _addRoles()
    {
        $this->addRole(new Zend_Acl_Role('guest'));
        $this->addRole(new Zend_Acl_Role('usuario'));
    }

    public function _addResources()
    {
        $ass = new App_Controller_Action_Helper_AssetsListsResources();
        foreach ($ass->aclResources() as $resources) {
//            echo $resources.'<br>';
            $this->add(new Zend_Acl_Resource($resources));
        }  
    }
    
    public function _addPermissions ()
    {
//        $this->allow();
        $this->deny();
        $this->allow(null,'default:login.index');
        $this->allow(null,'agenda:contato.table');
        $this->allow(null,'agenda:contato.index');
        $this->allow(null,'padrao:index.jqueryui');
        $this->allow(null,'padrao:index.tela');
        $this->allow(null,'default:index.index');
        $this->allow(null,'default:login.logout');
        $this->allow(null,'sisad:faseadm.index');
        $this->allow(null,'admin:index.index');
        $this->allow(null,'padrao:index.index');
//        $this->allow(null,'eleicao:index.index');
    }
    
}