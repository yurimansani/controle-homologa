<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    /**
     * 
     * @return Zend_Translate
     */
    protected function _initTranslate() {
    
    	$locale = new Zend_Locale();
		$langFile = "../application/languages/lang-{$locale->getRegion()}.php";
		
		$langFile = file_exists($langFile) ? $langFile : "../application/languages/lang-BR.php";
		
		$translate = new Zend_Translate ( array (
				'adapter' => 'array',
				'content' => $langFile,
				'locale' => $locale->getLanguage () 
		) );
    
    	Zend_Registry::set('Zend_Translate', $translate);
    	return $translate;
    }
}