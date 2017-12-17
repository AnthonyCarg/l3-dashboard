<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fiche
 *
 * @ORM\Table(name="fiche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FicheRepository")
 */
class Fiche
{
     /**
     * Many Fiche have One Manager.
     * @ORM\ManyToOne(targetEntity="Manager", inversedBy="fiches")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
    private $manager;
    
    /**
     * Many Fiche have One Projet.
     * @ORM\ManyToOne(targetEntity="Projet", inversedBy="fiches")
     * @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     */
    private $projetEx;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="NbJoursFait", type="float")
     * @Assert\GreaterThan(0)
     */
    private $nbJoursFait;

    /**
     * @var float
     *
     * @ORM\Column(name="NbJoursVendus", type="float")
     * @Assert\GreaterThan(0)
     */
    private $nbJoursVendus;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentAvancement", type="float")
     * @Assert\GreaterThanOrEqual(0)
     */
    private $pourcentAvancement;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;


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
     * Set projet
     *
     * @param string $projet
     *
     * @return Fiche
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return string
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Fiche
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nbJoursFait
     *
     * @param float $nbJoursFait
     *
     * @return Fiche
     */
    public function setNbJoursFait($nbJoursFait)
    {
        $this->nbJoursFait = $nbJoursFait;

        return $this;
    }

    /**
     * Get nbJoursFait
     *
     * @return float
     */
    public function getNbJoursFait()
    {
        return $this->nbJoursFait;
    }

    /**
     * Set nbJoursVendus
     *
     * @param float $nbJoursVendus
     *
     * @return Fiche
     */
    public function setNbJoursVendus($nbJoursVendus)
    {
        $this->nbJoursVendus = $nbJoursVendus;

        return $this;
    }

    /**
     * Get nbJoursVendus
     *
     * @return float
     */
    public function getNbJoursVendus()
    {
        return $this->nbJoursVendus;
    }

    /**
     * Set pourcentAvancement
     *
     * @param float $pourcentAvancement
     *
     * @return Fiche
     */
    public function setPourcentAvancement($pourcentAvancement)
    {
        $this->pourcentAvancement = $pourcentAvancement;

        return $this;
    }

    /**
     * Get pourcentAvancement
     *
     * @return float
     */
    public function getPourcentAvancement()
    {
        return $this->pourcentAvancement;
    }

    /**
     * Set createBy
     *
     * @param string $createBy
     *
     * @return Fiche
     */
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;

        return $this;
    }

    /**
     * Get createBy
     *
     * @return string
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }
    
    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Fiche
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set manager
     *
     * @param \AppBundle\Entity\Manager $manager
     *
     * @return Fiche
     */
    public function setManager(\AppBundle\Entity\Manager $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \AppBundle\Entity\Manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set projetEx
     *
     * @param \AppBundle\Entity\Projet $projetEx
     *
     * @return Fiche
     */
    public function setProjetEx(\AppBundle\Entity\Projet $projetEx = null)
    {
        $this->projetEx = $projetEx;

        return $this;
    }

    /**
     * Get projetEx
     *
     * @return \AppBundle\Entity\Projet
     */
    public function getProjetEx()
    {
        return $this->projetEx;
    }
}
