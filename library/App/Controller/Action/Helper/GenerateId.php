<?php
/**
 * Injeta a funcionalidade que gera um id randomico diretamente na Action. Está
 * habilitado para gerar este id em qualquer módulo do e-Admin
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class App_Controller_Action_Helper_GenerateId extends Zend_Controller_Action_Helper_Abstract 
{

    public function direct() 
    {
        $seeds = 'abcdefghijklmnopqrstuvwxyz0123456789';
        list($usec, $sec) = explode(' ', microtime());

        $seed = (float) $sec + ((float) $usec * 100000);

        mt_srand($seed);

        $code = '';
        $count = strlen($seeds);

        for ($i = 0; $i < 32; $i++) {

            $code .= $seeds[mt_rand(0, $count - 1)];
        } return $code;
    }

}
