<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutPieceDetachee
 *
 * @ORM\Table(name="statut_piece_detachee")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\StatutPieceDetacheeRepository")
 */
class StatutPieceDetachee
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
     * @ORM\OneToMany(targetEntity="SAV\ProcessBundle\Entity\ParcoursProduit", mappedBy="statutPiecesDetachees")
     */
    private $parcoursProduits;

    public function __construct()
    {
        $this->parcoursProduits = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return StatutPieceDetachee
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
     * Add parcoursProduit.
     *
     * @param \SAV\ProcessBundle\Entity\ParcoursProduit $parcoursProduit
     *
     * @return StatutPieceDetachee
     */
    public function addParcoursProduit(\SAV\ProcessBundle\Entity\ParcoursProduit $parcoursProduit)
    {
        $this->parcoursProduits[] = $parcoursProduit;

        return $this;
    }

    /**
     * Remove parcoursProduit.
     *
     * @param \SAV\ProcessBundle\Entity\ParcoursProduit $parcoursProduit
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeParcoursProduit(\SAV\ProcessBundle\Entity\ParcoursProduit $parcoursProduit)
    {
        return $this->parcoursProduits->removeElement($parcoursProduit);
    }

    /**
     * Get parcoursProduits.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParcoursProduits()
    {
        return $this->parcoursProduits;
    }
}
