<?php

    /**
     * @method static UserManager getManager()
     */
    class User extends fvUser implements iLogger{

        const COLUMN_ID = 'id';
        const COLUMN_LOGIN = 'login';
        const COLUMN_NAME = 'name';
        const COLUMN_GROUP = 'group';
        const COLUMN_ACTIVE = 'active';

        private static $projectIdsByRightHolders;

        static function getEntity(){
            return __CLASS__;
        }

        function check_acl( $acl_name, $action = 'index' ){
            if( $this->isRoot() )
                return true;

            if( !is_array( $acl_name ) )
                $acl_name = array( $acl_name );

            if( is_array( $acl_name[$action] ) )
                $acl_check = $acl_name[$action];
            else
                $acl_check = $acl_name;

            return ( count( array_intersect( $this->getPermissions(), $acl_check ) ) > 0 );
        }

        function getPermissions() {
        	return $this->group->permissions->asArray();
        }

        function isRoot(){
            return $this->isRoot->get();
        }

        function __toString(){
            return $this->getFullName();
        }

        function getLogin(){
            return $this->login->get();
        }

        function getFullName(){
            $name = $this->name->get();

            if( empty( $name ) )
                return "Anonymous";

            return $name;
        }

        public function getLogMessage( $operation ){
            $message = "Пользователь был ";
            switch( $operation ){
                case Log::OPERATION_INSERT:
                    $message .= "создан ";
                    break;
                case Log::OPERATION_UPDATE:
                    $message .= "изменен ";
                    break;
                case Log::OPERATION_DELETE:
                    $message .= "удален ";
                    break;
                case Log::OPERATION_ERROR:
                    $message = "Произошла ошибка при операции с записью ";
                    break;
            }

            $message .= "в " . date( "Y-m-d H:i:s" );

            $user = fvSite::$fvSession->getUser();
            if( $user instanceof User )
                $message .= ". Менеджер [" . $user->getPk() . "] " . $user->getLogin() . " (" . $user->getFullName() . ")";

            return $message;
        }

        public function getLogName(){
            return (string)$this->name;
        }
        
        public function putToLog( $operation ){
            $logMessage = new Log();
            $logMessage->operation = $operation;
            $logMessage->objectType = __CLASS__;
            $logMessage->objectName = $this->getLogName();
            $logMessage->objectId = $this->getPk();
            $logMessage->managerId = ( fvSite::$fvSession->getUser() ) ? fvSite::$fvSession->getUser()->getPk() : -1;
            $logMessage->message = $this->getLogMessage( $operation );
            $logMessage->editLink = fvSite::$fvConfig->get( 'dir_web_root' ) . "usergroups/edit/?id=" . $this->getPk();
            $logMessage->save();
        }

        
    }
