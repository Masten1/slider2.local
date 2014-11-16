<?php

class StatisticsAction extends fvAction {
    
    function __construct () {
        parent::__construct(fvSite::$Layout);
    }
    
    function executeIndex() {
        if (!fvRequest::getInstance()->isXmlHttpRequest()) {
            $this->current_page->setTitle('Index Page');
            return self::$FV_OK;
        } else {
            return self::$FV_AJAX_CALL;
        }   
    }
    

}

?>
