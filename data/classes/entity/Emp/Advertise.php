<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andrey
 * Date: 23.04.13
 * Time: 11:25
 */

class Emp_Advertise extends fvRoot {

    /**
     * Return current entity name.
     * Could'n represent class without this function
     * @static
     * @return string Entity Name
     */
    static function getEntity()
    {
        return __CLASS__;
    }

    function __toString() {
        return (string)$this->url;
    }
}