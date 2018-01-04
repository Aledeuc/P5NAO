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
     * @ORM\Column(name="regne", type="string", length=255)
     */
    private $regne;
    /**
     * @var string
     *
     * @ORM\Column(name="phylum", type="string", length=255)
     */
    private $phylum;
    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;
    /**
     * @var string
     *
     * @ORM\Column(name="ordre", type="string", length=255)
     */
    private $ordre;
    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;
    /**
     * @var string
     *
     * @ORM\Column(name="cd_nom", type="string", length=255)
     */
    private $cdNom;
    /**
     * @var string
     *
     * @ORM\Column(name="cd_taxsup", type="string", length=255)
     */
    private $cdTaxsup;
    /**
     * @var string
     *
     * @ORM\Column(name="cd_ref", type="string", length=255)
     */
    private $cdRef;
    /**
     * @var string
     *
     * @ORM\Column(name="rang", type="string", length=255)
     */
    private $rang;
    /**
     * @var string
     *
     * @ORM\Column(name="lb_nom", type="string", length=255)
     */
    private $lbNom;
    /**
     * @var string
     *
     * @ORM\Column(name="lb_auteur", type="string", length=255)
     */
    private $lbAuteur;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_complet", type="string", length=255)
     */
    private $nomComplet;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_complet_html", type="string", length=255)
     */
    private $nomCompletHtml;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_valide", type="string", length=255)
     */
    private $nomValide;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_vern", type="string", length=255)
     */
    private $nomVern;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_vern_eng", type="string", length=255)
     */
    private $nomVernEng;
    /**
     * @var string
     *
     * @ORM\Column(name="habitat", type="string", length=255)
     */
    private $habitat;
    /**
     * @var string
     *
     * @ORM\Column(name="fr", type="string", length=255)
     */
    private $fr;
    /**
     * @var string
     *
     * @ORM\Column(name="gf", type="string", length=255)
     */
    private $gf;
    /**
     * @var string
     *
     * @ORM\Column(name="mar", type="string", length=255)
     */
    private $mar;
    /**
     * @var string
     *
     * @ORM\Column(name="gua", type="string", length=255)
     */
    private $gua;
    /**
     * @var string
     *
     * @ORM\Column(name="sm", type="string", length=255)
     */
    private $sm;
    /**
     * @var string
     *
     * @ORM\Column(name="sb", type="string", length=255)
     */
    private $sb;
    /**
     * @var string
     *
     * @ORM\Column(name="spm", type="string", length=255)
     */
    private $spm;
    /**
     * @var string
     *
     * @ORM\Column(name="may", type="string", length=255)
     */
    private $may;
    /**
     * @var string
     *
     * @ORM\Column(name="epa", type="string", length=255)
     */
    private $epa;
    /**
     * @var string
     *
     * @ORM\Column(name="reu", type="string", length=255)
     */
    private $reu;
    /**
     * @var string
     *
     * @ORM\Column(name="sa", type="string", length=255)
     */
    private $sa;
    /**
     * @var string
     *
     * @ORM\Column(name="ta", type="string", length=255)
     */
    private $ta;
    /**
     * @var string
     *
     * @ORM\Column(name="taaf", type="string", length=255)
     */
    private $taaf;
    /**
     * @var string
     *
     * @ORM\Column(name="pf", type="string", length=255)
     */
    private $pf;
    /**
     * @var string
     *
     * @ORM\Column(name="nc", type="string", length=255)
     */
    private $nc;
    /**
     * @var string
     *
     * @ORM\Column(name="wf", type="string", length=255)
     */
    private $wf;
    /**
     * @var string
     *
     * @ORM\Column(name="cli", type="string", length=255)
     */
    private $cli;
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
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
    public function setRegne($regne)
    {
        $this->regne = $regne;
        return $this;
    }
    /**
     * Get regne
     *
     * @return string
     */
    public function getRegne()
    {
        return $this->regne;
    }
    /**
     * Set phylum
     *
     * @param string $phylum
     *
     * @return taxref
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
     * Set classe
     *
     * @param string $classe
     *
     * @return taxref
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
        return $this;
    }
    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }
    /**
     * Set ordre
     *
     * @param string $ordre
     *
     * @return taxref
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
        return $this;
    }
    /**
     * Get ordre
     *
     * @return string
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
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
     * Set cdNom
     *
     * @param string $cdNom
     *
     * @return taxref
     */
    public function setCdNom($cdNom)
    {
        $this->cdNom = $cdNom;
        return $this;
    }
    /**
     * Get cdNom
     *
     * @return string
     */
    public function getCdNom()
    {
        return $this->cdNom;
    }
    /**
     * Set cdTaxsup
     *
     * @param string $cdTaxsup
     *
     * @return taxref
     */
    public function setCdTaxsup($cdTaxsup)
    {
        $this->cdTaxsup = $cdTaxsup;
        return $this;
    }
    /**
     * Get cdTaxsup
     *
     * @return string
     */
    public function getCdTaxsup()
    {
        return $this->cdTaxsup;
    }
    /**
     * Set cdRef
     *
     * @param string $cdRef
     *
     * @return taxref
     */
    public function setCdRef($cdRef)
    {
        $this->cdRef = $cdRef;
        return $this;
    }
    /**
     * Get cdRef
     *
     * @return string
     */
    public function getCdRef()
    {
        return $this->cdRef;
    }
    /**
     * Set rang
     *
     * @param string $rang
     *
     * @return taxref
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
     * Set lbNom
     *
     * @param string $lbNom
     *
     * @return taxref
     */
    public function setLbNom($lbNom)
    {
        $this->lbNom = $lbNom;
        return $this;
    }
    /**
     * Get lbNom
     *
     * @return string
     */
    public function getLbNom()
    {
        return $this->lbNom;
    }
    /**
     * Set lbAuteur
     *
     * @param string $lbAuteur
     *
     * @return taxref
     */
    public function setLbAuteur($lbAuteur)
    {
        $this->lbAuteur = $lbAuteur;
        return $this;
    }
    /**
     * Get lbAuteur
     *
     * @return string
     */
    public function getLbAuteur()
    {
        return $this->lbAuteur;
    }
    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return taxref
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;
        return $this;
    }
    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }
    /**
     * Set nomCompletHtml
     *
     * @param string $nomCompletHtml
     *
     * @return taxref
     */
    public function setNomCompletHtml($nomCompletHtml)
    {
        $this->nomCompletHtml = $nomCompletHtml;
        return $this;
    }
    /**
     * Get nomCompletHtml
     *
     * @return string
     */
    public function getNomCompletHtml()
    {
        return $this->nomCompletHtml;
    }
    /**
     * Set nomValide
     *
     * @param string $nomValide
     *
     * @return taxref
     */
    public function setNomValide($nomValide)
    {
        $this->nomValide = $nomValide;
        return $this;
    }
    /**
     * Get nomValide
     *
     * @return string
     */
    public function getNomValide()
    {
        return $this->nomValide;
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
    /**
     * Set nomVernEng
     *
     * @param string $nomVernEng
     *
     * @return taxref
     */
    public function setNomVernEng($nomVernEng)
    {
        $this->nomVernEng = $nomVernEng;
        return $this;
    }
    /**
     * Get nomVernEng
     *
     * @return string
     */
    public function getNomVernEng()
    {
        return $this->nomVernEng;
    }
    /**
     * Set habitat
     *
     * @param string $habitat
     *
     * @return taxref
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;
        return $this;
    }
    /**
     * Get habitat
     *
     * @return string
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * @return taxref
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
     * Set pf
     *
     * @param string $pf
     *
     * @return taxref
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
     * Set nc
     *
     * @param string $nc
     *
     * @return taxref
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
     * @return taxref
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
     * Set cli
     *
     * @param string $cli
     *
     * @return taxref
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
    /**
     * Set url
     *
     * @param string $url
     *
     * @return taxref
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
