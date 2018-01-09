<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Taxref
 *
 * @ORM\Table(name="Taxref")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxrefRepository")
 */
class Taxref
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
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_vern", type="string", length=255)
     */
    private $nomVern;
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
     * Set regne
     *
     * @param string $regne
     *
     * @return taxref
     */
    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return taxref
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
        return $this;
    }
    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }
    /**
     * Set nomVern
     *
     * @param string $nomVern
     *
     * @return taxref
     */
    public function setNomVern($nomVern)
    {
        $this->nomVern = $nomVern;
        return $this;
    }
    /**
     * Get nomVern
     *
     * @return string
     */
    public function getNomVern()
    {
        return $this->nomVern;
    }
}
