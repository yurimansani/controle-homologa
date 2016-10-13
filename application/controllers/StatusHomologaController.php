<?php

class StatusHomologaController extends Zend_Controller_Action
{

	public function init()
	{

	}

	public function indexAction()
	{

	}

	public function cadastroAction()
	{
		$form = new Application_Form_CadastroStatusForm ();
		$this->view->form = $form;
	}

	public function salvarAction()
	{

		Zend_Layout::getMvcInstance()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();

		$params = $this->_request->getPost();

		$isNovo = !isset($params['id_status']);

		if ($isNovo)
		{
		    $this->insertStatus($params);
		} else
		{
		    $this->update($params);
		}

		//exit($resposta);
	}

	protected function insertStatus($params)
	{
		//$translate = Zend_Registry::get('Zend_Translate');
		$form = new Application_Form_CadastroStatusForm();

		$validator = new Zend_Validate_Db_NoRecordExists(
			array(
			'table' => 'status_homologa',
			'field' => 'NomeStatus'
		));
		$form->getElement('cStatus')->addValidator($validator);

		if ($form->isValid($params))
		{
			try
			{
			$statusMapper = new Application_Model_StatusMapper();
			$insert = $statusMapper->insertStatus($params);

			$arrayMessage = array(
				'status' => true,
				'message' => 'funfou!!!! id - ' . $insert,
				'error' => 'none'
			);

			exit(Zend_Json::encode($arrayMessage));
			} catch (Exception $e)
			{
			$arrayMessage = array(
				'status' => false,
				'message' => 'erro',
				'error' => 'error-insert-statusHomologa'
			);

			exit(Zend_Json::encode($arrayMessage));
			}
		} else
		{
			exit($this->getErros($form->getErrors(), $form->getMessages(), 'error-insert-statusHomologa'));
		}
	}

	protected function updateStatus($params)
	{
		//$translate = Zend_Registry::get('Zend_Translate');
		$form = new Application_Form_CadastroStatusForm();

		$validator = new Zend_Validate_Db_NoRecordExists(
			array(
			'table' => 'status-homologa',
			'field' => 'NomeStatus'
		));
		$form->getElement('cStatus')->addValidator($validator);

		if ($form->isValid($params))
		{
			try
			{
				$statusMapper = new Application_Model_StatusMapper();
				$insert = $statusMapper->updateStatus($params);

				$arrayMessage = array(
					'status' => true,
					'message' => 'funfou!!!! id - ' . $insert,
					'error' => 'none'
				);

				exit(Zend_Json::encode($arrayMessage));
			} catch (Exception $e)
			{
			$arrayMessage = array(
				'status' => false,
				'message' => 'erro',
				'error' => 'error-update-statusHomologa'
			);

			exit(Zend_Json::encode($arrayMessage));
			}
		} else
		{
			exit($this->getErros($form->getErrors(), 'error-update-statusHomologa'));
		}
	}

	public function getErros($erros, $zMensagem, $localErro)
	{
		$translate = Zend_Registry::get('Zend_Translate');

		$errorMessage = $zMensagem;
		$mensagem = array();
		$arrayIdErrorsForm = array();


		foreach ($erros as $key => $dados)
		{

			$isErrorForm = count($dados) > 0;
			if ($isErrorForm)
			{

				array_push($arrayIdErrorsForm, $key);

				$isCampoVazio = isset($errorMessage[$key]["isEmpty"]);
				$isCampoRepetido = isset($errorMessage[$key]["recordFound"]);
				$isDateFalseFormat = isset($errorMessage[$key]["dateFalseFormat"]);
				$isDateInvalidFormat = isset($errorMessage[$key]["dateInvalidDate"]);
				$emailAddressInvalidFormat = isset($errorMessage[$key]["emailAddressInvalidFormat"]);
				$emailAddressInvalidHostname = isset($errorMessage[$key]["emailAddressInvalidHostname"]);

				if ($isCampoVazio)
				{
					$mensagem = "isEmpty";
				}

				if ($isCampoRepetido)
				{
					$mensagem = "recordFound";
				}

				if ($isDateFalseFormat)
				{
					$mensagem = "dateFalseFormat";
				}

				if ($isDateInvalidFormat)
				{
					$mensagem = "dateInvalidDate";
				}

				if ($emailAddressInvalidFormat)
				{
					$mensagem = "emailAddressInvalidFormat";
				}

				if ($emailAddressInvalidHostname)
				{
					$mensagem = "emailAddressInvalidHostname";
				}
			}
		}

		$msg = $translate->translate($mensagem);
		$arrayMessage = array(
			'status' => false,
			'message' => $msg,
		'error' => $localErro,
			'error_form' => $arrayIdErrorsForm
		);
		return(Zend_Json::encode($arrayMessage));
	}

}
