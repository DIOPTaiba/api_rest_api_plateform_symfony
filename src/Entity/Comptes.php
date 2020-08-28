<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comptes
 *
 * @ORM\Table(name="comptes", indexes={@ORM\Index(name="IDX_56735801DE558704", columns={"id_clients"})})
 * @ORM\Entity
 */
class Comptes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte", type="string", length=255, nullable=false)
     */
    private $numeroCompte;

    /**
     * @var int
     *
     * @ORM\Column(name="cle_rib", type="integer", nullable=false)
     */
    private $cleRib;

    /**
     * @var string
     *
     * @ORM\Column(name="solde", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $solde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ouverture", type="datetime", nullable=false)
     */
    private $dateOuverture;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_agence", type="integer", nullable=false)
     */
    private $numeroAgence;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_clients", referencedColumnName="id")
     * })
     */
    private $idClients;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EtatCompte", inversedBy="comptes")
     * @ORM\JoinTable(name="comptes_etats",
     *   joinColumns={
     *     @ORM\JoinColumn(name="comptes_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="etatcompte_id", referencedColumnName="id")
     *   }
     * )
     */
    private $etatcompte;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etatcompte = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(string $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function getCleRib(): ?int
    {
        return $this->cleRib;
    }

    public function setCleRib(int $cleRib): self
    {
        $this->cleRib = $cleRib;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getNumeroAgence(): ?int
    {
        return $this->numeroAgence;
    }

    public function setNumeroAgence(int $numeroAgence): self
    {
        $this->numeroAgence = $numeroAgence;

        return $this;
    }

    public function getIdClients(): ?Clients
    {
        return $this->idClients;
    }

    public function setIdClients(?Clients $idClients): self
    {
        $this->idClients = $idClients;

        return $this;
    }

    /**
     * @return Collection|EtatCompte[]
     */
    public function getEtatcompte(): Collection
    {
        return $this->etatcompte;
    }

    public function addEtatcompte(EtatCompte $etatcompte): self
    {
        if (!$this->etatcompte->contains($etatcompte)) {
            $this->etatcompte[] = $etatcompte;
        }

        return $this;
    }

    public function removeEtatcompte(EtatCompte $etatcompte): self
    {
        if ($this->etatcompte->contains($etatcompte)) {
            $this->etatcompte->removeElement($etatcompte);
        }

        return $this;
    }

}
