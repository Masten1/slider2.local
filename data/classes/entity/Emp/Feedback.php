<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andrey
 * Date: 04.05.13
 * Time: 15:39
 */

class Emp_Feedback extends fvRoot {

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

    function __toString(){
        return (string)$this->title;
    }

    function getStatusList(){
        return Array('Новый'=>'Новый', 'Обрабатывается'=>'Обрабатывается', 'Закрыт'=>'Закрыт');
    }

    function save() {
        if($this->isNew()) {
            //mailer
        }
        return parent::save();
    }


}