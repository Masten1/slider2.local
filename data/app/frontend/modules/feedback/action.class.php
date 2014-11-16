<?php

    class FeedbackAction extends fvAction{

        function __construct(){
            parent::__construct( fvSite::$Layout );
        }

        function executeIndex(){
            if( !fvRequest::getInstance()->isXmlHttpRequest()){
                return self::$FV_OK;
            }
            else{
                return self::$FV_AJAX_CALL;
            }
        }

        function executeSubmit(){
            $call = new Emp_Ordercall();
            $request = fvRequest::getInstance();

            $call->hydrate($request->getRequestParameter('data'));

            if ($call->save())
            {

                fvResponse::getInstance()->setHeader('message', json_encode("Благодарим за заявку, наши менеджеры свяжутся с Вами в ближайшее время"));

            } else {
                fvResponse::getInstance()->setHeader('message', json_encode("Ошибка при отправке сообщения. Попробуйте еще раз."));

            }

            if (!fvRequest::getInstance()->isXmlHttpRequest()) {
                return self::$FV_OK;
            } else {
                return self::$FV_AJAX_CALL;
            }
        }
    }
