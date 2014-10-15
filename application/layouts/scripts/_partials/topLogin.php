<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo 'Projeto Piloto ZF - ' . $this->escape($this->title); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <?php
        $this->headLink()
                ->appendStylesheet($this->baseUrl() . '/css/padraoTrf.css')
                ->appendStylesheet($this->baseUrl() . '/css/layout.css')
                ->appendStylesheet($this->baseUrl() . '/js/jquery-ui-1.10.4.custom/css/custom-theme/jquery-ui-1.10.4.custom.css')
        ;
        $this->headScript()
                ->appendFile($this->baseUrl() . '/js/jquery1.10.2.min.js')
                ->appendFile($this->baseUrl() . '/js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')
                ->appendFile($this->baseUrl() . '/js/menuTrf.js')
                ->appendFile($this->baseUrl() . '/js/fontResize_e_tabelas.js')
        ;
        ?>

        <!--[if lt IE 9]>
                <style type="text/css">
                        #navigation li ul {
                                border:1px solid rgb(200, 219, 246);
                        }
                </style>
        <![endif]-->

        <?php
        echo $this->headLink();
        echo $this->headStyle();
        echo $this->headScript();
        ?>


    </head>
    <body >
        <div id="geralLogin">
            <div id="top">
                <header>
                    <div id="logo">

                    </div>
                    <div id="nomeSistemaLogin"><abbr title="Projeto Piloto para Desenvolvimento">Projeto Piloto ZF</abbr></div>

                </header>
            </div>
            <div id="menu">
            </div><!--menu-->