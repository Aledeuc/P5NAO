<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * actualite
 *
 * @ORM\Table(name="actualite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\actualiteRepository")
 */
class actualite
{
    /**
     * @var int
     *
     * @ORM\Column(name="actualiteId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $actualiteId;

    /**
     * @var string
     *
     * @ORM\Column(name="actualite_author", type="string", length=255)
     */
    private $actualiteAuthor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualiteDate", type="date")
     */
    private $actualiteDate;

    /**
     * @var string
     *
     * @ORM\Column(name="actualiteTitle", type="string", length=255)
     */
    private $actualiteTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="actualiteArticle", type="string", length=255)
     */
    private $actualiteArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="actualiteStatus", type="string", length=255)
     */
    private $actualiteStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="actualiteCategory", type="string", length=255)
     */
    private $actualiteCategory;

    /**
     * @var string
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $actualiteImageFile;

    /**
     * @var string
     * @ORM\Column(type="string")
     *
     */
    private $actualiteImageName;

    /**
     * Get actualiteId
     *
     * @return int
     */
    public function getActualiteId()
    {
        return $this->actualiteId;
    }

    /**
     * Set actualiteAuthor
     *
     * @param string $actualiteAuthor
     *
     * @return actualite
     */
    public function setActualiteAuthor($actualiteAuthor)
    {
        $this->author = $actualiteAuthor;

        return $this;
    }

    /**
     * Get actualiteAuthor
     *
     * @return string
     */
    public function getActualiteAuthor()
    {
        return $this->actualiteAuthor;
    }

    /**
     * Set actualiteDate
     *
     * @param \DateTime $actualiteDate
     *
     * @return actualite
     */
    public function setActualiteDate($actualiteDate)
    {
        $this->actualiteDate = $actualiteDate;

        return $this;
    }

    /**
     * Get actualiteDate
     *
     * @return \DateTime
     */
    public function getActualiteDate()
    {
        return $this->actualiteDate;
    }

    /**
     * Set actualiteTitle
     *
     * @param string $actualiteTitle
     *
     * @return actualite
     */
    public function setActualiteTitle($actualiteTitle)
    {
        $this->actualiteTitle = $actualiteTitle;

        return $this;
    }

    /**
     * Get actualiteTitle
     *
     * @return string
     */
    public function getActualiteTitle()
    {
        return $this->actualiteTitle;
    }

    /**
     * Set actualiteArticle
     *
     * @param string $actualiteArticle
     *
     * @return actualite
     */
    public function setActualiteArticle($actualiteArticle)
    {
        $this->actualiteArticle = $actualiteArticle;

        return $this;
    }

    /**
     * Get actualiteArticle
     *
     * @return string
     */
    public function getActualiteArticle()
    {
        return $this->actualiteArticle;
    }

    /**
     * Set actualiteStatus
     *
     * @param string $actualiteStatus
     *
     * @return actualite
     */
    public function setActualiteStatus($actualiteStatus)
    {
        $this->actualiteStatus = $actualiteStatus;

        return $this;
    }

    /**
     * Get actualiteStatus
     *
     * @return string
     */
    public function getActualiteStatus()
    {
        return $this->actualiteStatus;
    }

    /**
     * Set actualiteCategory
     *
     * @param string $actualiteCategory
     *
     * @return actualite
     */
    public function setActualiteCategory($actualiteCategory)
    {
        $this->actualiteCategory = $actualiteCategory;

        return $this;
    }

    /**
     * Get actualiteCategory
     *
     * @return string
     */
    public function getActualiteCategory()
    {
        return $this->actualiteCategory;
    }

    /**
     * Set actualiteImageFile
     *
     * @param string $actualiteImageFile
     *
     * @return actualite
     */
    public function setActualiteImageFile($actualiteImageFile)
    {
        $this->actualiteImageFile = $actualiteImageFile;

        return $this;
    }

    /**
     * Get actualiteImageFile
     *
     * @return string
     */
    public function getActualiteImageFile()
    {
        return $this->actualiteImageFile;
    }

    /**
     * Set actualiteImageName
     *
     * @param string $actualiteImageName
     *
     * @return actualite
     */
    public function setActualiteImageName($actualiteImageName)
    {
        $this->actualiteImageName = $actualiteImageName;

        return $this;
    }

    /**
     * Get actualiteImageName
     *
     * @return string
     */
    public function getActualiteImageName()
    {
        return $this->actualiteImageName;
    }
}

