<?php

class FlatLayout extends fvLayout {
    
    public function __construct() {
        parent::__construct("main");
    }
    
    public function getPageContent() {
        return $this->getModuleResult();
    }
    
    function parseMeta ($meta_value) {
        return $meta_value;
    }
}
