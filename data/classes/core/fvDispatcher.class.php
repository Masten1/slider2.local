<?php

class fvDispatcher {
    protected $_request;
    protected $_response;
    protected $_params;
    protected $_route;
    protected $_redirectCount;

    protected $_statusText;

    const MAX_REDIRECT = 100;

    protected function __construct() {
        $this->_request = fvRequest::getInstance();
        $this->_route = fvRoute::getInstance();
        $this->_response = fvResponse::getInstance();
    }

    public static function getInstance() {
        static $instance;
        if (empty($instance)) $instance = new self();
        return $instance;
    }

    function getModule( $module, $type ) {
        if (!class_exists($class = fvSite::$fvConfig->get("modules.{$module}.{$type}_class"))) {
            if (file_exists(fvSite::$fvConfig->get("modules.{$module}.path") . "{$type}.class.php")) {
                require_once(fvSite::$fvConfig->get("modules.{$module}.path") . "{$type}.class.php");
            }
            elseif (file_exists(fvSite::$fvConfig->get("modules.staticpages.path") . "{$type}.class.php")) {
            	require_once(fvSite::$fvConfig->get("modules.staticpages.path") . "{$type}.class.php");
            	$class = fvSite::$fvConfig->get("modules.staticpages.{$type}_class");
            } else
                throw new Exception("Module {$module} doesn't exist.");
        }

        return new $class($module);
    }

    function forward($url) {
        if (++$this->_redirectCount > self::MAX_REDIRECT){
            throw new EDispatcherExeception("Max redirect count reached");
            }
         $this->_route->process($url); 

        if ( fvFilterChain::getInstance()->execute() !== false) {
            $this->_response->sendHeaders();
            $this->_response->sendResponseBody();
        }
       --$this->_redirectCount;
    }

    function process() {
        $this->forward( $this->_request->getRequestParameter("__url") );
    }

    function redirect($url, $delay = 0, $status = 302) {
        $this->_response = fvResponse::getInstance();
        $this->_response->clearHeaders();
        $this->_response->setStatus($status);
        $this->_response->setHeader("Location", $url);
        $this->_response->setResponseBody('<html><head><meta http-equiv="refresh" content="%d;url=%s"/></head></html>', $delay, htmlentities($url, ENT_QUOTES, fvSite::$fvConfig->get('charset')));

        $this->_response->sendHeaders();
        $this->_response->sendResponseBody();
        die();
    }

    function show503() {
        $this->_response = fvResponse::getInstance();
        $this->_response->clearHeaders();
        $this->_response->setStatus(503);
        $this->_response->setResponseBody('Temporary unavailable');

        $this->_response->sendHeaders();
        $this->_response->sendResponseBody();
        die();
    }
}
