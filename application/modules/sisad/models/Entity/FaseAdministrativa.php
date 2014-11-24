<?php
/**
 * O Model Entity é a Classe responsável pela definição dos atributos e dos 
 * métodos: get e set de cada atributo.
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */

class Sisad_Model_Entity_FaseAdministrativa
{

    private $_id;
    private $_descricao;
    private $_situacao;

    public function getId() 
    {
        return $this->_id;
    }

    public function setId($id) 
    {
        $this->_id = $id;
        return $this;
    }

    public function getDescricao() 
    {
        return $this->_descricao;
    }

    public function setDescricao($descricao) 
    {
        $this->_descricao = $descricao;
        return $this;
    }

    public function getSituacao() 
    {
        return $this->_situacao;
    }

    public function setSituacao($situacao) 
    {
        $this->_situacao = $situacao;
        return $this;
    }

}