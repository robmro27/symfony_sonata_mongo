<?php

// src/AppBundle/Admin/CategoryAdmin.php
namespace PolcodeProductBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use PolcodeProductBundle\Document\ProductCategory;

class ProductCategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
    
    public function toString($object)
    {
        return $object instanceof ProductCategory
            ? $object->getName()
            : 'Category'; // shown in the breadcrumb on the create view
    }
}