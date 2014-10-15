<?php

class Zend_View_Helper_Data {

    function data($timestamp, $format=Zend_Date::DATE_LONG, $idioma='pt_BR') {
        $date = new Zend_Date($timestamp, $idioma);

        if( $format == "ESPECIAL" ){
            if( !$date->compareDate(date("d-m-Y")) ){
                return "Hoje, ".$date->get(Zend_Date::TIME_SHORT);
            } else {
                return date("d/m",$date->get())." - ".$date->get(Zend_Date::TIME_SHORT);
            }
        }

        return $date->get($format);
    }
}