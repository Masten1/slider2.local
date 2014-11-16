<?php

    class IndexAction extends fvAction{

        function __construct(){
            parent::__construct( fvSite::$Layout );
        }

        function executeIndex(){
            return self::proceed();
        }
    }
