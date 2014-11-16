<?php

    class StaticPagesAction extends fvAction{

        function __construct(){
            parent::__construct( fvSite::$Layout );
        }

        function executeIndex(){
            return self::proceed();
        }
    }
