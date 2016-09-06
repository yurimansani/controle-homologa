<?php

/**
 * Formulário para inserção e edição de Cliente.
 */

class Application_Form_CadastroStatusForm extends Zend_Form 
{
    
    public function init() 
    {
	$this->setFormStatus();
    }


    public function setFormStatus()
    {
	$cStatus = new Zend_Form_Element_Text('cStatus',
	    array(
		'label' => 'Status',
		'required' => true,
		'attribs' => 
		    array('required' => '')
		)
	);
	$this->addElement($cStatus);
    }
}

