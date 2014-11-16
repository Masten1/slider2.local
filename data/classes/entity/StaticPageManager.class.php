<?php

class StaticPageManager extends fvRootManager
{
    public function find( $tech_url ){
        return $this->select()
            ->where( "techUrl like :url", Array( "url" => $tech_url ) )
            ->fetchOne();
    }
}
