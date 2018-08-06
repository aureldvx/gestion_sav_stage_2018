<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementStockPieceDetachee
 *
 * @ORM\Table(name="mouvement_stock_piece_detachee")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\MouvementStockPieceDetacheeRepository")
 */
class MouvementStockPieceDetachee
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
     * @ORM\Column(name="piece", type="integer")
     */
    private $piece;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set piece.
     *
     * @param int $piece
     *
     * @return MouvementStockPieceDetachee
     */
    public function setPiece($piece)
    {
        $this->piece = $piece;

        return $this;
    }

    /**
     * Get piece.
     *
     * @return int
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set stockReconditionne.
     *
     * @param int|null $stockReconditionne
     *
     * @return MouvementStockPieceDetachee
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
     * @return MouvementStockPieceDetachee
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
     * @return MouvementStockPieceDetachee
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
     * @return MouvementStockPieceDetachee
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
     * @return MouvementStockPieceDetachee
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
