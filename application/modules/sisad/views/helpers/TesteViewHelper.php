<?php
/** 
 * Método mágico que cria o objeto em tempo de execução na View.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br> 
 */

class Sisad_View_Helper_TesteViewHelper extends Zend_View_Helper_Abstract
{

	public static function agoraVai()
	{
            $html = "<div>"
                    . "<h3>Eu sou o view helper teste agora vai</h3>"
                    . "</div>";
            return $html;
        }

}
