<?php

class ModuleLayout extends fvLayout {

    function __construct(){
        $currentUrl = fvRoute::getInstance()->getModuleName();

        $meta = Meta::getManager()
            ->select()
            ->where(array("url" => $currentUrl))
            ->fetchOne();

        if ($meta instanceof Meta) {
           $this->setMeta($meta);
        }

        $layout = fvSite::$fvConfig->get("modules.{$currentUrl}.layout", "index");

        parent::__construct($layout);
    }

    function getPageContent() {
        return $this->getModuleResult();
    }

    function getJS()
    {
        return $this->_js;
    }

    function getCss()
    {
        return $this->_css;
    }

    private $_js = Array();
    public function appendJS( $scripts ){
        if( is_array( $scripts ) ){
            foreach( $scripts as $script ){
                $this->appendJS($script);
            }
        }
        else{
            $this->_js[md5($scripts)] = $scripts;
        }

        return $this;
    }

    private $_css = Array();
    public function appendCSS( $scripts ){
        if( !is_array( $scripts ) ){
            $this->_css[] = $scripts;
        }
        else{
            $this->_css = array_merge( $this->_css, $scripts );
        }

        return $this;
    }
}

?>
