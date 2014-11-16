<?php

class IndexModule extends fvModule{

    function __construct(){
        $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
        parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                             fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                             fvSite::$Layout );
    }

    function showIndex()
    {
        $this->galleries = Emp_Gallery::getManager()->getAll();
        $this->getPage()->appendJS('/js/jquery.magnific-popup.js');
        return $this->__display( "index.tpl" );
    }
}
