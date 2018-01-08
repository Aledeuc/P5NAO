<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxref
 *
 * @ORM\Table(name="taxref")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxrefRepository")
 */
class Taxref
{
    const SEARCH_NUM_ITEMS = 12;

    /**
     * @var string
     *
     * @ORM\Column(name="reign", type="string", length=255)
     */
    private $reign;

    /**
     * @var string
     *
     * @ORM\Column(name="phylum", type="string", length=255)
     */
    private $phylum;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="specie_order", type="string", length=255)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="family", type="string", length=255)
     */
    private $family;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="CD_NAME", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cdName;

    /**
     * @var int
     *
     * @ORM\Column(name="CD_TAXSUP", type="integer")
     */
    private $cdTaxsup;

    /**
     * @var int
     *
     * @ORM\Column(name="CD_REF", type="integer")
     */
    private $cdRef;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=50)
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="LB_NAME", type="string", length=255)
     */
    private $lbName;

    /**
     * @var string
     *
     * @ORM\Column(name="LB_AUTHOR", type="string", length=255)
     */
    private $lbAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="FULL_NAME", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="VALID_NAME", type="string", length=255)
     */
    private $validName;

    /**
     * @var string
     *
     * @ORM\Column(name="VERN_NAME", type="string", length=255, nullable=true)
     */
    private $vernacularName;

    /**
     * @var string
     *
     * @ORM\Column(name="ENG_VERN_NAME", type="string", length=255, nullable=true)
     */
    private $engVernacularName;

    /**
     * @var int
     *
     * @ORM\Column(name="habitat", type="integer")
     */
    private $habitat;

    /**
     * @var string
     *
     * @ORM\Column(name="fr", type="string", length=255, nullable=true)
     */
    private $fr;

    /**
     * @var string
     *
     * @ORM\Column(name="gf", type="string", length=255, nullable=true)
     */
    private $gf;

    /**
     * @var string
     *
     * @ORM\Column(name="mar", type="string", length=255, nullable=true)
     */
    private $mar;

    /**
     * @var string
     *
     * @ORM\Column(name="gua", type="string", length=255, nullable=true)
     */
    private $gua;

    /**
     * @var string
     *
     * @ORM\Column(name="sm", type="string", length=255, nullable=true)
     */
    private $sm;

    /**
     * @var string
     *
     * @ORM\Column(name="sb", type="string", length=255, nullable=true)
     */
    private $sb;

    /**
     * @var string
     *
     * @ORM\Column(name="spm", type="string", length=255, nullable=true)
     */
    private $spm;

    /**
     * @var string
     *
     * @ORM\Column(name="may", type="string", length=255, nullable=true)
     */
    private $may;

    /**
     * @var string
     *
     * @ORM\Column(name="epa", type="string", length=255, nullable=true)
     */
    private $epa;

    /**
     * @var string
     *
     * @ORM\Column(name="reu", type="string", length=255, nullable=true)
     */
    private $reu;

    /**
     * @var string
     *
     * @ORM\Column(name="sa", type="string", length=255, nullable=true)
     */
    private $sa;

    /**
     * @var string
     *
     * @ORM\Column(name="ta", type="string", length=255, nullable=true)
     */
    private $ta;

    /**
     * @var string
     *
     * @ORM\Column(name="taaf", type="string", length=255, nullable=true)
     */
    private $taaf;

    /**
     * @var string
     *
     * @ORM\Column(name="nc", type="string", length=255, nullable=true)
     */
    private $nc;

    /**
     * @var string
     *
     * @ORM\Column(name="wf", type="string", length=255, nullable=true)
     */
    private $wf;

    /**
     * @var string
     *
     * @ORM\Column(name="pf", type="string", length=255, nullable=true)
     */
    private $pf;

    /**
     * @var string
     *
     * @ORM\Column(name="cli", type="string", length=255, nullable=true)
     */
    private $cli;

    /**
     * Set reign
     *
     * @param string $reign
     *
     * @return Taxref
     */
    public function setReign($reign)
    {
        $this->reign = $reign;

        return $this;
    }

    /**
     * Get reign
     *
     * @return string
     */
    public function getReign()
    {
        return $this->reign;
    }

    /**
     * Set phylum
     *
     * @param string $phylum
     *
     * @return Taxref
     */
    public function setPhylum($phylum)
    {
        $this->phylum = $phylum;

        return $this;
    }

    /**
     * Get phylum
     *
     * @return string
     */
    public function getPhylum()
    {
        return $this->phylum;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Taxref
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set order
     *
     * @param string $order
     *
     * @return Taxref
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set family
     *
     * @param string $family
     *
     * @return Taxref
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set cdName
     *
     * @param integer $cdName
     *
     * @return Taxref
     */
    public function setCdName($cdName)
    {
        $this->cdName = $cdName;

        return $this;
    }

    /**
     * Get cdName
     *
     * @return integer
     */
    public function getCdName()
    {
        return $this->cdName;
    }

    /**
     * Set cdTaxsup
     *
     * @param integer $cdTaxsup
     *
     * @return Taxref
     */
    public function setCdTaxsup($cdTaxsup)
    {
        $this->cdTaxsup = $cdTaxsup;

        return $this;
    }

    /**
     * Get cdTaxsup
     *
     * @return integer
     */
    public function getCdTaxsup()
    {
        return $this->cdTaxsup;
    }

    /**
     * Set cdRef
     *
     * @param integer $cdRef
     *
     * @return Taxref
     */
    public function setCdRef($cdRef)
    {
        $this->cdRef = $cdRef;

        return $this;
    }

    /**
     * Get cdRef
     *
     * @return integer
     */
    public function getCdRef()
    {
        return $this->cdRef;
    }

    /**
     * Set rank
     *
     * @param string $rank
     *
     * @return Taxref
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set lbName
     *
     * @param string $lbName
     *
     * @return Taxref
     */
    public function setLbName($lbName)
    {
        $this->lbName = $lbName;

        return $this;
    }

    /**
     * Get lbName
     *
     * @return string
     */
    public function getLbName()
    {
        return $this->lbName;
    }

    /**
     * Set lbAuthor
     *
     * @param string $lbAuthor
     *
     * @return Taxref
     */
    public function setLbAuthor($lbAuthor)
    {
        $this->lbAuthor = $lbAuthor;

        return $this;
    }

    /**
     * Get lbAuthor
     *
     * @return string
     */
    public function getLbAuthor()
    {
        return $this->lbAuthor;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Taxref
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set validName
     *
     * @param string $validName
     *
     * @return Taxref
     */
    public function setValidName($validName)
    {
        $this->validName = $validName;

        return $this;
    }

    /**
     * Get validName
     *
     * @return string
     */
    public function getValidName()
    {
        return $this->validName;
    }

    /**
     * Set vernacularName
     *
     * @param string $vernacularName
     *
     * @return Taxref
     */
    public function setVernacularName($vernacularName)
    {
        $this->vernacularName = $vernacularName;

        return $this;
    }

    /**
     * Get vernacularName
     *
     * @return string
     */
    public function getVernacularName()
    {
        return $this->vernacularName;
    }

    /**
     * Set engVernacularName
     *
     * @param string $engVernacularName
     *
     * @return Taxref
     */
    public function setEngVernacularName($engVernacularName)
    {
        $this->engVernacularName = $engVernacularName;

        return $this;
    }

    /**
     * Get engVernacularName
     *
     * @return string
     */
    public function getEngVernacularName()
    {
        return $this->engVernacularName;
    }

    /**
     * Set habitat
     *
     * @param integer $habitat
     *
     * @return Taxref
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Get habitat
     *
     * @return integer
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set fr
     *
     * @param string $fr
     *
     * @return Taxref
     */
    public function setFr($fr)
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * Get fr
     *
     * @return string
     */
    public function getFr()
    {
        return $this->fr;
    }

    /**
     * Set gf
     *
     * @param string $gf
     *
     * @return Taxref
     */
    public function setGf($gf)
    {
        $this->gf = $gf;

        return $this;
    }

    /**
     * Get gf
     *
     * @return string
     */
    public function getGf()
    {
        return $this->gf;
    }

    /**
     * Set mar
     *
     * @param string $mar
     *
     * @return Taxref
     */
    public function setMar($mar)
    {
        $this->mar = $mar;

        return $this;
    }

    /**
     * Get mar
     *
     * @return string
     */
    public function getMar()
    {
        return $this->mar;
    }

    /**
     * Set gua
     *
     * @param string $gua
     *
     * @return Taxref
     */
    public function setGua($gua)
    {
        $this->gua = $gua;

        return $this;
    }

    /**
     * Get gua
     *
     * @return string
     */
    public function getGua()
    {
        return $this->gua;
    }

    /**
     * Set sm
     *
     * @param string $sm
     *
     * @return Taxref
     */
    public function setSm($sm)
    {
        $this->sm = $sm;

        return $this;
    }

    /**
     * Get sm
     *
     * @return string
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * Set sb
     *
     * @param string $sb
     *
     * @return Taxref
     */
    public function setSb($sb)
    {
        $this->sb = $sb;

        return $this;
    }

    /**
     * Get sb
     *
     * @return string
     */
    public function getSb()
    {
        return $this->sb;
    }

    /**
     * Set spm
     *
     * @param string $spm
     *
     * @return Taxref
     */
    public function setSpm($spm)
    {
        $this->spm = $spm;

        return $this;
    }

    /**
     * Get spm
     *
     * @return string
     */
    public function getSpm()
    {
        return $this->spm;
    }

    /**
     * Set may
     *
     * @param string $may
     *
     * @return Taxref
     */
    public function setMay($may)
    {
        $this->may = $may;

        return $this;
    }

    /**
     * Get may
     *
     * @return string
     */
    public function getMay()
    {
        return $this->may;
    }

    /**
     * Set epa
     *
     * @param string $epa
     *
     * @return Taxref
     */
    public function setEpa($epa)
    {
        $this->epa = $epa;

        return $this;
    }

    /**
     * Get epa
     *
     * @return string
     */
    public function getEpa()
    {
        return $this->epa;
    }

    /**
     * Set reu
     *
     * @param string $reu
     *
     * @return Taxref
     */
    public function setReu($reu)
    {
        $this->reu = $reu;

        return $this;
    }

    /**
     * Get reu
     *
     * @return string
     */
    public function getReu()
    {
        return $this->reu;
    }

    /**
     * Set sa
     *
     * @param string $sa
     *
     * @return Taxref
     */
    public function setSa($sa)
    {
        $this->sa = $sa;

        return $this;
    }

    /**
     * Get sa
     *
     * @return string
     */
    public function getSa()
    {
        return $this->sa;
    }

    /**
     * Set ta
     *
     * @param string $ta
     *
     * @return Taxref
     */
    public function setTa($ta)
    {
        $this->ta = $ta;

        return $this;
    }

    /**
     * Get ta
     *
     * @return string
     */
    public function getTa()
    {
        return $this->ta;
    }

    /**
     * Set taaf
     *
     * @param string $taaf
     *
     * @return Taxref
     */
    public function setTaaf($taaf)
    {
        $this->taaf = $taaf;

        return $this;
    }

    /**
     * Get taaf
     *
     * @return string
     */
    public function getTaaf()
    {
        return $this->taaf;
    }

    /**
     * Set nc
     *
     * @param string $nc
     *
     * @return Taxref
     */
    public function setNc($nc)
    {
        $this->nc = $nc;

        return $this;
    }

    /**
     * Get nc
     *
     * @return string
     */
    public function getNc()
    {
        return $this->nc;
    }

    /**
     * Set wf
     *
     * @param string $wf
     *
     * @return Taxref
     */
    public function setWf($wf)
    {
        $this->wf = $wf;

        return $this;
    }

    /**
     * Get wf
     *
     * @return string
     */
    public function getWf()
    {
        return $this->wf;
    }

    /**
     * Set pf
     *
     * @param string $pf
     *
     * @return Taxref
     */
    public function setPf($pf)
    {
        $this->pf = $pf;

        return $this;
    }

    /**
     * Get pf
     *
     * @return string
     */
    public function getPf()
    {
        return $this->pf;
    }

    /**
     * Set cli
     *
     * @param string $cli
     *
     * @return Taxref
     */
    public function setCli($cli)
    {
        $this->cli = $cli;

        return $this;
    }

    /**
     * Get cli
     *
     * @return string
     */
    public function getCli()
    {
        return $this->cli;
    }
}
