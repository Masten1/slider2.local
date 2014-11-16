<?php

    class MenuModule extends fvModule{

        function __construct(){
            $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
            parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                                 fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                                 fvSite::$Layout );
        }

        function showTop(){
            $this->menuItems = Menu::getManager()->select()->where("isBottom = 0")->fetchAll();
            return $this->__display( "top.tpl" );
        }

        function showBottom(){
            $this->menuItems = Menu::getManager()->select()->where("isBottom = 1")->fetchAll();
            return $this->__display( "bottom.tpl" );
        }

        function showSide(){
            $this->List = Menu::getManager()->select()->where("isSide = 1")->fetchAll();
            return $this->__display( "side.tpl" );
        }
    }
