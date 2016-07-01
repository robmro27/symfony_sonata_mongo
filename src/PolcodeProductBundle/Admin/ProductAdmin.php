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
            ->with('Translations')
                ->add('translations', 'a2lix_translations_gedmo'
                        ,array(
                'translatable_class' => "PolcodeProductBundle\Document\Product",            
                'fields' => array(                      // [optional] Manual configuration of fields to display and options. If not specified, all translatable fields will be display, and options will be auto-detected
                    'name' => array(
                        'label' => 'Name',              // [optional] Custom label. Ucfirst, otherwise
                        'field_type' => 'text',           // [optional] Custom type
                        'trim' => true,
                        'required' => true
                    ),
                    'slug' => array(
                        'label' => 'Slug (Leave empty for auto update)',              // [optional] Custom label. Ucfirst, otherwise
                        'field_type' => 'text',           // [optional] Custom type
                        'trim' => true,
                        'required' => false,
                    ), 
                    'description' => array(
                        'label' => 'Description',              // [optional] Custom label. Ucfirst, otherwise
                        'field_type' => 'textarea',           // [optional] Custom type
                        'required' => true,
                    ))))
            ->end()    
                
            ->with('General')   
                ->add('price', 'integer')
                ->add('category', 'sonata_type_model', array(
                    'class' => 'PolcodeProductBundle\Document\ProductCategory',
                    'property' => 'name',
                ))
            ->end()
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
