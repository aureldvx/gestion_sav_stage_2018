<?php

namespace SAV\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratClient
 *
 * @ORM\Table(name="contrat_client")
 * @ORM\Entity(repositoryClass="SAV\ProcessBundle\Repository\ContratClientRepository")
 */
class ContratClient
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
     * @ORM\OneToMany(targetEntity="SAV\ProcessBundle\Entity\Client", mappedBy="contratClient")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return ContratClient
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
    
    public function setClients(\Doctrine\Common\Collections\ArrayCollection $clients)
    {
        foreach ($clients as $client)
        {
            $client->setContratClient($this);
        }
        $this->clients = $clients;
    }
    
    public function getClients()
    {
        return $this->clients;
    }
    
    public function addClient(\SAV\ProcessBundle\Entity\Client $client)
    {
        $client->setContratClient($this);
        $this->clients->add($client);
        return $this;
    }
    
    public function removeClient(\SAV\ProcessBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }
}
