<?php
/**
 * Exemplo básico para mostrar o funcionamento das classes Business que podem 
 * ser chamadas em todas as Facades do sistema e-Admin
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Admin_Business_ListaAvisos
{

    public function __construct() 
    {
    }

    public function indexBusiness() 
    {
        $html = "<table>"
                . "<thead><th>O titulo da tabela de avisos</th></thead>"
                . "<tbody>"
                . "<tr><td>o primeiro aviso teste</td></tr>"
                . "<tr><td>o segundo aviso teste</td></tr>"
                . "</tbody>"
                . "</table>";
        return $html;
    }

}