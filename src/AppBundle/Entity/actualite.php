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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="actualiteAuthor", type="string", length=255)
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
}

