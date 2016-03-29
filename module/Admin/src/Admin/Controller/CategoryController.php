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
use Application\Controller\BaseAdminController as BaseController;
use Admin\Form\CategoryAddForm;
class CategoryController extends BaseController
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

    public function addAction()
    {
        $form = new CategoryAddForm;
        $status=$message='';
        $em=$this->getEntityManager();
        $request=$this->getRequest();

        if ($request->isPost()){
            $form->setData($request->isPost());
            if ($form->isValid()) {

                $category = new Category();
                $category->exchangeArray($form->getData());

                $em->persist($category);
                $em->flush();

                $status = 'success';
                $message = 'Категория добавлена';
            } else {
                $status = 'error';
                $message = 'Ошибка параметров';
            }
        } else {
            return array('form'=>$form);
        }
        if ($message){
            $this->flashMessager()
                ->setNamestace($status)
                ->addMessage($message);
        }

        return $this->redirect()->toRoute('admin/catrgory');
    }
}

