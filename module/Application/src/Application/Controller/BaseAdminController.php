<?php

namespace Application\Controller;
use Application\Controller\BaseController;

class BaseAdminController extends BaseController
{
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        return parent::onDispatch($e);
    }

}