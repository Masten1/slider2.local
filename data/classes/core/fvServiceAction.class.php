<?php

class fvServiceAction extends fvAction {
    function __construct() {
        parent::__construct(fvSite::$Layout);
    }

    function executeIndex() {
        return self::$FV_NO_LAYOUT;
    }
}