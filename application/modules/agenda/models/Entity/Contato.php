<?php
/**
 * A Model Entity é a Classe responsável pela definição dos atributos e métodos 
 * get e set de cada atributo.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Agenda_Model_Entity_Contato
{
    private $_id;
    private $_nome;
    private $_fone;
    private $_endereco;

    public function getId() 
    {
        return $this->_id;
    }

    public function setId($id) 
    {
        $this->_id = $id;
        return $this;
    }

    public function getNome() 
    {
        return $this->_nome;
    }

    public function setNome($nome) 
    {
        $this->_nome = $nome;
        return $this;
    }

    public function getFone() 
    {
        return $this->_fone;
    }

    public function setFone($fone) 
    {
        $this->_fone = $fone;
        return $this;
    }

    public function getEndereco() 
    {
        return $this->_endereco;
    }

    public function setEndereco($endereco) 
    {
        $this->_endereco = $endereco;
        return $this;
    }
}