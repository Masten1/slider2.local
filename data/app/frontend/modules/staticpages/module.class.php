<?php

    class StaticPagesModule extends fvModule{

        function __construct(){
            $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
            parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                                 fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                                 fvSite::$Layout );
        }

        function showIndex($params)
        {
            $link = $params['techUrl'] ? $params['techUrl'] : fvRoute::getInstance()->getRequestURL();
            $page = StaticPage::getManager()->find( $link );

            if (!$page instanceof StaticPage) {
                fvAction::redirect404();
            }
            $this->getPage()->setMeta($page);
            $this->__assign("page", $page );
            return $this->__display( "index.tpl" );
        }
    }
