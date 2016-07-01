<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PolcodeProductBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

use PolcodeProductBundle\Document\Product;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('translations', 'a2lix_translations_gedmo'
                    ,array('translatable_class' => "PolcodeProductBundle\Document\Product")
                    )
            //->add('name', 'text')
            //->add('description', 'textarea')
//            ->with('General')
//                ->add('title', 'translatable_field', array(
//                    'field'                => 'name',
//                    'personal_translation' => 'PolcodeProductBundle\Entity\Translation\ProductTranslation',
//                    'property_path'        => 'translations',
//                ))
//            ->end()
            ->add('price', 'integer')
            ->add('category', 'sonata_type_model', array(
                'class' => 'PolcodeProductBundle\Document\ProductCategory',
                'property' => 'name',
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('price')
            ->add('category.name')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array('template' => 'PolcodeProductBundle:CRUD:list__action_delete.html.twig'),
                )
            ))
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
                ->add('category', null, array(), 'document', array(
                'class'    => 'PolcodeProductBundle\Document\ProductCategory',
                'property' => 'name',
            ))
        ;
    }
    
    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getName()
            : 'Product'; // shown in the breadcrumb on the create view
    }
}
