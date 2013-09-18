<?php

namespace Infocorp\Bundle\SintufBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\NewsBundle\Model\Tag;

/**
 * Direction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Infocorp\Bundle\SintufBundle\Entity\CovenantRepository")
 */
class Covenant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     * 
     * @ORM\Column(name="raw_content", type="text")
     */
    private $rawContent;

    /**
     * @var string
     * 
     * @ORM\Column(name="content_formatter", type="string", length=255)
     */
    private $contentFormatter;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Direction
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->setSlug(Tag::slugify($title));
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets slug
     * 
     * @return Direction
     */
    public function setSlug($slug)
    {
    	$this->slug = $slug;

    	return $this;
    }

    /**
     * Gets slug
     * 
     * @return string
     */
    public function getSlug()
    {
    	return $this->slug;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Direction
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Direction
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets Raw Content
     * 
     * @return Direction
     */
    public function setRawContent($rawContent)
    {
    	$this->rawContent = $rawContent;

    	return $this;
    }

    /**
     * Gets Raw Content
     * 
     * @return string
     */
    public function getRawContent()
    {
    	return $this->rawContent;
    }

    /**
     * Sets the Content Formatter
     * 
     * @return Direction
     */
    public function setContentFormatter($contentFormatter)
    {
    	$this->contentFormatter = $contentFormatter;

    	return $this;
    }

    /**
     * Gets the Content Formatter
     * 
     * @return string
     */
    public function getContentFormatter()
    {
    	return $this->contentFormatter;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Featured
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Featured
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
