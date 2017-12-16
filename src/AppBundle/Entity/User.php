<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    const SPECIALITY_VISITOR    = 0; //visiteur
    const SPECIALITY_USER       = 1; //utilisateur
    const SPECIALITY_NATUALIST  = 2; //naturaliste
    const SPECIALITY_EDITOR     = 3; //rédacteur
    const SPECIALITY_ADMIN      = 4; //admin
    const SPECIALITY_SUPER_ADMIN= 5; //super admin
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscriptionDate", type="date")
     */
    private $inscriptionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="organization", type="string", length=255)
     */
    private $organization;

    /**
     * @var string
     *
     * @ORM\Column(name="speciality", type="string", length=255)
     */
    private $speciality;

    /**
     * @var string
     *
     * @ORM\Column(name="imageFile", type="string", length=255)
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdate", type="date")
     */
    private $lastUpdate;


    /**
     * @var boolean
     * @ORM\Column(name="newsletterInscrit", type="boolean")
     */
    private $newsletterInscrit;
    /**
     * @var boolean
     * @ORM\Column(name="ethicCharterAccepted", type="boolean")
     */
    private $ethicCharterAccepted;
    /**
     * @var integer
     * @ORM\Column(name="validatedObservation", type="integer")
     */
    private $validatedObservation;
    /**
     * @var integer
     * @ORM\Column(name="rejectedObservation", type="integer")
     */
    private $rejectedObservation;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Observation", inversedBy="userNaturalistId")
     * @ORM\JoinColumn(name="actualiteId", referencedColumnName="id")
     */
    private $naturalistId;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return user
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return user
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set inscriptionDate
     *
     * @param \DateTime $inscriptionDate
     *
     * @return user
     */
    public function setInscriptionDate($inscriptionDate)
    {
        $this->inscriptionDate = $inscriptionDate;

        return $this;
    }

    /**
     * Get inscriptionDate
     *
     * @return \DateTime
     */
    public function getInscriptionDate()
    {
        return $this->inscriptionDate;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return user
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
     * Set organization
     *
     * @param string $organization
     *
     * @return user
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set speciality
     *
     * @param string $speciality
     *
     * @return user
     */
    public function setSpeciality($speciality)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get speciality
     *
     * @return string
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Set imageFile
     *
     * @param string $imageFile
     *
     * @return user
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    /**
     * Get imageFile
     *
     * @return string
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return user
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return user
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
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return user
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
    /**
     * Set newsletterInscrit
     *
     * @param bool $newsletterInscrit
     *
     * @return user
     */
    public function setNewsletterInscrit($newsletterInscrit)
    {
        $this->newsletterInscrit = $newsletterInscrit;

        return $this;
    }

    /**
     * Get newsletterInscrit
     *
     * @return bool
     */
    public function getNewsletterInscrit()
    {
        return $this->newsletterInscrit;
    }
    /**
     * Set ethicCharterAccepted
     *
     * @param bool $ethicCharterAccepted
     *
     * @return user
     */
    public function setEthicCharterAccepted($ethicCharterAccepted)
    {
        $this->ethicCharterAccepted = $ethicCharterAccepted;

        return $this;
    }

    /**
     * Get ethicCharterAccepted
     *
     * @return bool
     */
    public function getethicCharterAccepted()
    {
        return $this->ethicCharterAccepted;
    }
    /**
     * Set validatedObservation
     *
     * @param integer $validatedObservation
     *
     * @return user
     */
    public function setValidatedObservation($validatedObservation)
    {
        $this->validatedObservation = $validatedObservation;

        return $this;
    }

    /**
     * Get validatedObservation
     *
     * @return integer
     */
    public function getValidatedObservation()
    {
        return $this->validatedObservation;
    }
    /**
     * Set rejectedObservation
     *
     * @param integer $rejectedObservation
     *
     * @return user
     */
    public function setRejectedObservation($rejectedObservation)
    {
        $this->rejectedObservation = $rejectedObservation;

        return $this;
    }

    /**
     * Get rejectedObservation
     *
     * @return integer
     */
    public function getRejectedObservation()
    {
        return $this->rejectedObservation;
    }
}

