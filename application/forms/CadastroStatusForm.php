<?php

/**
 * Formulário para inserção e edição de Status.
 */
class Application_Form_CadastroStatusForm extends Zend_Form
{

	public function init()
	{
	$this->setFormStatus();
	}

	public function setFormStatus()
	{
	#######################Campos###################
	$cStatus = new Zend_Form_Element_Text('cStatus', array(
	    'label' => 'Status',
	    'required' => true,
	    'attribs' => array(
		'required' => '',
		'required' => '')
		)
	);
	############adicionar elemento################
	$this->addElement($cStatus);
	}

}
