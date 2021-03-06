<?php

namespace PolcodeProductBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document
 * @Gedmo\TranslationEntity(class="PolcodeProductBundle\Document\ProductTranslation")
 */
class Product implements Translatable
{
    
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     * @Gedmo\Translatable
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @MongoDB\Field(type="string")
     * @Gedmo\Translatable
     */
    private $slug;
    
    /**
     * @MongoDB\Field(type="string")
     * @Gedmo\Translatable
     */
    private $description;
    
    /**
     * @MongoDB\Field(type="int")
     */
    private $price;
    

    /** @MongoDB\ReferenceOne(targetDocument="ProductCategory", inversedBy="products", cascade={"persist", "remove"}) */
    private $category;
    
    
    /**
     * @var date $created
     *
     * @MongoDB\Date
     * @Gedmo\Timestampable(on="create")
     */
    private $created;

    /**
     * @var date $updated
     *
     * @MongoDB\Date
     * @Gedmo\Timestampable
     */
    private $updated;

    /**
     * @var \DateTime $contentChanged
     *
     * @MongoDB\Date
     * @Gedmo\Timestampable(on="change", field={"title", "description"})
     */
    private $contentChanged;

    
    
    /** @MongoDB\ReferenceMany(targetDocument="ProductTranslation", mappedBy="object", cascade={"persist", "remove"}) */
    private $translations;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;
    
    public function __construct()
    {
       $this->translations = new ArrayCollection();
    }
    
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

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param date $updated
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return date $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set contentChanged
     *
     * @param date $contentChanged
     * @return self
     */
    public function setContentChanged($contentChanged)
    {
        $this->contentChanged = $contentChanged;
        return $this;
    }

    /**
     * Get contentChanged
     *
     * @return date $contentChanged
     */
    public function getContentChanged()
    {
        return $this->contentChanged;
    }

    /**
     * Add translation
     *
     * @param PolcodeProductBundle\Document\ProductTranslation $translation
     */
    public function addTranslation(\PolcodeProductBundle\Document\ProductTranslation $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * Remove translation
     *
     * @param PolcodeProductBundle\Document\ProductTranslation $translation
     */
    public function removeTranslation(\PolcodeProductBundle\Document\ProductTranslation $translation)
    {
        $this->translations->removeElement($translation);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection $translations
     */
    public function getTranslations()
    {
        return $this->translations;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
    
    
    
//    public function __call($name, $arguments) {
//    
//        $name = strtolower(substr($name, 3));
//        
////        echo '<pre>';
////        print_r($name);
////        echo '</pre>';
////        die;
//        
//        foreach ( $this->getTranslations() as $translation ) {
//            
//            echo '<pre>';
//            print_r( \Doctrine\Common\Util\Debug::dump( $translation ) );
//            echo '</pre>';
//            
//        }
//        
//        die;
//    }
    
}
