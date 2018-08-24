<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcoursProduit
 *
 * @ORM\Table(name="parcours_produit")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\ParcoursProduitRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ParcoursProduit
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
     * @ORM\Column(name="numero_bar", type="string", length=255, unique=true)
     */
    private $numeroBar;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_serie", type="string", length=255)
     */
    private $numeroSerie;

    /**
     * @var int
     *
     * @ORM\Column(name="client", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\Client")
     */
    private $client;

    /**
     * @var int
     *
     * @ORM\Column(name="reference_produit", type="integer")
     */
    private $referenceProduit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="datetime")
     */
    private $dateAchat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_bar", type="datetime")
     */
    private $dateCreationBar;

    /**
     * @var bool
     *
     * @ORM\Column(name="bar_hors_delai", type="boolean")
     */
    private $barHorsDelai;

    /**
     * @var int
     *
     * @ORM\Column(name="contrat_client", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\ContratClient")
     */
    private $contratClient;

    /**
     * @var string
     *
     * @ORM\Column(name="panne_declaree", type="text")
     */
    private $panneDeclaree;

    /**
     * @var int
     *
     * @ORM\Column(name="traitement_prevu", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\StatutTraitement")
     */
    private $traitementPrevu;

    /**
     * @var bool
     *
     * @ORM\Column(name="faible_valeur", type="boolean")
     */
    private $faibleValeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_client", type="text", nullable=true)
     */
    private $commentaireClient;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_reception", type="datetime", nullable=true)
     */
    private $dateReception;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statut_reception", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\StatutReception")
     */
    private $statutReception;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="importe", type="boolean", nullable=true)
     */
    private $importe;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_reception", type="text", nullable=true)
     */
    private $commentaireReception;

    /**
     * @var int|null
     *
     * @ORM\Column(name="raison_refus_produit", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\MotifRefusProduit")
     */
    private $raisonRefusProduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_photo_refus", type="string", length=255, unique=true, nullable=true)
     */
    private $urlPhotoRefus;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="panne_constatee", type="boolean", nullable=true)
     */
    private $panneConstatee;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="produit_reparable", type="boolean", nullable=true)
     */
    private $produitReparable;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="panne_au_deballage", type="boolean", nullable=true)
     */
    private $panneAuDeballage;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="echange_produit", type="boolean", nullable=true)
     */
    private $echangeProduit;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="produit_trouve", type="boolean", nullable=true)
     */
    private $produitTrouve;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_serie_produit_echange", type="string", length=255, unique=true, nullable=true)
     */
    private $numeroSerieProduitEchange;

    /**
     * @var array|null
     *
     * @ORM\Column(name="pieces_detachees_select", type="array", nullable=true)
     *
     * @ORM\ManyToMany(targetEntity="SAV\ProcessBundle\Entity\PieceDetachee")
     */
    private $piecesDetacheesSelect;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statut_pieces_detachees", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\StatutPieceDetachee")
     */
    private $statutPiecesDetachees;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statut_reparation", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\StatutReparation")
     */
    private $statutReparation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_reparation", type="datetime", nullable=true)
     */
    private $dateReparation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="motif_annulation_reparation", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\MotifAnnulationReparation")
     */
    private $motifAnnulationReparation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_annulation_reparation", type="datetime", nullable=true)
     */
    private $dateAnnulationReparation;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="paiement_par_client", type="boolean", nullable=true)
     */
    private $paiementParClient;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_paiement_client", type="datetime", nullable=true)
     */
    private $datePaiementClient;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_renvoi_produit", type="datetime", nullable=true)
     */
    private $dateRenvoiProduit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="transporteur_renvoi", type="integer", nullable=true)
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\Transporteur")
     */
    private $transporteurRenvoi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_colis_renvoi", type="string", length=255, nullable=true)
     */
    private $numeroColisRenvoi;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_rentree_destruction", type="datetime", nullable=true)
     */
    private $dateRentreeDestruction;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_passage_destructeur", type="datetime", nullable=true)
     */
    private $datePassageDestructeur;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_sav", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\CentreSav")
     */
    private $numeroSav;

    /**
     * @var int
     *
     * @ORM\Column(name="pays_sav", type="integer")
     */
    private $paysSav;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     */
    public function initializeBooleans()
    {
        $dateAchat = $this->getDateAchat();
        $dateTimeAchat = new \DateTime($dateAchat);
        $dateAchatFormat = $dateTimeAchat->format('Y-m-d');
        $jourAchat = \DateTime::createFromFormat('Y-m-d', $dateAchatFormat);

        $dateCreationBar = $this->getDateCreationBar();
        $dateTimeCreationBar = new \DateTime($dateCreationBar);
        $dateCreationBarFormat = $dateTimeCreationBar->format('Y-m-d');
        $jourCreationBar = \DateTime::createFromFormat('Y-m-d', $dateCreationBarFormat);

        $interval = $jourAchat->diff($jourCreationBar);
        $delaiBar = $interval->format('%a');

        if( $delaiBar < 15)
        {
            $this->setBarHorsDelai(false);
            $this->setPanneAuDeballage(true);
        }elseif($delaiBar > 14 && $delaiBar < 31)
        {
            $this->setBarHorsDelai(true);
            $this->setPanneAuDeballage(false);
        }
        else{
            $this->setBarHorsDelai(false);
            $this->setPanneAuDeballage(false);
        }
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
     * Set numeroBar.
     *
     * @param string $numeroBar
     *
     * @return ParcoursProduit
     */
    public function setNumeroBar($numeroBar)
    {
        $this->numeroBar = $numeroBar;

        return $this;
    }

    /**
     * Get numeroBar.
     *
     * @return string
     */
    public function getNumeroBar()
    {
        return $this->numeroBar;
    }

    /**
     * Set numeroSerie.
     *
     * @param string|null $numeroSerie
     *
     * @return ParcoursProduit
     */
    public function setNumeroSerie($numeroSerie = null)
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    /**
     * Get numeroSerie.
     *
     * @return string|null
     */
    public function getNumeroSerie()
    {
        return $this->numeroSerie;
    }

    /**
     * Set client.
     *
     * @param int $client
     *
     * @return ParcoursProduit
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return int
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set referenceProduit.
     *
     * @param int $referenceProduit
     *
     * @return ParcoursProduit
     */
    public function setReferenceProduit($referenceProduit)
    {
        $this->referenceProduit = $referenceProduit;

        return $this;
    }

    /**
     * Get referenceProduit.
     *
     * @return int
     */
    public function getReferenceProduit()
    {
        return $this->referenceProduit;
    }

    /**
     * Set dateAchat.
     *
     * @param \DateTime $dateAchat
     *
     * @return ParcoursProduit
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat.
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * Set dateCreationBar.
     *
     * @param \DateTime $dateCreationBar
     *
     * @return ParcoursProduit
     */
    public function setDateCreationBar($dateCreationBar)
    {
        $this->dateCreationBar = $dateCreationBar;

        return $this;
    }

    /**
     * Get dateCreationBar.
     *
     * @return \DateTime
     */
    public function getDateCreationBar()
    {
        return $this->dateCreationBar;
    }

    /**
     * Set contratClient.
     *
     * @param int $contratClient
     *
     * @return ParcoursProduit
     */
    public function setContratClient($contratClient)
    {
        $this->contratClient = $contratClient;

        return $this;
    }

    /**
     * Get contratClient.
     *
     * @return int
     */
    public function getContratClient()
    {
        return $this->contratClient;
    }

    /**
     * Set panneDeclaree.
     *
     * @param string $panneDeclaree
     *
     * @return ParcoursProduit
     */
    public function setPanneDeclaree($panneDeclaree)
    {
        $this->panneDeclaree = $panneDeclaree;

        return $this;
    }

    /**
     * Get panneDeclaree.
     *
     * @return string
     */
    public function getPanneDeclaree()
    {
        return $this->panneDeclaree;
    }

    /**
     * Set traitementPrevu.
     *
     * @param int $traitementPrevu
     *
     * @return ParcoursProduit
     */
    public function setTraitementPrevu($traitementPrevu)
    {
        $this->traitementPrevu = $traitementPrevu;

        return $this;
    }

    /**
     * Get traitementPrevu.
     *
     * @return int
     */
    public function getTraitementPrevu()
    {
        return $this->traitementPrevu;
    }

    /**
     * Set faibleValeur.
     *
     * @param bool $faibleValeur
     *
     * @return ParcoursProduit
     */
    public function setFaibleValeur($faibleValeur)
    {
        $this->faibleValeur = $faibleValeur;

        return $this;
    }

    /**
     * Get faibleValeur.
     *
     * @return bool
     */
    public function getFaibleValeur()
    {
        return $this->faibleValeur;
    }

    /**
     * Set commentaireClient.
     *
     * @param string|null $commentaireClient
     *
     * @return ParcoursProduit
     */
    public function setCommentaireClient($commentaireClient = null)
    {
        $this->commentaireClient = $commentaireClient;

        return $this;
    }

    /**
     * Get commentaireClient.
     *
     * @return string|null
     */
    public function getCommentaireClient()
    {
        return $this->commentaireClient;
    }

    /**
     * Set dateReception.
     *
     * @param \DateTime|null $dateReception
     *
     * @return ParcoursProduit
     */
    public function setDateReception($dateReception = null)
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception.
     *
     * @return \DateTime|null
     */
    public function getDateReception()
    {
        return $this->dateReception;
    }

    /**
     * Set statutReception.
     *
     * @param int|null $statutReception
     *
     * @return ParcoursProduit
     */
    public function setStatutReception($statutReception = null)
    {
        $this->statutReception = $statutReception;

        return $this;
    }

    /**
     * Get statutReception.
     *
     * @return int|null
     */
    public function getStatutReception()
    {
        return $this->statutReception;
    }

    /**
     * Set commentaireReception.
     *
     * @param string|null $commentaireReception
     *
     * @return ParcoursProduit
     */
    public function setCommentaireReception($commentaireReception = null)
    {
        $this->commentaireReception = $commentaireReception;

        return $this;
    }

    /**
     * Get commentaireReception.
     *
     * @return string|null
     */
    public function getCommentaireReception()
    {
        return $this->commentaireReception;
    }

    /**
     * Set raisonRefusProduit.
     *
     * @param int|null $raisonRefusProduit
     *
     * @return ParcoursProduit
     */
    public function setRaisonRefusProduit($raisonRefusProduit = null)
    {
        $this->raisonRefusProduit = $raisonRefusProduit;

        return $this;
    }

    /**
     * Get raisonRefusProduit.
     *
     * @return int|null
     */
    public function getRaisonRefusProduit()
    {
        return $this->raisonRefusProduit;
    }

    /**
     * Set urlPhotoRefus.
     *
     * @param string|null $urlPhotoRefus
     *
     * @return ParcoursProduit
     */
    public function setUrlPhotoRefus($urlPhotoRefus = null)
    {
        $this->urlPhotoRefus = $urlPhotoRefus;

        return $this;
    }

    /**
     * Get urlPhotoRefus.
     *
     * @return string|null
     */
    public function getUrlPhotoRefus()
    {
        return $this->urlPhotoRefus;
    }

    /**
     * Set panneConstatee.
     *
     * @param bool|null $panneConstatee
     *
     * @return ParcoursProduit
     */
    public function setPanneConstatee($panneConstatee = null)
    {
        $this->panneConstatee = $panneConstatee;

        return $this;
    }

    /**
     * Get panneConstatee.
     *
     * @return bool|null
     */
    public function getPanneConstatee()
    {
        return $this->panneConstatee;
    }

    /**
     * Set produitReparable.
     *
     * @param bool|null $produitReparable
     *
     * @return ParcoursProduit
     */
    public function setProduitReparable($produitReparable = null)
    {
        $this->produitReparable = $produitReparable;

        return $this;
    }

    /**
     * Get produitReparable.
     *
     * @return bool|null
     */
    public function getProduitReparable()
    {
        return $this->produitReparable;
    }

    /**
     * Set panneAuDeballage.
     *
     * @param bool|null $panneAuDeballage
     *
     * @return ParcoursProduit
     */
    public function setPanneAuDeballage($panneAuDeballage = null)
    {
        $this->panneAuDeballage = $panneAuDeballage;

        return $this;
    }

    /**
     * Get panneAuDeballage.
     *
     * @return bool|null
     */
    public function getPanneAuDeballage()
    {
        return $this->panneAuDeballage;
    }

    /**
     * Set echangeProduit.
     *
     * @param bool|null $echangeProduit
     *
     * @return ParcoursProduit
     */
    public function setEchangeProduit($echangeProduit = null)
    {
        $this->echangeProduit = $echangeProduit;

        return $this;
    }

    /**
     * Get echangeProduit.
     *
     * @return bool|null
     */
    public function getEchangeProduit()
    {
        return $this->echangeProduit;
    }

    /**
     * Set produitTrouve.
     *
     * @param bool|null $produitTrouve
     *
     * @return ParcoursProduit
     */
    public function setProduitTrouve($produitTrouve = null)
    {
        $this->produitTrouve = $produitTrouve;

        return $this;
    }

    /**
     * Get produitTrouve.
     *
     * @return bool|null
     */
    public function getProduitTrouve()
    {
        return $this->produitTrouve;
    }

    /**
     * Set numeroSerieProduitEchange.
     *
     * @param string|null $numeroSerieProduitEchange
     *
     * @return ParcoursProduit
     */
    public function setNumeroSerieProduitEchange($numeroSerieProduitEchange = null)
    {
        $this->numeroSerieProduitEchange = $numeroSerieProduitEchange;

        return $this;
    }

    /**
     * Get numeroSerieProduitEchange.
     *
     * @return string|null
     */
    public function getNumeroSerieProduitEchange()
    {
        return $this->numeroSerieProduitEchange;
    }

    /**
     * Set piecesDetacheesSelect.
     *
     * @param array|null $piecesDetacheesSelect
     *
     * @return ParcoursProduit
     */
    public function setPiecesDetacheesSelect($piecesDetacheesSelect = null)
    {
        $this->piecesDetacheesSelect = $piecesDetacheesSelect;

        return $this;
    }

    /**
     * Get piecesDetacheesSelect.
     *
     * @return array|null
     */
    public function getPiecesDetacheesSelect()
    {
        return $this->piecesDetacheesSelect;
    }

    /**
     * Set statutPiecesDetachees.
     *
     * @param int|null $statutPiecesDetachees
     *
     * @return ParcoursProduit
     */
    public function setStatutPiecesDetachees($statutPiecesDetachees = null)
    {
        $this->statutPiecesDetachees = $statutPiecesDetachees;

        return $this;
    }

    /**
     * Get statutPiecesDetachees.
     *
     * @return int|null
     */
    public function getStatutPiecesDetachees()
    {
        return $this->statutPiecesDetachees;
    }

    /**
     * Set statutReparation.
     *
     * @param int|null $statutReparation
     *
     * @return ParcoursProduit
     */
    public function setStatutReparation($statutReparation = null)
    {
        $this->statutReparation = $statutReparation;

        return $this;
    }

    /**
     * Get statutReparation.
     *
     * @return int|null
     */
    public function getStatutReparation()
    {
        return $this->statutReparation;
    }

    /**
     * Set dateReparation.
     *
     * @param \DateTime|null $dateReparation
     *
     * @return ParcoursProduit
     */
    public function setDateReparation($dateReparation = null)
    {
        $this->dateReparation = $dateReparation;

        return $this;
    }

    /**
     * Get dateReparation.
     *
     * @return \DateTime|null
     */
    public function getDateReparation()
    {
        return $this->dateReparation;
    }

    /**
     * Set motifAnnulationReparation.
     *
     * @param int|null $motifAnnulationReparation
     *
     * @return ParcoursProduit
     */
    public function setMotifAnnulationReparation($motifAnnulationReparation = null)
    {
        $this->motifAnnulationReparation = $motifAnnulationReparation;

        return $this;
    }

    /**
     * Get motifAnnulationReparation.
     *
     * @return int|null
     */
    public function getMotifAnnulationReparation()
    {
        return $this->motifAnnulationReparation;
    }

    /**
     * Set dateAnnulationReparation.
     *
     * @param \DateTime|null $dateAnnulationReparation
     *
     * @return ParcoursProduit
     */
    public function setDateAnnulationReparation($dateAnnulationReparation = null)
    {
        $this->dateAnnulationReparation = $dateAnnulationReparation;

        return $this;
    }

    /**
     * Get dateAnnulationReparation.
     *
     * @return \DateTime|null
     */
    public function getDateAnnulationReparation()
    {
        return $this->dateAnnulationReparation;
    }

    /**
     * Set paiementParClient.
     *
     * @param bool|null $paiementParClient
     *
     * @return ParcoursProduit
     */
    public function setPaiementParClient($paiementParClient = null)
    {
        $this->paiementParClient = $paiementParClient;

        return $this;
    }

    /**
     * Get paiementParClient.
     *
     * @return bool|null
     */
    public function getPaiementParClient()
    {
        return $this->paiementParClient;
    }

    /**
     * Set datePaiementClient.
     *
     * @param \DateTime|null $datePaiementClient
     *
     * @return ParcoursProduit
     */
    public function setDatePaiementClient($datePaiementClient = null)
    {
        $this->datePaiementClient = $datePaiementClient;

        return $this;
    }

    /**
     * Get datePaiementClient.
     *
     * @return \DateTime|null
     */
    public function getDatePaiementClient()
    {
        return $this->datePaiementClient;
    }

    /**
     * Set dateRenvoiProduit.
     *
     * @param \DateTime|null $dateRenvoiProduit
     *
     * @return ParcoursProduit
     */
    public function setDateRenvoiProduit($dateRenvoiProduit = null)
    {
        $this->dateRenvoiProduit = $dateRenvoiProduit;

        return $this;
    }

    /**
     * Get dateRenvoiProduit.
     *
     * @return \DateTime|null
     */
    public function getDateRenvoiProduit()
    {
        return $this->dateRenvoiProduit;
    }

    /**
     * Set transporteurRenvoi.
     *
     * @param int|null $transporteurRenvoi
     *
     * @return ParcoursProduit
     */
    public function setTransporteurRenvoi($transporteurRenvoi = null)
    {
        $this->transporteurRenvoi = $transporteurRenvoi;

        return $this;
    }

    /**
     * Get transporteurRenvoi.
     *
     * @return int|null
     */
    public function getTransporteurRenvoi()
    {
        return $this->transporteurRenvoi;
    }

    /**
     * Set numeroColisRenvoi.
     *
     * @param string|null $numeroColisRenvoi
     *
     * @return ParcoursProduit
     */
    public function setNumeroColisRenvoi($numeroColisRenvoi = null)
    {
        $this->numeroColisRenvoi = $numeroColisRenvoi;

        return $this;
    }

    /**
     * Get numeroColisRenvoi.
     *
     * @return string|null
     */
    public function getNumeroColisRenvoi()
    {
        return $this->numeroColisRenvoi;
    }

    /**
     * Set dateRentreeDestruction.
     *
     * @param \DateTime|null $dateRentreeDestruction
     *
     * @return ParcoursProduit
     */
    public function setDateRentreeDestruction($dateRentreeDestruction = null)
    {
        $this->dateRentreeDestruction = $dateRentreeDestruction;

        return $this;
    }

    /**
     * Get dateRentreeDestruction.
     *
     * @return \DateTime|null
     */
    public function getDateRentreeDestruction()
    {
        return $this->dateRentreeDestruction;
    }

    /**
     * Set datePassageDestructeur.
     *
     * @param \DateTime|null $datePassageDestructeur
     *
     * @return ParcoursProduit
     */
    public function setDatePassageDestructeur($datePassageDestructeur = null)
    {
        $this->datePassageDestructeur = $datePassageDestructeur;

        return $this;
    }

    /**
     * Get datePassageDestructeur.
     *
     * @return \DateTime|null
     */
    public function getDatePassageDestructeur()
    {
        return $this->datePassageDestructeur;
    }

    /**
     * Set numeroSav.
     *
     * @param int $numeroSav
     *
     * @return ParcoursProduit
     */
    public function setNumeroSav($numeroSav)
    {
        $this->numeroSav = $numeroSav;

        return $this;
    }

    /**
     * Get numeroSav.
     *
     * @return int
     */
    public function getNumeroSav()
    {
        return $this->numeroSav;
    }

    /**
     * Set paysSav.
     *
     * @param int $paysSav
     *
     * @return ParcoursProduit
     */
    public function setPaysSav($paysSav)
    {
        $this->paysSav = $paysSav;

        return $this;
    }

    /**
     * Get paysSav.
     *
     * @return int
     */
    public function getPaysSav()
    {
        return $this->paysSav;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return ParcoursProduit
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set barHorsDelai.
     *
     * @param bool $barHorsDelai
     *
     * @return ParcoursProduit
     */
    public function setBarHorsDelai($barHorsDelai)
    {
        $this->barHorsDelai = $barHorsDelai;

        return $this;
    }

    /**
     * Get barHorsDelai.
     *
     * @return bool
     */
    public function getBarHorsDelai()
    {
        return $this->barHorsDelai;
    }

    /**
     * Set importe.
     *
     * @param bool|null $importe
     *
     * @return ParcoursProduit
     */
    public function setImporte($importe = null)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe.
     *
     * @return bool|null
     */
    public function getImporte()
    {
        return $this->importe;
    }
}
