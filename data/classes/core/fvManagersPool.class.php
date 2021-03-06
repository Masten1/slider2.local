<?php

class fvManagersPool {
    
    private static $managers;

    /**
     * Под каждую сущность создаётся только один экземпляр менеджера.
     *
     * @static
     * @param $className Имя класса
     * @return fvRootManager Менеджер класса (EntityNameManager) либо стандартный (fvRootManager)
     * @throws Exception
     */
    public static function get( $className ){
        if( empty($className) )
            throw new Exception ("Can't return Entity Manager because class name is empty");
        
        $managerName = $className . 'Manager';
        
        if( !isset(self::$managers[$managerName]) ) {
            $managerClass = class_exists($managerName) ? $managerName : 'fvRootManager';    
            self::$managers[$managerName] = new $managerClass( $className );
        }
        
        return self::$managers[$managerName];
    }
    
}
