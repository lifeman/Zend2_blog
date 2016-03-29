<?php
/**
 * Created by PhpStorm.
 * User: lifeman
 * Date: 28.03.16
 * Time: 14:31
 */

namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;

class BaseController extends AbstractActionController
{
    protected $entityManager;

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     */
    public function setEntityManager( \Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        return parent::onDispatch($e);
    }
}