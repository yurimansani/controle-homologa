<?php

define('MANUTENCAO', false);
define('AVISO_MANUTENCAO', false);

if(MANUTENCAO){
	if($_SERVER['REMOTE_ADDR'] != '10.203.52.1'){
		if(strstr($_SERVER['HTTP_HOST'], 'eccopass')){
			exit('<script>window.location="http://' . $_SERVER['HTTP_HOST'] . '/manutencao_eccopass.html";</script>');
		}else{
			exit('<script>window.location="http://' . $_SERVER['HTTP_HOST'] . '/manutencao_futebolcard.html";</script>');
		}
	}
}

date_default_timezone_set('America/Sao_Paulo');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
