<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class BlogPost
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $title;

    /**
     * @MongoDB\Field(type="string")
     */
    private $body;

    /**
     * @MongoDB\Field(type="bool")
     */
    private $draft = false;


    /** @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="posts") */
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
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get body
     *
     * @return string $body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set draft
     *
     * @param bool $draft
     * @return self
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;
        return $this;
    }

    /**
     * Get draft
     *
     * @return bool $draft
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Set category
     *
     * @param AppBundle\Document\Category $category
     * @return self
     */
    public function setCategory(\AppBundle\Document\Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return AppBundle\Document\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
