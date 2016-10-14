<?php
class IndexController extends Zend_Controller_Action 
{


	public function init() 
	{

		$session = new Zend_Session_Namespace ('dados');

		$isLogado = $this->verificaLogado($session->dados);

		if (!$isLogado)
		{
			$this->_redirect('/login');
		}


	}

	public function indexAction() 
	{
		// $this->_helper->_layout->setLayout('login');
	}

	public function logarAction() 
	{
		$this->_helper->_layout->setLayout('login');
	}

	protected function verificaLogado($dados) 
	{
		if ( empty($dados) )
		{
			return FALSE;
		} else
		{
			return TRUE;
		}
	}


}