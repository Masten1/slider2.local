<?php

class News extends fvRoot{
    static function getEntity(){
        return __CLASS__;
    }

    public function __toString(){
        return (string)$this->title;
    }

    public function render(){
        return new Component_View( $this );
    }


    public function getLink(){
        return sprintf( "/news/%s/",
                        $this->url->get() );
    }
}
