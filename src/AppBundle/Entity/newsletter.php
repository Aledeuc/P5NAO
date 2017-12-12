<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * newsletter
 *
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\newsletterRepository")
 */
class newsletter
{
    /**
     * @var int
     *
     * @ORM\Column(name="newsletterId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $newsletterId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


    /**
     * Get newsletterId
     *
     * @return int
     */
    public function getNewsletterId()
    {
        return $this->newsletterId;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return newsletter
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

