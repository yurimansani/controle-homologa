<?php
    class StatusController extends Zend_Controller_Action 
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
            Zend_Layout::getMvcInstance ()->disableLayout ();
            $this->_helper->viewRenderer->setNoRender ();
            $translate = Zend_Registry::get ( 'Zend_Translate' );

            $params = $this->_request->getPost(); 

            $form = new Application_Form_CadastroStatusForm();

            $validator = new Zend_Validate_Db_NoRecordExists(
                array(
                    'table' => 'controle_homologa_status',
                    'field' => 'status'
                ));
            $form->getElement('cStatus')->addValidator($validator);



            if ($form->isValid($params))
            {
                $resposta = $this->insertStatus($params);
            }
            else
            {
                $erros = $form->getErrors();
                $msg = $translate->translate ( 'verifica_campo_vermelho' );
                $arrayMessage = array (
                        'status' => false,
                        'message' => $msg,
                        'error' => 'error-insert-cliente-call-center',
                        'error_form' => $erros
                );
                exit ( Zend_Json::encode ( $arrayMessage ) );

            }

            //echo $resposta;


        }

        protected function insertStatus($params) 
        {
            try {
                $isNovo = !isset($params['id_status']);

                if ($isNovo) 
                {
                    $statusMapper = new Application_Model_StatusMapper();
                    $insert = $statusMapper->insertStatus($params);


                    $arrayMessage = array (
                        'status' => true,
                        'message' => 'funfou!!!! id - '.$insert,
                        'error' => 'none' 
                    );

                    exit ( Zend_Json::encode ( $arrayMessage ) );
                }

            } catch (Exception $e) {

                $arrayMessage = array (
                        'status' => false,
                        'message' => 'erro',
                        'error' => 'error-update-cliente-call-center' 
                );

                exit ( Zend_Json::encode ( $arrayMessage ) );
            }
        }
    }


?>

