<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Operations
 * 
 * @ApiResource(
 *     normalizationContext={"groups"={"operations:read"}},
 *     denormalizationContext={"groups"={"operations:write"}},
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
 * @ORM\Table(name="operations")
 * @ORM\Entity
 */
class Operations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"operations:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type_operation", type="string", length=255, nullable=false)
     * @Groups({"operations:read"})
     */
    private $typeOperation;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     * @Groups({"operations:read"})
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     * @Groups({"operations:read"})
     */
    private $dateOperation;

    /**
     * @ORM\ManyToOne(targetEntity=Comptes::class, inversedBy="id_operation_source")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"operations:read"})
     */
    private $id_compte_source;

    /**
     * @ORM\ManyToOne(targetEntity=Comptes::class, inversedBy="id_operation_destinataire")
     * @Groups({"operations:read"})
     */
    private $id_compte_destinataire;

    public function __construct()
    {
        
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOperation(): ?string
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(string $typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getIdCompteSource(): ?Comptes
    {
        return $this->id_compte_source;
    }

    public function setIdCompteSource(?Comptes $id_compte_source): self
    {
        $this->id_compte_source = $id_compte_source;

        return $this;
    }

    public function getIdCompteDestinataire(): ?Comptes
    {
        return $this->id_compte_destinataire;
    }

    public function setIdCompteDestinataire(?Comptes $id_compte_destinataire): self
    {
        $this->id_compte_destinataire = $id_compte_destinataire;

        return $this;
    }

    

}
