<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gamification
 *
 * @ORM\Table(name="gamification")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\gamificationRepository")
 */
class gamification
{
    /**
     * @var int
     *
     * @ORM\Column(name="gamificationId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $gamificationId;

    /**
     * @var string
     *
     * @ORM\Column(name="rang", type="string", length=255)
     */
    private $rang;

    /**
     * @var int
     *
     * @ORM\Column(name="rangLevel", type="integer")
     */
    private $rangLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="rangImageFile", type="string", length=255)
     */
    private $rangImageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="rangImageFileName", type="string", length=255)
     */
    private $rangImageFileName;


    /**
     * Get gamificationId
     *
     * @return int
     */
    public function getGamificationId()
    {
        return $this->gamificationId;
    }

    /**
     * Set rang
     *
     * @param string $rang
     *
     * @return gamification
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set rangLevel
     *
     * @param integer $rangLevel
     *
     * @return gamification
     */
    public function setRangLevel($rangLevel)
    {
        $this->rangLevel = $rangLevel;

        return $this;
    }

    /**
     * Get rangLevel
     *
     * @return int
     */
    public function getRangLevel()
    {
        return $this->rangLevel;
    }

    /**
     * Set rangImageFile
     *
     * @param string $rangImageFile
     *
     * @return gamification
     */
    public function setRangImageFile($rangImageFile)
    {
        $this->rangImageFile = $rangImageFile;

        return $this;
    }

    /**
     * Get rangImageFile
     *
     * @return string
     */
    public function getRangImageFile()
    {
        return $this->rangImageFile;
    }

    /**
     * Set rangImageFileName
     *
     * @param string $rangImageFileName
     *
     * @return gamification
     */
    public function setRangImageFileName($rangImageFileName)
    {
        $this->rangImageFileName = $rangImageFileName;

        return $this;
    }

    /**
     * Get rangImageFileName
     *
     * @return string
     */
    public function getRangImageFileName()
    {
        return $this->rangImageFileName;
    }
}

