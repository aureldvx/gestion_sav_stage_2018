<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\PaysRepository")
 */
class Pays
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
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="SAV\ProcessBundle\Entity\CentreSav", mappedBy="paysSav")
     * @ORM\JoinColumn(name="centres_sav_id", nullable=false)
     */
    private $centresSav;

    public function __construct()
    {
        $this->parcoursProduits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centresSav = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Pays
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add centresSav.
     *
     * @param \SAV\ProcessBundle\Entity\CentreSav $centresSav
     *
     * @return Pays
     */
    public function addCentresSav(\SAV\ProcessBundle\Entity\CentreSav $centresSav)
    {
        $this->centresSav[] = $centresSav;

        return $this;
    }

    /**
     * Remove centresSav.
     *
     * @param \SAV\ProcessBundle\Entity\CentreSav $centresSav
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCentresSav(\SAV\ProcessBundle\Entity\CentreSav $centresSav)
    {
        return $this->centresSav->removeElement($centresSav);
    }

    /**
     * Get centresSav.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCentresSav()
    {
        return $this->centresSav;
    }
}
