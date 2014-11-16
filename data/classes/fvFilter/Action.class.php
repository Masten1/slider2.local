<?php

class fvFilter_Action implements iFilter {

    public function __construct() {

    }

    public function execute() {
        fvSite::$fvSession->remove("login/redirectURL");

        $LayoutClass =  fvSite::$fvConfig->get( "layout" );

        $layout = fvSite::$Layout = new $LayoutClass;
        $response = fvResponse::getInstance();

        $actionName = fvRoute::getInstance()->getActionName();


        if (( $action = fvDispatcher::getInstance()->getModule( fvRoute::getInstance()->getModuleName() , 'action' ) ) === false) {
            fvDispatcher::getInstance()->redirect(fvSite::$fvConfig->get('page_404', 0, 404));
        }

        $result = $action->callAction( $actionName );
        $module = fvDispatcher::getInstance()->getModule( fvRoute::getInstance()->getModuleName(), 'module' );

        $response->useLayout(true);
        switch ($result) {
            case fvAction::$FV_OK:
                if ($module === false) {
                    fvDispatcher::getInstance()->redirect(fvSite::$fvConfig->get('page_404', 0, 404));
                }
                $layout->setModuleResult( $module->showModule( $actionName ) );
                break;
            case fvAction::$FV_NO_ACTION:
                if (($module === false) || ( ($moduleResult = $module->showModule($actionName)) == fvModule::$FV_NO_MODULE)) {
                    //fvDispatcher::getInstance()->redirect(fvSite::$fvConfig->get('page_404', 0, 404));
                    print_r(fvRoute::getInstance());
                }
                $layout->setModuleResult($moduleResult);
                break;
            case fvAction::$FV_ERROR:
                fvDispatcher::getInstance()->redirect(fvSite::$fvConfig->get('error_page', 0, 404));
                break;
            case fvAction::$FV_NO_LAYOUT_MODULE:
                $response->useLayout(false);
                break;
            case fvAction::$FV_NO_LAYOUT:
            case fvAction::$FV_AJAX_CALL:
                    $response->useLayout(false);
                    if (($module !== false) && (($moduleResult = $module->showModule($actionName)) != fvModule::$FV_NO_MODULE)) {
                        $response->setresponseBody($moduleResult);
                    }
                break;
            default:
                return false;
                break;
        }


        if ($response->useLayout()) {
            $response->setresponseBody($layout->showPage());
        }
        return true;
    }
}
