<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo 'e-Admin - ' . $this->escape($this->title); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <?php
        $this->headLink()
                ->appendStylesheet($this->baseUrl() . '/css/padraoTrf.css')
                ->appendStylesheet($this->baseUrl() . '/css/layout.css', 'screen', '', array('title' => 'padrao', 'rel' => 'alternate'))
                //->appendAlternate($this->baseUrl() . '/css/layout.css', 'screen', 'contraste', '')
                ->appendStylesheet($this->baseUrl() . '/js/jquery-ui-1.10.4.custom/css/custom-theme/jquery-ui-1.10.4.custom.css')
        ;
        $this->headScript()
                ->appendFile($this->baseUrl() . '/js/jquery1.10.2.min.js')
                ->appendFile($this->baseUrl() . '/js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')
                ->appendFile($this->baseUrl() . '/js/menuTrf.js')
                ->appendFile($this->baseUrl() . '/js/fontResize_e_tabelas.js')
                ->appendFile($this->baseUrl() . '/js/fontContraste.js')
                ->appendFile($this->baseUrl() . '/js/DataTables-1.10.0/media/js/jquery.dataTables.js')
        ;
        ?>

        <!--[if lt IE 9]>
                <style type="text/css">
                        #navigation li ul {
                                border:1px solid rgb(200, 219, 246);
                        }
                </style>
        <![endif]-->

        <?php echo $this->headLink(); ?>
        <link rel="alternate stylesheet" type="text/css" href="<?php echo $this->baseUrl().'/css/contraste.css'; ?>" title="contraste" />
        <?php
        echo $this->headStyle();
        echo $this->headScript();
        ?>
    </head>
    <body >