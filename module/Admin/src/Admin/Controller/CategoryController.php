<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Application\Controller\BaseAdminController as BaseController;

class CategoryController extends AbstractActionController
{
    public function indexAction()
    {
        $em=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
//        $em->getEntityManager();
        $query=$em->createQuery('SELECT  u FROM Blog\Entity\Category u ORDER BY  u.id DESC');
            $rows=$query->getResult();
//        var_dump($rows);
//        exit;
//        return new ViewModel();
        return array('category'=>$rows);
    }
}
