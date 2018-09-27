<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PieceDetachee
 *
 * @ORM\Table(name="piece_detachee")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\PieceDetacheeRepository")
 */
class PieceDetachee
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
     * @var array
     *
     * @ORM\Column(name="produit_associe", type="array")
     */
    private $produitAssocie;

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
     * @return PieceDetachee
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
     * Set produitAssocie.
     *
     * @param array $produitAssocie
     *
     * @return PieceDetachee
     */
    public function setProduitAssocie($produitAssocie)
    {
        $this->produitAssocie = $produitAssocie;

        return $this;
    }

    /**
     * Get produitAssocie.
     *
     * @return array
     */
    public function getProduitAssocie()
    {
        return $this->produitAssocie;
    }

    /**
     * Set stockReconditionne.
     *
     * @param int $stockReconditionne
     *
     * @return PieceDetachee
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
     * @return PieceDetachee
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
     * @return PieceDetachee
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
     * @return PieceDetachee
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
}
