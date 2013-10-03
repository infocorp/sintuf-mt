<?php

namespace Infocorp\Bundle\SintufBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\NewsBundle\Model\Tag;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Direction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Infocorp\Bundle\SintufBundle\Entity\DirectionRepository")
 */
class Direction
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
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=100)
     * @Assert\Email(message="Por favor, informe um email válido")
     */
    private $email;


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

    /**
     * Set link
     *
     * @param string $link
     * @return Direction
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Direciton
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
