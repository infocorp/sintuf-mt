<?php

namespace Infocorp\Bundle\SintufBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Affiliate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Infocorp\Bundle\SintufBundle\Entity\AffiliateRepository")
 */
class Affiliate
{
	const SCHOLARITY_ELEMENTARY_INCOMPLETE = 1;
	const SCHOLARITY_ELEMENTARY_COMPLETE = 2;
	const SCHOLARITY_MEDIUM_INCOMPLETE = 3;
	const SCHOLARITY_MEDIUM_COMPLETE = 4;
	const SCHOLARITY_SUPERIOR_INCOMPLETE = 5;
	const SCHOLARITY_SUPERIOR_COMPLETE = 6;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="registration", type="integer")
     */
    private $registration;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=100)
     * @Assert\Email(message="Por favor, informe um email válido")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="dictrict", type="string", length=50)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     * 
     * @ORM\Column(name="cellphone", type="string", length=20)
     */
    private $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=2)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="birthCity", type="string", length=255)
     */
    private $birthCity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1)
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="civilStatus", type="string", length=20)
     */
    private $civilStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="associateDate", type="date")
     */
    private $associateDate;

    /**
     * @var string
     *
     * @ORM\Column(name="filiationFather", type="string", length=255)
     */
    private $filiationFather;

    /**
     * @var string
     *
     * @ORM\Column(name="filiationMother", type="string", length=255)
     */
    private $filiationMother;

    /**
     * @var integer
     *
     * @ORM\Column(name="scholarity", type="integer")
     */
    private $scholarity;

    /**
     * @var string
     *
     * @ORM\Column(name="registrationId", type="string", length=20)
     */
    private $registrationId;

    /**
     * @var string
     *
     * @ORM\Column(name="expeditionOrgan", type="string", length=10)
     */
    private $expeditionOrgan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expeditionDate", type="date")
     */
    private $expeditionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="ctps", type="string", length=20)
     */
    private $ctps;

    /**
     * @var string
     *
     * @ORM\Column(name="pis", type="string", length=30)
     */
    private $pis;

    /**
     * @var string
     *
     * @ORM\Column(name="voterTitle", type="string", length=20)
     */
    private $voterTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=10)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=20)
     */
    private $section;

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="string", length=30)
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=30)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=30)
     */
    private $pattern;

    /**
     * @var string
     *
     * @ORM\Column(name="regime", type="string", length=30)
     */
    private $regime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admissionDate", type="date")
     */
    private $admissionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="stocking", type="string", length=30)
     */
    private $stocking;

    /**
     * @var string
     *
     * @ORM\Column(name="bankName", type="string", length=100)
     */
    private $bankName;

    /**
     * @var string
     *
     * @ORM\Column(name="function", type="string", length=255)
     */
    private $function;

    /**
     * @var string
     *
     * @ORM\Column(name="bankAgency", type="string", length=30)
     */
    private $bankAgency;

    /**
     * @var string
     *
     * @ORM\Column(name="bankAccount", type="string", length=30)
     */
    private $bankAccount;

    /**
     * @var ArrayColletion
     * 
     * @ORM\OneToMany(targetEntity="Dependent", mappedBy="affiliate")
     */
    private $dependents;

    public function __construct()
    {
    	$this->dependents = new ArrayCollection();
    }


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
     * Set registration
     *
     * @param integer $registration
     * @return Affiliate
     */
    public function setRegistration($registration)
    {
        $this->registration = $registration;
    
        return $this;
    }

    /**
     * Get registration
     *
     * @return integer 
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Affiliate
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
     * Set email
     *
     * @param string $email
     * @return Affiliate
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

    /**
     * Set address
     *
     * @param string $address
     * @return Affiliate
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set dictrict
     *
     * @param string $dictrict
     * @return Affiliate
     */
    public function setDistrict($dictrict)
    {
        $this->dictrict = $dictrict;
    
        return $this;
    }

    /**
     * Get dictrict
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->dictrict;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Affiliate
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return Affiliate
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    
        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string 
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Affiliate
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Affiliate
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set birthCity
     *
     * @param string $birthCity
     * @return Affiliate
     */
    public function setBirthCity($birthCity)
    {
        $this->birthCity = $birthCity;
    
        return $this;
    }

    /**
     * Get birthCity
     *
     * @return string 
     */
    public function getBirthCity()
    {
        return $this->birthCity;
    }

    /**
     * Set birthState
     *
     * @param string $birthState
     * @return Affiliate
     */
    public function setBirthState($birthState)
    {
        $this->birthState = $birthState;
    
        return $this;
    }

    /**
     * Get birthState
     *
     * @return string 
     */
    public function getBirthState()
    {
        return $this->birthState;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Affiliate
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
     * Set sex
     *
     * @param string $sex
     * @return Affiliate
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set civilStatus
     *
     * @param string $civilStatus
     * @return Affiliate
     */
    public function setCivilStatus($civilStatus)
    {
        $this->civilStatus = $civilStatus;
    
        return $this;
    }

    /**
     * Get civilStatus
     *
     * @return string 
     */
    public function getCivilStatus()
    {
        return $this->civilStatus;
    }

    /**
     * Set associateDate
     *
     * @param \DateTime $associateDate
     * @return Affiliate
     */
    public function setAssociateDate($associateDate)
    {
        $this->associateDate = $associateDate;
    
        return $this;
    }

    /**
     * Get associateDate
     *
     * @return \DateTime 
     */
    public function getAssociateDate()
    {
        return $this->associateDate;
    }

    /**
     * Set filiationFather
     *
     * @param string $filiationFather
     * @return Affiliate
     */
    public function setFiliationFather($filiationFather)
    {
        $this->filiationFather = $filiationFather;
    
        return $this;
    }

    /**
     * Get filiationFather
     *
     * @return string 
     */
    public function getFiliationFather()
    {
        return $this->filiationFather;
    }

    /**
     * Set filiationMother
     *
     * @param string $filiationMother
     * @return Affiliate
     */
    public function setFiliationMother($filiationMother)
    {
        $this->filiationMother = $filiationMother;
    
        return $this;
    }

    /**
     * Get filiationMother
     *
     * @return string 
     */
    public function getFiliationMother()
    {
        return $this->filiationMother;
    }

    /**
     * Set scholarity
     *
     * @param integer $scholarity
     * @return Affiliate
     */
    public function setScholarity($scholarity)
    {
        $this->scholarity = $scholarity;
    
        return $this;
    }

    /**
     * Get scholarity
     *
     * @return integer 
     */
    public function getScholarity()
    {
        return $this->scholarity;
    }

    /**
     * Set registrationId
     *
     * @param string $registrationId
     * @return Affiliate
     */
    public function setRegistrationId($registrationId)
    {
        $this->registrationId = $registrationId;
    
        return $this;
    }

    /**
     * Get registrationId
     *
     * @return string 
     */
    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    /**
     * Set expeditionOrgan
     *
     * @param string $expeditionOrgan
     * @return Affiliate
     */
    public function setExpeditionOrgan($expeditionOrgan)
    {
        $this->expeditionOrgan = $expeditionOrgan;
    
        return $this;
    }

    /**
     * Get expeditionOrgan
     *
     * @return string 
     */
    public function getExpeditionOrgan()
    {
        return $this->expeditionOrgan;
    }

    /**
     * Set expeditionDate
     *
     * @param \DateTime $expeditionDate
     * @return Affiliate
     */
    public function setExpeditionDate($expeditionDate)
    {
        $this->expeditionDate = $expeditionDate;
    
        return $this;
    }

    /**
     * Get expeditionDate
     *
     * @return \DateTime 
     */
    public function getExpeditionDate()
    {
        return $this->expeditionDate;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return Affiliate
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    
        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set ctps
     *
     * @param string $ctps
     * @return Affiliate
     */
    public function setCtps($ctps)
    {
        $this->ctps = $ctps;
    
        return $this;
    }

    /**
     * Get ctps
     *
     * @return string 
     */
    public function getCtps()
    {
        return $this->ctps;
    }

    /**
     * Set pis
     *
     * @param string $pis
     * @return Affiliate
     */
    public function setPis($pis)
    {
        $this->pis = $pis;
    
        return $this;
    }

    /**
     * Get pis
     *
     * @return string 
     */
    public function getPis()
    {
        return $this->pis;
    }

    /**
     * Set voterTitle
     *
     * @param string $voterTitle
     * @return Affiliate
     */
    public function setVoterTitle($voterTitle)
    {
        $this->voterTitle = $voterTitle;
    
        return $this;
    }

    /**
     * Get voterTitle
     *
     * @return string 
     */
    public function getVoterTitle()
    {
        return $this->voterTitle;
    }

    /**
     * Set zone
     *
     * @param string $zone
     * @return Affiliate
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    
        return $this;
    }

    /**
     * Get zone
     *
     * @return string 
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set section
     *
     * @param string $section
     * @return Affiliate
     */
    public function setSection($section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return string 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set level
     *
     * @param string $level
     * @return Affiliate
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Affiliate
     */
    public function setClass($class)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set pattern
     *
     * @param string $pattern
     * @return Affiliate
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    
        return $this;
    }

    /**
     * Get pattern
     *
     * @return string 
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set regime
     *
     * @param string $regime
     * @return Affiliate
     */
    public function setRegime($regime)
    {
        $this->regime = $regime;
    
        return $this;
    }

    /**
     * Get regime
     *
     * @return string 
     */
    public function getRegime()
    {
        return $this->regime;
    }

    /**
     * Set admissionDate
     *
     * @param \DateTime $admissionDate
     * @return Affiliate
     */
    public function setAdmissionDate($admissionDate)
    {
        $this->admissionDate = $admissionDate;
    
        return $this;
    }

    /**
     * Get admissionDate
     *
     * @return \DateTime 
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * Set stocking
     *
     * @param string $stocking
     * @return Affiliate
     */
    public function setStocking($stocking)
    {
        $this->stocking = $stocking;
    
        return $this;
    }

    /**
     * Get stocking
     *
     * @return string 
     */
    public function getStocking()
    {
        return $this->stocking;
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     * @return Affiliate
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    
        return $this;
    }

    /**
     * Get bankName
     *
     * @return string 
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Set function
     *
     * @param string $function
     * @return Affiliate
     */
    public function setFunction($function)
    {
        $this->function = $function;
    
        return $this;
    }

    /**
     * Get function
     *
     * @return string 
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set bankAgency
     *
     * @param string $bankAgency
     * @return Affiliate
     */
    public function setBankAgency($bankAgency)
    {
        $this->bankAgency = $bankAgency;
    
        return $this;
    }

    /**
     * Get bankAgency
     *
     * @return string 
     */
    public function getBankAgency()
    {
        return $this->bankAgency;
    }

    /**
     * Set bankAccount
     *
     * @param string $bankAccount
     * @return Affiliate
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    
        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param Dependent
     * 
     * @return Affiliate
     */
    public function addDependents(Dependent $dependent)
    {
    	$dependent->setAffiliate($this);
    	$this->dependents->add($dependent);

    	return $this;
    }

    public function removeDependents(Dependent $dependent)
    {
    	$this->dependents->removeElement($dependent);

    	return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDependents()
    {
    	return $this->dependents;
    }
}