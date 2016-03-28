<?php
/**
 * Created by PhpStorm.
 * User: lifeman
 * Date: 28.03.16
 * Time: 14:43
 */

namespace Application\Controller;

class BaseAdminController extends BaseController
{
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        return parent::onDispatch($e);
    }

}