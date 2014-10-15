<div id="menu">
    <nav>
        <div id="menuBtn" >
            <a href="#" title="menu">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>	

        <?php
        $userNamespace = new Zend_Session_Namespace('userNs');
        $acl = Zend_Registry::get('Zend_Acl');
        echo $this->navigation()->menu()->setAcl($acl)->setRole($userNamespace->perfil);
        ?>

    </nav>
    <div id="admin">
        <ul>
            <li><a class="adminBtn" href="#" title="administra&ccedil;&atilde;o"></a>
                <ul>
                    <li><a href="#">administrar</a></li>
                    <li><a href="#">outro</a></li>
                    <li><a href="<?php echo $this->baseUrl(); ?>/login/logout">sair</a></li>
                </ul>
            </li>
        </ul>
        <div id="adminInfo">

        </div>
    </div>
</div><!--menu-->