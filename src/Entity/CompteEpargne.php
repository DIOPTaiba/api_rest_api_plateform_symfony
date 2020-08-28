<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteEpargne
 *
 * @ORM\Table(name="compte_epargne", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_19FDB51A88EEF171", columns={"id_comptes"})})
 * @ORM\Entity
 */
class CompteEpargne
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
     * @ORM\Column(name="frais_ouverture", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $fraisOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_remuneration", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $montantRemuneration;

    /**
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comptes", referencedColumnName="id")
     * })
     */
    private $idComptes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFraisOuverture(): ?string
    {
        return $this->fraisOuverture;
    }

    public function setFraisOuverture(string $fraisOuverture): self
    {
        $this->fraisOuverture = $fraisOuverture;

        return $this;
    }

    public function getMontantRemuneration(): ?string
    {
        return $this->montantRemuneration;
    }

    public function setMontantRemuneration(string $montantRemuneration): self
    {
        $this->montantRemuneration = $montantRemuneration;

        return $this;
    }

    public function getIdComptes(): ?Comptes
    {
        return $this->idComptes;
    }

    public function setIdComptes(?Comptes $idComptes): self
    {
        $this->idComptes = $idComptes;

        return $this;
    }


}
