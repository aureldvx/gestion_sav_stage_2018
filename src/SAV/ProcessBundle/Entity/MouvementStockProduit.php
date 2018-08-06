<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementStockProduit
 *
 * @ORM\Table(name="mouvement_stock_produit")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\MouvementStockProduitRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MouvementStockProduit
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
     * @var int
     *
     * @ORM\Column(name="produit", type="integer")
     */
    private $produit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock_reconditionne", type="integer", nullable=true)
     */
    private $stockReconditionne;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock_neuf", type="integer", nullable=true)
     */
    private $stockNeuf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock_reconditionne_terme", type="integer", nullable=true)
     */
    private $stockReconditionneTerme;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock_neuf_terme", type="integer", nullable=true)
     */
    private $stockNeufTerme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\PreUpdate
     */
    public function updateDateStockProduit()
    {
        $this->setDate(new \DateTime());
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
     * Set produit.
     *
     * @param int $produit
     *
     * @return MouvementStockProduit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit.
     *
     * @return int
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set stockReconditionne.
     *
     * @param int|null $stockReconditionne
     *
     * @return MouvementStockProduit
     */
    public function setStockReconditionne($stockReconditionne = null)
    {
        $this->stockReconditionne = $stockReconditionne;

        return $this;
    }

    /**
     * Get stockReconditionne.
     *
     * @return int|null
     */
    public function getStockReconditionne()
    {
        return $this->stockReconditionne;
    }

    /**
     * Set stockNeuf.
     *
     * @param int|null $stockNeuf
     *
     * @return MouvementStockProduit
     */
    public function setStockNeuf($stockNeuf = null)
    {
        $this->stockNeuf = $stockNeuf;

        return $this;
    }

    /**
     * Get stockNeuf.
     *
     * @return int|null
     */
    public function getStockNeuf()
    {
        return $this->stockNeuf;
    }

    /**
     * Set stockReconditionneTerme.
     *
     * @param int|null $stockReconditionneTerme
     *
     * @return MouvementStockProduit
     */
    public function setStockReconditionneTerme($stockReconditionneTerme = null)
    {
        $this->stockReconditionneTerme = $stockReconditionneTerme;

        return $this;
    }

    /**
     * Get stockReconditionneTerme.
     *
     * @return int|null
     */
    public function getStockReconditionneTerme()
    {
        return $this->stockReconditionneTerme;
    }

    /**
     * Set stockNeufTerme.
     *
     * @param int|null $stockNeufTerme
     *
     * @return MouvementStockProduit
     */
    public function setStockNeufTerme($stockNeufTerme = null)
    {
        $this->stockNeufTerme = $stockNeufTerme;

        return $this;
    }

    /**
     * Get stockNeufTerme.
     *
     * @return int|null
     */
    public function getStockNeufTerme()
    {
        return $this->stockNeufTerme;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return MouvementStockProduit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
