<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * taxrefFile
 *
 * @ORM\Table(name="taxref_file")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\taxrefFileRepository")
 */
class TaxrefFile
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
     * @ORM\Column(name="taxrefFile", type="string", length=255)
     */
    private $taxrefFile;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255)
     */
    private $fileName;

    /**
     * @var int
     *
     * @ORM\Column(name="fileSize", type="integer")
     */
    private $fileSize;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploadDate", type="date")
     */
    private $uploadDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="date")
     */
    private $updateDate;


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
     * Set taxrefFile
     *
     * @param string $taxrefFile
     *
     * @return taxrefFile
     */
    public function setTaxrefFile($taxrefFile)
    {
        $this->taxrefFile = $taxrefFile;

        return $this;
    }

    /**
     * Get taxrefFile
     *
     * @return string
     */
    public function getTaxrefFile()
    {
        return $this->taxrefFile;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return taxrefFile
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return taxrefFile
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set uploadDate
     *
     * @param \DateTime $uploadDate
     *
     * @return taxrefFile
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;

        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return taxrefFile
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}

