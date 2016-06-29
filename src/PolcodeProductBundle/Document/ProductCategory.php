<?php

namespace PolcodeProductBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class ProductCategory {
    
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;
    
    
    /** @MongoDB\ReferenceMany(targetDocument="Product", mappedBy="category") */
    private $products;
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add product
     *
     * @param PolcodeProductBundle\Document\Product $product
     */
    public function addProduct(\PolcodeProductBundle\Document\Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * Remove product
     *
     * @param PolcodeProductBundle\Document\Product $product
     */
    public function removeProduct(\PolcodeProductBundle\Document\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection $products
     */
    public function getProducts()
    {
        return $this->products;
    }
}
