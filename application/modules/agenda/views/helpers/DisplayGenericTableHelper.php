<?php
class Zend_View_Helper_DisplayGenericTableHelper extends Zend_View_Helper_Abstract {

    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function displayGenericTableHelper($arrayNameColumn = array(), $rowset = NULL, $add = false , $delete = false) {
        $table = "";
        if(count($rowset)>0) {
            $table .= '<table><tr>';
            foreach($arrayNameColumn as $column) {
                $table .= '<th>'.$column.'</th>';
            }
                 if($add == true){
                    $table .= '<th>Alterar</th>';
                }
                 if($delete == true){
                    $table .= '<th>Excluir</th>';
                }
            $table .= "</tr>";
            foreach($rowset as $row) {
                $table .= '<tr>';
                foreach($row as $content) {
                    $table .= '<td>'.$content.'</td>';
                }
                if($add == true){
                    $table .= '<td><input type="submit" name="Enviar" value="Alterar"></td>';
                }
                if($delete == true){
                    $table .= '<td><input type="submit" name="Excluir" value="Excluir"></td>';
                }
            }
            $table .='</tr></table>';
           }
           return $table;
    }
}
