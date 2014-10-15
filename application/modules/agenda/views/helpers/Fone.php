<?php

class Zend_View_Helper_Fone {

    function fone($fone) {

        if( empty ($fone) ) return "";

        $ddd = substr($fone, 0, 2);
        $pre = substr($fone, 2, 4);
        $num = substr($fone, 6, 4);

        return "($ddd) $pre-$num";
    }
}