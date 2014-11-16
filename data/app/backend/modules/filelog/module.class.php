<?php

class FilelogModule extends fvModule {

    function __construct ( $module ) {
        $this->moduleName = strtolower(substr(__CLASS__, 0, -6));

        $this->path = $module;

        parent::__construct(fvSite::$fvConfig->get("modules.{$module}.smarty.template"),
        fvSite::$fvConfig->get("modules.{$module}.smarty.compile"),
        fvSite::$Layout);
    }

    function showIndex(){

        $path = FV_ROOT . "logs/";
        $logs = array();

        foreach( glob( $path . "*.log" ) as $log ){
            $logs[] = array(
                "size" => filesize( $log ),
                "modified" => filemtime( $log ),
                "name" => preg_replace( "/(^.*\/)|(\.log$)/", "", $log )
            );
        }

        $this->logs = $logs;

        return $this->__display('index.tpl');
    }

    function showView(){

        $log = $this->_request->log;
        $path = FV_ROOT . "logs/{$log}.log";

        if( !file_exists( $path ) )
            return "<h1>Лог «{$log}» не найден на сервере<h1>";

        $handle = fopen($path, "r");
        $outputSize = 100000;

        // Не дай боженька лог полуторатерабатовый
        if( filesize($path) > $outputSize ) {
            fseek( $handle, -$outputSize, SEEK_END );
            @fgets( $handle );
        }

        // Читаем лог до самого конца
        while( $lines[] = fgets( $handle ) );

        // последний FALSE
        unset( $lines[count($lines)-1] );

        $this->lines = $lines;
        $this->log = $log;

        return $this->__display('log.tpl');
    }

}