<?php
/**
 * Formulário utilizado para alterar ou inserir fases administrativas
 * 
 * @author Marcelo Caixeta Rocha <marcelo.caixeta@trf1.jus.br>
 */
class Sisad_Form_FaseAdministrativa extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $fadm_id_fase = new Zend_Form_Element_Hidden('fa_id');
        $fadm_id_fase->addFilter('Int')
                     ->removeDecorator('Label')
                     ->removeDecorator('HtmlTag');

        $fadm_ds_fase = new Zend_Form_Element_Text('fa_descricao');
        $fadm_ds_fase//->setRequired(true)
                     ->setLabel('Descrição:')
                     ->addFilter('StripTags')
                     ->addFilter('StringTrim')
                     ->addValidator('NotEmpty')
                     ->addValidator('Alnum', false, true)
                     ->addValidator('StringLength', false, array(5, 100));
        
        $fadm_ic_dcto_ativa = new Zend_Form_Element_Radio('fa_situacao');
        $fadm_ic_dcto_ativa->setLabel('Fase documento?')
                           ->setRequired(true)
                           ->setMultiOptions(array('1'=>'Sim', '0'=>'Não'));

        $submit = new Zend_Form_Element_Submit('Salvar');

        $this->addElements(array($fadm_id_fase, $fadm_ds_fase, $fadm_ic_dcto_ativa, $submit));
    }
}