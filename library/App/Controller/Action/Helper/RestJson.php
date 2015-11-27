<?php
/**
 * Transforma o array php em um Rest Json.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class App_Controller_Action_Helper_RestJson extends Zend_Controller_Action_Helper_Abstract 
{
    public function direct($arrayData) 
    {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        $json = new Zend_Controller_Action_Helper_Json();
        $json->sendJson($arrayData);
    }
}