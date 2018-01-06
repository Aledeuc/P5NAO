<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="contactName", type="string", length=255)
     */
    private $contactName;
    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255)
     */
    private $contactEmail;
    /**
     * @var string
     *
     * @ORM\Column(name="contactObjet", type="string", length=255)
     */
    private $contactObject;
    /**
     * @var string
     *
     * @ORM\Column(name="contactMessage", type="string", length=255)
     */
    private $contactMessage;
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
     * Set contactName
     *
     * @param string $contactName
     *
     * @return contact
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }
    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }
    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return contact
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }
    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }
    /**
     * Set contactObject
     *
     * @param string $contactObject
     *
     * @return contact
     */
    public function setContactObject($contactObject)
    {
        $this->contactObject = $contactObject;
        return $this;
    }
    /**
     * Get contactObject
     *
     * @return string
     */
    public function getContactObject()
    {
        return $this->contactObject;
    }
    /**
     * Set contactMessage
     *
     * @param string $contactMessage
     *
     * @return contact
     */
    public function setContactMessage($contactMessage)
    {
        $this->contactMessage = $contactMessage;
        return $this;
    }
    /**
     * Get contactMessage
     *
     * @return string
     */
    public function getContactMessage()
    {
        return $this->contactMessage;
    }
}