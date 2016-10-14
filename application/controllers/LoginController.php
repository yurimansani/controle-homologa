<?php
class LoginController extends Zend_Controller_Action 
{


	public function init() 
	{
		
		$session = new Zend_Session_Namespace ('dados');
		$this->_helper->_layout->setLayout('login');
		$isLogado = $this->verificaLogado($session->dados);

		if ($isLogado)
		{
			$this->_redirect('/');
		}


	}

	public function indexAction() 
	{

	}

	public function logarAction() 
	{
		Zend_Layout::getMvcInstance()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		
		$dados = $this->_request->getPost();
		
		$this->autenticate($dados);
		
		
		
		
		
	}

	protected function verificaLogado($dados) 
	{
		if ( empty($dados) )
		{
			return FALSE;
		}
			return TRUE;
		
	}

	/**
	* Cria o Adapter para autenticação (nativo do Zend)
	*
	* @return Zend_Auth_Adapter_DbTable
	*/
	protected function _getAuthAdapter() {
		$dbAdapter = Zend_Db_Table::getDefaultAdapter ();
		$authAdapter = new Zend_Auth_Adapter_DbTable ( $dbAdapter );
		
		$authAdapter->setIdentityColumn ( 'Login' );
		$authAdapter->setCredentialColumn ( 'Senha' );
		$authAdapter->setTableName ( 'usuarios' );
		
		return $authAdapter;
	}

	/**
	* Autentica o usuario e cria sessao.
	*
	* @param array $values        	
	* @return boolean
	*/
	protected function autenticate($values) {
		
		// Get our authentication adapter and check credentials
		$adapter = $this->_getAuthAdapter ();
		$adapter->setIdentity ( $values ['username'] );
		$adapter->setCredential ( md5 ( md5 ( $values ['password'] ) ) );
		
		$auth = Zend_Auth::getInstance ();
		$result = $auth->authenticate ( $adapter );
		
		if ($result->isValid ()) {
			
//			$auth_user = $adapter->getResultRowObject ();;
//			$sessao = new Zend_Session_Namespace ( 'auth_user' );
//			$sessao->dados = $auth_user;
			return true;
		}
		
		return false;
	}
	

}