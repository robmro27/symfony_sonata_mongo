<?php

// src/AppBundle/Admin/BlogPostAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class BlogPostAdmin extends AbstractAdmin
{
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('title')
                ->add('category', null, array(), 'document', array(
                'class'    => 'AppBundle\Document\Category',
                'property' => 'name',
            ))
        ;
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('category', 'document', array(
                'class' => 'AppBundle\Document\Category',
                'property' => 'name',
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            ->add('draft', 'boolean')
        ;
    }
    
    
    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
    
}