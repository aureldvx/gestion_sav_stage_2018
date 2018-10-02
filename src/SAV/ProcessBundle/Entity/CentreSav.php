<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreSav
 *
 * @ORM\Table(name="centre_sav")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\CentreSavRepository")
 */
class CentreSav
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, unique=true)
     */
    private $ip;

    /**
     * @ORM\OneToMany(targetEntity="SAV\ProcessBundle\Entity\ParcoursProduit", mappedBy="centreSav")
     */
    private $parcoursProduits;

    /**
     * @ORM\ManyToOne(targetEntity="SAV\ProcessBundle\Entity\Pays", inversedBy="centresSav")
     * @ORM\JoinColumn(name="pays_sav_id", nullable=false)
     */
    private $paysSav;

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
     * @return CentreSav
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
     * Set email.
     *
     * @param string $email
     *
     * @return CentreSav
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return CentreSav
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return CentreSav
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Add parcoursProduit.
     *
     * @param \SAV\ProcessBundle\Entity\ParcoursProduit $parcoursProduit
     *
     * @return CentreSav
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

    /**
     * Set paysSav.
     *
     * @param \SAV\ProcessBundle\Entity\Pays $paysSav
     *
     * @return CentreSav
     */
    public function setPaysSav(\SAV\ProcessBundle\Entity\Pays $paysSav)
    {
        $this->paysSav = $paysSav;

        return $this;
    }

    /**
     * Get paysSav.
     *
     * @return \SAV\ProcessBundle\Entity\Pays
     */
    public function getPaysSav()
    {
        return $this->paysSav;
    }
}
