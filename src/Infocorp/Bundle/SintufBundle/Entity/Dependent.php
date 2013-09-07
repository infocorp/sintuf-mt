<?php

namespace Infocorp\Bundle\SintufBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dependent
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dependent
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="kinshipDegree", type="integer")
     */
    private $kinshipDegree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="datetime")
     */
    private $birthDate;

    /**
     * @var Affiliate
     * 
     * @ORM\ManyToOne(targetEntity="Affiliate", inversedBy="dependents")
     */
    private $affiliate;


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
     * Set name
     *
     * @param string $name
     * @return Dependent
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set kinshipDegree
     *
     * @param integer $kinshipDegree
     * @return Dependent
     */
    public function setKinshipDegree($kinshipDegree)
    {
        $this->kinshipDegree = $kinshipDegree;
    
        return $this;
    }

    /**
     * Get kinshipDegree
     *
     * @return integer 
     */
    public function getKinshipDegree()
    {
        return $this->kinshipDegree;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Dependent
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    
        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Sets affiliate
     * 
     * @param Affiliate
     * 
     * @return Dependent
     */
    public function setAffiliate(Affiliate $affiliate)
    {
    	$this->affiliate = $affiliate;

    	return $this;
    }

    /**
     * Gets affiliate
     * 
     * @return Affiliate
     */
    public function getAffiliate()
    {
    	return $this->affiliate;
    }
}