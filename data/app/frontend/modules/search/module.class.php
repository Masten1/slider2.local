<?php

class SearchModule extends fvModule{

    function __construct(){
        $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
        parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                             fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                             fvSite::$Layout );
    }

    function showIndex(){

        $request = fvRequest::getInstance();
        $search = $request->getRequestParameter('t');
        $search = preg_replace('!\s+!', ' ', $search);
        $search = html_entity_decode($search);
        $this->searchStr = $search;

        return $this->__display( "index.tpl" );
    }


    function showTop(){
        return $this->__display( "top.tpl" );
    }

}
