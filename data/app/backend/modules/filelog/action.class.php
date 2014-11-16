<?php

class FilelogAction extends fvAction {

    function __construct () {
    parent::__construct(fvSite::$Layout);
}

    function executeIndex() {
        if (!fvRequest::getInstance()->isXmlHttpRequest()) {
            return self::$FV_OK;
        } else {
            return self::$FV_AJAX_CALL;
        }
    }

    function executeView() {
        if (!fvRequest::getInstance()->isXmlHttpRequest()) {
            return self::$FV_OK;
        } else {
            return self::$FV_AJAX_CALL;
        }
    }

    function executeTruncate()
    {
        $log = $this->_request->log;
        $path = FV_ROOT . "logs/{$log}.log";

        if (!file_exists($path) )
        {
            $this->setFlash("Лог не найден.", self::$FLASH_ERROR);
        }
        else
        {
            file_put_contents($path, "");
            $this->setFlash("Лог успешно очищен", self::$FLASH_SUCCESS);
        }

        $request = fvRequest::getInstance();
        fvResponse::getInstance()->setHeader('redirect', fvSite::$fvConfig->get('dir_web_root') . $request->getRequestParameter('module') . "/");

        if (fvRequest::getInstance()->isXmlHttpRequest())
            return self::$FV_NO_LAYOUT;
        else return self::$FV_OK;
    }

}

?>
