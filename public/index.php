<?php

define('MANUTENCAO', false);

if(MANUTENCAO){
    exit('<script>window.location="http://' . $_SERVER['HTTP_HOST'] . '/manutencao.html";</script>');
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

function prpre($array, $exit = true) {
    if(in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '189.44.30.50'))) {
        echo '<pre>';
        print_r($array);
        if ($exit)
            exit;
    }
}
/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
