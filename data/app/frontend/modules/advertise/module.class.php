<?php

class AdvertiseModule extends fvModule{

    function __construct(){
        $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
        parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                             fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                             fvSite::$Layout );
    }

    function showIndex(){
        $this->List = Emp_Advertise::getManager()->select()->fetchAll();
        return $this->__display( "index.tpl" );
    }
}
