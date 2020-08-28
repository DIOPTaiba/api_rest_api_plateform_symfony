<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Operations
 * @ApiResource()
 * @ORM\Table(name="operations", indexes={@ORM\Index(name="IDX_281453483B3BF721", columns={"id_compte_source"}), @ORM\Index(name="IDX_28145348D469E73E", columns={"id_compte_destinataire"})})
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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type_operation", type="string", length=255, nullable=false)
     */
    private $typeOperation;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     */
    private $dateOperation;

    /**
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_compte_source", referencedColumnName="id")
     * })
     */
    private $idCompteSource;

    /**
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_compte_destinataire", referencedColumnName="id")
     * })
     */
    private $idCompteDestinataire;

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
        return $this->idCompteSource;
    }

    public function setIdCompteSource(?Comptes $idCompteSource): self
    {
        $this->idCompteSource = $idCompteSource;

        return $this;
    }

    public function getIdCompteDestinataire(): ?Comptes
    {
        return $this->idCompteDestinataire;
    }

    public function setIdCompteDestinataire(?Comptes $idCompteDestinataire): self
    {
        $this->idCompteDestinataire = $idCompteDestinataire;

        return $this;
    }


}
