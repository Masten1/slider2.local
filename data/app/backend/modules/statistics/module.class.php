<?php

class StatisticsModule extends fvModule{

    function __construct(){
        $this->moduleName = strtolower( substr( __CLASS__, 0, -6 ) );
        parent::__construct( fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.template" ),
                             fvSite::$fvConfig->get( "modules.{$this->moduleName}.smarty.compile" ),
                             fvSite::$Layout );
    }

    function showIndex(){
        $users = User::getManager()
            ->select( "DATE_FORMAT( ctime, \"%Y-%m-%d\" ) date, count( id ) count")
            ->groupBy( "date" )
            ->orderBy( "date" )
            ->setFetchMode( pdo::FETCH_ASSOC )
            ->execute();

        $this->userRegistrations = json_encode( $users );

        return $this->__display( "index.tpl" );
    }

}

?>
