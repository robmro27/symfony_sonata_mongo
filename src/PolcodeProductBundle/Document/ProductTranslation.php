<?php

namespace PolcodeProductBundle\Document;

use Gedmo\Translatable\Document\MappedSuperclass\AbstractPersonalTranslation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class ProductTranslation extends AbstractPersonalTranslation
{
    
    
    /** @MongoDB\ReferenceOne(targetDocument="Product", inversedBy="translations", cascade={"persist", "remove"}) */
    protected $object;
    
}
