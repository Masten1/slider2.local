<?php

    class Component_Form extends Component_Extended{

        function getComponentName(){ return 'form'; }

        protected $_fields = array();
        protected $_messages = array();
        protected $_buttons = array();

        /** @var $_entity fvRoot */
        protected $_entity;
        protected $_isNew = false;
        protected $_name = 'f';
        protected $_title;
        protected $_action = '';
        protected $_validationResult;
        protected $_container = '';
        protected $_processed = false;
        protected $_class = null;
        protected $_showSubmitButton = true;

        function __construct( fvRoot $entity = null, $fields = null ){
            if( $entity )
                $this->setEntity( $entity );

            if( is_array( $fields ) ){
                foreach( $entity->getFields() as $key => $field ){
                    if( in_array( $key, $fields ) )
                        $this->creatFieldByEntityField( $key, $field );
                }
                $this->setFieldsPositions( $fields, false );
            }
            else if( !is_null( $fields ) ){
                throw new Exception( get_class( $this ) . "::__construct second parametr must be array or null" );
            }
            else if( $entity ){
                foreach( $entity->getFields() as $key => $field ){
                    $this->creatFieldByEntityField( $key, $field );
                }
            }
            if( $entity ){
                $this->_isNew = $entity->isNew();
                if( !$entity->isNew() ){
                    $this->setContainer( "[{$entity->getPk()}]" );
                }
            }
        }

        public function clearFields() {
            foreach ($this->getFields() as $keyName => $field) {
                $this->setFieldValue($keyName, NULL);
            }
        }

        function updateFields(){
            $values = fvRequest::getInstance()->getRequestParameter( $this->getContainerName() );

            foreach( $this->getFields() as $keyName => $field ){
                if( isset( $values[$keyName] ) ){
                    $this->setFieldValue( $keyName, $values[$keyName] );
                }
            }
        }

        function setEntity( fvRoot $entity ){
            $this->_entity = $entity;
            $this->setName( $entity->getEntity() );
        }

        /**
         * @return fvRoot
         */
        function getEntity(){
            return $this->_entity;
        }

        function creatFieldByEntityField( $key, fvField $field ){
            switch( $field->getEditMethod() ){
                case fvField::EDIT_METHOD_ENTITIES_LIST:
                    $value = array();
                    foreach( $field->get() as $e ){
                        $value[] = (int)$e->getPk();
                    }

                    $this->addField( $key, $field->getEditMethod(), $value, $field->getForeigns() );
                    break;
                case fvField::EDIT_METHOD_MULTILIST:
                    $this->addField( $key,
                                     $field->getEditMethod(),
                                     $field->asArray(),
                                     $field->getList( $this->getEntity() ) );
                    break;
                case fvField::EDIT_METHOD_LIST:
                    $this->addField( $key,
                                     $field->getEditMethod(),
                                     $field->get(),
                                     $field->getList( $this->getEntity() ) );
                    break;
                case fvField::EDIT_METHOD_DATE:
                    $this->addField( $key,
                                     $field->getEditMethod(),
                                     is_null( $field->get() ) ? '' : date( 'd.m.Y', $field->asTimestamp() ) );
                    break;
                case fvField::EDIT_METHOD_DATETIME:
                    $this->addField( $key,
                                     $field->getEditMethod(),
                                     is_null( $field->get() ) ? '' : date( 'd.m.Y H:i', $field->asTimestamp() ) );
                    break;
                case fvField::EDIT_METHOD_UPLOAD:
                    $this->addField( $key,
                                     $field->getEditMethod(),
                                     $field->get(),
                                     explode( ";", $field->acceptedTypes ) );
                    break;
                default:
                    $this->addField( $key, $field->getEditMethod(), $field->get() );
            }
        }

        function proceed(){
            $this->updateFields();

            if( $this->isValid() ){
                $this->_processed = true;
                $return = $this->finally();
                return $return;
            }
            else
                return $this->error();
        }

        function isValid(){
            if( $this->_entity instanceof fvRoot )
                return $this->_entity->isValid();

            // если нужно доопределить схему форму и валидацию к ней
            return true;
        }

        function finally(){
            if( fvRequest::getInstance()->isXmlHttpRequest() ){
                fvResponse::getInstance()->setHeader( 'success', true );
            }

            if( $this->_entity instanceof fvRoot ){
                if( !$this->_entity->save() )
                    throw new Exception( "Entity doesn't saved!" );

                return $this->_entity;
            }
        }

        function error(){
            foreach( $this->_entity->getFields() as $fieldName => $field ){
                if( !$field->isValid() ){
                    $this->setFieldError( $fieldName, $fieldName );
                }
            }
            return false;
        }

        function setName( $value ){
            $this->_name = $value;
        }

        function getName(){
            return $this->_name;
        }

        function setAction( $value ){
            $this->_action = $value;
            return $this;
        }

        function getAction(){
            return $this->_action;
        }

        function addField( $keyName, $type, $value = null, $values = null, $additionalInfo = null ){
            if( isset( $this->_fields[$keyName] ) )
                throw new FormFieldException( "Form Field {$keyName} already defined!" );

            $this->_fields[$keyName] = array( 'type'           => $type,
                                              'value'          => $value,
                                              'values'         => $values,
                                              'additionalInfo' => $additionalInfo, );
            return $this;
        }

        function setFieldAttribute( $keyName, $attribute, $value ){
            if( !isset( $this->_fields[$keyName] ) )
                throw new FormFieldException( "Form Field {$keyName} is not defined!" );

            $this->_fields[$keyName][$attribute] = $value;

            return $this;
        }

        function getFieldAttribute( $keyName, $attribute ){
            if( !isset( $this->_fields[$keyName] ) )
                throw new FormFieldException( "Form Field {$keyName} is not defined!" );

            return $this->_fields[$keyName][$attribute];
        }

        function removeField( $keyName ){
            unset( $this->_fields[$keyName] );
        }

        function getField( $keyName ){
            if( !isset( $this->_fields[$keyName] ) )
                throw new FormFieldException( "Form Field {$keyName} not found!" );

            return $this->_fields[$keyName];
        }

        function getFieldValue( $keyName ){
            return $this->getFieldAttribute( $keyName, 'value' );
        }

        function setFieldValue( $keyName, $value ){
            $this->setFieldAttribute( $keyName, 'value', $value );

            if( isset( $this->_entity ) ){
                $this->_entity->$keyName = $value;

                $this->setFieldAttribute( $keyName, 'value', $this->_entity->$keyName->get() );
            }
            else
                $this->setFieldAttribute( $keyName, 'value', $value );
            return $this;
        }

        function getFieldsSets(){
            return array( array( 'type' => 'blank', 'fields' => $this->getFields() ) );
        }

        function getFieldError( $keyName ){
            return $this->getFieldAttribute( $keyName, 'error' );
        }

        function setFieldError( $keyName, $value ){
            return $this->setFieldAttribute( $keyName, 'error', $value );
        }

        function setFieldsPositions( array $keysArray, $preserveFields = false ){
            $newFields = array();
            foreach( $keysArray as $keyName ){
                $newFields[$keyName] = $this->getField( $keyName );
            }

            if( $preserveFields )
                foreach( $this->getFields() as $keyName => $field ){
                    if( !isset( $newFields[$keyName] ) )
                        $newFields[$keyName] = $field;
                }

            $this->_fields = $newFields;

            return $this;
        }

        function getFields(){
            return $this->_fields;

            $return = array();
            foreach( $array as $key ){
                $return[$key] = $this->getField( $key );
            }

            return $return;
        }

        function getContainer(){
            return $this->_container;
        }

        function setContainer( $value ){
            $this->_container = (string)$value;
            return $this;
        }

        function getContainerName(){
            return $this->getName() . $this->getContainer();
        }

        function __get( $keyName ){
            return $this->getFieldValue( $keyName );
        }

        function __set( $keyName, $value ){
            $this->setFieldValue( $keyName, $value );
        }

        function addMessage( $type, $description ){
            $this->_messages[$type][] = $description;
        }

        function getMessages( $type = null ){
            if( is_null( $type ) )
                return $this->_messages;

            if( isset( $this->_messages[$type] ) )
                return $this->_messages[$type];

            return array();
        }

        function isNew(){
            return $this->_isNew;
        }

        function isLogging(){
            return true;
        }

        function isProcessed(){
            return $this->_processed;
        }

        function isAjax(){
            return fvRequest::getInstance()->isXmlHttpRequest();
        }

        function addButton( $action ){
            $this->_buttons[] = $action;
            return $this;
        }

        function getButtons(){
            return $this->_buttons;
        }

        public function setClass( $class ){
            $this->_class = $class;
            return $this;
        }

        public function getClass(){
            return $this->_class;
        }

        public function showSubmitButton( $value = null ){
            if( !is_null( $value ) ){
                $this->_showSubmitButton = (bool)$value;
            }
            return $this->_showSubmitButton;
        }

        public function getTitle() {
            return $this->_title;
        }

        public function setTitle($title){
            $this->_title = $title;
        }
    }
