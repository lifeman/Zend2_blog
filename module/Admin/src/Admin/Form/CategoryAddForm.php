<?php
/**
 * User: user
 * Date: 29.03.2016
 * Time: 7:30
 */
namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class CategoryAddForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('categoryAddForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'bs-example form-horizontal');

        $this->add(array(
                'name' => 'categoryKey',
                'type' => 'text',
                'options' => array(
                    'min' => 3,
                    'max' => 100,
                    'label' => 'Ключ'
                ),
                'attributes' => array(
                    'class'=>'form-control',
                    'required'=>'required',
                )
            )
        );
        $this->add(array(
                'name' => 'categoryName',
                'type' => 'text',
                'options' => array(
                    'min' => 3,
                    'max' => 100,
                    'label' => 'Название'
                ),
                'attributes' => array(
                    'class'=>'form-control',
                    'required'=>'required',
                )
            )
        );
        $this->add(array(
                'name' => 'submit',
                'type' => 'submit',
                'attributes' => array(
                    'value'=>'Сохранить',
                    'id'=>'btn-submit',
                    'class'=>'btn btn-primary',
                )
            )
        );


    }

}
