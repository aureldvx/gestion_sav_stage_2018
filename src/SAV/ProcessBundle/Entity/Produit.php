<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="reference", type="string", length=255, unique=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\RubriqueProduit", inversedBy="produits")
     * @ORM\JoinColumn(name="rubrique_id", nullable=true)
     */
    private $rubrique;

    /**
     * @var int
     *
     * @ORM\Column(name="stock_reconditionne", type="integer")
     */
    private $stockReconditionne;

    /**
     * @var int
     *
     * @ORM\Column(name="stock_neuf", type="integer")
     */
    private $stockNeuf;

    /**
     * @var int
     *
     * @ORM\Column(name="stock_reconditionne_terme", type="integer")
     */
    private $stockReconditionneTerme;

    /**
     * @var int
     *
     * @ORM\Column(name="stock_neuf_terme", type="integer")
     */
    private $stockNeufTerme;

    /**
     * @ORM\ManyToMany(targetEntity="SAV\ProcessBundle\Entity\PieceDetachee", cascade="persist")
     */
    private $piecesDetachees;

    public function __construct()
    {
        $this->piecesDetachees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set reference.
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Produit
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
     * Set rubrique.
     *
     * @param int $rubrique
     *
     * @return Produit
     */
    public function setRubrique($rubrique)
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * Get rubrique.
     *
     * @return int
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }

    /**
     * Set stockReconditionne.
     *
     * @param int $stockReconditionne
     *
     * @return Produit
     */
    public function setStockReconditionne($stockReconditionne)
    {
        $this->stockReconditionne = $stockReconditionne;

        return $this;
    }

    /**
     * Get stockReconditionne.
     *
     * @return int
     */
    public function getStockReconditionne()
    {
        return $this->stockReconditionne;
    }

    /**
     * Set stockNeuf.
     *
     * @param int $stockNeuf
     *
     * @return Produit
     */
    public function setStockNeuf($stockNeuf)
    {
        $this->stockNeuf = $stockNeuf;

        return $this;
    }

    /**
     * Get stockNeuf.
     *
     * @return int
     */
    public function getStockNeuf()
    {
        return $this->stockNeuf;
    }

    /**
     * Set stockReconditionneTerme.
     *
     * @param int $stockReconditionneTerme
     *
     * @return Produit
     */
    public function setStockReconditionneTerme($stockReconditionneTerme)
    {
        $this->stockReconditionneTerme = $stockReconditionneTerme;

        return $this;
    }

    /**
     * Get stockReconditionneTerme.
     *
     * @return int
     */
    public function getStockReconditionneTerme()
    {
        return $this->stockReconditionneTerme;
    }

    /**
     * Set stockNeufTerme.
     *
     * @param int $stockNeufTerme
     *
     * @return Produit
     */
    public function setStockNeufTerme($stockNeufTerme)
    {
        $this->stockNeufTerme = $stockNeufTerme;

        return $this;
    }

    /**
     * Get stockNeufTerme.
     *
     * @return int
     */
    public function getStockNeufTerme()
    {
        return $this->stockNeufTerme;
    }

    /**
     * Add piecesDetachee.
     *
     * @param \SAV\ProcessBundle\Entity\PieceDetachee $piecesDetachee
     *
     * @return Produit
     */
    public function addPiecesDetachee(\SAV\ProcessBundle\Entity\PieceDetachee $piecesDetachee)
    {
        $this->piecesDetachees[] = $piecesDetachee;

        return $this;
    }

    /**
     * Remove piecesDetachee.
     *
     * @param \SAV\ProcessBundle\Entity\PieceDetachee $piecesDetachee
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePiecesDetachee(\SAV\ProcessBundle\Entity\PieceDetachee $piecesDetachee)
    {
        return $this->piecesDetachees->removeElement($piecesDetachee);
    }

    /**
     * Get piecesDetachees.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPiecesDetachees()
    {
        return $this->piecesDetachees;
    }
}
