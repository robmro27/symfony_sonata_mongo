<?php

namespace PolcodeProductBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Product
{
    
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="string")
     */
    private $description;
    
    /**
     * @MongoDB\Field(type="int")
     */
    private $price;
    

    /** @MongoDB\ReferenceOne(targetDocument="ProductCategory", inversedBy="products", cascade={"detach"}) */
    private $category;
    
    
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

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param int $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return int $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param PolcodeProductBundle\Document\ProductCategory $category
     * @return self
     */
    public function setCategory(\PolcodeProductBundle\Document\ProductCategory $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return PolcodeProductBundle\Document\ProductCategory $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
