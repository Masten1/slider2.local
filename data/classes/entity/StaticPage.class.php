<?php

/**
 * @method static StaticPageManager getManager()
 */
class StaticPage extends fvRoot
{

    static function getEntity(){ return __CLASS__; }

    function __toString(){
        return (string)$this->name. " - ".(string)$this->techUrl ;

    }
}
