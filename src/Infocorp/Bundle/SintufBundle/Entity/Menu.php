<?php

namespace Infocorp\Bundle\SintufBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="menu")
 */
class Menu
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=150)
     */
    protected $name;

    /**
     * @var string
     * 
     * @ORM\Column(name="url", type="string", length=255)
     */
    protected $url;

    /**
     * @var Menu
     * 
     * @ORM\OneToMany(targetEntity="Menu", mappedBy="id")
     */
    protected $children;

    /**
     * @var Menu
     * 
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function addChildren(Menu $children)
    {
        $this->children->add($children);

        return $this;
    }

    public function removeChildren(Menu $children)
    {
        $this->children->removeElement($children);

        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setParent(Menu $parent)
    {
        $parent->addChildren($this);
        $this->parent = $parent;

        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function __toString()
    {
        return $this->name;
    }
}