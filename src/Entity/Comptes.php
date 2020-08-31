<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Comptes
 *
 * @ApiResource(
 * 
 *     normalizationContext={"groups"={"getSolde:read", "getOperations:read"}},
 *     denormalizationContext={"groups"={"getSolde:write"}},
 *     collectionOperations={
 *          "get"={},
 *          "post"={},
 *     },
 *     itemOperations={
 *          "get"={},
 *          "put"={},
 *          "delete"={},
 *      }
 * )
 * @ApiFilter(SearchFilter::class, properties={"numeroCompte": "exact"})
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
     * @Groups({"getSolde:read", "getOperations:read"})
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
     * @Groups({"getSolde:read"})
     */
    private $solde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ouverture", type="datetime", nullable=false)
     * 
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
     * @ORM\OneToMany(targetEntity=Operations::class, mappedBy="id_compte_source", orphanRemoval=true)
     * 
     */
    private $id_operation_source;

    /**
     * @ORM\OneToMany(targetEntity=Operations::class, mappedBy="id_compte_destinataire")
     * 
     */
    private $id_operation_destinataire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etatcompte = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id_operation_source = new ArrayCollection();
        $this->id_operation_destinataire = new ArrayCollection();
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

    /**
     * @return Collection|Operations[]
     */
    public function getIdOperationSource(): Collection
    {
        return $this->id_operation_source;
    }

    public function addIdOperationSource(Operations $idOperationSource): self
    {
        if (!$this->id_operation_source->contains($idOperationSource)) {
            $this->id_operation_source[] = $idOperationSource;
            $idOperationSource->setIdCompteSource($this);
        }

        return $this;
    }

    public function removeIdOperationSource(Operations $idOperationSource): self
    {
        if ($this->id_operation_source->contains($idOperationSource)) {
            $this->id_operation_source->removeElement($idOperationSource);
            // set the owning side to null (unless already changed)
            if ($idOperationSource->getIdCompteSource() === $this) {
                $idOperationSource->setIdCompteSource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Operations[]
     */
    public function getIdOperationDestinataire(): Collection
    {
        return $this->id_operation_destinataire;
    }

    public function addIdOperationDestinataire(Operations $idOperationDestinataire): self
    {
        if (!$this->id_operation_destinataire->contains($idOperationDestinataire)) {
            $this->id_operation_destinataire[] = $idOperationDestinataire;
            $idOperationDestinataire->setIdCompteDestinataire($this);
        }

        return $this;
    }

    public function removeIdOperationDestinataire(Operations $idOperationDestinataire): self
    {
        if ($this->id_operation_destinataire->contains($idOperationDestinataire)) {
            $this->id_operation_destinataire->removeElement($idOperationDestinataire);
            // set the owning side to null (unless already changed)
            if ($idOperationDestinataire->getIdCompteDestinataire() === $this) {
                $idOperationDestinataire->setIdCompteDestinataire(null);
            }
        }

        return $this;
    }

}
